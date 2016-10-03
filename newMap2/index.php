<?php 	
	define('ROOT_PATH', dirname(__FILE__));

	require(ROOT_PATH . '/parts/header.php');

	$allFiles = scandir(ROOT_PATH . "/data");

	$jsonFiles = array_slice($allFiles, 2);
	
	foreach ($jsonFiles as $key => $value) 
	{
		$fileID = str_replace('.json', '', $value);
		$fileContent = file_get_contents(ROOT_PATH.'/data/' . $value);
		$fileContentAsJSON = json_decode($fileContent, true);

		echo "&nbsp;ID: " . $fileID . "<br>";
		echo "&nbsp;Name: " . $fileContentAsJSON['name'] . "<br>";
		echo "&nbsp;Email: " . $fileContentAsJSON['email'] . "<br>";
		echo '<a href="delete.php?action=delete&id='.$fileID.'">&nbsp;Delete</a>';
		echo "&nbsp;&nbsp;&nbsp;";
		echo '<a href="save_get.php?action=edit&id='.$fileID.'&name='. $fileContentAsJSON['name'] . '&email='.$fileContentAsJSON['email'].'" target="_blank">Edit</a>';
		echo "&nbsp;&nbsp;&nbsp;";
		echo '<a href="view.php?action=view&id='.$fileID.'" target="_blank">Show</a>';
		echo "<hr>";
	}
?>
	<form action="new_get.php" method="GET">
		<input type="hidden" name="action" value="save">
		<input type="text" name="name" placeholder=" Name">
		<br>
		<input type="email" name="email" placeholder=" Email">
		<br>
		<button type="submit">Create</button>
	</form>
<!--	
$allFiles = scandir(ROOT_PATH.'/data/users');

	$jsonFiles = array_diff($allFiles, ['..', '.']);

	foreach($jsonFiles as $file)
	{
		$fileID = str_replace('.json', '', $file);
		$fileContent = file_get_contents(ROOT_PATH.'/data/users/' . $file);
		$fileContentAsJSON = json_decode($fileContent, true);

		echo "ID: " . $fileID . "<br>";
		echo "Name: " . $fileContentAsJSON['name'] . "<br>";
		echo "Email: " . $fileContentAsJSON['email'] . "<br>";
		echo '<a href="/users/?action=delete&id='.$fileID.'">Delete</a>';
		echo "&nbsp;&nbsp;&nbsp;";
		echo '<a href="/users/?action=edit&id='.$fileID.'" target="_blank">Edit</a>';
		echo "&nbsp;&nbsp;&nbsp;";
		echo '<a href="/users/?action=view&id='.$fileID.'" target="_blank">Show</a>';
		echo "<hr>";
	}
?>

<form action="/users" method="GET">
	<input type="hidden" name="action" value="save">
	<input type="text" name="name" placeholder="Name">
	<br>
	<input type="email" name="email" placeholder="Email">
	<br>
	<button type="submit">Create</button>
</form>
-->

<?php

	require(ROOT_PATH . '/parts/footer.php');
