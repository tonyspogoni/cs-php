
<?php

$name = htmlspecialchars($_POST['name']);
$type = htmlspecialchars($_POST['type']);
$pokedexNum = htmlspecialchars($_POST['pokedexNum']);
$query = "INSERT INTO Pokemon(Name, pokedexNum) VALUES (:name, :pokedexNum)";
$stmt = $db->prepare($query);
$stmt->bindValue(":name", $title, PDO::PARAM_STR);
$stmt->bindValue(":pokedexNum", $year, PDO::PARAM_INT);
$stmt->execute();
header("Location: databasegrab.php");
die("Page should have been redirected");


?>
