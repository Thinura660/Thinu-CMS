<?php include "includes/header.php" ?>

<?php

if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
    $the_post_author = $_GET['author'];
}

?>
<!-- Blog-->
<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <!-- Post-->
                <div class='alert alert-success'>
                    Displaying all posts by <strong><?php echo $the_post_author ?></strong>
                </div>

                <?php

                $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' ";
                $select_all_posts = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_description = $row['post_description'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 100);
                    $post_tags = $row['post_tags'];
                    $post_status = $row['post_status'];

                    if ($post_status == 'published') {
                ?>




<article class="post">
                            <div class="post-preview"><a href="post.php?p_id=<?php echo $post_id ?>"><img width="800px" src="images/<?php echo imagePlaceholder($post_image); ?>" alt="Post Image"></a></div>
                            <div class="post-wrapper">
                                <div class="post-header">
                                    <h2 class="post-title title"><a id="title" href="post.php?p_id=<?php echo $post_id ?>"><span class="theme"><?php echo $post_title ?></span></a>
                                    </h2>
                                    <ul class="post-meta">
                                        <li><?php echo $post_date ?></li>
                                        <li><?php echo $post_tags ?></li>
                                        <li>By
                                            <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="post-content">
                                    <p><?php echo $post_description ?></p>
                                </div>
                                <br>
                                <div class="post-more"><a class="btn btn-brand btn-sm" href="post.php?p_id=<?php echo $post_id ?>">Read More</a>
                                </div>
                            </div>
                        </article>
                        <!-- Post end-->
                    <?php
                    } elseif (($show_draft_admin == 'on' AND $_SESSION['user_role'] == 'admin') OR ($show_draft_owner == 'on' AND $_SESSION['user_role'] == 'owner')) {

                    ?>

                        <article class="post">
                            <div class="post-preview"><a href="post.php?p_id=<?php echo $post_id ?>"><img width="800px" src="images/<?php echo imagePlaceholder($post_image); ?>" alt="Post Image"></a></div>
                            <div class="post-wrapper">
                                <div class="post-header">
                                    <h2 class="post-title"><a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                                        <p class="badge badge-secondary" href="#"><?php echo $post_status ?></p>
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
                                <div class="post-more"><a class="btn btn-brand btn-sm" href="post.php?p_id=<?php echo $post_id ?>">Read More</a>
                                </div>
                            </div>
                        </article>

                <?php                    }
                }

                ?>


                <!-- Page Navigation-->
                <!--                            <div class="row">-->
                <!--                                <div class="col-md-12">-->
                <!--                                    <nav>-->
                <!--                                        <ul class="pagination justify-content-center">-->
                <!--                                            <li class="page-item"><a class="page-link" href="#"><span class="fas fa-angle-left"></span></a></li>-->
                <!--                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
                <!--                                            <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                <!--                                            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                <!--                                            <li class="page-item"><a class="page-link" href="#">4</a></li>-->
                <!--                                            <li class="page-item"><a class="page-link" href="#"><span class="fas fa-angle-right"></span></a></li>-->
                <!--                                        </ul>-->
                <!--                                    </nav>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!-- Page Navigation end-->
            </div>
            <div class="col-lg-4">
                <?php include "includes/navigation.php" ?>
            </div>
        </div>
    </div>
</section>
<!-- Blog end-->

<script id="dsq-count-scr" src="https://localhost-60uecsiodh.disqus.com/count.js" async></script>

<?php include "includes/footer.php" ?>