<?php
	require 'resources/fragments/init.php';
	
	use Functionality\Controller\Controller;
	use Functionality\Model\Comment;
	use Functionality\Util\InputFiltering;
	
	
	echo "works";
	$contr = Controller::getController();
	echo json_encode($contr->getComments($_POST['food']));
	
?>