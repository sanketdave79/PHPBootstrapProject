<?php

include 'dbconfig.php';
$customername = $_POST['customername'];
$id = $_POST['id'];

if($crud->updateCustomer($id,$customername)){
    header("Location: listcustomers.php?update=1");
}


