<?php

include "connect.php";

$nama = $_POST["nama"];
$type = $_POST["categorytype"];
$query = mysqli_query($con,"INSERT INTO `prodict_category`(`parent_id`, `category`) VALUES (".$type.",'".$nama."')");


?>