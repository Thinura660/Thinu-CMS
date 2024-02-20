      <!--================================-->
      <!-- Page Sidebar Start -->
      <!--================================-->
      <div class="page-sidebar">
          <div class="logo">
              <a class="logo-img" href="index.php">
                  <!-- <img class="desktop-logo" src="assets/images/logo-white.png" alt=""> -->
                  <img class="desktop-logo" src="other_images/<?php echo $blog_icon ?>" alt="">
                  <img class="small-logo" src="other_images/<?php echo $blog_icon ?>" alt="">
              </a>
              <i class="ion-ios-close-empty" id="sidebar-toggle-button-close"></i>
          </div>
          <!--================================-->
          <!-- Sidebar Menu Start -->
          <!--================================-->
          <div class="page-sidebar-inner">
              <div class="page-sidebar-menu">
                  <ul class="accordion-menu">

                      <!-- Dashboard -->
                      <li class="open active">
                          <a href="index.php"><i data-feather="home"></i>
                              <span>Dashboard</span></a>
                      </li>

                      <li class="menu-divider mg-y-20-force"></li>

                      <?php if ($user_role == 'admin') : ?>
                          <!-- Advertisements -->
                          <li>
                              <a href=""><i data-feather="dollar-sign"></i>
                                  <span>Advertisements</span></a>
                              <ul class="sub-menu">
                                  <li><a href="ad_providers.php"><i data-feather="dollar-sign"></i> Ad Providers</a></li>
                                  <li><a href="advertisements.php?source=sidebar"><i data-feather="plus"></i> Sidebar Ad</a></li>
                                  <li><a href="advertisements.php?source=home-top"><i data-feather="plus"></i> Home Top Ad</a></li>
                                  <li><a href="advertisements.php?source=home-bottom"><i data-feather="plus"></i> Home Bottom Ad</a></li>
                              </ul>
                          </li>
                      <?php endif; ?>

                      <li class="menu-divider mg-y-20-force"></li>

                      <li class="mg-20-force menu-elements">Management</li>

                      <!-- Posts -->
                      <li>
                          <a href=""><i data-feather="file"></i>
                              <span>Posts</span></a>
                          <ul class="sub-menu">
                              <li><a href="posts.php"><i data-feather="file-text"></i> View All posts</a></li>
                              <li><a href="posts.php?source=add_post"><i data-feather="edit"></i> Add Post</a></li>
                          </ul>
                      </li>

                      <!-- Categories -->
                      <li>
                          <a href="categories.php"><i data-feather="list"></i>
                              <span>Categories</span></a>
                      </li>

                      <?php if ($user_role == 'admin') : ?>

                          <!-- Reports -->
                          <li>
                              <a href="reports.php"><i data-feather="flag"></i>
                                  <span>Reports</span></a>
                          </li>

                          <!-- Contacts -->
                          <li>
                              <a href="contacts.php"><i data-feather="inbox"></i>
                                  <span>Contacts</span></a>
                          </li>

                          <!-- Email Config -->
                          <li>
                              <a href="email_config.php"><i data-feather="mail"></i>
                                  <span>Email Configuration</span></a>
                          </li>


                          <!-- Users -->
                          <li>
                              <a href=""><i data-feather="users"></i>
                                  <span>Users</span></a>
                              <ul class="sub-menu">
                                  <li><a href="users.php"></i> <i data-feather="user"></i> View All Users</a></li>
                                  <li><a href="users.php?source=add_user"><i data-feather="user-plus"></i> Add User</a></li>
                              </ul>
                          </li>

                          <li class="menu-divider mg-y-20-force"></li>

                          <li class="mg-20-force menu-others">Others</li>

                          <!-- Settings -->
                          <li>
                              <a href="settings.php"><i data-feather="settings"></i>
                                  <span>Settings</span></a>
                          </li>
                      <?php endif; ?>
                  </ul>
              </div>
          </div>
          <!--/ Sidebar Menu End -->
          <!--================================-->
          <!-- Sidebar Footer Start -->
          <!--================================-->
          <div class="sidebar-footer">
              <a class="pull-left" href="profile.php" data-toggle="tooltip" data-placement="top" data-original-title="Profile">
                  <i data-feather="user" class="ht-15"></i></a>
              <a class="pull-left " href="contacts.php" data-toggle="tooltip" data-placement="top" data-original-title="Contacts">
                  <i data-feather="mail" class="ht-15"></i></a>
              <a class="pull-left" href="../includes/logout.php" data-toggle="tooltip" data-placement="top" data-original-title="Logout">
                  <i data-feather="log-out" class="ht-15"></i></a>
              <a class="pull-left" target="_blank" href="../index.php" data-toggle="tooltip" data-placement="top" data-original-title="Blog">
                  <i data-feather="globe" class="ht-15"></i></a>
          </div>
          <!--/ Sidebar Footer End -->
      </div>
      <!--/ Page Sidebar End -->

      <!--================================-->
      <!-- Page Content Start -->
      <!--================================-->
      <div class="page-content">