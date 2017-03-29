<?php 
	
	namespace Handler;

	use Handler\APIException;
	use Handler\Handler_Database;

	/**
	* 
	*/
	class Handler_SQLBuilder {
		private $sql;
		private $values;
		private $db;
		private $type;

		//OPERATOR THE MYSQL

		const ALL                                          = 0;
		const OPERATOR_EQUAL                               = 1;
		const OPERATOR_LESS_THAN                           = 2;
		const OPERATOR_MORE_THAN                           = 3;
		const OPERATOR_DIFFERENT_THAN                      = 4;
		const OPERATOR_LIKE                                = 5;
		const OPERATOR_NOT_LIKE                            = 6;
		const OPERATOR_ASC                                 = 7;
		const OPERATOR_DESC                                = 8;
		const OPERATOR_LESS_EQUAL_THAN                     = 9;
		const OPERATOR_MORE_EQUAL_THAN                     = 10;
		const OPERATOR_EXISTS                              = 11;
		const OPERATOR_NOT_EXISTS                          = 12;
		const OPERATOR_IN                                  = 13;
		const OPERATOR_NOT_IN                              = 14;
		const OPERATOR_IS_NULL                             = 15;
		const OPERATOR_NOT_NULL                            = 16;
		const OPERATOR_BETWEEN                             = 17;
		const OPERATOR_NOT_BETWEEN                         = 18;


		//CONST TABLES DATABASE
		
			//TABLES MASTER
				//TABLE Usuarios
					const TABLE_USERS                       = 0; 
						const TABLE_USERS_ID                = 1;		
						const TABLE_USERS_USER              = 2; 
						const TABLE_USERS_EMAIL             = 3;
						const TABLE_USERS_PASSWORD          = 4;
						const TABLE_USERS_LEVEL             = 5;
						const TABLE_USERS_STATUS            = 6;
						const TABLE_USERS_STATUS_SESSION    = 7;
						const TABLE_USERS_TOKEN             = 8;
						const TABLE_USERS_LAST_ONLINE       = 9;
						const TABLE_USERS_CREATED           = 10;
						const TABLE_USERS_QUESTION          = 11;
						const TABLE_USERS_RESP              = 12;
						const TABLE_USERS_FISCAL_ID         = 13;
				//TABLE fiscales
					const TABLE_FISCAL                     = 14;
						const TABLE_FISCAL_ID              = 15;
						const TABLE_FISCAL_EMAIL           = 16;
						const TABLE_FISCAL_CED             = 17;
						const TABLE_FISCAL_NAME            = 18;
						const TABLE_FISCAL_APE             = 19; 					
				//TABLE Modulos
					const TABLE_MODULE                     = 20;
			//TABLES SEGUNDARY
				//TABLE TYPE TRANS
					const TABLE_TYPE_TRANS                 = 21;					
				//TABLE TYPE_PARTO
					const TABLE_TYPE_PARTO                 = 22;					
				//TABLE TYPE OBJ
					const TABLE_TYPE_OBJ                   = 23;					
				//TABLE TYPE DOC
					const TABLE_TYPE_DOC                   = 24;
			//TABLEs SLAVE
				//TABLE TRANS
					const TABLE_TRANS                      = 25;			

					//TABLEs TRANS REPORT CED
						//TABLE REPORT CED
							const TABLE_REPORT_CED         = 26;
					//TABLE TRANS REPORT OBJ
						//TABLE DETALLS OBJ
							const TABLE_DETALLS_OBJ        = 27;
						//TABLE PEOPLE OBJ
							const TABLE_PEOPLE_OBJ         = 28;
						//TABLE PROCESS OBJ 
							const TABLE_PROCESS_OBJ        = 29;
							
						//TABLE VALIJ OBJ
							const TABLE_VALIJ_OBJ          = 30;
							
				//TABLE CHATS
					//TABLE CHAT
						const TABLE_CHAT                   = 31;
						

		public function getSQL() {
			return $this->sql;
		}

		public function getValues() {
			return $this->values;
		}

		public function __construct(Handler_Database $db) {
			$this->db  = $db;
			$this->sql = "";
		}

		protected function getOperator($operator) {
			
			switch ($operator) {
				case self::ALL:
					return '*';
				case self::OPERATOR_EQUAL:
					return '=';
				case self::OPERATOR_LESS_THAN:
					return '<';
				case self::OPERATOR_MORE_THAN:
					return '>';
				case self::OPERATOR_DIFFERENT_THAN:
					return '!=';
				case self::OPERATOR_LIKE:
					return 'LIKE';
				case self::OPERATOR_NOT_LIKE:
					return 'NOT LIKE';
				case self::OPERATOR_ASC:
					return 'ASC';
				case self::OPERATOR_DESC:
					return 'DESC';
				case self::OPERATOR_LESS_EQUAL_THAN:
					return '<=';
				case self::OPERATOR_MORE_EQUAL_THAN:
					return '>=';
				case self::OPERATOR_EXISTS:
					return 'EXISTS';
				case self::OPERATOR_NOT_EXISTS:
					return 'NOT EXISTS';
				case self::OPERATOR_IN:
					return 'IN';
				case self::OPERATOR_NOT_IN:
					return 'NOT IN';
				case self::OPERATOR_IS_NULL:
					return 'IS NULL';
				case self::OPERATOR_NOT_NULL:
					return 'IS NOT NULL';
				case self::OPERATOR_BETWEEN:
					return 'BETWEEN';
				case self::OPERATOR_NOT_BETWEEN:
					return 'NOT BETWEEN'; 
				default:
					throw new APIException("Unknown Operator");
					break;
			}
		}

		protected function getTableName($table_index) {

			switch ($table_index) {
				//TABLE USERS
				case self::TABLE_USERS:
					return 'usuario';
				case self::TABLE_USERS_ID:
					return 'id_usu';
				case self::TABLE_USERS_FISCAL_ID:
					return 'id_fis';
				case self::TABLE_USERS_EMAIL:
					return 'cor_usu';
				case self::TABLE_USERS_PASSWORD:
					return 'pas_usu';
				case self::TABLE_USERS_LEVEL:
					return 'id_niv_usu';
				case self::TABLE_USERS_STATUS:
					return 'est_usu';
				case self::TABLE_USERS_STATUS_SESSION:
					return 'est_session';
				case self::TABLE_USERS_LAST_ONLINE:
					return 'ult_session';
				case self::TABLE_USERS_CREATED:
					return 'created_user';
				case self::TABLE_USERS_QUESTION:
					return 'pre_sec';
				case self::TABLE_USERS_RESP:
					return 'res_sec';
				case self::TABLE_USERS_TOKEN:
					return 'token';
				case self::TABLE_FISCAL:
					return 'fiscal';
				case self::TABLE_FISCAL_ID:
					return 'id_fis';
				case self::TABLE_FISCAL_EMAIL:
					return 'cor_fis';
				case self::TABLE_FISCAL_CED:
					return 'ced_fis';
				case self::TABLE_FISCAL_NAME:
					return 'nom_fis';
				case self::TABLE_FISCAL_APE:
					return 'ape_fis';
				case self::TABLE_MODULE:
					return 'modulo';
				case self::TABLE_TYPE_TRANS:
					return 'tipo_transaccion';	
				case self::TABLE_TYPE_PARTO:
					return 'tipo_parto';
				case self::TABLE_TYPE_OBJ:
					return 'tipo_objecion';
				case self::TABLE_TYPE_DOC:
					return 'tipo_documento';
				case self::TABLE_TRANS:
					return 'transaccion';
				case self::TABLE_REPORT_CED:
					return 'reporte_cedulados';
				case self::TABLE_DETALLS_OBJ:
					return 'detalle_objetado';
				case self::TABLE_PEOPLE_OBJ:
					return 'ciudadano';
				case self::TABLE_PROCESS_OBJ:
					return 'proceso_objetados';
				case self::TABLE_VALIJ_OBJ:
					return 'valija_objetado';
				case self::TABLE_CHAT:
					return 'message';				
				default:
					throw new APIException("Unknown Name Table or Item");	
			}
		}

		public function where($itemOp) {
			$this->sql.= 'WHERE';
			$ks = array();

			foreach ($itemOp as $Op => $item)
				foreach ($item as $column => $value) {
					$k = " {$this->getTableName($column)} {$this->getOperator($Op)}";
					if ($value instanceof Handler_SQLBuilder)
						$k .= "({$value->getSQL()})";
					else{
						if ($value) 
							$value = $this->db->quote($value);
						$k .= "$value";
					}
					$ks[]= $k;
				}
			$this->sql .= implode(' AND ',$ks);
		}

		public function orderby($item) {
			$this->sql .= " ORDER BY {$this->getTableName($item)}"; 
		}

		public function limit(array $limit) {
			if (is_numeric($limit[0]) && is_numeric($limit[1])) 
				$this->sql .= " LIMIT {$limit[0]}, {$limit[1]} ";
		}

		public function addOr() {
			$this->sql .= " OR ";
		}

		public function addAnd() {
			$this->sql .= " AND ";
		}

		public function InnerJoin($table,$item) {
			$tablee = $this->getTableName($table);
			$this->sql .= ' INNER JOIN ';
			$ks = array();

			foreach ($item as $Op => $val)
				foreach ($val as $key => $value) {
					$ks[] = " {$tablee} ON {$tablee}.{$this->getTableName($value)} {$this->getOperator($Op)} {$this->getTableName($key)}.{$this->getTableName($value)} ";
				}
			$this->sql .= implode(' ', $ks);
		}

/*		public function RightJoin() {}

		public function LeftJoin() {}*/

		public function count($table_index) {
			$this->type = 0;
			$table = $this->getTableName($table_index);
			$this->sql .= "SELECT COUNT(*) FROM $table ";
		}

		public function Between($operator,$in,$out) {
			$op = $this->getOperator($operator);
			if (is_numeric($in) && is_numeric($out)) {
				$this->sql .= "$op $in AND $out";				
			}else
				throw new APIException("Error params not is numeric");
		}

		public function select($table_index, $columns = '*') {
			$this->type = 0;
			$table = $this->getTableName($table_index);
			$this->sql = 'SELECT ';
			$cols = array();
			if (is_array($columns)) {
				foreach ($columns as $key => $value) {
					$cols[] = $this->getTableName($value);
				}	
				$cols = implode(',', $cols);
				$this->sql.= $cols;
			}else {
				$this->sql .= " $columns ";
			}
			$this->sql .= " FROM $table ";
		}

		public function update($table_index,array $fields) {
			$this->type = 2;
			$table = $this->getTableName($table_index);
			$field = array();
			$value = array();
			$res = array();
			foreach ($fields as $key => $val) {
				$field[] = $this->getTableName($key).' = ? ';
				$value[] = $val;
			}
			
			unset($key);
			unset($val);
			$field = implode(',', $field);
			$this->sql = "UPDATE $table SET $field ";
			$this->values = array_values($value);
		}
		
		public function delete($table_index) {
			$this->type = 3;
			$table = $this->getTableName($table_index);
			$this->sql = "DELETE FROM $table ";
		}

		public function insert($table_index,$fields = array()) {
			$this->type = 1;
			$table = $this->getTableName($table_index);
			$field = array();
			$values = array();
			foreach ($fields as $key => $value) {
				$field[]  = $key;
				$values[] = $value;
			}
			$field  = implode(',',$field);
			$values = implode(',', $values);
			$this->sql = "INSERT INTO $table ($field) VALUES ($values) ";
			$this->values = array_values($values); 
		}

		public function commit() {
			switch ($this->type) {
				case 0:
					return $this->db->selectTable($this);
					break;
				case 1:
					return $this->db->insertTable($this);
					break;
				case 2:
					return $this->db->updateTable($this);
					break;
				case 3:
					return $this->db->deleteTable($this);
					break;
			}
		}

		

	}

?>