<?php ob_start() ?>
<?php include "includes/header.php" ?>

<!-- Blog-->
<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <!-- Post-->

                <?php
                if (isset($_GET['cat_id'])) {
                    $post_category = mysqli_real_escape_string($connection, $_GET['cat_id']);
                }

                $query = "SELECT * FROM posts WHERE post_category_id = {$post_category} AND post_status = 'published' ";
                $select_all_posts = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $seo_title = $row['seo_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 200);
                    $post_tags = $row['post_tags'];
                    $post_description = $row['post_description'];


                    $count = mysqli_num_rows($select_all_posts);
                    if ($count > 0) {
                        echo "
                            <div class='alert alert-success'>
                                <strong>{$count}</strong> result(s) found.
                            </div>

                ";
                    } else {
                        echo "<div class='alert alert-danger'>
                                <strong>No</strong> results found.
                              </div>";
                    }

                ?>

                    <?php if ($post_status == 'published') { ?>

                        <article class="post">
                            <div class="post-preview"><a href="<?php echo $projectFolderName . '/' ?>post/<?php echo $seo_title ?>"><img width="800px" src="<?php echo $projectFolderName . '/' ?>images/<?php echo imagePlaceholder($post_image); ?>" alt="Post Image"></a></div>
                            <div class="post-wrapper">
                                <div class="post-header">
                                    <h2 class="post-title title"><a id="title" href="<?php echo $projectFolderName . '/' ?>post/<?php echo $seo_title ?>"><span class="theme"><?php echo $post_title ?></span></a>
                                    </h2>
                                    <ul class="post-meta">
                                        <li><?php echo $post_date ?></li>
                                        <li><?php echo $post_tags ?></li>
                                        <li>By
                                            <a href="<?php echo $projectFolderName . '/' ?>user/<?php echo $post_author ?>"><?php echo $post_author ?></a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="post-content">
                                    <p><?php echo $post_description ?></p>
                                </div>
                                <br>
                                <div class="post-more"><a class="btn btn-brand btn-sm" href="<?php echo $projectFolderName . '/' ?>post/<?php echo $seo_title ?>">Read More</a>
                                </div>
                            </div>
                        </article>
                        <!-- Post end-->
                    <?php


                    } elseif ($_SESSION['user_role'] == 'admin' && $post_status !== 'published') {

                    ?>

                        <article class="post">
                            <div class="post-preview"><a href="post.php?p_id=<?php echo $post_id ?>"><img src="images/<?php echo imagePlaceholder($post_image); ?>" alt="Post Image"></a></div>
                            <div class="post-wrapper">
                                <div class="post-header">
                                    <h2 class="post-title"><a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a> &nbsp; <a class="badge badge-secondary" href="#"><?php echo $post_status ?></a>
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

                <?php
                    }
                }



                ?>



            </div>
            <div class="col-lg-4">
                <?php include "includes/navigation.php" ?>
            </div>
        </div>
    </div>
</section>
<!-- Blog end-->

<?php include "includes/footer.php" ?>