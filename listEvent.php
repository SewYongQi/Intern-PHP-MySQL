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
    <title>List Event</title>
  </head>
  <body>

  <?php require 'includes/nav.php';?>
  <?php include 'includes/_dbconnect.php';?>

<div class="w">
<div class="main_content">
        <div class="header"></div>  
        <div class="info">
          
    
            <!-- Table Panel -->
			<div class="col-md-10 mb-3">
				<div class="bg-light">
					
						<table class="table table-bordered table-hover mb-0">
							<thead style="background-color: rgb(202 202 203);">
								<tr>
									<th class="text-center" style="width:7%;">Id</th>
									<th class="text-center">Img</th>
									<th class="text-center" style="width:58%;">Event List</th>
									<th class="text-center" style="width:18%;">Action</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                                $sql = "SELECT * FROM `event`";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $eventId = $row['eventId'];
                                    $eventName = $row['eventName'];
                                    $Desc = $row['Desc'];
                     
                                    echo '<tr>
											<td class="text-center" style="background-color: rgb(202 202 203);">' .$eventId. '</td>
                                            <td>
                                                <img src="/Project/img/event-'.$eventId. '.jpg" alt="image for this item" width="200px" height="150px">
                                            </td>
                                            <td>
                                                <p>Title : <b>' .$eventName. '</b></p>
                                                <p>Description : <b class="truncate">' .$Desc. '</b></p>
                                                
                                            </td>
                                            <td class="text-center">
                                            <form action="includes/_manageCart.php" method="POST">
												
                                            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#viewEvent' .$eventId. '">VIEW</button>
													
														<button name="" class="btn btn-sm btn-success" style="margin-left:9px;">JOIN</button>
														<input type="hidden" name="eventId" value="'.$eventId. '">
													
												</form>
                                            </td>
                                        </tr>';
                                }
                            ?>
							</tbody>
						</table>
					
				</div>
			</div><br>
			<!-- Table Panel -->
		</div>
	</div>	
</div>

<?php 
    $eventsql = "SELECT * FROM `event`";
    $eventResult = mysqli_query($conn, $eventsql);
    while($eventRow = mysqli_fetch_assoc($eventResult)){
        $eventId = $eventRow['eventId'];
        $eventName = $eventRow['eventName'];
        $Desc = $eventRow['Desc'];
?>

<!-- Modal -->
<div class="modal fade" id="viewEvent<?php echo $eventId; ?>"  role="dialog" aria-labelledby="viewEvent<?php echo $eventId; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="viewEvent<?php echo $eventId; ?>"><?php echo $eventName; ?></h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark text-light">
	  	
      
        <?php
        echo  '
            <div class="col-md-8 my-4">
                <p class="mb-0">' .$Desc .'</p>
            </div>';
        ?>
        
		
		
      </div>
    </div>
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
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>