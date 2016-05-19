<?php
session_start();
include_once 'dbconfig.php';
if($_SESSION['email'] && $_SESSION['password']){
include_once 'dbconfig.php';
?>
<?php
include_once 'header.php';
?>
<form role="form" enctype="multipart/form-data" method="POST" action="addpayment.php">
            <div class="form-group">
                <h3>Make Payment</h3>
                </div>
    
    <div class="form-group">
        <label>
            Select Employee Name
        </label>
        <select class="form-control">
            <?php
            $emplyeesdata = $crud->listEmployees();
            if($emplyeesdata){
                while ($row=$emplyeesdata->fetch(PDO::FETCH_ASSOC)){
                    echo '<option class="form-control" value='.$row['id'].'>'.$row['employee_name'].'</option>';
                }
            }
            ?>
            
        </select>
    </div>
    
    <div class="form-group">
        <label>
            Select Customer Name
        </label>
        <select class="form-control">
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
        <label>Select Order Number</label>
        <select class="form-control">
            <?php
            $listOrders = $crud->listOrders();
            if($listOrders)
            {
                while ($row=$listOrders->fetch(PDO::FETCH_ASSOC)){
            echo '<option class="form-control value="'.$row['id'].'>'.$row['id'].'</option>';
                }
            }
            ?>
        </select>
    </div>
            <div class="form-group">
                 <label>
                Amount
            </label>
            <input class="form-control" type="text" name="amount" placeholder="Amount" size="40" />
             </div>
             <div class="form-group">
                 <button class="btn btn-danger" type="button" value="Submit" name="submit" ><span class="glyphicon glyphicon-credit-card"></span> &nbsp; Make Payment</button>
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
