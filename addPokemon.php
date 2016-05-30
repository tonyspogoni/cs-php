
<?php
require("databasegrab.php");
$db = connectToDb();

$name = htmlspecialchars($_POST['name']);
$type = htmlspecialchars($_POST['type']);
$pokedexNum = htmlspecialchars($_POST['pokedexNum']);
$query = "INSERT INTO Pokemon(Name, pokedexNum) VALUES (:name, :pokedexNum)";
$stmt = $db->prepare($query);
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":pokedexNum", $pokedexNum, PDO::PARAM_INT);
$stmt->execute();
//$query2 = "INSERT INTO Type(TYPE) VALUES (:type)";
//$stmt2 = $db->prepare($query2);
//$stmt2->bindValue(":type", $type, PDO::PARAM_STR);
//$stmt2->execute();
echo "got er done";
//header("Location: databasegrab.php");
//die("Page should have been redirected");


?>
