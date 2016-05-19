<?php

include_once 'dbconfig.php';

$customername = $_POST['customerid'];
$ordernumber = $_POST['ordernumber'];
$amount = $_POST['amount'];

if($crud->makePayment($customername,$ordernumber,$amount)){
    header("Location: addpayment.php?success=1");
}
 else {
    echo '<div class="alert alert-warning">'.$e.'</div>';
}

