<?php

if (isset($_POST['create_post'])) {
    $post_title = mysqli_real_escape_string($connection, $_POST['title']);
    $seo_title = str_replace(" ", "-", $post_title);
    $post_description = mysqli_real_escape_string($connection, $_POST['description']);
    $post_author = $_SESSION['username'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = mysqli_real_escape_string($connection, $_POST['post_tags']);
    $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
    $post_date = date('d-m-y');

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, seo_title, post_description ,post_author, post_date, post_image, post_content, post_tags, post_status) ";
    $query .= "VALUES('{$post_category_id}', '{$post_title}', '{$seo_title}', '{$post_description}' ,'{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}' ) ";

    $create_post_query = mysqli_query($connection, $query);

    confirm($create_post_query);

    $the_post_id = mysqli_insert_id($connection);
    echo "
          <div class='alert alert-success'>
               <strong>Success! </strong>Post Added. <a target='_blank' href='../post.php?p_id={$the_post_id}'> View Post</a> or <a href='posts.php'>View All Posts</a>
          </div>
          ";
}

?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" class="form-control">
    </div>

    <br>

    <div class="form-group">
        <label for="title">Post Description</label>
        <textarea placeholder="Short description about the post" class="form-control" name="description" id="" cols="30" rows="5"></textarea>
    </div>

    <br>

    <div class="form-group">
        <label for="post_category">Post Category</label>
        <br>
        <select class="form-control col-3" name="post_category" id="post_category">
            <option value="draft">Select a Category</option>
            <?php

            $query = "SELECT * FROM categories";
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
        <label for="post_status">Post Status</label>
        <br>
        <select class="form-control col-3" name="post_status" id="">
            <option value="draft">Select an Option</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
        </select>

    </div>

    <br>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <br>
            <input type="file" name="image" class="form-control">
    </div>

    <br>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>

    <br>

    <div class="form-group">

        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="default" cols="30" rows="10"></textarea>

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
                plugins: 'font print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools contextmenu colorpicker textpattern help',
                height: 500,
                branding: false,
                elementpath: false,

                menubar: false,
                toolbar: 'blocks | undo redo | bold italic underline strikethrough | fontselect fontsize formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | link image media checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile pageembed template anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
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

    <div class="form-group">
        <input type="submit" value="Publish" class="btn btn-primary" name="create_post">
    </div>

</form>