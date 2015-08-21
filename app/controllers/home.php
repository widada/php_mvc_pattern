<?php

/**
* make test
*/
class Home extends Controller {
	protected $user;
	protected $tes;

	public function __construct()
	{
		$this->user = $this->model('User');
		$this->tes = $this->model('Tes');
	}

	public function index($name='')
	{
		$user = $this->user;
		$user->name = $name;

		$this->view('home/index' ,['data' => $name]);
	}

	public function create($username = '', $email = '')
	{
		$this->user->create([
			'username' => $username,
			'email' => $email
		]);
	}

	public function tes_insert($username = '', $email = '')
	{
		$this->tes->create([
			'fname' => $username,
			'lname' => $email
		]);
	}		
}