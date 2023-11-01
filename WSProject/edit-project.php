<?php 
if(isset($_GET["pj_id"])){
    $the_wsp_id = $_GET["pj_id"];
}
$query = "SELECT * FROM $WSProject WHERE wsp_id = $the_wsp_id";
$select_all_wsproject_query_by_id = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_all_wsproject_query_by_id)){

    $wsp_files = $row['wsp_files']; //
    if (!empty($wsp_files)) {
        $wsp_files_array = explode(",", $wsp_files);
    } else {
        $wsp_files_array = "";
    }
    
}

if(isset($_POST['update_project'])){

    // $p_wsp_unit = $_POST['wsp_unit']; //單位
    
    $p_wsp_vol_name = $_POST['wsp_vol_name']; //水土保持義務人名稱
    $p_wsp_vol_num = $_POST['wsp_vol_num']; //國民身分證統一編號或營利事業統一編號
    $p_wsp_vol_phone = $_POST['wsp_vol_phone']; //電話
    $p_wsp_vol_addr = $_POST['wsp_vol_addr']; //住居所或營業所
    $p_wsp_vol_email = $_POST['wsp_vol_email']; //電子郵件

    $p_wsp_un_name = $_POST['wsp_un_name']; //承辦技師姓名
    $p_wsp_un_off = $_POST['wsp_un_off']; //技師職業機構或事務所
    $p_wsp_un_phone = $_POST['wsp_un_phone']; //電話
    $p_wsp_un_email = $_POST['wsp_un_email']; //電子郵件
    $p_wsp_un_date = date('Y-m-d', strtotime($_POST['wsp_un_date'])); //製作年月日

    $p_wsp_pj_pur = $_POST['wsp_pj_pur']; //計畫目的
    $p_wsp_pj_scp = $_POST['wsp_pj_scp']; //計畫範圍
    $p_wsp_pj_sum = $_POST['wsp_pj_sum']; //開挖整地概述
    $p_wsp_pj_fac = $_POST['wsp_pj_fac']; //水土保持設施
    $p_wsp_pj_pre = $_POST['wsp_pj_pre']; //開發期間之防災措施
    $p_wsp_pj_way = $_POST['wsp_pj_way']; //預定施工方式
    $p_wsp_pj_cost = $_POST['wsp_pj_cost']; //水土保持計畫設施項目、數量及總工程造價

    $p_wsp_ad_remark = $_POST['wsp_ad_remark']; //行政備註
    
    $p_wsp_name = $_POST['wsp_name']; //計畫名稱
    $p_wsp_num = $_POST['wsp_num']; //案件編號
    $p_wsp_pj_seat_county = $_POST['wsp_pj_seat_county']; //實施地點 土地座落 縣
    $p_wsp_pj_seat_town = $_POST['wsp_pj_seat_town']; //鄉市
    $p_wsp_pj_seat_alley = $_POST['wsp_pj_seat_alley']; //路段
    $p_wsp_pj_seat_no = $_POST['wsp_pj_seat_no']; //地號
    $p_wsp_pj_seat_count = $_POST['wsp_pj_seat_count']; //筆數
    $p_wsp_pj_own = $_POST['wsp_pj_own']; //土地權屬
    $p_wsp_pj_area = $_POST['wsp_pj_area']; //計畫面積
    $p_wsp_pj_co = $_POST['wsp_pj_co']; //土地座標    
    $p_wsp_pj_add = $_POST['wsp_pj_add']; //土地新增   

    $p_wsp_undertaker = $_POST['wsp_undertaker']; //承辦人
    $p_wsp_apy_date = date('Y-m-d', strtotime($_POST['wsp_apy_date'])); //申請日期
    
    $p_wsp_apy_tnum = $_POST['wsp_apy_tnum']; //申請文號
    $p_wsp_apv_date = date('Y-m-d', strtotime($_POST['wsp_apv_date'])); //核准日期
    $p_wsp_apv_tnum = $_POST['wsp_apv_tnum']; //核准文號
    $p_wsp_main_apv_date = date('Y-m-d', strtotime($_POST['wsp_main_apv_date'])); //目的事業主管機關核准日期
    $p_wsp_main_apv_tnum = $_POST['wsp_main_apv_tnum']; //目的事業主管機關核准文號
    $p_wsp_st_date = date('Y-m-d', strtotime($_POST['wsp_st_date'])); //應開工日期
    $p_wsp_rm_st_date = date('Y-m-d', strtotime($_POST['wsp_rm_st_date'])); //提醒開工日期
    $p_wsp_ac_st_date = date('Y-m-d', strtotime($_POST['wsp_ac_st_date'])); //實際開工日期
    $p_wsp_end_date = date('Y-m-d', strtotime($_POST['wsp_end_date'])); //預定完工日期
    $p_wsp_rm_end_date = date('Y-m-d', strtotime($_POST['wsp_rm_end_date'])); //提醒完工日期
    $p_wsp_ac_end_date = date('Y-m-d', strtotime($_POST['wsp_ac_end_date'])); //實際完工日期
    $p_wsp_rm_crew = $_POST['wsp_rm_crew']; //提醒通知人員
    $p_wsp_add_1 = $_POST['wsp_add_1']; //開工前輔導
    $p_wsp_add_2 = $_POST['wsp_add_2']; //期初檢查
    $p_wsp_add_3 = $_POST['wsp_add_3']; //施工中檢查
    $p_wsp_add_4 = $_POST['wsp_add_4']; //完工檢查
    $p_wsp_remark = $_POST['wsp_remark']; //備註

    // // 第一二次展延
    $p_wsp_apy_date1 = date('Y-m-d', strtotime($_POST['wsp_apy_date1'])); //申請日期
    $p_wsp_apy_date2 = date('Y-m-d', strtotime($_POST['wsp_apy_date2'])); //申請日期
    $p_wsp_apy_tnum1 = $_POST['wsp_apy_tnum1']; //申請文號
    $p_wsp_apy_tnum2 = $_POST['wsp_apy_tnum2']; //申請文號

    $p_wsp_apv_date1 = date('Y-m-d', strtotime($_POST['wsp_apv_date1'])); //核准日期
    $p_wsp_apv_date2 = date('Y-m-d', strtotime($_POST['wsp_apv_date2'])); //核准日期
    $p_wsp_apv_tnum1 = $_POST['wsp_apv_tnum1']; //核准文號
    $p_wsp_apv_tnum2 = $_POST['wsp_apv_tnum2']; //核准文號

    $p_wsp_ex_end_date1 = date('Y-m-d', strtotime($_POST['wsp_ex_end_date1'])); //展延完工日期
    $p_wsp_ex_end_date2 = date('Y-m-d', strtotime($_POST['wsp_ex_end_date2'])); //展延完工日期
    // $p_wsp_rm_end_date1 = date('Y-m-d', strtotime($_POST['wsp_rm_end_date1'])); //提醒完工日期
    // $p_wsp_rm_end_date2 = date('Y-m-d', strtotime($_POST['wsp_rm_end_date2'])); //提醒完工日期
    $p_wsp_close = $_POST['wsp_close']; //結案進度    
    $p_wsp_ex_remark1 = $_POST['wsp_ex_remark1']; //備註1    
    $p_wsp_ex_remark2 = $_POST['wsp_ex_remark2']; //備註2   
    
    //上傳資料
    $uploaded_files = $_FILES['wsp_files'];

    $timestamped_filesname = [];
    if (!empty($wsp_files)) {
        $timestamped_filesname[] = $wsp_files;
    }
    if (!empty($uploaded_files['name'][0])) {
    
        foreach ($uploaded_files['name'] as $key => $filename) {
            $temp_files = $uploaded_files['tmp_name'][$key];
            $timestamp = time();
            $timestamped_filename = 'wsl_' . $timestamp . '_' . $filename;
    
            move_uploaded_file($temp_files, "./assets/imgs/$timestamped_filename");
    
            $timestamped_filesname[] = $timestamped_filename;
        }
    }
    $timestamped_filesname_string = implode(',', $timestamped_filesname);

    $query = "UPDATE $WSProject SET ";
    $query .= "wsp_vol_name = '{$p_wsp_vol_name}', ";
    $query .= "wsp_vol_num = '{$p_wsp_vol_num}', ";
    $query .= "wsp_vol_phone = '{$p_wsp_vol_phone}', ";
    $query .= "wsp_vol_addr = '{$p_wsp_vol_addr}', ";
    $query .= "wsp_vol_email = '{$p_wsp_vol_email}', ";
    $query .= "wsp_vol_phone = '{$p_wsp_vol_phone}', ";
    $query .= "wsp_un_name = '{$p_wsp_un_name}', ";
    $query .= "wsp_un_off = '{$p_wsp_un_off}', ";
    $query .= "wsp_un_phone = '{$p_wsp_un_phone}', ";
    $query .= "wsp_un_email = '{$p_wsp_un_email}', ";
    $query .= "wsp_un_date = '{$p_wsp_un_date}', ";
    $query .= "wsp_pj_seat_alley = '{$p_wsp_pj_seat_alley}', ";
    $query .= "wsp_pj_pur = '{$p_wsp_pj_pur}', ";
    $query .= "wsp_pj_scp = '{$p_wsp_pj_scp}', ";
    $query .= "wsp_pj_sum = '{$p_wsp_pj_sum}', ";
    $query .= "wsp_pj_fac = '{$p_wsp_pj_fac}', ";
    $query .= "wsp_pj_pre = '{$p_wsp_pj_pre}', ";
    $query .= "wsp_pj_way = '{$p_wsp_pj_way}', ";
    $query .= "wsp_pj_cost = '{$p_wsp_pj_cost}', ";
    $query .= "wsp_ad_remark = '{$p_wsp_ad_remark}', ";
    $query .= "wsp_name = '{$p_wsp_name}', ";
    $query .= "wsp_num = '{$p_wsp_num}', ";
    $query .= "wsp_pj_seat_county = '{$p_wsp_pj_seat_county}', ";
    $query .= "wsp_pj_seat_town = '{$p_wsp_pj_seat_town}', ";
    $query .= "wsp_pj_seat_no = '{$p_wsp_pj_seat_no}', ";
    $query .= "wsp_pj_seat_count = '{$p_wsp_pj_seat_count}', ";
    $query .= "wsp_pj_own = '{$p_wsp_pj_own}', ";
    $query .= "wsp_pj_area = '{$p_wsp_pj_area}', ";
    $query .= "wsp_pj_co = '{$p_wsp_pj_co}', ";
    $query .= "wsp_pj_add = '{$p_wsp_pj_add}', ";

    $query .= "wsp_undertaker = '{$p_wsp_undertaker}', ";
    $query .= "wsp_apy_date = '{$p_wsp_apy_date}', ";
    $query .= "wsp_apy_tnum = '{$p_wsp_apy_tnum}', ";
    $query .= "wsp_apv_date = '{$p_wsp_apv_date}', ";
    $query .= "wsp_apv_tnum = '{$p_wsp_apv_tnum}', ";
    $query .= "wsp_main_apv_date = '{$p_wsp_main_apv_date}', ";
    $query .= "wsp_main_apv_tnum = '{$p_wsp_main_apv_tnum}', ";
    $query .= "wsp_st_date = '{$p_wsp_st_date}', ";
    $query .= "wsp_rm_st_date = '{$p_wsp_rm_st_date}', ";
    $query .= "wsp_ac_st_date = '{$p_wsp_ac_st_date}', ";
    $query .= "wsp_end_date = '{$p_wsp_end_date}', ";
    $query .= "wsp_rm_end_date = '{$p_wsp_rm_end_date}', ";
    $query .= "wsp_ac_end_date = '{$p_wsp_ac_end_date}', ";
    $query .= "wsp_rm_crew = '{$p_wsp_rm_crew}', ";
    $query .= "wsp_remark = '{$p_wsp_remark}', ";
    $query .= "wsp_add_1 = '{$p_wsp_add_1}', ";
    $query .= "wsp_add_2 = '{$p_wsp_add_2}', ";
    $query .= "wsp_add_3 = '{$p_wsp_add_3}', ";
    $query .= "wsp_add_4 = '{$p_wsp_add_4}', ";
    $query .= "wsp_apy_date1 = '{$p_wsp_apy_date1}', ";
    $query .= "wsp_apy_date2 = '{$p_wsp_apy_date2}', ";
    $query .= "wsp_apy_tnum1 = '{$p_wsp_apy_tnum1}', ";
    $query .= "wsp_apy_tnum2 = '{$p_wsp_apy_tnum2}', ";
    $query .= "wsp_apv_date1 = '{$p_wsp_apv_date1}', ";
    $query .= "wsp_apv_date2 = '{$p_wsp_apv_date2}', ";
    $query .= "wsp_apv_tnum1 = '{$p_wsp_apv_tnum1}', ";
    $query .= "wsp_apv_tnum2 = '{$p_wsp_apv_tnum2}', ";
    $query .= "wsp_ex_end_date1 = '{$p_wsp_ex_end_date1}', ";
    $query .= "wsp_ex_end_date2 = '{$p_wsp_ex_end_date2}', ";
    // $query .= "wsp_rm_end_date1 = '{$p_wsp_rm_end_date1}', ";
    // $query .= "wsp_rm_end_date2 = '{$p_wsp_rm_end_date2}', ";
    $query .= "wsp_close = '{$p_wsp_close}', ";
    $query .= "wsp_ex_remark1 = '{$p_wsp_ex_remark1}', ";
    $query .= "wsp_ex_remark2 = '{$p_wsp_ex_remark2}', ";
    $query .= "wsp_files = '{$timestamped_filesname_string}' ";
    
    $query .= "WHERE wsp_id = '{$the_wsp_id}' ";

    $update_project = mysqli_query($connection, $query);
    comfirmQuery($update_project, '編輯成功', null);

}

