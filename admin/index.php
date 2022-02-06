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
      <div class="table-responsive">
      <h2>Bookings</h2>
  <p>You can filter the table</p>                                                                                      

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
  //define total number of results you want per page  
  $results_per_page = 5;  
  //find the total number of results stored in the database  
  $sql_all = "SELECT * FROM booking";  
  $result_all = $conn->query($sql_all);
  $number_of_result = $result_all->num_rows;
  //determine the total number of pages available  
  $number_of_page = ceil ($number_of_result / $results_per_page);  
   //determine which page number visitor is currently on 
  if (!isset ($_GET['page']) ) {  
      $page = 1;  
  } else {  
      $page = $_GET['page'];  
  }
  //determine the sql LIMIT starting number for the results on the displaying page  
  $page_first_result = ($page-1) * $results_per_page; 
  //retrieve the selected results from database 
    $sql = "SELECT *FROM booking ORDER BY id LIMIT " . $page_first_result . ',' . $results_per_page;
    //$sql = 'SELECT * FROM booking ORDER BY id DESC LIMIT.'$page_first_result.','.$results_per_page;
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
      //display the link of the pages in URL  
    for($page = 1; $page<= $number_of_page; $page++) {  
?>
      
        <ul class="pagination">
          <li><a href="index.php?page=<?php echo $page;?>"><?php echo $page;?></a></li>
        </ul>
    
<?php
      
  }  
    } else {
      echo "0 results";
    }
    $conn->close();    

?>

</tbody>
  </table>
  <?php
    if(isset($_GET['export']) && $_GET['export'] == current_page){
      if($sql == true){
        header("Content-Type:application/xls");
        header("Content-Disposition:attachment, filename=download.xls");
      }
    }elseif(isset($_GET['export']) && $_GET['export'] == all_page){
      if($sql_all == true){
        header("Content-Type:application/xls");
        header("Content-Disposition:attachment, filename=download.xls");
      }
    }
  ?>
    <form action="index.php?export=current_page" method="post" style="float: left;">
        <input type="submit" name="export" value="Export Current page To Excel" class="btn-primary" style="border-radius:5px; padding:5px 15px; background:green;">
     </form>
     
     <form action="index.php?export=all_page" method="post">
        <input type="submit" name="export" value="Export All page To Excel" class="btn-primary" style="border-radius:5px; padding:5px 15px; background:green;">
     </form>
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
