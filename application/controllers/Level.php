<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Level extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->authenticate();
    }

    public function index() {
        $data['level'] = LevelModel::all();
		$this->view('level.index', $data);
	}

	public function create() {
        $this->view('level.create');
    }

    public function store() {
        $this->validate($this->input->post(), [
            'nama' => 'required|string'
        ]);
        LevelModel::create($this->input->post());
        redirect(base_url('level'), 'refresh');
    }

    public function edit($id) {
        $data['level'] = LevelModel::find($id);
        $this->view('level.edit', $data);
    }

    public function update($id) {
        $this->validate($this->input->post(), [
            'nama' => 'required|string'
        ]);

        LevelModel::find($id)->update($this->input->post());
        redirect(base_url('level'), 'refresh');
    }

    public function delete($id) {
        LevelModel::destroy($id);
        redirect(base_url('level'), 'refresh');
    }
}
