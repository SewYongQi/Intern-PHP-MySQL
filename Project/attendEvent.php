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
    <title>Attend Events</title>
    <style>
    
    .table-wrapper .btn {
        float: right;
    }

    .table-wrapper .btn.btn-primary {
        color: #fff;
        background: #03A9F4;
    }
    .table-wrapper .btn.btn-primary:hover {
        background: #03a3e7;
    }
 
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    .table-title {
        padding: 5px 25px;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
</style>
</head>
<body>
    <?php include 'includes/_dbconnect.php';?>
    <?php include 'includes/nav.php';?>
    <?php include 'includes/_loggedin.php';?>
    
    <div class="w">
    <div class="main_content">
        <div class="header"></div>  
        <div class="info">
    <?php 
    if($loggedin){
    ?>

    <div class="">
        <div class="table-wrapper" id="empty">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><b>Attend Event</b></h2>
                    </div>
                    <div class="col-sm-2">						
                        <a href="" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh</span></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-10 mb-3">
            <table class="table table-bordered table-hover mb-0">
                <thead class="bg-success text-center text-light">
                    <tr>
                        <th style="width:7%;">No.</th>
                        <th style="width:7%;">Id</th>
					    <th>Img</th>
					    <th style="width:50%;">Event List</th>
					    <th style="width:30%;">Date</th>
                        <th>Action</th>	
                    </tr>
                </thead>
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
                            
                            echo '<tr class="bg-light">
                                    <td class="text-center bg-success text-light">' . $counter . '</td>
                                    <td class="text-center">' .$eventId. '</td>
                                    <td>
                                        <img src="/Project/img/event-'.$eventId. '.jpg" alt="image for this item" width="200px" height="250px">
                                    </td>
                                    <td>
                                        <p><b>Event : </b>' .$eventName. '</p>
                                        <p><b>Description : <br></b>' .$Desc. '</p>
                                        <p><b>Place : </b>' .$venue. '</p>
                                
                                    </td>
                                    <td>
                                        <p><b>Date : </b>'.$eventDate.'</p>
                                        <p><b>Time : </b>'.$eventTime.'</p>
                                    </td>
                                    <td>
                                        <form action="includes/_manageCart.php" method="POST">
                                            <button class="btn btn-outline-danger" name="removeEvent">Remove</button>
                                            <input type="hidden" name="eventId" value="'.$eventId. '">
                                        </form>
                                    </td>
                                    
                                </tr>';
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
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>