<?php

$m = new MongoClient();
$db = $m->selectDB('footballl_lab2');
$collection1 = new MongoCollection($db, 'Games');
$collection2 = new MongoCollection($db, 'Teams');

$cursor1 = $collection1->find();
$cursor2 = $collection2->find();

echo "<div class=\"forms\">";

echo "<form action=\"matches_from_leagues.php\" method=\"get\" id=\"getPlayer\">";
echo "<label for=\"league\">Matches from: </label>";
echo "<select name=\"league\">";

foreach ($cursor1 as $row) {
        echo "<option value=\"".$row['league']."\">".$row['league']."</option>";
      }

echo "</select>";
echo "<input type=\"submit\" value=\"Matches from this league\" name=\"button\">";
echo "</form>";


echo "<form action=\"players_from_teams.php\" method=\"get\" id=\"getPlayer\">";
echo "<label for=\"teamp\">Players from: </label>";
echo "<select name=\"teamp\">";

foreach ($cursor2 as $row) {
        echo "<option value=\"".$row['name']."\">".$row['name']."</option>";
      }

echo "</select>";
echo "<input type=\"submit\" value=\"Players from this team\" name=\"button\">";
echo "</form>";


echo "<form action=\"games_with_teams.php\" method=\"get\" id=\"getPlayer\">";
echo "<label for=\"teamg\">Games with: </label>";
echo "<select name=\"teamg\">";

foreach ($cursor2 as $row) {
        echo "<option value=\"".$row['name']."\">".$row['name']."</option>";
      }

echo "</select>";
echo "<input type=\"submit\" value =\"Games with this team\" name=\"button\">";
echo "</form>";

echo "</div>";

echo "<br><br>";

$script = "<script>document.write('Previous result' + localStorage.getItem('data'))</script>";

echo "$script";


?>


<style media="screen">
  form {
  margin: 10px;
  padding-left: 50px;
  padding-right: 50px;
  background-color: black;
  color: white;
}

.forms{
  display: inline-block;
}

input[type=submit] {
  background-color: white;
  border: none;
  color: black;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  transition-duration: 0.4s;
}

input[type=submit]:hover{
  background-color: #ddd;
}

table, th, td {
    border: 1px solid white;
    color: white;
    background-color: black;
  }

  td{
    padding: 10px;
  }

</style>