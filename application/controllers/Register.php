<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

    public function index() {
        $this->redirectIfAuthenticated();
        $this->view('register.index');
    }

    public function register_process() {
        $this->redirectIfAuthenticated();

        $this->validate($this->input->post(), [
            'nim' => 'required|integer|unique:biodata',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'password' => 'required|confirmed'
        ]);

        $_POST['password'] = md5($_POST['password']);
        $biodata = BiodataModel::create($this->input->post());
        $this->session->set_userdata('biodata', $biodata);
        redirect(base_url());
    }
}