if(isset($_POST['delete_project'])){

    $filenameToDelete = $_POST['delete_filename'];
    $wsp_files_array = explode(",", $wsp_files);
    $wsp_files_array = array_diff($wsp_files_array, [$filenameToDelete]);
    $wsp_files_left = implode(",", $wsp_files_array);
 
    $query = "UPDATE $WSProject SET ";

    $query .= "wsp_files = '{$wsp_files_left}' ";
    
    $query .= "WHERE wsp_id = '{$the_wsp_id}' ";

    $delete_files = mysqli_query($connection, $query);
    comfirmQuery($delete_files, '刪除成功', null);
}

$query = "SELECT * FROM $WSProject WHERE wsp_id = $the_wsp_id";
$select_all_wsproject_query_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_wsproject_query_by_id)){

    $wsp_id = $row['wsp_id']; //序號

    // $wsp_unit = $row['wsp_unit']; //單位
    
    $wsp_vol_name = $row['wsp_vol_name']; //水土保持義務人名稱
    $wsp_vol_num = $row['wsp_vol_num']; //國民身分證統一編號或營利事業統一編號
    $wsp_vol_phone = $row['wsp_vol_phone']; //電話
    $wsp_vol_addr = $row['wsp_vol_addr']; //住居所或營業所
    $wsp_vol_email = $row['wsp_vol_email']; //電子郵件
    $wsp_vol = [$wsp_vol_name, $wsp_vol_num, $wsp_vol_phone, $wsp_vol_addr, $wsp_vol_email];

    $wsp_un_name = $row['wsp_un_name']; //承辦技師姓名
    $wsp_un_off = $row['wsp_un_off']; //技師職業機構或事務所
    $wsp_un_phone = $row['wsp_un_phone']; //電話
    $wsp_un_email = $row['wsp_un_email']; //電子郵件
    $wsp_un_date = $row['wsp_un_date']; //製作年月日
    

    if($wsp_un_date == "1970-01-01"){
        $wsp_un_date = "";
    }
    $wsp_un = [$wsp_un_name, $wsp_un_off, $wsp_un_phone, $wsp_un_email, $wsp_un_date];


    $wsp_pj_pur = $row['wsp_pj_pur']; //計畫目的
    $wsp_pj_scp = $row['wsp_pj_scp']; //計畫範圍
    $wsp_pj_sum = $row['wsp_pj_sum']; //開挖整地概述
    $wsp_pj_fac = $row['wsp_pj_fac']; //水土保持設施
    $wsp_pj_pre = $row['wsp_pj_pre']; //開發期間之防災措施
    $wsp_pj_way = $row['wsp_pj_way']; //預定施工方式
    $wsp_pj_cost = $row['wsp_pj_cost']; //水土保持計畫設施項目、數量及總工程造價
    $wsp_ad_remark = $row['wsp_ad_remark']; //行政備註
    $wsp_pj = [$wsp_pj_pur, $wsp_pj_scp, $wsp_pj_sum, $wsp_pj_fac, $wsp_pj_pre, $wsp_pj_way, $wsp_pj_cost];


    $wsp_name = $row['wsp_name']; //計畫名稱
    $wsp_num = $row['wsp_num']; //案件編號
    $wsp_pj_seat_county = $row['wsp_pj_seat_county']; //實施地點 土地座落 縣
    $wsp_pj_seat_town = $row['wsp_pj_seat_town']; //鄉市
    $wsp_pj_seat_alley = $row['wsp_pj_seat_alley']; //路段
    $wsp_pj_seat_no = $row['wsp_pj_seat_no']; //地號
    $wsp_pj_seat_count = $row['wsp_pj_seat_count']; //筆數
    $wsp_pj_own = $row['wsp_pj_own']; //土地權屬
    $wsp_pj_area = $row['wsp_pj_area']; //計畫面積
    $wsp_pj_co = $row['wsp_pj_co']; //土地座標
    $wsp_pj_add = $row['wsp_pj_add']; //土地新增
    // $wsp_pj_co_data = explode(",",ltrim(rtrim($wsp_pj_co,')' ),'('));

    $wsp_undertaker = $row['wsp_undertaker']; //承辦人

    $wsp_apy_date = $row['wsp_apy_date']; //申請日期
    $wsp_add_1 = $row['wsp_add_1']; //開工前輔導
    $wsp_add_2 = $row['wsp_add_2']; //期初檢查
    $wsp_add_3 = $row['wsp_add_3']; //施工中檢查
    $wsp_add_4 = $row['wsp_add_4']; //完工檢查
    if($wsp_apy_date == "1970-01-01"){
        $wsp_apy_date = "";
    }
    $wsp_apy_tnum = $row['wsp_apy_tnum']; //申請文號
    $wsp_apv_date = $row['wsp_apv_date']; //核准日期
    if($wsp_apv_date == "1970-01-01"){
        $wsp_apv_date = "";
    }
    $wsp_apv_tnum = $row['wsp_apv_tnum']; //核准文號
    $wsp_main_apv_date = $row['wsp_main_apv_date']; //目的事業主管機關核准日期
    $wsp_main_apv_tnum = $row['wsp_main_apv_tnum']; //目的事業主管機關核准文號
    $wsp_st_date = $row['wsp_st_date']; //應開工日期
    if($wsp_st_date == "1970-01-01"){
        $wsp_st_date = "";
    }
    $wsp_rm_st_date = $row['wsp_rm_st_date']; //提醒開工日期
    if($wsp_rm_st_date == "1970-01-01"){
        $wsp_rm_st_date = "";
    }
    $wsp_ac_st_date = $row['wsp_ac_st_date']; //實際開工日期
    if($wsp_ac_st_date == "1970-01-01"){
        $wsp_ac_st_date = "";
    }
    $wsp_end_date = $row['wsp_end_date']; //預定完工日期
    if($wsp_end_date == "1970-01-01"){
        $wsp_end_date = "";
    }
    $wsp_rm_end_date = $row['wsp_rm_end_date']; //提醒完工日期
    if($wsp_rm_end_date == "1970-01-01"){
        $wsp_rm_end_date = "";
    }
    $wsp_ac_end_date = $row['wsp_ac_end_date']; //實際完工日期
    if($wsp_ac_end_date == "1970-01-01"){
        $wsp_ac_end_date = "";
    }
    $wsp_rm_crew = $row['wsp_rm_crew']; //提醒通知人員
    $wsp_remark = $row['wsp_remark']; //備註

    // 第一二次展延
    $wsp_apy_date1 = $row['wsp_apy_date1']; //申請日期
    if($wsp_apy_date1 == "1970-01-01"){
        $wsp_apy_date1 = "";
    }
    $wsp_apy_date2 = $row['wsp_apy_date2']; //申請日期
    if($wsp_apy_date2 == "1970-01-01"){
        $wsp_apy_date2 = "";
    }
    $wsp_apy_tnum1 = $row['wsp_apy_tnum1']; //申請文號
    $wsp_apy_tnum2 = $row['wsp_apy_tnum2']; //申請文號

    $wsp_apv_date1 = $row['wsp_apv_date1']; //核准日期
    if($wsp_apv_date1 == "1970-01-01"){
        $wsp_apv_date1 = "";
    }
    $wsp_apv_date2 = $row['wsp_apv_date2']; //核准日期
    if($wsp_apv_date2 == "1970-01-01"){
        $wsp_apv_date2 = "";
    }
    $wsp_apv_tnum1 = $row['wsp_apv_tnum1']; //核准文號
    $wsp_apv_tnum2 = $row['wsp_apv_tnum2']; //核准文號

    $wsp_ex_end_date1 = $row['wsp_ex_end_date1']; //展延完工日期
    if($wsp_ex_end_date1 == "1970-01-01"){
        $wsp_ex_end_date1 = "";
    }
    $wsp_ex_end_date2 = $row['wsp_ex_end_date2']; //展延完工日期
    if($wsp_ex_end_date2 == "1970-01-01"){
        $wsp_ex_end_date2 = "";
    }
    $wsp_rm_end_date1 = $row['wsp_rm_end_date1']; //提醒完工日期
    if($wsp_rm_end_date1 == "1970-01-01"){
        $wsp_rm_end_date1 = "";
    }
    $wsp_rm_end_date2 = $row['wsp_rm_end_date2']; //提醒完工日期
    if($wsp_rm_end_date2 == "1970-01-01"){
        $wsp_rm_end_date2 = "";
    }

    $wsp_close = $row['wsp_close']; //結案與否
    $wsp_ex_remark1 = $row['wsp_ex_remark1']; //備註1
    $wsp_ex_remark2 = $row['wsp_ex_remark2']; //備註2

    $wsp_files = $row['wsp_files']; //顧問公司彙整歷次空拍資料pdf
    if (!empty($wsp_files)) {
        $wsp_files_array = explode(",", $wsp_files);
    } else {
        $wsp_files_array = "";
    }

}

