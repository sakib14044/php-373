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
            <div class="col-md-6">
                <h1>Update User</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php 
                    if (isset($_GET['edit'])) {
                        // code...
                        $edit_id      = $_GET['edit'];
                        $select_data  = "SELECT * FROM user WHERE user_id='$edit_id'";
                        $qry          = mysqli_query($db, $select_data);
                        $row          = mysqli_fetch_assoc($qry);
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
                    }

                ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update <?php echo $user_name;?></h3>

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
                                        <input type="text" id="inputName" class="form-control" name="name" value="<?php echo $user_name;?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Email Address</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $user_email;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" value="<?php echo $user_phone;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Password</label>
                                        <input type="password" class="form-control" name="password" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Re Type Password</label>
                                        <input type="password" class="form-control" name="repassword" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputDescription">Address</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo $user_address;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">User Role</label>
                                        <select class="form-control" name="role">
                                            <option>Select Role</option>
                                            <option value="1" <?php if($user_role == 1 ) {echo 'selected';} ?> >Admin</option>
                                            <option value="2"  <?php if($user_role == 2 ) {echo 'selected';} ?>>Editor</option>
                                            <option value="3" <?php if($user_role == 3 ) {echo 'selected';} ?>>Author</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">User Status </label>
                                        <select class="form-control" name="status">
                                            <option>Select Status</option>
                                            <option value="1" <?php if ($user_status==1) {
                                                // code...
                                                echo 'selected';
                                            } ?> >Active</option>
                                            <option value="2" <?php if ($user_status==2) {
                                                // code...
                                                echo 'selected';
                                            } ?> >Inactive</option>
                                        </select>
                                    </div>
                                    <div>
                                        <img src="dist/img/user/<?php echo $profile ;?>"  width="50px">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Profile Picture</label><br>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-warning" name="updat_euser" value="update user">
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php 
                            if (isset($_POST['updat_euser'])) {
                                // code...
                               $name       = $_POST['name'];
                               $email      = $_POST['email'];
                               $phone      = $_POST['phone'];
                                $address   = $_POST['address'];
                               $role       = $_POST['role'];
                               $status     = $_POST['status'];
                               $final_img_name = NULL;
                                if( !empty($_FILES['image']['name']) ){
                                   $image      = $_FILES['image']['name'];
                                   $tem_locate = $_FILES['image']['tmp_name'];
                                   $rand=rand(0,99999);
                                   $final_img_name=$rand."_".$image;
                                   $move =move_uploaded_file($tem_locate, "dist/img/user/".$final_img_name);

                                   $update_user ="UPDATE user SET user_name='$name', user_email='$email', user_phone='$phone', user_address= '$address', user_role= '$role', user_status= '$status', profile= '$final_img_name' WHERE user_id= '$user_id'";

                               $sql= mysqli_query($db, $update_user);
                               if ($sql) {
                                   // code...
                                    header('location:manage-user.php');
                               }else{
                                 mysqli_errno($db);
                                }
                             }else{
                                 $update_user ="UPDATE user SET user_name='$name', user_email='$email', user_phone='$phone', user_address= '$address', user_role= '$role', user_status= '$status' WHERE user_id= '$user_id'";

                               $sql= mysqli_query($db, $update_user);
                               if ($sql) {
                                   // code...
                                    header('location:manage-user.php');
                               }else{
                                 mysqli_errno($db);
                                }
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
