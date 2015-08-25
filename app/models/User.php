<?php namespace app\models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
	public $name; 

	public $timestamps = [];

	protected $fillable = ['username' , 'email'];
}
