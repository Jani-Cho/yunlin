<?php 
include "functions.php";
include "includes/header.php";

if(isset($_POST['submit'])){
    updateData();



}
?>

<form id="login-form" class="form" action="update.php" method="post">    
    <div class="form-group">
        <label for="username" class="form-label">帳號</label><br>
        
        <input type="text" name="username" id="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="password" class="form-label">密碼</label><br>
        <input type="text" name="password" id="password" class="form-control">
    </div>
    <select name="user_id" id="">
        <?php
          showAllData();
        
        ?>
        
    </select>
    <input type="submit" name="submit" class="btn btn-primary btn-sm" value="更新">

</form>