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
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://php-tonyspogoni.rhcloud.com">Home</a></li>
        <li><a href="http://php-tonyspogoni.rhcloud.com/assignments.html">Assignments</a></li>
        <li><a href="http://php-tonyspogoni.rhcloud.com/pokemon.php">Pokemon</a></li>
      </ul>
    </div>
  </nav>
  <div class ="jumbotron">
    <h1 class ="text-center">Yeah I like Pokemon</h1>
  </div>
  <form role="form" method="POST" >
    <div class="form-group">
      <label for="pokemon">Which Pokemon is the best Pokemon?</label>
      <input type="pokemon" name="pokemon">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>




    <?php
    if (isset($_POST['pokemon']) and $_POST['pokemon'] != 'Dragonite' and $_POST['pokemon'] != ''){
      echo "<br>";
      echo "<p class=\"text-center\">Wrong! <br> Dragonite is the best Pokemon!";
      echo "<img class=\"img-responsive center-block\"  src=\"Dragonitesad.png\" title=\"Look you made him sad!\">";
    }
    if (isset($_POST['pokemon']) and $_POST['pokemon'] == ''){
      echo "<br>";
      echo "<p class=\"text-center\">Please Enter a Pokemon";
      echo "<img class=\"img-responsive center-block\"  src=\"Rocket.png\" title=\"What are you team Rocket?\">";
    }
    if (isset($_POST['pokemon']) and $_POST['pokemon'] == 'Dragonite'){
      echo "<br>";
      echo "<p class=\"text-center\">You are right!";
      echo "<img class=\"img-responsive center-block\" width=\"500\"  src=\"Dragonite.png\" title=\"You sure know your Pokemon!\">";
    }


    ?>
  </html>
