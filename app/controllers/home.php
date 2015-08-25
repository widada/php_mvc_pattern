<?php 
use Models\Tes;

class Home extends Controller {
	protected $user;
	protected $tes;

	public function index($name='')
	{
		$this->name = $name;

		$this->view('home/index' ,['data' => $name]);
	}

	public function create($username = '', $email = '')
	{
		Tes::create([
			'fname' => $username,
			'lname' => $email
		]);
	}		
}