<?php


require 'db_personal.php';
/* Attempt MySQL server connection.*/
try{
    $pdo = new PDO($dbhost, $dbuser, $dbpassword);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt insert query execution
try{
    // create prepared statement
    $sql = "INSERT INTO applications (jobId, formFirstName, formLastName, formEmail, formPhone, formLinkedIn, formWhyYou, formLocation) VALUES (:jobId, :formFirstName, :formLastName, :formEmail, :formPhone, :formLinkedIn, :formWhyYou, :formLocation)";
    $stmt = $pdo->prepare($sql);
    
    // bind parameters to statement
    $stmt->bindParam(':jobId', $_REQUEST['jobId']);
    $stmt->bindParam(':formFirstName', $_REQUEST['formFirstName']);
    $stmt->bindParam(':formLastName', $_REQUEST['formLastName']);
    $stmt->bindParam(':formEmail', $_REQUEST['formEmail']);
    $stmt->bindParam(':formPhone', $_REQUEST['formPhone']);
    $stmt->bindParam(':formLinkedIn', $_REQUEST['formLinkedIn']);
    $stmt->bindParam(':formWhyYou', $_REQUEST['formWhyYou']);
    $stmt->bindParam(':formLocation', $_REQUEST['formLocation']);
    
    // execute the prepared statement
    $stmt->execute();
    echo '<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <!-- Bootstrap core CSS -->
         <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/scrolling-nav.css" rel="stylesheet">

        <title>Thank you</title>
    </head>

    <body id="page-top">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">New Tech Company</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Available positions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Our Vision</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">About us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

 <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Thank you for your application</h1>
        <p class="lead">We will contact you shortly</p>
      </div>
    </header>



        <section id="services" class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Our Vision</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>About us</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">&copy; New Tech Company 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

        


    </body>

    </html>';
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>



