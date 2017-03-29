<?php 

	namespace Handler;

	use PDOStatement;
	use PDO;
	use Handler\APIException;
	use Handler\Handler_Database;
	use Handler\Handler_SQLBuilder;
	use Handler\Handler_User;

	/**
	* 
	*/
	class Handler_Session {

		private $session;
		private $headers;
		private $post;
		private $get;
		private $hdb;
		private $token;
		
		public function __construct() {
			$this->hdb 		= Handler_Database::getInstance();
			$this->post		= $_POST;
			$this->get		= $_GET;
			$this->session	= $_SESSION;
			$this->headers	= apache_request_headers();
			$this->method   = '';
		}

		public function returnUser() {
			if (array_key_exists('session', $this->session)) { 
				$user = $this->methodLogin();
				$this->method = $this->session['session']; 
			} 
			else if (array_key_exists('Intent', $this->headers)) {
				$user = $this->headerLogin();
			}
			else if (array_key_exists('token', $this->post)) {
				$user = $this->methodLogin();
				$this->method = $this->post['token'];
			}
			else if (array_key_exists('token', $this->get)) {
				$user = $this->methodLogin();
				$this->method = $this->get['token'];
			}
			else { 
				$user = new Handler_User(null); 
			}
			return $user;
		}
		private function headerLogin() {}

		private function methodLogin() {
			$where = array(
				Handler_SQLBuilder::OPERATOR_EQUAL => array(
					Handler_SQLBuilder::TABLE_USERS_TOKEN => $_SESSION['session']['token'])
			);
			$query = new Handler_SQLBuilder($this->hdb);
			$query->select(Handler_SQLBuilder::TABLE_USERS);
			$item = array(
				Handler_SQLBuilder::OPERATOR_EQUAL => array(
					Handler_SQLBuilder::TABLE_USERS => Handler_SQLBuilder::TABLE_USERS_FISCAL_ID
					)
			);
			$query->InnerJoin(Handler_SQLBuilder::TABLE_FISCAL,$item);
			$query->where($where);

			if ($user = $this->hdb->selectTable($query))
				return new Handler_User($user);
			else 
				return new Handler_User(null);  
		}
	}

 ?>