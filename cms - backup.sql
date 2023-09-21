-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 11:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `rec_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `image` text NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`rec_id`, `location`, `method`, `provider`, `code`, `image`, `action`) VALUES
(3, 'sidebar', 'local', 'local', 'none', '250x250.png', 'https://www.codester.com/Thinura/'),
(4, 'home-top', 'local', 'local', 'none', '728x90.png', 'https://www.codester.com/Thinura/'),
(5, 'home-bottom', 'local', 'local', 'none', '728x90.png', 'https://www.codester.com/Thinura/');

-- --------------------------------------------------------

--
-- Table structure for table `ad_providers`
--

CREATE TABLE `ad_providers` (
  `provider_id` int(255) NOT NULL,
  `provider_name` varchar(255) NOT NULL,
  `provider_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_user` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_date` date NOT NULL,
  `contact_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `showHome` varchar(255) NOT NULL,
  `showAdmin` varchar(255) NOT NULL,
  `showContact` varchar(255) NOT NULL,
  `showReg` varchar(255) NOT NULL,
  `showLogin` varchar(255) NOT NULL,
  `showEdit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`showHome`, `showAdmin`, `showContact`, `showReg`, `showLogin`, `showEdit`) VALUES
('on', 'on', 'on', 'on', 'on', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `post_description` text NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `seo_title`, `post_description`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_status`, `post_views_count`) VALUES
(205, 9, 'Exploring the Power and Versatility of PHP', 'Exploring-the-Power-and-Versatility-of-PHP', 'In the world of web development, PHP (Hypertext Preprocessor) stands as a cornerstone, having played an instrumental role in shaping the digital landscape we interact with today. From dynamic websites to powerful web applications, PHP has been a reliable companion for developers for over two decades. In this blog post, we\'ll delve into the world of PHP, exploring its history, features, use cases, and why it continues to be a relevant and valuable tool for developers worldwide.', 'Dinujaya', '2023-08-25', 'ben-griffiths-Bj6ENZDMSDY-unsplash.jpg', '<div class=\"\\\">\r\n<div class=\"\\\">\r\n<div class=\"\\\">\r\n<div class=\"\\\">\r\n<div class=\"\\\">\r\n<div class=\"\\\">\r\n<p><strong>Introduction</strong></p>\r\n<p>In the world of web development, PHP (Hypertext Preprocessor) stands as a cornerstone, having played an instrumental role in shaping the digital landscape we interact with today. From dynamic websites to powerful web applications, PHP has been a reliable companion for developers for over two decades. In this blog post, we\'ll delve into the world of PHP, exploring its history, features, use cases, and why it continues to be a relevant and valuable tool for developers worldwide.</p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"http://localhost/thinu-local/admin/includes/tinymce/images/ben-griffiths-gAe1pHGc6ms-unsplash.jpg\" alt=\"\" width=\"500\" height=\"333\"></p>\r\n<p><strong>A Brief History of PHP</strong></p>\r\n<p>PHP\'s journey began in 1994 when Rasmus Lerdorf created a set of tools to track visits to his online resume. What started as Personal Home Page Tools eventually evolved into PHP/FI (Forms Interpreter) in 1995. The project underwent further transformation and became known as PHP Hypertext Preprocessor or PHP 3. This marked the shift from a simple set of tools to a more robust scripting language capable of creating dynamic web pages.</p>\r\n<p>PHP 4, released in 2000, brought significant improvements, including enhanced performance and support for web servers beyond Apache. However, it was PHP 5, launched in 2004, that truly revolutionized the language with features like the Zend Engine, which boosted performance and introduced support for object-oriented programming (OOP). PHP 7, released in 2015, further amplified its capabilities, emphasizing performance improvements and memory efficiency.</p>\r\n<p><strong>Key Features and Advantages</strong></p>\r\n<ol>\r\n<li>\r\n<p><strong>Ease of Use:</strong> One of PHP\'s standout features is its user-friendly syntax, which is easy to grasp, especially for newcomers to programming. This simplicity accelerates development and reduces the learning curve.</p>\r\n</li>\r\n<li>\r\n<p><strong>Versatility:</strong> PHP can be embedded within HTML code, making it ideal for creating dynamic web pages. It\'s compatible with various web servers and can interact with different databases, allowing developers to build complex applications.</p>\r\n</li>\r\n<li>\r\n<p><strong>Rapid Development:</strong> With a plethora of pre-built functions and frameworks available, PHP enables rapid application development. Frameworks like Laravel, Symfony, and CodeIgniter provide robust structures and tools that streamline the development process.</p>\r\n</li>\r\n<li>\r\n<p><strong>Scalability:</strong> While PHP\'s reputation was initially tied to small-scale websites, advancements in its core and the emergence of PHP 7 have significantly improved its performance and scalability. PHP can now handle larger and more demanding applications.</p>\r\n</li>\r\n<li>\r\n<p><strong>Active Community:</strong> PHP boasts a thriving community of developers who contribute to its growth through open-source projects, libraries, and frameworks. This support network ensures that solutions to common challenges are readily available.</p>\r\n</li>\r\n</ol>\r\n<p><strong>Use Cases of PHP</strong></p>\r\n<ol>\r\n<li>\r\n<p><strong>Web Development:</strong> PHP\'s primary application is web development. It powers a substantial portion of the internet, including content management systems (CMS) like WordPress, Joomla, and Drupal.</p>\r\n</li>\r\n<li>\r\n<p><strong>E-Commerce:</strong> PHP is widely used for creating online stores and e-commerce platforms. Frameworks like Magento provide a foundation for building feature-rich online shops.</p>\r\n</li>\r\n<li>\r\n<p><strong>Web Applications:</strong> Beyond websites, PHP facilitates the creation of dynamic web applications, ranging from social media platforms to collaborative tools and project management systems.</p>\r\n</li>\r\n<li>\r\n<p><strong>API Development:</strong> PHP can be used to create APIs (Application Programming Interfaces) that allow different software components to communicate with each other.</p>\r\n</li>\r\n<li>\r\n<p><strong>Command-Line Scripting:</strong> PHP\'s command-line interface (CLI) enables developers to write scripts for automating tasks and performing system operations.</p>\r\n</li>\r\n</ol>\r\n<p><strong>Conclusion</strong></p>\r\n<p>PHP\'s journey from its humble beginnings to becoming a stalwart of web development showcases its adaptability and staying power. Its ease of use, versatility, and robust community support have ensured its continued relevance in an ever-evolving tech landscape. Whether you\'re a beginner taking your first steps in web development or an experienced coder building complex applications, PHP offers a versatile and powerful toolset to bring your ideas to life. As PHP continues to evolve, it will undoubtedly maintain its status as a cornerstone of modern web development.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'php, technology', 'published', 14);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `report_user` varchar(255) NOT NULL,
  `report_post` text NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `blog_name` varchar(255) NOT NULL,
  `home_icon` text NOT NULL,
  `blog_email` varchar(255) NOT NULL,
  `blog_description` text NOT NULL,
  `blog_icon` text NOT NULL,
  `theme_color` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `hero_title` varchar(255) NOT NULL,
  `footer_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`blog_name`, `home_icon`, `blog_email`, `blog_description`, `blog_icon`, `theme_color`, `keywords`, `hero_title`, `footer_text`) VALUES
