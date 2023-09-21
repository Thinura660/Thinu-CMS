<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/page_navbar.php" ?>
<?php include "includes/delete_modal.php" ?>


        <div class="col-md-12 col-lg-12">
            <div class="card mg-b-20">
                <div class="card-body pd-0 collapse show" id="collapse6">
                    <table class="table table-separated table-responsive-sm table-hover">

                        <!-- Getting all Reports -->

                        <?php
                        $query = "SELECT * FROM reports";
                        $select_all_reports = mysqli_query($connection, $query);

                        if ($select_all_reports) {

                        ?>

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Reported Post</th>
                                    <th>Date</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                        }

                        while ($row = mysqli_fetch_assoc($select_all_reports)) {
                            $report_id = $row['report_id'];
                            $report_post = $row['report_post'];
                            $report_user = $row['report_user'];
                            $report_date = $row['report_date'];

                            // Getting User Image and Role
                            $user_img = "SELECT * FROM users WHERE username = '{$report_user}'";
                            $select_user_img = mysqli_query($connection, $user_img);

                            while ($row = mysqli_fetch_assoc($select_user_img)) {
                                $user_image = $row['user_image'];
                                $user_role = $row['user_role'];
                            }

                            // Getting Post Title
                            $post_title = "SELECT * FROM posts WHERE post_id = '{$report_post}'";
                            $select_post_title = mysqli_query($connection, $post_title);

                            while ($row = mysqli_fetch_assoc($select_post_title)) {
                                $post_title = $row['post_title'];
                            }

                            ?>

                                <tr>
                                    <th scope="row"><?php echo $report_id ?></th>
                                    <td>
                                        <div class="d-flex">
                                            <img class="wd-35 rounded-circle img-fluid" src="../images_users/<?php echo $user_image ?>" alt="">
                                            <div class="mg-l-10">
                                                <p class="lh-1 mg-0"><?php echo $report_user ?></p>
                                                <small><?php echo $user_role ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $post_title ?></td>
                                    <td><?php echo $report_date ?></td>
                                    <td><button class="btn btn-outline-primary"><i data-feather="eye" class="mg-r-10"></i> <a target="_blank" href="../index.php?post_id=<?php echo $report_post ?>"> View Post </a></button></td>
                                    <?php echo "<td><button class='btn btn-outline-danger'><a data-toggle='modal' data-target='#exampleModal' rel='{$report_post}' href='javascript:void(0)' class='delete_link'><i data-feather='trash' class='mg-r-10'></i> Delete Post </a></button></td>"; ?>
                                    <?php echo "<td><button class='btn btn-outline-danger'><a data-toggle='modal' data-target='#exampleModal2' rel='{$report_id}' href='javascript:void(0)' class='delete_link2'><i data-feather='trash' class='mg-r-10'></i> Delete Report </a></button></td>"; ?>

                                </tr>

                            <?php } ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>


        <?php
        // Deleting Posts
        if (isset($_GET['delete_post'])) {
            $post_id = $_GET['post_id'];

            $delete_post = "DELETE FROM posts WHERE post_id = $post_id";
            $send_query1 = mysqli_query($connection, $delete_post);

            $delete_report = "DELETE FROM reports WHERE report_id = $report_id";
            $send_query2 = mysqli_query($connection, $delete_report);

            if($send_query1) {
                header("Location: reports.php");
            }
        }


        // Deleting Reports
        if (isset($_GET['delete_report'])) {
            $report = $_GET['delete_report'];

            $delete_report = "DELETE FROM reports WHERE report_id = $report";
            $send_query3 = mysqli_query($connection, $delete_report);
        }

        if($send_query3) {
            header("Location: reports.php");
        }
        ?>



        <script>
            $(document).ready(function() {
                $(".delete_link").on('click', function() {
                    var id = $(this).attr("rel");
                    var delete_url = "reports.php?delete_post=" + id + " ";

                    $(".modal_delete_link").attr("href", delete_url);

                    $("#exampleModal").modal('show');
                });
            });

            $(document).ready(function() {
                $(".delete_link2").on('click', function() {
                    var id = $(this).attr("rel");
                    var delete_url = "reports.php?delete_report=" + id + " ";

                    $(".modal_delete_link2").attr("href", delete_url);

                    $("#exampleModal2").modal('show');
                });
            });
        </script>
        <?php include "includes/footer.php" ?>