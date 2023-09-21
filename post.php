<?php

include "includes/header.php";

if (isset($_GET['p_seo'])) {
    $the_seo_post_title = $_GET['p_seo'];

    $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE seo_title = '{$the_seo_post_title}' ";
    $send_query = mysqli_query($connection, $view_query);
    $query = "SELECT * FROM posts WHERE seo_title = '{$the_seo_post_title}'";
    $select_all_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_posts)) {
        $the_post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];

        $post_content = $row['post_content'];
        $post_content = str_replace('\r\n', '<br>', $post_content);
        $post_content = str_replace('\n', '<br>', $post_content);
        $post_content = str_replace('\r', '<br>', $post_content);

        $info = htmlentities($post_content);

        $post_tags = $row['post_tags'];


?>

        <!-- Blog-->
        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        <!-- Post-->

                        <article class="post">
                            <div class="post-wrapper">
                                <div class="post-header">
                                    <h2 class="post-title">

                                        <a href="post.php?p_id=<?php echo $the_post_id ?>"><?php echo $post_title ?></a>&nbsp;
                                        <?php if (isset($_SESSION['username'])) { ?>
                                            <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#exampleModalCenter" style="font-size: 15px; border:none;">
                                                <i class="fas fa-flag"></i> Report
                                            </button>
                                        <?php } ?>
                                    </h2>

                                    <ul class="post-meta">
                                        <li><?php echo $post_date ?></li>
                                        <li><?php echo $post_tags ?></li>
                                        <li>By <a href="<?php echo $projectFolderName . '/' ?>user/<?php echo $post_author ?>"><?php echo $post_author ?></a></li>
                                    </ul>
                                </div>
                                <div class="post-content">
                                    <p><?php echo $post_content ?></p>
                                </div>
                                <br>
                            </div>
                        </article>
                        <!-- Post end-->
                    <?php } ?>
                <?php } else {
                header("Location: index.php");
            } ?>



                <!-- Disqus Comments -->

                <div id="disqus_thread"></div>
                <script>
                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document,
                            s = d.createElement('script');
                        s.src = 'https://localhost-60uecsiodh.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>

                    <div class="col-lg-4">
                        <?php include "includes/navigation.php" ?>
                    </div>

                </div>
            </div>
        </section>
        <!-- Blog end-->

        <?php include "includes/footer.php" ?>
        <script id="dsq-count-scr" src="https://localhost-60uecsiodh.disqus.com/count.js" async></script>

        <script>
            $(document).ready(function() {
                $(".delete_link").on('click', function() {

                    $("#exampleModalCenter").modal('show');
                });
            });
        </script>

        <!-- Delete Modal -->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure to report this post?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href='<?php echo $projectFolderName . '/' ?>report.php?post_id=<?php echo $the_post_id ?>&username=<?php echo $_SESSION['username'] ?>' type="button" class="btn btn-danger">Yes</a>
                    </div>
                </div>
            </div>
        </div>