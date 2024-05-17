<?php

$d=$station->getResult();
   
// print_r($add);

// print_r($d[0]->name);
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
  <div class="sidebar">
    <a href="#" class="btn menu-item user-profile">
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
        <input type="hidden" value="flag_logout">
        <button type="submit" class="btn menu-item">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</div>
<div class="dashboard-container">   

    <div class="main-content">
    

        <h2 class="content-heading">Book Train</h2>
<form id="booking-form" method="post" action="http://localhost:8080/booktrain">

        <div class="form-group row">
            <label for="train_name" class="col-sm-2 col-form-label">Train No.:</label>
            <div class="col-sm-4">
                <input type="text" name="train_id" value="<?php echo $add['train_id']?>" class="form-control" readonly>
            </div>
        </div><br>

        <div class="form-group row">
            <label for="origin" class="col-sm-2 col-form-label">Origin:</label>
            <div class="col-sm-4">
                <select name="org" id="origin" class="form-control">
                    <option selected="selected" value="<?php echo $add['origin_stat'];?>" readonly><?php echo $d[$add['origin_stat']-1]->name;?> </option>
                </select>
            </div>

            <label for="destination" class="col-sm-2 col-form-label">Destination:</label>
            <div class="col-sm-4">
                <select name="dest" id="destination" class="form-control">
                    <option selected="selected" value="<?php echo $add['dest_stat'];?>" readonly><?php echo $d[$add['dest_stat']]->name;?> </option>
                </select>
            </div>
        </div>

           <div class="form-group row">
            <label for="origin" class="col-sm-2 col-form-label">Origin Time:</label>
            <div class="col-sm-4">
                <select name="org_time" id="origin_t" class="form-control">
                    <option selected="selected" value="<?php echo $add['origin_time'];?>" readonly><?php echo $add['origin_time'];?> </option>
                </select>
            </div>

            <label for="dest_time" class="col-sm-2 col-form-label">Destination Time:</label>
            <div class="col-sm-4">
                <select name="dest_time" id="destination_t" class="form-control">
                    <option selected="selected" value="<?php echo $add['dest_time'];?>" readonly><?php echo $add['dest_time'];?> </option>
                </select>
            </div>
        </div>



        <div class="form-group row">
            <label for="date" class="col-sm-2 col-form-label">Date of Journey:</label>
            <div class="col-sm-4">
                <input type="date" name="date_j" id="date" class="form-control" value="<?php echo $add['date_b'];?>">
            </div>
        </div><br>


           <div class="form-group row">
            <label for="origin" class="col-sm-2 col-form-label">Fare:</label>
            <div class="col-sm-4">
                <select name="fare" id="origin_t" class="form-control">
                    <option selected="selected" value="<?php echo $add['fare'];?>" readonly><?php echo $add['fare'];?> </option>
                </select>
            </div>

          
        </div>

        <p>Passenger Details : </p>
        <div id="passenger-details">
            <!-- Passenger details will be added dynamically using JavaScript -->
        </div>
        <button type="button" id="add-passenger-btn" class="btn btn-primary">Add Passenger</button><br><br>

       

        <!-- Add more additional service options as needed -->

        <div class="form-group mt-3">
            <button type="button" disabled class="btn btn-primary">Proceed to Review & Payment</button><br><br>
            <button type="submit" class="btn btn-primary">Book Ticket</button>
        </div>
    </form>


  <script type="text/javascript">
        $(document).ready(function () {
            const addPassengerButton = $('#add-passenger-btn');
            const passengerDetailsContainer = $('#passenger-details');

            let passengerCount = 0;

            addPassengerButton.on('click', function () {
                passengerCount++;

                const passengerDiv = $('<div class="passenger"></div>');
                passengerDiv.html(`
                    <b><label for="passenger-name-${passengerCount}">Passenger ${passengerCount}</label></b><br>
                    <label>Name:</label>
                    <input type="text" name="pass_name[]" id="passenger-name-${passengerCount}" required>
                    <br>
                    <label for="passenger-age-${passengerCount}">Age:</label>
                    <input type="number" name="pass_age[]" id="passenger-age-${passengerCount}" required>
                `);

                passengerDetailsContainer.append(passengerDiv);
            });
        });
    </script>

</body>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>
