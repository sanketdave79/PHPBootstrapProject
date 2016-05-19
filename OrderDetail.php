<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once 'dbconfig.php';
if($_SESSION['email'] && $_SESSION['password']){

include_once 'dbconfig.php';
include_once 'header.php';



$id = $_GET['id'];

$crud->getOrder($id);

?>
<table class="table table-bordered table-responsive">
        <tr>
            <th>Product Name</th>
            <th>Quantity Ordered</th>
        </tr>
        <?php $crud->getOrderRelatedProducts($id);  ?>
</table>
        <?php
}
else{
    header("Location: login.php");
}

include_once 'footer.php';
