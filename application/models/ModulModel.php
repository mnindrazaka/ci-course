<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class ModulModel extends Eloquent {
    protected $table = "modul";
    public $timestamps = false;
    protected $fillable = ["nama", "label"];
}