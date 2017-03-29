<?php 
	namespace Handler\Entities;

	use Handler\Handler_HTTP;
	use Handler\Handler_Database;
	use Handler\Handler_SQLBuilder;
	use Handler\Handler_User;
	use Handler\APIException;
	use PDO;

	/**
	* 
	*/
	class Handler_Usuario extends Handler_HTTP {
		
		private $hdb;
		private $user;

		public function __construct(Handler_User $user,Handler_Database $hdb) {
			parent::__construct();
			$this->user = $user;
			$this->hdb = $hdb;
		}

		private function getLevel($level) {
			switch ($level) {
				case '1':
					return $this->type = 'Administrador';
				case '2':
					return $this->type = 'Fiscal Cedulado';
				case '3':
					return $this->type = 'Fiscal Objetado';
				case '4':
					return $this->type = 'Usuario';
			}
		}

		public function getSingle(array $params ) {
			if (!$params)
				if ($this->method == 'GET')
					$params = $this->get;
				else 
					throw new APIException("No hay paramtros de accion");
			$query = new Handler_SQLBuilder($this->hdb);
			$query->select(Handler_SQLBuilder::TABLE_USERS);
			$filter = array_key_exists('filter', $params) ? $params['filter'] : '';
			switch ($filter) {
				case 'id':
					$query->where(array(
						Handler_SQLBuilder::OPERATOR_EQUAL => array(
								Handler_SQLBuilder::TABLE_USERS_ID => $params['item']
							)
						));
					break;
				case 'u':
					$query->where(array(
						Handler_SQLBuilder::OPERATOR_EQUAL => array(
							Handler_SQLBuilder::TABLE_USERS_EMAIL => $params['item']
							)
						));
					break;
				default:
					throw new APIException("Se necesita un filtro para el uso de esta funcion");			
					break;
			}
			if ($res = $query->commit()) {
				$re = $res->fetch(PDO::FETCH_ASSOC);
				$return = array(
						'e' => 0,
						'usuario' =>array(
								'id'          => $re['id_usu'],
								'name'        => $re['nom_fis'],
								'ape'         => $re['ape_fis'],
								'email'       => $re['cor_usu'],
								'level'       => $this->getLevel($re['id_niv_usu']),
								'status'      => $re['est_usu'],
								'statusConex' => $re['est_session'],
								'last_online' => $re['ult_session']
							)
				);
				return $return;
			}else 
				return false;	
		}

		public function delete(array $params = null) {
			if (!$params)
				if ($this->method == 'DELETE')
					$params = $this->get;
				else 
					throw new APIException("No hay paramtros de accion");
			if (!$this->user->getLevel() == 'Administrador')
				throw new APIException('No tienes permisos para realizar esta Opcion');
			$query = new Handler_SQLBuilder($this->hdb);
			$query->delete(Handler_SQLBuilder::TABLE_USERS);
			$query->where(array(
				Handler_SQLBuilder::OPERATOR_EQUAL => array(
					Handler_SQLBuilder::TABLE_USERS_ID => $params['id'])
				));
			$query->commit();

			return json_encode(array('error' => 0,'id' => $params['id']));
		}

		public function get(array $params = null) {
			if (!$params)
					if ($this->method == 'GET')
						$params = $this->get;
					else 
						throw new APIException("No hay paramtros de accion");
			if (!$this->user->getLevel() == 'Administrador')
				throw new APIException("No tienes permisos para realizar esta Opcion");
			$query = new Handler_SQLBuilder($this->hdb);
			$columns = array(
				Handler_SQLBuilder::TABLE_USERS_ID, 
				Handler_SQLBuilder::TABLE_FISCAL_CED,
				Handler_SQLBuilder::TABLE_FISCAL_NAME,
				Handler_SQLBuilder::TABLE_FISCAL_APE,
				Handler_SQLBuilder::TABLE_USERS_EMAIL,
				Handler_SQLBuilder::TABLE_USERS_STATUS,
				Handler_SQLBuilder::TABLE_USERS_LEVEL,
				Handler_SQLBuilder::TABLE_USERS_STATUS_SESSION,
				Handler_SQLBuilder::TABLE_USERS_LAST_ONLINE
			);
			$query->select(Handler_SQLBuilder::TABLE_USERS,$columns);
			$filter = array_key_exists('filter', $params) ? $params['filter'] : '';
			$item = array(
				Handler_SQLBuilder::OPERATOR_EQUAL => array(
					Handler_SQLBuilder::TABLE_USERS => Handler_SQLBuilder::TABLE_USERS_FISCAL_ID
					)
			);
			$query->InnerJoin(Handler_SQLBuilder::TABLE_FISCAL,$item);
			$where = false;
			switch ($filter) {
				case 'id':
					$where = array(
						Handler_SQLBuilder::OPERATOR_LIKE => array(
							Handler_SQLBuilder::TABLE_USERS_ID => "%{$params['item']}%"
							)
						);
					break;
				case 'f':
					$where = array(
						Handler_SQLBuilder::OPERATOR_LIKE => array(
							Handler_SQLBuilder::TABLE_USERS_FISCAL_ID => "%{$params['item']}%"
							)
						);
					break;
				case 'e':
					$where = array(
						Handler_SQLBuilder::OPERATOR_LIKE => array(
							Handler_SQLBuilder::TABLE_USERS_EMAIL => "%{$params['item']}%"
							)
						);
					break;
				case 'n':
					$where = array(
						Handler_SQLBuilder::OPERATOR_LIKE => array(
							Handler_SQLBuilder::TABLE_USERS_LEVEL => "%{$params['item']}%"
							)
						);
					break;
				case 't':
					$where = array(
						Handler_SQLBuilder::OPERATOR_LIKE => array(
							Handler_SQLBuilder::TABLE_USERS_TOKEN => "%{$params['item']}%"
							)
					);
				default:
					break;
			}
			$limit = array_key_exists('limit', $params) ? $params['limit'] : '';
			if($limit)
				$query->limit(array($params['star'],$params['max']));
			if(is_array($where))
				$query->where($where);
				$query->orderby(Handler_SQLBuilder::TABLE_USERS_ID);
			if($res = $query->commit()) {
				$query = new Handler_SQLBuilder($this->hdb);
				$query->count(Handler_SQLBuilder::TABLE_USERS);
				if(is_array($where))
					$query->where($where);
				$count = $query->commit();
				$count = $count->fetch(PDO::FETCH_ASSOC);
				$return = array('e' =>0,'usuarios' => array(),'total' => $count,'m' => 'Datos del Usuario');
				while ($re = $res->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT)) {
					$return['usuarios'][] = array(
						'id'          => $re['id_usu'],
						'ced'         => $re['ced_fis'],
						'name'        => $re['nom_fis'],
						'ape'         => $re['ape_fis'],
						'email'       => $re['cor_usu'],
						'level'       => $this->getLevel($re['id_niv_usu']),
						'status'      => $re['est_usu'],
						'statusConex' => $re['est_session'],
						'last_online' => $re['ult_session']
					);
				}
				return $return;
			}else 
				return false;			
		}

		public function post(array $params = null) {
			if(!$params)
				if ($this->method == 'POST')
					$params = $this->post;
				else 
					throw new APIException("No hay paramtros de accio");

			if(!$this->user->getLevel() == 'Administrador')
				throw new APIException("No tienes permisos para realizar esta Opcion");

			if($this->getSingle(array('filter' => 'id','term' => $params['id'])))
				return array('e' => 2);
			$fields = array(
				Handler_SQLBuilder::TABLE_USERS_EMAIL          => $params['email'],
				Handler_SQLBuilder::TABLE_USERS_PASSWORD       => 
					password_hash($params['password'],PASSWORD_DEFAULT),
				Handler_SQLBuilder::TABLE_USERS_LEVEL          => $params['level'],
				Handler_SQLBuilder::TABLE_USERS_QUESTION       => $params['question'],
				Handler_SQLBuilder::TABLE_USERS_RESP           => $params['resp'],
				Handler_SQLBuilder::TABLE_USERS_STATUS         => $params['status'],
				Handler_SQLBuilder::TABLE_USERS_STATUS_SESSION => $params['status_session'],
				Handler_SQLBuilder::TABLE_USERS_LAST_ONLINE    => $params['last_online'],
				Handler_SQLBuilder::TABLE_USERS_CREATED        => $parmas['cread'],
				Handler_SQLBuilder::TABLE_USERS_FISCAL_ID      => $params['id_fis']
			);
			$query = new Handler_SQLBuilder($this->hdb);
			$query->insert(Handler_SQLBuilder::TABLE_USERS,$fields);
			if ($id = $query->commit())
				return array('e' => 0,'id' => $id);
			else 
				return false;					
		}

		public function put(array $params = null) {
			if (!$params)
				if ($this->method == 'PUT')
					$params = $this->put;
				else
					throw new APIException("No hay paramtros de accio");

			if(!$this->user->getLevel() == 'Administrador')
				throw new APIException("No tienes permisos para realizar esta Opcion");

			if($this->getSingle(array('filter' => 'id','term' => $params['id']))){

				if (($t = $this->getSingle(array('filter' => 'u','term' =>$parmas['email']))) && $t['usuario']['id'] != $params['id']) {
					return array('e' => 2);
				}

				$fields = array(
					Handler_SQLBuilder::TABLE_USERS_EMAIL          => $params['email'],
					Handler_SQLBuilder::TABLE_USERS_PASSWORD       => 
						password_hash($params['password'],PASSWORD_DEFAULT),
					Handler_SQLBuilder::TABLE_USERS_LEVEL          => $params['level'],
					Handler_SQLBuilder::TABLE_USERS_QUESTION       => $params['question'],
					Handler_SQLBuilder::TABLE_USERS_RESP           => $params['resp'],
					Handler_SQLBuilder::TABLE_USERS_FISCAL_ID      => $params['id_fis']
				);

				$query = new Handler_SQLBuilder($this->hdb);
				$query->update(Handler_SQLBuilder::TABLE_USERS,$fields);
				$query->where(array(
					Handler_SQLBuilder::OPERATOR_EQUAL => array(
							Handler_SQLBuilder::TABLE_USERS_ID => $params['id']
						)
				));
				if ($query->commit())
					return array('e' => 0,'id' => $params['id']);
				else 
					return false;
			}
			return false;		
		}

		public function CambioPass(array $params = null) {
			if (!$params)
				if ($this->method == 'PUT')
					$params = $this->put;
				else
					throw new APIException("No hay paramtros de accio");

			if(!$this->user->getLevel() == 'Administrador')
				throw new APIException("No tienes permisos para realizar esta Opcion");

			if($this->getSingle(array('filter' => 'id','term' => $params['id']))){

				if (($t = $this->getSingle(array('filter' => 'u','term' =>$parmas['email']))) && $t['usuario']['id'] != $params['id']) {
					return array('e' => 2);
				}

				$fields = array(
					Handler_SQLBuilder::TABLE_USERS_PASSWORD => password_hash($params['password'],PASSWORD_DEFAULT)
				);

				$query = new Handler_SQLBuilder($this->hdb);
				$query->update(Handler_SQLBuilder::TABLE_USERS,$fields);
				$query->where(array(
					Handler_SQLBuilder::OPERATOR_EQUAL => array(
						Handler_SQLBuilder::TABLE_USERS_ID => $params['id']
					)
				));
				if ($query->commit())
					return array('e' => 0,'id' => $params['id']);
				else 
					return false;
			}
			return false;
		}

		public function autoRun() {
			switch ($this->method) {
				case 'DELETE':
					return $this->delete();
				case 'GET':
					return $this->get();
				case 'POST':
					return $this->post();
				case 'PUT':
					return $this->put();
				default:
					throw new APIException("Error the AutoRun Type the Method");				
			}
		}
	}

?>