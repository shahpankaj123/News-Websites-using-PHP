<?php include "header.php"; 
include "config.php";

  if($_SESSION['role']==0)
   {
     header("location:\aryan\News_project\admin\post.php");
   }  
   if($_SERVER['REQUEST_METHOD']=='POST')
   {
    $cname=$_POST['cat'];

    $sql="INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES (NULL, '$cname', '0')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        header("location:\aryan\News_project\admin\category.php");
    }


   }                        
    
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="\aryan\News_project\admin\add-category.php" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