// ALL USER
$queryUser = "SELECT * FROM userlist WHERE user_role = 'auther'";
$select_all_user_query = mysqli_query($connection, $queryUser);
$user_fullname = array(); 

while($row = mysqli_fetch_assoc($select_all_user_query)){


    $user_fullname[] = $row['user_fullname']; //姓名
}

// ALL DATA
$queryData = "SELECT wsp_pj_seat_town, wsp_pj_seat_alley, wsp_pj_seat_no FROM $WSProject";
$select_all_wsp_query = mysqli_query($connection, $queryData);
$your_database_data = array();
while ($row = mysqli_fetch_assoc($select_all_wsp_query)) {
    $your_database_data[] = $row;
}
?>

<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <h1 class="h4 mb-4">編輯 水土保持計畫案件 <?php echo $wsp_num;?> <?php echo $wsp_name;?> <?php
                    if($wsp_close == "1"){
                        echo  "<span class='badge rounded-pill bg-primary'>已結案</span>";
                        $checked = "checked";
                        $checked_f = "";
                    }else{
                        echo  "<span class='badge rounded-pill bg-secondary'>未結案</span>";
                        $checked = "";
                        $checked_f = "checked";
                    }
                ?></h1>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="p-4 mb-4 bg-light text-dark rounded">
                <h2 class="h5 mb-4">水土保持計畫案件內容

                </h2>
                <div class="accordion accordion-flush mb-3" id="maincontent">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                水土保持計畫
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="flush-headingOne" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                                <label for="wsp_undertaker" class="col-form-label">案件承辦人員 <span class='text-danger'>*</span></label>
                                <select id="wsp_undertaker_select" name="wsp_undertaker" class="form-select">
                                    <?php if (empty($wsp_undertaker)): ?>
                                        <option value="" selected>請選擇承辦人員</option>
                                    <?php endif; ?>
        
                                    <?php foreach ($user_fullname as $fullname): ?>
                                        <?php if ($fullname === $wsp_undertaker): ?>
                                            <option value="<?php echo $fullname; ?>" selected>
                                                <?php echo $fullname; ?>
                                            </option>
                                        <?php else: ?>
                                            <option value="<?php echo $fullname; ?>">
                                                <?php echo $fullname; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>   
                                <label for="wsp_num" class="col-form-label">案件編號</label>
                                <input id="wsp_num" name="wsp_num" type="text" class="form-control" value="<?php echo $wsp_num;?>"> 
                               

                                <label for="wsp_apy_date" class="col-form-label">申請日期

                                </label>
                                <label for="wsp_apy_date" class="input-group ">
                                    <!-- <input id="wsp_apy_date" type="date" onchange="convertToTWDateText(this.value, this.id)" style="display: none;"> -->
                                    <input type="date" class="form-control" name="wsp_apy_date" value="<?php echo $wsp_apy_date;?>">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </label>
                                <label for="wsp_apy_tnum" class="col-form-label">申請文號</label>
                                <input type="text" class="form-control" id="wsp_apy_tnum" name="wsp_apy_tnum" value="<?php echo $wsp_apy_tnum;?>" onchange="num(value)">


                                <label for="wsp_name" class=" col-form-label">計畫名稱 <span class='text-danger'>*</span></label>
                                <input type="text" class="form-control" id="wsp_name" name="wsp_name" value="<?php echo $wsp_name;?>" >

                                <label for="wss_pj_seat_county" class=" col-form-label">實施地點 土地座落</label>
                                <div class="input-group mb-2">

                                    <select class="form-select" id="wss_pj_seat_county" name="wsp_pj_seat_county">
                                        <option value="雲林縣" selected>雲林縣</option>
                                    </select>
                                    <select class="form-select" id="wss_pj_seat_town" name="wsp_pj_seat_town" >
                                        <?php
                                            $areaitem = '[{"area":"斗六市","value":"斗六市"},{"area":"古坑鄉","value":"古坑鄉"},{"area":"林內鄉","value":"林內鄉"}]';
                                            $areaitem_array = json_decode( $areaitem, true );
                                            
                                            foreach($areaitem_array as $item) { 
                                                $value = $item['value'];
                                                $area = $item['area'];

                                                if($wsp_pj_seat_town == $value){ 
                                                    $selected = "selected";
                                                }else{
                                                    $selected = "";
                                                }
                                                
                                                echo "<option value='$value' $selected >$area</option>";
                                            }
                                        ?>
                                    </select>
                                    <input id="road" type="hidden" value="<?php echo $wsp_pj_seat_alley?>">
                                    <select class="form-select" id="wss_pj_seat_alley" name="wsp_pj_seat_alley">
                                        <option value="" >請選擇</option>

                                        <?php
                                            if($wsp_pj_seat_town == "斗六市"){
                                                $alleyitem = '[{"area":"斗六市","road":"九老爺段","value":"九老爺段" },{"area":"斗六市","road":"八德段","value":"八德段" },{"area":"斗六市","road":"十三段","value":"十三段" },{"area":"斗六市","road":"三平段","value":"三平段" },{"area":"斗六市","road":"大北勢段大北勢小段","value":"大北勢段大北勢小段" },{"area":"斗六市","road":"大北勢段甲六埤小段","value":"大北勢段甲六埤小段" },{"area":"斗六市","road":"大北勢段林子頭小段","value":"大北勢段林子頭小段" },{"area":"斗六市","road":"大竹圍段","value":"大竹圍段" },{"area":"斗六市","road":"大崙段大崙小段","value":"大崙段大崙小段" },{"area":"斗六市","road":"大崙段茄苳腳小段","value":"大崙段茄苳腳小段" },{"area":"斗六市","road":"大潭段大潭小段","value":"大潭段大潭小段" },{"area":"斗六市","road":"大潭段社口小段","value":"大潭段社口小段" },{"area":"斗六市","road":"中興段","value":"中興段" },{"area":"斗六市","road":"內林段","value":"內林段" },{"area":"斗六市","road":"公正段","value":"公正段" },{"area":"斗六市","road":"斗六一段","value":"斗六一段" },{"area":"斗六市","road":"斗六二段","value":"斗六二段" },{"area":"斗六市","road":"斗六三段","value":"斗六三段" },{"area":"斗六市","road":"斗六段","value":"斗六段" },{"area":"斗六市","road":"水尾口段","value":"水尾口段" },{"area":"斗六市","road":"牛埔段","value":"牛埔段" },{"area":"斗六市","road":"北環段","value":"北環段" },{"area":"斗六市","road":"半路段","value":"半路段" },{"area":"斗六市","road":"正心段","value":"正心段" },{"area":"斗六市","road":"石牛溪段","value":"石牛溪段" },{"area":"斗六市","road":"石農段","value":"石農段" },{"area":"斗六市","road":"石榴段","value":"石榴段" },{"area":"斗六市","road":"石榴班段","value":"石榴班段" },{"area":"斗六市","road":"光明段","value":"光明段" },{"area":"斗六市","road":"光復段","value":"光復段" },{"area":"斗六市","road":"竹圍子段","value":"竹圍子段" },{"area":"斗六市","road":"竹頭段","value":"竹頭段" },{"area":"斗六市","road":"自強段","value":"自強段" },{"area":"斗六市","road":"西平段","value":"西平段" },{"area":"斗六市","road":"秀才段","value":"秀才段" },{"area":"斗六市","road":"府文段","value":"府文段" },{"area":"斗六市","road":"明德段","value":"明德段" },{"area":"斗六市","road":"林子頭段林子頭小段","value":"林子頭段林子頭小段" },{"area":"斗六市","road":"林子頭段番子溝小段","value":"林子頭段番子溝小段" },{"area":"斗六市","road":"林頭段","value":"林頭段" },{"area":"斗六市","road":"虎溪段","value":"虎溪段" },{"area":"斗六市","road":"長平段","value":"長平段" },{"area":"斗六市","road":"長安段","value":"長安段" },{"area":"斗六市","road":"保庄段","value":"保庄段" },{"area":"斗六市","road":"保長廍段后庄子小段","value":"保長廍段后庄子小段" },{"area":"斗六市","road":"保長廍段虎尾溪小段","value":"保長廍段虎尾溪小段" },{"area":"斗六市","road":"保長廍段保長廍小段","value":"保長廍段保長廍小段" },{"area":"斗六市","road":"咬狗北段","value":"咬狗北段" },{"area":"斗六市","road":"咬狗庄段","value":"咬狗庄段" },{"area":"斗六市","road":"咬狗段","value":"咬狗段" },{"area":"斗六市","road":"建成段","value":"建成段" },{"area":"斗六市","road":"後庄段","value":"後庄段" },{"area":"斗六市","road":"科一段","value":"科一段" },{"area":"斗六市","road":"科二段","value":"科二段" },{"area":"斗六市","road":"科工段","value":"科工段" },{"area":"斗六市","road":"科加段","value":"科加段" },{"area":"斗六市","road":"貞寮段","value":"貞寮段" },{"area":"斗六市","road":"重光東段","value":"重光東段" },{"area":"斗六市","road":"重光段","value":"重光段" },{"area":"斗六市","road":"海豐崙段朱丹灣小段","value":"海豐崙段朱丹灣小段" },{"area":"斗六市","road":"海豐崙段海豐崙小段","value":"海豐崙段海豐崙小段" },{"area":"斗六市","road":"秦寮段","value":"秦寮段" },{"area":"斗六市","road":"埤口段","value":"埤口段" },{"area":"斗六市","road":"崙仔段","value":"崙仔段" },{"area":"斗六市","road":"崙北段","value":"崙北段" },{"area":"斗六市","road":"崙南段","value":"崙南段" },{"area":"斗六市","road":"梅林西段","value":"梅林西段" },{"area":"斗六市","road":"梅林東段","value":"梅林東段" },{"area":"斗六市","road":"梅南段","value":"梅南段" },{"area":"斗六市","road":"湖山段","value":"湖山段" },{"area":"斗六市","road":"菜公段","value":"菜公段" },{"area":"斗六市","road":"雲林溪段","value":"雲林溪段" },{"area":"斗六市","road":"黃厝段","value":"黃厝段" },{"area":"斗六市","road":"新虎溪段","value":"新虎溪段" },{"area":"斗六市","road":"新溪洲段","value":"新溪洲段" },{"area":"斗六市","road":"溝子埧段瓦厝子小段","value":"溝子埧段瓦厝子小段" },{"area":"斗六市","road":"溝子埧段柴裡小段","value":"溝子埧段柴裡小段" },{"area":"斗六市","road":"溝子埧段溝子埧小段","value":"溝子埧段溝子埧小段" },{"area":"斗六市","road":"溝垻段","value":"溝垻段" },{"area":"斗六市","road":"溪洲段","value":"溪洲段" },{"area":"斗六市","road":"萬年西段","value":"萬年西段" },{"area":"斗六市","road":"萬年東段","value":"萬年東段" },{"area":"斗六市","road":"嘉東段","value":"嘉東段" },{"area":"斗六市","road":"榴中段","value":"榴中段" },{"area":"斗六市","road":"榴北段","value":"榴北段" },{"area":"斗六市","road":"劉厝段","value":"劉厝段" },{"area":"斗六市","road":"龍潭段","value":"龍潭段" },{"area":"斗六市","road":"鎮西段","value":"鎮西段"}]';
                                            }elseif($wsp_pj_seat_town == "古坑鄉"){
                                                $alleyitem = '[{"area":"古坑鄉","road":"下崁腳段","value":"下崁腳段" },{"area":"古坑鄉","road":"下麻園段","value":"下麻園段" },{"area":"古坑鄉","road":"大湖口段","value":"大湖口段" },{"area":"古坑鄉","road":"大湖底段","value":"大湖底段" },{"area":"古坑鄉","road":"中洲段","value":"中洲段" },{"area":"古坑鄉","road":"水碓西段","value":"水碓西段" },{"area":"古坑鄉","road":"水碓東段","value":"水碓東段" },{"area":"古坑鄉","road":"水碓段","value":"水碓段" },{"area":"古坑鄉","road":"水碓新段","value":"水碓新段" },{"area":"古坑鄉","road":"古坑段古坑小段","value":"古坑段古坑小段" },{"area":"古坑鄉","road":"古坑段湳子小段","value":"古坑段湳子小段" },{"area":"古坑鄉","road":"永光段","value":"永光段" },{"area":"古坑鄉","road":"永昌段","value":"永昌段" },{"area":"古坑鄉","road":"永興段","value":"永興段" },{"area":"古坑鄉","road":"田心段","value":"田心段" },{"area":"古坑鄉","road":"石坑段","value":"石坑段" },{"area":"古坑鄉","road":"尖山坑段","value":"尖山坑段" },{"area":"古坑鄉","road":"西華段","value":"西華段" },{"area":"古坑鄉","road":"東和段","value":"東和段" },{"area":"古坑鄉","road":"東陽段","value":"東陽段" },{"area":"古坑鄉","road":"東興段","value":"東興段" },{"area":"古坑鄉","road":"青山段","value":"青山段" },{"area":"古坑鄉","road":"南昌段","value":"南昌段" },{"area":"古坑鄉","road":"建德段","value":"建德段" },{"area":"古坑鄉","road":"苦苓腳段","value":"苦苓腳段" },{"area":"古坑鄉","road":"崁腳段","value":"崁腳段" },{"area":"古坑鄉","road":"崁頭厝段","value":"崁頭厝段" },{"area":"古坑鄉","road":"草嶺段","value":"草嶺段" },{"area":"古坑鄉","road":"高林北段","value":"高林北段" },{"area":"古坑鄉","road":"高林南段","value":"高林南段" },{"area":"古坑鄉","road":"高厝林子頭段","value":"高厝林子頭段" },{"area":"古坑鄉","road":"荷苞段","value":"荷苞段" },{"area":"古坑鄉","road":"頂新庄段","value":"頂新庄段" },{"area":"古坑鄉","road":"麻園庄段","value":"麻園庄段" },{"area":"古坑鄉","road":"麻園段","value":"麻園段" },{"area":"古坑鄉","road":"棋山段","value":"棋山段" },{"area":"古坑鄉","road":"棋東段","value":"棋東段" },{"area":"古坑鄉","road":"棋盤段","value":"棋盤段" },{"area":"古坑鄉","road":"棋盤厝段","value":"棋盤厝段" },{"area":"古坑鄉","road":"湳子段","value":"湳子段" },{"area":"古坑鄉","road":"新生段","value":"新生段" },{"area":"古坑鄉","road":"新光段","value":"新光段" },{"area":"古坑鄉","road":"新庄段","value":"新庄段" },{"area":"古坑鄉","road":"新園段","value":"新園段" },{"area":"古坑鄉","road":"溪邊厝段","value":"溪邊厝段" },{"area":"古坑鄉","road":"樟湖段","value":"樟湖段" }]';
                                            }elseif($wsp_pj_seat_town == "林內鄉"){
                                                $alleyitem = '[{"area":"林內鄉","road":"九芎林段","value":"九芎林段" },{"area":"林內鄉","road":"九芎南段","value":"九芎南段" },{"area":"林內鄉","road":"九芎段","value":"九芎段" },{"area":"林內鄉","road":"中山段","value":"中山段" },{"area":"林內鄉","road":"仁愛段","value":"仁愛段" },{"area":"林內鄉","road":"永昌段","value":"永昌段" },{"area":"林內鄉","road":"成功段","value":"成功段" },{"area":"林內鄉","road":"芎林段","value":"芎林段" },{"area":"林內鄉","road":"芎蕉段","value":"芎蕉段" },{"area":"林內鄉","road":"林內段","value":"林內段" },{"area":"林內鄉","road":"長興段","value":"長興段" },{"area":"林內鄉","road":"重興段","value":"重興段" },{"area":"林內鄉","road":"烏麻段","value":"烏麻段" },{"area":"林內鄉","road":"烏塗子段","value":"烏塗子段" },{"area":"林內鄉","road":"烏塗段","value":"烏塗段" },{"area":"林內鄉","road":"頂庄段","value":"頂庄段" },{"area":"林內鄉","road":"湖山寮段","value":"湖山寮段" },{"area":"林內鄉","road":"湖本段","value":"湖本段" },{"area":"林內鄉","road":"進興段","value":"進興段" },{"area":"林內鄉","road":"新興段","value":"新興段" },{"area":"林內鄉","road":"寶隆段","value":"寶隆段" }]';
                                            }
                                            
                                            $alleyitem_array = json_decode( $alleyitem, true );
                                            
                                            foreach($alleyitem_array as $item) { 
                                                $area = $item['area'];
                                                $value = $item['value'];
                                                $road = $item['road'];

                                                if($wsp_pj_seat_alley == $value){ 
                                                    $selected = "selected";
                                                }else{
                                                    $selected = "";
                                                }
                                                
                                                echo "<option value='$value' $selected >$road</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="input-group mb-2">
                                    <input id="wsp_pj_seat_no" type="text" class="form-control" name="wsp_pj_seat_no" placeholder="請輸入地號" value="<?php echo $wsp_pj_seat_no;?>">
                                    <input type="text" class="form-control" name="wsp_pj_seat_count" placeholder="土地筆數" value="<?php echo $wsp_pj_seat_count;?>">
                                    <span class="input-group-text" >筆</span>
                                </div>
                                <label for="wsp_pj_own" class=" col-form-label">土地權屬</label>
                                <input type="text" class="form-control" id="wsp_pj_own" name="wsp_pj_own" value="<?php echo $wsp_pj_own;?>" >
                                <label for="wsp_pj_area" class="col-form-label">計畫面積</label>
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="wsp_pj_area" name="wsp_pj_area" value="<?php echo $wsp_pj_area;?>">
                                    <span class="input-group-text" >公頃</span>
                                </div>
                                <label for="latlng" class=" col-form-label">土地座標 (TWD97) <span class='text-danger'>*</span></label>
                                <div class="input-group ">
                                    <input id="latlng" type="text" class="form-control" name="wsp_pj_co" data-lat="23.6743232" data-lng="120.4345919" value="<?php echo $wsp_pj_co;?>" >
                                    <span class="input-group-text" ><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <div id="map" style="width: 100%; height: 60vh;"></div>
                                <label for="wsp_pj_add" class=" col-form-label">土地新增</label>
                                <input type="text" class="form-control" id="wsp_pj_add" name="wsp_pj_add" value="<?php echo $wsp_pj_add;?>" >
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                水土保持義務人
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingTwo" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                            <?php
                                $vol = '[{"title_cn":"水土保持義務人名稱","title_en":"wsp_vol_name","type":"text","required":"false"},
                                {"title_cn":"國民身分證統一編號或營利事業統一編號","title_en":"wsp_vol_num","type":"text","required":"false"},
                                {"title_cn":"電話","title_en":"wsp_vol_phone","type":"phone","required":"false"},
                                {"title_cn":"住居所或營業所","title_en":"wsp_vol_addr","type":"text","required":"false"},
                                {"title_cn":"電子郵件","title_en":"wsp_vol_email","type":"email","required":"false"}]';
                                $vol_array = json_decode( $vol, true );

                                foreach($vol_array as $key=>$item) { 
                                    $title_cn = $item['title_cn']; 
                                    $title_en = $item['title_en']; 
                                    $type = $item['type']; 
                                    // $required = $item['required']; 
                                    // if ($required == 'true'){
                                        // $required = "required";
                                        $star = "<span class='text-danger'>*</spn>";
                                    // }else{
                                        $required = "";
                                        // $star = "";
                                    // }
                                    echo "<label for='$title_en' class='col-form-label'>$title_cn $star</label>";
                                    echo "<input id='$title_en' name='$title_en' type='$type' class='form-control' $required value='$wsp_vol[$key]'>";
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                承辦單位
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingThree" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                            <?php
                                $ag = '[{"title_cn":"承辦技師姓名","title_en":"wsp_un_name","type":"text","required":"false"},
                                {"title_cn":"技師職業機構或事務所","title_en":"wsp_un_off","type":"text","required":"false"},
                                {"title_cn":"電話","title_en":"wsp_un_phone","type":"phone","required":"false"},
                                {"title_cn":"電子郵件","title_en":"wsp_un_email","type":"email","required":"false"},
                                {"title_cn":"製作年月日","title_en":"wsp_un_date","type":"date","required":"false"}]';
                                $ag_array = json_decode( $ag, true );

                                foreach($ag_array as $key=>$item) { 
                                    $title_cn = $item['title_cn']; 
                                    $title_en = $item['title_en']; 
                                    $type = $item['type']; 
                                    // $required = $item['required']; 
                                    // if ($required == 'true'){
                                        // $required = "required";
                                        $star = "<span class='text-danger'>*</spn>";
                                    // }else{
                                        $required = "";
                                        // $star = "";
                                    // }
                                    echo "<label for='$title_en' class='col-form-label'>$title_cn $star</label>";
                                    echo "<input id='$title_en' name='$title_en' type='$type' class='form-control' $required value='$wsp_un[$key]'>";
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseFour">
                                計畫內容概述
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingFour" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                            <?php
                                $pd = '[{"title_cn":"計畫目的","title_en":"wsp_pj_pur"},
                                    {"title_cn":"計畫範圍","title_en":"wsp_pj_scp"},
                                    {"title_cn":"開挖整地概述","title_en":"wsp_pj_sum"},
                                    {"title_cn":"水土保持設施","title_en":"wsp_pj_fac"},
                                    {"title_cn":"開發期間之防災措施","title_en":"wsp_pj_pre"},
                                    {"title_cn":"預定施工方式","title_en":"wsp_pj_way"},
                                    {"title_cn":"水土保持計畫設施項目、數量及總工程造價","title_en":"wsp_pj_cost"}]';
                                $pd_array = json_decode( $pd, true );

                                foreach($pd_array as $key=>$item) { 
                                    $title_cn = $item['title_cn']; 
                                    $title_en = $item['title_en']; 
        
                                    echo "<label for='$title_en' class='col-form-label'>$title_cn</label>";
                                    echo "<textarea class='form-control' name='$title_en' id='$title_en'>$wsp_pj[$key]</textarea>";
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFive" aria-expanded="false"
                                aria-controls="flush-collapseFive">
                                行政備註
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingFive" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                                <label for="wsp_ad_remark" class="col-form-label">行政備註</label>
                                <textarea rows="6" class="form-control" name="wsp_ad_remark" id="wsp_ad_remark" ><?php echo $wsp_ad_remark;?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseSix" aria-expanded="false"
                                aria-controls="flush-collapseSix">
                                上傳檔案
                            </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingSix" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                                <label for="wsp_files" class="col-form-label">上傳檔案</label>
                                <input type="file" class="form-control" id="wsp_files" name="wsp_files[]" multiple>

                                <div >
                                <?php
                                if (!empty($wsp_files_array) && !in_array("", $wsp_files_array, true)) {
                                    foreach ($wsp_files_array as $filename) {
                                        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
                                        
                                        if (in_array($file_extension, ['jpg', 'png', 'JPG', 'PNG', 'SVG', 'svg'], true)) {
                                            
                                        } else {
                                            // 如果不是圖片，顯示按鈕
                                            echo "<a class='btn btn-sm btn-primary' href='./assets/imgs/$filename' download>$filename</a>";
                                            echo "<input class='btn btn-sm btn-danger delete-button' data-filename='$filename' type='submit' name='delete_project' value='刪除'> </br>";
                                        }
                                    }
                                } 
                                ?>
                                <?php
                                if (!empty($wsp_files_array) && !in_array("", $wsp_files_array, true)) {
                                    foreach ($wsp_files_array as $filename) {
                                        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
                                        
                                        if (in_array($file_extension, ['jpg', 'png', 'JPG', 'PNG', 'SVG', 'svg'], true)) {
                                            // 如果是圖片，使用 figure 標籤顯示
                                            echo "<figure class='figure' style='margin-right: 10px;'>";
                                            echo "<img src='./assets/imgs/$filename' class='figure-img img-fluid rounded' alt='$filename'>";
                                            echo "<figcaption class='figure-caption'>$filename</figcaption>";
                                            echo "<a class='btn btn-sm btn-primary' href='./assets/imgs/$filename' download>下載</a>";
                                            echo "<input class='btn btn-sm btn-danger delete-button' data-filename='$filename' type='submit' name='delete_project' value='刪除'>";
                                            echo "</figure>";
                                        } 
                                    }
                                } 
                                ?>


                                </div>
                                <input type="hidden" name="delete_filename" id="delete-filename" value="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 mb-2 bg-light text-dark rounded">
                <h2 class="h5 mb-4">主管機關辦理情形
                </h2>
                
                <div class="accordion accordion-flush mb-3" id="competent">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseNine" aria-expanded="false"
                                aria-controls="flush-collapseNine"> 主管機關辦理情形
                            </button>
                        </h2>
                        <div id="flush-collapseNine" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingNine" data-bs-parent="#competent">
                            <div class="accordion-body">
                                <label for="undertaker" class="col-form-label">案件承辦人員 <span class='text-danger'>*</span>
                                </label>
                                <input id="undertaker" name="undertaker" type="text" class="form-control" value="<?php echo $wsp_undertaker;?>" disabled>
                                <label for="wsp_apy_date" class="col-form-label">申請日期
                                </label>
                                <div class="input-group">
                                    <input id="wsp_apy_date" type="date" class="form-control" name="wsp_apy_date" value="<?php echo $wsp_apy_date;?>" disabled>
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="apy_tnum" class="col-form-label">申請文號</label>
                                <input type="text" class="form-control" id="apy_tnum" name="apy_tnum" value="<?php echo $wsp_apy_tnum;?>" disabled>

                                <label for="wsp_apv_date" class="col-form-label">核准日期</label>
                                <div class="input-group">
                                    <input id="wsp_apv_date" type="date" class="form-control" name="wsp_apv_date" value="<?php echo $wsp_apv_date;?>" onchange="apy(value)">
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_apv_tnum" class="col-form-label">核准文號</label>
                                <input type="text" class="form-control" id="wsp_apv_tnum" name="wsp_apv_tnum" value="<?php echo $wsp_apv_tnum;?>">
                                <label for="wsp_main_apv_date" class="col-form-label">目的事業主管機關核准日期</label>
                                <div class="input-group ">
                                    <input id="wsp_main_apv_date" type="date" class="form-control" name="wsp_main_apv_date" value="<?php echo $wsp_main_apv_date;?>">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_main_apv_tnum" class="col-form-label">目的事業主管機關核准文號</label>
                                <input type="text" class="form-control" id="wsp_main_apv_tnum" name="wsp_main_apv_tnum" value="<?php echo $wsp_main_apv_tnum;?>">
                                <label for="wsp_st_date" class="col-form-label">應開工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_st_date" type="date" class="form-control" name="wsp_st_date" value="<?php echo $wsp_st_date;?>">
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_rm_st_date" class="col-form-label">提醒開工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_rm_st_date" type="date" class="form-control" name="wsp_rm_st_date" value="<?php echo $wsp_rm_st_date;?>">
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_ac_st_date" class="col-form-label">實際開工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_ac_st_date" type="date" class="form-control" name="wsp_ac_st_date" value="<?php echo $wsp_ac_st_date;?>">
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_end_date" class="col-form-label">預定完工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_end_date" type="date" class="form-control" name="wsp_end_date" value="<?php echo $wsp_end_date;?>" onchange="end(value)">
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_rm_end_date" class="col-form-label">提醒完工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_rm_end_date" type="date" class="form-control" name="wsp_rm_end_date"  value="<?php echo $wsp_rm_end_date;?>">
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_ac_end_date" class="col-form-label">實際完工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_ac_end_date" type="date" class="form-control" name="wsp_ac_end_date" value="<?php echo $wsp_ac_end_date;?>">
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_rm_crew" class="col-form-label">提醒通知人員</label>
                                <div class="input-group ">
                                    <input id="wsp_rm_crew" type="text" class="form-control" name="wsp_rm_crew" value="<?php echo $wsp_rm_crew;?>">
                                    <span class="input-group-text" ><i class="fas fa-user"></i></span>
                                </div>
                                <label for="wsp_add_1" class="col-form-label">開工前輔導</label>
                                <input type="text" class="form-control" id="wsp_add_1" name="wsp_add_1" value="<?php echo $wsp_add_1;?>">
                                <label for="wsp_add_2" class="col-form-label">期初檢查</label>
                                <input type="text" class="form-control" id="wsp_add_2" name="wsp_add_2" value="<?php echo $wsp_add_2;?>">
                                <label for="wsp_add_3" class="col-form-label">施工中檢查</label>
                                <input type="text" class="form-control" id="wsp_add_3" name="wsp_add_3" value="<?php echo $wsp_add_3;?>">
                                <label for="wsp_add_4" class="col-form-label">完工檢查</label>
                                <input type="text" class="form-control" id="wsp_add_4" name="wsp_add_4" value="<?php echo $wsp_add_4;?>">
                                <label for="wsp_rm_crew" class="col-form-label">案件進度

                                    <?php
                                        if($wsp_close == "1"){
                                            echo  "<span class='badge rounded-pill text-primary'>已結案</span>";
                                            $checked = "checked";
                                            $checked_f = "";
                                        }else{
                                            echo  "<span class='badge rounded-pill bg-light text-dark'>未結案</span>";
                                            $checked = "";
                                            $checked_f = "checked";
                                        }
                                    ?>
                                </label>
                                <div class="input-group ">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsp_close" id="wsp_closed" <?php echo $checked;?> value="1">
                                        <label class="form-check-label" for="wsp_closed">已結案</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsp_close" id="wsp_unclose" <?php echo $checked_f;?>  value="0">
                                        <label class="form-check-label" for="wsp_unclose">辦理中</label>
                                
                                    </div>
				                    <div class="form-check form-check-inline">
                                    	<input class="form-check-input" type="radio" name="wsp_close" id="wsp_auto_close" value="1">
                                    	<label class="form-check-label" for="wsp_auto_close">系統結案</label>
                                    </div>
                                </div>
                  
                            </div>

                        </div>
                    </div>
                    <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseEight" aria-expanded="false"
                                    aria-controls="flush-collapseEight">
                                    備註
                                </button>
                            </h2>
                            <div id="flush-collapseEight" class="accordion-collapse collapse "
                                aria-labelledby="flush-headingEight" data-bs-parent="#competent">
                                <div class="accordion-body">
                                    <label for="wsp_remark" class="col-form-label">備註</label>
                                    <textarea class="form-control" name="wsp_remark" id="wsp_remark"><?php echo $wsp_remark;?></textarea>
                                </div>
                            </div>
                        </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="extend-heading1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#extend-collapse1" aria-expanded="false" aria-controls="extend-collapse1">第1次展延</button>
                        </h2>
                        <div id="extend-collapse1" class="accordion-collapse collapse" aria-labelledby="extend-heading1" data-bs-parent="#competent">
                            <div class="accordion-body">
                                <label for="wsp_apy_date1" class="col-form-label">申請日期</label>
                                <div class="input-group ">
                                    <input id="wsp_apy_date1" type="date" class="form-control" name="wsp_apy_date1" value="<?php echo $wsp_apy_date1;?>"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_apy_tnum1" class="col-form-label">申請文號</label> 
                                    <input type="text" class="form-control" id="wsp_apy_tnum1" name="wsp_apy_tnum1" value="<?php echo $wsp_apy_tnum1;?>"> 
                                <label for="wsp_apv_date1" class="col-form-label">核准日期</label>
                                <div class="input-group ">
                                    <input id="wsp_apv_date1" type="date" class="form-control" name="wsp_apv_date1" value="<?php echo $wsp_apv_date1;?>"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_apv_tnum1" class="col-form-label">核准文號</label> 
                                <input type="text" class="form-control" id="wsp_apv_tnum1" name="wsp_apv_tnum1" value="<?php echo $wsp_apv_tnum1;?>"> 
                                <label for="wsp_ex_end_date1" class="col-form-label">展延完工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_ex_end_date1" type="date" class="form-control" name="wsp_ex_end_date1" value="<?php echo $wsp_ex_end_date1;?>" onchange="end(value)"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <!-- <label for="wsp_rm_end_date1" class="col-form-label">提醒完工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_rm_end_date1" type="date" class="form-control" name="wsp_rm_end_date1" value="<?php echo $wsp_rm_end_date1;?>"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div> -->
                                <label for="wsp_ex_remark1" class="col-form-label">備註</label>
                                <textarea class="form-control" name="wsp_ex_remark1" id="wsp_ex_remark1" ><?php echo $wsp_ex_remark1;?></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="extend-heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#extend-collapse2" aria-expanded="false" aria-controls="extend-collapse2">第2次展延</button>
                        </h2>
                        <div id="extend-collapse2" class="accordion-collapse collapse" aria-labelledby="extend-heading2" data-bs-parent="#competent">
                            <div class="accordion-body">
                                <label for="wsp_apy_date2" class="col-form-label">申請日期</label>
                                <div class="input-group ">
                                    <input id="wsp_apy_date2" type="date" class="form-control" name="wsp_apy_date2" value="<?php echo $wsp_apy_date2;?>"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_apy_tnum2" class="col-form-label">申請文號</label> 
                                    <input type="text" class="form-control" id="wsp_apy_tnum2" name="wsp_apy_tnum2" value="<?php echo $wsp_apy_tnum2;?>"> 
                                <label for="wsp_apv_date2" class="col-form-label">核准日期</label>
                                <div class="input-group ">
                                    <input id="wsp_apv_date2" type="date" class="form-control" name="wsp_apv_date2" value="<?php echo $wsp_apv_date2;?>"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_apv_tnum2" class="col-form-label">核准文號</label> 
                                <input type="text" class="form-control" id="wsp_apv_tnum2" name="wsp_apv_tnum2" value="<?php echo $wsp_apv_tnum2;?>"> 
                                <label for="wsp_ex_end_date2" class="col-form-label">展延完工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_ex_end_date2" type="date" class="form-control" name="wsp_ex_end_date2" value="<?php echo $wsp_ex_end_date2;?>" onchange="end(value)"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <!-- <label for="wsp_rm_end_date2" class="col-form-label">提醒完工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_rm_end_date2" type="date" class="form-control" name="wsp_rm_end_date2" value="<?php echo $wsp_rm_end_date2;?>"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div> -->
                                <label for="wsp_ex_remark2" class="col-form-label">備註</label>
                                <textarea class="form-control" name="wsp_ex_remark2" id="wsp_ex_remark2" ><?php echo $wsp_ex_remark2;?></textarea>

                            </div>
                        </div>
                    </div>
                </div> 

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-secondary " href="WSProject.php"><i
                            class="fas fa-times-circle me-2"></i>取消</a>
                    <input class="btn btn-primary" type="submit" name="update_project" value="儲存">
                    <!-- <button class="btn btn-dark " type="button"><i class="fas fa-file-export me-2"></i>匯出</button> -->
                </div>
            </div>
            </form>

        </div>
    </div>

</main>
<script src="./assets/map.js"></script>
<script>

    var locs = document.getElementById('latlng').value;
    var latlan_arr = locs.split(",");

    var TT = UTM2LatLon(latlan_arr[0], latlan_arr[1], 0, 0);
    var X84 = Number(TT[0]);
    var Y84 = Number(TT[1]);
    loc = [ X84 , Y84 ]

    // map.attributionControl.setPrefix(false);
    // var marker = new L.circleMarker(loc, {
    //     draggable: false
    // }).setStyle({color: 'red'});
    // map.addLayer(marker);
    L.marker(loc).addTo(map)
    .bindPopup('專案位置:<br/>緯度：'+ X84+'<br/>經度：'+Y84+'', {minWidth : 200})
    .openPopup();

    map.setView(loc);
</script>
<script src="./assets/street.js"></script>
<script>

    // 刪除圖片
        document.addEventListener("DOMContentLoaded", function() {
        const deleteButtons = document.querySelectorAll(".delete-button");
        const deleteFilenameInput = document.getElementById("delete-filename");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function() {
                const filenameToDelete = this.getAttribute("data-filename");
                deleteFilenameInput.value = filenameToDelete;
            });
        });
    });

    // 確認土地位置是否重複
    document.addEventListener("DOMContentLoaded", function() {
        var townSelect = document.getElementById("wss_pj_seat_town");
        var alleySelect = document.getElementById("wss_pj_seat_alley");
        // var seatNoInput = document.getElementById("wss_pj_seat_no");

        townSelect.addEventListener("change", checkForDuplicates);
        alleySelect.addEventListener("change", checkForDuplicates);
        // seatNoInput.addEventListener("change", checkForDuplicates);

        function checkForDuplicates() {
            var selectedTown = townSelect.value;
            var selectedAlley = alleySelect.value;
            var selectedSeatNo = seatNoInput.value;

            if (selectedTown !== '' && selectedAlley !== '' && selectedSeatNo !== '') {
                var isDuplicate = your_database_data.some(function (data) {
                    return (
                        data.wss_pj_seat_town === selectedTown &&
                        data.wss_pj_seat_alley === selectedAlley &&
                        data.wss_pj_seat_no === selectedSeatNo
                    );
                });

                if (isDuplicate) {
                    alert("已存在相同的地點座落和座號。");
                }
            }
        }

        var your_database_data = <?php echo json_encode($your_database_data); ?>;

    });
    


    const undertakerSelect = document.getElementById("wsp_undertaker_select");
    const selectedUndertaker = document.getElementById("undertaker");
    const wspRmCrew = document.getElementById("wsp_rm_crew");

    undertakerSelect.addEventListener("change", function() {
        const selectedValue = undertakerSelect.value;
        selectedUndertaker.value = selectedValue;
        wspRmCrew.value = selectedValue + '、張雅琴';

    });


    document.addEventListener("DOMContentLoaded", function() {
        var townSelect = document.getElementById("wss_pj_seat_town");
        var alleySelect = document.getElementById("wss_pj_seat_alley");
        var seatNoInput = document.getElementById("wsp_pj_seat_no");

        townSelect.addEventListener("change", checkForDuplicates);
        alleySelect.addEventListener("change", checkForDuplicates);
        seatNoInput.addEventListener("change", checkForDuplicates);

    
        function checkForDuplicates() {
            var selectedTown = townSelect.value;
            var selectedAlley = alleySelect.value;
            var selectedSeatNo = seatNoInput.value;
            
            if (selectedTown !== '' && selectedAlley !== '' && selectedSeatNo !== '') {
                var isDuplicate = your_database_data.some(function (data) {
                    return (
                        data.wsp_pj_seat_town === selectedTown &&
                        data.wsp_pj_seat_alley === selectedAlley &&
                        data.wsp_pj_seat_no === selectedSeatNo
                    );
                });

                if (isDuplicate) {
                    alert("已存在相同的地點座落和座號。");
                }
            }
        }

        var your_database_data = <?php echo json_encode($your_database_data); ?>;

    });

    
    function convertDate(date) {
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth()+1).toString();
        var dd  = date.getDate().toString();
        
        var mmChars = mm.split('');
        var ddChars = dd.split('');
        
        return yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
    }
    

    // 申請申報日期
    function de(val){
        document.getElementById('wsp_apy_date').value = val; 
    }
    // 申請文號
    function num(val){
        document.getElementById('apy_tnum').value = val; 
    }


    function rmd(){
        date2 = new Date(document.getElementById('wsp_st_date').value)
        rm = date2.setDate(date2.getDate()-20)
        rm_d = new Date(rm)
        wsp_rm_st_date = convertDate(rm_d)
        document.getElementById('wsp_rm_st_date').value = wsp_rm_st_date; 

    }
    // 應開工日期
    function apy(val){
        date = new Date(val)
        st = date.setDate(date.getDate()+365)
        st_d = new Date(st)

        wsp_st_date = convertDate(st_d)
        document.getElementById('wsp_st_date').value = wsp_st_date; 
        rmd();

    }
    // 提醒完工日期
    function end(val){
        date = new Date(val)
        wsp_end_date = convertDate(date)
        document.getElementById('wsp_end_date').value = wsp_end_date; 

        rm_end = date.setDate(date.getDate()-20)
        rm_end_d = new Date(rm_end)
        wsp_rm_end_date = convertDate(rm_end_d)
        document.getElementById('wsp_rm_end_date').value = wsp_rm_end_date; 
        
    }

    function convertToTWDateText(value, targetId) {
        var adDate = new Date(value);
        
        var twYear = adDate.getFullYear() - 1911;
        var twDate = twYear + adDate.toLocaleDateString('zh-TW', { year: 'numeric', month: '2-digit', day: '2-digit' }).substring(4);

        var inputs = document.getElementsByName(targetId);
        if (inputs && inputs.length > 0) {
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].value = twDate;
            }
        }
    }





</script>

