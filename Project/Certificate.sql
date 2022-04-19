CREATE TABLE `Students` (
    
    `StudentId` int(12) NOT NULL,
    `StudentName` varchar(255) NOT NULL,
    `StudentPwd` varchar(100) NOT NULL,
    `StudentEmail` varchar(500) NOT NULL,
    `StudentIC` varchar(20) NOT NULL,
    `SignatureId` int(12) NOT NULL
);

CREATE Table `Admins` (
    
    `AdminId` int(12) NOT NULL,
    `AdminName` varchar(255) NOT NULL,
    `AdminPwd` varchar(500) NOT NULL,
    `SignatureId` int(12) NOT NULL
);

CREATE Table `Events` (
    
    `EventId` int(12) NOT NULL,
    `EventName` varchar(255) NOT NULL,
    `EventDatetime` datetime NOT NULL DEFAULT current_timestamp(),
    `venue` varchar(5000) NOT NULL,
    `EventDetail` varchar(5000) NOT NULL
);

CREATE TABLE `Attendents`(
    
    `AttendentId` int(12) NOT NULL,
    `EventId` int(12) NOT NULL,
    `EventName` varchar(255) NOT NULL
);

CREATE Table `Certificates` (
    
    `CertificateId` int(12) NOT NULL,
    `CertificateName` varchar(255) NOT NULL,
    `EventId` int(12) NOT NULL,
    `paragraph` varchar(5000) NOT NULL,
    `CertificateDetail` varchar(5000) NOT NULL
);

Create Table `Signatures` (

    `SignatureId` int(12) NOT NULL,
    `StudentId` int(12) NOT NULL,
    `Signature` binary(1) NOT NULL,
    `Signatureimage` BLOB(16) NOT NULL
);

INSERT INTO `Students` (`StudentId`, `StudentName`, `StudentPwd`, `StudentEmail`, `StudentIC`, `SignatureId`) VALUES
(1, 'Student', 'Student1',  'Student@gmail.com','000000-00-0000', 01);

INSERT INTO `Admins` (`AdminId`, `AdminName`, `AdminPwd`, `SignatureId`) VALUES
(101, 'Admin', 'Admin', 02);

INSERT INTO `Events` (`EventId`, `EventName`, `EventDatetime`, `venue`, `EventDetail`) VALUES
(201, 'BASKET BALL MADNESS', '2022-08-24 8:00:00', 'Lot 5, Seksyen 10, 43000 Kajang, Selangor', 'MAN VS MAN'),
(202, 'SMASH IT UP! BADMINTON TOURNAMENT', '2022-04-21 7:00:00', 'New Era University College', 'Category: Single [$150] Double [$200] Award: -RM500 -Winner & Runner Trophy Medal'),
(203, 'CYBER SECURITY', '2022-09-30 13:00:00', 'New Era University College', 'After participating you will get a "SMALL GIFT"!!'),
(204, 'STUDENT COUNCIL ELECTIONS', '2022-03-22 09:00:00', 'Lincoln Hall, Granite Hills School Bella Glade, Florida', 'Make Your Voice Heard. Use Your Vote.'),
(205, 'GRAPHIC DESIGNER', '2022-07-05', 'New Era University College', 'Services: Logo Design, Brochure Design, Website Design, App Design.');

INSERT INTO `Attendents` (`AttendentId`, `EventId`, `EventName`) VALUES
(301, 201, 'BASKET BALL MADNESS');

INSERT INTO `Certificates` (`CertificateId`, `CertificateName`, `EventId`, `paragraph`, `CertificateDetail`) VALUES
(501, 'xxxxx', 201, 'xxxxxxxxxx', 'xxxxxxxxxxxxx');