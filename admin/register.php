<?php
  include 'include/login/header.php';
?>
<div class="register-box">
  <div class="register-logo">
    <a href="index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="retype_password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" name="register" value="Register">
          </div>
          <!-- /.col -->
        </div>
      </form>
      
      <?php 
        if (isset($_POST['register'])) {
          // code...
          $name           =mysqli_real_escape_string($db, $_POST['name']);
          $input_email    =mysqli_real_escape_string($db, $_POST['email']);
          $password       =mysqli_real_escape_string($db, $_POST['password']);
          $retype_password=mysqli_real_escape_string($db, $_POST['retype_password']);

          $select_data="SELECT * FROM user WHERE user_email='$input_email'";
          $select_sql=mysqli_query($db, $select_data);
          $cout_email=mysqli_num_rows($select_sql);
          if ($cout_email == 0) {
            // code...
            if ($password == $retype_password) {
              $hassel_pass=sha1($password);
              // code...
              $create_user="INSERT INTO user (user_name, user_email, password, join_date) VALUES ('$name', '$input_email', '$hassel_pass', now())";

              $sql=mysqli_query($db, $create_user);
              if ($sql) {
                // code...
                header('location:index.php');
              }else{
                echo "There is a problem";
              }

            }else{
              echo "<div class='alert alert-danger'>Password does not match</div>";
            }
          }else{
            echo "<div class='alert alert-danger'>This email already taken, please try another email</div>";
          }
        }
      ?>
      
      <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- Footer -->
<?php
  include 'include/login/footer.php';
?>



