CREATE TABLE `students` (
    
    `studentId` int(12) NOT NULL,
    `studentName` varchar(255) NOT NULL,
    `studentPwd` varchar(100) NOT NULL,
    `studentEmail` varchar(500) NOT NULL,
    `studentIC` varchar(20) NOT NULL,
    `signatureId` int(12) NOT NULL,
    primary key(signatureId)
    FOREIGN KEY (signatureId) REFERENCES signatures(signatureId)
);

SELECT `studentIC` FORMAT(123456121234,'######-##-####') FROM students;

CREATE Table `admins` (
    
    `adminId` int(12) NOT NULL,
    `adminName` varchar(255) NOT NULL,
    `adminPwd` varchar(500) NOT NULL,
    `signatureId` int(12) NOT NULL,
);

CREATE Table `events` (
    
    `eventId` int(12) NOT NULL,
    `eventName` varchar(255) NOT NULL,
    `eventDatetime` datetime NOT NULL DEFAULT current_timestamp(),
    `venue` varchar(5000) NOT NULL,
    `eventDetail` varchar(5000) NOT NULL,
    primary key(eventId)
);

CREATE Table `courses` (
    
    `courseId` int(12) NOT NULL,
    `courseName` varchar(255) NOT NULL,
    `courseDatetime` datetime NOT NULL DEFAULT current_timestamp(),
    `venue` varchar(5000) NOT NULL,
    `courseDetail` varchar(5000) NOT NULL,
);

CREATE Table `certificates` (
    
    `certificateId` int(12) NOT NULL,
    `certificateName` varchar(255) NOT NULL,
    `eventId` int(12) NOT NULL,
    `paragraph` varchar(5000) NOT NULL,
    `certificateDetail` varchar(5000) NOT NULL,
    FOREIGN KEY (eventId) REFERENCES events(eventId)
);

Create Table `signatures` (

    `signatureId` int(12) NOT NULL,
    `signature` binary(1) NOT NULL,
    `signatureimage` image(16) NOT NULL,
    primary key(signatureId)
);

INSERT INTO `students` (`studentId`, `studentName`, `studentPwd`, `studentEmail`, `studentIC`, `signatureId`) VALUES
(1, 'student', 'student1',  'admin@gmail.com','000000-00-0000', 01);

INSERT INTO `admins` (`adminId`, `adminName`, `adminPwd`, `signatureId`) VALUES
(1, 'admin', 'admin', 02);

INSERT INTO `events` (`eventId`, `eventName`, `eventDatetime`, 'venue', `eventDetail`) VALUES
(1, 'xxxxx', '2021-12-17 14:53:46', 'xxxxx', 'xxxxxxxxxxxxx');

INSERT INTO `courses` (`courseId`, `courseName`, `courseDatetime`, 'venue', `courseDetail`) VALUES
(1, 'xxxxx', '2021-12-18 12:03:26', 'xxxxx', 'xxxxxxxxxxxxx');

INSERT INTO `certificates` (`certificateId`, `certificateName`, `eventId`, 'paragraph', `certificateDetail`) VALUES
(1, 'xxxxx', 1, 'xxxxxxxxxx', 'xxxxxxxxxxxxx');