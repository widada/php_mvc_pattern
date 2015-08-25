<?php namespace Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Tes extends Eloquent {
	public $name; 

	public $timestamps = false;

	protected $table = 'tes';

	protected $fillable = ['fname' , 'lname'];
}