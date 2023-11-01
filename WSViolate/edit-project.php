<?php 
if(isset($_GET["pj_id"])){
    $the_wsv_id = $_GET["pj_id"];
}

$query = "SELECT * FROM $WSViolate WHERE wsv_id = $the_wsv_id";
$select_all_wsviolate_query_by_id = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_all_wsviolate_query_by_id)){

    $wsv_co_first_img_1 = $row['wsv_co_first_img_1']; //現場檢查照片
    if (!empty($wsv_co_first_img_1)) {
        $wsv_co_first_img_1_array = explode(",", $wsv_co_first_img_1);
    } else {
        $wsv_co_first_img_1_array = "";
    }
    $wsv_co_second_img_1 = $row['wsv_co_second_img_1']; //現場檢查照片
    if (!empty($wsv_co_second_img_1)) {
        $wsv_co_second_img_1_array = explode(",", $wsv_co_second_img_1);
    } else {
        $wsv_co_second_img_1_array = "";
    }
    $wsv_co_third_img_1 = $row['wsv_co_third_img_1']; //現場檢查照片
    if (!empty($wsv_co_third_img_1)) {
        $wsv_co_third_img_1_array = explode(",", $wsv_co_third_img_1);
    } else {
        $wsv_co_third_img_1_array = "";
    }
    $wsv_vio_live_photo = $row['wsv_vio_live_photo']; //現場檢查照片
    if (!empty($wsv_vio_live_photo)) {
        $wsv_vio_live_photo_array = explode(",", $wsv_vio_live_photo);
    } else {
        $wsv_vio_live_photo_array = "";
    }

    $wsv_vio_pdf = $row['wsv_vio_pdf']; //顧問公司彙整歷次空拍資料pdf
    if (!empty($wsv_vio_pdf)) {
        $wsv_vio_pdf_array = explode(",", $wsv_vio_pdf);
    } else {
        $wsv_vio_pdf_array = "";
    }

    
}
if(isset($_POST['update_project'])){

    // $p_wsp_unit = $_POST['wsp_unit']; //單位
    
    // $p_wsv_name = $_POST['wsv_name']; //案件
    $p_wsv_num = $_POST['wsv_num']; //案件編號
    
    $p_wsv_county = $_POST['wsv_county']; //縣市
    $p_wsv_town = $_POST['wsv_town']; //鄉鎮市區
    $p_wsv_alley = $_POST['wsv_alley']; //路段
    $p_wsv_pj_date = date('Y-m-d', strtotime($_POST['wsv_pj_date'])); //查報日期
    $p_wsv_undertaker = $_POST['wsv_undertaker']; //縣府查報人員
    $p_wsv_pj_invest_email = $_POST['wsv_pj_invest_email']; //人員email

    $p_wsv_vol_num = $_POST['wsv_vol_num']; //身分證(或公司)統一編號
    $p_wsv_vol_name = $_POST['wsv_vol_name']; //行為人姓名
    $p_wsv_vol_phone = $_POST['wsv_vol_phone']; //行為人電話
    $p_wsv_vol_addr = $_POST['wsv_vol_addr']; //行為人地址
    $p_wsv_vol_remark = $_POST['wsv_vol_remark']; //備註

    $p_wsv_pj_type = $_POST['wsv_pj_type']; //土地類別
    $p_wsv_pj_area = $_POST['wsv_pj_area']; //土地面積(公頃)
    // $p_wsv_pj_county = $_POST['wsv_pj_county']; //縣市
    // $p_wsv_pj_town = $_POST['wsv_pj_town']; //鄉鎮市區
    $p_wsv_pj_lot = $_POST['wsv_pj_lot']; //地段
    $p_wsv_pj_num = $_POST['wsv_pj_num']; //地號
    $p_wsv_pj_remark = $_POST['wsv_pj_remark']; //備註

    
    $p_wsv_pj_co = $_POST['wsv_pj_co']; //座標資料
    $p_wsv_co_first_date = date('Y-m-d', strtotime($_POST['wsv_co_first_date'])); //縣市政府第一次空拍日期
   
    
    $uploaded_wsv_co_first_img_1 = $_FILES['wsv_co_first_img_1'];
        
    $timestamped_wsv_co_first_img_1 = []; 


    if (!empty($wsv_co_first_img_1)) {
        $timestamped_wsv_co_first_img_1[] = $wsv_co_first_img_1;
    }
    if (!empty($uploaded_wsv_co_first_img_1['name'][0])) {
   
       foreach ($uploaded_wsv_co_first_img_1['name'] as $key => $filename) {
           $temp_file_wsv_co_first_img_1 = $uploaded_wsv_co_first_img_1['tmp_name'][$key];
           $timestamp = time();
           $timestamped_filename_wsv_co_first_img_1 = 'wsl0' . $the_wsv_id . '_' . $timestamp . '_' . $filename;
   
           move_uploaded_file($temp_file_wsv_co_first_img_1, "./assets/imgs/$timestamped_filename_wsv_co_first_img_1");
   
           $timestamped_wsv_co_first_img_1[] = $timestamped_filename_wsv_co_first_img_1;
       }
   }
   $timestamped_wsv_co_first_img_1_string = implode(',', $timestamped_wsv_co_first_img_1);


    $p_wsv_co_second_date = date('Y-m-d', strtotime($_POST['wsv_co_second_date'])); //縣市政府第二次空拍日期

    $uploaded_wsv_co_second_img_1 = $_FILES['wsv_co_second_img_1'];
        
    $timestamped_wsv_co_second_img_1 = []; 


    if (!empty($wsv_co_second_img_1)) {
        $timestamped_wsv_co_second_img_1[] = $wsv_co_second_img_1;
    }
    if (!empty($uploaded_wsv_co_second_img_1['name'][0])) {
   
       foreach ($uploaded_wsv_co_second_img_1['name'] as $key => $filename) {
           $temp_file_wsv_co_second_img_1 = $uploaded_wsv_co_second_img_1['tmp_name'][$key];
           $timestamp = time();
           $timestamped_filename_wsv_co_second_img_1 = 'wsl0' . $the_wsv_id . '_' . $timestamp . '_' . $filename;
   
           move_uploaded_file($temp_file_wsv_co_second_img_1, "./assets/imgs/$timestamped_filename_wsv_co_second_img_1");
   
           $timestamped_wsv_co_second_img_1[] = $timestamped_filename_wsv_co_second_img_1;
       }
   }
   $timestamped_wsv_co_second_img_1_string = implode(',', $timestamped_wsv_co_second_img_1);



    $p_wsv_co_third_date = date('Y-m-d', strtotime($_POST['wsv_co_third_date'])); //縣市政府第三次空拍日期
    
    $uploaded_wsv_co_third_img_1 = $_FILES['wsv_co_third_img_1'];
        
    $timestamped_wsv_co_third_img_1 = []; 


    if (!empty($wsv_co_third_img_1)) {
        $timestamped_wsv_co_third_img_1[] = $wsv_co_third_img_1;
    }
    if (!empty($uploaded_wsv_co_third_img_1['name'][0])) {
   
       foreach ($uploaded_wsv_co_third_img_1['name'] as $key => $filename) {
           $temp_file_wsv_co_third_img_1 = $uploaded_wsv_co_third_img_1['tmp_name'][$key];
           $timestamp = time();
           $timestamped_filename_wsv_co_third_img_1 = 'wsl0' . $the_wsv_id . '_' . $timestamp . '_' . $filename;
   
           move_uploaded_file($temp_file_wsv_co_third_img_1, "./assets/imgs/$timestamped_filename_wsv_co_third_img_1");
   
           $timestamped_wsv_co_third_img_1[] = $timestamped_filename_wsv_co_third_img_1;
       }
   }
   $timestamped_wsv_co_third_img_1_string = implode(',', $timestamped_wsv_co_third_img_1);





    $p_wsv_vio_area = $_POST['wsv_vio_area']; //違規面積(公頃)
    $p_wsv_vio_item = $_POST['wsv_vio_item']; //主違規項目

    //顧問公司彙整歷次空拍資料pdf
    $uploaded_files_pdf = $_FILES['wsv_vio_pdf'];
 
    $timestamped_filenames_pdf = [];

    if (!empty($wsv_vio_pdf)) {
        $timestamped_filenames_pdf[] = $wsv_vio_pdf;
    }
    if (!empty($uploaded_files_pdf['name'][0])) {
   
       foreach ($uploaded_files_pdf['name'] as $key => $filename) {
           $temp_file_pdf = $uploaded_files_pdf['tmp_name'][$key];
           $timestamp = time();
           $timestamped_filename_pdf = 'wsl0' . $the_wsv_id . '_' . $timestamp . '_' . $filename;
   
           move_uploaded_file($temp_file_pdf, "./assets/imgs/$timestamped_filename_pdf");
   
           $timestamped_filenames_pdf[] = $timestamped_filename_pdf;
       }
   }
   $timestamped_filename_pdf_string = implode(',', $timestamped_filenames_pdf);
    //現場檢查照片
    
    $uploaded_files = $_FILES['wsv_vio_live_photo'];
 
    $timestamped_filenames = [];

    if (!empty($wsl_val_img)) {
        $timestamped_filenames[] = $wsl_val_img;
    }
    if (!empty($uploaded_files['name'][0])) {
   
       foreach ($uploaded_files['name'] as $key => $filename) {
           $temp_file = $uploaded_files['tmp_name'][$key];
           $timestamp = time();
           $timestamped_filename = 'wsl0' . $the_wsv_id . '_' . $timestamp . '_' . $filename;
   
           move_uploaded_file($temp_file, "./assets/imgs/$timestamped_filename");
   
           $timestamped_filenames[] = $timestamped_filename;
       }
   }
   $timestamped_filenames_string = implode(',', $timestamped_filenames);

    $p_wsv_vio_remark = $_POST['wsv_vio_remark']; //備註

    $p_wsv_psh_rate = $_POST['wsv_psh_rate']; //行政處分 處分次別
    $p_wsv_psh_name = $_POST['wsv_psh_name']; //受處分人
    $p_wsv_psh_date = date('Y-m-d', strtotime($_POST['wsv_psh_date'])); //處罰日期
    $p_wsv_psh_num = $_POST['wsv_psh_num']; //處罰文號
    $p_wsv_psh_cost = $_POST['wsv_psh_cost']; //罰鍰金額(元)
    $p_wsv_psh_end_date = date('Y-m-d', strtotime($_POST['wsv_psh_end_date'])); //罰鍰完繳日期
    $p_wsv_psh_deadline = date('Y-m-d', strtotime($_POST['wsv_psh_deadline'])); //限期改正日期
    $p_wsv_psh_pre = date('Y-m-d', strtotime($_POST['wsv_psh_pre'])); //預先通知限期改正日期
    $p_wsv_psh_remark = $_POST['wsv_psh_remark']; //備註
    $p_wsv_close = $_POST['wsv_close']; //結案進度    

    $query = "UPDATE $WSViolate SET ";
    $query .= "wsv_co_first_img_1 = '{$timestamped_wsv_co_first_img_1_string}', ";
    $query .= "wsv_co_second_img_1 = '{$timestamped_wsv_co_second_img_1_string}', ";
    $query .= "wsv_co_third_img_1 = '{$timestamped_wsv_co_third_img_1_string}', ";
    // $query .= "wsv_name = '{$p_wsv_name}', ";
    $query .= "wsv_num = '{$p_wsv_num}', ";
    $query .= "wsv_county = '{$p_wsv_county}', ";
    $query .= "wsv_town = '{$p_wsv_town}', ";
    $query .= "wsv_alley = '{$p_wsv_alley}', ";
    $query .= "wsv_pj_date = '{$p_wsv_pj_date}', ";
    $query .= "wsv_undertaker = '{$p_wsv_undertaker}', ";
    $query .= "wsv_pj_invest_email = '{$p_wsv_pj_invest_email}', ";
    $query .= "wsv_vol_num = '{$p_wsv_vol_num}', ";
    $query .= "wsv_vol_name = '{$p_wsv_vol_name}', ";
    $query .= "wsv_vol_phone = '{$p_wsv_vol_phone}', ";
    $query .= "wsv_vol_addr = '{$p_wsv_vol_addr}', ";
    $query .= "wsv_vol_remark = '{$p_wsv_vol_remark}', ";
    $query .= "wsv_pj_type = '{$p_wsv_pj_type}', ";
    $query .= "wsv_pj_area = '{$p_wsv_pj_area}', ";
    // $query .= "wsv_pj_county = '{$p_wsv_pj_county}', ";
    // $query .= "wsv_pj_town = '{$p_wsv_pj_town}', ";
    $query .= "wsv_pj_lot = '{$p_wsv_pj_lot}', ";
    $query .= "wsv_pj_num = '{$p_wsv_pj_num}', ";
    $query .= "wsv_pj_remark = '{$p_wsv_pj_remark}', ";
    $query .= "wsv_pj_co = '{$p_wsv_pj_co}', ";
    $query .= "wsv_co_first_date = '{$p_wsv_co_first_date}', ";
    $query .= "wsv_co_second_date = '{$p_wsv_co_second_date}', ";
    $query .= "wsv_co_third_date = '{$p_wsv_co_third_date}', ";
    $query .= "wsv_vio_area = '{$p_wsv_vio_area}', ";
    $query .= "wsv_vio_item = '{$p_wsv_vio_item}', ";
    $query .= "wsv_vio_pdf = '{$timestamped_filename_pdf_string}', ";
    $query .= "wsv_vio_live_photo = '{$timestamped_filenames_string}', ";
    $query .= "wsv_vio_remark = '{$p_wsv_vio_remark}', ";
    $query .= "wsv_psh_rate = '{$p_wsv_psh_rate}', ";

    $query .= "wsv_psh_name = '{$p_wsv_psh_name}', ";
    $query .= "wsv_psh_date = '{$p_wsv_psh_date}', ";
    $query .= "wsv_psh_num = '{$p_wsv_psh_num}', ";
    $query .= "wsv_psh_cost = '{$p_wsv_psh_cost}', ";
    $query .= "wsv_psh_end_date = '{$p_wsv_psh_end_date}', ";
    $query .= "wsv_psh_deadline = '{$p_wsv_psh_deadline}', ";
    $query .= "wsv_psh_pre = '{$p_wsv_psh_pre}', ";
    $query .= "wsv_psh_remark = '{$p_wsv_psh_remark}', ";
    $query .= "wsv_close = '{$p_wsv_close}' ";

    
    $query .= "WHERE wsv_id = '{$the_wsv_id}' ";

    $update_project = mysqli_query($connection, $query);
    comfirmQuery($update_project, '編輯成功', null);

}
if(isset($_POST['delete_project_first'])){

    $filenameToDelete = $_POST['delete_filename'];
    $wsv_co_first_img_1_array = explode(",", $wsv_co_first_img_1);
    $wsv_co_first_img_1_array = array_diff($wsv_co_first_img_1_array, [$filenameToDelete]);
    $wsv_co_first_img_1_left = implode(",", $wsv_co_first_img_1_array);
 
    $query = "UPDATE $WSViolate SET ";

    $query .= "wsv_co_first_img_1 = '{$wsv_co_first_img_1_left}' ";
    
    $query .= "WHERE wsv_id = '{$the_wsv_id}' ";

    $delete_img = mysqli_query($connection, $query);
    comfirmQuery($delete_img, '刪除圖片成功', null);
 
 }
