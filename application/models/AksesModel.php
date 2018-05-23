<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class AksesModel extends Eloquent {
    protected $table = "akses";
    public $timestamps = false;
    protected $fillable = ["id_modul", "id_level"];
}