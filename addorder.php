<?php

include_once 'dbconfig.php';
$customerid = $_POST['customerid'];
$products = $_POST['product'];
$quantity = $_POST['quantity'];


if($crud->createOrder($customerid,$products,$quantity)){
    header("Location: orderform.php?success=1");
}
 else {
    echo '<div class="alert alert-warning">'.$e.'</div>';
}
