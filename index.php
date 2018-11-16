<head>
	<style>
/* Style the header */
header {
 background-color: #666;
 padding: 30px;
 text-align: center;
 font-size: 35px;
 color: white;
}
/* Style the footer */
footer {
 background-color: #777;
 padding: 10px;
 text-align: center;
 color: white;
}
</style>
</head>
<body>
<header>
 <h2>Book for friends</h2>
</header>

<form action="index.php" method="post">
Name: <input type="text" name="name">
<input type="submit" value = "Add new friend">
</form>
<?php
	$filename = 'friends.txt';
	$nameFilter = NULL;
	$name=NULL;
	$file = fopen("friends.txt","r");
	$namearray  = array();
	while(!feof($file))	{
			array_push($namearray,fgets($file));
	}


	fclose($file);
	if(isset($_POST['name']) && !empty($_POST['name'])){
		$file = fopen("$filename", "a+");
		$name = $_POST['name'];
		array_push($namearray,$name);
		fwrite($file,  PHP_EOL."$name" );
		fclose($file);
		foreach ($namearray as $value) {
		echo "<li>".$value."</li>";
	}
	}

	if (isset($_POST['nameFilter']) && !empty($_POST['nameFilter'])) {
		echo "<h2>My best friends:</h2>";
		$nameFilter = $_POST['nameFilter'];
		foreach ($namearray as $value) {
			if(strlen(strstr($value, $nameFilter)) > 0){
				echo "<li>".$value."</li>";
		}
	}}
	else if (empty($_POST['name']) && empty($_POST['nameFilter']))
	{
		foreach ($namearray as $value) {
			echo "<li>".$value."</li>";
		}
	}
?>
<form action="index.php" method="post">
<input type="text" name="nameFilter" value="<?=$nameFilter?>">
<input type="submit" value='Filter list'>
</form>
<footer>
 <p>Footer</p>
</footer>
</html>
</body>
