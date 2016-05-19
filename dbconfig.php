<?php

$host = "localhost";
$username = "admin";
$password = "";
$database = "practice";

$dsn = "mysql:host={$host};dbname={$database}";

try{
    $DB_conn = new PDO($dsn, $username, $password);
$DB_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo '<div class="alert alert-warning">'.$e->getMessage().'</div>';

}

include_once 'functions.php';

$crud = new functions($DB_conn);