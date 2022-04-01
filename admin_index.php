<?php 
    session_start();
    if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==true){
        $adminloggedin= true;
        $userId = $_SESSION['adminuserId'];
    }
    else{
        $adminloggedin = false;
        $userId = 0;
    }

    if($adminloggedin) {
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>Student Profile</title>
  </head>
  <body>

  <?php
   
        require 'includes/_dbconnect.php';
        require 'includes/admin_nav.php';
        
        if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100%">
                    <strong>Success!</strong> You are logged in
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                  </div>';
        }
    ?>

<div class="w">
<div class="main_content">
        <div class="header"></div>  
        <div class="info">
        <form class="col-10">
              <div class="form-group">
                  <b><label for="SN">Name: </label></b>
                  <input class="form-control" id="SN" name="SN" placeholder="Enter Your Name" type="text" required minlength="3" maxlength="11">
              </div>
              <div class="form-row">
                
                <div class="form-group">
                  <b><label for="IC">IC Number: </label></b>
                  <input type="tel" class="form-control" id="IC" name="IC" placeholder="ENter Your IC Number" required>
                </div>
              </div>
              <div class="form-group">
                  <b><label for="email">Email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
              </div>
              
              <div class="form-group">
                <b><label for="phone">Phone No:</label></b>
                
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[1-9]{2}[0-9]{7}" maxlength="20">
                
              </div>
              <div class="form-group">
                  <b><label for="address">Address:</label></b>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Your Address" required>
              </div>
              
              <button type="" class="btn btn-success">EDIT</button>
            </form>
      </div>
    </div>
</div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>

<?php
    }
    else{
        header("location: /Project/login.php");
    }
?>