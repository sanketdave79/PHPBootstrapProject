<?php
session_start();
include_once 'dbconfig.php';
if($_SESSION['email'] && $_SESSION['password']){
$success = $_GET["success"];
if($success == 1)
{
    echo '<div class="alert alert-info">New Order'.$name.' is added!</div>';
}
include_once 'dbconfig.php';
?>
<?php
include_once 'header.php';
?>
<form role="form" enctype="multipart/form-data" method="POST" action="addorder.php">
            <div class="form-group">
                <h3>Add New Order</h3>
                </div>
            
            <div class="form-group">
        <label>
            Select Customer Name
        </label>
        <select class="form-control" name="customerid">
            <?php
            $customerdata = $crud->listCustomers();
            if($customerdata){
                while ($row=$customerdata->fetch(PDO::FETCH_ASSOC)){
                    echo '<option class="form-control" value='.$row['id'].'>'.$row['customer_name'].'</option>';
                }
            }
            ?>
            
        </select>
    </div>
            
            <div class="form-group">
                <label>Select Product</label>
                <select class="form-control" name="product[]">
                    <?php
                    $productsdata = $crud->listProducts();
                    if($productsdata){
                        while ($row=$productsdata->fetch(PDO::FETCH_ASSOC)){
                            echo '<option class="form-group" value='.$row['id'].'>'.$row['product_name'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                 <label>
                Quantity
            </label>
                 <input class="form-control" placeholder="0" type="text" name="quantity[]"  size="40" />
             </div>
            
            <div class="form-group">
                <label>Select Product</label>
                <select class="form-control" name="product[]">
                    <?php
                    $productsdata = $crud->listProducts();
                    if($productsdata){
                        while ($row=$productsdata->fetch(PDO::FETCH_ASSOC)){
                            echo '<option class="form-group" value='.$row['id'].'>'.$row['product_name'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
           
             <div class="form-group">
                 <label>
                Quantity
            </label>
                 <input class="form-control" placeholder="0" type="text" name="quantity[]"  size="40" />
             </div>
            
             <div class="form-group">
                 <button class="btn btn-success" type="submit"  name="submit" ><span class="glyphicon glyphicon-paperclip"></span> &nbsp; Place Order</button>
             </div>
        </form>
        </div>
   <?php
   }
else{
    header("Location: login.php");
}
   include_once 'footer.php';
   ?>
