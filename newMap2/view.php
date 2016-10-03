<?php 
	define('ROOT_PATH', dirname(__FILE__));
	
	$userID = intval($_GET['id']);

	if($userID == 0)
		die("Enter correct user id");

	if(!file_exists(ROOT_PATH.'/data/'.$userID.'.json'))
		die("User with provided id does not exist's");

	$fileContent = file_get_contents(ROOT_PATH.'/data/'.$userID.'.json');
	$fileDataAsArray = json_decode($fileContent, true);

	echo '<pre>';
	print_r($fileDataAsArray);
	echo '</pre>';
	die();

	//dd($fileDataAsArray);