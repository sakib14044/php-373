<!-- header start -->
<?php
  include 'include/dashboard/header.php';
?>
  <!-- header end -->

    <!-- Navbar -->
    <?php 
    include 'include/dashboard/nav.php';

    ?>
  <!-- /.navbar -->

  <!-- Sidebar -->
    <?php
    
      include 'include/dashboard/sidebar.php';
    ?>
    <!-- /.sidebar -->
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php 
            if (isset($_GET['do'])) {
              // code...
              $do= $_GET['do'];
              if ($do=='Add') { ?>
                  <!-- // post HTML form... -->
                  <form action="post.php?do=Insert" method="post" enctype="multipart/form-data">
                    <div class="row pt-4">
                      <div class="col-md-9 mx-auto">
                        <h3>Add A New Post</h3>
                        <div class="form-group">
                          <label for="inputName"> Post Tittle</label>
                          <input type="text" id="inputName" class="form-control" name="tittle" required />
                        </div>
                        <div class="form-group">
                          <label for="inputName">Post Description</label>
                          <textarea class="form-control" required name="description"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="inputName">Category</label>
                          <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            <!-- <option > -->
                              <?php 
                                $select_cat  ="SELECT * FROM category ORDER BY cat_name ASC";
                                $select_query=mysqli_query($db, $select_cat);
                                while ($row=mysqli_fetch_assoc($select_query)) {
                                  // code...
                                  $cat_id  =$row['cat_id'];
                                  $cat_name=$row['cat_name'];
                                  ?>
                                  <option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option>
                                <?php }
                              ?>
                            <!-- </option> -->
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="inputName"> Tags </label>
                          <input type="text" id="inputName" class="form-control" name="tag" required />
                        </div>
                        <div class="form-group">
                          <label for="inputName">Select status</label>
                          <select id="inputName" class="form-control" name="status">
                            <option>Select status</option>
                            <option value="1">Publish</option>
                            <option value="2">Draft</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="inputName">Feature Image</label><br>
                          <input type="file" id="inputName" name="image" />
                        </div>
                        <div class="form-group">
                          <input type="submit" id="inputName" class="btn btn-primary" name="add_post" value="Add Post" />
                        </div>
                      </div>
                    </div>
                  </form>
                  
                <?php }
                elseif ($do=='Insert') {
                  // code...
                  if (isset($_POST['add_post'])) {
                    // code...
                    $tittle       = mysqli_real_escape_string($db, $_POST['tittle']);
                    $description  = mysqli_real_escape_string($db, $_POST['description']);
                    $category     = $_POST['category'];
                    $tag          = mysqli_real_escape_string($db, $_POST['tag']);
                    $status       = $_POST['status'];
                    $post_author  = $_SESSION['user_id'];
                    $image        = $_FILES['image']['name'];
                    $tem_locate   = $_FILES['image']['tmp_name'];
                    $rand         = rand(0, 999999);
                    $feature_image=$rand."_".$image ;
                    move_uploaded_file($tem_locate, 'dist/img/post/'.$feature_image);
                    $insert_post  ="INSERT INTO post (post_tittle, post_des, post_cat, post_image, tag, author, status, post_date) VALUES ('$tittle', '$description', '$category', '$feature_image', '$tag', '$post_author', '$status', now() )";
                      echo $insert_post;
                    $post_query   =mysqli_query($db, $insert_post);

                    if ($post_query) {
                      // code...
                      header('location:post.php');
                    }else{
                      die("Error".mysqli_error($db));
                    }
                    
                  }
                }
                elseif ($do=='Edit') {
                  if (isset($_GET['edit_post'])) {
                      $edit_post       =$_GET['edit_post'];
                      $select_post_edit="SELECT * FROM post WHERE post_id='$edit_post'";
                      $select_post_edit_sql=mysqli_query($db, $select_post_edit);
                      while ($row=mysqli_fetch_array($select_post_edit_sql)) {
                      $post_id_edit    =$row['post_id'];
                      $post_tittle_edit=$row['post_tittle'];
                      $post_des_edit   =$row['post_des'];
                      $post_cat_edit   =$row['post_cat'];
                      $post_image_edit =$row['post_image'];
                      $tag_edit        =$row['tag'];
                      $author_edit     =$row['author'];
                      $status_edit     =$row['status']; 
                      $post_date_edit  =$row['post_date']; 
                      }
                    }

                  ?>
                  <form action="post.php?do=Update" method="post" enctype="multipart/form-data">
                    <div class="row pt-4">
                    <div class="col-md-9 mx-auto">
                      <h3>Update Your Post</h3>
                      <div class="form-group">
                        <label for="inputName"> Post Tittle</label>
                        <input type="text" id="inputName" class="form-control" value="<?php echo $post_tittle_edit;?>" name="tittle" required />
                      </div>
                      <div class="form-group">
                        <label for="inputName">Post Description</label>
                        <textarea class="form-control" required name="description"><?php echo $post_des_edit;?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="inputName">Category</label>
                        <select name="category" class="form-control">
                          <option value="">Select Category</option>
                          <!-- <option > -->
                            <?php 
                              $select_cat  ="SELECT * FROM category";
                              $select_query=mysqli_query($db, $select_cat);
                              while ($row=mysqli_fetch_assoc($select_query)) {
                                // code...
                                $cat_id  =$row['cat_id'];
                                $cat_name=$row['cat_name'];
                                ?>
                                <option value="<?php echo $cat_id;?>" <?php if ($cat_id==$post_cat_edit) {
                                  echo 'selected';
                                }?>><?php echo $cat_name;?></option>
                              <?php }
                            ?>
                          <!-- </option> -->
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputName"> Tags </label>
                        <input type="text" id="inputName"  value="<?php echo $post_tittle_edit;?>" class="form-control" name="tag" required />
                      </div>
                      <div class="form-group">
                        <label for="inputName">Select status</label>
                        <select id="inputName" class="form-control" name="status">
                          <option>Select status</option>
                          <option value="1" <?php if ($status_edit==1) {
                            // code...
                            echo 'selected';
                          }?>>Publish</option>
                          <option value="2" <?php if ($status_edit==2) {
                            // code...
                            echo 'selected';
                          }?>>Draft</option>
                        </select>
                      </div>
                      <div>
                        <img src="dist/img/post/<?php echo $post_image_edit;?>" width="50px">
                      </div>
                      <div class="form-group">
                        <label for="inputName">Update Image</label><br>
                        <input type="file" id="inputName" name="image" />
                      </div>
                      <input type="hidden" name="edit_post" value="<?php echo $edit_post;?>">
                      <div class="form-group">
                        <input type="submit" id="inputName" class="btn btn-primary" name="update" value="Update Post" />
                      </div>
                    </div>
                    </div>
                  </form>
                <?php }
                elseif ($do=='Update') {
                  // code...
                  if (isset($_POST['update'])) {
                    // code...
                    $edit_post    = $_POST['edit_post'];
                     $tittle      = mysqli_real_escape_string($db, $_POST['tittle']);
                    $description  = mysqli_real_escape_string($db, $_POST['description']);
                    $category     = $_POST['category'];
                    $tag          = mysqli_real_escape_string($db, $_POST['tag']);
                    $status       = $_POST['status'];
                    $image        = $_FILES['image']['name'];
                    $tem_locate   = $_FILES['image']['tmp_name'];
                    if (!empty($image)) {
                      // code...
                      $rand         = rand(0, 999999);
                      $feature_image=$rand."_".$image ;
                     move_uploaded_file($tem_locate, 'dist/img/post/'.$feature_image);
                      $update_post  ="UPDATE post SET post_tittle='$tittle', post_des='$description', post_cat='$category', post_image='$feature_image', tag='$tag', status='$status' WHERE post_id='$edit_post'";
                      
                      $update_post_sql=mysqli_query($db, $update_post);
                      if ($update_post_sql) {
                        // code...
                        header('location:post.php');
                      }else{
                        mysqli_error($db);
                      }
                    }else{
                        move_uploaded_file($tem_locate, 'dist/img/post/'.$feature_image);
                        $update_post  ="UPDATE post SET post_tittle='$tittle', post_des='$description', post_cat='$category', tag='$tag', status='$status' WHERE post_id='$edit_post'";
                        $update_post_sql=mysqli_query($db, $update_post);
                          if ($update_post_sql) {
                            // code...
                            header('location:post.php');
                          }else{
                            mysqli_error($db);
                          }
                    }
                  }
                }
                elseif ($do=='Delete') {
                  // code...
                  if (isset($_GET['delete_post'])) {
                    // code...
                    $delete_post      =$_GET['delete_post'];
                    $delete_post_select="DELETE FROM post WHERE post_id='$delete_post'";
                    $delete_post_query =mysqli_query($db, $delete_post_select);
                    if ($delete_post_query) {
                      // code...
                      header('location:post.php');
                    }else{
                      mysqli_error($db);
                    }
                  }
                }
            }else{ ?> 
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">SI</th>
                      <th scope="col">Feature Image  </th>
                      <th scope="col">Post Tittle</th>
                      <th scope="col">Post Category </th>
                      <th scope="col">Post Tag </th>
                      <th scope="col">Post Author </th>
                      <th scope="col">Post Status </th>
                      <th scope="col">Post Date </th>
                      <th scope="col">Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                      $select_post="SELECT * FROM post";
                      $select_post_query=mysqli_query($db, $select_post);
                      $count_post=mysqli_num_rows($select_post_query);
                      $i=0;
                      if ($count_post<=0) {
                        // code...
                        echo "<div class='alert alert-warning'>Opps There is no Post create yet</div>";
                      }else{ 
                        while ($row=mysqli_fetch_assoc($select_post_query)) {
                          // code...
                          $post_id    =$row['post_id'];
                          $post_tittle=$row['post_tittle'];
                          $post_des   =$row['post_des'];
                          $post_cat   =$row['post_cat'];
                          $post_image =$row['post_image'];
                          $tag        =$row['tag'];
                          $author     =$row['author'];
                          $status     =$row['status'];
                          $post_date  =$row['post_date'];
                          $i++;?>
                            <tr>
                              <th scope="row"><?php echo $i;?></th>
                              <td>
                                <img src="dist/img/post/<?php echo $post_image;?>" width="70px">
                              </td>                                
                              <td><?php echo $post_tittle;?></td>
                              <td>
                                <?php
                                $select_post_cat="SELECT * FROM category WHERE cat_id='$post_cat'";
                                $select_post_sql=mysqli_query($db, $select_post_cat);
                                while ($row=mysqli_fetch_array($select_post_sql)) {
                                   // code...
                                  $cat_id=$row['cat_id'];
                                  $cat_name=$row['cat_name'];
                                  echo $cat_name;
                                 } 
                                ?>    
                              </td>
                              <td><?php echo $tag;?></td>
                              <td>
                                <?php 
                                  $select_post_author   ="SELECT * FROM user WHERE user_id='$author'";
                                  $select_post_author_sql=mysqli_query($db, $select_post_author);
                                  while ($row=mysqli_fetch_array($select_post_author_sql)) {
                                    // code...
                                    $post_user_id=$row['user_id'];
                                    $post_user_name=$row['user_name'];
                                    echo $post_user_name;
                                  }
                                ?>
                              </td>
                              <td>
                                <?php 
                                  if ($status==1) {
                                    // code...
                                    echo "<div class='badge badge-success text-center'>Published</div>";
                                  }elseif($status==2){
                                    echo "<div class='badge badge-primary text-center'>Draft</div>";
                                  }else{
                                    echo "<div class='badge badge-danger text-center'>There Is a Problem</div>";
                                  }
                                ?>
                              </td>
                              <td><?php echo $post_date;?></td>
                              <td>
                                <div class="btn-group">
                                  <a href="post.php?do=Edit&edit_post=<?php echo $post_id;?>" class="btn btn-warning btn-sm">Edit</a>
                                  <a href="" data-toggle="modal" data-target="#id<?php echo $post_id;?>" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                              </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="id<?php echo $post_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure To Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-footer">
                                    <div class="btn-group">
                                      <a href="" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                      <a href="post.php?do=Delete&delete_post=<?php echo $post_id;?>" class="btn btn-primary">Delete</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <?php }
                      }
                    ?>
                    
                  </tbody>
                </table>
            <?php }
          ?>
        </div>
      </div>
    </div>
  </div>


<!-- footer Start -->
  <?php

  include 'include/dashboard/footer.php';
?>