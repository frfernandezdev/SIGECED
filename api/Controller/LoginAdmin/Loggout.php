<?php 
	if (local != 'df123rtgsader') {
		$return = array('e' => 1,'m' => 'Error local verify');
		exit();
	}

	use Handler\Handler_SQLBuilder;

	if ($user->getLogged() === true) {

		if ($_GET['tokena'] === $_GET['tokenSecreta']) {
			$token = $_GET['tokena'];
		}

		$where = array(
			Handler_SQLBuilder::OPERATOR_EQUAL => array(
				Handler_SQLBuilder::TABLE_USERS_TOKEN => $token
			)
		);

		$query = new Handler_SQLBuilder($db);
		$query->select(Handler_SQLBuilder::TABLE_USERS);
		$query->where($where);

		if ($rootUser = $db->selectTable($query)) {
			$user->pushupdateLastOnline();
			$user->pushLoggout();
			$_SESSION['session']['token'] = '';
			$_SESSION['session'] = '';
			unset($_SESSION);
			session_unset();
			session_destroy();
			$return =array('e' => 0,'m' => 'Loggout Fine');
		}

	}else {
		$return = array('e' => 5,'m' => 'Not Logged');
	}

?>