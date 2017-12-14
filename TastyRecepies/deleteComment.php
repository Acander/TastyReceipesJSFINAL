<?php
	require 'resources/fragments/init.php';
	
	use Functionality\Controller\Controller;
	
	use Functionality\Util\InputFiltering;

	if(!isset($_POST['c_id'])){
		return;
	}
	
	if(!empty($_POST['c_id'])){
		$c_id = (int) $_POST['c_id'];
	}
	else{
		$c_id = 0;
	}		
	
	if(InputFiltering::registrationInputFiltering($_POST['food'])){
		header("Location: ../TastyRecepies/index.php");
		exit();
	}
	
		$c_id = $_POST['c_id'];
		$food = $_POST['food'];
		
		$contr = Controller::getController();
		echo json_encode($contr->deleteComment($c_id, $food));
		
		header("Location: ../TastyRecepies/resources/views/$food.php");
		exit();
?>