('Thinuu\'s blog', 'Thinuu.png', 'thinu@thinu.com', 'cmsmcsms', 'Thinuu.png', '#000000', 'cms', '', 'Copyright© 2023 | All rights reserved. | Created By Thinura Premawardana');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_job` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `cover_image` text NOT NULL,
  `token` text NOT NULL,
  `user_website` text NOT NULL,
  `user_facebook` text NOT NULL,
  `user_twitter` text NOT NULL,
  `user_instagram` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'ih0ro5btis301mjr59qdh2i3md', 1670777222),
(2, '69b7ltje24n42ko71a06at7649', 1670760644),
(3, 'igbae72euim3jjh3krkk9g62lv', 1670766170),
(4, '9grt2u30g153fao8l1fbmg44ob', 1670766261),
(5, 'gd3d1acfr0cc0q5f8vjh3pns4q', 1670766346),
(6, 's643k5r63pfkmqsbvdo2df00f4', 1670771191),
(7, '', 1670769860),
(8, 'kg23ta519olo01ovuif4v2mk7o', 1670777205),
(9, '3g6fnrhfkbfdgh82a2ik2vvms7', 1670842869),
(10, 'llho8pui63fukaa342k8srr4ke', 1671015087),
(11, '3q2rgn80m39i3uti68c1j6181a', 1671019574),
(12, 'b702mlqb4db240hkp6dngl27le', 1671100385),
(13, 'gonsd2478pi7vis10d9k8n18jc', 1671168344),
(14, '0h48s4un5q73iull1l5qhuh3l7', 1671445683),
(15, '1on55srdhnojq3380mfu5s2gul', 1671619836),
(16, '3erghh0fi7op5jkiniltrp5dmb', 1671704878),
(17, 'e66tsde5jemk278tt3r1ooqvas', 1671707126),
(18, 'ii2iu1s4kakdc125d5o7k0cppv', 1671766395),
(19, '8o3ujnc6aohf27m1bqs05jf58m', 1671767243),
(20, '2hh6sl8d0v64ob0k84srob06mu', 1671778846),
(21, 'bi2cgkl4ajgmtov32tv2vbsf8h', 1671900336),
(22, 'phlnprd33a4o6e422j2ere61a0', 1671985067),
(23, '80qsorqcnpme0ehlhqn3bnf93v', 1672039979),
(24, '2ee552e9557204e0dc2ed5f57c5c1d9e', 1672069282),
(25, 'dsmedph77566pnmke47fo1j20n', 1672074131),
(26, 'a26mt8hs6c2kc3a3dcv938e0kr', 1672161373),
(27, '9o11laqmqs6qg19j949cu3n73r', 1676263645),
(28, '7nm6g43cc177ulr3oltr84ntum', 1676315112),
(29, '8b9ckko0a041bik7binm1g5vm7', 1676306390),
(30, 'a9drr8qu5sfqbk699p40sn0gu1', 1676350061),
(31, '2dr9fndvl54jvrj2k924e4n00e', 1680715543),
(32, 'gb6le4v6ubnamn3d1kb1vqtig4', 1680770066),
(33, 'bq3gkj5niuusdess79eci9seru', 1681030303);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `ad_providers`
--
ALTER TABLE `ad_providers`
  ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`showHome`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`blog_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
