<?php

//print_r($record_ticket);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
 <!--  -->
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
          <p>Are you sure, you want to cancel booking ?</p>
                   <form method="post" action="http://localhost:8080/ticket">  
                    <input id="pass_val" name="del_id" type="hidden"> 
          <button type="submit" class="btn btn-default" >Yes</button>
      </form>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
      
    </div>
  </div>
    <div class="main-content">
         <span style='color:green;font-size:15px;'><?php echo session('msg_b');?></span>
<div id="display_record">
<table class="table" id="dispTable">
    <thead>
        <tr>
            <th scope="col">Passenger</th>
            <th scope="col">Age</th>
            <th scope="col">Date of Journey</th>
             <th scope="col">Boarding Stat:</th>
              <th scope="col">Arrival Stat:</th>
               <th scope="col">Boarding time:</th>
              <th scope="col">Arrival time:</th>
            <th scope="col">Seat</th>
            <th scope="col">Fare</th>
            <th scope="col">Print</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($record_ticket->getResult() as $row) { ?>
            <tr>
                <td><?php echo $row->pass_name ?></td>
                <td><?php echo $row->pass_age ?></td>
                <td><?php echo $row->date_j ?></td>
                <td><?php echo $row->org ?></td>
                    <td><?php echo $row->dest ?></td>
                         <td><?php echo $row->org_time ?></td>
                            <td><?php echo $row->dest_time ?></td>
                <td><?php echo $row->seat_no ?></td>
                <td><?php echo $row->fare ?></td>
                <td>
                    <!-- Add the onclick event to call exportPrint with the current row -->
                    <button class="btn btn-primary" onclick="exportPrint(this.parentNode.parentNode)">Print</button>
                </td>
                 <td>
                    <!-- Add the onclick event to call exportPrint with the current row -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal1" onclick="pass_data(<?php echo $row->Id;?>)">Cancel</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</div>

    </div>
</div>


</body>
<script type="text/javascript">
    function exportPrint(rowData) {
        // Extract data from the row
        var passenger = rowData.cells[0].innerText;
        var age = rowData.cells[1].innerText;
        var dateOfJourney = rowData.cells[2].innerText;
             var org = rowData.cells[3].innerText;
                  var dest = rowData.cells[4].innerText;

                       var org_time = rowData.cells[5].innerText;
                            var dest_time = rowData.cells[6].innerText;
                            var seat = rowData.cells[7].innerText;
                            var fare = rowData.cells[8].innerText;
                        
        // Add more variables as needed

        // Create a new HTML structure
        var content = `
            <div>
                <h3>Passenger: ${passenger}</h3>
                <p>Age: ${age}</p>
                <p>Date of Journey: ${dateOfJourney}</p>
                <p>Boarding Station: ${org}</p>
                <p>Destination: ${dest}</p>
                <p>Boarding time: ${org_time}</p>
                <p>Arrival Time: ${dest_time}</p>
                 <p>Seat No : ${seat}</p>
                <p>Fare : ${fare}</p>

                <!-- Add more content as needed -->
            </div>
        `;

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(content); // THE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close();   // CLOSE THE CURRENT WINDOW.

        // Use xlsx library to create an Excel file
        var wb = XLSX.utils.table_to_book(win.document.body, { sheet: 'Sheet JS' });
        XLSX.writeFile(wb, 'selected_row.xlsx');
    }
</script>
<script> 
   function pass_data(abc)
    {
    $("#pass_val").val(abc);
    }
</script>	
<script src="path/to/xlsx.full.min.js"></script>
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