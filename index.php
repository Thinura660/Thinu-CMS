<?php include "includes/header.php" ?>

<?php include "includes/sidebar.php" ?>

<?php include "includes/page_navbar.php" ?>



<!--================================-->
<!-- Count Card Start -->
<!--================================-->

<?php

$user_role = $_SESSION['user_role'];
$username = $_SESSION['username'];

if (isset($_SESSION['user_role']) and $_SESSION['user_role'] == 'admin') {

   //Getting Count of Posts, Categories, Users

   //Posts Count
   $query = "SELECT * FROM posts";
   $select_all_posts = mysqli_query($connection, $query);
   $post_count = mysqli_num_rows($select_all_posts);

   //Published Posts Count
   $query = "SELECT * FROM posts WHERE post_status = 'published' ";
   $select_all_published_posts = mysqli_query($connection, $query);
   $published_post_count = mysqli_num_rows($select_all_published_posts);

   //Draft Posts Count
   $query = "SELECT * FROM posts WHERE post_status = 'drafted' ";
   $select_all_draft_posts = mysqli_query($connection, $query);
   $draft_post_count = mysqli_num_rows($select_all_draft_posts);

   //Category Count
   $query = "SELECT * FROM categories";
   $select_all_cats = mysqli_query($connection, $query);
   $cat_count = mysqli_num_rows($select_all_cats);

   //Reports Count
   $query = "SELECT * FROM reports";
   $select_all_reports = mysqli_query($connection, $query);
   $report_count = mysqli_num_rows($select_all_reports);

   //Users Count

   //All
   $query = "SELECT * FROM users";
   $select_all_users = mysqli_query($connection, $query);
   $user_count = mysqli_num_rows($select_all_users);

   //Admin Count
   $query = "SELECT * FROM users WHERE user_role = 'admin' ";
   $select_all_admin_users = mysqli_query($connection, $query);
   $admin_user_count = mysqli_num_rows($select_all_admin_users);

   //Publisher Count
   $query = "SELECT * FROM users WHERE user_role = 'publisher' ";
   $select_all_publisher_users = mysqli_query($connection, $query);
   $publisher_user_count = mysqli_num_rows($select_all_publisher_users);

   //Subscriber Count
   $query = "SELECT * FROM users WHERE user_role = 'subscriber' ";
   $select_all_sub_users = mysqli_query($connection, $query);
   $sub_user_count = mysqli_num_rows($select_all_sub_users);
} else {

   //Posts Count
   $query = "SELECT * FROM posts WHERE post_author = '{$username}'";
   $select_all_posts = mysqli_query($connection, $query);
   $post_count = mysqli_num_rows($select_all_posts);

   //Published Posts Count
   $query = "SELECT * FROM posts WHERE post_status = 'published' AND post_author = '{$username}'";
   $select_all_published_posts = mysqli_query($connection, $query);
   $published_post_count = mysqli_num_rows($select_all_published_posts);

   //Draft Posts Count
   $query = "SELECT * FROM posts WHERE post_status = 'drafted' AND post_author = '{$username}'";
   $select_all_draft_posts = mysqli_query($connection, $query);
   $draft_post_count = mysqli_num_rows($select_all_draft_posts);

   //Category Count
   $query = "SELECT * FROM categories";
   $select_all_cats = mysqli_query($connection, $query);
   $cat_count = mysqli_num_rows($select_all_cats);
}

?>

<div class="row row-xs clearfix">


   <div class="col-sm-6 <?php if ($user_role == 'admin') {
                           echo 'col-xl-3';
                        } else {
                           echo 'col-xl-6';
                        } ?>">
      <div class="card mg-b-20">
         <div class="card-body pd-y-0">
            <div class="custom-fieldset mb-4">
               <div class="clearfix">
                  <label>All Posts</label>
               </div>
               <div class="d-flex align-items-center tx-white">
                  <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-warning">
                     <i class="icon-notebook tx-warning tx-20"></i>
                  </div>
                  <div>
                     <h2 class="tx-white tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik">
                        <span class="counter"><?php echo $post_count ?></span>
                     </h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <div class="col-sm-6 <?php if ($user_role == 'admin') {
                           echo 'col-xl-3';
                        } else {
                           echo 'col-xl-6';
                        } ?>">
      <div class="card mg-b-20">
         <div class="card-body pd-y-0">
            <div class="custom-fieldset mb-4">
               <div class="clearfix">
                  <label>Categories</label>
               </div>
               <div class="d-flex align-items-center tx-white">
                  <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-success">
                     <i class=" icon-list tx-success tx-20"></i>
                  </div>
                  <div>
                     <h2 class="tx-white tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik">
                        <span class="counter"><?php echo $cat_count ?></span>
                     </h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php if ($user_role == 'admin') : ?>

      <div class="col-sm-6 col-xl-3">
         <div class="card mg-b-20">
            <div class="card-body pd-y-0">
               <div class="custom-fieldset mb-4">
                  <div class="clearfix">
                     <label>All Users</label>
                  </div>
                  <div class="d-flex align-items-center tx-white">
                     <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-primary">
                        <i class="icon-user tx-primary tx-20"></i>
                     </div>
                     <div>
                        <h2 class="tx-white tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik">
                           <span class="counter"><?php echo $user_count ?></span>
                        </h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>



      <div class="col-sm-6 col-xl-3">
         <div class="card mg-b-20">
            <div class="card-body pd-y-0">
               <div class="custom-fieldset mb-4">
                  <div class="clearfix">
                     <label>Total Reports</label>
                  </div>
                  <div class="d-flex align-items-center tx-white">
                     <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-danger">
                        <i class="icon-flag tx-danger tx-20"></i>
                     </div>
                     <div>
                        <h2 class="tx-white tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik">
                           <span class="counter"><?php echo $report_count ?></span>
                        </h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

   <?php endif; ?>

