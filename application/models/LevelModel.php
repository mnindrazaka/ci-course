<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class LevelModel extends Eloquent {
    protected $table = "level";
    public $timestamps = false;
    protected $fillable = ["nama"];
}