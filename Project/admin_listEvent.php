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
    <title>Event List</title>
  </head>
  <body>

  <?php include 'includes/_dbconnect.php';?>
    <?php require 'includes/admin_nav.php';?>

<div class="w">
<div class="main_content">
        <div class="header"></div>  
        <div class="info">
          
        <div class="row">
        <div class="col-lg-10">
            <button class="btn btn-dark float-right" data-toggle="modal" data-target="#newEvent"><i class="fa fa-plus"></i> New Event</button>
        </div>
	</div>

			<!-- Table Panel -->
			<div class="col-md-10 mb-3">
				<div class="bg-light">
					
						<table class="table table-bordered table-hover mb-0">
							<thead class="bg-secondary text-light">
								<tr>
									<th class="text-center" style="width:7%;">Id</th>
									<th class="text-center">Img</th>
									<th class="text-center" style="width:50%;">Event List</th>
                  <th class="text-center" style="width:25%;">Date / Time</th>
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
                                    $venue = $row['venue'];
                                    $eventDate = $row['eventDate'];
                                    $eventTime = $row['eventTime'];
                     
                                    echo '<tr>
											                      <td class="text-center bg-secondary text-light">' .$eventId. '</td>
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
                                            <td class="text-center">
                                                <form action="includes/_eventManage.php" method="POST">
													<button class="btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#updateEvent' .$eventId. '">Edit</button>							
													<button name="removeEvent" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
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

<!--Form Panel-->
<div class="modal fade" id="newEvent" tabindex="-1" role="dialog" aria-labelledby="newEvent" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(202 202 203);">
        <h5 class="modal-title" id="newEvent">Create New Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

			<form action="includes/_eventManage.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label">Event: </label>
								<input type="text" class="form-control" name="name" required>
							</div>
							<div class="form-group">
								<label class="control-label">Description: </label>
								<textarea cols="30" rows="3" class="form-control" name="description" required></textarea>
							</div>
              <div class="form-group">
								<label class="control-label">Place: </label>
								<input type="text" class="form-control" name="venue" required>
							</div>
              <div class="form-group">
								<label class="control-label">Date: </label>
								<input type="text" class="form-control" name="date" required>
							</div>
              <div class="form-group">
								<label class="control-label">Time: </label>
								<input type="text" class="form-control" name="time" required>
							</div>
                            
							<div class="form-group">
								<label for="image" class="control-label">Image</label>
								<input type="file" name="image" id="image" accept=".jpg" class="form-control" required style="border:none;">
								<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
							</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="d-grid gap-2 mx-auto">
								<button type="submit" name="createEvent" class="btn btn-sm btn-success"> CREATE </button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
    </div>
  </div>
</div>
			<!-- FORM Panel -->




<?php 
    $eventsql = "SELECT * FROM `event`";
    $eventResult = mysqli_query($conn, $eventsql);
    while($eventRow = mysqli_fetch_assoc($eventResult)){
        $eventId = $eventRow['eventId'];
        $eventName = $eventRow['eventName'];
        $Desc = $eventRow['Desc'];
        $venue = $eventRow['venue'];
        $eventDate = $eventRow['eventDate'];
        $eventTime = $eventRow['eventTime'];
?>

<!-- Modal -->
<div class="modal fade" id="updateEvent<?php echo $eventId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateEvent<?php echo $eventId; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(202 202 203);">
        <h5 class="modal-title" id="updateEvent<?php echo $eventId; ?>">Event Id: <?php echo $eventId; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form action="includes/_eventManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Image</label></b>
					<input type="file" name="eventimage" id="eventimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('eventPhoto').src = window.URL.createObjectURL(this.files[0])">
					<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
					<input type="hidden" id="eventId" name="eventId" value="<?php echo $eventId; ?>">
					<button type="submit" class="btn btn-success my-1" name="updateEventPhoto">Update Img</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/Project/img/event-<?php echo $eventId; ?>.jpg" id="eventPhoto" name="eventPhoto" alt="event image" width="100" height="140">
				</div>
			</div>
		</form>
		<form action="includes/_eventManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Event</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $eventName; ?>" type="text" required>
            </div>
			
            <div class="text-left my-2">
                <b><label for="Desc">Description</label></b>
                <textarea class="form-control" id="Desc" name="Desc" rows="2" required minlength="5"><?php echo $Desc; ?></textarea>
            </div>

            <div class="text-left my-2">
                <b><label for="venue">Place</label></b>
                <input class="form-control" id="venue" name="venue" value="<?php echo $venue; ?>" type="text" required>
            </div>
            <div class="text-left my-2">
                <b><label for="date">Date</label></b>
                <input class="form-control" id="date" name="date" value="<?php echo $eventDate; ?>" type="text" required>
            </div>
            <div class="text-left my-2">
                <b><label for="time">Time</label></b>
                <input class="form-control" id="time" name="time" value="<?php echo $eventTime; ?>" type="text" required>
            </div>
            <input type="hidden" id="eventId" name="eventId" value="<?php echo $eventId; ?>">
            <button type="submit" class="btn btn-success" name="updateEvent">Update</button>
        </form>
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