<!-- Latest News -->
<div class="widget">
    <h4>Latest News</h4>
    <div class="title-border"></div>
    
    <!-- Sidebar Latest News Slider Start -->
    <div class="sidebar-latest-news owl-carousel owl-theme">
        <!-- First Latest News Start -->
        <?php 
            $select_post      ="SELECT * FROM post ORDER BY post_id DESC LIMIT 3";
            $select_post_query=mysqli_query($db, $select_post);
            while ($row=mysqli_fetch_assoc($select_post_query)) {
                // code...
                  $post_id    =$row['post_id'];
                  $post_tittle=$row['post_tittle'];
                  $post_des   =$row['post_des'];
                  $excerpt    =substr($post_des, '0', '100');
                  $post_cat   =$row['post_cat'];
                  $post_image =$row['post_image'];
                  $tag        =$row['tag'];
                  $author     =$row['author'];
                  $status     =$row['status'];
                  $post_date  =$row['post_date']; ?>
                    <div class="item">
                    <div class="latest-news">
                        <!-- Latest News Slider Image -->
                        <div class="latest-news-image">
                            <a href="single_post.php?single_post_id=<?php echo $post_id;?>">
                                <img src="admin/dist/img/post/<?php echo $post_image;?>" width=100%>
                            </a>
                        </div>
                        <!-- Latest News Slider Heading -->
                        <a href="single_post.php?single_post_id=<?php echo $post_id;?>"><h5><?php echo $post_tittle;?>.</h5></a>
                        
                        <!-- Latest News Slider Paragraph -->
                        <a href="single_post.php?single_post_id=<?php echo $post_id;?>"><p><?php echo $excerpt;?>.</p></a>
                        
                    </div>
                </div>
            <?php  }
        ?>
        
        <!-- First Latest News End -->
        
        
    </div>
    <!-- Sidebar Latest News Slider End -->
</div>


<!-- Search Bar Start -->
<div class="widget"> 
        <!-- Search Bar -->
        <h4>Blog Search</h4>
        <div class="title-border"></div>
        <div class="search-bar">
            <!-- Search Form Start -->
            <form action="search.php" method="post">
                <div class="form-group btn-group">
                    <input type="text" name="search_keyword" placeholder="Type Here" autocomplete="off" class="form-input">
                    <button style="border: none; background: transparent; border-bottom: 2px solid #2f5888;" type="submit" name="search">Search</button>
                </div>
            </form>
            <!-- Search Form End -->
        </div>
</div>
<!-- Search Bar End -->

<!-- Recent Post -->
<div class="widget">
    <h4>Recent Posts</h4>
    <div class="title-border"></div>
    <div class="recent-post">
        <!-- Recent Post Item Content Start -->
        <?php 
             $select_post      ="SELECT * FROM post ORDER BY post_id DESC LIMIT 4";
            $select_post_query=mysqli_query($db, $select_post);
            while ($row=mysqli_fetch_assoc($select_post_query)) {
                // code...
                  $post_id    =$row['post_id'];
                  $post_tittle=$row['post_tittle'];
                  $post_des   =$row['post_des'];
                  $excerpt    =substr($post_des, '0', '100');
                  $post_cat   =$row['post_cat'];
                  $post_image =$row['post_image'];
                  $tag        =$row['tag'];
                  $author     =$row['author'];
                  $status     =$row['status'];
                  $post_date  =$row['post_date']; ?>
                  <div class="recent-post-item">
                    <div class="row">
                        <!-- Item Image -->
                        <div class="col-md-4">
                            <a href="single_post.php?single_post_id=<?php echo $post_id;?>"><img src="admin/dist/img/post/<?php echo $post_image;?>" width=100%></a>
                        </div>
                        <!-- Item Tite -->
                        <div class="col-md-8 no-padding">
                            <a href="single_post.php?single_post_id=<?php echo $post_id;?>"><h5><?php echo $post_tittle;?></h5></a>
                            <ul>
                                <li><i class="fa fa-clock-o"></i><?php echo $post_date;?></li>
                                <li><i class="fa fa-comment-o"></i>15</li>
                            </ul>
                        </div>
                    </div>
                </div>
              <?php }
        ?>
        
        <!-- Recent Post Item Content End -->

    </div>
