<html>
<head>
<!-- Load c3.css -->
<link href="https://rawgit.com/masayuki0812/c3/master/c3.min.css" rel="stylesheet" type="text/css">

<!-- Load d3.js and c3.js -->
<script src="https://rawgit.com/mbostock/d3/master/d3.min.js" charset="utf-8"></script>
<script src="https://rawgit.com/masayuki0812/c3/master/c3.min.js"></script>
</head>
<body>
<?php
// Create connection
$conn = new mysqli("localhost", "root", "raspberry", "measurements");
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ttime, temperature, humidity FROM measurements WHERE ttime > NOW() - INTERVAL 1 HOUR;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<br> Time: ". $row["ttime"]. " - Temperature: ". $row["temperature"]. " " . $row["humidity"] . "<br>";
     }
} else {
     echo "0 results";
}

$conn->close();
?>
<div id="chart"></div>


  <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">Temperature Monitor</a>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="page-header">
        <div class="row">
          <div class="col-lg-6">
      </div>
          </div>
          <div class="col-lg-6">
        </div>
      </div>



    <div class="main" id="content">
      <div class="col-lg-4">
      </div>
      <div class="col-lg-4">
          <h3 style="text-align:center">Last Reading</h3>
        <table class="table table-striped table-hover">
          <tr class="">
            <th>Time</th>
            <th>Temp</th>
            </tr>
        <?php while( $row = $result2->fetch(PDO::FETCH_ASSOC) ) { ?>
          <tr class="">
            <td><?php echo $row['datetime']; ?></td>
            <td><?php echo $row['temp']; ?></td>
            </tr>
            <?php } ?>
        </table>
      </div>
      <div class="col-lg-4">
      </div>
    </div>
   </div>

   <div class="container">
    <div id="chart_div" style="width:100%"></div>
   </div>

   <div class="container">
      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Made by <a href="https://www.alejandrogermany.wordpress.com" rel="nofollow">Alex Gomez</a>.  Contact<a href="mailto:">Here</a>.</p>
          </div>
        </div>
      </footer>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

</body>
</html>