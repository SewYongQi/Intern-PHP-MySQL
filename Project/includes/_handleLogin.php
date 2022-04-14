<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST["loginemail"];
    $password = $_POST["loginpassword"]; 
    
    $sql = "Select * from users where email='$email'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userId = $row['id'];
        if (password_verify($password, $row['password'])){ 
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['userId'] = $userId;
            header("location: /Project/index.php?loginsuccess=true");
            exit();
        } 
        else{
            header("location: /Project/student_Login.php?loginsuccess=false");
        }
    } 
    else{
        header("location: /Project/student_Login.php?loginsuccess=false");
    }
}    
?>