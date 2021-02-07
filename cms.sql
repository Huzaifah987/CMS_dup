-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 02:46 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(4) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(21, 'Bootstrap'),
(22, 'Javascript '),
(23, 'Php'),
(24, 'Jquery'),
(25, 'Oriented Object Programming');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) DEFAULT NULL,
  `comment_email` varchar(255) DEFAULT NULL,
  `comment_author` varchar(255) DEFAULT NULL,
  `comment_content` longtext DEFAULT NULL,
  `comment_status` varchar(255) DEFAULT NULL,
  `comment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_email`, `comment_author`, `comment_content`, `comment_status`, `comment_date`) VALUES
(16, 33, 'amirhuzaifah987@gmail.com', 'amirhuzaifah987', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'unapproved', '2021-02-01'),
(17, 33, 'alirashan97@gmail.com', 'Jame ', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'approved', '2021-02-01'),
(18, 33, 'alirashan97@gmail.com', 'TP', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'approved', '2021-02-01'),
(19, 33, 'amirhuzaifah987@gmail.com', 'amir', ' Maecenas sit amet ante leo. Maecenas ac felis est. Aenean sed porttitor enim. Nunc dapibus at nulla nec elementum. Aliquam sed dui eu velit blandit mollis. Mauris imperdiet condimentum ipsum, vel imperdiet dui faucibus in. Vestibulum et risus purus.', 'approved', '2021-02-01'),
(20, 35, 'alirashan97@gmail.com', 'Jane', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed libero metus. Etiam nec dictum magna, ac consectetur nunc. Duis semper faucibus imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In id sem vel turpis mollis mattis. Fusce bibendum, turpis vel luctus blandit, neque leo luctus est, ut suscipit mi enim in ipsum. Proin eget fringilla ex. Nulla suscipit ligula at quam faucibus, sed eleifend sapien vulputate. Ut consectetur eu nulla vitae tincidunt. Donec ut nunc magna. Nullam quis diam aliquam, rutrum lacus maximus, mollis nisi. Suspendisse potenti. Nullam eu feugiat dolor, in lobortis ante. Sed sollicitudin metus eget dolor facilisis lacinia. Donec volutpat aliquet elit vel dapibus. Nunc lacus est, lobortis in dui ac, lacinia dapibus nunc. Nullam suscipit id mauris et consequat. Suspendisse auctor aliquam elit, mattis laoreet ex. Duis ligula ante, tristique id mattis vulputate, consequat a est. Integer sed tincidunt diam, nec elementum neque. Sed non mauris rhoncus magna pulvinar facilisis. Ut id porttitor elit. Pellentesque varius sapien at magna tempus, quis consectetur leo aliquam. Cras rutrum iaculis mi, vel rhoncus augue condimentum quis. Vivamus ut sollicitudin mi. Ut non ornare est, vitae semper arcu. Pellentesque vel nisl finibus, hendrerit arcu nec, cursus nibh.', 'approved', '2021-02-01'),
(21, 33, 'amirhuzaifah987@gmail.com', 'Jane', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'unapproved', '2021-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_author` varchar(255) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `post_Image` text DEFAULT NULL,
  `post_content` longtext DEFAULT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` varchar(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_view_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_Image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_view_count`) VALUES
(33, 21, 'Laravel', 'Jame Author', '2021-02-02', 'image_3.jpg', 'Maecenas sit amet ante leo. Maecenas ac felis est. Aenean sed porttitor enim. Nunc dapibus at nulla nec elementum. Aliquam sed dui eu velit blandit mollis. Mauris imperdiet condimentum ipsum, vel imperdiet dui faucibus in. Vestibulum et risus purus.', 'Jquery', '5', 'published', 0),
(35, 21, 'Javascript', 'Tunor', '2021-02-02', 'image_5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed libero metus. Etiam nec dictum magna, ac consectetur nunc. Duis semper faucibus imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In id sem vel turpis mollis mattis. Fusce bibendum, turpis vel luctus blandit, neque leo luctus est, ut suscipit mi enim in ipsum. Proin eget fringilla ex. Nulla suscipit ligula at quam faucibus, sed eleifend sapien vulputate. Ut consectetur eu nulla vitae tincidunt. Donec ut nunc magna. Nullam quis diam aliquam, rutrum lacus maximus, mollis nisi. Suspendisse potenti. Nullam eu feugiat dolor, in lobortis ante.\r\n\r\nSed sollicitudin metus eget dolor facilisis lacinia. Donec volutpat aliquet elit vel dapibus. Nunc lacus est, lobortis in dui ac, lacinia dapibus nunc. Nullam suscipit id mauris et consequat. Suspendisse auctor aliquam elit, mattis laoreet ex. Duis ligula ante, tristique id mattis vulputate, consequat a est. Integer sed tincidunt diam, nec elementum neque. Sed non mauris rhoncus magna pulvinar facilisis. Ut id porttitor elit. Pellentesque varius sapien at magna tempus, quis consectetur leo aliquam. Cras rutrum iaculis mi, vel rhoncus augue condimentum quis. Vivamus ut sollicitudin mi. Ut non ornare est, vitae semper arcu. Pellentesque vel nisl finibus, hendrerit arcu nec, cursus nibh.', 'JAVA', '1', 'Private', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
