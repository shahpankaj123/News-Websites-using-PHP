<?php include "header.php"; 
include "config.php";

  if($_SESSION['role']==0)
   {
     header("location:\aryan\News_project\admin\post.php");
   }
if($_SERVER['REQUEST_METHOD']=='POST')
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $uname=$_POST['user'];
  $pass=$_POST['password'];
  $role=$_POST['role'];

  $sql="SELECT * FROM `user` WHERE username='$uname'";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  
  if($num==1)
  {
  echo "<div style='text-align:center; font-size:30px; color:red;'><b>ERROR!! Username already present</b></div>";
  }
  else{
    $sql1="INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES (NULL, '$fname', '$lname', '$uname', '$pass', '$role')";
    $result=mysqli_query($conn,$sql1);
    header("location:\aryan\News_project\admin\users.php");
  }

  
  
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="/aryan/News_project/admin/add-user.php" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
