-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2020 at 04:16 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `picturegram`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `UserID`, `PostID`, `Comment`, `Date`) VALUES
(1, 1, 1, 'Aenean cursus scelerisque iaculis. Vivamus enim sem, pharetra placerat vulputate pellentesque, ornare in velit. Donec sollicitudin pharetra fringilla. Duis pretium malesuada nisi. Vivamus at varius lectus. Praesent est sem, lobortis nec dui et, efficitur aliquet metus. Quisque pharetra vulputate turpis a sagittis. ', '2020-11-01 18:38:25'),
(2, 1, 1, 'Nnon ullamcorper ante. Nulla aliquam volutpat ligula, vel pretium arcu interdum vel. Nam id varius nisi, ut fringilla diam. Vestibulum congue ultricies nisl eget malesuada. Donec eget dapibus tortor. ', '2020-11-01 18:38:25'),
(3, 1, 1, 'Cras sagittis arcu orci, ut vestibulum neque ornare id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec eu leo vitae velit consequat consectetur a eu est.  ', '2020-11-01 18:38:25'),
(4, 1, 2, 'Vivamus volutpat viverra ultrices. Pellentesque porta scelerisque auctor. Sed luctus, massa nec luctus fringilla, urna diam semper turpis, a cursus massa ligula vitae mi.\r\n', '2020-11-01 18:38:25'),
(5, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing!! ', '2020-11-01 18:38:25'),
(6, 1, 2, 'Strange, wonder how they got there??!', '2020-11-01 18:38:25'),
(7, 1, 3, 'Donec eu leo vitae velit consequat consectetur a eu est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean laoreet tortor eros, sed pretium mi lacinia ut. Nunc imperdiet velit quam, quis aliquet augue imperdiet vel.\r\n', '2020-11-01 18:38:25'),
(8, 1, 3, 'Is this a winery?', '2020-11-01 18:38:25'),
(9, 1, 3, 'What a view!!', '2020-11-01 18:38:25'),
(10, 1, 4, 'Nostra, per inceptos himenaeos. Aenean laoreet tortor eros, sed pretium mi lacinia ut. Nunc imperdiet velit quam, quis aliquet augue imperdiet vel.\r\n', '2020-11-01 18:38:25'),
(11, 1, 4, 'In id risus justo. Aenean id elementum justo. Fusce rutrum ligula a ligula fermentum dapibus. Nunc non libero tincidunt leo lacinia blandit quis vel elit.', '2020-11-01 18:38:25'),
(12, 1, 4, 'Looks like you\'re on the ferry!', '2020-11-01 18:38:25'),
(13, 1, 5, '\r\nVenenatis vitae, tincidunt id nisi. Sed ipsum velit, sodales nec ultricies eget, sagittis eget lorem. Nam in congue nulla.', '2020-11-01 18:38:25'),
(14, 1, 5, 'Gotta love fresh veggies!', '2020-11-01 18:38:25'),
(15, 1, 5, 'So pretty', '2020-11-01 18:38:25'),
(20, 1, 4, 'TEMP', '2020-11-11 20:26:34'),
(21, 1, 4, 'This is a comment', '2020-11-11 20:30:22'),
(22, 1, 3, 'This is a comment', '2020-11-11 20:30:48'),
(23, 1, 6, 'Hello', '2020-11-11 21:00:18'),
(24, 1, 7, 'messi the goat', '2020-11-12 01:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LoginID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LoginID`, `UserID`, `Username`, `Password`) VALUES
(1, 1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `PostID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PostImage` varchar(50) NOT NULL,
  `Post` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PostID`, `UserID`, `PostImage`, `Post`, `Date`) VALUES
(1, 1, 'sunset.jpg', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos.', '2020-11-01 18:17:38'),
(2, 1, 'poppies.jpg', 'Pellentesque pellentesque hendrerit rhoncus. Curabitur quis elementum lorem, finibus molestie.', '2020-11-01 18:17:38'),
(3, 1, 'valley1.jpg', 'Fusce libero ligula, feugiat sit. Ut non tincidunt odio, a.', '2020-11-01 18:20:27'),
(4, 1, 'cityscape.jpg', 'Quisque consequat tellus diam, ut.Vestibulum non purus magna. Nam varius, justo dignissim dapibus sollicitudin.', '2020-11-01 18:20:27'),
(5, 1, 'farm.jpg', 'Lorem ipsum dolor sit amet. Fusce ac nisi quis.', '2020-11-01 18:20:27'),
(6, 1, 'hello.jpg', 'Hello', '2020-11-11 20:46:54'),
(7, 1, 'messi.jpg', 'The GOAT', '2020-11-12 01:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `About` text NOT NULL,
  `AboutImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `About`, `AboutImage`) VALUES
(1, 'Lorem Nullam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id varius magna, scelerisque aliquet odio. Fusce vel scelerisque felis, a facilisis felis. Donec pharetra lacus nulla, vel lobortis turpis convallis porttitor. Quisque vehicula ut purus ac venenatis. Phasellus pharetra sit amet tellus sit amet accumsan. Vivamus in faucibus metus. Proin et tellus luctus ipsum finibus posuere. In vulputate urna orci, vel tristique quam ornare eget. Etiam eget odio felis. Vestibulum a eros eleifend, bibendum dui nec, tristique quam. Phasellus molestie ex ac ipsum posuere, sit amet pellentesque orci vulputate. Proin posuere augue at turpis tincidunt venenatis.\r\n\r\nIn id ante laoreet, interdum ex sed, varius nunc. Etiam ut felis congue lacus imperdiet egestas quis in odio. Nam rhoncus purus enim, a pharetra urna hendrerit vel. Morbi laoreet et mauris quis egestas. Vivamus euismod quam a nisi accumsan volutpat. Pellentesque dui diam, consequat nec consequat nec, ultrices quis tellus. Sed aliquam luctus nisl non lacinia. Etiam faucibus magna et tincidunt fringilla. Nulla sed justo pulvinar, porta mi vel, ornare nisi. Maecenas sit amet cursus justo. Proin lacinia neque urna.\r\n\r\nAdded file.\r\n', 'dal-about.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `PostID` (`PostID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`PostID`) REFERENCES `posts` (`PostID`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
