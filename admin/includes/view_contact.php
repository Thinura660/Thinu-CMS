<?php

$contact_id = $_GET['contact_id'];

$contact_query = "SELECT * FROM contacts WHERE contact_id = $contact_id";
$send_contact_query = mysqli_query($connection, $contact_query);

while ($row = mysqli_fetch_assoc($send_contact_query)) {
    $contact_id      = $row['contact_id'];
    $contact_user    = $row['contact_user'];
    $contact_email   = $row['contact_email'];
    $contact_date    = $row['contact_date'];
    $contact_message = $row['contact_message'];

    $user_img_query = "SELECT * FROM users WHERE username = '{$contact_user}'";
    $send_user_query = mysqli_query($connection, $user_img_query);
    if (mysqli_num_rows($send_user_query) == 0) {
        $user_image = 'guest.png';
    } else {
        while ($row = mysqli_fetch_assoc($send_user_query)) {
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
    }
}

?>
<div>
    <hr>
    <h6>User: <?php echo $contact_user; ?></h5>

        <hr>
        <h6>Email: <?php echo $contact_email; ?></h5>

            <hr>
            <h6>Date: <?php echo $contact_date; ?></h5>

                <hr>
                <h6>Message:</h5>
                    <br>
                    <p><?php echo $contact_message ?></p>

</div>