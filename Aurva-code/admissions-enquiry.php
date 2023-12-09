<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aurva The Complete School - OXFORD curriculum from Nursery to Grade VII">
  <meta name="author" content="Srinidhi">
  <meta property="og:locale" content="en_US"/>
  <meta property="og:type" content="website"/>
  <meta property="og:title" content="AURVA - The Complete School | In Promoting Personal Excellence | Boduppal, Hyderabad"/>
  <meta property="og:description" content="Aurva The Complete School - OXFORD curriculum from Nursery to Grade VII"/>
  <meta property="og:url" content="https://www.aurva.school"/>
  <meta property="og:site_name" content="Aurva"/>
  <title>AURVA - The Complete School | In Promoting Personal Excellence</title>
 
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Custom styles for this template -->
  <link href="css/aurva.css" rel="stylesheet">


</head>

<body>   

  <div class="bg-dark">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="header-top-menu">
              
                
                  <a href="tel:7702113909"> <i class="fa fa-phone rotate-90"></i> +91-7702113909</a> &nbsp;&nbsp;
                  
                  <a href="mailto:admissions@aurva.school">
                    <i class="fa fa-envelope"></i>&nbsp;admissions@aurva.school</a>
									
							</div>
						</div>
	
					</div>
				</div>
			</div> 
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">

    <div class="container-fluid">
    
    <div class="row">  <a class="navbar-brand" href="index.html"><img src="assets/images/aurva-logo.png" class="school-logo"></a></div>
    

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
         <ul class="navbar-nav ml-auto">
        
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Admissions
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="admissions-enquiry.html">Admissions Enquiry</a>
              </div>
            </li>

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Explore Aurva
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="portfolio-1-col.html">Salient Features</a>
                <a class="dropdown-item" href="portfolio-2-col.html">For Pre-Primary Kids</a>
              </div>
            </li>

  

          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
        
     
        
        </ul>
       
      </div>
    </div>
    
  </nav>
  
 
 

<?php

$serverName = "mssql.aurva.school\MSSQLSERVER2017"; 
$connectionInfo = array( "Database"=>"cmdetzut_aurva-w01", "UID"=>"aurva_sql_user01", "PWD"=>"Tu4&n01v");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

$sql = "INSERT INTO adm_enquiry_web (full_name_student, birth_date, studying_class, applying_class, mother_name, mother_edu_qual, father_name, father_edu_qual, primary_contact_tel, previous_school, t_address, ip_address, ref_source) VALUES (?, ?, ?, ?, ?, ?,?, ?,? ,?,?,?,?)";
$params = array($_POST['full_name_student'], $_POST['birth_date'], $_POST['studying_class'], $_POST['applying_class'], $_POST['mother_name'], $_POST['mother_edu_qual'], $_POST['father_name'], $_POST['father_edu_qual'], $_POST['primary_contact_tel'], $_POST['previous_school'], $_POST['t_address'], $_SERVER['REMOTE_ADDR'],$_POST['ref_source']);

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
?>

<?php
	
	  function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
	
$to      = 'admissions@aurva.school';
$subject = 'Admissions Enquiry -'.$_POST["full_name_student"];
$message = 'A new Admission Enquiry has been submitted. The details are below:\n';
	
$headers = "From:admissions@aurva.school\r\n";
$headers .= "Reply-To:admissions@aurva.school\r\n";
$headers .= "X-Mailer: PHP/".phpversion();

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= 'Return-Path:admissions@aurva.school' . "\r\n";

