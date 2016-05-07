<!DOCTYPE HTML>
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
      </div>;
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://php-tonyspogoni.rhcloud.com">Home</a></li>
        <li><a href="http://php-tonyspogoni.rhcloud.com/assignments.html">Assignments</a></li>
        <li><a href="http://php-tonyspogoni.rhcloud.com/pokemon.php">Pokemon</a></li>
      </ul>
    </div>;
  </nav>
  <div class ="jumbotron">
    <h1 class ="text-center">A Survey: The Results</h1>
  </div>;
  <?php

  $result = fopen("survey.txt", "r") or die("Cannont open the file!");

  $B = 0;
  $D = 0;
  $A = 0;
  $R = 0;
  $C = 0;
  $V = 0;
  $S = 0;

  $K = 0;
  $J = 0;
  $H = 0;
  $Si = 0;
  $U = 0;
  $Ka = 0;

  $W = 0;
  $G = 0;
  $F = 0;

  $Y = 0;
  $N = 0;

  while(!feof($result)) {

$magic = fgets($result);

  $string = explode(' ', "$magic   ");


    if($string[0] == "Blastoise")   {
      $B++;
    }
    if($string[0] == "Dragonite"){
      $D++;
    }
    if($string[0] == "Arcanine"){
      $A++;
    }
    if($string[0] == "Rapidash") {
      $R++;
    }
    if($string[0] == "Charizard") {
      $C++;
    }
    if($string[0] == "Venusaur") {
      $V++;
    }
    if($string[0] == "Scyther") {
      $S++;
    }
    if($string[0] == "Kanto") {
      $K++;
    }
    if($string[1] == "Johto") {
      $J++;
    }
    if($string[1] == "Hoenn") {
      $H++;
    }
    if($string[1] == "Sinnoh") {
      $Si++;
    }
    if($string[1] == "Unova")  {
      $U++;
    }
    if($string[2] == "Water") {
      $W++;
    }
    if($string[2] == "Fire") {
      $F++;
    }
    if($string[2] == "Grass") {
      $G++;
    }
    if($string[3] == '\'Yes') {
      $Y++;
    }
    if($string[3] == '\'No' ) {
      $N++;
  }


  }


  echo "<div class =\"container\">";
  echo   "<div class =\"well\">";
  echo    "<div class =\"text-primary\">";
  echo $B;
  echo " People like Blastoise";
  echo "<br>";
  echo $D;
  echo " People like Dragonite";
  echo "<br>";
  echo $A;
  echo " People like Arcanine";
  echo "<br>";
  echo $R;
  echo " People like Rapidash";
  echo "<br>";
  echo $C;
  echo " People like Charizard";
  echo "<br>";
  echo $V;
  echo " People like Venusaur";
  echo "<br>";
  echo $S;
  echo " People like Scyther";
  echo "<br>";

  echo $K;
  echo " People like the Kanto region";
  echo "<br>";
  echo $J;
  echo " People like the Johto region";
  echo "<br>";
  echo $H;
  echo " People like the Hoenn region";
  echo "<br>";
  echo $Si;
  echo " People like the Sinnoh region";
  echo "<br>";
  echo $U;
  echo " People like the Unova region";
  echo "<br>";
  echo $Ka;
  echo " People like the Kalos region";
  echo "<br>";
  echo $W;
  echo " People like Water Starters";
  echo "<br>";
  echo $G;
  echo " People like Grass Startersn";
  echo "<br>";
  echo $F;
  echo " People like Fire Starters";
  echo "<br>";
  echo $Y;
  echo " People like Pokemon";
  echo "<br>";
  echo $N;
  echo " People dont't like Pokemon";
  echo "<br>";
  echo "</div>";
  echo "</div>";
  echo "</div>";

  fclose($result);

  ?>




  </html>
