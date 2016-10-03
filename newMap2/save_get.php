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

	if(intval($_GET['id']) > 0)
	{
		// Means that we update
		$userID = intval($_GET['id']);
		
		if(!file_exists(ROOT_PATH.'/data/'.$userID.'.json'))
			die("User with provided id does not exist's");

		file_put_contents(ROOT_PATH.'/data/'.$userID.'.json', $inputArrayAsJSON);
	}
	
	//header('Location: /newmap2/index.php');
	//die();
?>	
	<form action="" method="GET">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		<input type="text" name="name" placeholder=" Name">
		<br>
		<input type="email" name="email" placeholder=" Email">
		<br>
		<button type="submit">Create</button>
	</form>