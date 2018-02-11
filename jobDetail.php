<?php

//require database library
require_once 'db.php';

//SQL query
$query = "
    SELECT *
    FROM `job_positions`
    WHERE `id`=?
    ";

$statement = db::query($query, [$_GET['id']]);
$data = $statement->fetchAll();
 


//var_dump($data);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <h1> <?php echo $data[0]['title']?> </h1>
  <h4> <?php echo $data[0]['location']?> </h4>

  <div class="content">

<?php echo $data[0]['content']?>

  </div>

  <div class="apply">

<form action="" method="post">

<input name="formFirstName" type="text" id="formFirstName" required>

<input name="formLastName" type="text" id="formLastName" required>

<input name="formEmail" type="email" id="formEmail" required>

<input name="formPhone" type="tel" id="formPhone" required>

<input name="formLinkedIn" type="text" id="formLinkedIn" placeholder="Optional but recommended">

<textarea name="formWhyYou" id="formWhyYou" placeholder="Tell us why you are the best candidate for this job. Be concise, please." required>
</textarea>

<select name="formLocation" id="formLocation"> 
    <option value="Prague">Prague</option>
    <option value="Sofia"> Sofia</option> 
</select> 

<div name="dropZone" id="dropZone" >
  <strong>Drag one or more files to this Drop Zone ...</strong>
</div>


</form>

  </div>

</body>
</html>