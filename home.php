<div class="w">
<div class="main_content">
        <div class="header"></div>  
        <div class="info">

<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
if($loggedin){
    
?>
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
                    <button class="btn btn-danger float-right" data-toggle="modal" data-target="#editUser"> Edit User</button>
                    <table><br><br>
                    <tbody>
                        <tr>
                            <td><h5 class="text-dark fw-bold">Student Name : </h5></td>
                            <td><h5> <?php echo $username ?></h5></td>
                        </tr>
                        <tr>
                            <td><h5 class="text-dark fw-bold">Student ID : </h5></td>
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
                    </tbody>    
                    </table></div>
                    
               
            </div>
            
           
    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-dark">
        <h5 class="modal-title text-center" id="editUser">Student Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
                    <form action="includes/_manageProfile.php" method="post" class="text-dark">
                    
                        <div class="form-group">
                            <b><label for="username">Student Name:</label></b>
                            <input class="form-control" id="username" name="username" type="text" value="<?php echo $username ?>">
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <b><label for="userid">Student ID:</label></b>
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

<?php
    }     
?>
   
</div></div>

      </div>
    </div>
</div>