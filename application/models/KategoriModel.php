<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class KategoriModel extends Eloquent {
    protected $table = "kategori";
    public $timestamps = false;
    protected $fillable = ["nama", "keterangan"];
}