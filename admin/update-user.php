<?php include "header.php"; 
include "config.php";
  if($_SESSION['role']==0)
   {
     header("location:\aryan\News_project\admin\post.php");
   }
$ide="";
$fnam="";
$lnam="";
$user="";
if ($_SERVER['REQUEST_METHOD']=='GET') {
  $id=$_GET['id'];

  $sql="SELECT * FROM `user` WHERE user_id='$id'";
  $result=mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  $ide=$row['user_id'];
  $fnam=$row['first_name'];
  $lnam=$row['last_name'];
  $user=$row['username'];
}
if (isset($_POST['submit'])) {

$ide=$_POST['user_id'];
$fnam=$_POST['f_name'];
$lnam=$_POST['l_name'];
$user=$_POST['username'];
$rol=$_POST['role'];

$sql="UPDATE `user` SET `first_name` = '$fnam', `last_name` = '$lnam', `username` = '$user', `role` = '$rol' WHERE `user`.`user_id` = $ide";
$result=mysqli_query($conn,$sql);
header("location:\aryan\News_project\admin\users.php");
mysqli_close($conn);
  
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $ide ?>"  placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $fnam ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $lnam ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $user ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                              <option value="0">normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
