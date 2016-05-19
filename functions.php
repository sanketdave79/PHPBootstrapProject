<?php

class functions{
    private $db;
    
    function __construct($DB_conn) {
        $this->db = $DB_conn;
    }
    
    function createCustomer($name)
    {
        try{
        $stmnt = $this->db->prepare("INSERT into customers(customer_name)values(:name)");
        $stmnt->bindparam(":name",$name);
        $stmnt->execute();
        return TRUE;
        }
        catch (PDOException $e){
            echo '<div class="alert alert-warning">'.$e->getMessage().'</div>';
            return FALSE;
     
    }
        
    }
    
    function updateCustomer($id,$customername)
    {
        try{
        $updatecustomername = $this->db->prepare("UPDATE customers SET customer_name='$customername' where id='$id'");
        $updatecustomername->execute();
        return TRUE;
        }
        catch (PDOException $e)
        {
         echo '<div class="alert alert-warning">'.$e->getMessage().'</div>';
         return FALSE;
        }
        
    }
            
    function getCustomerName($id)
    {
        $customername = $this->db->prepare("SELECT * from customers where id = $id");
        $customername->execute();
        
        while ($row=$customername->fetch(PDO::FETCH_ASSOC))
        {
            
            $customername = $row['customer_name'];
            break;
        }
        return $customername;  
    }
    
    function listCustomers()
    {
        $customerdata = $this->db->prepare("SELECT * from customers");
        $customerdata->execute();
        return $customerdata;  
        
    }
    
    function listCustomersForView()
    {
        $customers = $this->db->prepare("SELECT * from customers");
        $customers->execute();
        while($row=$customers->fetch(PDO::FETCH_ASSOC))
        {
            ?>
            <tr>
                <td class="text-center"><?php echo $row['customer_name']; ?></td>
                <td class="text-center"> <a href="customerform.php?customerid=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-edit"></i></a> </td>
            </tr>
                <?php
       
        }
    }
    
    function listEmployees()
    {
        $employeesdata = $this->db->prepare("SELECT * from employees");
        $employeesdata->execute();
        return $employeesdata;
    }
    
    function listOrders()
    {
        try{
            $ordersdata = $this->db->prepare("SELECT * from orders");
        $ordersdata->execute();
        return $ordersdata;
            
        } catch (PDOException $e) {
echo '<div class="alert alert-warning">'.$e->getMessage().'</div>';
            return FALSE;
        }
        
        
    }
    
    function getOrderRelatedProducts($orderid)
    {
        
        try{
    $relatedproducts = $this->db->prepare("SELECT order_products.product_id, order_products.quantity, products.product_name from order_products JOIN products where products.id = order_products.product_id AND order_id = $orderid");
    $relatedproducts->execute();
            
    while($row = $relatedproducts->fetch(PDO::FETCH_ASSOC))
    {
      ?>
        <tr>
        <td>
         <?php echo $row['product_name'];  ?>
        </td> 
        <td>
         <?php echo $row['quantity'];  ?>   
        </td>
        </tr>
        <?php
    }
    
        }
        catch (PDOException $e)
        {
        echo $e->getMessage();
        }
    }
    
    function  listOrdersForView()
    {
        try{
            $orders = $this->db->prepare("SELECT orders.id,orders.date,orders.customer_id,orders.status, customers.customer_name from orders JOIN customers where orders.customer_id = customers.id");
            $orders->execute();
            
            while ($row=$orders->fetch(PDO::FETCH_ASSOC)){
                ?>
<tr>
<td class="text-center"><?php echo $row['id']; ?></td>
<td class="text-center"><?php echo $row['customer_name']; ?></td>
<td class="text-center"><?php echo $row['date']; ?></td>
<td class="text-center"><?php echo $row['status']; ?></td>
<td class="text-center"><a href="OrderDetail.php?id=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-eye-open"></i></a> &nbsp;</td>
</tr>

                <?php
            }
            
        } catch (PDOException $e) {

        }
    }
    
    function authenticate($email,$password)
    {
        
        $check = $this->db->prepare("SELECT email,password from employees where email = '$email' AND password = '$password'");
        $check->execute();
        
        while ($row=$check->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            
            break;
        }
        if($_SESSION['email'] && $_SESSION['password']){
            $pass = 0;
            return true; 
        }
        else
        {
            $pass = 1;
            return false;
        }
        
    }
            
    
   function listProducts()
    {
        $productsdata = $this->db->prepare("SELECT * from products");
        $productsdata->execute();
        return $productsdata;
    }
    
    function getOrder($id)
    {
        try{
            $order= $this->db->prepare("SELECT orders.id,orders.date,orders.customer_id,orders.status, customers.customer_name from orders JOIN customers where orders.customer_id = customers.id AND orders.id = $id");
            $order->execute();
            
           
            while($row=$order->fetch(PDO::FETCH_ASSOC)){
                 
                 
            ?>
<div class="well">
    <h2><?php echo $row['customer_name']; ?>(Order No:<?php echo $row['id']; ?>)</h2>
    <h5><?php echo $row['date']; ?></h5>

</div>
        

            <?php
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
          
    
    
    function listPayments()
    {
        
    }
    
    function createOrder($customerid,$products,$quantity)
    {
        
   // var_dump($products);
   // var_dump($quantity);
        
        try{
        $order = $this->db->prepare("INSERT into orders(customer_id)value(:customerid)");
        $order->bindParam(":customerid",$customerid);
        $order->execute();
        
        $lastOrderId = $this->db->lastInsertId();
        
        if($products){
            
            foreach ($products as $key => $value) {  
             $productstm = $this->db->prepare("INSERT into order_products(order_id,product_id,quantity)value(:orderid,:productid,:quantity)");
             $productstm->bindParam(":orderid",$lastOrderId);
             $productstm->bindParam(":productid",$value);
             $productstm->bindParam(":quantity",$quantity[$key]);
             $productstm->execute();   
            }
         return TRUE;
            
        }
        }
            catch (PDOException $e){
     echo '<div class="alert alert-warning">'.$e->getMessage().'</div>';
            return FALSE;
                }
         
        
    }
    
    function makePayment($customername,$ordernumber, $amount)
    {
        try{
            $statement = $this->db->prepare("INSERT into processed_customer_payment(payment_from,ordernumber,amount)values(:customername, :ordernumber, :amount)");
            $statement->bindParam(":customername",$customername);
            $statement->bindParam(":ordernumber",$ordernumber);
            $statement->bindParam(":amount",$amount);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
             echo '<div class="alert alert-warning">'.$e->getMessage().'</div>';
            return FALSE;
        }
        
    }
}


