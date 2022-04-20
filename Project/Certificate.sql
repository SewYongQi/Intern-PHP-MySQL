SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `event` (
  `eventId` int(12) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `Desc` text NOT NULL, 
  `venue` varchar(5000) NOT NULL,
  `eventDate` text NOT NULL,
  `eventTime` text NOT NULL,
  `eventPubDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `event` (`eventId`, `eventName`, `Desc`, `venue`, `eventDate`, `eventTime`, `eventPubDate`) VALUES
(201, 'Badminton Tournament', 'Category:  Singles players will be charged RM50; doubles will be RM100 <br><br>Prize:  The winner will get a prize of RM500 and the consolation prize is RM20 <br><br>Time & Date:  On April 21st, 7pm', 'New Era University College', '21 April 2022', '7pm', '2022-04-20 10:03:26'),
(202, 'Cyber Security Data Protection', 'Purpose:  Learn about how to protect our computer data <br><br>Entry Fee:  Free <br><br>Time & Date:  On April 21st, 3pm', 'New Era University College', '21 April 2022', '3pm', '2022-04-20 10:20:58'),
(203, 'Student Council Elections', 'Purpose:  Learn about how to protect our computer data <br><br>Prize:  Each voter will receive a gift <br><br>Time & Date:  On March 22st, 9am - 5pm', 'Lincoln Hall, Granite Hills School Bella Glade, Florida', '22 March 2022', '9am - 5pm', '2022-04-20 10:22:07'),
(204, 'Graphic Designer', 'Prize:  The winner will get a whole set of advanced painting exquisite set <br><br>Time & Date:  On April 21st, 10am - 2pm', 'New Era University College', '21 April 2022', '10am - 2pm', '2022-04-20 10:23:05'),
(205, 'Basketball Madness', 'Entry Fee:  RM5 per person, free parking and get one free popcorn <br><br>Time & Date:  On August 24th, 8pm – 12am', 'Lot 5, Seksyen 10, 43000 Kajang, Selangor', '24 August 2022', '8pm - 12am', '2022-04-20 10:23:48');

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `userid` text NOT NULL,
  `ic` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `address` text NOT NULL,
  `phone` bigint(20) NOT NULL,
  `userType` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=user\r\n1=admin',
  `password` varchar(255) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `username`, `userid`, `ic`, `email`, `address`, `phone`, `userType`, `password`, `joinDate`) VALUES
(1, 'admin', 'NULL', 'NULL', 'admin@gmail.com', 'Blok B&C, Lot 5, Seksyen 10, <br>Jalan Bukit, 43000 Kajang, <br>Selangor.', 'NULL', '1', '$2y$10$AAfxRFOYbl7FdN17rN3fgeiPu/xQrx6MnvRGzqjVHlGqHAM4d9T1i', '2022-04-11 11:40:58'),
(2, 'johndoe', 102, '000000-00-0000', 'johndoe@gmail.com', 'NULL', 121234567, '0', '$2y$10$IfC80lf9EoS3BWpt18XumuEQRCFXmC3mnGBfIWWGtokeszi8CrA26', '2022-04-11 11:40:58'),
(3, 'maydoe', 103, '000000-00-0000', 'maydoe@gmail.com', 'NULL', 121234567, '0', '$2y$10$Hp30oVyLAF1xWxnPsCfFk.NJu7T8WBMfx3aW7ZgNoS4zEvKdcXRBW', '2022-04-11 11:41:53');

CREATE TABLE `attendent` (
  `attendentId` int(12) NOT NULL,
  `eventId` int(12) NOT NULL,
  `userId` int(12) NOT NULL,
  `attendentDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `certificate` (
  `certificateId` int(12) NOT NULL,
  `eventId` int(12) NOT NULL,
  `certificateName` varchar(255) NOT NULL,
  `paragraph` varchar(5000) NOT NULL,
  `CertificateDetail` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `signature` (
  `signatureId` int(12) NOT NULL,
  `userId` int(12) NOT NULL,
  `signature` binary(1) NOT NULL,
  `signatureImage` BLOB(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `event`
  ADD PRIMARY KEY (`eventId`);
ALTER TABLE `event` ADD FULLTEXT KEY `eventName` (`eventName`,`Desc`,`eventDate`,`eventTime`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `attendent`
  ADD PRIMARY KEY (`attendentId`);

ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificateId`);

ALTER TABLE `signature`
  ADD PRIMARY KEY (`signatureId`);


ALTER TABLE `event`
  MODIFY `eventId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `attendent`
  MODIFY `attendentId` int(12) NOT NULL AUTO_INCREMENT;

ALTER TABLE `certificate`
  MODIFY `certificateId` int(12) NOT NULL AUTO_INCREMENT;

ALTER TABLE `signature`
  MODIFY `signatureId` int(12) NOT NULL AUTO_INCREMENT;
COMMIT;

