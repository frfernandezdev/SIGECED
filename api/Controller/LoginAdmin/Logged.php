<?php 
	if (local != 'lg3o4g1e00of'){
		$return = array('e' => 3,'m' => 'Error local verify');
		exit();		
	}

	use Handler\Handler_SQLBuilder;

	if ($user->getLogged() === false) {
		$email     = $ObjJson->email;
		$password  = $ObjJson->password;


		$where = array(
			Handler_SQLBuilder::OPERATOR_EQUAL => array(
				Handler_SQLBuilder::TABLE_USERS_EMAIL => $email
			)
		);

		$query = new Handler_SQLBuilder($db);
		$query->select(Handler_SQLBuilder::TABLE_USERS);
		$query->where($where);

		if ($users = $db->selectTable($query)){
			$users = $users->fetch(PDO::FETCH_ASSOC);
			$pass = $users['pas_usu'];
			if (password_verify($password,$pass)) {
				$token = password_hash($pass.time().$password,PASSWORD_DEFAULT);
				$_SESSION['session']['token'] = $token;
				$fields = array(
					Handler_SQLBuilder::TABLE_USERS_TOKEN => $token
				);
				$query = new Handler_SQLBuilder($db);
				$query->update(Handler_SQLBuilder::TABLE_USERS,$fields);
				$query->where($where);
				$db->updateTable($query);
				
				$return = array(
					'e'      => 0,
					'm'      => 'Ingreso Exitoso', 
					'tokena' => $token,'tokenSecret' => $token
				);

			}else {
				$return = array('e' => 2, 'm' => 'Contraseña Invalida');
			}
		}else {
			$return = array('e' => 1,'m' => 'Usuario no Existe');
		}
	}else 
		$return = array('e' => 5,'m' => 'Ya se ha Iniciado Sesion' );


?>