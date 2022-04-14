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
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <title>List Event</title>
  </head>
  <body>

  <?php require 'includes/nav.php';?>
  <?php include 'includes/_dbconnect.php';?>

<div class="w">
<div class="main_content">
        <div class="header"></div>  
        <div class="info">
          
    
        <button class="btn btn-danger"><a href="listEvent.php" class="text-light">BACK</a></button>
        <br><br>

        <div class="row jumbotron bg-dark col-10">
        <?php
            $foodId = $_GET['foodid'];
            $sql = "SELECT * FROM `food` WHERE foodId = $foodId";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $eventName = $row['eventName'];
            
            $Desc = $row['Desc'];
            
        ?>
        <script> document.getElementById("title").innerHTML = "<?php echo $eventName; ?>"; </script> 
        <?php
        echo  '<div class="col-md-4"><br>
                <img src="img/event-'.$foodId. '.jpg" width="250px" height="270px">
            </div>
            <div class="col-md-8 my-4">
                <h3>' . $eventName . '</h3>
                
                <p class="mb-0">' .$eventDesc .'</p>

                
            </div>';
        ?>
        </div>
    




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