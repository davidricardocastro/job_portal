<?php

require 'db_personal.php';

function db_connect($dbhost, $dbuser, $dbpassword)
{
    $db = new PDO($dbhost, $dbuser, $dbpassword);
    $db ->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
    return $db;
}
?>