if(isset($_POST['delete_project_second'])){

    $filenameToDelete = $_POST['delete_filename'];
    $wsv_co_second_img_1_array = explode(",", $wsv_co_second_img_1);
    $wsv_co_second_img_1_array = array_diff($wsv_co_second_img_1_array, [$filenameToDelete]);
    $wsv_co_second_img_1_left = implode(",", $wsv_co_second_img_1_array);
 
    $query = "UPDATE $WSViolate SET ";

    $query .= "wsv_co_second_img_1 = '{$wsv_co_second_img_1_left}' ";
    
    $query .= "WHERE wsv_id = '{$the_wsv_id}' ";

    $delete_img = mysqli_query($connection, $query);
    comfirmQuery($delete_img, '刪除圖片成功', null);
 
 }
if(isset($_POST['delete_project_third'])){

    $filenameToDelete = $_POST['delete_filename'];
    $wsv_co_third_img_1_array = explode(",", $wsv_co_third_img_1);
    $wsv_co_third_img_1_array = array_diff($wsv_co_third_img_1_array, [$filenameToDelete]);
    $wsv_co_third_img_1_left = implode(",", $wsv_co_third_img_1_array);
 
    $query = "UPDATE $WSViolate SET ";

    $query .= "wsv_co_third_img_1 = '{$wsv_co_third_img_1_left}' ";
    
    $query .= "WHERE wsv_id = '{$the_wsv_id}' ";

    $delete_img = mysqli_query($connection, $query);
    comfirmQuery($delete_img, '刪除圖片成功', null);
 
 }
