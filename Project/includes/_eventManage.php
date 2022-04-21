<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createEvent'])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $venue = $_POST["venue"];
        $date = $_POST["date"];
        $time = $_POST["time"];

        $sql = "INSERT INTO `event` (`eventName`, `Desc`, `venue`, `eventDate`, `eventTime`, `eventPubDate`) VALUES ('$name', '$description', '$venue', '$date', '$time', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $eventId = $conn->insert_id;
        if ($result){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newName = 'events-'.$eventId;
                $newfilename=$newName .".jpg";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/Project/img/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('success');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('failed');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Please select an image file to upload.");
                        window.location=document.referrer;
                    </script>';
            }
        }
        else {
            echo "<script>alert('failed');
                    window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['removeEvent'])) {
        $eventId = $_POST["eventId"];
        $sql = "DELETE FROM `event` WHERE `eventId`='$eventId'";   
        $result = mysqli_query($conn, $sql);
        $filename = $_SERVER['DOCUMENT_ROOT']."/Project/img/events-".$eventId.".jpg";
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Removed');
                window.location=document.referrer;
            </script>";
        }
        else {
            echo "<script>alert('failed');
            window.location=document.referrer;
            </script>";
        }
    }
    if(isset($_POST['updateEvent'])) {
        $eventId = $_POST["eventId"];
        $eventName = $_POST["name"];
        $Desc = $_POST["Desc"];
        $venue = $_POST["venue"];
        $eventDate = $_POST["date"];
        $eventTime = $_POST["time"];

        $sql = "UPDATE `event` SET `eventName`='$eventName',  `Desc`='$Desc', `venue`='$venue', `eventDate`='$eventDate', `eventTime`='$eventTime' WHERE `eventId`='$eventId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('update');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateEventPhoto'])) {
        $eventId = $_POST["eventId"];
        $check = getimagesize($_FILES["eventimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'events-'.$eventId;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/Project/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['eventimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('success');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('failed');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Please select an image file to upload.");
            window.location=document.referrer;
                </script>';
        }
    }
}
?>