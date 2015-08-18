<?php

class App 
{
	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];

	public function __construct() 
	{
		$url = $this->paresUrl();
		if(file_exists('../app/controllers/'.$url[0].'.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}
		require_once '../app/controllers/'.$this->controller.'.php';
		
		//instansiasi objek dari controller
		$this->controller = new $this->controller;
		var_dump($this->controller);
		
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		$this->params = array_values($url);
		echo "<pre>".print_r($this->params,1)."</pre>";
	}

	public function paresUrl()
	{
		if (isset($_GET['url'])) {
			return explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}