<?php


$pageTitle = "登入";
// 資料庫名稱
$WSProject = "WSProject"; // 水土保持計畫案件
$WSSimple = "WSSimple"; // 簡易水保申請書
$WSViolate = "WSViolate"; // 簡易水保申請書
$WSLimit = "WSLimit"; // 超限
session_start();

// echo $_SESSION['role'];
// if(!isset($_SESSION['role'])){
//   if($_SERVER['REQUEST_URI'] !== '/login.php'){
//     header('Location: login.php');
//   }
// }

include "functions.php";
// include "includes/header.php";

if(isset($_SESSION['role'])){
    echo "<script type='text/javascript'>window.location.href='index.php';</script>";
}

if(isset($_POST['login'])){


    $username = $_POST['username']; 
    $password = md5($_POST['password']); 


    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM userlist WHERE user_account = '{$username}' ";
    
    $login_user_query = mysqli_query($connection, $query);

    if(!$login_user_query){
        comfirmQuery($login_user_query, '登入失敗，帳號、密碼有誤', 'login.php');
    }

    while($row = mysqli_fetch_array($login_user_query)){
        $db_id = $row['userid'];
        $db_username = $row['user_account'];
        $db_password = $row['user_password'];
        $db_fullname = $row['user_fullname'];
        $db_role = $row['user_role'];
        $db_email = $row['user_email'];
        $db_agency = $row['user_agency'];
        $db_title = $row['user_title'];
        $db_phone = $row['user_phone'];
        $db_fax = $row['user_fax'];
        $db_remark = $row['user_remark'];

    }

  
    
    if($username === $db_username && $password === $db_password){
        if(isset($_POST["remember"]) ){

            if(isset($_COOKIE["member_login"])){

                setcookie("member_login", "", time() - 60 * 7 * 7);
                setcookie("member_password", "", time() - 60 * 7 * 7);

            }
            setcookie("member_login", $username, time() + 3600);
            setcookie("member_password", $_POST['password'], time() + 3600);
            
        }
        $_SESSION['userid'] = $db_id;
        $_SESSION['username'] = $db_username;
        $_SESSION['fullname'] = $db_fullname;
        $_SESSION['password'] = $db_password;
        $_SESSION['role'] = $db_role;
        $_SESSION['email'] = $db_email;
        $_SESSION['agency'] = $db_agency;
        $_SESSION['title'] = $db_title;
        $_SESSION['phone'] = $db_phone;
        $_SESSION['fax'] = $db_fax;
        $_SESSION['remark'] = $db_remark;
 
    
    
        comfirmQuery($login_user_query, '登入成功', 'index.php');
        // echo "<script type='text/javascript'>window.location.href='index.php';</script>";

    }else {
        comfirmQuery($login_user_query, '登入失敗，帳號密碼輸入錯誤', 'login.php');
    } 
    
 


}




?>
<!doctype html>

<html lang="TW-zh">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 
    <title><?php echo $pageTitle; ?> | 水土保持申請案件管理系統</title>
  </head>
  <body>
<div id="login">
    <h1 class="h2 text-center p-5">水土保持申請案件管理系統</h3>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <h2 class="h4 text-center pb-2">帳號登入</h3>
            <div class="col-md-6 bg-light p-5 rounded">
                <form id="login-form" class="form" action="login.php" method="post">
               
                    <div class="form-group">
                        <label for="username" class="form-label">帳號</label><br>
                        <input type="text" name="username" id="username" class="form-control" value="<?php if(isset($_COOKIE["member_login"])){ echo $_COOKIE["member_login"]; }?>">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">密碼</label><br>
                        <input type="text" name="password" id="password" class="form-control" value="<?php if(isset($_COOKIE["member_password"])){ echo $_COOKIE["member_password"]; }?>">
                    </div>

                    <div class="d-grid">
                        <label for="remember" class="form-label mt-2">記住我
                        <input id="remember" name="remember" type="checkbox" class="form-check-input"></label>
                        <input type="submit" name="login" class="btn btn-primary btn-sm" value="登入" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?> 