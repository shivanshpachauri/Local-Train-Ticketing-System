<?php



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
    
    <form id="logout" method="post" action="http://localhost:8080/dashboard">
        <input type="hidden" value="flag_logout_admin">
        <button type="submit" class="btn menu-item">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</div>

<div class="dashboard-container">
  



    <div class="main-content">
    

        <h2 class="content-heading">Modify Seat </h2>
          <span style='color:green;font-size:15px;'><?php echo session('msg_seat');?></span>

       
 
    <form method="post" action="http://localhost:8080/modifyseat">
      <div class="mb-3 p-78">
    <label for="trainId" class="form-label">Train ID</label>
    <input type="text" name="train_id" class="form-control" id="trainId" placeholder="Enter Train ID" required>
</div>
<div class="mb-3 p-3">
    <label for="seat" class="form-label">Number of Seats : </label>
    <input type="text" name="seat" class="form-control" id="trainId" placeholder="Enter Seat no" required>
</div>
<div class="mb-3 p-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" name="date_j" class="form-control" id="date" required>
</div><br>
<button type="submit" class="btn btn-primary">Modify Seat</button>
</form>


<br>
         

</div>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</body>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>
