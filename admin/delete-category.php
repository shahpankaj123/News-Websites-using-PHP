<?php
include "config.php";
$ide=$_GET['id'];
$sql="DELETE FROM `category` WHERE `category_id` = $ide";
$result=mysqli_query($conn,$sql);
header("location:/aryan/News_project/admin/category.php");
mysqli_close($conn);
?>