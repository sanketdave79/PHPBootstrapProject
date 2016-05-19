<?php

session_start();
include_once 'dbconfig.php';
if($_SESSION['email'] && $_SESSION['password']){
$id = $_GET["customerid"];
$success = $_GET["success"];

if($success == 1)
{
    echo '<div class="alert alert-info">New Customer'.$name.' is added!</div>';
}
include_once 'dbconfig.php';
if($id){
$name = $crud->getCustomerName($id);
}
?>
<?php
include_once 'header.php';
if($id)
{
   ?>

<form role="form" enctype="multipart/form-data" method="POST" action="updatecustomerdetail.php">
    
            <div class="form-group">
                <h3>Customer Registration</h3>
                </div>
             <div class="form-group">
                 <label>
                Customer Name
            </label>  
                 <input class="form-control" type="text" name="customername"  value="<?php echo $name; ?>" size="40" />
                 <input type="hidden" name="id" value="<?php echo $id; ?>">
             </div>
             <div class="form-group">
                 <button class="btn btn-primary" type="submit" name="submit" > <span class="glyphicon glyphicon-edit"></span> &nbsp; Update Customer</button>
             </div>
        </form>

<?php
}
 else {
    

?>



<form role="form" enctype="multipart/form-data" method="POST" action="addcustomer.php">
    
            <div class="form-group">
                <h3>Customer Registeration</h3>
                </div>
             <div class="form-group">
                 <label>
                Customer Name
            </label>
                 <input class="form-control" type="text" name="customername" placeholder="Customer Name" size="40" />
             </div>
             <div class="form-group">
                 <button class="btn btn-primary" type="submit" name="submit" > <span class="glyphicon glyphicon-plus"></span> &nbsp; Add Customer</button>
             </div>
        </form>
        
 <?php }
 }
else{
    header("Location: login.php");
}
 
 include_once 'footer.php';?>
