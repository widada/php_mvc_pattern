<?php

class App 
{
	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];

	public function __construct() 
	{
		$url = $this->paresUrl();

		/**
		 * find controllers
		 * 
		 */
		if(file_exists('../app/controllers/'.$url[0].'.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}
		require_once '../app/controllers/'.$this->controller.'.php';
		
		//instansiasi objek dari controller
		$this->controller = new $this->controller;
		// var_dump($this->controller);
		
		//find method
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		/**
		 * find params
		 * @var array
		 */
		$this->params =$url ? array_values($url) : [];
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function paresUrl()
	{
		if (isset($_GET['url'])) {
			return explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}