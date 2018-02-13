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
    echo "<h1>Thank you for your application</h1>";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>