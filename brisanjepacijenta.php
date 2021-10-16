<?php
include "server/konekcija.php";

$id=$_GET['id'];
$sql = "DELETE FROM pacijenti WHERE id_pacijenta='".$id."'";
$mysqli->query($sql) or die($sql);

header("Location:listapacijenata.php");
 ?>