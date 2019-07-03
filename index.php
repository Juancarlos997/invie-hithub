<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';

$user_session = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
	echo "Hay session";
	$user->setUser($UserSession->getCurrentUser());
	include_once'vistas/home.php';

}else if(isset($_POST['username']) && isset($_POST['password'])){
	//echo "Validacion de login";
	$userForm = $_POST['username'];
	$passForm = $_POST['password'];
	if($user->userExists($userForm,$passForm)){
		//echo "usuario validado";
		//$UserSession->setCurrentUser($userForm);
		//$user->setUser($userForm);
		include_once 'vistas/home.php';
	}else{
		//echo "Credenciales incorrctas";
		$errorLogin = "Credenciales incorrectas";
		include_once 'vistas/login.php';
	}
}else{
	//echo "Login";
	include_once 'vistas/login.php';
}


?>