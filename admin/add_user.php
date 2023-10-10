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
        <?php 

        if ($_SESSION['user_role']==1) {?>
            <div class="row">
            <div class="col-md-6">
                <h1>Add User</h1>
            </div>
         </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add User</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName">User Name</label>
                                        <input type="text" id="inputName" class="form-control" name="name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Email Address</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Phone Number</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Re Type Password</label>
                                        <input type="password" class="form-control" name="repassword">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputDescription">Address</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">User Role</label>
                                        <select class="form-control" name="role">
                                            <option value="">Select Role</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Editor</option>
                                            <option value="3">Author</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">User Status </label>
                                        <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Profile Picture</label><br>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="add_user">
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php 
                            if (isset($_POST['add_user'])) {
                                // code...
                               $name       =mysqli_real_escape_string($db, $_POST['name']);
                               $email      =mysqli_real_escape_string($db, $_POST['email']);
                               $phone      =mysqli_real_escape_string($db, $_POST['phone']);
                               $password   =mysqli_real_escape_string($db, $_POST['password']);
                               $repassword =mysqli_real_escape_string($db, $_POST['repassword']);
                               if ($password != $repassword) {
                                   // code...
                                    echo "Wrong password";
                               }else {
                               $hassel_pass=sha1($password);
                               $address    =mysqli_real_escape_string($db, $_POST['address']);
                               $role       = $_POST['role'];
                               $status     = $_POST['status'];
                               $final_img_name = NULL;
                                if( !empty($_FILES['image']['name']) ){
                                   $image      = $_FILES['image']['name'];
                                   $tem_locate = $_FILES['image']['tmp_name'];
                                   $rand=rand(0,99999);
                                   $final_img_name=$rand."_".$image;
                                   $move =move_uploaded_file($tem_locate, "dist/img/user/".$final_img_name);
                                }

                               $insert_data = "INSERT INTO user 
                                                (
                                                    user_name,
                                                    user_email, 
                                                    user_phone, 
                                                    password, 
                                                    user_address, 
                                                    user_role, 
                                                    user_status, 
                                                    profile, 
                                                    join_date
                                                ) VALUES (
                                                    '$name', 
                                                    '$email', 
                                                    '$phone', 
                                                    '$hassel_pass', 
                                                    '$address', 
                                                    '$role', 
                                                    '$status', 
                                                    '$final_img_name', 
                                                    now()
                                                )";

                               $sql= mysqli_query($db, $insert_data);
                               if ($sql) {
                                   // code...
                                header('location:manage-user.php');
                               }else{
                                echo "Error";
                                }
                                
                                }

                            }
                        ?>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <?php }else{
            echo "<div class='alert alert-danger mt-3 text-center'>Oppps.... You don't have any access</div>";
        }
        ?>
        
    </div>
</div>

<!-- footer Start -->
<?php
    
  include 'include/dashboard/footer.php';
?>
