<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->authenticate();
    }

    public function index($offset = 0) {
        $data['pagination'] = $this->paginate(BlogModel::all(), 2, base_url('blog/index'));
		$data['blog'] = BlogModel::offset($offset)->limit(2)->get();
        $this->view('blog.index', $data);
	}

	public function indexTable() {
        $data['blog'] = BlogModel::all();
        $this->view('blog.indexTable', $data);
    }

    public function getAll() {
        $data['data'] = BlogModel::with('kategori')->get();
        echo json_encode($data);
    }

	public function show($id) {
        $data['blog'] = BlogModel::find($id);
        $this->view('blog.show', $data);
    }

	public function create() {
        $data['kategori'] = KategoriModel::all();
        $this->view('blog.create', $data);
    }

    public function store() {
        $this->validate($this->input->post(), [
            'penulis' => 'required|string',
            'judul' => 'required|string',
            'isi' => 'required|string',
            'id_kategori' => 'required|integer'
        ]);
        $_POST['file'] = $this->do_upload('file', 'assets/upload/blog', 'image', TRUE);

        BlogModel::create($this->input->post());
        redirect(base_url('blog'), 'refresh');
    }

    public function edit($id) {
        $data['kategori'] = KategoriModel::all();
        $data['blog'] = BlogModel::find($id);
        $this->view('blog.edit', $data);
    }

    public function update($id) {
        $this->validate($this->input->post(), [
            'penulis' => 'required|string',
            'judul' => 'required|string',
            'isi' => 'required|string',
            'id_kategori' => 'required|integer'
        ]);

        if(!empty($_FILES['file']['name'])){
            $_POST['file'] = $this->do_upload('file', 'assets/upload/blog', 'image', TRUE);
            $blog = BlogModel::find($id);
            unlink('assets/upload/blog/' . $blog->file);
        }

        BlogModel::find($id)->update($this->input->post());
        redirect(base_url('blog'), 'refresh');
    }

    public function delete($id) {
        $blog = BlogModel::find($id);
        unlink('assets/upload/blog/' . $blog->file);

        BlogModel::destroy($id);
        redirect(base_url('blog'), 'refresh');
    }
}
