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
    <title>List Event</title>
  </head>
  <body>

  <?php

        require 'includes/admin_nav.php';
        
    ?>

<div class="w">
<div class="main_content">
        <div class="header"></div>  
        <div class="info">
          
        <button class="btn btn-info" style="margin-left:9px;">Create</button>
        <br><br>

            <!-- Table Panel -->
            <div class="col-md-10 mb-3">
                <div class="">
                    <div class="bg-light">
                    <table class="table table-bordered table-hover mb-0">
                        <thead style="background-color: rgb(202 202 203);">
                        <tr>
                            <th class="text-center" style="width:2%;">Id</th>
                            <th class="text-center" style="width:30%;">Event List</th>
                            <th class="text-center" style="width:7%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                               <tr class="bg-light">
                                        <td class="text-center" style="background-color: rgb(202 202 203);"><b>1</b></td>
                                        <td>
                                            <p>Event</p>
                                            
                                        </td>
                                        <td class="text-center">
                                            
                                            <button class="btn btn-sm btn-success" >EDIT</button>
                                            <button class="btn btn-sm btn-danger" style="margin-left:9px;">DELETE</button>
                                            
                                        </td>
                                    </tr>

                                    <tr class="bg-light">
                                        <td class="text-center" style="background-color: rgb(202 202 203);"><b>2</b></td>
                                        <td>
                                            <p>Event</p>
                                            
                                        </td>
                                        <td class="text-center">
                                            
                                            <button class="btn btn-sm btn-success" >EDIT</button>
                                            <button class="btn btn-sm btn-danger" style="margin-left:9px;">DELETE</button>
                                            
                                        </td>
                                    </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div></div>
            <!-- Table Panel -->





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