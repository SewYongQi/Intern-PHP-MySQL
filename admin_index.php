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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <title>Profile</title>
    
    <style>
    table, td {
      border-collapse: collapse;
    }
    td {
      padding-top: 5px;
      padding-bottom: 20px;
      padding-left: 10px;
      padding-right: 20px;
    }
    </style>

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
        

        <div class="container">
        <?php 
            $sql = "SELECT * FROM users WHERE id='$userId'"; 
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $username = $row['username'];
            $userid = $row['userid'];
            $ic = $row['ic'];
            $email = $row['email'];
            $address = $row['address'];
            $phone = $row['phone'];
           
        ?>
        <div class="row">
                    
                    <div class="col-10"> 
                    <button class="btn btn-warning float-right" data-toggle="modal" data-target="#editUser"> Edit User</button>
                    <table><br><br>
                        <tr>
                            <td><h5 class="text-dark fw-bold">Name : </h5></td>
                            <td><h5> <?php echo $username ?></h5></td>
                        </tr>
                        <tr>
                            <td><h5 class="text-dark fw-bold">Admin ID : </h5></td>
                            <td><h5> <?php echo $userid ?></h5></td>
                        </tr>
                        <tr>
                            <td><h5 class="text-dark fw-bold">IC Number : </h5></td>
                            <td><h5> <?php echo $ic ?></h5></td>
                        </tr>
                        <tr>
                            <td><h5 class="text-dark fw-bold">Email : </h5></td>
                            <td><h5> <?php echo $email ?></h5></td>
                        </tr>
                        <tr>
                            <td><h5 class="text-dark fw-bold">Address : </h5></td>
                            <td><h5> <?php echo $address ?></h5></td>
                        </tr>
                        <tr>
                            <td><h5 class="text-dark fw-bold">Phone No. : </h5></td>
                            <td><h5>+60  <?php echo $phone ?></h5></td>
                        </tr>
                        
                    </table></div>
                    
               
            </div>
            
           
    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-dark">
        <h5 class="modal-title text-center" id="editUser">Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
                    <form action="includes/_manageProfile.php" method="post" class="text-dark">
                    
                        <div class="form-group">
                            <b><label for="username">Name:</label></b>
                            <input class="form-control" id="username" name="username" type="text" value="<?php echo $username ?>">
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <b><label for="userid">Admin ID:</label></b>
                            <input type="text" class="form-control" id="userid" name="userid" placeholder="Enter Your ID" required value="<?php echo $userid ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <b><label for="ic">IC Number:</label></b>
                            <input type="text" class="form-control" id="ic" name="ic" placeholder="Enter Your IC" required value="<?php echo $ic ?>">
                        </div>
                        </div>
                        <div class="form-group">
                            <b><label for="email">Email:</label></b>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required value="<?php echo $email ?>">
                        </div>
                        <div class="form-group">
                            <b><label for="address">Address:</label></b>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Your Address" required value="<?php echo $address ?>">
                        </div>
                        
                        <div class="form-group">
                            <b><label for="phone">Phone No:</label></b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon">+60</span>
                                </div>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[1-9]{2}[0-9]{7}" maxlength="20" value="<?php echo $phone ?>">
                            </div>
                        </div>
                            
                        <button type="submit" name="updateProfileDetail" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
</div></div>


        
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
    
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

<?php
    }
    else{
        header("location: /Project/login.php");
    }
?>