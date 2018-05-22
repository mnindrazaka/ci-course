<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kategori extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->authenticate();
    }

    public function index() {
	    $data['kategori'] = KategoriModel::all();
		$this->view('kategori.index', $data);
	}

	public function create() {
        $this->view('kategori.create');
    }

    public function store() {
        $this->validate($this->input->post(), [
            'nama' => 'required|string',
            'keterangan' => 'required|string'
        ]);

        KategoriModel::create($this->input->post());
        redirect(base_url('kategori'), 'refresh');
    }

    public function edit($id) {
        $data['kategori'] = KategoriModel::find($id);
        $this->view('kategori.edit', $data);
    }

    public function update($id) {
        $this->validate($this->input->post(), [
            'nama' => 'required|string',
            'keterangan' => 'required|string'
        ]);

        KategoriModel::find($id)->update($this->input->post());
        redirect(base_url('kategori'), 'refresh');
    }

    public function delete($id) {
        KategoriModel::destroy($id);
        redirect(base_url('kategori'), 'refresh');
    }
}
