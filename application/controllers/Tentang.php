<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tentang extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->authenticate();
    }

    public function index() {
		$this->view('tentang.index');
	}
}
