<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <title>User Manager</title>
</head>
<body class="bg-secondary">
    <?php include 'includes/_dbconnect.php';?>

    <?php include 'includes/_loggedin.php';?>
    
    
    <?php 
    if($loggedin){
    ?>

    
<div class="container-fluid" style="margin-top:80px">
	
	<div class="row">
        <div class="col-lg-12">
            <button class="btn btn-dark float-right" data-toggle="modal" data-target="#newUser"><i class="fa fa-plus"></i> New user</button>
        </div>
	</div>
	    <br>
	<div class="row">
		<div class="col-lg-12">
			
				<table class="table table-bordered table-hover mb-0 text-center">
                    <thead style="background-color: rgb(202 202 203);">
                        <tr>
                            <th style="width:1%;">User Id</th>
                            <th style="width:5%">Photo</th>
                            <th style="width:2%;">Username</th>
                            <th style="width:2%;">User ID</th>
                            <th style="width:10%;">IC NO.</th>
                            <th style="width:3%;">Email</th>
                            <th style="width:15%;">Address</th>
                            <th style="width:3%;">Phone No.</th>
                            <th style="width:3%;">Type</th>
                            <th style="width:10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                        <?php
                            $sql = "SELECT * FROM users"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $username = $row['username'];
                                $userid = $row['userid'];
                                $ic = $row['ic'];
                                $email = $row['email'];
                                $address = $row['address'];
                                $phone = $row['phone'];
                                $userType = $row['userType'];
                                if($userType == 0) 
                                    $userType = "User";
                                else
                                    $userType = "Admin";

                                echo '<tr>
                                    <td>' .$Id. '</td>
                                    <td><img src="/Project/img/person-' .$Id. '.jpg" alt="image for this user" onError="this.src =\'/OnlineFoodOrdering/images/profile.jpg\'" width="100px" height="100px"></td>
                                    <td>' .$username. '</td>
                                    <td>' .$userid. '</td>
                                    <td>' .$ic. '</td>
                                    <td>' .$email. '</td>
                                    <td>' .$address. '</td>
                                    <td>+60' .$phone. '</td>
                                    <td>' .$userType. '</td>
                                    <td class="text-center">
                                        <div class="mx-auto" >
                                            ';
                                            if($Id == 1) {
                                                echo '
                                                <button class="btn btn-sm btn-warning text-light" data-toggle="modal" data-target="#editUser' .$Id. '" type="button" style="margin-left:9px;">Edit</button>
                                                <button class="btn btn-sm btn-danger" disabled style="margin-left:9px;">Delete <i class="bx bx-trash"></i></button>';
                                            }
                                            else {
                                                echo '<form action="includes/_userManage.php" method="POST">
                                                        <button class="btn btn-sm btn-warning text-light" data-toggle="modal" data-target="#editUser' .$Id. '" type="button" style="margin-left:9px;">Edit</button>
                                                        <button name="removeUser" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete <i class="bx bx-trash"></i></button>
                                                        <input type="hidden" name="Id" value="'.$Id. '">
                                                    </form>';
                                            }

                                    echo '</div>
                                    </td>
                                </tr>';
                            }
                        ?>
                    </tbody>
		        </table>
			
		</div>
	</div>
</div>

