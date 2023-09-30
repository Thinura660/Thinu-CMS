<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>



<?php include "includes/header.php" ?>


<!-- Blog-->
<section class="module">
    <div class="container">
        <div class="row">


            <div class="col-lg-8">


                <?php

                $query = "SELECT * FROM advertisements WHERE location = 'home-top'";
                $select_home_top_ad = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_home_top_ad)) {
                    $ad_method = $row['method'];
                    $ad_location = $row['location'];

                    if ($ad_method == 'provider') {
                        $code = $row['code'];
                    } elseif ($ad_method == 'local') {
                        $ad_image = $row['image'];
                        $ad_action = $row['action'];
                    }
                }

                ?>

                <?php if ($ad_method == 'local') { ?>
                    <a href="<?php echo $ad_action ?>" target="_blank"><img class="topp-ad" src="admin/advertisement_images/<?php echo $ad_image ?>" alt="Ad"></a>
                <?php } elseif ($ad_method == 'provider') {
                    echo $code;
                } ?>

                <br>
                <br>

                <!-- Post-->

                <?php

                if (!empty($_SESSION['username']) and !empty($_SESSION['user_role'])) {
                    $login = 1;
                } else {
                    $login = 0;
                }

                $per_page = 3;
                if (isset($_GET['page'])) {

                    $page = $_GET['page'];
                } else {
                    $page = "";
                }

                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * $per_page) - $per_page;
                }

                $post_query_count = "SELECT * FROM posts";
                $find_count = mysqli_query($connection, $post_query_count);
                $post_count = mysqli_num_rows($find_count);

                $count = ceil($post_count / $per_page);


                $query = "SELECT * FROM posts LIMIT $page_1, $per_page";
                $select_all_posts = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $seo_title = $row['seo_title'];
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
                            <div class="post-preview"><a href="post/<?php echo $seo_title ?>"><img width="800px" src="images/<?php echo imagePlaceholder($post_image); ?>" alt="Post Image"></a></div>
                            <div class="post-wrapper">
                                <div class="post-header">
                                    <h2 class="post-title title"><a id="title" href="post/<?php echo $seo_title ?>"><span class="theme"><?php echo $post_title ?></span></a>
                                    </h2>
                                    <ul class="post-meta">
                                        <li><?php echo $post_date ?></li>
                                        <li><?php echo $post_tags ?></li>
                                        <li>By
                                            <a href="user/<?php echo $post_author ?>"><?php echo $post_author ?></a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="post-content">
                                    <p><?php echo $post_description ?></p>
                                </div>
                                <br>
                                <div class="post-more"><a class="btn btn-brand btn-sm" href="post/<?php echo $seo_title ?>">Read More</a>
                                </div>
                            </div>
                        </article>
                        <!-- Post end-->
                    <?php
                     } elseif ((isset($show_draft_admin) and $_SESSION['user_role'] == 'admin')) {

                    ?>

                        <article class="post">
                            <div class="post-preview"><a href="post/<?php echo $seo_title ?>"><img width="800px" src="images/<?php echo imagePlaceholder($post_image); ?>" alt="Post Image"></a></div>
                            <div class="post-wrapper">
                                <div class="post-header">
                                    <h2 class="post-title"><a href="post/<?php echo $seo_title ?>"><?php echo $post_title ?></a>
                                        <p class="badge badge-secondary" href="#"><?php echo $post_status ?></p>
                                    </h2>
                                    <ul class="post-meta">
                                        <li><?php echo $post_date ?></li>
                                        <li><?php echo $post_tags ?></li>
                                        <li>By
                                            <a href="user/<?php echo $post_author ?>"><?php echo $post_author ?></a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="post-content">
                                    <p><?php echo $post_description ?></p>
                                </div>
                                <br>
                                <div class="post-more"><a class="btn btn-brand btn-sm" href="post.php?p_id=<?php echo $seo_title ?>">Read More</a>
                                </div>
                            </div>
                        </article>

                <?php                    }
                }

                ?>


                <?php

                $query = "SELECT * FROM advertisements WHERE location = 'home-bottom'";
                $select_home_bottom_ad = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_home_bottom_ad)) {
                    $ad_method = $row['method'];
                    $ad_location = $row['location'];

                    if ($ad_method == 'provider') {
                        $code = $row['code'];
                    } elseif ($ad_method == 'local') {
                        $ad_image = $row['image'];
                        $ad_action = $row['action'];
                    }
                }

                ?>

                <?php if ($ad_method == 'local') { ?>
                    <a href="<?php echo $ad_action ?>" target="_blank"><img class="topp-ad" src="admin/advertisement_images/<?php echo $ad_image  ?>" alt="Ad"></a>
                <?php } elseif ($ad_method == 'provider') {
                    echo $provider;
                } ?>

            </div>
            <div class="col-lg-4">
                <?php include "includes/navigation.php" ?>
            </div>
        </div>
    </div>
</section>
<!-- Blog end-->

<center>
    <div class="row">
        <div class="col-md-12">
            <div class="pagination">

                <?php

                for ($i = 1; $i <= $count; $i++) {
                    if ($i == $page) {
                        echo "<a class='active' href='index.php?page={$i}'>{$i}</a>";
                    } else {
                        echo "<a href='index.php?page={$i}'>{$i}</a>";
                    }
                }

                ?>

            </div>
        </div>
    </div>
</center>


<?php include "includes/footer.php" ?>


<!-- Page Navigation-->
<div class="row">
