<?php
session_start();
include_once 'dbconfig.php';
if($_SESSION['email'] && $_SESSION['password']){
include_once 'dbconfig.php';
include_once 'header.php';
$updated = $_GET['updated'];
if($updated == 1)
{
    echo '<div class="alert alert-info">'.$customername .'  - Customer Udpated!</div>';
}
?>

<table class="table table-bordered table-responsive">
    <th class="text-center">CUSTOMER NAME</th>
    <th class="text-center">EDIT</th>
<?php $crud->listCustomersForView(); ?>
    
</table>

<?php
}
else{
    header("Location: login.php");
}
include_once 'footer.php';
