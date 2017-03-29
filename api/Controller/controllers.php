<?php 
	require_once ('../Handler/autoload.php');

	header('Content-Type: application/json');


	use Handler\Handler_Database;
	use Handler\Handler_User;
	use Handler\Handler_Session;
	use Handler\Entities\Handler_Usuario;
	use Handler\Entities\Handler_Fiscal;
	use Handler\Entities\Handler_Module;
	use Handler\Entities\Handler_Handler_Report_Ced;
	use Handler\Entities\Handler_Handler_Report_Obj;
	use Handler\Entities\Handler_Grafic;
	use Handler\Entities\Handler_Chat;


	$ObjJson = json_decode(file_get_contents('php://input'));
	if (isset($ObjJson->TypeOp)) {
		$TypeOp = $ObjJson->TypeOp;
	}else {
		$TypeOp = $_GET['TypeOp'];
	}

	session_start();

	if ($db = Handler_Database::getInstance()) {
		$hs = new Handler_Session();
		$user = $hs->returnUser();
		if ($user->getLogged()) {
			switch ($TypeOp) {
				case 'usuario':
					$usuario = new Handler_Usuario($user,$db);
					$return = $usuario->autoRun();
					if (!$return)
						$return = array('e' => 1, 'm' => 'Not response this Opcion');
					break;
				case 'fiscal':
					$usuario = new Handler_Fiscal($user,$db);
					$return = $usuario->autoRun();
					if (!$return)
						$return = array('e' => 1, 'm' => 'Not response this Opcion');
					break;
				case 'module':
					$usuario = new Handler_Module($user,$db);
					$return = $usuario->autoRun();
					if (!$return)
						$return = array('e' => 1, 'm' => 'Not response this Opcion');
					break;
				case 'report_ced':
					 $usuario = new Handler_Report_Ced($user,$db);
					 $return = $usuario->autoRun();
					 if (!$return)
					 	$return = array('e' => 1, 'm' => 'Not response this Opcion');
					break;				
				case 'report_obj':
					$usuario = new Handler_Report_Obj($user,$db);
					$return = $usuario->autoRun();
					if (!$return)
						$return = array('e' => 1, 'm' => 'Not response this Opcion');
					break;
				case 'grafic':
					$usuario = new Handler_Grafic($user,$db);
					$return = $usuario->autoRun();
					if (!$return)
						$return = array('e' => 1, 'm' => 'Not response this Opcion');
					break;
				case 'chat':
					$usuario = new Handler_Chat($user,$db);
					$return = $usuario->autoRun();
					if (!$return)
						$return = array('e' => 1, 'm' => 'Not response this Opcion');
					break;
				case 'logout':
					define('local', 'df123rtgsader');
					require_once('LoginAdmin/Loggout.php');
					break;
				case 'login':
					$return = array('e' => 0,'m' => 'Ya se ha Iniciado Sesion','location' => 'main');
					break;
				default:
					$return = array('e' => 204,'m' => 'Operation found');
					break;
			}
		}else 
			switch ($TypeOp) {
				case 'login':
					define('local', 'lg3o4g1e00of');
					require_once('LoginAdmin/Logged.php');
					break;
				default:
					$return = array('e' => 11,'m' => 'Not Logged, Operation found');
					break;
			}	
	}else {
		$return = array('e' => 3,'m' => 'Error Database::getInstance');
	}

	echo json_encode($return);

?>