<!-- newUser Modal -->
<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(202 202 203);">
        <h5 class="modal-title" id="newUser">Create New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="includes/_userManage.php" method="post">
              <div class="form-group">
                  <b><label for="username">Username:</label></b>
                  <input class="form-control" id="username" name="username" placeholder="Choose a unique Username" type="text" required minlength="3" maxlength="11">
              </div>
              <div class="form-group ">
                  <b><label for="userid">User ID:</label></b>
                  <input type="text" class="form-control" id="userid" name="userid" placeholder="User ID" required>
                </div>
                
                <div class="form-group ">
                  <b><label for="ic">IC NO.:</label></b>
                  <input type="text" class="form-control" id="ic" name="ic" placeholder="IC NO." required>
                </div>
              
              <div class="form-group">
                  <b><label for="email">Email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
              </div>
              <div class="form-group">
                  <b><label for="address">Address:</label></b>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Your Address" required>
              </div>
              <div class="form-group row my-0">
                    <div class="form-group col-md-6 my-0">
                        <b><label for="phone">Phone No:</label></b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">+60</span>
                            </div>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone No" required pattern="[0-9]{9}" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group col-md-6 my-0">
                        <b><label for="userType">Type:</label></b>
                        <select name="userType" id="userType" class="custom-select browser-default" required>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                        </select>
                    </div>
              </div>
              <div class="form-group">
                  <b><label for="password">Password:</label></b>
                  <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
              </div>
              <div class="form-group">
                  <b><label for="password1">Confirm Password:</label></b>
                  <input class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
              </div>
              <button type="submit" name="createUser" class="btn btn-success">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>

<?php 
    $usersql = "SELECT * FROM `users`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['id'];
        $name = $userRow['username'];
        $userid = $userRow['userid'];
        $ic = $userRow['ic'];
        $email = $userRow['email'];
        $address = $userRow['address'];
        $phone = $userRow['phone'];
        $userType = $userRow['userType'];


?>
<!-- editUser Modal -->
<div class="modal fade" id="editUser<?php echo $Id; ?>" tabindex="-1" role="dialog" aria-labelledby="editUser<?php echo $Id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(202 202 203);">
        <h5 class="modal-title" id="editUser<?php echo $Id; ?>">User Id: <b><?php echo $Id; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            
            <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
                <div class="form-group col-md-8">
                    <form action="includes/_userManage.php" method="post" enctype="multipart/form-data">
                        <b><label for="image">Profile Picture</label></b>
                        <input type="file" name="userimage" id="userimage" accept=".jpg" class="form-control" required style="border:none;">
                        <small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
                        <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                        <button type="submit" class="btn btn-success mt-3" name="updateProfilePhoto">Update Img</button>
                    </form>         
                </div>
                <div class="form-group col-md-4">
                    <img src="/Project/img/person-<?php echo $Id; ?>.jpg" alt="Profile Photo" width="100" height="100" onError="this.src ='/OnlineFoodOrdering/images/profile.jpg'">
                    <form action="includes/_userManage.php" method="post">
                        <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                        <button type="submit" class="btn btn-success mt-2" name="removeProfilePhoto">Remove Img</button>
                    </form>
                </div>
            </div>
            
            <form action="includes/_userManage.php" method="post">
                <div class="form-group">
                    <b><label for="username">Username</label></b>
                    <input class="form-control" id="username" name="username" value="<?php echo $name; ?>" type="text" required>
                </div>
                <div class="form-group">
                    <b><label for="userid">User ID:</label></b>
                    <input type="text" class="form-control" id="userid" name="userid" value="<?php echo $userid; ?>" required>
                </div>
                <div class="form-group">
                    <b><label for="ic">IC NO.:</label></b>
                    <input type="text" class="form-control" id="ic" name="ic" value="<?php echo $ic; ?>" required>
                </div>
          
                <div class="form-group">
                    <b><label for="email">Email:</label></b>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group">
                    <b><label for="address">Address:</label></b>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required>
                </div>
                <div class="form-group row my-0">
                    <div class="form-group col-md-6 my-0">
                        <b><label for="phone">Phone No:</label></b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">+60</span>
                            </div>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required pattern="[0-9]{9}" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group col-md-6 my-0">
                        <b><label for="userType">Type:</label></b>
                        <select name="userType" id="userType" class="custom-select browser-default" required>
                        <?php 
                            if($userType == 1) {
                        ?>
                            <option value="0">User</option>
                            <option value="1" selected>Admin</option>
                        <?php
                            } 
                            else {
                        ?>
                            <option value="0" selected>User</option>
                            <option value="1">Admin</option>
                        <?php
                            } 
                        ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                <button type="submit" name="editUser" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
  </div>
</div>

<?php
    }
?>

    <?php
    }
    ?>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>