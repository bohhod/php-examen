<?php 
	$root = dirname(dirname(__FILE__));
	
	$fileIndex = 1;
	while(file_exists($root . "/data/" . $fileIndex . ".json"))
		$fileIndex++;

	$arrPut = json_encode($_POST);
	$arrAsJson = file_put_contents($root . "/data/" . $fileIndex . ".json", $arrPut);


	header("Location: " . $_SERVER['HTTP_ORIGIN']."/newmap2/");
	die();