$message = "<html><body style='font-family:Arial'>";
$message .= "<table rules='all' style='border-color: #666;' cellpadding='10'>";
$message .= "<tr style='background: #eee;'>"."<td colspan='2'>A new Admission Enquiry has been submitted. The details are below:" . "</td></tr>";
$message .= "<tr><td><strong>Full Name of Student:</strong> </td><td>" .$_POST["full_name_student"]. "</td></tr>";
$message .= "<tr><td><strong>Date of Birth:</strong> </td><td>" .$_POST["birth_date"]. "</td></tr>";
$message .= "<tr><td><strong>Studying Class:</strong> </td><td>" .$_POST["studying_class"]. "</td></tr>";
$message .= "<tr><td><strong>Applying Class:</strong> </td><td>" .$_POST["applying_class"]. "</td></tr>";
$message .= "<tr><td><strong>Mother Name:</strong> </td><td>" .$_POST["mother_name"]. "</td></tr>";
$message .= "<tr><td><strong>Qualification:</strong> </td><td>" .$_POST["mother_edu_qual"]. "</td></tr>";
$message .= "<tr><td><strong>Father Name:</strong> </td><td>" .$_POST["father_name"]. "</td></tr>";
$message .= "<tr><td><strong>Qualification:</strong> </td><td>" .$_POST["father_edu_qual"]. "</td></tr>";
$message .= "<tr><td><strong>Primary Contact:</strong> </td><td>" .$_POST["primary_contact_tel"]. "</td></tr>";
$message .= "<tr><td><strong>Previous School:</strong> </td><td>" .$_POST["previous_school"]. "</td></tr>";
$message .= "<tr><td><strong>Mailing Address:</strong> </td><td>" .$_POST["t_address"]. "</td></tr>";


  
mail($to, $subject, $message, $headers);

?>


<div class="jumbotron" style="background: radial-gradient(circle, rgba(107,65,170,1) 0%, rgba(0,134,172,1) 100%);;margin:0px;border-radius:0px;">

    

<div class="container col-lg-12">
  <h1 class="txt-yellow text-center">ADMISSIONS ENQUIRY</h1>
<h5 class="txt-yellow text-center">Admissions for 2020-21</h5>

</div>
</div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">

  <div class="card-body">
    <h5 class="card-title text-center">Confirmation</h5>
    <p class="card-text text-center">Thank you for your intrest in Aurva School. Your details have been saved.</p>
  <p class="text-center"><a class="btn btn-primary btn-sm" href="index.html" role="button">&nbsp;&nbsp;OK&nbsp;&nbsp;</a></p>
  </div>


 </div>
 </div>
  </div>


  <!-- /.container -->

<footer class="footer-area bg-dark">
  <div class="footer-top-wrap pt-50">
    <div class="container">
      <div class="row">
       <!-- <div class="col-lg-4 col-sm-6">
         <div class="footer-widget mb-20">
            <div class="fw-logo mb-15">
              <a href="index"><img src="assets/images/logo-footer.png" alt="Logo" width="200px"></a>
            </div>
            <div class="footer-text">
              <p>Text
              </p>
            </div>
          </div> 
        </div> -->
        <div class="col-lg-4 col-sm-6 ">
          <div class="footer-widget mb-20">
            <div class="fw-title mb-20">
              <h4>Useful Links</h4>
            </div>
            <div class="fw-link">
              <ul>
                <li><a href="index.html"><i class="fas fa-angle-right"></i> Home</a></li>
                <li><a href="aboutus"><i class="fas fa-angle-right"></i> About Us</a></li>
                <li><a href="careers.html"><i class="fas fa-angle-right"></i> Careers</a></li>
                <li><a href="contact.html"><i class="fas fa-angle-right"></i> Contact Us</a></li>
                <li><a href="#"><i class="fas fa-angle-right"></i> Make an Enquiry</a></li>
              </ul>
            </div>
          </div>
        </div>
     
        <div class="col-lg-4 col-sm-6 pr-40">
          <div class="footer-widget mb-20">
            <div class="fw-title mb-20">
              <h4>Contact Us</h4>
            </div>
            <div class="fw-contact">
              <ul>
                <li>  <a href="https://wa.me/917702113909"> <i class="fa fa-whatsapp" aria-hidden="true"></i> +91-7702113909</a> &nbsp;&nbsp;</a></li>
                <li><a href="tel:7702113909"><i class="fas fa-phone rotate-90"></i>  +91-7702113909</a></li>
                <li><a href="mailto:admissions@aurva.school"><i class="far fa-envelope"></i>  admissions@aurva.school</a></li>
                     
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="copyright-wrap">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <div class="copyright-text">
            <p>&copy; 2020 Aurva The Complete School - All Rights Reserved</p>
          </div>
        </div>
     <!----   <div class="col-md-4">
          <div class="copyright-social text-center text-md-right">
            <ul>
              <li><a href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
              <li><a href="https://instagram.com//"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</footer>


 

  <!-- Bootstrap core JavaScript -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/82acb0bd38.js" crossorigin="anonymous"></script>


</body>

</html>
