<?php
$acc_check = false;
$user_account = "";





if(isset($_POST['add_user'])){
    $user_account = $_POST['user_account']; //帳號
    $user_data = "SELECT * FROM userlist WHERE user_account='$user_account'";
    $user_result = mysqli_query($connection, $user_data);

    if(mysqli_num_rows($user_result) > 0) {
        $acc_error = "[$user_account]此帳號已被註冊，請重新填寫";
    }else{
        $acc_error = "[$user_account]此帳號可以註冊";
        $acc_check = true;
       
        $user_check = $_POST['user_check']; //審核狀態
        $user_reason = $_POST['user_reason']; //審核原因
        $user_start = $_POST['user_start']; //啟用狀態
        $user_account = $_POST['user_account']; //帳號
        $user_password = md5($_POST['user_password']); //密碼
        // $user_ch_password = $_POST['user_ch_password']; //確認密碼
        $user_agency = $_POST['user_agency']; //單位
        $user_fullname = $_POST['user_fullname']; //姓名
        $user_email = $_POST['user_email']; //信箱
        $user_role = $_POST['user_role']; //角色
        $user_title = $_POST['user_title']; //職稱
        $user_phone = $_POST['user_phone']; //電話
        $user_fax = $_POST['user_fax']; //傳真
        $user_remark = $_POST['user_remark']; //備註



        
        $query = "INSERT INTO userlist(user_check, user_reason, user_start, user_account, user_password, user_agency, user_fullname, user_email, user_role, user_title, user_phone, user_fax, user_remark)";
        $query .=
        "VALUES( '{$user_check}', '{$user_reason}', '{$user_start}', '{$user_account}', '{$user_password}', '{$user_agency}', '{$user_fullname}', '{$user_email}', '{$user_role}', '{$user_title}', '{$user_phone}', '{$user_fax}', '{$user_remark}')";


        $add_user = mysqli_query($connection, $query);

        comfirmQuery($add_user, '新增成功', 'UserList.php');
    }
}

if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
}

if(isset($_POST['update_user'])){
    
    $p_user_check = $_POST['user_check']; //審核狀態
    $p_user_reason = $_POST['user_reason']; //審核原因
    $p_user_start = $_POST['user_start']; //啟用狀態
    // $p_user_account = $_POST['user_account']; //帳號
    if($_POST['user_password'] == ""){

    }
    $p_user_password = md5($_POST['user_password']); //密碼
    // $user_ck_password = $_POST['user_ck_password']; //確認密碼
    $p_user_agency = $_POST['user_agency']; //單位
    $p_user_team = $_POST['user_team']; //分屬單位
    $p_user_agency_oth = $_POST['user_agency_oth']; //其他單位
    $p_user_internal = $_POST['user_internal']; //內部單位
    if(isset($_POST['user_internal'])){
            
        $p_user_internal = $_POST['user_internal']; //單位
    }else{
        $p_user_internal = "無";
    }
    $p_user_fullname = $_POST['user_fullname']; //姓名
    $p_user_email = $_POST['user_email']; //信箱
    $p_user_role = $_POST['user_role']; //角色
    $p_user_title = $_POST['user_title']; //職稱
    $p_user_phone = $_POST['user_phone']; //電話
    $p_user_fax = $_POST['user_fax']; //傳真
    $p_user_remark = $_POST['user_remark']; //備註

    $query = "UPDATE userlist SET ";
    $query .= "user_check = '{$p_user_check}', ";
    $query .= "user_reason = '{$p_user_reason}', ";
    $query .= "user_start = '{$p_user_start}', ";
    // $query .= "user_account = '{$p_user_account}', ";
    $query .= "user_password = '{$p_user_password}', ";
    $query .= "user_agency = '{$p_user_agency}', ";
    $query .= "user_team = '{$p_user_team}', ";
    $query .= "user_agency_oth = '{$p_user_agency_oth}', ";
    $query .= "user_internal = '{$p_user_internal}', ";
    $query .= "user_fullname = '{$p_user_fullname}', ";
    $query .= "user_email = '{$p_user_email}', ";
    $query .= "user_role = '{$p_user_role}', ";
    $query .= "user_title = '{$p_user_title}', ";
    $query .= "user_phone = '{$p_user_phone}', ";
    $query .= "user_fax = '{$p_user_fax}', ";
    $query .= "user_remark = '{$p_user_remark}' ";

    $query .= "WHERE userid = '{$userid}' ";


    $update_user = mysqli_query($connection, $query);
    comfirmQuery($update_user, '修改成功', 'UserList.php');
}

