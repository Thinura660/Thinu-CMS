<form action="" method="post">

        <div class="form-group">
            

    <?php

        if(isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $edit_categories = mysqli_query($connection, $query);
    
            while($row = mysqli_fetch_assoc($edit_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                ?>

        <div class="form-group">
            <label for="cat_title">Edit Title:</label>
            <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">
            <br>
            <input class="btn btn-primary" type="submit" name="update" value="Update Cateogry">
        </div>

        <?php }} ?>

        <?php

        // Update Category
        if(isset($_POST['update'])) {
            $edit_cat_title = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$edit_cat_title}' WHERE cat_id = {$cat_id}";
            $update_query = mysqli_query($connection, $query);
            if(!$update_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }          

        ?>

            
        </div>

        

    </form>