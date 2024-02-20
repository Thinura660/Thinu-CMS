<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/page_navbar.php" ?>

<?php
include "includes/delete_modal.php";
if (isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $postValueId) {
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
            case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
                $update_to_published_status = mysqli_query($connection, $query);
                confirm($update_to_published_status);
                break;

            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
                $update_to_draft_status = mysqli_query($connection, $query);
                confirm($update_to_draft_status);
                break;

            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = {$postValueId} ";
                $update_to_delete_status = mysqli_query($connection, $query);
                confirm($update_to_delete_status);
                break;

            case 'clone':
                $query = "SELECT * FROM posts WHERE post_id = {$postValueId} ";
                $select_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($select_posts_query)) {
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_description = $row['post_description'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_status = $row['post_status'];
                }

                $query = "INSERT INTO posts(post_category_id, post_title, post_description ,post_author, post_date, post_image, post_content, post_tags, post_status) ";
                $query .= "VALUES('{$post_category_id}', '{$post_title}', '{$post_description}' ,'{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}' ) ";

                $copy_query = mysqli_query($connection, $query);

                confirm($copy_query);
                break;
        }
    }
}

?>




        <?php

        if (isset($_GET['source'])) {
            $source = $_GET['source'];
        } else {
            $source = '';
        }
        switch ($source) {
            case 'add_post';
                include "includes/add_post.php";
                break;

            case 'edit_post';
                include "includes/edit_post.php";
                break;

            default:
                include "includes/view_all_posts.php";
        }

        ?>


    </div>



    <?php include "includes/footer.php" ?>