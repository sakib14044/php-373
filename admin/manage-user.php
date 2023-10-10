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
    <!--D /.sidebar -->
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 
    <div class="container">
      <?php 
        if ($_SESSION['user_role']==1) {?>
          <div class="row">
            <div class="col-md-6">
              <h1>Manage All Users</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
                <?php 
                   $select_data = "SELECT * FROM user";
                   $sql = mysqli_query($db, $select_data);
                   $count = mysqli_num_rows($sql);
                    if ($count <=0 ) {
                        // code...
                        echo "<div class='alert alert-warning'>Opps There is no data</div>";
                    } else {
                        ?>
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">SL</th>
                              <th scope="col">Profile</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Phone Number</th>
                              <th scope="col">Address</th>
                              <th scope="col">Role </th>
                              <th scope="col">Status</th>
                              <th scope="col">Join Date</th>
                              <th scope="col">Update</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $i=0;
                            while ($row = mysqli_fetch_assoc($sql)) {
                                // code...
                              $user_id      = $row['user_id'];
                              $user_name    = $row['user_name'];
                              $user_email   = $row['user_email'];
                              $user_phone   = $row['user_phone'];
                              $password     = $row['password'];
                              $user_address = $row['user_address'];
                              $user_role    = $row['user_role'];
                              $user_status  = $row['user_status'];
                              $profile      = $row['profile'];
                              $join_date    = $row['join_date'];
                              $i++;
                              ?>
                              <tr>
                                  <th scope="row"><?php echo $i ;?></th>
                                  <td>
                                    <?php

                                    if (!empty($profile)){ ?>
                                      <img src="dist/img/user/<?php echo $profile;?>" width="50px">     
                                      <?php }else{ ?>
                                        <img src="dist/img/Default-male.png" width="50px">
                                      <?php }
                                      ?>
                                  </td>
                                  <td><?php echo $user_name; ?></td>
                                  <td><?php echo $user_email; ?></td>
                                  <td><?php echo $user_phone ;?></td>
                                  <td><?php echo $user_address ;?></td>
                                  <td>
                                    <?php 
                                        if ($user_role ==1) {
                                            // code...
                                            echo "<div class='badge badge-success'>Admin</div>";
                                        } elseif ($user_role ==2) {
                                            // code...
                                            echo "<div class='badge badge-secondary'>Editor</div>";
                                        } elseif ($user_role ==3) {
                                            // code...
                                            echo "<div class='badge badge-primary'>Author</div>";
                                        }
                                    ?>
                                  </td>
                                  <td>
                                      <?php 
                                        if ($user_status ==1) {
                                            // code...
                                            echo "<div class='badge badge-success'>Active</div>";
                                        } elseif ($user_status ==2) {
                                            // code...
                                            echo "<div class='badge badge-secondary'>Inactive</div>";
                                        }
                                    ?>
                                  </td>
                                  <td><?php echo $join_date ;?></td>
                                  <td>
                                      <div class="btn-group">
                                          <a href="update-user.php?edit=<?php echo $user_id;?>" class="btn btn-success btn-sm">Edit</a>
                                          <a href="" data-toggle="modal" data-target="#id<?php echo $user_id;?>" class="btn btn-danger btn-sm">Delete</a>
                                      </div>
                                  </td>                          
                            </tr>
                               <!-- Modal --> 
                            <div class="modal fade" id="id<?php echo $user_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h5>Are You Sure Delete <strong><?php echo "$user_name";?></strong>?</h5>
                                    
                                  </div>
                                  <div class="modal-footer">
                                    <div class="btn-group">
                                      <a href="" class="btn btn-dark">Close</a>
                                      <a href="manage-user.php?delete_id=<?php echo $user_id;?>" class="btn btn-danger">Delete</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div> 

                            <?php }
                            ?>
                             
                          </tbody>
                        </table>
                    <?php }
                  ?>             
            </div>
          </div>
        <?php }else{
          echo "<div class='alert alert-danger mt-3 text-center'>Oppps.... You don't have any access</div>";
        }
      ?>
      
    </div>
  </div>
  <!-- Delete user php code -->
  <?php 
    if (isset($_GET['delete_id'])) {
      // code...
      $delete_id =$_GET['delete_id'];
      $delete_sql="DELETE FROM user WHERE user_id='$delete_id'";
      $mysql=mysqli_query($db, $delete_sql);
      if ($mysql) {
        // code...
        header('location:manage-user.php');
      }

    }
  ?>
<!-- footer Start -->
<?php

  include 'include/dashboard/footer.php';
?>