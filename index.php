<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class='post-container'>
                    
                        <?php
                          include "config.php";
                          $a=0;
                          $sql5 = "SELECT * FROM `post`";
                          $result5 = mysqli_query($conn,$sql5);
                          while ($row = mysqli_fetch_assoc($result5)) {
                            $a=$a+1;
                          }
                          $a=$a/2;
                          $b=rand(1,$a);
                         
                          $sql = "SELECT * FROM `post` LIMIT 5 OFFSET $b ";
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


                        ?>
                        
                        <div class='post-content'>
                            <div class='row'>
                                <div class='col-md-4'>
                
                                    <a class='post-img' href='single.php?id=<?php echo $row['post_id'];?>'><img src='admin/upload/<?php echo $row['post_img']?>' alt=''></a>
                                </div>
                                <div class='col-md-8'>
                                    <div class='inner-content clearfix'>
                                        <h3><a href='single.php'><?php echo $row['title'];?></a></h3>
                                        <div class='post-information'>
                                            <span>
                                                <i class='fa fa-tags' aria-hidden='true'></i>
                                                <a href='category.php'><?php echo $row1['category_name'];?></a>
                                            </span>
                                            <span>
                                                <i class='fa fa-user' aria-hidden='true'></i>
                                                <a href='author.php'><?php echo $row2['username'];?></a>
                                            </span>
                                            <span>
                                                <i class='fa fa-calendar' aria-hidden='true'></i>
                                                <?php echo $row['post_date'];?>
                                            </span>
                                        </div>
                                        <p class='description'>
                                            <?php
                                             echo mb_substr($row['description'], 0, 100).".........." ;
                                            ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'];?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                          }
                        ?>
                         <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                        </ul>
                       
                    </div><!-- /post-container -->
                </div>

                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
