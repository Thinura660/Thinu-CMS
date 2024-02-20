<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/page_navbar.php" ?>



        <h3>Categories</h3>

        <div class="row">
            <div class="col-6">

                <?php

                insert_categories();

                ?>

                <form action="" method="post">

                    <div class="form-group">
                        <label for="cat_title">Cateogry Title:</label>
                        <input class="form-control" type="text" name="cat_title">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Add Cateogry">
                    </div>

                </form>

                <?php

                if (isset($_GET['edit'])) {
                    $cat_id = $_GET['edit'];

                    include "includes/update_categories.php";
                }

                ?>


            </div>


            <div class="col-6">


                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            // Find all Categories
                            $query = "SELECT * FROM categories";
                            $select_all_categories = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_all_categories)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];

                                echo "<tr>";
                                echo "<td>{$cat_id}</td>";
                                echo "<td>{$cat_title}</td>";
                                echo "<td><a href='categories.php?delete={$cat_id}' onclick='return confirm('oidzsfhosidhfoh')'>Delete</td>";
                                echo "<td><a href='categories.php?edit={$cat_id}'>Edit</td>";
                                echo "</tr>";
                            }

                            ?>

                            <script>
                                function confirmDetete() {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "You won't be able to revert this!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                            )


                                        }
                                    })
                                }
                            </script>
                            <?php
                            // Delete Categories


                            if (isset($_GET['delete'])) {
                                $delete_cat_id = $_GET['delete'];

                                $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id} ";
                                $delete_query = mysqli_query($connection, $query);
                                header("Location: categories.php");
                            }

                            ?>


                        </tr>
                    </tbody>
                </table>

            </div>



            <?php include "includes/footer.php" ?>