</div>
<!--/ Count Card End -->
<div class="row row-xs clearfix">
   <div class="row row-xs clearfix">

      <!--================================-->
      <!-- Post History Start -->
      <!--================================-->
      <div class="row row-xl col-xl-12 clearfix">

         <div class=<?php if($user_role !== 'admin'){echo 'col-xl-12';} else {"col-xl-4";} ?>>
            <div class="card mg-b-20">
               <div class="card-header">
                  <h4 class="card-header-title">
                     Recent Posts
                  </h4>
                  <div class="card-header-btn">
                     <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#transactionHistory" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                     <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                     <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                     <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                  </div>
               </div>
               <div class="collapse show" id="transactionHistory">
                  <ul class="list-group list-group-flush tx-13">

                     <?php

                     $query = "SELECT * FROM posts ORDER BY post_date DESC LIMIT 5";
                     $send_query = mysqli_query($connection, $query);

                     while ($row = mysqli_fetch_assoc($send_query)) {
                        $post_id = $row['post_id'];
//                        $post_title = $row['post_title'];
                        $post_title = substr($row['post_title'], 0, 20) . "... ";
                        $seo_title = $row['seo_title'];
                        $post_image = $row['post_image'];
                        $post_date = $row['post_date'];
                        $post_status = $row['post_status'];
                        $post_author = $row['post_author'];


                     ?>

                        <li class="list-group-item d-flex pd-sm-x-20">
                           <div class="d-none d-sm-block"><span class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-success"><img src="../images/<?php echo $post_image ?>" width="50px" alt=""></span></div>
                           <div class="pd-sm-l-10">
                              <p class="tx-white mg-b-0 tx-medium"><a target="_blank" href="../post/<?php echo $seo_title ?>" class="tx-white mg-b-0 tx-semibold"><?php echo $post_title ?></a></p>
                              <span class="tx-12 mg-b-0 tx-gray-500"><?php echo $post_author ?></span>
                           </div>
                           <div class="mg-l-auto text-right">
                              <p class="mg-b-0 tx-rubik tx-white "><?php echo "&nbsp&nbsp" . $post_date ?></p>
                              <span class="tx-12 <?php if ($post_status == 'published') {
                                                      echo 'tx-success mg-b-0';
                                                   } else {
                                                      echo 'tx-danger mg-b-0';
                                                   } ?> "><?php echo $post_status ?></span>
                           </div>
                        </li>

                     <?php } ?>

                  </ul>
               </div>
            </div>
         </div>

         <!--================================-->
         <!-- Post History End -->
         <!--================================-->


         <!--================================-->
         <!-- Reports Start -->
         <!--================================-->

         <div class="col-xl-4" style="<?php if($user_role !== 'admin'){echo 'visibility: hidden;';} ?>">
               <div class="card mg-b-20">
                  <div class="card-header">
                     <h4 class="card-header-title">
                        Reports
                     </h4>
                     <div class="card-header-btn">
                        <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#transactionHistory" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                     </div>
                  </div>
                  <div class="collapse show" id="transactionHistory">
                     <ul class="list-group list-group-flush tx-13">

                        <?php

                        $report_query = "SELECT * FROM reports ORDER BY report_date DESC LIMIT 5";
                        $send_query = mysqli_query($connection, $report_query);

                        while ($row = mysqli_fetch_assoc($send_query)) {
                           $report_id = $row['report_id'];
                           $report_user = $row['report_user'];
                           $report_date = $row['report_date'];
                           $report_post = $row['report_post'];

                           $user_img_query = "SELECT * FROM users WHERE username = '{$report_user}'";
                           $send_user_query = mysqli_query($connection, $user_img_query);
                           while ($row = mysqli_fetch_assoc($send_user_query)) {
                              $user_image = $row['user_image'];
                           }

                           $post_title_query = "SELECT * FROM posts WHERE post_id = '{$report_id}'";
                           $send_post_title_query = mysqli_query($connection, $post_title_query);
                           while ($row = mysqli_fetch_assoc($send_post_title_query)) {
                              $post_title = $row['post_title'];
                           }

                        ?>

                           <li class="list-group-item d-flex pd-sm-x-20">
                              <div class="d-none d-sm-block"><span class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-success"><img src="../images_users/<?php echo $user_image ?>" width="50px" alt=""></span></div>
                              <div class="pd-sm-l-10">
                                 <p class="tx-white mg-b-0 tx-medium"><a target="_blank" href="reports.php" class="tx-white mg-b-0 tx-semibold">Report by <?php echo $report_user ?></a></p>
                                 <span class="tx-12 mg-b-0 tx-gray-500"><?php echo $post_title ?></span>
                              </div>
                              <div class="mg-l-auto text-right">
                                 <p class="mg-b-0 tx-rubik tx-white "><?php echo $report_date ?></p>
                              </div>
                           </li>

                        <?php } ?>

                     </ul>
                  </div>

               </div>
         </div>

         <!--================================-->
         <!-- Reports End -->
         <!--================================-->


         <!--================================-->
         <!-- Contacts Start -->
         <!--================================-->
         <div class="col-xl-4" style="<?php if($user_role !== 'admin'){echo 'opacity:0;';} ?>">
               <div class="card mg-b-20">
                  <div class="card-header">
                     <h4 class="card-header-title">
                        Rcent Contacts
                     </h4>
                     <div class="card-header-btn">
                        <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#transactionHistory" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                     </div>
                  </div>
                  <div class="collapse show" id="transactionHistory">
                     <ul class="list-group list-group-flush tx-13">

                        <?php

                        $contact_query = "SELECT * FROM contacts ORDER BY contact_date DESC LIMIT 5";
                        $send_contact_query = mysqli_query($connection, $contact_query);

                        while ($row = mysqli_fetch_assoc($send_contact_query)) {
                           $contact_id      = $row['contact_id'];
                           $contact_user    = $row['contact_user'];
                           $contact_email   = $row['contact_email'];
                           $contact_date    = $row['contact_date'];
                           $contact_message = substr($row['contact_message'], 0, 20);

                           $user_img_query = "SELECT * FROM users WHERE username = '{$contact_user}'";
                           $send_user_query = mysqli_query($connection, $user_img_query);
                           if (mysqli_num_rows($send_user_query) == 0) {
                              $user_image = 'guest.png';
                           } else {
                              while ($row = mysqli_fetch_assoc($send_user_query)) {
                                 $user_image = $row['user_image'];
                              }
                           }

                        ?>

                           <li class="list-group-item d-flex pd-sm-x-20">
                              <div class="d-none d-sm-block"><span class="wd-40 ht-40 mg-r-10 d-flex align-items-center justify-content-center rounded card-icon-success"><img src="../images_users/<?php echo $user_image ?>" width="50px" alt=""></span></div>
                              <div class="pd-sm-l-10">
                                 <p class="tx-white mg-b-0 tx-medium"><a target="_blank" href="contacts.php" class="tx-white mg-b-0 tx-semibold"><?php echo $contact_message . '...' ?></a></p>
                                 <span class="tx-12 mg-b-0 tx-gray-500"><?php echo $contact_user ?></span>
                              </div>
                              <div class="mg-l-auto text-right">
                                 <p class="mg-b-0 tx-rubik tx-white "><?php echo $contact_date ?></p>
                              </div>
                           </li>

                        <?php } ?>

                     </ul>

                  </div>
               </div>


         </div>

         <!--================================-->
         <!-- Contacts End -->
         <!--================================-->


      </div>


      <!--================================-->
      <!-- Bar Chart 1 Start -->
      <!--================================-->
      <div class="col-xl-12" style="<?php if($user_role !== 'admin'){echo 'opacity:0;';} ?>">
         <div class="card mg-b-20">
            <div class="card-header">
               <h4 class="card-header-title">
                  Details
               </h4>
               <div class="card-header-btn">
                  <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse1" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                  <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                  <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                  <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
               </div>
            </div>
            <div class="card-body collapse show" id="collapse1">
               <div class="clearfix">
                  <div id="chartBar1" class="br-chartist ht-200 ht-sm-300"></div>
               </div>
            </div>
         </div>
      </div>
      <!--/ Bar Chart 1 End -->
      <!--================================-->


   </div>
   <!--/ Main Wrapper End -->
</div>
<!--/ Page Inner End -->
<!--================================-->
<!-- Page Footer Start -->
<!--================================-->
<footer class="page-footer">
   <div class="pd-t-4 pd-b-0 pd-x-20">
      <div class="tx-10 tx-uppercase">
         <p class="pd-y-10 mb-0"><?php echo $footer_text ?></p>
      </div>
   </div>
</footer>
<!--/ Page Footer End -->
</div>
<!--/ Page Content End -->
</div>
<!--/ Page Container End -->
<!--================================-->
<!-- Scroll To Top Start-->
<!--================================-->
<a href="" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
<!--/ Scroll To Top End -->
<!--================================-->




<?php include "includes/charts/chart-admin.php" ?>
<?php include "includes/footer.php" ?>