<?php
//requires database library
require_once 'db.php';
//require_once 'db2.php';

//SQL query
$query = "
    SELECT *
    FROM `job_positions`
    WHERE `id`=?
    ";

$statement = db::query($query, [$_GET['id']]);
$data = $statement->fetchAll();
 
//creates an array of the job locations
$locations = explode(', ', $data[0]['location']);

/*
$stmt = $db ->prepare('SELECT * FROM products');
$stmt ->execute();
$data = $stmt ->fetchAll();

var_dump($data);

$db = db_connect($dbhost, $dbuser, $dbpassword);
if($_POST) {
    //store data in $data for check
    foreach ($_POST as $key => $value) {
    $data[$key]=$value;
    };
    
    //basic name validation
    $formFirstNameCheck = $_POST['formFirstName'];
    if(empty($formFirstNameCheck)) {
    die('please fill Your First Name');
    }

    $formLastNameCheck = $_POST['formLastName'];
    if(empty($formLastNameCheck)) {
    die('please fill Your Last Name');
    }

    //email validation
    $formEmailCheck = $_POST['formEmail'];
    if(empty($formEmailCheck)) {
    die('please fill Your Email Address');
    }
    //phone validation
    $formPhoneCheck = $_POST['formPhone'];
    if(empty($formPhoneCheck)) {
    die('please fill Your Phone Number');
    }

    $formWhyYouCheck = $_POST['formWhyYou'];
    if(empty($formWhyYouCheck)) {
    die('please Tell us why you are the best candidate for this job');
    }
    
    // data to server
    $stmt = $db->prepare('INSERT INTO applications (formFirstName, formLastName, formEmail, formPhone, formLinkedIn, formWhyYou) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt -> execute([$_POST['formFirstName'], $_POST['formLastName'], $_POST['formEmail'], $_POST['formPhone'], $_POST['formLinkedIn'], $_POST['formWhyYou'],]);
    header ('Location: jobDetail.php?status=ok');
    
    
    // gives a feedback to the user
    
    exit;
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $data[0]['title'] ?></title>
</head>
<body>
  <h1> <?php echo $data[0]['title']?> </h1>  
  <h4> <?php echo $data[0]['location']?> </h4>

  <div class="content">

    <?php echo $data[0]['content']?>

  </div>

  <div class="apply">

<form id="form1" action="thankYou.php" method="post">
<input name="jobId" type"text" id="jobId" value="<?php echo $data[0]['id'] ?>">

<input name="formFirstName" type="text" id="formFirstName"   required>

<input name="formLastName" type="text" id="formLastName" required>

<input name="formEmail" type="email" id="formEmail" required>

<input name="formPhone" type="tel" id="formPhone" required>

<input name="formLinkedIn" type="text" id="formLinkedIn" placeholder="Optional but recommended">

<textarea name="formWhyYou" id="formWhyYou" placeholder="Tell us why you are the best candidate for this job. Be concise, please." required>
</textarea>

<select name="formLocation" id="formLocation"> 
    <?php foreach ($locations as $value) {
        //generates locations options list
        echo '<option value="'.$value.'">'.$value.'</option>'; 
    }
    ?>     
</select> 

<div name="dropZone" id="dropZone" >
  <strong>Drag one or more files to this Drop Zone ...</strong>
</div>



</form>
<button type="submit" form="form1" value="Submit">Apply for this job</button>
  </div>


</body>
</html>

