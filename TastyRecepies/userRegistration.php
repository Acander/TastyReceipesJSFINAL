<?php

	require 'resources/fragments/init.php';
	
	use Functionality\Controller\Controller;
	
	use Functionality\Util\InputFiltering;

	if(!isset($_POST["pressButton"])){
		return;
	}
	
	if(InputFiltering::registrationInputFiltering($_POST["email"])){
		header("Location: ../TastyRecepies/resources/views/UserRegister.php?UserRegister=emailFailure");
		exit();
	}else if(InputFiltering::registrationInputFiltering($_POST["pwd"])){
		header("Location: ../TastyRecepies/resources/views/UserRegister.php?UserRegister=emailFailure");
		exit();
	}else if(InputFiltering::registrationInputFiltering($_POST["pwd-repeat"])){
		header("Location: ../TastyRecepies/resources/views/UserRegister.php?UserRegister=emailFailure");
		exit();
	}
		$unescapedEmail = $_POST["email"];
		$unescapedPwd = $_POST["pwd"];
		$unescapedpwdRe = $_POST["pwd-repeat"];
		
		$contr = Controller::getController();
		$errorCode = $contr->userRegistration($unescapedEmail, $unescapedPwd, $unescapedpwdRe); //We register the user
		
		
		//errorCheck
		if ($errorCode == 0){
			header("Location: ../TastyRecepies/index.php");
			exit();
		}            
		else if($errorCode == 1){
			header("Location: ../TastyRecepies/resources/views/UserRegister.php?UserRegister=pwdFailure");
			exit();
		}
		else if($errorCode == 2){
			header("Location: ../TastyRecepies/resources/views/UserRegister.php?UserRegister=emailFailure");
			exit();
		}
?>