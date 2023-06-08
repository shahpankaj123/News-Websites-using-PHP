<?php include "header.php";
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php
                         include "config.php";
                         
                          $sql = "SELECT * FROM `post`";
                          $result = mysqli_query($conn,$sql);
                          while ($row = mysqli_fetch_assoc($result)) {
                            $ide1=$row['category'];
                            $ide2=$row['author'];

                          $sq1="SELECT * FROM `category` WHERE category_id='$ide1'";
                          $sq2="SELECT * FROM `user` WHERE user_id='$ide2'";

                          $result1 = mysqli_query($conn,$sq1);
                          $result2 = mysqli_query($conn,$sq2);

                          $row1 = mysqli_fetch_assoc($result1);
                          $row2 = mysqli_fetch_assoc($result2);




                          echo"<tr>
                          <td>". $row['post_id'] ."</td>
                          <td>". $row['title'] ." </td>
                          <td>". $row1['category_name'] ."</td>
                          <td>". $row['post_date'] ."</td>
                          <td>". $row2['username'] ."</td>
                           
                          
                          <td><button type='button' class='btn btn-secondary'><a href='/aryan/News_project/admin/update-post.php?id=".$row['post_id']."' style='text-decoration:none; color:white;'>EDIT</a></button></td>
                          <td><button type='button' class='btn btn-secondary'><a href='/aryan/News_project/admin/delete-post.php?id=".$row['post_id']."' style='text-decoration:none; color:white;'>Delete</a></button></td>

                          </tr>";
                         }

                         ?>
                      </tbody>
                  </table>
                  <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
