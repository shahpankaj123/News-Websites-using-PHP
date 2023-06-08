<?php
include "config.php";
if(isset($_FILES['fileToUpload']))
{
    $error=array();

    $file_name=$_FILES['fileToUpload']['name'];
    $file_size=$_FILES['fileToUpload']['size'];
    $file_tmp=$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
    $file_ext=end(explode('.',$file_name));

    $extensions = array("jpeg","png","jpg");

    if(in_array($file_ext,$extensions) === false)
    {
        $error[]="this extensions file not allowed,please choose jpeg or jpg";

    }

    if($file_size > 1024*1024*2)
    {
        $error[]="FILE SIZES MUST BE LESS THEN 2MB";
    }

    if(empty($error) == true)
    {
           move_uploaded_file($file_tmp,"upload/".$file_name);
    }else{
        print_r($error);
        die();
    }
}
session_start();
$title=$_POST['post_title'];
$description=$_POST['postdesc'];
$category=$_POST['category'];
$date=date("d M, Y");
$author=$_SESSION['user_id'];

$sql="INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES (NULL, '$title', '$description', '$category', '$date', '$author', '$file_name');";

$sql .="UPDATE category SET post=post + 1 WHERE category_id = {$category}";

$result=mysqli_multi_query($conn,$sql);

if($result)
{
    header("location:\aryan\News_project\admin\post.php");
}
else {
    echo "error";
}


?>