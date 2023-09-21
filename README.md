
# Thinu-CMS

Thinu-CMS is a lightweight and user-friendly PHP blog system that simplifies content management for bloggers and website owners. With its intuitive interface and robust features, Thinu-CMS empowers users to create and manage their blogs effortlessly, making it the ideal platform for sharing thoughts and ideas online.


## Demo

https://cms.thinutech.software
![preview-xl](https://github.com/Thinura660/Thinu-CMS/assets/75845537/a9048c42-34ed-426f-90cb-dd3229d09880)


## Features

- Modern UI/UX Design
- Custom URL for users (www.example.com/user/Thinura)
- Ad support with 3 different locations and AdSense - integration
- Fully responsive
- Admin Panel with powerful features
- Fully customizable using the admin panel without - having programming knowledge
- Disqus comment system
- Unlimited posts, categories, users, tags
- Powerful search engine
- 3 different user roles (Admin, Publisher, Subscriber)
- Separated admin panel for publishers
- Sign in / Sign Up system (login/registration)
- Google charts to show statics of the system
- Complete password forgot system
- Show how many users online
- Secured against SQL Injections
- WYSIWYG HTML Editor for post creation
- User related posts
- Category related posts
- Working Contact page
- Navigation panel customizable via admin panel
- SEO Friendly URLs
- You can customize Site Logo, Site Title, Site theme - color, footer and etc using the admin panel
- Clean Code with comments
- Installation guide included
- Database included
- User management system
- Attractive Dashboard


## Installation

To install Thinu-CMS, follow these step-by-step instructions:

**Step 1: Create a Database**

Open your web hosting control panel and access phpMyAdmin.
Log in to phpMyAdmin using your username and password.
Click on "Databases" in the top menu.
Enter a name for your database (e.g., "myblog_cms") in the "Create database" field.
Select the appropriate collation (usually "utf8_general_ci").
Click the "Create" button to create your database.


**Step 2: Import the Database Schema**

In phpMyAdmin, select the newly created database from the left sidebar.
Click on the "Import" tab in the top menu.
Click the "Choose File" button and locate the "cms.sql" file from your Thinu-CMS installation package.
Ensure the character set is set to "utf-8" and the format is "SQL."
Click the "Go" or "Import" button to import the database schema.


**Step 3: Upload Files**

Extract the Thinu-CMS files on your local computer.
Use an FTP client or your web hosting control panel's file manager to upload all the extracted files to your website's root directory (usually public_html or www).


**Step 4: Setup**

Open your web browser and go to "http://yourdomain.com/setup" (replace "yourdomain.com" with your actual domain name).
You will be prompted to fill in some requirements:
Database Host: Usually "localhost" unless specified differently by your hosting provider.
Database Name: Enter the name of the database you created in Step 1.
Database User: Your MySQL database username.
Database Password: Your MySQL database password.
Admin Username: Choose a username for the Thinu-CMS admin account.
Admin Password: Choose a strong password for the admin account.
Site Title: Enter the title for your blog.
Site Description: Add a brief description of your blog.
Your Email: Provide your email address.
Click the "Install" button.


**Step 5: Completion**

Once the installation is successful, you will receive a confirmation message.
Remove or rename the "setup" directory for security purposes.
You can now access your Thinu-CMS blog by going to "http://yourdomain.com" in your web browser.

Congratulations! You've successfully installed Thinu-CMS and can start creating and managing your blog content.
