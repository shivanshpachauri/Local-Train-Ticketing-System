<?php

$d=$station->getResult();

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
            overflow-x: hidden;
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
    <a href="http://localhost:8080/admindashboard" class="btn menu-item user-profile">
        <i class="bi bi-person"></i> Dashboard
    </a>
    
    <a href="http://localhost:8080/modifyseat" class="btn menu-item">
        <i class="bi bi-house-door"></i> Modify Seats
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
    
    <a href="http://localhost:8080/modifyfare" class="btn menu-item">
        <i class="bi bi-ticket"></i> Modify fare
    </a>
    
    <!-- 
    <a href="#cancel-tickets" class="btn menu-item">
        <i class="bi bi-x-circle"></i> Cancel Tickets
    </a>
    -->       
    
    <form id="logout" method="post" action="http://localhost:8080/admindashboard">
        <input type="hidden" name="logout" value="flag_logout_admin">
        <button type="submit" class="btn menu-item">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</div>

<div class="dashboard-container">
        <!-- Modal 1-->
  <div class="modal fade" id="modal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cancel Booking</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure, you want to delete train ?</p>
                   <form method="post" action="http://localhost:8080/admindashboard">  
                    <input id="pass_val" name="del_id" type="hidden"> 
          <button type="submit" class="btn btn-default" >Yes</button>
      </form>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
      
    </div>
  </div>


          <!-- Modal 2-->
  <div class="modal fade" id="modal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Train's Detail</h4>
        </div>
        <div class="modal-body">
         <form action="http://localhost:8080/admindashboard" method="post">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="trainId" class="form-label">Train ID</label>
            <input type="text" class="form-control" id="pass_val_up" name="Id_up" readonly>

        </div>
        <div class="col-md-6 mb-3">
            <label for="trainName" class="form-label">Train Name</label>
            <input type="text" class="form-control" id="t_name"  name="name_up" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="originStation" class="form-label">Origin Station</label>
           
             <select name="origin" id="origin" class="form-control">
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
        <div class="col-md-6 mb-3">
            <label for="destinationStation" class="form-label">Destination Station</label>
            <select name="dest" id="dest" class="form-control">
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
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="originTime" class="form-label">Origin Time</label>
            <input type="text" name="origin_time" class="form-control" id="org_time" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="destinationTime" class="form-label">Destination Time</label>
             <input type="text" name="dest_time" class="form-control" id="dest_time" required>
         </div>
     </div><br>
      <button type="submit" class="btn btn-primary">Submit</button>
</form>
     
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
      
    </div>
  </div>

    <div class="main-content">
    

        <h2 class="content-heading">Add Train</h2>
          <span style='color:green;font-size:15px;'><?php echo session('msg_train');?></span>
<form action="http://localhost:8080/admindashboard" method="post">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="trainId" class="form-label">Train ID</label>
            <input type="text" class="form-control" id="trainId" name="Id">

        </div>
        <div class="col-md-6 mb-3">
            <label for="trainName" class="form-label">Train Name</label>
            <input type="text" class="form-control" id="trainName"  name="name" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="originStation" class="form-label">Origin Station</label>
           
             <select name="origin" id="orgSelect" class="form-control">
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
        <div class="col-md-6 mb-3">
            <label for="destinationStation" class="form-label">Destination Station</label>
            <select name="dest" id="orgSelect" class="form-control">
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
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="originTime" class="form-label">Origin Time</label>
            <input type="text" name="origin_time" class="form-control" id="originTime" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="destinationTime" class="form-label">Destination Time</label>
             <input type="text" name="dest_time" class="form-control" id="destTime" required>
         </div>
     </div><br>
      <button type="submit" class="btn btn-primary">Submit</button>
</form><br>
     <h2 class="content-heading">Train List</h2>
         <div class="admin-table">
            <table id="dispTable"  class="table table-bordered">
                <thead>
                <tr>
                    <th>Train ID</th>
                    <th>Name</th>
                    <th>Route</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                     <?php
                   
                    foreach ($train->getResult() as $row) {
    


              ?>
                <!-- Sample Data, replace with dynamic data from PHP -->
                <tr>
                    <td><?php echo $row->Id ?></td>
                    <td><?php echo $row->name?></td>
                    <td><?php echo $row->origin."to".$row->dest; ?></td>
               
                    <td>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal2" onclick="pass_data_up('<?php echo $row->Id;?>','<?php echo $row->name;?>','<?php echo $row->origin;?>','<?php echo $row->dest;?>','<?php echo $row->origin_time;?>','<?php echo $row->dest_time;?>')">Update</button>

                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal1" onclick="pass_data(<?php echo $row->Id;?>)">Delete</button>
                    </td>
                </tr>

            <?php } ?>
                <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

</div>

</div>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</body>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script> 
   function pass_data(abc)
    {
    $("#pass_val").val(abc);
    }
     function pass_data_up(abc,name,org,dest,org_time,dest_time)
    {
        
    $("#pass_val_up").val(abc);
    $("#t_name").val(name);
    $("#org").val(org);
    $("#dest").val(dest);
     $("#org_time").val(org_time);
    $("#dest_time").val(dest_time);

    }

</script>
  <script
src="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script>
$(document).ready(function () {
$('#dispTable').DataTable();
});
</script>
</html>
