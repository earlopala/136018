<?php
require_once 'connection.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
}else{
  $filter = $_SESSION['username'];
  $query=mysqli_query($conn,"SELECT * FROM `users` WHERE `User_ID`='$filter'")or die(mysqli_error());
  $row=mysqli_fetch_array($query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cholera Diagnostics System - User Homepage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

        <style type="text/css">
        
          table{
    align-items: center;
  }

   th, tr, td{
    padding: 10px 10px;
  }
    </style>

            <script type="text/javascript">
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})  
</script>

            <script type="text/javascript">
function printData1()
{
   var divToPrint=document.getElementById("printTable1");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData1();
})  
</script>

            <script type="text/javascript">
function printData2()
{
   var divToPrint=document.getElementById("printTable2");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData2();
})  
</script>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="index1.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Cholera Diagnostics</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index1.php" class="nav-item nav-link active">Home</a>
                <a href="#data" class="nav-item nav-link">Data Records</a>
                <a href="#my" class="nav-item nav-link">My Module</a>
                <a href="#contact" class="nav-item nav-link">Contact Us</a>
            </div>
            <a href="logout.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Logout<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid header bg-primary p-0 mb-5">
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white mb-5">Welcome <?php echo $row['User_Type']; ?>, <?php echo $row['Fullname']; ?>!</h1>
                <div class="row g-4">
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <p class="text-light mb-0">Join Us in the Fight</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <p class="text-light mb-0">Stay Informed, Stay Safe</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <p class="text-light mb-0">A Safer Tomorrow Starts Here</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="img/h1.jpg" alt="">
                        <div class="owl-carousel-text">
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="img/h2.jpg" alt="">
                        <div class="owl-carousel-text">
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="img/h3.jpg" alt="">
                        <div class="owl-carousel-text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Data Records Start -->
    <div class="container-xxl py-5" id="data">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Data Records</p>
                    <h1 class="mb-4">My Details</h1>
                         <table id="printTable">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Fullname</th>
  <th style="text-align: left;
  padding: 8px;">Email Address</th>
 <th style="text-align: left;
  padding: 8px;">Phone Number</th>
  <th style="text-align: left;
  padding: 8px;">User Type</th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "cholera");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Fullname`, `Phone_Number`, `Email_Address`, `User_Type` FROM `users` WHERE `User_ID` = '$filter'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Fullname"]); ?></td>
<td><?php echo($row["Email_Address"]); ?></td>
<td><?php echo($row["Phone_Number"]); ?></td>
<td><?php echo($row["User_Type"]); ?></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" onclick="printData();">Print</a>
                </div>
                                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">List of Symptoms</h1>
                         <table id="printTable1">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Symptom ID</th>
<th style="text-align: left;
  padding: 8px;">User ID</th>
  <th style="text-align: left;
  padding: 8px;">Details</th>
 <th style="text-align: left;
  padding: 8px;">Status</th>
  <th style="text-align: left;
  padding: 8px;">Created At</th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "cholera");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Symptom_ID`, `User_ID`, `Details`, `Status`, `Created_At` FROM `symptoms` WHERE `User_ID` = '$filter'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Symptom_ID"]); ?></td>
<td><?php echo($row["User_ID"]); ?></td>
<td><?php echo($row["Details"]); ?></td>
<td><?php echo($row["Status"]); ?></td>
<td><?php echo($row["Created_At"]); ?></td>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to delete this symptom (as well as diagnostic record)?')?window.location.href='actions.php?action=deleteSD&id=<?php echo($row["Symptom_ID"]); ?>':true;" title='Delete Symptom & Diagnostic'>Delete</button></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" onclick="printData1();">Print</a>
                </div>
                                                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">List of Diagnostics</h1>
                         <table id="printTable">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Diagnostic ID</th>
<th style="text-align: left;
  padding: 8px;">Symptom ID</th>
  <th style="text-align: left;
  padding: 8px;">Results</th>
  <th style="text-align: left;
  padding: 8px;">Created At</th>
   <th style="text-align: left; padding: 8px;"></th>
   <th style="text-align: left; padding: 8px;"></th>   
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "cholera");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Diagnostic_ID`, `Symptom_ID`, `Results`, `File`, `Created_At` FROM `diagnostic` WHERE `User_ID` = '$filter'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Diagnostic_ID"]); ?></td>
<td><?php echo($row["Symptom_ID"]); ?></td>
<td><?php echo($row["Results"]); ?></td>
<td><?php echo($row["Created_At"]); ?></td>
<td><a href="img/<?php echo($row["File"]); ?>" download title="Diagnosis File">DIAGNOSIS FILE</a></td>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" onclick="printData();">Print</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Records End -->


    <!-- My Module Start -->
    <div class="container-xxl py-5" id="my">
        <div class="container">
            <div class="row g-5">
                              <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                                          <p class="d-inline-block border rounded-pill py-1 px-4">My Module</p>
                    <h1 class="mb-4">Update My Details & Receive Diagnosis</h1>                                
                    <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                      <p>Click <a class="" href="index1_symptom.php">HERE</a> to key in your symptoms and receive a diagnosis and any details that will help you to win the fight against cholera.</p>
                    </div>
                  </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                        <form action="actions.php" method="POST">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                  <input type="hidden" value="<?php echo $filter; ?>" required name="uid">
                                  <input type="hidden" value="2" name="mod" required>
                                    <input type="text" name="fname" required class="form-control border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" required class="form-control border-0" placeholder="Your Email Address" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="phone" required class="form-control border-0" placeholder="Your Phone Number" style="height: 55px;">
                                </div> 
                                                                <div class="col-12 col-sm-6">
                                    <input type="password" name="password" required class="form-control border-0" placeholder="Your Password" style="height: 55px;">
                                </div>
                                                                <div class="col-12 col-sm-6">
                                    <input type="password" name="cpassword" required class="form-control border-0" placeholder="Confirm Your Password" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="upu" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                                                                                                  <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
        </div>
    </div>
    <!-- My Module End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h5 class="text-light mb-4">Contact Us</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Nairobi, Kenya.</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+254 701 234567</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>cholera_diagnostics@gmail.com</p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="#data">Data Records</a>
                    <a class="btn btn-link" href="#contact">Contact Us</a>
                    <a class="btn btn-link" href="#my">My Module</a>
                    <a class="btn btn-link" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Cholera Diagnostics</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Javascript -->
    <script src="js/main.js"></script>
</body>

</html>