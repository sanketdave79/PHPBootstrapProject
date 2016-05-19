<?php
include_once 'dbconfig.php';
?>
<?php

$name = $_POST['customername'];

if($crud->createCustomer($name))
{
    header("Location: customerform.php?success=1");
    
}
?>
