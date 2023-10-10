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
                    <h2 class="page-title">Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Blog</li>
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
                <!-- Blog Posts Start -->
                <div class="col-md-8">
                    <?php 
                        if (isset($_GET['category_post_veiw'])) {
                            // code...
                            $category_post_veiw      = $_GET['category_post_veiw'];
                            $category_post_select    = "SELECT * FROM category WHERE cat_id='$category_post_veiw'";
                            $category_post_select_sql = mysqli_query($db, $category_post_select);
                            while ($row=mysqli_fetch_array($category_post_select_sql)) {
                                // code...
                                $cat_id_veiw   =$row['cat_id'];
                                $cat_name_veiw =$row['cat_name']; ?>
                                <h1 class="mb-3">Category:<?php echo $cat_name_veiw;?></h1>
                            <?php }
                             // <!-- Single Item Blog Post Start -->
                            $select_post      ="SELECT * FROM post WHERE post_cat='$category_post_veiw'";
                            $select_post_query=mysqli_query($db, $select_post);
                            $count_posts      =mysqli_num_rows($select_post_query);
                            if ($count_posts<=0) {
                                // code...
                                echo "<div class='alert alert-danger'>
                                        Opps There is No Post in This Category
                                    </div>";
                            }

                            while ($row=mysqli_fetch_assoc($select_post_query)) {
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
                                  $post_date  =$row['post_date']; ?>

                                  <div class="blog-post">
                                    <!-- Blog Banner Image -->
                                    <div class="blog-banner">
                                        <a href="single_post.php?single_post_id=<?php echo $post_id;?>">
                                            <img src="admin/dist/img/post/<?php echo $post_image;?>" width=80%>
                                            <!-- Post Category Names -->
                                            <div class="blog-category-name">
                                                <?php 
                                                    $select_cat    ="SELECT * FROM category";
                                                    $select_cat_sql=mysqli_query($db, $select_cat);
                                                    while ($row=mysqli_fetch_assoc($select_cat_sql)) {
                                                        // code...
                                                        $cat_id=$row['cat_id'];
                                                        $cat_name=$row['cat_name']; ?>
                                                        <h6><?php echo $cat_name;?></h6>
                                                    <?php }
                                                ?>
                                                
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Blog Title and Description -->
                                    <div class="blog-description">
                                        <a href="single_post.php?single_post_id=<?php echo $post_id;?>">
                                            <h3 class="post-title"><?php echo $post_tittle;?>.</h3>
                                        </a>
                                        <p><?php echo $excerpt;?></p>
                                        <!-- Blog Info, Date and Author -->
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="blog-info">
                                                    <ul>
                                                        <li><i class="fa fa-calendar"></i><?php echo $post_date;?>.</li>
                                                        <?php 
                                                            $select_author="SELECT * FROM user WHERE user_id='$author'";
                                                            $select_author_sql=mysqli_query($db, $select_author);
                                                            while ($row=mysqli_fetch_array($select_author_sql)) {
                                                                // code...
                                                                $user_id=$row['user_id'];
                                                                $user_name=$row['user_name'];

                                                            }
                                                        ?>
                                                        <li><i class="fa fa-user"></i>by - <?php echo $user_name;?></li>
                                                        <li><i class="fa fa-heart"></i>(50)</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-4 read-more-btn">
                                                <a href="single_post.php?single_post_id=<?php echo $post_id;?>">
                                                    <button type="button" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></button>
                                                </a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                   </div>
                                <?php }
                        }
                    ?>  
                    <!-- Single Item Blog Post End -->


                    <!-- Blog Paginetion Design Start -->
                    <div class="paginetion">
                        <ul>
                            <!-- Next Button -->
                            <li class="blog-prev">
                                <a href=""><i class="fa fa-long-arrow-left"></i>  Previous</a>
                            </li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li class="active"><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href="">5</a></li>
                            <!-- Previous Button -->
                            <li class="blog-next">
                                <a href=""> Next <i class="fa fa-long-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Blog Paginetion Design End -->               
                </div>



                <!-- Blog Right Sidebar -->
                <div class="col-md-4">

                    <?php 
                    include 'include/sidebar.php';
                    ?>

                </div>
                <!-- Right Sidebar End -->
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