<?php include "header.php";
  include "config.php";
  if($_SESSION['role']==0)
   {
     header("location:\aryan\News_project\admin\post.php");
   }
   $post_id="";
   $post_title="";
   $post_des="";
   $category_ide="";
   $post_image="";

 if($_SERVER['REQUEST_METHOD']=='GET') {
 
   $id=$_GET['id'];
 
 
   $sql="SELECT * FROM `post` WHERE post_id='$id'";
   $result=mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($result);

   $post_id=$row['post_id'];
   $post_title=$row['title'];
   $post_des=$row['description'];
   $category_ide=$row['category'];
   $post_image=$row['post_img'];
 
   
   
 }

 if($_SERVER['REQUEST_METHOD']=='POST') {

  
  if(empty($_FILES['fileToUpload']['name']))
  {
    $file_name=$_POST['pimg']; 
  }
  else{
    $error=array();

    $file_name=$_FILES['fileToUpload']['name'];
    $file_size=$_FILES['fileToUpload']['size'];
    $file_tmp=$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
    $file_ext=end(explode('.',$file_name));

    $extensions = array("jpeg","png","jpg","JPEG","PNG","JPG");

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
  $id=$_POST['post_id'];
  $title=$_POST['post_title'];
  $description=$_POST['postdesc'];
  $category=$_POST['category'];
  $category1=$_POST['cat_id'];
  $date=date("d M, Y");
  $author=$_SESSION['user_id'];
  
  $sql="UPDATE `post` SET `title` = '$title', `description` = '$description', `category` = '$category', `post_date` = '$date', `author` = '$author', `post_img` = '$file_name' WHERE `post`.`post_id` = $id ";
  $result=mysqli_query($conn,$sql);

  if($category!=$category1)
  {
    $sq="UPDATE category SET post=post + 1 WHERE category_id = {$category}";
    $result1=mysqli_query($conn,$sq); 
    if($result1)
    {
      $sq1="UPDATE category SET post=post - 1 WHERE category_id = {$category1}";
      $result2=mysqli_query($conn,$sq1);
    }
  }
  
  
  
  if($result)
  {
      header("location:\aryan\News_project\admin\post.php");
  }
  else {
      echo "failed query";
  }
}

 ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="\aryan\News_project\admin\update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $post_id ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $post_title ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5"><?php echo $post_des ?>
                </textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $category_ide ?>" placeholder="">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                <?php
                              include "config.php";

                              $sql = "SELECT * FROM `category`";
                               $result = mysqli_query($conn,$sql);
                               while ($row = mysqli_fetch_assoc($result))
                               {
                               echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                               }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="fileToUpload">
                <img  src="upload/<?php echo $post_image ?>" height="150px">
                <input type="hidden" name="pimg" value="<?php echo $post_image ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
