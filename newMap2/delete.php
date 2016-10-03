<?php 
	define('ROOT_PATH', dirname(__FILE__));

	$userID = intval($_GET['id']);

	if($userID == 0)
		die("Enter correct user id");

	if(!file_exists(ROOT_PATH.'/data/'.$userID.'.json'))
		die("User with provided id does not exist's");

	unlink(ROOT_PATH.'/data/'.$userID.'.json');
	
	header('Location: /newmap2/index.php');