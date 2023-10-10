<!-- :::::::::: Header Section Start :::::::: -->
    <?php 
        include 'include/db.php'; 
        include 'include/header.php';
    ?>
    <!-- ::::::::::: Header Section End ::::::::: -->

    
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Single Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.php">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <li><a href="">Blog <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Single Right Sidebar</li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>
                  
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->



    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Single Posts -->
                <div class="col-md-8">
                    <?php 

                        if (isset($_GET['single_post_id'])) {
                            // code...
                            $single_post_id        =$_GET['single_post_id'];
                            $single_post_select    ="SELECT * FROM post WHERE post_id='$single_post_id'";
                            $single_post_select_sql=mysqli_query($db, $single_post_select);
                            while ($row=mysqli_fetch_array($single_post_select_sql)) {
                                // code...
                                  $post_id    =$row['post_id'];
                                  $post_tittle=$row['post_tittle'];
                                  $post_des   =$row['post_des'];
                                  $excerpt    =substr($post_des, '0', '220');
                                  $post_cat   =$row['post_cat'];
                                  $post_image =$row['post_image'];
                                  $tag        =$row['tag'];
                                  $author     =$row['author'];
                                  $status     =$row['status'];
                                  $post_date  =$row['post_date'];
                            }

                        }
                    ?>
                    <div class="blog-single">
                        <!-- Blog Title -->
                            <h3 class="post-title"><?php echo $post_tittle;?>.</h3>
                        <!-- Blog Categories -->
                        <div class="single-categories">
                            <?php 
                                $select_cat    ="SELECT * FROM category WHERE cat_id='$post_cat'";
                                $select_cat_sql=mysqli_query($db, $select_cat);
                                while ($row=mysqli_fetch_assoc($select_cat_sql)) {
                                    // code...
                                    $cat_id  =$row['cat_id'];
                                    $cat_name=$row['cat_name']; ?>
                                    <span><?php echo $cat_name;?></span>
                                <?php }
                            ?>
                            
                        </div>
                        
                        <!-- Blog Thumbnail Image Start -->
                        <div class="blog-banner">
                           <img src="admin/dist/img/post/<?php echo $post_image;?>" width=100%>
                        </div>
                        <!-- Blog Thumbnail Image End -->

                        <!-- Blog Description Start -->
                        <p><?php echo $post_des;?>.</p>

                        
                        <!-- Blog Description End -->
                    </div>

                    <!-- Single Comment Section Start -->
                    <div class="single-comments">
                        <!-- Comment Heading Start -->
                        <div class="row">
                            <div class="col-md-12">
                                <h4>All Latest Comments (3)</h4>
                                <div class="title-border"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            </div>
                        </div>
                        <!-- Comment Heading End -->

                        <!-- Single Comment Post Start -->
                        <div class="row each-comments">
                            <div class="col-md-2">
                                <!-- Commented Person Thumbnail -->
                                <div class="comments-person">
                                    <img src="assets/images/corporate-team/team-1.jpg">
                                </div>
                            </div>

                            <div class="col-md-10 no-padding">
                                <!-- Comment Box Start -->
                                <div class="comment-box">
                                    <div class="comment-box-header">
                                        <ul>
                                            <li class="post-by-name">Someone Special</li>
                                            <li class="post-by-hour">20 Hours Ago</li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <!-- Comment Box End -->
                            </div>
                        </div>
                        <!-- Single Comment Post End -->


                        <!-- Comment Reply Post Start -->
                        <div class="row each-comments">
                            <div class="col-md-2 offset-md-2">
                                <!-- Commented Person Thumbnail -->
                                <div class="comments-person">
                                    <img src="assets/images/corporate-team/team-2.jpg">
                                </div>
                            </div>

                            <div class="col-md-8 no-padding">
                                <!-- Comment Box Start -->
                                <div class="comment-box">
                                    <div class="comment-box-header">
                                        <ul>
                                            <li class="post-by-name">Someone Special</li>
                                            <li class="post-by-hour">20 Hours Ago</li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <!-- Comment Box Start -->
                            </div>
                        </div>
                        <!-- Comment Reply Post End -->

                        <!-- Single Comment Post Start -->
                        <div class="row each-comments">
                            <div class="col-md-2">
                                <!-- Commented Person Thumbnail -->
                                <div class="comments-person">
                                    <img src="assets/images/corporate-team/team-1.jpg">
                                </div>
                            </div>

                            <div class="col-md-10 no-padding">
                                <!-- Comment Box Start -->
                                <div class="comment-box">
                                    <div class="comment-box-header">
                                        <ul>
                                            <li class="post-by-name">Someone Special</li>
                                            <li class="post-by-hour">20 Hours Ago</li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <!-- Comment Box Start -->
                            </div>
                        </div>
                        <!-- Single Comment Post End -->
                    </div>
                    <!-- Single Comment Section End -->


                    <!-- Post New Comment Section Start -->
                    <div class="post-comments">
                        <h4>Post Your Comments</h4>
                        <div class="title-border"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        <!-- Form Start -->
                        <form action="" method="post" class="contact-form">
                            <!-- Left Side Start -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- First Name Input Field -->
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Your Name" class="form-input" autocomplete="off" required="required">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                </div>
                                <!-- Email Address Input Field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email Address" class="form-input" autocomplete="off" required="required">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Left Side End -->

                            <!-- Right Side Start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Comments Textarea Field -->
                                    <div class="form-group">
                                        <textarea name="comments" class="form-input" placeholder="Your Comments Here..."></textarea>
                                        <i class="fa fa-pencil-square-o"></i>
                                    </div>
                                    <!-- Post Comment Button -->
                                    <input type="submit" name="submit" value="Post Your Comment" class="btn-main">
                                </div>
                            </div>
                            <!-- Right Side End -->
                        </form>
                        <!-- Form End -->
                    </div>
                    <?php 
                        if (isset($_POST['submit'])) {
                            // code...
                            $name              = $_POST['name'];
                            $email             = $_POST['email'];
                            $comments          = $_POST['comments'];
                            $insert_comment    ="INSERT INTO comment (post_id, cmt_user, cmt_email, cmt_des, cmt_date) VALUES ('$single_post_id', '$name', '$email', '$comments', now())";
                            $insert_comment_sql= mysqli_query($db, $insert_comment);
                            if ($insert_comment_sql) {
                                // code...
                                header('location:single_post.php?single_post_id='.$single_post_id);
                            }else{
                                die("Comment Not Added Yet". mysqli_error($db));
                            }
                        }

                    ?>
                    <!-- Post New Comment Section End -->              
                </div>

                <!-- Blog Right Sidebar -->
                <div class="col-md-4">

                    <!-- Latest News -->
                    <?php 
                     include 'include/sidebar.php';
                    ?>
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    



    <!-- :::::::::: Footer Buy Now Section Start :::::::: -->
    <section class="buy-now">
        <div class="container">
            <!-- But Now Row Start -->
            <div class="row">
                <!-- Left Side Content -->
                <div class="col-md-9">
                    <h4><span>Blue Chip</span> - Multipurpose Business Corporate Website Template</h4>
                </div>
                <!-- Right Side Button -->
                <div class="col-md-3">
                    <button type="button" class="btn-main"><i class="fa fa-cart-plus"></i> Buy Now</button>
                </div>
            </div>
            <!-- But Now Row End -->
        </div>
    </section>
    <!-- ::::::::::: Footer Buy Now Section End ::::::::: -->


     <!-- :::::::::: Footer Section Start :::::::: -->
    <?php 
        include 'include/footer.php';
    ?>