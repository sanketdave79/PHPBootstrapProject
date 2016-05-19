<?php
include_once 'dbconfig.php';
include_once 'header.php';

?>

<div class="container-fluid modal-content">
    <form method="POST" action="authenticate.php" >
        
        <div class="form-group">
            <h3>Employee Login Details</h3>
        <label>Email</label>
        <input class="form-control" placeholder="Email" name="email">
        </div>
        <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="form-group">
        <button class="btn btn-primary">&nbsp; Login&nbsp;<i class="glyphicon glyphicon-log-in"></i></button>
        </div>
</form>
    
</div>

<?php
include_once 'footer.php';
?>

