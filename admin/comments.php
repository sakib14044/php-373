
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
        	<!-- <h3>All Comments</h3> -->
          <?php 
            if (isset($_GET['do'])) {
              // code...
              $do= $_GET['do'];
              if ($do=='Manage') { ?>
                  <!-- // post table form... -->
                  <table class="table">
	                  <thead>
	                    <tr>
	                      <th scope="col">SI</th>
	                      <th scope="col">Post Tittle</th>
	                      <th scope="col">Name </th>
	                      <th scope="col">Email </th>
	                      <th scope="col">Comments </th>
	                      <th scope="col">Status </th>
	                      <th scope="col">Comment Date </th>
	                      <th scope="col">Action </th>
	                    </tr>
	                  </thead>
	                  <tbody>
	                    <?php 

	                      $select_comment="SELECT * FROM comment";
	                      $select_comment_query=mysqli_query($db, $select_comment);
	                      $count_comment=mysqli_num_rows($select_comment_query);
	                      $i=0;
	                      if ($count_comment<=0) {
	                        // code...
	                        echo "<div class='alert alert-warning'>Opps There is no Post create yet</div>";
	                      }else{ 
	                        while ($row=mysqli_fetch_assoc($select_comment_query)) {
	                          // code...
	                          $cmt_id     =$row['cmt_id'];
	                          $post_id    =$row['post_id'];
	                          $cmt_user   =$row['cmt_user'];
	                          $cmt_email  =$row['cmt_email'];
	                          $cmt_des    =$row['cmt_des'];
	                          $cmt_status =$row['cmt_status'];
	                          $cmt_date   =$row['cmt_date'];
	                          $i++;?>
	                            <tr>
	                              <th scope="row"><?php echo $i;?></th>
	                              <td>
	                                <?php
                                    $select_tittle= "SELECT post_tittle FROM post WHERE post_id = '$post_id'";
                                    $sql         =mysqli_query($db, $select_tittle);

                                    while ($row_tittle=mysqli_fetch_array($sql)) {
                                      // code...
                                      $post_tittle= $row_tittle['post_tittle'];
                                      echo $post_tittle;
                                    }
	                                	
	                                ?>
	                              </td>                                
	                              <td><?php echo $cmt_user;?></td>
	                              <td><?php echo $cmt_email;?></td>
	                              <td><?php echo $cmt_des;?></td>
	                              <td>
	                                <?php 
	                                  if ($cmt_status==1) {
	                                    // code...
	                                    echo "<div class='badge badge-success text-center'>Published</div>";
	                                  }elseif($cmt_status==2){
	                                    echo "<div class='badge badge-primary text-center'>Draft</div>";
	                                  }else{
	                                    echo "<div class='badge badge-danger text-center'>There Is a Problem</div>";
	                                  }
	                                ?>
	                              </td>
	                              <td><?php echo $cmt_date;?></td>
	                              <td>
	                                <div class="btn-group">
                                    <?php 
                                      if ($cmt_status==2) { ?>
                                        <a href="" data-toggle="modal" data-target="#approve<?php echo $post_id;?>" class="btn btn-warning btn-sm">Approve</a>
                                      <?php }
                                    ?>
	                                  <a href="" data-toggle="modal" data-target="#id<?php echo $post_id;?>" class="btn btn-danger btn-sm">Delete</a>
	                                </div>
	                              </td>
	                            </tr>
                              <div class="modal fade" id="approve<?php echo $post_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Are You Sure To Approve this Comment</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-footer">
                                      <div class="btn-group">
                                        <a href="" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                        <a href="comments.php?do=update&update_comment=<?php echo $cmt_id;?>" class="btn btn-primary">Approve</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
	                            <!-- Modal For DELETE -->
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
	                                      <a href="comments.php?do=Delete&delete_post=<?php echo $cmt_id;?>" class="btn btn-primary">Delete</a>
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
                elseif ($do=='update') {
                  if (isset($_GET['update_comment'])) {
                      $update_comment  =$_GET['update_comment'];
                      $select_cmt_edit=" UPDATE comment SET cmt_status =1 WHERE cmt_id='$update_comment'";
                      $select_cmt_edit_sql=mysqli_query($db, $select_cmt_edit);
                      if ($select_cmt_edit_sql) {
                        // code...
                        header('location:comments.php');
                      }
                    }

                  ?>
                  
                <?php }
               
                elseif ($do=='Delete') {
                  // code...
                  if (isset($_GET['delete_post'])) {
                    // code...
                    $delete_post      =$_GET['delete_post'];
                    $delete_post_select="DELETE FROM comment WHERE cmt_id='$delete_post'";
                    $delete_post_query =mysqli_query($db, $delete_post_select);
                    if ($delete_post_query) {
                      // code...
                      header('location:comments.php?do=Manage');
                    }else{
                      mysqli_error($db);
                    }
                  }
                }
            }else{  
               echo "<div class='badge badge-danger text-center'>There Is a Problem</div>"; }
          ?>
        </div>
      </div>
    </div>
  </div>


<!-- footer Start -->
  <?php

  include 'include/dashboard/footer.php';
?>