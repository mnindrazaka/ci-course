<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function index() {
        $this->redirectIfAuthenticated();
        $this->view('login.index');
    }

    public function login_process() {
        $this->redirectIfAuthenticated();

        $this->validate($this->input->post(), [
            'nim' => 'required|numeric|exists:biodata',
            'password' => 'required|string'
        ]);

        $biodata = BiodataModel::where([
            'nim' => $this->input->post('nim')
        ])->first();

        if ($biodata->password == md5($this->input->post('password'))) {
            $this->session->set_userdata('biodata', $biodata);
            redirect(base_url());
        } else {
            $validation = $this->validator->make([], []);
            $validation->errors()->add('password', 'the password is invalid');
            $this->session->set_flashdata('errors', $validation->errors());
            $this->session->set_flashdata('old', $this->input->post());
            redirect(base_url('Login'));
        }
    }

    public function logout_process() {
        $this->authenticate();
        unset($_SESSION['biodata']);
        redirect(base_url());
    }
}
