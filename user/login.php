<?php include "header.php" ?>
<?php 
if(isset($_POST['submit'])){


    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $connection = mysqli_connect('localhost','root','','user');
    if($connection){
        echo 'connect';
    }
   
}
?>
<div id="login">
    <h1 class="h2 text-center p-5">水土保持申請案件管理系統</h3>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <h2 class="h4 text-center pb-2">帳號登入</h3>
            <div class="col-md-6 bg-light p-5 rounded">
                <form id="login-form" class="form" action="login.php" method="post">
                    <div class="form-group">
                        <label for="username" class="form-label">帳號</label><br>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">密碼</label><br>
                        <input type="text" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="verification" class="form-label">驗證碼</label><br>
                        <input type="text" name="verification" id="verification" class="form-control">
                    </div>
                    <div class="d-grid">
                        <label for="remember-me" class="form-label mt-2"><span>記住我</span> <span><input id="remember-me" name="remember-me" type="checkbox" class="form-check-input"></span></label><br>
                        <input type="submit" name="submit" class="btn btn-primary btn-sm" value="登入">
                    </div>
                    <div id="forget-link">
                        <a href="#" class="text-secondary">忘記密碼 </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>