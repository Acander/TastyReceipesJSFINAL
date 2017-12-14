<?php

	/**
	*	This code validates users email- and password input
	*/
	
	require_once 'resources/fragments/init.php';
	
	use Functionality\Controller\Controller;
	
	use Functionality\Util\InputFiltering;
	
	if(!isset($_POST["submit"])){
		return;
	}
	
	if(InputFiltering::registrationInputFiltering($_POST["email"])){
		header("Location: ../TastyRecepies/index.php?login=error");
		exit();
	}
	else if(InputFiltering::registrationInputFiltering($_POST["pwd"])){
		header("Location: ../TastyRecepies/index.php?login=error");
		exit();
	}
		
	$unescapedEmail = $_POST["email"];
	$unescapedPwd = $_POST["pwd"];
	
	$contr = Controller::getController();
	$errorCode = $contr->conValUser($unescapedEmail, $unescapedPwd);
	
	if($errorCode == 1){
		header("Location: ../TastyRecepies/index.php?login=error");
		exit();
	}
	else if($errorCode == 0){
		header("Location: ../TastyRecepies/resources/views/MainPage.php");
		exit();
	}
	
		
?>