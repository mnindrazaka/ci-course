<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class BlogModel extends Eloquent {
    protected $table = "blog";
    public $timestamps = false;
    protected $fillable = ["penulis", "judul", "isi", "file", "id_kategori"];

    public function kategori() {
        return $this->belongsTo('KategoriModel', 'id_kategori', 'id');
    }
}