if(isset($_POST['delete_project_pdf'])){

    $filenameToDelete = $_POST['delete_filename'];
    $wsv_vio_pdf_array = explode(",", $wsv_vio_pdf);
    $wsv_vio_pdf_array = array_diff($wsv_vio_pdf_array, [$filenameToDelete]);
    $wsv_vio_pdf_left = implode(",", $wsv_vio_pdf_array);
 
    $query = "UPDATE $WSViolate SET ";

    $query .= "wsv_vio_pdf = '{$wsv_vio_pdf_left}' ";
    
    $query .= "WHERE wsv_id = '{$the_wsv_id}' ";

    $delete_pdf = mysqli_query($connection, $query);
    comfirmQuery($delete_pdf, '刪除pdf成功', null);
}
if(isset($_POST['delete_project_live_photo'])){

    $filenameToDelete = $_POST['delete_filename'];
    $wsv_vio_live_photo_array = explode(",", $wsv_vio_live_photo);
    $wsv_vio_live_photo_array = array_diff($wsv_vio_live_photo_array, [$filenameToDelete]);
    $wsv_vio_live_photo_left = implode(",", $wsv_vio_live_photo_array);
 
    $query = "UPDATE $WSViolate SET ";

    $query .= "wsv_vio_live_photo = '{$wsv_vio_live_photo_left}' ";
    
    $query .= "WHERE wsv_id = '{$the_wsv_id}' ";

    $delete_img = mysqli_query($connection, $query);
    comfirmQuery($delete_img, '刪除圖片成功', null);
 
 }

