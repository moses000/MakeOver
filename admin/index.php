<!DOCTYPEhtml>
<html>
  <head>
    <title>glambydebbie</title>
    <meta charset="UTF-8">
    <meta name="description" content="Glambydebbie Makeover">
    <meta name="keywords" content="Beauty, Fashion, Makeover">
    <meta name="author" content="Imoleayo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
  </head>
  <body>
    <header>
      <div class="topLogo">
          <img class="img-responsive center glow" src="../img/logo.png" alt="logo">
      </div>
      <div class="navigation">
        <nav class="navbar navbar-custom">
          <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-rand" href="#">Glambydebbie</a>
              </div>
              <ul class="nav navbar-nav">
                  <li class="active"><a href="">Home</a></li>
                  <li><a href="">Booking</a></li>
                  <li><a href="touch.html">Our Touch</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              </ul>
            </div>
        </nav>
      </div>
      </header>
      <div class="container">
  <h2>Bookings</h2>
  <p>You can filter the table</p>                                                                                      
  <div class="table-responsive">
  <input class="form-control" id="myInput" type="text" placeholder="Search..">          
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Description</th>
        <th>Date Booking made</th>
        <th>Date Booked</th>
      </tr>
    </thead>
    <tbody id="myTable">

<?php include '../server/DB.php'; ?>
<?php
    $offset = 1; 
    $sql = "SELECT * FROM booking WHERE id >= '$offset' ORDER BY id DESC LIMIT 10";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        
?>
  
      <tr>
        <td><?php echo $row["id"];?></td>
        <td><?php echo $row["firstname"]; ?></td>
        <td><?php echo $row["lastname"]; ?></td>
        <td><?php echo $row["contact_address"]; ?></td>
        <td><?php echo $row["phone"]; ?></td>
        <td><?php echo $row["booking"]; ?></td>
        <td><?php echo $row["date_booking_made"]; ?></td>
        <td><?php echo $row["date_booked"]; ?></td>
      </tr>
  
<?php
        
      }
    } else {
      echo "0 results";
    }
    $conn->close();    

?>

</tbody>
  </table>
  </div>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
  </html>
