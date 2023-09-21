<?php
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_posts_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
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

if (isset($_POST['update_post'])) {
    $post_title = mysqli_real_escape_string($connection, $_POST['title']);
    $seo_title = str_replace(" ", "-", $post_title);
    $post_description = mysqli_real_escape_string($connection, $_POST['description']);
    $post_author = mysqli_real_escape_string($connection, $_POST['author']);
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['images']['name'];
    $post_image_temp = $_FILES['images']['tmp_name'];
    $post_tags = mysqli_real_escape_string($connection, $_POST['post_tags']);
    $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "seo_title = '{$seo_title}', ";
    $query .= "post_description = '{$post_description}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = {$the_post_id} ";

    $update_post = mysqli_query($connection, $query);
    confirm($update_post);

    if (isset($_POST['reset_view'])) {
        $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = $the_post_id ";
        $reset_views = mysqli_query($connection, $query);
    }
    echo "
          <div class='alert alert-success'>
               <strong>Success! </strong>Post Updated. <a target='_blank' href='../post/{$seo_title}'> View Post</a> or <a href='posts.php'>Edit More Posts</a>
          </div>
          ";
}


?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Tile</label>
        <input value="<?php echo $post_title ?>" type="text" name="title" class="form-control">
    </div>

    <br>

    <div class="form-group">
        <label for="title">Post Description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="5"><?php echo $post_description ?></textarea>
    </div>

    <br>


    <div class="form-group">
        <label for="post_category">Post Category</label>
        <br>
        <select class="form-control col-3" name="post_category" id="post_category">

            <?php
            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
            $select_categories = mysqli_query($connection, $query);

            confirm($select_categories);

            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>
            <hr>
            <?php

            $query = "SELECT * FROM categories WHERE cat_id != $post_category_id";
            $select_categories = mysqli_query($connection, $query);

            confirm($select_categories);

            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }

            ?>

        </select>

    </div>

    <br>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" name="author" class="form-control" disabled>
    </div>

    <br>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <br>
        <select class="form-control col-3" name="post_status" id="">
            <option value="<?php echo $post_status ?>"><?php echo $post_status ?></option>

            <?php
            if ($post_status == 'published') {
                echo "<option value='drafted'>Draft</option>";
            } else {
                echo "<option value='published'>Publish</option>";
            }
            ?>
        </select>
    </div>

    <br>

    <div class="form-group">

        <img width="200" src="../images/<?php echo $post_image; ?>" alt="image">
        <br>
        <br>
        <div class="form-group form-type-line file-group">
            <input type="text" class="form-control file-value file-browser" placeholder="Choose file..." readonly="">
            <input type="file"  name="images" multiple="">
        </div>

        <br>

        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input value="<?php echo $post_tags ?>" type="text" name="post_tags" class="form-control">
        </div>

        <br>

        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" id="default" name="post_content" id="" cols="30" rows="10"><?php echo $post_content ?></textarea>

            <script>
                const example_image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', 'includes/tinymce/postAccepter.php');

                    xhr.upload.onprogress = (e) => {
                        progress(e.loaded / e.total * 100);
                    };

                    xhr.onload = () => {
                        if (xhr.status === 403) {
                            reject({
                                message: 'HTTP Error: ' + xhr.status,
                                remove: true
                            });
                            return;
                        }

                        if (xhr.status < 200 || xhr.status >= 300) {
                            reject('HTTP Error: ' + xhr.status);
                            return;
                        }

                        const json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location != 'string') {
                            reject('Invalid JSON: ' + xhr.responseText);
                            return;
                        }

                        resolve(json.location);
                    };

                    xhr.onerror = () => {
                        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                    };

                    const formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    xhr.send(formData);
                });

                tinymce.init({
                    selector: 'textarea#default',
                    plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools contextmenu colorpicker textpattern help',
                    height: 500,
                    branding: false,
                    elementpath: false,

                    // menubar: 'file edit view insert format tools table tc help',
                    toolbar: 'formatselect | undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | link image media checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile pageembed template anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
                    image_advtab: true,
                    // toolbar: 'insert | undo redo |  formatselect | bold italic underline forecolor removeformat | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | table blockquote codesample code | image media',

                    block_unsupported_drop: false,
                    images_upload_url: 'admin/includes/tinymce/postAccepter.php',
                    automatic_uploads: true,
                    images_upload_base_path: 'admin/includes/tinymce/images',
                    images_upload_credentials: true,
                    convert_urls: false,
                    images_upload_handler: example_image_upload_handler,
                    images_reuse_filename: true,

                });
            </script>
        </div>

        <br>

        <label for="reset_view">Reset View Count <input type="checkbox" name="reset_view" id="reset_view"></label>

        <div class="form-group">
            <input type="submit" value="Update" class="btn btn-primary" name="update_post">
        </div>

</form>