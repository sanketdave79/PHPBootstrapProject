<?php
include_once 'dbconfig.php';

$email = $_POST['email'];
$password = $_POST['password'];
//$email = "sanketdave79@gmail.com";
//$password = "password";

$password = md5($password);



if($crud->authenticate($email,$password)){
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    header("Location: index.php");
}
else{
    header("Location: login.php");
}