-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2021 at 02:20 PM
-- Server version: 5.7.29-log
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myantal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`, `role_id`) VALUES
(1, 'myantal', '123a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `logo`, `company_name`, `email`, `phone_no`, `password`, `company_type`, `company_website`, `role_id`) VALUES
(1, 'mz.jpg', 'Magenta Consulting Services', 'magenta@gmail.com', '09785362541', 'asdfdfdfe', 'service', 'magenta.com', 3),
(2, 'MCB.jpg', 'Myanmar Citizens Bank (MCB)', 'mcb@gmail.com', '09345123456', 'adsfeasdf', 'Bank', 'mcb.com', 3),
(3, 'D.jpg', 'BYMA Myanmar Limited ', 'byma@gmail.com', '09785362541', 'asdfdfersf', 'mm', 'BYMA.com', 3),
(4, 'kbz.jpg', 'KBZ LIFE ', 'kbz@gmail.com', '09785362541', 'asdfeasdf', 'Bank', 'kbz.com', 3),
(5, 'AGD.jpg', 'AGD Bank', 'agd@gmail.com', '09785362541', 'adsfdfeas', 'Bank', 'agd.com', 3),
(6, 'kbzms.jpg', 'KBZ MS', 'kbz@gmail.com', '09345123456', 'adsfefdasd', 'Bank', 'kbz.com', 3),
(7, 'gi.jpg', 'Gi Gi', 'gg@gmail.com', '09785362541', 'asdfededrf', 'IT', 'gg.com', 3),
(8, 'f.jpg', 'mmm', 'mm@gmail.com', '09785362541', '12345678', 'food', 'mm.com', 3),
(9, 'g.jpg', 'Asia', 'asia@gmail.com', '09785362541', 'qwertyui', 'food', 'asia.com', 3),
(10, 'c.jpg', 'asdf', 'as@gmail.com', '09345123456', '25d55ad283aa400af464c76d713c07ad', 'food', 'safd.com', 3),
(11, 'home.jpg', 'mm', 'mmm@gmail.com', '09345123456', '25d55ad283aa400af464c76d713c07ad', 'service', 'mmm.com', 3),
(12, 'cc.jpg', 'aa', 'aa@gmail.com', '09345123456', '25d55ad283aa400af464c76d713c07ad', 'ff', 'aa.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `requirement` text COLLATE utf8_unicode_ci,
  `benefit` text COLLATE utf8_unicode_ci,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jobfile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `jt_id` int(11) DEFAULT NULL,
  `jc_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_name`, `text`, `requirement`, `benefit`, `gender`, `salary`, `region`, `location`, `jobfile`, `post_date`, `jt_id`, `jc_id`, `company_id`) VALUES
(1, 'Financial Officer', '<ul><li>Perform risk management by analyzing the organizationâ€™s liabilities and investments</li><li>Manage\r\n and improve the manufacturing costing structures and cost controls for \r\nmore efficient and accurate representation of manufacturing business \r\nfinancial standings.</li><li>Plan and execute for proper and efficient \r\nTaxation Structure for the Group and perform timely tax filings for each\r\n of the operating Companies to comply with the local regulations and \r\nstandards.</li><li>Oversees all aspects of financial planning and \r\nreporting including the financial control, accounting, treasury, and tax\r\n to ensure compliance with the International Financial Reporting \r\nStandards (IFRS) as well as the local financial reporting requirements \r\nand the regulatory compliance of the Group of Companies.</li></ul>', '<ul><li>CPA is a strong advantage.</li><li>Familiar &amp;&nbsp;strong knowledge in SAP is advantage.</li><li>MBA or masterâ€™s degree in accounting &amp; Finance discipline or equivalent.</li><li>Must have thorough understanding of GAAP principles and IFRS working knowledge.</li></ul>', '<ul><li><span>Annual bonus &amp; Attractive Salary</span></li></ul>', 'Male/Female 3posts', '400000ks', 'yangon', 'ygn', '3-CSS.pdf', '2020-12-15', 1, 1, 1),
(2, 'Collections Officer', '<ul><li>Responsible for the management and execution of collection calls on \r\nthe allocated cases based on delinquency stage, product and risk profile\r\n of the customer for all products to ensure that the desired collections\r\n targets are met.</li><li>Responsible for making calls as per the \r\ncollections manual, maintain collection call records and responses by \r\nthe delinquent customers and report on the status of the calls to the \r\ndebt collections team leaders.</li><li>Conducts proper follow up along \r\nwith the Manager Collections on refuse to pay customers and all cases \r\nthat require experienced handling.</li><li>Responsible for the accuracy of data input in collections system and relevant applications on the collection calls conducted.</li></ul>', '<ul><li>Excellent written, verbal, active listening and communication skills, interpersonal skills</li><li>Excellent negotiation skills</li><li>Excellent knowledge of finance products in the local market</li><li>Excellent knowledge of compliance and regulations</li><li>Ability to work under pressure, to motivate big teams and achieve targets</li><li>Thorough understanding of banking environment</li><li>Strong analytical, problem solving and critical thinking skills</li><li>Good knowledge of compliance and regulations</li></ul>', '<ul><li><span>Bonus</span></li><li><span> Ferry</span></li><li><span> Other Benefit\r\n                                            \r\n                                        </span></li></ul>', 'Male/Female 2posts', '400000ks', 'ygn', 'yangon', '7-Grid.pdf', '2020-12-15', 1, 1, 2),
(3, 'Assistant Human Resources', '<ul><li>Provide support in the full spectrum of HR function to the Company</li><li>Maintain and update staffâ€™s personnel files and personal database</li><li>Assist in staff leave and attendance record management</li><li>Assist in recruitment and selection workers</li><li>Support in all other office administration&nbsp; <br></li></ul>', '<p>â€¢&nbsp;&nbsp;&nbsp; Degree in Human Resource Management or equivalent<br>â€¢&nbsp;&nbsp;&nbsp;&nbsp;At least one (1) year of HR/Admin experience<br>â€¢&nbsp;&nbsp;&nbsp;&nbsp;Effective communication skills and good interpersonal skills<br>â€¢&nbsp;&nbsp;&nbsp;&nbsp;Proficient in English language (both oral and written)</p>', '<p>bouns<br></p>', 'Male/Female 3posts', '350000Ks', 'mdy', 'mdy', NULL, '2020-12-15', 1, 4, 3),
(4, 'HR Executive ', '<ul><li>Drive and direct all recruitment efforts and process</li><li>Able to perform local and the whole Myanmar recruiting for any level of position</li><li>Create and suggest new and effective interviewing procedures and techniques</li><li>Preparing in arranging &amp; coordinating for Recruitment &amp; Selection Process</li><li>Process and track applicant job submissions.</li></ul><p><br></p>', '<ul><li>Any Graduate (Preferable with Diploma in HR Management)</li><li>At least 2&nbsp; years experiences in HR Function especially in Recruitment Process</li><li>Good communication skills and can speak English fluently</li></ul>', '<p>allow<br></p>', 'Male/Female ', '350000Ks', 'ygn', 'yangon', NULL, '2020-12-15', 1, 4, 4),
(5, 'React JS Front End Developer', '<ul><li>Implement UI and Integration of Rest API&nbsp;</li><li>Postman Usage</li><li>Security Implementation</li><li>Git/Bit Bucket Repo Management</li></ul>', '<ul><li>B.E (IT)/B.C.Sc/B.C.Tech or other related education</li><li>Minimum 2 yearsâ€™ experience in related job role</li><li>Strong experience in&nbsp;Reat JS, HTML,&nbsp;Visual Studio Code, Javascript ES6,&nbsp;CSS,&nbsp;react-hook and&nbsp;JSX</li></ul>', '<ul><li><span>Performance Bonus\r\n                                            \r\n                                        </span></li></ul>', 'Male/Female 3posts', '350000Ks', 'ygn', 'yangon', NULL, '2020-12-15', 1, 5, 5),
(6, 'Business Data Analyst (Data Mining)', '<ul><li>Work on KBZ MS data lake in order to interpret data, analyze results using statistical techniques and provide ongoing reports.</li><li>Develop and implement databases, data collection systems, and data analytics</li><li>Acquire data from primary or secondary data sources and maintain databases/data systems</li></ul>', '<ul><li>Strong understanding of data mining models, structures, theories, principles, and practices.</li><li>Strong familiarity with data preparation, processing, classification, and forecasting.</li><li> Understanding and production experience in Relational/Non-Relational Databases (MySQL/ mongodb)</li><li>Direct experience with data management techniques.</li><li>Hands-on database tuning and troubleshooting experience.</li></ul>', '<ul><li><span>Transportation Allowance</span></li><li><span>Overtime Allowance\r\n                                            \r\n                                        </span></li></ul>', 'Male/Female 3posts', '400000ks', 'ygn', 'yangon', NULL, '2020-12-15', 1, 5, 6),
(8, 'sdf', '<p>asdf<br></p>', '<p>asdf<br></p>', '<p>sadfasd<br></p>', 'asd', 'asdf', 'asdf', 'adf', NULL, '2020-12-31', 1, 2, 11),
(9, 'asdf', '<p>adsf<br></p>', '<p>asdfads<br></p>', '<p>asdfasdf<br></p>', 'dfasd', 'adsfa', 'asdfasd', 'adsfas', NULL, '2021-01-01', 1, 5, 5),
(10, 'web developer', '<p>sadf<br></p>', '<p>adsfdas<br></p>', '<p>asdfdsa<br></p>', 'asdf', 'asdfa', 'adsfa', 'adsf', NULL, '2021-01-02', 1, 5, 11),
(11, 'HR staff1', '<p>zcf<br></p>', '<p>asdf<br></p>', '<p>dasf<br></p>', 'sadf', 'sad', 'sd', 'asdf', NULL, '2021-01-04', 1, 4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `jobcategory`
--

CREATE TABLE `jobcategory` (
  `jc_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jc_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobcategory`
--

INSERT INTO `jobcategory` (`jc_id`, `photo`, `jc_name`) VALUES
(1, 'a.png', 'Accounting & Finance'),
(2, 'ma.png', 'Sale & Marketing'),
(3, 'PR.png', 'PR & Communication'),
(4, 'HR.png', 'HR'),
(5, 'IT.png', 'IT'),
(6, 'me.png', 'Media & Creative'),
(7, 'e.png', 'Education'),
(8, 'en.png', 'Engineering'),
(9, 'med.png', 'Medical staff'),
(10, 'Tourism.png', 'Tourism');

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE `jobtype` (
  `jt_id` int(11) NOT NULL,
  `jt_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobtype`
--

INSERT INTO `jobtype` (`jt_id`, `jt_name`, `Duration`) VALUES
(1, 'full-time', '-'),
(2, 'Freelance', '-'),
(3, 'Internship', '-');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Company');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `t_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`t_id`, `name`, `photo`, `link`) VALUES
(2, 'Website for self-development', 'va.jpg', 'https://www.facebook.com/myantal.com.mm/posts/839798203422103'),
(3, 'Boost creativity 15 minutes day', 'ba.jpg', 'https://www.facebook.com/myantal.com.mm/posts/828409657894291'),
(5, 'Procrastination âœ¨â°', 't.jpg', 'https://www.facebook.com/myantal.com.mm/posts/835593257175931'),
(6, 'Focus On Your Career', 'f.jpg', 'https://www.facebook.com/myantal.com.mm/posts/843140689754521'),
(7, 'Befits of being  punctual person', 'b.jpg', 'https://www.facebook.com/myantal.com.mm/posts/843812993020624');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CV` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `phone_no`, `password`, `CV`, `role_id`) VALUES
(1, 'su', 'su@gmail.com', '09234567', '363eb224f6ff8d3c5163a8805222acbf939a65b3', '4-CSS_ADVANCED.pdf', 2),
(2, 'aye aye', 'aye@gmail.com', '0912345', '329053c86586dfab3facb0478d574a5c888d3ad7', '7-Grid.pdf', 2),
(3, 'moe sat', 'moe@gmail.com', '09785362541', 'eb815b80d2512e69c3c0389c51229ab43d9418f8', '7-Grid.pdf', 2),
(4, 'kyaw kyaw', 'kyaw@gmail.com', '09234567812', '11a9e81eaa229b8379404b9c7d4a1eb08564c692', '4-CSS_ADVANCED.pdf', 2),
(5, 'aung thun', 'thun@gmail.com', '098765444', 'dc9b92b2cd4e127cf440ca12b9beb68ff5255052', '2-HTML.pdf', 2),
(6, 'aye aye', 'aye@gmail.com', '09345123456', '11a9e81eaa229b8379404b9c7d4a1eb08564c692', '4-CSS_ADVANCED.pdf', 2),
(7, 'ki ki', 'kiki@gmail.com', '09345123456', '1234', '3-CSS.pdf', 2),
(8, 'wai', 'wai@gmail.com', '09785362541', '1234', '7-Grid.pdf', 2),
(9, 'thu thu', 'thu@gmail.com', '09345123454', 'asdf', '2-HTML.pdf', 2),
(10, NULL, NULL, NULL, NULL, 'new', NULL),
(11, 'kkk', 'kk2@gmail.com', '09785362541', '1234', NULL, 2),
(12, 'mm', 'ma@gmail.com', '09785362541', '12345678', NULL, 2),
(13, 'hh', 'hh12@gmail.com', '09345123456', '912ec803b2ce49e4a541068d495ab570', NULL, 2),
(14, 'nn', 'nn12@gmail.com', '09345123454', '25d55ad283aa400af464c76d713c07ad', '5-Responsive_Web_Design.pdf', 2),
(15, 'apple', 'apple@gmail.com', '09123456721', '81dc9bdb52d04dc20036dbd8313ed055', '7-Grid.pdf', 2),
(16, 'orange', 'orange@gmail.com', '09434567891', '81dc9bdb52d04dc20036dbd8313ed055', '2-HTML.pdf', 2),
(17, 'ho ko', 'hok@gmail.com', '09345123456', '202cb962ac59075b964b07152d234b70', '3-CSS.pdf', 2),
(18, 'wai gyi', 'waigyi@gmail.com', '09345123456', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 2),
(19, 'test1', 'test1@gmail.com', '09876544412', '202cb962ac59075b964b07152d234b70', '3-CSS.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `userjob`
--

CREATE TABLE `userjob` (
  `uj_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userjob`
--

INSERT INTO `userjob` (`uj_id`, `user_id`, `job_id`) VALUES
(1, 7, 4),
(2, 6, 6),
(3, 2, 4),
(12, 9, 8),
(13, 15, 4),
(14, 15, 2),
(15, 15, 2),
(16, 14, 3),
(17, 15, 1),
(18, 14, 1),
(19, 16, 8),
(28, 14, 2),
(30, 14, 2),
(31, 14, 2),
(32, 14, 2),
(33, 14, 2),
(35, 14, 8),
(36, 17, 9),
(37, 17, 8),
(40, 14, 10),
(41, 19, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `jt_id` (`jt_id`),
  ADD KEY `jc_id` (`jc_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `jobcategory`
--
ALTER TABLE `jobcategory`
  ADD PRIMARY KEY (`jc_id`);

--
-- Indexes for table `jobtype`
--
ALTER TABLE `jobtype`
  ADD PRIMARY KEY (`jt_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `userjob`
--
ALTER TABLE `userjob`
  ADD PRIMARY KEY (`uj_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobcategory`
--
ALTER TABLE `jobcategory`
  MODIFY `jc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobtype`
--
ALTER TABLE `jobtype`
  MODIFY `jt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `userjob`
--
ALTER TABLE `userjob`
  MODIFY `uj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`jt_id`) REFERENCES `jobtype` (`jt_id`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`jc_id`) REFERENCES `jobcategory` (`jc_id`),
  ADD CONSTRAINT `job_ibfk_3` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `userjob`
--
ALTER TABLE `userjob`
  ADD CONSTRAINT `userjob_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `userjob_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