</div>

<!-- All Category -->
<div class="widget">
    <h4>Blog Categories</h4>
    <div class="title-border"></div>
    <!-- Blog Category Start -->
    <div class="blog-categories">
        <ul>
            <!-- Category Item -->
            <?php 
             $select_cat    ="SELECT * FROM category ORDER BY cat_id DESC LIMIT 5";
             $select_cat_sql=mysqli_query($db, $select_cat);
             while ($row=mysqli_fetch_assoc($select_cat_sql)) {
                 // code...
                $cat_id  =$row['cat_id'];
                $cat_name=$row['cat_name']; ?>
                <li>
                    <i class="fa fa-check"></i>
                    <a href="category.php?category_post_veiw=<?php echo $cat_id;?>">
                        <?php echo $cat_name;?>
                    </a>
                    <?php
                      $select_post      ="SELECT * FROM post WHERE post_cat='$cat_id'" ;
                      $select_post_query=mysqli_query($db, $select_post);
                      $count_post       =mysqli_num_rows($select_post_query);

                    ?> 
                    <span>[<?php echo $count_post;?>]</span>
                </li>
             <?php }

            ?>
            
            
        </ul>
    </div>
    <!-- Blog Category End -->
</div>

<!-- Recent Comments -->
<div class="widget">
    <h4>Recent Comments</h4>
    <div class="title-border"></div>
    <div class="recent-comments">
        
        <!-- Recent Comments Item Start -->
        <div class="recent-comments-item">
            <div class="row">
                <!-- Comments Thumbnails -->
                <div class="col-md-4">
                    <i class="fa fa-comments-o"></i>
                </div>
                <!-- Comments Content -->
                <div class="col-md-8 no-padding">
                    <h5>admin on blog posts</h5>
                    <!-- Comments Date -->
                    <ul>
                        <li>
                            <i class="fa fa-clock-o"></i>Dec 15, 2018
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Recent Comments Item End -->

        <!-- Recent Comments Item Start -->
        <div class="recent-comments-item">
            <div class="row">
                <!-- Comments Thumbnails -->
                <div class="col-md-4">
                    <i class="fa fa-comments-o"></i>
                </div>
                <!-- Comments Content -->
                <div class="col-md-8 no-padding">
                    <h5>admin on blog posts</h5>
                    <!-- Comments Date -->
                    <ul>
                        <li>
                            <i class="fa fa-clock-o"></i>Dec 15, 2018
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Recent Comments Item End -->

        <!-- Recent Comments Item Start -->
        <div class="recent-comments-item">
            <div class="row">
                <!-- Comments Thumbnails -->
                <div class="col-md-4">
                    <i class="fa fa-comments-o"></i>
                </div>
                <!-- Comments Content -->
                <div class="col-md-8 no-padding">
                    <h5>admin on blog posts</h5>
                    <!-- Comments Date -->
                    <ul>
                        <li>
                            <i class="fa fa-clock-o"></i>Dec 15, 2018
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Recent Comments Item End -->

    </div>
</div>

<!-- Meta Tag -->
<div class="widget">
    <h4>Tags</h4>
    <div class="title-border"></div>
    <!-- Meta Tag List Start -->
    <div class="meta-tags">

        <?php 
        $select_tags   ="SELECT * FROM post LIMIT 6";
        $select_tag_sql=mysqli_query($db, $select_tags);
        while ($row=mysqli_fetch_assoc($select_tag_sql)) {
            // code...
            $post_id =$row['post_id'];
            $tag     =$row['tag']; 

            $single_tag=explode(',', $tag);
            foreach ($single_tag as $tag) {
                // code...
                echo "<span>$tag</span>";
            }

             }


        ?>

        
        <!-- <span>Technology</span>
        <span>Corporate</span>
        <span>Web Design</span>
        <span>Development</span>
        <span>Graphic</span>
        <span>Digital Marketing</span>
        <span>SEO</span> 
        <span>Social Media</span>  -->         
    </div>
    <!-- Meta Tag List End -->
</div>