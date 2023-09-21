<?php

$query = "SELECT * FROM advertisements WHERE location = 'home-bottom'";
$send_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($send_query)) {
    $rec_id = $row['rec_id'];
    $location = $row['location'];
    $method = $row['method'];
    $provider = $row['provider'];
    $ad_code = $row['code'];
    $ad_image = $row['image'];
    $ad_action = $row['action'];
}


$query_providers = "SELECT * FROM ad_providers";
$send_query_providers = mysqli_query($connection, $query_providers);

if (isset($_POST['update'])) {
    $method = $_POST['method'];

    if ($method == 'local') {
        $image = $_FILES['ad_image']['name'];
        $image_temp = $_FILES['ad_image']['tmp_name'];
        move_uploaded_file($image_temp, "advertisement_images/$image");

        $action = $_POST['action'];
        $provider = "local";
        $code = 'none';
    } elseif ($method == 'provider') {
        $provider = $_POST['provider'];
        $code = $_POST['code'];
        $image = "none";
        $action = "none";
    }

    $update_query = "UPDATE advertisements SET method = '{$method}', provider = '{$method}', code = '{$code}' ,image = '{$image}', action = '{$action}' WHERE location='home-bottom'";
    $send_update_query = mysqli_query($connection, $update_query);

    if ($send_update_query) {
        echo "
        <div class='alert alert-success'>
             <strong>Success! </strong>Advertisement Successfully updated!.
        </div>
        ";
    }
}



?>

<h2>Home Bottom AD</h2>

<br>
<form action="" method="post" enctype="multipart/form-data">

    <label for="method">Method</label>
    <br>
    <input type="radio" value="local" name="method" class="" id="local" onclick="showText(5)" <?php if ($method == 'local') {
                                                                                                    echo "checked";
                                                                                                } ?>>
    <label for="">Local</label>

    <br>

    <input type="radio" value="provider" name="method" class="" id="custom" onclick="showText(4)" <?php if ($method == 'provider') {
                                                                                                    echo "checked";
                                                                                                } ?>>
    <label for="">Provider</label>

    <br>
    <br>

    <div id="image" <?php if($method == 'local') {echo 'style="display: block;"';} else {echo 'style="display: none;"';} ?> >
        <label for="image">Image</label>
        <br>
        <img src="advertisement_images/<?php echo $ad_image ?>" alt="" width="400px">
        <br>
        <input type="file" class="form-control" name="ad_image">
    </div>

    <br>

    <div id="action" <?php if($method == 'local') {echo 'style="display: block;"';} else {echo 'style="display: none;"';} ?>>
        <label for="action">Action</label>
        <input type="url" class="form-control" value="<?php echo $ad_action ?>" name="action">
    </div>


    <div id="provider" <?php if($method == 'provider') {echo 'style="display: block;"';} else {echo 'style="display: none;"';} ?> >
        <label for="provider">Provider</label>
        <br>
        <select name="provider" class="form-control">

            <?php
            while ($row = mysqli_fetch_assoc($send_query_providers)) {
                $provider_name = $row['provider_name'];
            ?>

                <option value="<?php echo $provider_name ?>"><?php echo $provider_name ?></option>

            <?php } ?>

        </select>

        <label for="code">Advertisement Code</label>
        <br>
        <textarea class="form-control" name="code" id="code" cols="30" rows="10"></textarea>
    </div>

    <br>

    <input type="submit" value="Update" name="update" class="btn btn-primary">

</form>


<script>
    function showText(num) {
        if (num == 5) {
            document.getElementById('image').style.display = 'block';
            document.getElementById('action').style.display = 'block';
            document.getElementById('provider').style.display = 'none';

        } else if (num == 4) {
            document.getElementById('provider').style.display = 'block';
            document.getElementById('image').style.display = 'none';
            document.getElementById('action').style.display = 'none';

        } else if (document.getElementById('local').checked) {
            document.getElementById('image').style.display = 'block';
            document.getElementById('action').style.display = 'block';
            document.getElementById('provider').style.display = 'none';
        } else {
            document.getElementById('image').style.display = 'none';
            document.getElementById('action').style.display = 'none';
            document.getElementById('provider').style.display = 'none';
        }
        return;
    }
</script>