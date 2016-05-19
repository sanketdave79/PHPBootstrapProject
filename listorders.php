<?php
session_start();
include_once 'dbconfig.php';
if($_SESSION['email'] && $_SESSION['password']){
include_once 'dbconfig.php';

?>
<?php
include_once 'header.php';
?>

<div class="container-fluid">
    <table class="table table-bordered table-responsive">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">CUSTOMER NAME</th>
            <th class="text-center">DATE</th>
            <th class="text-center">STATUS</th>
            <th class="text-center">VIEW</th>
        </tr>
        
        
<?php $crud->listOrdersForView(); ?>
    </table>

<?php 
}
else{
    header("Location: login.php");
}
include_once 'footer.php';

?>