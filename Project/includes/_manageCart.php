<?php
include '_dbconnect.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId'];
    if(isset($_POST['join'])) {
        $eventId = $_POST["eventId"];
        
        // Check whether this item exists
        $existSql = "SELECT * FROM `attendent` WHERE eventId = '$eventId' AND `userId`='$userId'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            echo "<script>alert('Event Already Added.');
                    window.history.back(1);
                    </script>";
        }
        else{
            $sql = "INSERT INTO `attendent` (`eventId`, `userId`, `attendentDate`) VALUES ('$eventId', '$userId', current_timestamp())";   
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>
                    window.history.back(1);
                    </script>";
            }
        }
    }
    if(isset($_POST['removeEvent'])) {
        $eventId = $_POST["eventId"];
        $sql = "DELETE FROM `attendent` WHERE `eventId`='$eventId' AND `userId`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed');
                window.history.back(1);
            </script>";
    }
    
    

    
}
?>