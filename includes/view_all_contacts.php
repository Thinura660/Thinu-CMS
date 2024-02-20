

        <div class="col-md-12 col-lg-12">
            <div class="card mg-b-20">
                <div class="card-body pd-0 collapse show" id="collapse6">
                    <table class="table table-separated table-responsive-sm table-hover">

                        <!-- Getting all Reports -->

                        <?php
                        $query = "SELECT * FROM contacts";
                        $select_all_contacts = mysqli_query($connection, $query);

                        if ($select_all_contacts) {

                        ?>

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                        }



                        $contact_query = "SELECT * FROM contacts ORDER BY contact_date DESC";
                        $send_contact_query = mysqli_query($connection, $contact_query);

                        while ($row = mysqli_fetch_assoc($send_contact_query)) {
                            $contact_id      = $row['contact_id'];
                            $contact_user    = $row['contact_user'];
                            $contact_email   = $row['contact_email'];
                            $contact_date    = $row['contact_date'];
                            $contact_message = substr($row['contact_message'], 0, 60);

                            $user_img_query = "SELECT * FROM users WHERE username = '{$contact_user}'";
                            $send_user_query = mysqli_query($connection, $user_img_query);
                            if (mysqli_num_rows($send_user_query) == 0) {
                                $user_role = 'Guest';
                                $user_image = 'guest.png';
                            } else {
                                while ($row = mysqli_fetch_assoc($send_user_query)) {
                                    $user_image = $row['user_image'];
                                    $user_role = $row['user_role'];
                                }
                            }

                            ?>


                                <tr>
                                    <th scope="row"><?php echo $contact_id ?></th>
                                    <td>
                                        <div class="d-flex">
                                            <img class="wd-35 rounded-circle img-fluid" src="../images_users/<?php echo $user_image ?>" alt="">
                                            <div class="mg-l-10">
                                                <p class="lh-1 mg-0"><?php echo $contact_user ?></p>
                                                <small><?php echo $user_role ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $contact_message . '...' ?></td>
                                    <td><?php echo $contact_date ?></td>
                                    <td><a href="contacts.php?source=view&contact_id=<?php echo $contact_id ?>"><button class="btn btn-outline-primary"><i data-feather="eye"></i></button></a></td>
                                    <?php echo "<td><a data-toggle='modal' data-target='#exampleModal' rel='{$contact_id}' href='javascript:void(0)' class='delete_link'><button class='btn btn-outline-danger'><i data-feather='trash'></i></button></a></td>"; ?>

                                </tr>

                            <?php } ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>


        <?php
        // Deleting Posts
        if (isset($_GET['delete_contact'])) {
            $contact_id = $_GET['delete_contact'];

            $delete_contact = "DELETE FROM contacts WHERE contact_id = $contact_id";
            $send_query1 = mysqli_query($connection, $delete_contact);

            if (isset($send_query1)) {
                header("Location: contacts.php");
            }
        }


        ?>



        <script>
            $(document).ready(function() {
                $(".delete_link").on('click', function() {
                    var id = $(this).attr("rel");
                    var delete_url = "contacts.php?delete_contact=" + id + " ";

                    $(".modal_delete_link").attr("href", delete_url);

                    $("#exampleModal").modal('show');
                });
            });
        </script>