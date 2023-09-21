<div class="sidebar">

    <?php

    if (isset($_GET["login"]) && $_GET["login"] == 'succeeded') {
        echo
        "
           <script>
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Login Success!',
                showConfirmButton: false,
                timer: 2000
              })
           </script>
        ";

        $location = "index.php";
        echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=' . $location . '">';
    }

    ?>

    <!-- Search widget-->
    <aside class="widget widget-search">
        <form action="<?php echo $projectFolderName . '/' ?>search.php" method="post">
            <label for="form-control"><strong>Search:</strong></label>
            <input required name="search" class="form-control" type="search" placeholder="Type Search Words">
            <button class="search-button search" name="submit" type="submit"><span style="margin-top: 35px" class="fas fa-search search"></span></button>
        </form>
    </aside>

    <!-- Login widget-->

    <?php

    if (empty($_SESSION['username']) && empty($_SESSION['user_role'])) {

        echo '
                                    <aside class="widget widget-search">
                                    <form action="' . $projectFolderName . '/includes/login.php" method="post">
                                        <label for="form-control"><strong>Login:</strong></label>
                                        ';


        if (isset($_GET["login"]) && $_GET["login"] == 'failed') {
            echo
            '<div class="alert alert-danger">
                                                Incorrect Username or Password
                                            </div>';
        }
        echo
        '
                                        <div class="form-group">
                                            <input name="username" class="form-control" type="text" placeholder="Username here">
                                        </div>
                                        <div class="input-group">
                                            <input name="password" class="form-control" type="password" placeholder="Password here">
                                            &nbsp&nbsp
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" name="login" type="submit">Login</button>
                                            </span>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <a style="color: #0a53be" href="forgot.php?forgot=' ?><?php echo uniqid(true) ?><?php echo '">&nbsp Forgot Password?</a>
                                        </div>

                                    </form>
                                </aside>
                                ';
                                                                                                                        }
                                                                                                                            ?>


    <!-- Ad -->

    <?php

    $query = "SELECT * FROM advertisements WHERE location = 'sidebar'";
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


    <div class="widget-title">
        <h6>Ad here</h6>
    </div>

    <?php if ($ad_method == 'local') { ?>
        <a href="<?php echo $ad_action ?>" target="_blank"><img src="<?php echo $projectFolderName . '/' ?>admin/advertisement_images/<?php echo $ad_image
                                                                                ?>" alt="Ad"></a>


    <?php } elseif ($ad_method == 'provider') {
        echo $code;
    } ?>

    <br>
    <br>
    <br>

    <!-- Categories widget-->
    <aside class="widget widget-categories">
        <div class="widget-title">
            <h6>Categories</h6>
        </div>
        <ul>

            <?php

            $query = "SELECT * FROM categories";
            $select_all_categories = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<li><a href='$projectFolderName/category/$cat_id'>{$cat_title}</a></li>";
            }

            ?>

        </ul>
    </aside>

    <!-- Recent entries widget-->


    <aside class="widget widget-recent-entries-custom">
        <div class="widget-title">
            <h6>Recent Posts</h6>
        </div>

        <ul>
            <?php

            $query_latest = "SELECT * FROM posts WHERE post_status='published' ORDER BY post_date DESC limit 3";
            $latest = mysqli_query($connection, $query_latest);

            while ($row = mysqli_fetch_array($latest)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $seo_title = $row['seo_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0, 200);
                $post_tags = $row['post_tags'];
                $post_description = $row['post_description'];
            ?>

                <li class="clearfix">
                    <div class="wi"><a href="<?php echo $projectFolderName . '/' ?>post/<?php echo $post_id ?>"><img src="<?php echo  $projectFolderName . '/' ?>images/<?php echo imagePlaceholder($post_image); ?>" alt=""></a></div>
                    <div class="wb"><a href="<?php echo $projectFolderName . '/' ?>post/<?php echo $seo_title ?>"><?php echo $post_title ?></a><span class="post-date"><?php echo $post_date ?></span></div>
                </li>

            <?php } ?>

        </ul>
    </aside>
</div>
