<form action="" method="post">

        <div class="form-group">
            

    <?php

        if(isset($_GET['edit'])) {
            $provider_id = $_GET['edit'];
            $query = "SELECT * FROM ad_providers WHERE provider_id = $provider_id";
            $edit_categories = mysqli_query($connection, $query);
    
            while($row = mysqli_fetch_assoc($edit_categories)) {
                $provider_id = $row['provider_id'];
                $provider_name = $row['provider_name'];
                $provider_code = $row['provider_code'];

                ?>

        <div class="form-group">
            <label for="cat_title">Edit Title:</label>
            <input value="<?php if(isset($provider_name)) {echo $provider_name;} ?>" class="form-control" type="text" name="provider_name">
            <br>
            <input value="<?php if(isset($provider_code)) {echo $provider_code;} ?>" class="form-control" type="text" name="provider_code">
            <br>
            <input class="btn btn-primary" type="submit" name="update" value="Update Provider">
        </div>

        <?php }} ?>

        <?php

        // Update Category
        if(isset($_POST['update'])) {
            $edit_provider_name = $_POST['provider_name'];
            $edit_provider_code = $_POST['provider_code'];
            $query = "UPDATE ad_providers SET provider_name = '{$edit_provider_name}', provider_code = '{$edit_provider_code}' WHERE provider_id = {$provider_id}";
            $update_query = mysqli_query($connection, $query);
            if(!$update_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            } else {
                header("Location: ./ad_providers.php");
            }
        }          

        ?>

            
        </div>

        

    </form>