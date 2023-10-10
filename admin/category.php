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
          <h1 class="mt-3">Manage Category</h1>
        </div>
      </div>
      <div class="row">
        <!--  category -->
        <div class="col-md-6">
          <!-- veiw category -->
          <?php 
            if (isset($_GET['edit_id'])) {
               $edit_id=$_GET['edit_id'];
               $select_query_edit="SELECT * FROM category WHERE cat_id='$edit_id'";
               $select_query_sql =mysqli_query($db, $select_query_edit);
                while ($row=mysqli_fetch_array($select_query_sql)) {
                 // code...
                $cat_id  =$row['cat_id'];
                $cat_name=$row['cat_name'];
                $cat_des =$row['cat_des'];
                $status  =$row['status'];
               }?>
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Category</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <form action="" method="post">
                      <div class="form-group">
                          <label for="inputName"> Name</label>
                          <input type="text" id="inputName" class="form-control" name="name" value="<?php echo $cat_name;?>" />
                      </div>
                      <div class="form-group">
                          <label for="inputDescription">Description</label>
                          <textarea id="inputDescription" name="description" class="form-control" rows="4"><?php echo $cat_des;?></textarea>
                      </div>
                      <div class="form-group">
                          <label for="inputStatus">Status</label>
                          <select id="inputStatus" name="status" class="form-control custom-select">
                              <option selected="" value="1">Select Status</option>
                              <option value="1" <?php if ($status==1) { echo 'selected';}?>>Active</option>
                              <option value="2" <?php if ($status==2) { echo 'selected';}?>>Draft</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <input type="submit" value="Edit Category" class="btn btn-primary" name="edit_cat">
                        
                      </div>
                  </form> 
                </div>
                <!-- /.card-body -->
                <?php
                  if (isset($_POST['edit_cat'])) {
                    // code...
                    $name       =$_POST['name'];
                    $description=$_POST['description'];
                    $status     =$_POST['status'];
                    $update_cat ="UPDATE category SET cat_name='$name', cat_des='$description', status='$status' WHERE cat_id='$edit_id'";
                    $insert_sql =mysqli_query($db, $update_cat);
                    if ($insert_sql) {
                      // code...
                      header ('location:category.php');
                    }else{
                      mysqli_error($insert_sql);
                    }

                  }
                ?>
              </div>
           <?php }
          ?>
          <!-- add category -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add A New Category</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="" method="post">
                  <div class="form-group">
                      <label for="inputName"> Name</label>
                      <input type="text" id="inputName" class="form-control" name="name" />
                  </div>
                  <div class="form-group">
                      <label for="inputDescription">Description</label>
                      <textarea id="inputDescription" name="description" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="inputStatus">Status</label>
                      <select id="inputStatus" name="status" class="form-control custom-select">
                          <option selected="" value="1">Select Status</option>
                          <option value="1">Active</option>
                          <option value="2">Draft</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Add A New Category" class="btn btn-primary" name="add_cat">
                    
                  </div>
              </form> 
            </div>
            <!-- /.card-body -->
            <?php
              if (isset($_POST['add_cat'])) {
                // code...
                $name       =mysqli_real_escape_string($db, $_POST['name']);
                $description=mysqli_real_escape_string($db, $_POST['description']);
                $status     =$_POST['status'];
                $author     =$_SESSION['user_id'];
                $insert_cat  ="INSERT INTO category (cat_name, cat_des, status, author) VALUES('$name', '$description', '$status', '$author')";
                $insert_sql =mysqli_query($db, $insert_cat);
                if ($insert_sql) {
                  // code...
                  header ('location:category.php');
                }else{
                  mysqli_error($insert_sql);
                }

              }
            ?>
          </div>
        </div>
        <!-- view Category -->
        <div class="col-md-6">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">All Category</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Category</th>
                    <!-- <th scope="col">Description</th> -->
                    <th scope="col">Author</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $select_cat="SELECT * FROM category";
                    $select_sql=mysqli_query($db, $select_cat);
                    $select_cat_raw=mysqli_num_rows($select_sql);
                    $i=0;
                    if ($select_cat_raw<=0) {
                      // code...
                      echo "<div class='alert alert-danger mt-3 text-center'>There is No Category Creat yet.</div>";
                    }else{
                      while ($row=mysqli_fetch_assoc($select_sql)) {
                        // code...
                        $cat_id  =$row['cat_id'];
                        $cat_name=$row['cat_name'];
                        $cat_des =$row['cat_des'];
                        $status  =$row['status'];
                        $author  =$row['author'];
                        $i++; ?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $cat_name;?></td>
                          <td>
                            <?php
                              $select_author="SELECT * FROM user WHERE user_id='$author'";
                              $author_sql   =mysqli_query($db, $select_author);
                              while ($row=mysqli_fetch_array($author_sql)) {
                                // code...
                                $name=$row['user_name'];
                                echo $name;
                              }
                            ?>
                          </td>
                          <td>
                            <?php
                              if ($status==1) {
                                // code...
                                echo "<div class='badge badge-success text-center'>Active</div>";
                              }elseif ($status==2) {
                                // code...
                                echo "<div class='badge badge-warning text-center'>Darft</div>";
                              }else{
                                echo "<div class='badge badge-danger text-center'>There is A problem</div>";
                              }
                            ?>
                          </td>
                          <td>
                            <div class="btn-group">
                              <a href="category.php?edit_id=<?php echo $cat_id;?>" class="btn btn-sm btn-info">Edit</a>
                              <a href="" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#id<?php echo $cat_id;?>">Delete</a>
                            </div>
                          </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="id<?php echo $cat_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $name;?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-footer">
                                <a href="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <a href="category.php?delete_id=<?php echo $cat_id;?>" type="button" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php 
                     }
                    }
                  ?>
                  
                </tbody>
              </table>
              <?php

                if (isset($_GET['delete_id'])) {
                  // code...
                  $delete_id=$_GET['delete_id'];
                  $delete_query="DELETE FROM category WHERE cat_id='$delete_id'";
                  $delete_sql  =mysqli_query($db, $delete_query);
                  if ($delete_sql) {
                    // code...
                    header('location:category.php');
                  }else{
                    mysqli_error($db);
                  }
                }
               ?>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>   
    </div>
  </div>


<!-- footer Start -->
  <?php

  include 'include/dashboard/footer.php';
?>