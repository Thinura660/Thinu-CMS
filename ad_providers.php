<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/page_navbar.php" ?>


<h3>Ad Providers</h3>

<div class="row">
    <div class="col-6">

        <?php

        if (isset($_POST['submit'])) {
            $provider_name = $_POST['provider_name'];
            $provider_code = $_POST['provider_code'];

            if ($provider_name == "" || empty($provider_name)) {
                echo '
            <div class="alert alert-danger">
                <strong>Failed!</strong> This Field should not be empty.
            </div>
            
            ';
            } else {
                $query = "INSERT INTO ad_providers(provider_name, provider_code) ";
                $query .= "VALUE('{$provider_name}', '{$provider_code}')";
                $create_provider_query = mysqli_query($connection, $query);

                if (!$create_provider_query) {
                    die('QUERY FAILED' . mysqli_error($connection));
                } else {
                    echo '
                <div class="alert alert-success">
                    <strong>Success!</strong> Category has been added.
                </div>';
                }
            }
        }

        ?>

        <form action="" method="post">

            <div class="form-group">
                <label for="cat_title">Provider Name:</label>
                <input class="form-control" type="text" name="provider_name">
            </div>

            <div class="form-group">
                <label for="cat_title">Provider Code:</label>
                <input class="form-control" type="text" name="provider_code">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Add Cateogry">
            </div>

        </form>

        <?php

        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];

            include "includes/update_providers.php";
        }

        ?>


    </div>


    <div class="col-6">


        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Provider Title</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    // Find all Providers
                    $query = "SELECT * FROM ad_providers";
                    $select_all_providers = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_providers)) {
                        $provider_id = $row['provider_id'];
                        $provider_name = $row['provider_name'];
                        $provider_code = $row['provider_code'];

                        echo "<tr>";
                        echo "<td>{$provider_id}</td>";
                        echo "<td>{$provider_name}</td>";
                        echo "<td><a href='ad_providers.php?delete={$provider_id}' onclick='return confirm('oidzsfhosidhfoh')'>Delete</td>";
                        echo "<td><a href='ad_providers.php?edit={$provider_id}'>Edit</td>";
                        echo "</tr>";
                    }

                    // Delete Providers


                    if (isset($_GET['delete'])) {
                        $delete_cat_id = $_GET['delete'];

                        $query = "DELETE FROM ad_providers WHERE provider_id = {$provider_id} ";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: ad_providers.php");
                    }

                    ?>


                </tr>
            </tbody>
        </table>

    </div>



    <?php include "includes/footer.php" ?>