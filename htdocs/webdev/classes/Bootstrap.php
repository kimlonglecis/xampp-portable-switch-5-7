<?php 

class Bootstrap {
	private $controller;
	private $action;
	private $request;

	public function __construct($request){
		$this->request = $request;
		if($this->request['controller'] == ""){
			$this->controller = 'home';
		}else {
			$this->controller = $this->request['controller'];
		}
		if($this->request['action'] == ""){
			$this->action = 'index';
		}else{
			$this->action = $this->request['action'];
		}
		if($this->request['action'] == ""){
			$this->action = 'index';
		}else{
			$this->action = $this->request['action'];
		}
		
	}

	public function createController(){
		// Check Class
		if(class_exists($this->controller)){
			$parent = class_parents($this->controller);
			// Check Extend
			if(in_array("controller", $parent)){
				if(method_exists($this->controller, $this->action)){
					return new 
				}
			}
		}
	}
}

?>