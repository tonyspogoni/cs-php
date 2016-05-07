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
    <h1 class ="text-center">A Survey</h1>
  </div>
  <form role="form" method="POST" action="submit.php" >
  <div class="radio">
    <h4>Which of these Pokemon is best? </h4>
    <label><input type="radio" name="pokemon" value="Dragonite">Dragonite</label><br>
    </div>
    <div class="radio">
    <label><input type="radio" name="pokemon" value="Arcanine">Arcanine</label><br>
    </div>
    <div class="radio">
    <label><input type="radio" name="pokemon" value="Rapidash">Rapidash</label><br>
    </div>
    <div class="radio">
    <label><input type="radio" name="pokemon" value="Scyther">Scyther</label><br>
    </div>
    <div class="radio">
    <label><input type="radio" name="pokemon" value="Blastoise">Blastoise</label><br>
    </div>
    <div class="radio">
    <label><input type="radio" name="pokemon" value="Charizard">Charizard</label><br>
    </div>
    <div class="radio">
    <label><input type="radio" name="pokemon" value="Venusaur">Venusaur</label><br>
  </div>
  <div class="radio disabled">
    <label><input type="radio" name="pokemon" disabled>Lapras</label>
  </div>
  <br>
  <h4>Which Pokemon Region is best?</h4>
  <div class="form-group">
    <label for="sel1">Select list:</label>
    <select name="region">
      <option>Kanto</option>
      <option>Johto</option>
      <option>Hoenn</option>
      <option>Sinnoh</option>
      <option>Unova</option>
      <option>Kalos</option>
    </select>
  </div>
  <br>
  <div class="radio">
    <h4>What Pokemon Starter Type is best?</h4>
    <label><input type="radio" name="type" value="Water">Water</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="type" value="Grass">Grass</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="type" value="Fire">Fire</label>
  </div>
  <br>

  <div class="radio">
    <h4>Do you actually like Pokemon?</h4>
  <div class="radio">
    <label><input type="radio" name="yesno" value="Yes ">Yes</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="yesno" value="No ">No</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>





  </html>
