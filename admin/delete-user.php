<?php
include "config.php";
$ide=$_GET['id'];
$sql="DELETE FROM `user` WHERE `user`.`user_id` = $ide";
$result=mysqli_query($conn,$sql);
header("location:/aryan/News_project/admin/users.php");
mysqli_close($conn);
?>