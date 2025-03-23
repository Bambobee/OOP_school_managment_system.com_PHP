-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 02:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `user_id`, `school_id`, `class_id`, `date`) VALUES
(1, 'form one', 'eGWJaL9e42i8zw0eb2zz0ZyKZCL7lA4Y0wy3n5VbNk5fPdGKjl1tfshxLRe', '3XqhudGuP5obX6aJRY2ZrNrT4y0DuZ5brOutmFwfe1aAR4iBgBqrd41DuS9M', 'XkBeQRVtkOohdKrUMq9LHokMATGZgXOXIeFkVovnmazBMOR5TcKZdv4r3Sz', '2025-02-23 10:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `class_lecturers`
--

CREATE TABLE `class_lecturers` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_lecturers`
--

INSERT INTO `class_lecturers` (`id`, `user_id`, `school_id`, `class_id`, `disabled`, `date`) VALUES
(1, 'HnjZzuiCVqvOXISgVCLywwf7GWH2jn1lEbVwqZWy7ByeBDbox3xnkvw7YYa', '3XqhudGuP5obX6aJRY2ZrNrT4y0DuZ5brOutmFwfe1aAR4iBgBqrd41DuS9M', 'XkBeQRVtkOohdKrUMq9LHokMATGZgXOXIeFkVovnmazBMOR5TcKZdv4r3Sz', 0, '2025-03-03 13:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

CREATE TABLE `class_students` (
  `id` int(11) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_students`
--

INSERT INTO `class_students` (`id`, `school_id`, `user_id`, `class_id`, `disabled`, `date`) VALUES
(1, '3XqhudGuP5obX6aJRY2ZrNrT4y0DuZ5brOutmFwfe1aAR4iBgBqrd41DuS9M', 'jafTxIY53kukDvqdtf9IkGMKrFdo6tJhezgK4VG1s3SoYLyDxjEcLcQ1Y8', 'XkBeQRVtkOohdKrUMq9LHokMATGZgXOXIeFkVovnmazBMOR5TcKZdv4r3Sz', 0, '2025-03-03 13:17:17'),
(2, '3XqhudGuP5obX6aJRY2ZrNrT4y0DuZ5brOutmFwfe1aAR4iBgBqrd41DuS9M', 'a98rz6sBQXrh1McARu2UcqxhF61Et00JyIedIW1D9Sg9Aryh6okIaNSYozq', 'XkBeQRVtkOohdKrUMq9LHokMATGZgXOXIeFkVovnmazBMOR5TcKZdv4r3Sz', 1, '2025-03-03 13:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `class_tests`
--

CREATE TABLE `class_tests` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `test` varchar(100) NOT NULL,
  `test_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `school` varchar(30) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school`, `school_id`, `user_id`, `date`) VALUES
(2, 'Denzal', '3XqhudGuP5obX6aJRY2ZrNrT4y0DuZ5brOutmFwfe1aAR4iBgBqrd41DuS9M', 'eGWJaL9e42i8zw0eb2zz0ZyKZCL7lA4Y0wy3n5VbNk5fPdGKjl1tfshxLRe', '2025-02-18 19:28:52'),
(3, 'Bernard', 'SkssWWCsvPRyQQxE2nrwuY4GUdnyraJ4aWEilQKOCosgI1yLRMgeWv3Baz', 'eGWJaL9e42i8zw0eb2zz0ZyKZCL7lA4Y0wy3n5VbNk5fPdGKjl1tfshxLRe', '2025-02-22 18:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `rank` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `school_id`, `rank`, `password`, `image`) VALUES
(1, 'Zia', 'Guthrie', 'dafifokyq@mailinator.com', '2025-02-17', 'eGWJaL9e42i8zw0eb2zz0ZyKZCL7lA4Y0wy3n5VbNk5fPdGKjl1tfshxLRe', 'male', '3XqhudGuP5obX6aJRY2ZrNrT4y0DuZ5brOutmFwfe1aAR4iBgBqrd41DuS9M', 'super_admin', '$2y$10$LT87Rf.fsKMjmRAQRFrGD.OUlALJYu8jqgadShgPdE7C0TSXUlbyC', ''),
(2, 'Joelle', 'Terrell', 'fodyhowot@mailinator.com', '2025-02-19', '8i3u7wHlLWgnOSZgmQ8wSaZF1Zh3TDtWxBf3EefcDwrydgCCBdgyx2PAAoz', 'female', '3XqhudGuP5obX6aJRY2ZrNrT4y0DuZ5brOutmFwfe1aAR4iBgB...', 'lecturer', '$2y$10$E1OcQLUpbBZsi5OU80IEIuSxd959yJ0Sj8WubgVGe29rgOLsdedR.', ''),
(3, 'Briar', 'Acevedo', 'ripudehic@mailinator.com', '2025-02-22', 'HnjZzuiCVqvOXISgVCLywwf7GWH2jn1lEbVwqZWy7ByeBDbox3xnkvw7YYa', 'female', '3XqhudGuP5obX6aJRY2ZrNrT4y0DuZ5brOutmFwfe1aAR4iBgBqrd41DuS9M', 'reception', '$2y$10$XBnInwYLT30HL8gfyocm.uIA09oZL.bG1iBYRqXFvNxxEPRk3pMV6', ''),
(4, 'Allen', 'Watts', 'xofihyr@mailinator.com', '2025-02-23', 'jafTxIY53kukDvqdtf9IkGMKrFdo6tJhezgK4VG1s3SoYLyDxjEcLcQ1Y8', 'female', '3XqhudGuP5obX6aJRY2ZrNrT4y0DuZ5brOutmFwfe1aAR4iBgBqrd41DuS9M', 'student', '$2y$10$sej1dno1peVBgnuCTjuNmOUJnG9EYFmyrb84ON/p4kV3LtSp7q7VC', ''),
(5, 'Felix', 'Hogan', 'qywuj@mailinator.com', '2025-02-23', 'a98rz6sBQXrh1McARu2UcqxhF61Et00JyIedIW1D9Sg9Aryh6okIaNSYozq', 'male', '3XqhudGuP5obX6aJRY2ZrNrT4y0DuZ5brOutmFwfe1aAR4iBgBqrd41DuS9M', 'student', '$2y$10$S5Heguv3PZE4ZhGgx9m8P.kEn45v/A36GDdLvLSsC5Rhd9uG1o3PG', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class` (`class`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `class_lecturers`
--
ALTER TABLE `class_lecturers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `class_students`
--
ALTER TABLE `class_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `date` (`date`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `class_tests`
--
ALTER TABLE `class_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `test` (`test`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school` (`school`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `data` (`date`),
  ADD KEY `user_url` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `gender` (`gender`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `date` (`date`),
  ADD KEY `rank` (`rank`),
  ADD KEY `password` (`password`),
  ADD KEY `email` (`email`),
  ADD KEY `image` (`image`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_lecturers`
--
ALTER TABLE `class_lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_students`
--
ALTER TABLE `class_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_tests`
--
ALTER TABLE `class_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
