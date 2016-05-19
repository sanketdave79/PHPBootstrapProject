<?php
session_start();
include_once 'dbconfig.php';
if($_SESSION['email'] && $_SESSION['password']){

?>
<?php
include_once 'header.php';
?>

<div class="container-fluid">
</div>

<?php 
}
else{
    header("Location: login.php");
}
include_once 'footer.php';

?>