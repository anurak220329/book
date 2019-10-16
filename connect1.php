<html>
<head>
<title>Database Programming PHP & MySQL PDO</title>
</head>
<body>
<?php


   $serverName = "localhost";
   $userName = "root";
   $userPassword = "12345678";
   $dbName = "book";
  
   $conn = new PDO("mysql:host=$serverName;dbname=$dbName",$userName,$userPassword);

	if($conn)
	{
		echo "Database Connected.";
	}
	else
	{
		echo "Database Connect Failed.";
	}


?>
</body>
</html>