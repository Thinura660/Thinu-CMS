<form action="" method="post">

    <table class="table table-bordered table-hover view-posts">
        <div class="d-flex">
            <div id="bulkOptionsContainer" class="col-4">
                <select name="bulk_options" class="form-control border-dark" id="">
                    <option value="">Select Options</option>
                    <option value="published">Publish</option>
                    <option value="draft">Draft</option>
                    <option value="delete">Delete</option>
                    <option value="clone">Clone</option>
                </select>
            </div>

            <div class="col-4 bulk-button">
                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
            </div>
        </div>
        <br>



        <?php

        $user = $_SESSION['username'];

        if ($_SESSION['user_role'] == 'admin') {
            $query = "SELECT * FROM posts";
            $select_all_posts = mysqli_query($connection, $query);
        } else {
            $query = "SELECT * FROM posts WHERE post_author='$user' ORDER BY post_id DESC";
            $select_all_posts = mysqli_query($connection, $query);
        }


        $post_count = mysqli_num_rows($select_all_posts);

        if ($post_count < 1) {
            echo '
        <div class="alert alert-danger">
            <strong>Alert: </strong>No posts found
        </div>';
        } else {

            echo '

                <thead>
                <tr>
                <th><Input type="checkbox" id="selectAllBoxes"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date </th>
                <th>Image</th>
                <th>Tags</th>
                <th>Status</th>
                <th>Views</th>
                <th style="text-align: center" colspan="3">Actions</th>
                </tr>
                </thead>
                <tbody>

                ';

            while ($row = mysqli_fetch_assoc($select_all_posts)) {
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $seo_title = $row['seo_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_status = $row['post_status'];
                $views = $row['post_views_count'];



                echo "<tr>";
        ?>

                <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>

        <?php
                echo "<td>$post_id</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_title</td>";






                $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                $edit_categories = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($edit_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<td>$cat_title</td>";
                }


                echo "<td>$post_date</td>";
                echo "<td><img src='../images/$post_image' alt='Image' width='200px' class='img-responsive'></td>";
                echo "<td>$post_tags</td>";
                echo "<td>$post_status</td>";
                echo "<td>$views</td>";
                echo "<td><a target='_blank' href='../post/{$seo_title}' class='btn btn-primary'><i class='fa-solid fa-eye'></i></a></td>";
                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}' class='btn btn-warning'><i class='fa-solid fa-pen-to-square'></i></a></td>";
                echo "<td><a data-toggle='modal' data-target='#exampleModal' rel='{$post_id}' href='javascript:void(0)' class='delete_link btn btn-danger'><i class='fa-solid fa-trash-can'></i></a></td>";
                echo "</tr>";
            }
        }



        ?>

        </tbody>
    </table>
</form>

<?php

if (isset($_GET['delete'])) {

    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($connection, $query);
    header('Location: posts.php');
}

?>

<script>
    $(document).ready(function() {
        $(".delete_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "posts.php?delete=" + id + " ";

            $(".modal_delete_link").attr("href", delete_url);

            $("#exampleModal").modal('show');
        });
    });

    $(document).ready(function() {
        $('#selectAllBoxes').click(function(event) {
            if (this.checked) {
                $('.checkBoxes').each(function() {
                    this.checked = true;
                });
            } else {
                $('.checkBoxes').each(function() {
                    this.checked = false;
                });
            }
        });
    });
</script>