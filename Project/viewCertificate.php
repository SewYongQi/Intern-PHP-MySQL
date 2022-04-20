<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <title>Certificate</title>

    <style>
.container {
  position: relative;
  text-align: left;
  color: black;
}

.date {
  position: absolute;
  bottom: 25px;
  left: 30%;
}

.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
}

.top-right {
  position: absolute;
  top: 8px;
  right: 16px;
}

.bottom-right {
  position: absolute;
  bottom: 8px;
  right: 16px;
}

.name {
  position: absolute;
  top: 60%;
  left: 45%;
  transform: translate(-50%, -50%);
}

.event {
  position: absolute;
  top: 75%;
  left: 45%;
  transform: translate(-50%, -50%);
}
</style>
  </head>
  <body>

  <?php
   
        require 'includes/_dbconnect.php';
        require 'includes/nav.php';
        include 'includes/_loggedin.php';
    ?>

<div class="w">
<div class="main_content">
        <div class="header"></div>  
        <div class="info">
          
    <?php 
      if($loggedin){
    ?>

    <div class="">
        <div class="table-wrapper" id="empty">
            
                    <div class="col-sm-2">						
                      <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                    </div>
            
            
            <div class="col-md-10">
            <table>
                <tbody>
                    <?php
                         $sql = "SELECT * FROM `attendent` WHERE `userId`= $userId";
                         $result = mysqli_query($conn, $sql);
                         $counter = 0;
                         while($row = mysqli_fetch_assoc($result)){
                            $eventId = $row['eventId'];

                            $mysql = "SELECT * FROM `event` WHERE eventId = $eventId";
                            $myresult = mysqli_query($conn, $mysql);
                            $myrow = mysqli_fetch_assoc($myresult);
                            $eventName = $myrow['eventName'];
                            $Desc = $myrow['Desc'];
                            $venue = $myrow['venue'];
                            $eventDate = $myrow['eventDate'];
                            $eventTime = $myrow['eventTime'];
                            $counter++;


                            $SQL = "SELECT * FROM `users` WHERE id='$userId'"; 
                            $RESULT = mysqli_query($conn, $SQL);
                            $ROW=mysqli_fetch_assoc($RESULT);
                            $ic = $ROW['ic'];
                            
                            echo '
                            <tr class="text-center">
                            <td><br>
                            <img src="img/certificate.jpg" alt=" " width="80%"/>
                            <div class="name text-uppercase">
                              <b>'.$username.'</b>
                              <b>'.$ic.'</b>
                            </div>

                            <div class="event text-center">
                              <p>For his achievements is participating in the <br>2022 ' .$eventName. ' activities </p>
                            </div>

                            <div class="date text-uppercase">
                              <b>'.$eventDate.'</b>
                            </div>
                            </td>
                            </tr>
                            ';
                        }
                        
                        if($counter==0) {
                          ?><script> document.getElementById("empty").innerHTML = '<div class="col-md-10 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>You have not join any event.</strong></h3><h4>Please join to make me happy :)</h4> <a href="listEvent.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Join Event</a> </div></div></div></div>';</script> <?php
                      }
                    ?>
                </tbody>
            </table></div>
        </div>
    </div> 

    <?php
    }
    ?>


      </div>
    </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>