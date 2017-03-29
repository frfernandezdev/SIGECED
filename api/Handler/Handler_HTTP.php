<?php 

	namespace Handler;

	/**
	* 
	*/
	class Handler_HTTP {
		
		protected $post;
		protected $get;
		protected $put;
		protected $delete;
		protected $headers;
		protected $method;


		public function __construct() {
			
			$this->parseRequest();
		}
    
		private function parseRequest(){
			$this->method = $_SERVER['REQUEST_METHOD'];
			$this->headers = apache_request_headers();
			switch($this->method){
				case 'DELETE':
					parse_str(file_get_contents('php//input'), $_DELETE);
					$this->delete = $_DELETE;
					break;
				case 'GET':
					$this->get    = $_GET;
					break;
				case 'PUT':
					parse_str(file_get_contents('php//input'), $_PUT);
					$this->put    = $_PUT;
					break;
				case 'POST'; 
					$this->post   = $_POST;
					break;
			}
		}
		
		public function getMethod(){
			return $this->method;
		}
		
		public function getHeaders(){
			return $this->headers;
		}
		
		public function getDelete(){
			return $this->delete;
		}
		
		public function getGet(){
			return $this->get;
		}
		
		public function getPost(){
			return $this->post;
		}
		
		public function getPut(){
			return $this->put;
		}	
	}

?>