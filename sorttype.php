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
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="http://php-tonyspogoni.rhcloud.com">How to make an Awesome Website</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="http://php-tonyspogoni.rhcloud.com">Home</a></li>
				<li><a href="http://php-tonyspogoni.rhcloud.com/assignments.html">Assignments</a></li>
				<li><a href="http://php-tonyspogoni.rhcloud.com/pokemon.php">Pokemon</a></li>
			</ul>
		</div>
	</nav>
	<div class ="jumbotron">


	<h1>Pokemon Types!</h1>
	</div>



		<?php

		echo "<div class=\"container\">";
		echo "<table class=\"table table-bordered\">";
		echo    "<thead>";
		echo		"<tr>";
		echo  	"<th>Type</th>";
		echo  	"<th>Pokemon</th>";
		echo  	"<th>Pokedex Number</th>";
		echo  	"<th>Score</th>";
		echo	 	"</tr>";
		echo		"</thead>";
		//foreach ($db->query('SELECT Name, pokedexNum FROM Pokemon') as $row)
		foreach	($db->query('SELECT * FROM Pokemon p JOIN Pokemon_Type pt ON p.ID = pt.POKEMON_ID JOIN Type t ON pt.TYPE_ID = t.ID ORDER BY TYPE') as $row)
		{

			$score =	$row['voteUps'] - $row['voteDowns'];
			echo 	  "<tbody>";
			echo		"<tr>";
			echo    "<td>" . $row['TYPE'] . "</td>";
			echo    "<td>" . $row['Name'] . "</td>";
			echo    "<td>" . $row['pokedexNum'] . "</td>";
			echo    "<td>" . $score . "</td>";
			echo		"</tr>";


		}

		echo    "</tbody>";
		echo    "</table>";
		echo    "</div>";
		?>
		<div class="container">
			<h2>Item to sort by</h2>
			<div class="btn-group">
				<button type="button" class="btn btn-primary">Choose a Topic to sort by</button>
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a href="http://php-tonyspogoni.rhcloud.com/sortname.php">Name</a></li>
					<li><a href="http://php-tonyspogoni.rhcloud.com/sorttype.php">Type</a></li>
					<li><a href="http://php-tonyspogoni.rhcloud.com/sortdex.php">Pokedex Number</a></li>
				</ul>
			</div>
		</div>
		<br>
				<form action="addPokemon.php" method="POST">
					<input type="text" name="name" placeholder="Name"></input>
					<input type="text" name="type" placeholder="Type"></input>
					<input type="text" name="pokedexNum" placeholder="Pokedex Number"></input>
					<input type="submit" value="Add a Pokemon"></input>
				</form>
		</body>
		</html>
