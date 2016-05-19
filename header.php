<html>
    <head>
        <title>Furniture Store Management Screen</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

    </head>
    <body>
        <div class="container-fluid" style="padding: 15px;">
            <nav class="nav navbar-fixed-top">
                <ul class="nav navbar-default">
                <li><a href="index.php">Dropdown</a></li>
                <li><a href="index.php">Dropdown</a></li>
            </ul>
            </nav>
            <div class="jumbotron">
                <h2>Furniture Store Management Screen</h2>
            </div>
            <ul class="nav nav-tabs">
                <li><a href="index.php">Home</a> </li>
                <li><a href="customerform.php">New Customer</a></li>
                <li><a href="orderform.php">New Order</a></li>
                <li><a href="paymentform.php">Make Payment</a></li>
                <li><a href="listcustomers.php">List Customers</a></li>
                <li><a href="listorders.php">List Orders</a></li>
                <?php if($_SESSION['email']&& $_SESSION['password']){ ?><li><a href="logout.php">Log Out</a></li><?php } ?>
            </ul>
            
            <?php 
            session_start();

    
?>
        
    