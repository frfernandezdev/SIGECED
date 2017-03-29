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
	class Handler_Fiscal extends Handler_HTTP {

		private $hdb;
		private $fis;
		
		public function __construct(Handler_User $user, Handler_Database $hdb) {
			$this->$hdb = $hdb;
			$this->$user = $user;			
		}

		public function getSingle(array $params) {
			if (!$parmas)
				if ($this->method == 'GET')
					$params = $this->get;
				else
					throw new APIException("No hay parametros de accion");
			$query = new Handler_SQLBuilder($this->hdb);
			$query->select(Handler_SQLBuilder::TABLE_FISCAL);
			$filter = array_key_exists('filter',$params) ? $params['filter'] : '';
			switch ($filter) {
				case 'id':
					$query->where(array(
						Handler_SQLBuilder::OPERATOR_EQUAL, array(
							Handler_SQLBuilder::TABLE_FISCAL_ID => $params['item']
						)	
					));
					break;
				case 'u':
					$query->where(
						Handler_SQLBuilder::OPERATOR_EQUAL => array(
							Handler_SQLBuilder::TABLE_FISCAL_EMAIL => $parmas['item']
						)
					);
					break;
				case 'ced':
					$query->where(
						Handler_SQLBuilder::OPERATOR_LIKE => array(
							Handler_SQLBuilder::TABLE_FISCAL_CED => "%{$parmas['item']}%"	
						)
					);
					break;
				case 'n':
					$query->where(
						Handler_SQLBuilder::OPERATOR_LIKE => array(
							Handler_SQLBuilder::TABLE_FISCAL_NAME => "%{$parmas['item']}%"
						)
					);
					break;
				case 'ap':
					$query->where(
						Handler_SQLBuilder::OPERATOR_LIKE => array(
							Handler_SQLBuilder::TABLE_FISCAL_APE => "%{$params['item']}%"
						)
					);
				default:
					throw new APIException("Unknown Name Table or Item");	
			}
			$limit = array_key_exists('limit', $params) ? $parmas['limit'] : '';
			if ($limit)
				$query->limit(array($parmas['star'],$params['max']));
			if (is_array($where))
				$query->where($where);
			if ($res = $query->commit()) {
				$query = new Handler_SQLBuilder($this->hdb);
				$query->count(Handler_SQLBuilder::TABLE_FISCAL);
				if (is_array($where))
					$query->where($where);
				$count = $query->commit();
				$count = $count->fetch(PDO::FETCH_ASSOC);
				$count = $count['count'];
				$return = array('e' => 0,'fiscal' = array(),'total' => $count);
				while ($re = $res->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT)) {
					$return['fiscal'][] = array(
						'id'        => $re['id_fis'],
						'name'      => $re['nom_fis'],
						'ape'       => $re['ape_fis'],
						'email'     => $re['cor_fis'],
						'telf'      => $re['telf_fis'],
						'ced'       => $re['ced_fis'] 
					);
				}
				return $return;
			}else 
				return false;
		}

		public function delete(array $params = null) {
			if (!$parmas)
				if ($this->method == 'DELETE')
					$params = $this->get;
				else
					throw new APIException("No hay parametros de accion");
			if (!$this->user->getLevel() == 'Administrador')
				throw new APIException("No tienes permisos para realizar esta Opcion");
			$query = new Handler_SQLBuilder($this->hdb);
			$query->delete(Handler_SQLBuilder::TABLE_FISCAL);
			$query->where(array(
				Handler_SQLBuilder::OPERATOR_EQUAL, array(
					Handler_SQLBuilder::TABLE_FISCAL_ID => $params['item']
				)	
			));
			$query->commit();
			return json_encode(array('error' => 0,'id' => $parmas['id']));					
		}

		public function get(array $params = null) {
		}

		public function post(array $params = null) {
		}

		public function put(array $params = null) {
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
					return throw new APIException("Error the AutoRun Type the Method");				
			}
		}



	}

?>