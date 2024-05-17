<?php

$d=$station->getResult();

if(isset($station_time))
{
$station_time=$station_time->getResult();

$fare=$fare->getResult();
$seat=$seat->getResult();
// print_r($station_time);
}




//print_r($d[0]->name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .dashboard-container {
            display: flex;
            height: 100vh;

           
            margin-left: 250px;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #ffffff;
            padding-top: 20px;
            height: 100%;
            position: fixed;
            transition: margin-left 0.3s;            
            z-index: 1;          
        }

        .main-content {
            flex: 1;
            padding: 20px;
            margin-left: 0;
            transition: margin-left 0.3s;
        }     

        .menu-item {
            display: block;
            width: 100%;
            padding: 10px 20px;
            border: none;
            background-color: transparent;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: left;
        }

        .menu-item:hover {
            background-color: #495057;
        }

        .menu-item i {
            margin-right: 10px;
        }

        .content-heading {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card-deck {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .card {
            flex: 1;
            margin-right: 10px;
        }

        .card-body {
            text-align: center;
        }

        .train-table {
            margin-top: 20px;
        }

        .table th,
        .table td {
            text-align: center;
        }
     .main-content {
                margin-left: 0;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
<div class="sidebar">
    <a href="http://localhost:8080/profile" class="btn menu-item user-profile">
        <i class="bi bi-person"></i> User Profile
    </a>
    
    <a href="http://localhost:8080/dashboard" class="btn menu-item">
        <i class="bi bi-house-door"></i> Dashboard
    </a>
    
    <!-- 
    <a href="#" class="btn menu-item">
        <i class="bi bi-train"></i> Trains
    </a>
    -->
    
    <!-- 
    <a href="booktrain" class="btn menu-item">
        <i class="bi bi-book"></i> Book Trains
    </a>
    -->
    
    <a href="http://localhost:8080/ticket" class="btn menu-item">
        <i class="bi bi-ticket"></i> Tickets
    </a>
    
    <!-- 
    <a href="#cancel-tickets" class="btn menu-item">
        <i class="bi bi-x-circle"></i> Cancel Tickets
    </a>
    -->
    
    <form id="logout" method="post" action="http://localhost:8080/dashboard">
        <input type="hidden" name="logout" value="flag_logout">
        <button type="submit" class="btn menu-item">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</div>

<div class="dashboard-container">
    

    <div class="main-content">
    

        <h2 class="content-heading">Book </h2>
 <div class="container">
          <form action="/dashboard" method="get">

            <!-- Organization and Destination Select in the same line -->
            <div class="form-row">

                <!-- Organization Select -->
                <div class="form-group col-md-6">
                    <label for="orgSelect">Select Organization:</label>
                    <select name="org" id="orgSelect" class="form-control">
                        <?php
                            $startValue = 0;  // Replace with your desired starting value
                            $endValue = count($d) - 1;    // Replace with your desired ending value

                            // Loop to generate options with values between $startValue and $endValue
                            for ($i = $startValue; $i <= $endValue; $i++) {
                                $p = $i;
                                $nm = $d[$p]->name;
                                $s=$i+1;
                                echo "<option value='$s'>$nm</option>";
                            }
                        ?>
                    </select>
                </div>

                <!-- Destination Select -->
                <div class="form-group col-md-6">
                    <label for="destSelect">Select Destination:</label>
                    <select name="dest" id="destSelect" class="form-control">
                        <?php
                            // Loop to generate options with values between $startValue and $endValue
                            for ($i = $startValue; $i <= $endValue; $i++) {
                                $p = $i;
                                $nm = $d[$p]->name;
                                  $s=$i+1;
                                echo "<option value='$s'>$nm</option>";
                            }
                        ?>
                    </select>
                </div>

            </div>

            <!-- Date Input -->
            <div class="form-group col-md-6">
                <label for="inputDate">Select a Date:</label>
                <input type="date" id="inputDate" name="inputDate" class="form-control" required>
            </div>
<div class="form-group col-md-12">
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>

 </div>
        </form>
    </div>
<?php 
if(isset($station_time))
{
    ?>
        <div class="train-table">
            <table  id="dispTable"  class="table table-bordered">
                <thead>
                <tr>
                    <th>Train Number</th>
                    <th>Train</th>
                    <th>Route</th>
                     <th>Select Starting Station</th>
                    <th>Select departing Station</th> 
                      <th>Departure Time</th>
                      <th>Destination Arriving Time</th>
                    <th>Total Seat</th>
                    <th>Fare</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   <?php
                   
                    foreach ($record->getResult() as $row) {
    
              ?>
                <tr>
                    <form id="book_frm" method="get" action="http://localhost:8080/booktrain">
                        <input type="hidden" name="date_b" value="<?php echo $_GET['inputDate'];?>">
                    <td><input type="hidden" name="train_id" value="<?php echo $row->Id;?>"><?php echo $row->Id;?></td>
                    <td><?php echo $row->name;?></td>
                    <td><?php echo $row->origin." to ".$row->dest;?></td>
                     <td> 
         <?php




 foreach ($station_time as $trow)
 {
    
      if($row->Id==$trow->train_id && $row->Id)
      {
    echo $d[$trow->origin_stat-1]->name;

echo "<input type='hidden' name='origin_stat' value=$trow->origin_stat>";
      }

 }        
          
        ?> 
    </td>
    <td>
          <?php

 foreach ($station_time as $trow)
 {
    
      if($row->Id==$trow->train_id)
      {
    echo $d[$trow->dest_stat-1]->name;
    echo "<input type='hidden' name='dest_stat' value=$trow->dest_stat>";

      }
 }
        ?> 
  </td>  <td> <?php

 foreach ($station_time as $trow)
 {
    
      if($row->Id==$trow->train_id)
      {
    echo $trow->org_time;
    echo "<input type='hidden' name='origin_time' value=$trow->org_time>";

      }

 }
  
        ?> </td>
                    <td><?php
  // Replace with your desired starting value
  

 foreach ($station_time as $trow)

 {
    
      if($row->Id==$trow->train_id)
      {
    echo $trow->dest_time;
    echo "<input type='hidden' name='dest_time' value=$trow->dest_time>";

      }


 }
        
          
        ?></td>
                    <td><?php


 foreach ($seat as $trow)
 {   
      if($row->Id==$trow->train_id )
      {
    echo $trow->seat;
    echo "<input type='hidden' name='seat' value=$trow->seat>";

      }
 }     ?></td>
                    <td><?php
 foreach ($fare as $trow)
 {
    if($row->Id==$trow->train_id)
      {
    echo $trow->fare;
    echo "<input type='hidden' name='fare' value=$trow->fare>";

      }
 }  
        ?></td>
                    <td>
                        

                        <button type="submit" class="btn btn-danger btn-sm book-btn">Book</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
                <!-- Add more rows as needed -->
                </tbody>
            </table>

        <?php } ?>
        </div>
    </div>

</div>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</body>
<script>
    $(document).ready(function () {
        $('.orgSelect, .destSelect').change(function () {
            // Get the value of the changed select field
            var changedValue = $(this).val();

            // Find the closest row containing the changed select field
            var row = $(this).closest('tr');

            // Determine which select field is changed
            if ($(this).hasClass('orgSelect')) {
                var orgValue = changedValue;
                var destValue = parseInt(row.find('.destSelect').val()) + 1;
            } else {
                var orgValue = row.find('.orgSelect').val();
                var destValue = parseInt(changedValue) + 1;
            }

            // alert(orgValue);
            // alert(destValue);

            // Find the "Book" button in the same row
            var bookBtn = row.find('.book-btn');
            // alert(bookBtn);

            // Disable the button if the selected values are the same
            bookBtn.prop('disabled', orgValue == destValue);
        }).change(); // Trigger the change event initially to handle the initial state
    });
</script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script
src="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script>
$(document).ready(function () {
$('#dispTable').DataTable();
});
</script>
</html>