$query = "SELECT * FROM userlist WHERE userid = $userid";
$select_all_user_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_user_query)){

    $user_check = $row['user_check']; //審核狀態
    if( $user_check == "Y"){
        $user_check = "checked";
        $user_check_f = "";
    }else{
        $user_check = "";
        $user_check_f = "checked";
    }
    $user_reason = $row['user_reason']; //審核原因
    $user_start = $row['user_start']; //啟用狀態
    if( $user_start == "Y"){
        $user_start = "checked";
        $user_start_f = "";
    }else{
        $user_start = "";
        $user_start_f = "checked";
    }
    $user_account = $row['user_account']; //帳號
    $user_agency = $row['user_agency']; //單位
    $user_team = $row['user_team']; //單位
    $user_agency_oth = $row['user_agency_oth']; //單位
    $user_internal = $row['user_internal']; //單位
    $user_fullname = $row['user_fullname']; //姓名
    $user_email = $row['user_email']; //信箱
    $user_role = $row['user_role']; //角色
    $user_title = $row['user_title']; //職稱
    $user_phone = $row['user_phone']; //電話
    $user_fax = $row['user_fax']; //傳真
    $user_remark = $row['user_remark']; //備註
}

if(isset($_POST['user_role'])){
    $user_role = $_POST['user_role'];
}
?>

