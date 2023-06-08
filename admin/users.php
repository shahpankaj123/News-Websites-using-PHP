<?php include "header.php";
  if($_SESSION['role']==0)
   {
     header("location:\aryan\News_project\admin\post.php");
   }
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
              <script
                src="https://code.jquery.com/jquery-3.6.1.js"
                integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
                crossorigin="anonymous">
              </script>
              <div class="col-md-12">
                  <table class="content-table" id="myTable">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                         <?php
                         include "config.php";
                         
                          $sql = "SELECT * FROM `user`";
                          $result = mysqli_query($conn,$sql);
                          while ($row = mysqli_fetch_assoc($result)) {
                            if($row['role']==1)
                            {
                                $rol="Admin";
                            }
                            else{
                                $rol="Normal";
                            }
                          echo"<tr>
                          <td>". $row['user_id'] ."</td>
                          <td>".$row['first_name']."  ".$row['last_name']." </td>
                          <td>". $row['username'] ."</td>
                           <td>". $rol ."</td>
                          
                          <td><button type='button' class='btn btn-secondary'><a href='/aryan/News_project/admin/update-user.php?id=".$row['user_id']."' style='text-decoration:none; color:white;'>EDIT</a></button></td>
                          <td><button type='button' class='btn btn-secondary'><a href='/aryan/News_project/admin/delete-user.php?id=".$row['user_id']."' style='text-decoration:none; color:white;'>Delete</a></button></td>

                          </tr>";
                         }

                         ?>
                  </tbody>
                  </table>
                  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
                  <script>
                  $(document).ready( function () {
                  $('#myTable').DataTable();
                  } );
                  </script>
              </div>
          </div>
      </div>