$query = "SELECT * FROM $WSViolate WHERE wsv_id = $the_wsv_id";
$select_all_wsviolate_query_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_wsviolate_query_by_id)){

    $wsv_id = $row['wsv_id']; //序號
    $wsv_co_first_img_1 = $row['wsv_co_first_img_1']; 
    $wsv_co_first_img_1_array = explode(",", $wsv_co_first_img_1);
    
    $wsv_co_second_img_1 = $row['wsv_co_second_img_1']; 
    $wsv_co_second_img_1_array = explode(",", $wsv_co_second_img_1);

    $wsv_co_third_img_1 = $row['wsv_co_third_img_1']; 
    $wsv_co_third_img_1_array = explode(",", $wsv_co_third_img_1);

    // $wsv_name = $row['wsv_name']; //案件
    $wsv_num = $row['wsv_num']; //案件
    $wsv_county = $row['wsv_county']; //縣市
    $wsv_town = $row['wsv_town']; //鄉鎮市區
    $wsv_alley = $row['wsv_alley']; //鄉鎮市區

    $wsv_pj_date = $row['wsv_pj_date']; //查報日期
    if($wsv_pj_date == "1970-01-01"){
        $wsv_pj_date = "";
    }
    $wsv_undertaker = $row['wsv_undertaker']; //縣府查報人員
    $wsv_pj_invest_email = $row['wsv_pj_invest_email']; //人員email
    $wsv_vol_num = $row['wsv_vol_num']; //行為人姓名
    $wsv_vol_name = $row['wsv_vol_name']; //行為人姓名
    $wsv_vol_phone = $row['wsv_vol_phone']; //行為人電話
    $wsv_vol_addr = $row['wsv_vol_addr']; //行為人地址
    $wsv_vol_remark = $row['wsv_vol_remark']; //備註
    $wsv_vol = [$wsv_vol_num, $wsv_vol_name, $wsv_vol_phone, $wsv_vol_addr, $wsv_vol_remark];


    $wsv_pj_type = $row['wsv_pj_type']; //土地類別
    $wsv_pj_area = $row['wsv_pj_area']; //土地面積(公頃)
    $wsv_pj_county = $row['wsv_pj_county']; //縣市
    $wsv_pj_town = $row['wsv_pj_town']; //鄉鎮市區
    $wsv_pj_lot = $row['wsv_pj_lot']; //地段


    $wsv_pj_num = $row['wsv_pj_num']; //地號
    $wsv_pj_remark = $row['wsv_pj_remark']; //備註
    $wsv_pj_co = $row['wsv_pj_co']; //座標資料
    $wsv_co_first_date = $row['wsv_co_first_date']; //縣市政府第一次空拍日期
    if($wsv_co_first_date == "1970-01-01"){
        $wsv_co_first_date = "";
    }
    $wsv_co_second_date = $row['wsv_co_second_date']; //縣市政府第二次空拍日期
    if($wsv_co_second_date == "1970-01-01"){
        $wsv_co_second_date = "";
    }
    $wsv_co_third_date = $row['wsv_co_third_date']; //縣市政府第三次空拍日期
    if($wsv_co_third_date == "1970-01-01"){
        $wsv_co_third_date = "";
    }
    $wsv_vio_area = $row['wsv_vio_area']; //違規面積(公頃)
    $wsv_vio_item = $row['wsv_vio_item']; //主違規項目

    $wsv_vio_pdf = $row['wsv_vio_pdf']; //顧問公司彙整歷次空拍資料pdf
    $wsv_vio_pdf_array = explode(",", $wsv_vio_pdf);

    $wsv_vio_live_photo = $row['wsv_vio_live_photo']; //現場檢查照片
    $wsv_vio_live_photo_array = explode(",", $wsv_vio_live_photo);

    $wsv_vio_remark = $row['wsv_vio_remark']; //備註
    $wsv_psh_rate = $row['wsv_psh_rate']; //行政處分 處分次別
    $wsv_psh_name = $row['wsv_psh_name']; //受處分人
    $wsv_psh_date = $row['wsv_psh_date']; //處罰日期
    if($wsv_psh_date == "1970-01-01"){
        $wsv_psh_date = "";
    }
    $wsv_psh_num = $row['wsv_psh_num']; //處罰文號
    $wsv_psh_cost = $row['wsv_psh_cost']; //罰鍰金額(元)
    $wsv_psh_end_date = $row['wsv_psh_end_date']; //罰鍰完繳日期
    if($wsv_psh_end_date == "1970-01-01"){
        $wsv_psh_end_date = "";
    }
    $wsv_psh_deadline = $row['wsv_psh_deadline']; //限期改正日期
    if($wsv_psh_deadline == "1970-01-01"){
        $wsv_psh_deadline = "";
    }
    $wsv_psh_pre = $row['wsv_psh_pre']; //預先通知限期改正日期
    if($wsv_psh_pre == "1970-01-01"){
        $wsv_psh_pre = "";
    }
    $wsv_psh_remark = $row['wsv_psh_remark']; //備註

    $wsv_close = $row['wsv_close']; //結案與否
  
}


?>

