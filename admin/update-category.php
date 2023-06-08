<?php include "header.php";
include "config.php";
  if($_SESSION['role']==0)
   {
     header("location:\aryan\News_project\admin\post.php");
   }
 
  $ftitle="";
  $id="";
if($_SERVER['REQUEST_METHOD']=='GET') {

  $id=$_GET['id'];


  $sql="SELECT * FROM `category` WHERE category_id='$id'";
  $result=mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);

  $ftitle=$row['category_name'];
  
}
if($_SERVER['REQUEST_METHOD']=='POST') {

$ftitle=$_POST['cat_name'];
$id=$_POST['cat_id'];

$sql="UPDATE `category` SET `category_name` = '$ftitle' WHERE `category`.`category_id` = $id ";
$result=mysqli_query($conn,$sql);

header("location:\aryan\News_project\admin\category.php");
mysqli_close($conn);
  
}
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="\aryan\News_project\admin\update-category.php" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $id ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $ftitle ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
