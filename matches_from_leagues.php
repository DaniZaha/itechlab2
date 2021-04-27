<?php

$m = new MongoClient();
$db = $m->selectDB('footballl_lab2');
$collection1 = new MongoCollection($db, 'Games');

$Query = array('league' => $_GET['league']);

$cursor1 = $collection1->find($Query);

$res = "<table>";
$res .= "<tr><th>League</th><th>DATE</th><th>PLACE</th><th>T1</th><th>T2</th><th>SCORE</th></tr>";

foreach ($cursor1 as $row) {
	$res .= "<tr><td>$row[league]</td><td>$row[date]</td><td>$row[place]</td><td>$row[T1]</td><td>$row[T2]</td><td>$row[score]</td></tr>";
        }

$res .= "</table>";

echo "$res";

$script = "<script>localStorage.setItem('data', '$res')</script>";

echo "$script"

?>

<style media="screen">
  table, th, td {
    border: 1px solid white;
    color: white;
    background-color: black;
  }

  td{
    padding: 10px;
  }
</style>