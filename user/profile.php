<?php 
$pageTitle = "個人資料管理";
$userid = $_SESSION['userid'];

if(isset($_POST['update_user'])){

    $pw_1 = $_POST['user_password'];
    $pw_2 = $_POST['user_ch_password'];
    if($pw_1 == $pw_2){


        if(isset($_POST['user_password'])){
    
            $p_user_password = md5($_POST['user_password']); //密碼
        }else{
            $p_user_password = $_SESSION['password'];
    
        }
        // $user_ck_password = $_POST['user_ck_password']; //確認密碼
      
        $p_user_email = $_POST['user_email']; //信箱
        $p_user_title = $_POST['user_title']; //職稱
        $p_user_phone = $_POST['user_phone']; //電話
        $p_user_fax = $_POST['user_fax']; //傳真
        $p_user_remark = $_POST['user_remark']; //備註
    
        $query = "UPDATE userlist SET ";
        $query .= "user_password = '{$p_user_password}', ";
        $query .= "user_email = '{$p_user_email}', ";
        $query .= "user_title = '{$p_user_title}', ";
        $query .= "user_phone = '{$p_user_phone}', ";
        $query .= "user_fax = '{$p_user_fax}', ";
        $query .= "user_remark = '{$p_user_remark}' ";
    
        $query .= "WHERE userid = '{$userid}' ";
    
    
        $update_user = mysqli_query($connection, $query);
        comfirmQuery($update_user, '個人資料編輯成功', null);
    }
    
}

$query = "SELECT * FROM userlist WHERE userid = $userid";
$select_update_user_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_update_user_query)){

    $_SESSION['username'] = $row['user_account']; //姓名
    $_SESSION['fullname'] = $row['user_fullname']; //姓名
    $_SESSION['email'] = $row['user_email']; //信箱
    $_SESSION['role'] = $row['user_role']; //角色
    $_SESSION['title'] = $row['user_title']; //職稱
    $_SESSION['phone'] = $row['user_phone']; //電話
    $_SESSION['fax'] = $row['user_fax']; //傳真
    $_SESSION['remark'] = $row['user_remark']; //備註


}


?>
<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12"><h1 class="h4 mb-4">個人資料管理</h1></div>
        </div>
        <form method="post" class="row">
            <div class="p-4 mb-4 bg-light text-dark rounded">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="h5 mb-4">基本資料</h2>
                        <div class='mb-3 row'>
                            <div class="col-sm-2">帳號</div>
                            <span class="col-sm-8"><?php echo $_SESSION['username'];?></span>
                            <input type="hidden" value="<?php echo $_SESSION['role'];?>" id="user_account">
                        </div>
                        <div class='mb-3 row'>
                            <div class="col-sm-2">姓名</div>
                            <span class="col-sm-8"><?php echo $_SESSION['fullname'];?></span>
                        </div>
                        <div class='mb-3 row'>
                            <div class="col-sm-2">單位</div>
                            <span class="col-sm-8"><?php echo $_SESSION['agency'];?></span>
                        </div>
                        <div class='mb-3 row'>
                            <label for="user_password" class="col-sm-2 col-form-label">密碼</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="user_password" name="user_password" autocomplete="new-password"
                                placeholder="輸入密碼" pattern="(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[^a-zA-Z0-9]).{8,30}" title="密碼需包含大寫英文、小寫英文、數字、與特殊符號，且至少8位字元" onkeyup="vaild_pw()">
                                <div id="pw_alert" class="text-danger mt-2 mb-2"></div>
                                <span>【密碼為8-20字元，需包含大寫英文、小寫英文、數字、與特殊符號，不可與帳號相同；若角色為系統管理者需12碼】</span>
                            </div>

                        </div>
                        <div class='mb-3 row'>
                            <label for="user_ch_password" class="col-sm-2 col-form-label" >確認密碼</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control mb-2" id="user_ch_password" name="user_ch_password" onkeyup="vaild_ch_pw()">
                                <div id="pw_ch_alert" class="text-danger mt-2 mb-2"></div>

                            </div>
                        </div>
                        <div class='mb-3 row'>
                            <label for="user_email" class="col-sm-2 col-form-label" >信箱 <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="user_email" name="user_email" value="<?php echo $_SESSION['email'];?>" required>
                                <span>忘記密碼時寄送之電子郵件</span>
                                <span>
                                    信箱為必填欄位
                                </span>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-6">
                        <h2 class="h5 mb-4">進階資料</h2>
                        <div class='mb-3 row'>
                            <label for="user_title" class="col-sm-2 col-form-label" >職稱 </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="user_title" name="user_title" value="<?php echo $_SESSION['title'];?>">
                            </div>

                        </div>
                        <div class='mb-3 row'>
                            <label for="user_phone" class="col-sm-2 col-form-label" >電話 </label>
                            <div class="col-sm-8">
                                <input type="phone" class="form-control" id="user_phone" name="user_phone" pattern="[0-9]{9,10}" title="請輸入正確的電話格式" value="<?php echo $_SESSION['phone'];?>">
                                
                            </div>
                        </div>
                        <div class='mb-3 row'>
                            <label for="user_fax" class="col-sm-2 col-form-label" >傳真 </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="user_fax" name="user_fax" value="<?php echo $_SESSION['fax'];?>">
                            </div>

                        </div>
                        <div class='mb-3 row'>
                            <label for="user_remark" class="col-sm-2 col-form-label" >備註 </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="user_remark" name="user_remark" value="<?php echo $_SESSION['remark'];?>">
                            </div>

                        </div>
                    </div>
                        
                </div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-secondary " href="UserList.php"><i class="fas fa-times-circle me-2"></i>取消</a>
                <button name="update_user" class="btn btn-primary" type="submit"><i class="fas fa-save me-2"></i>儲存</button>
            </div>
       
        </form>

    </div>
</main>
<script src="./assets/vaildation.js"></script>
