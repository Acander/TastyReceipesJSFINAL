<?php
	require 'resources/fragments/init.php';
	
	use Functionality\Controller\Controller;
	use Functionality\Model\Comment;
	use Functionality\Util\InputFiltering;
	
	$contr = Controller::getController();
	echo \json_encode($contr->getComments($food));
	
?>