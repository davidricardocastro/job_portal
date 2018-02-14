<?php

require 'db_personal.php';
require 'db.php';

$db = db_connect($dbhost, $dbuser, $dbpassword);

$stmt = $db ->prepare("SELECT * FROM `job_positions` WHERE `id`='".$_GET['id']."'");
$stmt ->execute();
$data = $stmt ->fetchAll();

//creates an array with the job locations
$locations = explode(', ', $data[0]['location']);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="js/dropzone.js"></script>
        <link href="css/dropzone.css" type="text/css" rel="stylesheet" />
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/scrolling-nav.css" rel="stylesheet">

        <title>
            <?php echo $data[0]['title'] ?>
        </title>
    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">New Tech Company</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#about">Job description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#services">Apply</a>
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
                <h1>
                    <?php echo $data[0]['title'] //job title ?> </h1>
                <p class="lead">
                    <?php echo $data[0]['location'] //job locations ?>
                </p>
            </div>
        </header>

        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto content">
                        <?php echo $data[0]['content'] //job description ?>
                    </div>
                </div>
            </div>

        </section>

        <section id="services" class="bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">

                        <h2>Join us</h2>

                        <div class="apply">

                            <form id="form1" action="thankYou.php" method="post" enctype="multipart/form-data">

                                <input name="jobId" type "text" id="jobId" hidden value="<?php echo $data[0]['id'] /*for adding job id to application*/ ?>">

                                <div class="form-group">
                                    <label for="formFirstName">First Name</label>
                                    <input name="formFirstName" class="form-control" type="text" id="formFirstName" required>
                                </div>

                                <div class="form-group">
                                    <label for="formLastName">Last Name</label>
                                    <input name="formLastName" class="form-control" type="text" id="formLastName" required>
                                </div>

                                <div class="form-group">
                                    <label for="formEmail">Email</label>
                                    <input name="formEmail" class="form-control" type="email" id="formEmail" required>
                                </div>

                                <div class="form-group">
                                    <label for="formPhone">Phone</label>
                                    <input name="formPhone" class="form-control" type="tel" id="formPhone" required>
                                </div>

                                <div class="form-group">
                                    <label for="formLinkedIn">LinkedIn</label>
                                    <input name="formLinkedIn" class="form-control" type="text" id="formLinkedIn" placeholder="Optional but recommended">
                                </div>

                                <div class="form-group">
                                    <label for="formWhyYou">Why You?</label>
                                    <textarea name="formWhyYou" class="form-control" rows="6" id="formWhyYou" placeholder="Tell us why you are the best candidate for this job. Be concise, please."
                                        required>
                                    </textarea>
                                </div>

                                <!-- Location input -->
                                <?php   
                                if (count($locations) == 1){ //if only one location, display hidden
                                        echo ' <div class="form-group" hidden>
                                            <label for="formLocation">Location</label>
                                            <select name="formLocation" class="form-control"  id="formLocation">';                                    
                                        foreach ($locations as $value) {
                                        //generates locations options list
                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                    };
                                        echo ' </select>
                                            </div>';
                                }
                                
                                else{                               
                                
                                        echo ' <div class="form-group">
                                            <label for="formLocation">Location</label>
                                            <select name="formLocation" class="form-control" id="formLocation">';
                               
                                        foreach ($locations as $value) {
                                            //generates locations options list
                                        echo '<option value="'.$value.'">'.$value.'</option>'; 
                                            };

                                        echo ' </select>
                                            </div>';
                                        }
                                ?>
                                   

                                <div class="form-group">
                                    <div id="myDropzone" class="dropzone">
                                        <div class="dz-default dz-message">
                                            <b>Your CV, portfolio, etc.</b>
                                            <br> Select files or drop them right here. Max. 5 MB per file
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <button type="submit" class="btn btn-primary" form="form1" value="Submit">Apply for this job</button>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2>About us</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident
                            officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem,
                            in, quo totam.</p>
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


        <script>
            //dropzone
            var myDropzone = new Dropzone("div#myDropzone", { url: "upload.php", acceptedFiles: '.jpg,.doc,.pdf' });
        </script>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom JavaScript for this theme -->
        <script src="js/scrolling-nav.js"></script>

        <script>
            //adds the class lead to first <p> element when retrieved from db
            $('.content').find('p:first').addClass('lead')
        </script>

    </body>
    </html>