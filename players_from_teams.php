<?php

$m = new MongoClient();
$db = $m->selectDB('footballl_lab2');
$collection1 = new MongoCollection($db, 'Teams');

$Query = array('name' => $_GET['teamp']);

$cursor1 = $collection1->find($Query);

$res = "<table>";
$res .= "<tr><th>Players</th></tr>";

foreach ($cursor1 as $row) {

	foreach ($row['players'] as $name) {
		$res .= "<tr><td>$name</td></tr>";
	}
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