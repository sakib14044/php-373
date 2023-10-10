<?php
  include 'include/login/header.php';
  session_start();
  if (!empty($_SESSION['user_id']) && !empty($_SESSION['user_name'])) {
    // code...
      header('location:dashboard.php');
  }
?>
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
          </div>
          <!-- /.col -->
        </div>
      </form>
      </form>
      <?php
      if (isset($_POST['login'])) {
        // code...

        $input_email=mysqli_real_escape_string($db, $_POST['email']);
        $password   =mysqli_real_escape_string($db, $_POST['password']);
        $hass_pass  =sha1($password);
        $data_select="SELECT * FROM user WHERE user_email='$input_email'&& password='$hass_pass'";
        $select_query=mysqli_query($db, $data_select);
        $count =mysqli_num_rows($select_query);
        if ($count>=1) {
          // code...
          while ($row=mysqli_fetch_array($select_query)) {
          // code...
            $_SESSION['user_id']      = $row['user_id'];
            $_SESSION['user_name']    = $row['user_name'];
            $_SESSION['user_email']   = $row['user_email'];
            $_SESSION['user_phone']   = $row['user_phone'];           
            $_SESSION['user_address'] = $row['user_address'];
            $_SESSION['user_role']    = $row['user_role'];
            $_SESSION['user_status']  = $row['user_status'];
            $_SESSION['profile']      = $row['profile'];
            $_SESSION['join_date']    = $row['join_date']; 
            $password     = $row['password']; 
            if ($_SESSION['user_email']==$input_email && $password==$hass_pass){
              // code...
              header('location:dashboard.php');
            }else if($_SESSION['user_email']!==$input_email && $password!==$hass_pass){
              header('location:index.php');
            }else{
              header('location:index.php');
            }
            
          }
        }else{
          echo "<div class='alert alert-danger mt-3 text-center'>Email & Password does not match</div>";
        }
        
      }

      ?>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="recover-password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- Footer -->
<?php
  include 'include/login/footer.php';
?>

