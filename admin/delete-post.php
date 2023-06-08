<?php
session_start();
if($_SESSION['role']==1)
{
include "config.php";
$ide=$_GET['id'];


$sql1="SELECT * FROM `post` WHERE `post`.`post_id` = $ide ";
$result1=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result1);

$catid=$row['category'];

$sq="UPDATE category SET post=post - 1 WHERE category_id = {$catid}";
$result2=mysqli_query($conn,$sq); 

$sql="DELETE FROM `post` WHERE `post`.`post_id` = $ide";
$result=mysqli_query($conn,$sql);

header("location:/aryan/News_project/admin/post.php");
mysqli_close($conn);

header("location:\aryan\News_project\admin\post.php");
}
header("location:\aryan\News_project\admin\post.php");



?>