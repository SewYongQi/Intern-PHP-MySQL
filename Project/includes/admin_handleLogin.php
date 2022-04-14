<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    
    $sql = "Select * from users where email='$email'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userType = $row['userType'];
        if($userType == 1) {
            $userId = $row['id'];
            if (password_verify($password, $row['password'])){ 
                session_start();
                $_SESSION['adminloggedin'] = true;
                $_SESSION['adminemail'] = $email;
                $_SESSION['adminuserId'] = $userId;
                header("location: /Project/admin_index.php?loginsuccess=true");
                exit();
            } 
            else{
                header("location: /Project/login.php?loginsuccess=false");
            }
        }
        else {
            header("location: /Project/login.php?loginsuccess=false");
        }
    } 
    else{
        header("location: /Project/login.php?loginsuccess=false");
    }
}    
?>