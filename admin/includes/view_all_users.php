<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Image</th>
            <th colspan="5" style="text-align: center">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php

        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];

            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";
            echo "<td>$user_role</td>";
            echo "<td><img src='../images_users/$user_image' alt='Image' width='50px' class='img-responsive'></td>";
            echo "<td><a href='users.php?to_admin={$user_id}'>Admin</a></td>";
            echo "<td><a href='users.php?to_pub={$user_id}'>Publisher</a></td>";
            echo "<td><a href='users.php?to_sub={$user_id}'>Subscriber</a></td>";
            echo "<td><a class='delete_link btn btn-danger' href='users.php?delete={$user_id}'><i class='fa-solid fa-trash-can'></i></a></td>";
            echo "<td><a class='delete_link btn btn-warning' href='users.php?source=edit_user&u_id={$user_id}'><i class='fa-solid fa-pen-to-square'></i></a></td>";
            echo "</tr>";
        }

        ?>

    </tbody>
</table>

<?php

if (isset($_GET['delete'])) {
    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] !== 'subscriber') {
            $the_user_id = $_GET['delete'];

            $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
            $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
            $delete_query = mysqli_query($connection, $query);
            header('Location: users.php');
        }
    }
}

if (isset($_GET['to_admin'])) {

    $the_user_id = $_GET['to_admin'];

    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = '$the_user_id' ";
    $admin_query = mysqli_query($connection, $query);
    header('Location: users.php');
}

if (isset($_GET['to_pub'])) {

    $the_user_id = $_GET['to_pub'];

    $query = "UPDATE users SET user_role = 'publisher' WHERE user_id = '$the_user_id' ";
    $publisher_query = mysqli_query($connection, $query);
    header('Location: users.php');
}

if (isset($_GET['to_sub'])) {

    $the_user_id = $_GET['to_sub'];

    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = '$the_user_id' ";
    $sub_query = mysqli_query($connection, $query);
    header('Location: users.php');
}

?>