<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <h1 class="h4 mb-4">編輯 違規取締表單<?php echo $wsv_num;?>  <?php
                                        if($wsv_close == "1"){
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
                <h2 class="h5 mb-4">違規取締表單

                </h2>
                <div class="accordion accordion-flush mb-3" id="maincontent">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                基本資料
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="flush-headingOne" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                                <label for="wsv_num" class="col-form-label">案件編號</label>
                                <input id="wsv_num" name="wsv_num" type="text" class="form-control" value="<?php echo $wsv_num;?>"> 
                                <label for="wss_pj_seat_county" class="col-form-label">地點 </label>
                                <div  class="input-group">
                                    <select class="form-select" id="wss_pj_seat_county" name="wsv_county">
                                        <option value="雲林縣" selected>雲林縣</option>
                                    </select> 

                                    <select class="form-select" id="wss_pj_seat_town" name="wsv_town">
                                        <option value="" selected >請選擇</option>

                                        <?php
                                            $areaitem = '[{"area":"斗六市","value":"斗六市"},{"area":"古坑鄉","value":"古坑鄉"},{"area":"林內鄉","value":"林內鄉"}]';
                                            $areaitem_array = json_decode( $areaitem, true );
                                            
                                            foreach($areaitem_array as $item) { 
                                                $value = $item['value'];
                                                $area = $item['area'];

                                                if($wsv_town == $value){ 
                                                    $selected = "selected";
                                                }else{
                                                    $selected = "";
                                                }
                                                
                                                echo "<option value='$value' $selected >$area</option>";
                                            }
                                        ?>
                                    </select>

                                    <select class="form-select" id="wss_pj_seat_alley" name="wsv_alley">
                                        <option value="" selected >請選擇</option>

                                        <?php
                                            if($wsv_town == "斗六市"){
                                                $alleyitem = '[{"area":"斗六市","road":"九老爺段","value":"九老爺段" },{"area":"斗六市","road":"八德段","value":"八德段" },{"area":"斗六市","road":"十三段","value":"十三段" },{"area":"斗六市","road":"三平段","value":"三平段" },{"area":"斗六市","road":"大北勢段大北勢小段","value":"大北勢段大北勢小段" },{"area":"斗六市","road":"大北勢段甲六埤小段","value":"大北勢段甲六埤小段" },{"area":"斗六市","road":"大北勢段林子頭小段","value":"大北勢段林子頭小段" },{"area":"斗六市","road":"大竹圍段","value":"大竹圍段" },{"area":"斗六市","road":"大崙段大崙小段","value":"大崙段大崙小段" },{"area":"斗六市","road":"大崙段茄苳腳小段","value":"大崙段茄苳腳小段" },{"area":"斗六市","road":"大潭段大潭小段","value":"大潭段大潭小段" },{"area":"斗六市","road":"大潭段社口小段","value":"大潭段社口小段" },{"area":"斗六市","road":"中興段","value":"中興段" },{"area":"斗六市","road":"內林段","value":"內林段" },{"area":"斗六市","road":"公正段","value":"公正段" },{"area":"斗六市","road":"斗六一段","value":"斗六一段" },{"area":"斗六市","road":"斗六二段","value":"斗六二段" },{"area":"斗六市","road":"斗六三段","value":"斗六三段" },{"area":"斗六市","road":"斗六段","value":"斗六段" },{"area":"斗六市","road":"水尾口段","value":"水尾口段" },{"area":"斗六市","road":"牛埔段","value":"牛埔段" },{"area":"斗六市","road":"北環段","value":"北環段" },{"area":"斗六市","road":"半路段","value":"半路段" },{"area":"斗六市","road":"正心段","value":"正心段" },{"area":"斗六市","road":"石牛溪段","value":"石牛溪段" },{"area":"斗六市","road":"石農段","value":"石農段" },{"area":"斗六市","road":"石榴段","value":"石榴段" },{"area":"斗六市","road":"石榴班段","value":"石榴班段" },{"area":"斗六市","road":"光明段","value":"光明段" },{"area":"斗六市","road":"光復段","value":"光復段" },{"area":"斗六市","road":"竹圍子段","value":"竹圍子段" },{"area":"斗六市","road":"竹頭段","value":"竹頭段" },{"area":"斗六市","road":"自強段","value":"自強段" },{"area":"斗六市","road":"西平段","value":"西平段" },{"area":"斗六市","road":"秀才段","value":"秀才段" },{"area":"斗六市","road":"府文段","value":"府文段" },{"area":"斗六市","road":"明德段","value":"明德段" },{"area":"斗六市","road":"林子頭段林子頭小段","value":"林子頭段林子頭小段" },{"area":"斗六市","road":"林子頭段番子溝小段","value":"林子頭段番子溝小段" },{"area":"斗六市","road":"林頭段","value":"林頭段" },{"area":"斗六市","road":"虎溪段","value":"虎溪段" },{"area":"斗六市","road":"長平段","value":"長平段" },{"area":"斗六市","road":"長安段","value":"長安段" },{"area":"斗六市","road":"保庄段","value":"保庄段" },{"area":"斗六市","road":"保長廍段后庄子小段","value":"保長廍段后庄子小段" },{"area":"斗六市","road":"保長廍段虎尾溪小段","value":"保長廍段虎尾溪小段" },{"area":"斗六市","road":"保長廍段保長廍小段","value":"保長廍段保長廍小段" },{"area":"斗六市","road":"咬狗北段","value":"咬狗北段" },{"area":"斗六市","road":"咬狗庄段","value":"咬狗庄段" },{"area":"斗六市","road":"咬狗段","value":"咬狗段" },{"area":"斗六市","road":"建成段","value":"建成段" },{"area":"斗六市","road":"後庄段","value":"後庄段" },{"area":"斗六市","road":"科一段","value":"科一段" },{"area":"斗六市","road":"科二段","value":"科二段" },{"area":"斗六市","road":"科工段","value":"科工段" },{"area":"斗六市","road":"科加段","value":"科加段" },{"area":"斗六市","road":"貞寮段","value":"貞寮段" },{"area":"斗六市","road":"重光東段","value":"重光東段" },{"area":"斗六市","road":"重光段","value":"重光段" },{"area":"斗六市","road":"海豐崙段朱丹灣小段","value":"海豐崙段朱丹灣小段" },{"area":"斗六市","road":"海豐崙段海豐崙小段","value":"海豐崙段海豐崙小段" },{"area":"斗六市","road":"秦寮段","value":"秦寮段" },{"area":"斗六市","road":"埤口段","value":"埤口段" },{"area":"斗六市","road":"崙仔段","value":"崙仔段" },{"area":"斗六市","road":"崙北段","value":"崙北段" },{"area":"斗六市","road":"崙南段","value":"崙南段" },{"area":"斗六市","road":"梅林西段","value":"梅林西段" },{"area":"斗六市","road":"梅林東段","value":"梅林東段" },{"area":"斗六市","road":"梅南段","value":"梅南段" },{"area":"斗六市","road":"湖山段","value":"湖山段" },{"area":"斗六市","road":"菜公段","value":"菜公段" },{"area":"斗六市","road":"雲林溪段","value":"雲林溪段" },{"area":"斗六市","road":"黃厝段","value":"黃厝段" },{"area":"斗六市","road":"新虎溪段","value":"新虎溪段" },{"area":"斗六市","road":"新溪洲段","value":"新溪洲段" },{"area":"斗六市","road":"溝子埧段瓦厝子小段","value":"溝子埧段瓦厝子小段" },{"area":"斗六市","road":"溝子埧段柴裡小段","value":"溝子埧段柴裡小段" },{"area":"斗六市","road":"溝子埧段溝子埧小段","value":"溝子埧段溝子埧小段" },{"area":"斗六市","road":"溝垻段","value":"溝垻段" },{"area":"斗六市","road":"溪洲段","value":"溪洲段" },{"area":"斗六市","road":"萬年西段","value":"萬年西段" },{"area":"斗六市","road":"萬年東段","value":"萬年東段" },{"area":"斗六市","road":"嘉東段","value":"嘉東段" },{"area":"斗六市","road":"榴中段","value":"榴中段" },{"area":"斗六市","road":"榴北段","value":"榴北段" },{"area":"斗六市","road":"劉厝段","value":"劉厝段" },{"area":"斗六市","road":"龍潭段","value":"龍潭段" },{"area":"斗六市","road":"鎮西段","value":"鎮西段"}]';
                                            }elseif($wsv_town == "古坑鄉"){
                                                $alleyitem = '[{"area":"古坑鄉","road":"下崁腳段","value":"下崁腳段" },{"area":"古坑鄉","road":"下麻園段","value":"下麻園段" },{"area":"古坑鄉","road":"大湖口段","value":"大湖口段" },{"area":"古坑鄉","road":"大湖底段","value":"大湖底段" },{"area":"古坑鄉","road":"中洲段","value":"中洲段" },{"area":"古坑鄉","road":"水碓西段","value":"水碓西段" },{"area":"古坑鄉","road":"水碓東段","value":"水碓東段" },{"area":"古坑鄉","road":"水碓段","value":"水碓段" },{"area":"古坑鄉","road":"水碓新段","value":"水碓新段" },{"area":"古坑鄉","road":"古坑段古坑小段","value":"古坑段古坑小段" },{"area":"古坑鄉","road":"古坑段湳子小段","value":"古坑段湳子小段" },{"area":"古坑鄉","road":"永光段","value":"永光段" },{"area":"古坑鄉","road":"永昌段","value":"永昌段" },{"area":"古坑鄉","road":"永興段","value":"永興段" },{"area":"古坑鄉","road":"田心段","value":"田心段" },{"area":"古坑鄉","road":"石坑段","value":"石坑段" },{"area":"古坑鄉","road":"尖山坑段","value":"尖山坑段" },{"area":"古坑鄉","road":"西華段","value":"西華段" },{"area":"古坑鄉","road":"東和段","value":"東和段" },{"area":"古坑鄉","road":"東陽段","value":"東陽段" },{"area":"古坑鄉","road":"東興段","value":"東興段" },{"area":"古坑鄉","road":"青山段","value":"青山段" },{"area":"古坑鄉","road":"南昌段","value":"南昌段" },{"area":"古坑鄉","road":"建德段","value":"建德段" },{"area":"古坑鄉","road":"苦苓腳段","value":"苦苓腳段" },{"area":"古坑鄉","road":"崁腳段","value":"崁腳段" },{"area":"古坑鄉","road":"崁頭厝段","value":"崁頭厝段" },{"area":"古坑鄉","road":"草嶺段","value":"草嶺段" },{"area":"古坑鄉","road":"高林北段","value":"高林北段" },{"area":"古坑鄉","road":"高林南段","value":"高林南段" },{"area":"古坑鄉","road":"高厝林子頭段","value":"高厝林子頭段" },{"area":"古坑鄉","road":"荷苞段","value":"荷苞段" },{"area":"古坑鄉","road":"頂新庄段","value":"頂新庄段" },{"area":"古坑鄉","road":"麻園庄段","value":"麻園庄段" },{"area":"古坑鄉","road":"麻園段","value":"麻園段" },{"area":"古坑鄉","road":"棋山段","value":"棋山段" },{"area":"古坑鄉","road":"棋東段","value":"棋東段" },{"area":"古坑鄉","road":"棋盤段","value":"棋盤段" },{"area":"古坑鄉","road":"棋盤厝段","value":"棋盤厝段" },{"area":"古坑鄉","road":"湳子段","value":"湳子段" },{"area":"古坑鄉","road":"新生段","value":"新生段" },{"area":"古坑鄉","road":"新光段","value":"新光段" },{"area":"古坑鄉","road":"新庄段","value":"新庄段" },{"area":"古坑鄉","road":"新園段","value":"新園段" },{"area":"古坑鄉","road":"溪邊厝段","value":"溪邊厝段" },{"area":"古坑鄉","road":"樟湖段","value":"樟湖段" }]';
                                            }elseif($wsv_town == "林內鄉"){
                                                $alleyitem = '[{"area":"林內鄉","road":"九芎林段","value":"九芎林段" },{"area":"林內鄉","road":"九芎南段","value":"九芎南段" },{"area":"林內鄉","road":"九芎段","value":"九芎段" },{"area":"林內鄉","road":"中山段","value":"中山段" },{"area":"林內鄉","road":"仁愛段","value":"仁愛段" },{"area":"林內鄉","road":"永昌段","value":"永昌段" },{"area":"林內鄉","road":"成功段","value":"成功段" },{"area":"林內鄉","road":"芎林段","value":"芎林段" },{"area":"林內鄉","road":"芎蕉段","value":"芎蕉段" },{"area":"林內鄉","road":"林內段","value":"林內段" },{"area":"林內鄉","road":"長興段","value":"長興段" },{"area":"林內鄉","road":"重興段","value":"重興段" },{"area":"林內鄉","road":"烏麻段","value":"烏麻段" },{"area":"林內鄉","road":"烏塗子段","value":"烏塗子段" },{"area":"林內鄉","road":"烏塗段","value":"烏塗段" },{"area":"林內鄉","road":"頂庄段","value":"頂庄段" },{"area":"林內鄉","road":"湖山寮段","value":"湖山寮段" },{"area":"林內鄉","road":"湖本段","value":"湖本段" },{"area":"林內鄉","road":"進興段","value":"進興段" },{"area":"林內鄉","road":"新興段","value":"新興段" },{"area":"林內鄉","road":"寶隆段","value":"寶隆段" }]';
                                            }
                                            
                                            $alleyitem_array = json_decode( $alleyitem, true );
                                            
                                            foreach($alleyitem_array as $item) { 
                                                $area = $item['area'];
                                                $value = $item['value'];
                                                $road = $item['road'];

                                                if($wsv_alley == $value){ 
                                                    $selected = "selected";
                                                }else{
                                                    $selected = "";
                                                }
                                                
                                                echo "<option value='$value' $selected >$road</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <label for="wsv_pj_date" class="col-form-label">查(通)報日期</label>
                                <input id="wsv_pj_date" type="date" class="form-control" name="wsv_pj_date"  value="<?php echo $wsv_pj_date;?>">
                         
                                <label for="wsv_undertaker" class="col-form-label">縣府查報人員 <span class='text-danger'>*</span></label>
                                <input id="wsv_undertaker" name="wsv_undertaker" type="text" class="form-control"  value="<?php echo $wsv_undertaker;?>">
                                <label for="wsv_pj_invest_email" class="col-form-label">email <span class='text-danger'>*</span></label>
                                <input id="wsv_pj_invest_email" name="wsv_pj_invest_email" type="email" class="form-control"  value="<?php echo $wsv_pj_invest_email;?>">
                                <label for="wsp_rm_crew" class="col-sm-2 col-form-label">案件進度

                                <?php
                                    if($wsv_close == "1"){
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
                                    <input class="form-check-input" type="radio" name="wsv_close" id="wsv_closed" <?php echo $checked;?> value="1">
                                    <label class="form-check-label" for="wsv_closed">已結案</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="wsv_close" id="wsv_unclose" <?php echo $checked_f;?>  value="0">
                                    <label class="form-check-label" for="wsp_unclose">辦理中</label>

                                </div>
				<div class="form-check form-check-inline">
                                    	<input class="form-check-input" type="radio" name="wsv_close" id="wsv_closed" value="1">
                                    	<label class="form-check-label" for="wsv_unclose">系統結案</label>
                                    </div>
                                </div>        
                            </div>
                        </div>
 
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                行為人資料
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingTwo" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                                <?php
                                    $vol = '[{"title_cn":"身分證(或公司)統一編號","title_en":"wsv_vol_num","type":"text","required":"false"},
                                    {"title_cn":"姓名","title_en":"wsv_vol_name","type":"text","required":"true"},
                                    {"title_cn":"電話","title_en":"wsv_vol_phone","type":"phone","required":"true"},
                                    {"title_cn":"地址","title_en":"wsv_vol_addr","type":"text","required":"false"},
                                    {"title_cn":"備註","title_en":"wsv_vol_remark","type":"text","required":"false"}]';
                                    $vol_array = json_decode( $vol, true );

                                    foreach($vol_array as $key=>$item) { 
                                        $title_cn = $item['title_cn']; 
                                        $title_en = $item['title_en']; 
                                        $type = $item['type']; 
                                        $required = $item['required']; 
                                        if ($required == 'true'){
                                            $required = "";
                                            $star = "<span class='text-danger'>*</spn>";
                                        }else{
                                            $required = "";
                                            $star = "";
                                        }
                                        echo "<label for='$title_en' class='col-sm-3 col-form-label'>$title_cn $star</label>";
                                        echo "<input id='$title_en' name='$title_en' type='$type' class='form-control' $required value='$wsv_vol[$key]'>";
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
                                土地資料
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingThree" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                                <label for="wsv_pj_type" class="col-form-label">土地類別</label>
                                <select class="form-select" id="wsv_pj_type" name="wsv_pj_type">
                                    <option value="地籍資料" selected>地籍資料</option>
                                </select>
                                <label for="wsv_pj_area" class="col-form-label">土地面積(公頃)</label>
                                <div class="input-group ">
                                    <input type="number" step="0.0001" class="form-control" name="wsv_pj_area" value="<?php echo $wsv_pj_area;?>">
                                    <span class="input-group-text" >公頃</span>
                                </div>
                                <label for="wsv_pj_county" class=" col-form-label">縣市(與基本資料相同)</label>
                                <input type="text" class="form-control" id="wsv_pj_county" name="wsv_pj_county" disabled value="<?php echo $wsv_county;?>">
                             
                                <label for="wsv_pj_town" class="col-form-label">鄉鎮市區(與基本資料相同)</label>  
                                <input type="text" class="form-control" id="wsv_pj_town" name="wsv_pj_town" disabled value="<?php echo $wsv_town;?>">
                                <label for="wsv_pj_lot" class="col-form-label">地段</label>
                                <input type="text" class="form-control" name="wsv_pj_lot" value="<?php echo $wsv_pj_lot;?>">
                                <label for="wsv_pj_num" class="col-form-label">地號</label>
                                <input type="text" class="form-control" name="wsv_pj_num" value="<?php echo $wsv_pj_num;?>">
                                <label for="wsv_pj_remark" class="col-form-label">備註</label>
                                <input type="text" class="form-control" name="wsv_pj_remark" value="<?php echo $wsv_pj_remark;?>">
             
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseFour">
                                查證結果
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingFour" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                                <label for="latlng" class="col-form-label">土地座標 (TWD97) <span class='text-danger'>*</span></label>
                                <div class="input-group mb-2">
                                    <input id="latlng" type="text" class="form-control" name="wsv_pj_co" data-lat="23.6743232" data-lng="120.4345919" value="<?php echo $wsv_pj_co;?>">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <div id="map" class="mb-4" style="width: 100%; height: 60vh;"></div>

                                <label for="wsv_co_first_date" class="col-form-label">縣市政府第1次空拍日期</label>
                                <div id="wsv_co_first_date" class="input-group mb-3">
                                    <input type="date" class="form-control" name="wsv_co_first_date"  value="<?php echo $wsv_co_first_date;?>">
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <div class="row mb-4">
                                    <div>
                                        <label for="wsv_co_first_img_1" class="col-form-label">第一次空拍相關照片上傳</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="wsv_co_first_img_1" name="wsv_co_first_img_1[]" multiple accept="image/*">
                                            <span class="input-group-text" ><i class="fas fa-image"></i></span>
                                        </div>
                                        <div>
                                            <?php
                                                if (!empty($wsv_co_first_img_1_array) && !in_array("", $wsv_co_first_img_1_array, true)) {
                                                    foreach ($wsv_co_first_img_1_array as $filename) {
                                                        echo "<figure class='figure' style='margin-right:10px'>";
                                                        echo "<img src='./assets/imgs/$filename' class='figure-img img-fluid rounded' alt='$filename'>";
                                                        echo "<figcaption class='figure-caption'>$filename</figcaption>";
                                                        
                                                        // 下載圖示
                                                        echo "<a class='btn btn-sm btn-primary' href='./assets/imgs/$filename' download>下載</a>";
                                                        
                                                        // 刪除圖示
                                                        echo "<input class='btn btn-sm btn-danger delete-button' data-filename='$filename' type='submit' name='delete_project_first' value='刪除'>";
                                                        
                                                        echo "</figure>";
                                                    }
                                                } 
                                            ?>
                                        </div>
                                        <input type="hidden" name="delete_filename" id="delete-filename" value="">
                                        
                                    </div>
                                   
                                </div>
                                <label for="wsv_co_second_date" class="col-form-label">縣市政府第2次空拍日期</label>
                                <div id="wsv_co_second_date" class="input-group mb-3">
                                    <input type="date" class="form-control" name="wsv_co_second_date"  value="<?php echo $wsv_co_second_date;?>">
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <div class="row mb-4">
                                    <div>
                                        <label for="wsv_co_second_img_1" class="col-form-label">第二次空拍相關照片上傳</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="wsv_co_second_img_1" name="wsv_co_second_img_1[]" multiple accept="image/*">
                                            <span class="input-group-text" ><i class="fas fa-image"></i></span>
                                        </div>
                                        <div>
                                            <?php
                                                if (!empty($wsv_co_second_img_1_array) && !in_array("", $wsv_co_second_img_1_array, true)) {
                                                    foreach ($wsv_co_second_img_1_array as $filename) {
                                                        echo "<figure class='figure' style='margin-right:10px'>";
                                                        echo "<img src='./assets/imgs/$filename' class='figure-img img-fluid rounded' alt='$filename'>";
                                                        echo "<figcaption class='figure-caption'>$filename</figcaption>";
                                                        
                                                        // 下載圖示
                                                        echo "<a class='btn btn-sm btn-primary' href='./assets/imgs/$filename' download>下載</a>";
                                                        
                                                        // 刪除圖示
                                                        echo "<input class='btn btn-sm btn-danger delete-button' data-filename='$filename' type='submit' name='delete_project_second' value='刪除'>";
                                                        
                                                        echo "</figure>";
                                                    }
                                                } 
                                                ?>
                                        </div>
                                    </div>
                                  
                                </div>
                
                                <label for="wsv_co_third_date" class="col-form-label">縣市政府第3次空拍日期</label>
                                <div id="wsv_co_third_date" class="input-group mb-3">
                                    <input type="date" class="form-control" name="wsv_co_third_date"  value="<?php echo $wsv_co_third_date;?>">
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <div class="row mb-4">
                                    <div>
                                       
                                        <label for="wsv_co_third_img_1" class="col-form-label">第三次空拍相關照片上傳</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="wsv_co_third_img_1" name="wsv_co_third_img_1[]" multiple accept="image/*">
                                            <span class="input-group-text" ><i class="fas fa-image"></i></span>
                                        </div>
                                        <div>
                                            <?php
                                                if (!empty($wsv_co_third_img_1_array) && !in_array("", $wsv_co_third_img_1_array, true)) {
                                                    foreach ($wsv_co_third_img_1_array as $filename) {
                                                        echo "<figure class='figure' style='margin-right:10px'>";
                                                        echo "<img src='./assets/imgs/$filename' class='figure-img img-fluid rounded' alt='$filename'>";
                                                        echo "<figcaption class='figure-caption'>$filename</figcaption>";
                                                        
                                                        // 下載圖示
                                                        echo "<a class='btn btn-sm btn-primary' href='./assets/imgs/$filename' download>下載</a>";
                                                        
                                                        // 刪除圖示
                                                        echo "<input class='btn btn-sm btn-danger delete-button' data-filename='$filename' type='submit' name='delete_project_third' value='刪除'>";
                                                        
                                                        echo "</figure>";
                                                    }
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                   
                                </div>

                                <label for="wsv_vio_area" class="col-form-label">違規面積(公頃) <span class='text-danger'>*</span></label>
                                <input type="text" class="form-control" name="wsv_vio_area" value="<?php echo $wsv_vio_area;?>">
                                <label for="wsv_vio_item" class="col-form-label">主違規項目 <span class='text-danger'>*</span></label>
                                <select class="form-select" id="wsv_vio_item" name="wsv_vio_item">
                                    <option value="" selected >請選擇</option>

                                    <?php
                                            $vioitem = '[{"item":"01a違規農業使用","value":"01a違規農業使用"},{"item":"01b超限利用","value":"01b超限利用"},{"item":"02開發建築用地","value":"02開發建築用地"},{"item":"03採取土石","value":"03採取土石"},{"item":"04修建道路或溝渠","value":"04修建道路或溝渠"},{"item":"05探礦、採礦","value":"05探礦、採礦"},{"item":"06堆積土石","value":"06堆積土石"},{"item":"07設置供原、遊憩用地、運動場地或軍事訓練場","value":"07設置供原、遊憩用地、運動場地或軍事訓練場"},{"item":"08設置墳墓","value":"08設置墳墓"},{"item":"09處理廢棄物","value":"09處理廢棄物"},{"item":"10其他開挖整地","value":"10其他開挖整地"},{"item":"11未依核定計畫施工","value":"11未依核定計畫施工"},{"item":"12未依規定限期改正","value":"12未依規定限期改正"},{"item":"13整坡作業","value":"13整坡作業"}]';
                                            $vioitem_array = json_decode( $vioitem, true );
                                            
                                            foreach($vioitem_array as $i) { 
                                                $item = $i['item'];
                                                $value = $i['value'];

                                                if($wsv_vio_item == $value){ 
                                                    $selected = "selected";
                                                }else{
                                                    $selected = "";
                                                }
                                                
                                                echo "<option value='$value' $selected >$item</option>";
                                            }
                                        ?>
                                </select>
                                <label for="wsv_vio_pdf" class="col-form-label">顧問公司彙整歷次空拍資料pdf</label>
                                <div >
                            
                                    <?php
                                        if (!empty($wsv_vio_pdf_array) && !in_array("", $wsv_vio_pdf_array, true)) {
                                            foreach ($wsv_vio_pdf_array as $filename) {
                                                echo "<a class='btn btn-sm btn-primary' href='./assets/imgs/$filename' download>$filename</a>";
                                                echo "<input class='btn btn-sm btn-danger delete-button' data-filename='$filename' type='submit' name='delete_project_pdf' value='刪除'> </br>";

                                            }
                                        } 
                                        ?>
                                </div>
                                <label for="wsv_vio_pdf" class="col-form-label">顧問公司彙整歷次空拍資料pdf</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="wsv_vio_pdf" name="wsv_vio_pdf[]" multiple accept="application/pdf">
                                    <span class="input-group-text" ><i class="fas fa-image"></i></span>
                                </div>
                                <label for="wsv_vio_live_photo" class="col-form-label">現場檢查照片</label>
                              
                                <div>
                                    <?php
                                        if (!empty($wsv_vio_live_photo_array) && !in_array("", $wsv_vio_live_photo_array, true)) {
                                            foreach ($wsv_vio_live_photo_array as $filename) {
                                                echo "<figure class='figure' style='margin-right:10px'>";
                                                echo "<img src='./assets/imgs/$filename' class='figure-img img-fluid rounded' alt='$filename'>";
                                                echo "<figcaption class='figure-caption'>$filename</figcaption>";
                                                
                                                // 下載圖示
                                                echo "<a class='btn btn-sm btn-primary' href='./assets/imgs/$filename' download>下載</a>";
                                                
                                                // 刪除圖示
                                                echo "<input class='btn btn-sm btn-danger delete-button' data-filename='$filename' type='submit' name='delete_project_live_photo' value='刪除'>";
                                                
                                                echo "</figure>";
                                            }
                                        } 
                                        ?>
                                </div>
                                <label for="wsv_vio_live_photo" class="col-form-label">現場檢查照片</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="wsv_vio_live_photo" name="wsv_vio_live_photo[]" multiple accept="image/*">
                                    <span class="input-group-text" ><i class="fas fa-image"></i></span>
                                </div>
                                <label for="wsv_vio_remark" class="col-form-label">備註</label>
                                <input type="text" class="form-control" name="wsv_vio_remark" value="<?php echo $wsv_vio_remark;?>">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="p-4 mb-2 bg-light text-dark rounded">
                <h2 class="h5 mb-4">行政處分</h2>
                
                <div class="accordion accordion-flush mb-3" id="competent">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseNine" aria-expanded="false"
                                aria-controls="flush-collapseNine"> 行政處分
                            </button>
                        </h2>
                        <div id="flush-collapseNine" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingNine" data-bs-parent="#competent">
                            <div class="accordion-body">
                                    <label for="wsv_psh_rate" class="col-form-label">處分次別</label>
                                    <input id="wsv_psh_rate" name="wsv_psh_rate" type="text" class="form-control" value="<?php echo $wsv_psh_rate;?>">
                                    <label for="wsv_psh_name" class="col-form-label">受處分人 <span class='text-danger'>*</span></label>
                                    <input id="wsv_psh_name" name="wsv_psh_name" type="text" class="form-control"  value="<?php echo $wsv_psh_name;?>">
                                     <label for="wsv_psh_date" class="col-form-label">處罰日期</label>
                                    <div id="wsv_psh_date" class="input-group mb-3">
                                        <input type="date" class="form-control" name="wsv_psh_date"  value="<?php echo $wsv_psh_date;?>">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wsv_psh_num" class="col-form-label">處罰文號</label>
                                    <input type="text" class="form-control" id="" name="wsv_psh_num" value="<?php echo $wsv_psh_num;?>">
                                    <label for="wsv_psh_cost" class="col-form-label">罰鍰金額(元)</label>
                                    <div class="input-group">
                                        <input id="wsv_psh_cost" type="number" step="1" class="form-control" name="wsv_psh_cost" value="<?php echo $wsv_psh_cost;?>">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <label id="wsv_psh_end_date" for="wsv_psh_end_date" class="col-form-label">罰鍰完繳日期</label>
                                    <div class="input-group">
                                        <input id="wsv_psh_end_date" type="date" class="form-control" name="wsv_psh_end_date" value="<?php echo $wsv_psh_end_date;?>">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label id="wsv_psh_deadline" for="wsv_psh_deadline" class="col-form-label">限期改正日期</label>
                                    <div class="input-group">
                                        <input id="wsv_psh_deadline" type="date" class="form-control" name="wsv_psh_deadline" value="<?php echo $wsv_psh_deadline;?>" onchange="end(value)">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wsv_psh_pre" class="col-form-label">預先通知限期改正日期</label>
                                    <div class="input-group">
                                        <input id="wsv_psh_pre" type="date" class="form-control" name="wsv_psh_pre" value="<?php echo $wsv_psh_pre;?>">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wsv_psh_remark" class="col-form-label">備註</label>
                                    <div class="input-group">
                                        <input id="wsv_psh_remark" type="text" class="form-control" name="wsv_psh_remark" value="<?php echo $wsv_psh_remark;?>">
                                        <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                                    </div>
                                </div>

                        </div>
                    </div>

                </div> 

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-secondary " href="WSViolate.php"><i
                            class="fas fa-times-circle me-2"></i>取消</a>
                    <input class="btn btn-primary" type="submit" name="update_project" value="儲存">
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
    function end(val){
        date = new Date(val)
        rm_end = date.setDate(date.getDate()-10)
        rm_end_d = new Date(rm_end)

        wsv_psh_pre = convertDate(rm_end_d)
        document.getElementById('wsv_psh_pre').value = wsv_psh_pre; 
    }

    function convertDate(date) {
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth()+1).toString();
        var dd  = date.getDate().toString();

        var mmChars = mm.split('');
        var ddChars = dd.split('');

        return yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
    }
</script>