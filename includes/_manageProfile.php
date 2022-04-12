<?php
    include '_dbconnect.php';
    session_start();
    $userId = $_SESSION['userId'];
    

    if(isset($_POST["updateProfileDetail"])){
        $username = $_POST["username"];
        $userid = $_POST["userid"];
        $ic = $_POST["ic"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];

        $sql = "UPDATE `users` SET `username` = '$username', `userid` = '$userid', `ic` = '$ic', `email` = '$email', `address` = '$address', `phone` = '$phone' WHERE `id` ='$userId'";   
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<script>alert("Update successfully.");
                    window.history.back(1);
                </script>';
        }else{
            echo '<script>alert("Update failed, please try again.");
                    window.history.back(1);
                </script>';
        } 
        
        
    }
    
?>