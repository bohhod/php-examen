<?php 
	
	define('ROOT_PATH', dirname(__FILE__));
	
	if($_GET['name'] == '' || $_GET['email'] == '')
	{
		echo "Bad parameters";
		die();
	}

	
	$inputArray = [
		'name' => $_GET['name'],
		'email' => $_GET['email'],
	];
	$inputArrayAsJSON = json_encode($inputArray);


	$i = 1;
	while(file_exists(ROOT_PATH.'/data/'.$i.'.json'))
	{
		$i++;
	}
	file_put_contents(ROOT_PATH.'/data/'.$i.'.json', $inputArrayAsJSON);
	
	header('Location: /newmap2/index.php');