<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Biodata extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->authenticate();
    }

    public function index() {
		$this->view('biodata.index');
	}

	public function getAll() {
        $data['data'] = BiodataModel::with('level')->get();
        echo json_encode($data);
    }

	public function show($id) {
        $data['biodata_array'] = json_decode(json_encode(BiodataModel::find($id)),TRUE);
        $data['biodata_object'] = BiodataModel::find($id);

        $data['biodata_query_array'] = json_decode(json_encode(BiodataModel::find($id)),TRUE);
        $data['biodata_query_object'] = BiodataModel::find($id);
        $this->view('biodata.show', $data);
    }

	public function create() {
        $data['level'] = LevelModel::all();
        $this->view('biodata.create', $data);
    }

    public function store() {
        $this->validate($this->input->post(), [
            'nim' => 'required|numeric|unique:biodata',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'password' => 'required|confirmed',
            'id_level' => 'required|integer'
        ]);

        $_POST['password'] = md5($_POST['password']);
        BiodataModel::create($this->input->post());
        redirect(base_url('biodata'), 'refresh');
    }

    public function edit($id) {
        $data['biodata'] = BiodataModel::find($id);
        $data['level'] = LevelModel::all();
        $this->view('biodata.edit', $data);
    }

    public function update($id) {
        $this->validate($this->input->post(), [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'id_level' => 'required|integer'
        ]);

        BiodataModel::find($id)->update($this->input->post());
        redirect(base_url('biodata'), 'refresh');
    }

    public function delete($id) {
        BiodataModel::destroy($id);
        redirect(base_url('biodata'), 'refresh');
    }
}
