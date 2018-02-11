<?php

//require database library
require_once 'db.php';

//SQL query
$query = "
    SELECT `title`, `slug`, `id`
    FROM `job_positions`
    WHERE `is_active`= 1
    ";

//run the query
$statement = db::query($query);

//fetch the results
$data = $statement->fetchAll();
 
//var_dump($data);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Jobs</title>
    </head>

    <body>


        <h1>Jobs</h1>

        <div class="listOfJobs">
            <ul>
                <?php 
                        foreach($data as $x => $x_value) {
                        echo '<li>'.'<a href="jobDetail.php?id='.$data[$x]['id'].'">'.$data[$x]['title'].'</a>'.'</li>';   
                        
                        }
                ?>


            </ul>

        </div>


    </body>

    </html>