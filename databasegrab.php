<?php
	/*Don't forget to create a user for your database
	CREATE USER 'steve'@'localhost' IDENTIFIED BY 'nerdface';
	GRANT INSERT, SELECT, UPDATE, DELETE ON movies.* TO 'steve'@'localhost';
	flush privileges
	*/
	$dbHost = "";
	$dbPort = "";
	$dbUser = "";
	$dbPassword = "";

    $dbName = 'pokemon';

     $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');
	if ($openShiftVar === null || $openShiftVar == "")
	{
     // Not in the openshift environment
    $dbHost = "localhost";
	$dbHost = 'localhost';
	$dbUser = 'steve';
	$dbPassword = 'nerdface';
	}
	else
	{
    // In the openshift environment
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
	$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
	$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	}

	try {
		$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
	} catch (Exception $e) {
		echo $e;
		die();
	}
	?>

<!DOCTYPE html>
<html>
<body>
	<h1>Pokemon</h1>
	<ul>
		<?php
		$stmt = $db->prepare('SELECT Name from pokemon where id=:id');
		$stmt->bindValue(':id', 2, PDO::PARAM_INT);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo "<h3>Using the statement thing </h3>";
		foreach ($rows as $row)
		{
		echo '<li>' . $row['Name'] . "</li><br />";
		}

		echo "<h3>All data in Pokemon table</h3>";
		foreach ($db->query('SELECT * FROM pokemon') as $row)
		{
		echo '<li>' . $row['Name'] . "</li><br />";
		}

		?>
	<ul>

</body>
</html>
