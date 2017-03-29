<?php 

	namespace Handler;

	use PDOStatement;
	use PDO;
	use Handler\APIException;
	use Handler\Handler_Database;
	use Handler\Handler_SQLBuilder; 

	/**
		* 
		*/
		class Handler_User {
			
			private $id;
			private $email;
			private $name;
			private $password;
			private $level;
			private $id_fis;
			private $status;
			private $created;
			private $last_online;
			private $token;
			private $hdb;
			private $logged;
			private $type; 

			public function __construct($rawUser = null) {
				
				$this->hdb = Handler_Database::getInstance();
				if (null !== $rawUser) {
					if ($rawUser instanceof PDOStatement) {
						$user = $rawUser->fetch(PDO::FETCH_ASSOC);
						$this->id           = $user['id_usu'];
						$this->name         = $user['nom_fis'];
						$this->email        = $user['cor_usu'];
						$this->password     = $user['pas_usu'];
						$this->level        = $user['id_niv_usu'];
						$this->id_fis       = $user['id_fis'];
						$this->status       = $user['est_session'];
						$this->created      = $user['created_user'];
						$this->last_online  = $user['ult_session']; 
						$this->logged       = true;
						$this->updateLastOnline();
						$this->StatusConex(); 
					}
					else {
						$this->logged = false;
					}
				}
				else { $this->logged = false; }
			}

			private function StatusConex() {

				$where = array(
					Handler_SQLBuilder::OPERATOR_EQUAL => array(
						Handler_SQLBuilder::TABLE_USERS_ID => $this->id
						)
				);
				$fields = array(
					Handler_SQLBuilder::TABLE_USERS_STATUS_SESSION => '0'
				);
				$query = new Handler_SQLBuilder($this->hdb);
				$query->update(Handler_SQLBuilder::TABLE_USERS,$fields);
				$query->where($where);
				$this->hdb->updateTable($query);
			}

			private function updateLastOnline() {
				 
				setlocale(LC_TIME, 'es_VE');
				date_default_timezone_set('America/Caracas');

				$where = array(
					Handler_SQLBuilder::OPERATOR_EQUAL => array(
						Handler_SQLBuilder::TABLE_USERS_ID => $this->id
						)
				);
				$fields = array(
					Handler_SQLBuilder::TABLE_USERS_LAST_ONLINE =>  date("Y-m-d h:i:s a")
				);
				$query = new Handler_SQLBuilder($this->hdb);
				$query->update(Handler_SQLBuilder::TABLE_USERS,$fields);
				$query->where($where);
				$this->hdb->updateTable($query);
			}

			private function Loggout() {
				$where = array(
					Handler_SQLBuilder::OPERATOR_EQUAL => array(
						Handler_SQLBuilder::TABLE_USERS_ID => $this->id
					)
				);
				$fields = array(
					Handler_SQLBuilder::TABLE_USERS_TOKEN => '',
					Handler_SQLBuilder::TABLE_USERS_STATUS_SESSION => '1'
				);
				$query = new Handler_SQLBuilder($this->hdb);
				$query->update(Handler_SQLBuilder::TABLE_USERS,$fields);
				$query->where($where);
				$this->hdb->updateTable($query);
			}

			public function pushLoggout() {
				return $this->Loggout();
			}

			public function pushupdateLastOnline() {
				return $this->updateLastOnline();
				
			}

			public function getUser() {
				return $user;
			}

			public function getID() {
				return $this->id;
			}

			public function getName() {
				return $this->name;
			}

			public function getLevel() {
				switch ($this->level) {
					case '1':
						return $this->type = 'Administrador';
					case '2':
						return $this->type = 'Fiscal Cedulado';
					case '3':
						return $this->type = 'Fiscal Objetado';
					case '4':
						return $this->type = 'Usuario';
					default:
						$this->logged = false;
				}
			}

			public function getStatus() {
				return $this->status;
			}

			public function getLast_Online() {
				return $this->last_online;
			}
			public function getID_Fis() {
				return $this->id_fis;
			}

			public function getLogged() {
				return $this->logged;
			}

			public function getCreated() {
				return $this->created;
			}
			
		}	

?>