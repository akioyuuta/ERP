<?php

include "connect.php";

$gid = $_GET["id"];
$query = mysqli_query($con,"DELETE FROM `PRODUCT` WHERE id=".$gid);
header("Location:product.php");


?>