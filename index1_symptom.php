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
    <title>Cholera Diagnostics System - Give Symptoms & Receive Diagnosis Page</title>
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

<script type="text/javascript">

  var d1 = document.getElementById("div1");
  var d2 = document.getElementById("div2");
  var d3 = document.getElementById("div3");
  var ld = document.getElementById("ldiv");  
  var mod = document.getElementById("md");

    function hideextradivs(){
    div2.style.display = "none";
    div3.style.display = "none";
    ldiv.style.display = "none";
}

  function proceedtodiv2(){
  	md.value = "2";
    div2.style.display = "block";
    div1.style.display = "none";
}

  function proceedtodiv3(){
  	md.value = "3";
    div3.style.display = "block";
    div2.style.display = "none";
}

  function proceedtolastdiv(){
  	div1.style.display = "none";
    div2.style.display = "none";
    div3.style.display = "none";
    ldiv.style.display = "block";
}

  function proceedtolastdiv1(){
  	md.value = "4";
  	div1.style.display = "none";
    div2.style.display = "none";
    div3.style.display = "none";
    ldiv.style.display = "block";
}

  function backtodiv1(){
  	md.value = "1";
    div1.style.display = "block";
    div2.style.display = "none";
}

  function backtodiv2(){
  	md.value = "2";
    div2.style.display = "block";
    div3.style.display = "none";
}


</script>

<body onload="hideextradivs();">
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
                <a href="index1.php" class="nav-item nav-link">Data Records</a>
                <a href="index1.php" class="nav-item nav-link">My Module</a>
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


    <!-- My Module Start -->
    <div class="container-xxl py-5" id="my">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">My Module</p>
                    <h1 class="mb-4">Key in your Symptoms & get your Diagnosis</h1>
                                        <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                        <form action="actions.php" method="POST">
                            <div class="row g-3">
                            	<input type="hidden" value="1" name="mod" id="md" required>
                            	<div id="div1">
                                <div class="col-12 col-sm-6">
                                	
     <label>1. Are you experiencing any of these severe dehydration symptoms (if none click "No")?</label>
     <br>
     <br>
     <input type="checkbox" name="S[]" value="Rapid heart rate"> - Rapid heart rate
     <br>
     <br>
     <input type="checkbox" name="S[]" value="Sunken eyes"> - Sunken eyes
     <br>
     <br>
     <input type="checkbox" name="S[]" value="Dry mouth and skin"> - Dry mouth and skin 
     <br>
     <br>
     <input type="checkbox" name="S[]" value="Rapid breathing"> - Rapid breathing
     <br>
     <br>     
     <input type="checkbox" name="S[]" value="Low blood pressure"> - Low blood pressure
     <br>
     <br>  
                                </div>
                                <div class="col-6">
									<a class="btn btn-primary rounded-pill py-3 px-5 mt-3" onclick="proceedtolastdiv();">Yes</a>
                                    <br>
                                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" onclick="proceedtodiv2();">No</a>
                                </div>
                            </div>
                                                        	<div id="div2">
                                <div class="col-12 col-sm-6">
     <label>2. Are you experiencing any of these moderate symptoms (if none click "No")?</label>
     <br>
     <br>
     <input type="checkbox" name="Mo[]" value="Frequent watery diarrhea"> - Frequent watery diarrhea
     <br>
     <br>
     <input type="checkbox" name="Mo[]" value="Vomiting"> - Vomiting
     <br>
     <br>
     <input type="checkbox" name="Mo[]" value="Leg cramps"> - Leg cramps
     <br>
     <br>
     <input type="checkbox" name="Mo[]" value="Lethargy"> - Lethargy
     <br>
     <br>     
     <input type="checkbox" name="Mo[]" value="Decreased urine output"> - Decreased urine output
     <br>
     <br>  
                                </div>
                                <div class="col-6">
									<a class="btn btn-primary rounded-pill py-3 px-5 mt-3" onclick="proceedtolastdiv();">Yes</a>
                                    <br>
                                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" onclick="proceedtodiv3();">No</a>
                                    <br>
                                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" onclick="backtodiv1();">Back</a>
                                </div>
                            </div>
                                                        	<div id="div3">
                                <div class="col-12 col-sm-6">
     <label>3. Are you experiencing any of these mild symptoms (if none click "No")?</label>
     <br>
     <br>
     <input type="checkbox" name="Mi[]" value="Occasional diarrhea"> - Occasional diarrhea
     <br>
     <br>
     <input type="checkbox" name="Mi[]" value="Some abdominal discomfort"> - Some abdominal discomfort
     <br>
     <br>
     <input type="checkbox" name="Mi[]" value="No signs of dehydration"> - No signs of dehydration
     <br>
     <br>  
                                </div>
                                <div class="col-6">
									<a class="btn btn-primary rounded-pill py-3 px-5 mt-3" onclick="proceedtolastdiv();">Yes</a>
                                    <br>
                                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" onclick="proceedtolastdiv1();">No</a>
                                    <br>
                                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" onclick="backtodiv2();">Back</a>
                                </div>
                            </div>
                                                                                    	<div id="ldiv">
                                <div class="col-12 col-sm-6">
     <label>4. Have you traveled to or lived in an area with a recent cholera outbreak (if none type "None")?</label>
     <br>
     <br>
                                     <div class="col-12">
                                    <textarea class="form-control border-0" rows="5" placeholder="Describe the area..." required name="loc"></textarea>
                                </div>
     <br>
     <br>
          <label>5. Do you have a history of drinking untreated or contaminated water (if no type "No")?</label>
     <br>
     <br>
                                    <div class="col-12">
                                    <textarea class="form-control border-0" rows="5" placeholder="Describe your history..." required name="history"></textarea>
                                </div>
     <br>
     <br>  
                                </div>
                                <div class="col-12">
									<button class="btn btn-primary w-100 py-3" name="adds" type="submit">Submit</button>
                                </div>
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