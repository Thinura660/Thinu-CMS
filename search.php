<?php include "includes/header.php" ?>
<!-- Blog-->
<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <!-- Post-->

                <?php


                if (isset($_POST['submit'])) {
                    $search = mysqli_real_escape_string($connection, $_POST['search']);

                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $search_query = mysqli_query($connection, $query);

                    if (!$search_query) {
                        die("QUERY FAILED " . mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($search_query);
                    if ($count == 0) {
                        echo "<div class='alert alert-danger'>
                <strong>0</strong> results found.
            </div>
    ";
                        return false;
                    } else {
                        echo "
        <div class='alert alert-success'>
            <strong>{$count}</strong> result(s) found.
        </div>
        
        ";



                        while ($row = mysqli_fetch_assoc($search_query)) {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = substr($row['post_content'], 0, 200);
                            $post_tags = $row['post_tags'];
                            $post_status = $row['post_status'];
                            $post_description = $row['post_description'];

                            if ($post_status == 'published') {
                ?>




                                <article class="post">
                                    <div class="post-preview"><a href="post/<?php echo $post_id ?>"><img src="images/<?php echo imagePlaceholder($post_image); ?>" alt="Post Image"></a></div>
                                    <div class="post-wrapper">
                                        <div class="post-header">
                                            <h2 class="post-title"><a href="post/<?php echo $post_id ?>"><?php echo $post_title ?></a>
                                            </h2>
                                            <ul class="post-meta">
                                                <li><?php echo $post_date ?></li>
                                                <li><?php echo $post_tags ?></li>
                                                <li>By
                                                    <a href="/blog/author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="post-content">
                                            <p><?php echo $post_description ?></p>
                                        </div>
                                        <br>
                                        <div class="post-more"><a class="btn btn-brand btn-sm" href="post/<?php echo $post_id ?>">Read More</a>
                                        </div>
                                    </div>
                                </article>
                                <!-- Post end-->
                                <!-- Page Navigation-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <nav>
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item"><a class="page-link" href="#"><span class="fas fa-angle-left"></span></a></li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                <li class="page-item"><a class="page-link" href="#"><span class="fas fa-angle-right"></span></a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <!-- Page Navigation end-->
                        <?php }
                        }
                    }

                    if ($_SESSION['user_role'] == 'admin' && $post_status !== 'published') {

                        ?>

                        <article class="post">
                            <div class="post-preview"><a href="post/<?php echo $post_id ?>"><img src="images/<?php echo imagePlaceholder($post_image); ?>" alt="Post Image"></a></div>
                            <div class="post-wrapper">
                                <div class="post-header">
                                    <h2 class="post-title"><a href="post/<?php echo $post_id ?>"><?php echo $post_title ?></a> &nbsp; <a class="badge badge-secondary" href="#"><?php echo $post_status ?></a>
                                    </h2>
                                    <ul class="post-meta">
                                        <li><?php echo $post_date ?></li>
                                        <li><?php echo $post_tags ?></li>
                                        <li>By
                                            <a href="/blog/author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="post-content">
                                    <p><?php echo $post_description ?></p>
                                </div>
                                <br>
                                <div class="post-more"><a class="btn btn-brand btn-sm" href="post/<?php echo $post_id ?>">Read More</a>
                                </div>
                            </div>
                        </article>

                <?php

                    }
                } ?>



            </div>
            <div class="col-lg-4">
                <?php include "includes/navigation.php" ?>
            </div>
        </div>
    </div>
</section>
<!-- Blog end-->

<?php include "includes/footer.php"





?>