<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12"><h1 class="h4 mb-4">人員帳號管理</h1></div>
        </div>

        <form method="post">
            <div class="p-4 mb-4 bg-light text-dark rounded">
                <div class="row">
                    <div class='mb-3 row'>
                        <label for="user_role" class="col-sm-2 col-form-label">角色 <span class="text-danger">*</span></label>
                        <div class='col-sm-5'>
                                <select class="col-sm-8 form-select" id="user_role" name="user_role" onchange="this.form.submit()">
                                    <option value="" disabled selected>請選擇</option>
                                    <option value="admin" <?php if($user_role == "admin"){ echo " selected"; }?>>系統管理員</option>
                                    <option value="auther" <?php if($user_role == "auther"){ echo " selected"; }?>>承辦人員</option>

                                </select>      
                        </div>
                        <input type="hidden" value="<?php echo $user_role;?>" id="role">
                    </div>
                </div>
            </div>
            <div class="p-4 mb-2 bg-light text-dark rounded">
                <div class="row">
                    <div class='mb-3 row'>
                        <label class="col-sm-2 col-form-label">審核狀態</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="user_check" id="user_check_y" value="Y" <?php echo $user_check;?>>
                                <label class="form-check-label" for="user_check_y">通過 </label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="user_check" id="user_check_n" value="N" <?php echo $user_check_f;?>>
                                <label class="form-check-label text-danger" for="user_check_n">不通過</label>
                            </div>
                        </div>
                    </div>

                    <div class='mb-3 row'>
                    <label for="user_reason" class="col-sm-2 col-form-label">原因</label>
                    <textarea class="form-control " name="user_reason" id="user_reason"><?php echo $user_reason;?></textarea>
                    </div>
                </div>
            </div>

            <div class="p-4 mb-4 bg-light text-dark rounded">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="h5 mb-4">基本資料</h2>
                        <div class='mb-3 row'>
                         <label  class="col-sm-3 col-form-label">啟用狀態</label>
                        <div class=" col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="user_start" id="user_start_y" value="Y" <?php echo $user_start;?>>
                                <label class="form-check-label" for="user_start_y">啟用 </label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="user_start" id="user_start_n" value="N" <?php echo $user_start_f;?>>
                                <label class="form-check-label text-danger " for="user_start_n">停用</label>
                            </div>
                        </div>
                        </div>
          
                        <div class='mb-3 row'>
                            <label for="user_account" class="col-sm-3 col-form-label">帳號 <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="mb-2 form-control" id="user_account" name="user_account" value="<?php echo $user_account;?>" disabled>
                            </div>
                        </div>


                        <div class='mb-3 row'>
                            <label for="user_password" class="col-sm-3 col-form-label">密碼 </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="user_password" name="user_password" autocomplete="new-password" pattern="(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[^a-zA-Z0-9]).{8,30}" title="密碼需包含大寫英文、小寫英文、數字、與特殊符號，且至少8位字元" onkeyup="vaild_pw()" >
                                <div id="pw_alert" class="text-danger mt-2 mb-2"></div>
                                <span>【密碼為8-20字元，需包含大寫英文、小寫英文、數字、與特殊符號，不可與帳號相同；若角色為系統管理者需12碼】</span>
                            </div>
                        </div>
      
                        <div class='mb-3 row'>
                            <label for="user_ch_password" class="col-sm-3 col-form-label">確認密碼 </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="user_ch_password" name="user_ch_password" onkeyup="vaild_ch_pw()" >
                                <div id="pw_ch_alert" class="text-danger mt-2 mb-2"></div>
                            </div>

                        </div>
                 
                        <div class='mb-3 row'>
                            <label for="user_agency" class="col-sm-3 col-form-label">單位 <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="hidden" value="<?php echo $user_agency;?>" id="user_agency_v">
                                <input type="hidden" value="<?php echo $user_team;?>" id="user_team_v">
                                <input type="hidden" value="<?php echo $user_agency_oth;?>" id="user_agency_oth_v">
                                <input type="hidden" value="<?php echo $user_internal;?>" id="user_internal_v">

                                <select class="form-select" id="user_agency" name="user_agency" required>
                                    <option value="">請選擇</option>
                                    <option value="雲林縣政府" <?php echo $user_agency == "雲林縣政府"? "selected" : "" ;?>>雲林縣政府</option>
                                </select>
                                <select class="form-select" id="user_team" name="user_team">
                                    <option value="無" selected>請選擇分署或組別</option>
                                </select>
                                <input type="text" class="form-control" id="user_agency_oth" name="user_agency_oth" value="<?php echo $user_agency_oth;?>">

                            </div>
                        </div>
                        <div class='mb-3 row'>
                            <label for="user_internal" class="col-sm-3 col-form-label">內部單位</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="user_internal" name="user_internal">
                                    <option value="無">請選擇內部單位</option>
                                </select>
                            </div>
                        </div>
                        <div class='mb-3 row'>
                            <label for="user_fullname" class="col-sm-3 col-form-label">姓名 <span class="text-danger">*</span></label>
                            <div class='col-sm-9'>
                                <input type="text" class="col-sm-8 form-control" id="user_fullname" name="user_fullname" value="<?php echo $user_fullname;?>" required>
                            </div> 
                        </div> 
                        <div class='mb-3 row'>
                            <label for="user_email" class="col-sm-3 col-form-label">信箱 <span class="text-danger">*</span></label>
                            <div class='col-sm-9'>
                                <input type="email" class="col-sm-8 form-control" id="user_email" name="user_email" value="<?php echo $user_email;?>" required>
                            </div>
                        </div>
   
                    </div>
                    <div class="col-lg-6">
                        <h2 class="h5 mb-4">進階資料</h2>
                        <div class='mb-3 row'>
                            <label for="user_title" class="col-sm-3 col-form-label">職稱</label>
                            <div class='col-sm-9'>
                                <input type="text" class="form-control" id="user_title" name="user_title" value="<?php echo $user_title;?>">
                            </div>
                        </div>
                        <div class='mb-3 row'>
                            <label for="user_phone" class="col-sm-3 col-form-label">電話</label>
                            <div class='col-sm-9'>
                                <input type="phone" class="form-control" pattern="[0-9]{9,10}" id="user_phone" name="user_phone" value="<?php echo $user_phone;?>">
                            </div>
                        </div>
                        <div class='mb-3 row'>
                            <label for="user_fax" class="col-sm-3 col-form-label">傳真</label>
                            <div class='col-sm-9'>
                                <input type="text" class="form-control" id="user_fax" name="user_fax" value="<?php echo $user_fax;?>">
                            </div>
                        </div>
                        <div class='mb-3 row'>
                            <label for="user_remark" class="col-sm-3 col-form-label">備註</label>
                            <div class='col-sm-9'>
                                <input type="text" class="form-control" id="user_remark" name="user_remark" value="<?php echo $user_remark;?>">
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-secondary " href="UserList.php"><i class="fas fa-times-circle me-2"></i>取消</a>

                <button name="update_user" class="btn btn-primary" type="submit" ><i class="fas fa-save me-2" ></i>儲存</button>
            </div>
        </form>

    </div>
</main>
<script src="./assets/agency.js"></script>
<script src="./assets/vaildation.js"></script>
