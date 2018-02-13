<?php
//requires database library
require_once 'db.php';


//SQL query
$query = "
    SELECT *
    FROM `job_positions`
    WHERE `id`=?
    ";

$statement = db::query($query, [$_GET['id']]);
$data = $statement->fetchAll();
 
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

        <title>
            <?php echo $data[0]['title'] ?>
        </title>
    </head>

    <body>

        <h1>
            <?php echo $data[0]['title'] //job title ?> </h1>
        <h4>
            <?php echo $data[0]['location'] //job locations ?> </h4>

        <div class="content">
            <?php echo $data[0]['content'] //job description ?>
        </div>

        <div class="apply">

            <form id="form1" action="thankYou.php" method="post" enctype="multipart/form-data">

                <input name="jobId" type "text" id="jobId" hidden value="<?php echo $data[0]['id'] /*for adding job id to application*/ ?>">

                <label for="formFirstName">First Name</label>
                <input name="formFirstName" type="text" id="formFirstName" required>

                <label for="formLastName">Last Name</label>
                <input name="formLastName" type="text" id="formLastName" required>

                <label for="formEmail">Email</label>
                <input name="formEmail" type="email" id="formEmail" required>

                <label for="formPhone">Phone</label>
                <input name="formPhone" type="tel" id="formPhone" required>

                <label for="formLinkedIn">LinkedIn</label>
                <input name="formLinkedIn" type="text" id="formLinkedIn" placeholder="Optional but recommended">

                <label for="formWhyYou">Why You?</label>
                <textarea name="formWhyYou" id="formWhyYou" placeholder="Tell us why you are the best candidate for this job. Be concise, please."
                    required>
                </textarea>

                <label for="formLocation">Location</label>
                <select name="formLocation" id="formLocation">
                    <?php foreach ($locations as $value) {
        //generates locations options list
                         echo '<option value="'.$value.'">'.$value.'</option>'; 
                        }
                        ?>
                </select>


                <div id="myDropzone" class="dropzone">
                    <div class="dz-default dz-message"><b>Your CV, portfolio, etc.</b>
                        Select files or drop them right here.
                        Max. 5 MB per file  
                    </div>
                </div>

            </form>
            <button type="submit" form="form1" value="Submit">Apply for this job</button>
        </div>




        <script>
            var myDropzone = new Dropzone("div#myDropzone", { url: "upload.php", acceptedFiles: '.jpg,.doc,.pdf' });


        </script>

    </body>

    </html>