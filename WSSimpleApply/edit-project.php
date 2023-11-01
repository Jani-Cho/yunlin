<?php 
if(isset($_GET["pj_id"])){
    $the_wss_id = $_GET["pj_id"];
}

$query = "SELECT * FROM $WSSimple WHERE wss_id = $the_wss_id";
$select_all_WSsimple_query_by_id = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_all_WSsimple_query_by_id)){

    $wss_files = $row['wss_files']; //
    if (!empty($wss_files)) {
        $wss_files_array = explode(",", $wss_files);
    } else {
        $wss_files_array = "";
    }
    
}
if(isset($_POST['update_project'])){

    $p_wss_de_date = date('Y-m-d', strtotime($_POST['wss_de_date'])); //申報日期

    $p_wss_agency = $_POST['wss_agency']; //受理機關
    $p_wss_name = $_POST['wss_name']; //計畫名稱
    $p_wss_num = $_POST['wss_num']; //案件編號 14碼 UP0711107006
    $p_wss_undertaker = $_POST['wss_undertaker']; //案件承辦人員
    $p_wss_de_type = $_POST['wss_de_type']; //開發種類
    
    if(count($p_wss_de_type) > 1 ){
        array_shift($p_wss_de_type); 
    }
    $p_wss_de_typelist = implode(", ",$p_wss_de_type);
    // echo $p_wss_de_typelist;
    
    $p_wss_vol_name = $_POST['wss_vol_name']; //水土保持義務人名稱
    $p_wss_vol_num = $_POST['wss_vol_num']; //國民身分證統一編號或營利事業統一編號
    $p_wss_vol_phone = $_POST['wss_vol_phone']; //電話
    $p_wss_vol_addr = $_POST['wss_vol_addr']; //住居所或營業所
    $p_wss_vol_email = $_POST['wss_vol_email']; //電子郵件

    $p_wss_pj_area = $_POST['wss_pj_area']; //計畫面積
    $p_wss_pj_seat_county = $_POST['wss_pj_seat_county']; //實施地點 土地座落 縣
    $p_wss_pj_seat_town = $_POST['wss_pj_seat_town']; //實施地點 土地座落 市鎮
    $p_wss_pj_seat_alley = $_POST['wss_pj_seat_alley']; //實施地點 土地座落 段
    $p_wss_pj_seat_no = $_POST['wss_pj_seat_no']; //實施地點 土地座落 號
    $p_wss_pj_seat_count = $_POST['wss_pj_seat_count']; //實施地點 土地座落 筆數
    $p_wss_pj_co = $_POST['wss_pj_co']; //土地座標
    
    $p_wss_pj_own = $_POST['wss_pj_own']; //土地權屬
    $p_wss_pj_add = $_POST['wss_pj_add']; //土地新增

    $p_wss_check_item1 = $_POST['wss_check_item1']; //檢核事項
    $p_wss_check_item2 = $_POST['wss_check_item2']; 
    $p_wss_check_item3 = $_POST['wss_check_item3']; 
    $p_wss_check_item4 = $_POST['wss_check_item4']; 

    $p_wss_sc_slope = $_POST['wss_sc_slope']; //農業整坡作業公頃
    $p_wss_sc_ag_road_lgth = $_POST['wss_sc_ag_road_lgth']; //修築農路 長度
    $p_wss_sc_ag_road_wth = $_POST['wss_sc_ag_road_wth']; //修築農路 路基寬度
    $p_wss_sc_oth_road_wth = $_POST['wss_sc_oth_road_wth']; //修建其他道路 路基寬度
    $p_wss_sc_oth_road_total = $_POST['wss_sc_oth_road_total']; //修建其他道路 路基總面積

    $p_wss_sc_exist_road_total = $_POST['wss_sc_exist_road_total']; //改善或維護既有道路 路基總面積

    $p_wss_sc_arch_area = $_POST['wss_sc_arch_area']; //開發建築用地 建築面積
    $p_wss_sc_arch_oth_area = $_POST['wss_sc_arch_oth_area']; //開發建築用地 其他開挖整地面積
    $p_wss_sc_arch_total = $_POST['wss_sc_arch_total']; //開發建築用地 合計

    $p_wss_sc_accu = $_POST['wss_sc_accu']; //堆積土石
    $p_wss_sc_adopt = $_POST['wss_sc_adopt']; //採取土石

    $p_wss_sc_oth_type = $_POST['wss_sc_oth_type']; //設置公園、墳墓、運動場地、原住民在原住民族地區依原住民族基本法第十九條規定採取礦物或其他開挖整地
    $p_wss_sc_faci_area = $_POST['wss_sc_faci_area']; //農作產銷設施之農業生產設施、林業設施之林業經營設施或畜牧設施之養畜設施、養禽設施、孵化場(室)設施、青貯設施
    $p_wss_sc_faci_oth_area = $_POST['wss_sc_faci_oth_area']; //其他開挖整地面積
    $p_wss_sc_faci_total = $_POST['wss_sc_faci_total']; //合計

    $p_wss_sc_sum = $_POST['wss_sc_sum']; //挖、填方總和
    $p_wss_att_pre = $_POST['wss_att_pre']; //附款或注意事項

        if(isset($_POST['wss_remark_add'])){
            $p_wss_remark_add = $_POST['wss_remark_add']; //備註
            $p_wss_remark_addlist = implode(", ",$p_wss_remark_add);}
        else{
            $p_wss_remark_addlist = "";
        }
        if(isset($_POST['wss_remark_fac'])){
            $p_wss_remark_fac = $_POST['wss_remark_fac']; //設施名稱	
            $p_wss_remark_faclist = implode(", ",$p_wss_remark_fac);}
        else{
            $p_wss_remark_faclist = "";
        }
        if(isset($_POST['wss_remark_loc'])){
            $p_wss_remark_loc = $_POST['wss_remark_loc']; //位置或編號		
            $p_wss_remark_loclist = implode(", ",$p_wss_remark_loc);}
        else{
            $p_wss_remark_loclist = "";
        }
        if(isset($_POST['wss_remark_num'])){
            $p_wss_remark_num = $_POST['wss_remark_num']; //設計數量		
            $p_wss_remark_numlist = implode(", ",$p_wss_remark_num);}
        else{
            $p_wss_remark_numlist = "";
        }
        if(isset($_POST['wss_remark_size'])){
            $p_wss_remark_size = $_POST['wss_remark_size']; //設計尺寸		
            $p_wss_remark_sizelist = implode(", ",$p_wss_remark_size);}
        else{
            $p_wss_remark_sizelist = "";
        }
        if(isset($_POST['wss_remark_oth'])){
            $p_wss_remark_oth = $_POST['wss_remark_oth']; //備註	
            $p_wss_remark_othlist = implode(", ",$p_wss_remark_oth);}
        else{
            $p_wss_remark_othlist = "";
        }

    $p_wss_ad_remark = $_POST['wss_ad_remark']; //行政備註


    // $p_wss_apy_date = date('Y-m-d', strtotime($_POST['wss_apy_date'])); //申請日期  
    $p_wss_apy_tnum = $_POST['wss_apy_tnum']; //申請文號
    $p_wss_apv_date = date('Y-m-d', strtotime($_POST['wss_apv_date'])); //核准日期
    $p_wss_apv_tnum = $_POST['wss_apv_tnum']; //核准文號
    $p_wss_main_apv_date = date('Y-m-d', strtotime($_POST['wss_main_apv_date'])); //目的事業主管機關核准日期
    $p_wss_main_apv_tnum = $_POST['wss_main_apv_tnum']; //目的事業主管機關核准文號
    $p_wss_st_date = date('Y-m-d', strtotime($_POST['wss_st_date'])); //應開工日期
    $p_wss_rm_st_date = date('Y-m-d', strtotime($_POST['wss_rm_st_date'])); //提醒開工日期
    $p_wss_ac_st_date = date('Y-m-d', strtotime($_POST['wss_ac_st_date'])); //實際開工日期
    $p_wss_end_date = date('Y-m-d', strtotime($_POST['wss_end_date'])); //預定完工日期
    $p_wss_rm_end_date = date('Y-m-d', strtotime($_POST['wss_rm_end_date'])); //提醒完工日期
    $p_wss_ac_end_date = date('Y-m-d', strtotime($_POST['wss_ac_end_date'])); //實際完工日期
    $p_wss_rm_crew = $_POST['wss_rm_crew']; //提醒通知人員
    $p_wss_remark = $_POST['wss_remark']; //備註
    $p_wss_add_1 = $_POST['wss_add_1']; //開工前輔導
    $p_wss_add_2 = $_POST['wss_add_2']; //期初檢查
    $p_wss_add_3 = $_POST['wss_add_3']; //施工中檢查
    $p_wss_add_4 = $_POST['wss_add_4']; //完工檢查

    // 第一二次展延
    if(isset($_POST['wss_apy_date1'])){
        $p_wss_apy_date1 = date('Y-m-d', strtotime($_POST['wss_apy_date1'])); //申請日期
    }else{
        $p_wss_apy_date1 = date('Y-m-d', strtotime('')); 

    }
    if(isset($_POST['wss_apy_date2'])){
        $p_wss_apy_date2 = date('Y-m-d', strtotime($_POST['wss_apy_date2'])); //申請日期
    }else{
        $p_wss_apy_date2 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wss_apy_tnum1'])){
        $p_wss_apy_tnum1 = $_POST['wss_apy_tnum1']; //申請文號
    }else{
        $p_wss_apy_tnum1 = ""; 

    }
    if(isset($_POST['wss_apy_tnum2'])){
        $p_wss_apy_tnum2 = $_POST['wss_apy_tnum2']; //申請文號
    }else{
        $p_wss_apy_tnum2 = ""; 

    }

    if(isset($_POST['wss_apv_date1'])){
        $p_wss_apv_date1 = date('Y-m-d', strtotime($_POST['wss_apv_date1'])); //核准日期
    }else{
        $p_wss_apv_date1 = date('Y-m-d', strtotime('')); 

    }
    if(isset($_POST['wss_apv_date2'])){
        $p_wss_apv_date2 = date('Y-m-d', strtotime($_POST['wss_apv_date2'])); //核准日期
    }else{
        $p_wss_apv_date2 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wss_apv_tnum1'])){
        $p_wss_apv_tnum1 = $_POST['wss_apv_tnum1']; //核准文號
    }else{
        $p_wss_apv_tnum1 = ""; 

    }
    if(isset($_POST['wss_apv_tnum2'])){
        $p_wss_apv_tnum2 = $_POST['wss_apv_tnum2']; //核准文號
    }else{
        $p_wss_apv_tnum2 = ""; 

    }

    if(isset($_POST['wss_ex_end_date1'])){
        $p_wss_ex_end_date1 = date('Y-m-d', strtotime($_POST['wss_ex_end_date1'])); //展延完工日期
    }else{
        $p_wss_ex_end_date1 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wss_ex_end_date2'])){
        $p_wss_ex_end_date2 = date('Y-m-d', strtotime($_POST['wss_ex_end_date2'])); //展延完工日期
    }else{
        $p_wss_ex_end_date2 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wss_rm_end_date1'])){
        $p_wss_rm_end_date1 = date('Y-m-d', strtotime($_POST['wss_rm_end_date1'])); //提醒完工日期
    }else{
        $p_wss_rm_end_date1 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wss_rm_end_date2'])){
        $p_wss_rm_end_date2 = date('Y-m-d', strtotime($_POST['wss_rm_end_date2'])); //提醒完工日期
    }else{
        $p_wss_rm_end_date2 = date('Y-m-d', strtotime('')); 

    }
    $p_wss_close = $_POST['wss_close']; //結案進度    
    if(isset($_POST['wss_ex_remark1'])){
        $p_wss_ex_remark1 = $_POST['wss_ex_remark1']; //展延備註1
    }else{
        $p_wss_ex_remark1 = ""; //展延備註1

    }
    if(isset($_POST['wss_ex_remark2'])){
        $p_wss_ex_remark2 = $_POST['wss_ex_remark2']; //展延備註2
    }else{
        $p_wss_ex_remark2 = ""; //展延備註2

    }
    //上傳資料
    $uploaded_files = $_FILES['wss_files'];

    $timestamped_filesname = [];
    if (!empty($wss_files)) {
        $timestamped_filesname[] = $wss_files;
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


    $query = "UPDATE $WSSimple SET ";
    $query .= "wss_de_date = '{$p_wss_de_date}', ";
    $query .= "wss_agency = '{$p_wss_agency}', ";
    $query .= "wss_name = '{$p_wss_name}', ";
    $query .= "wss_num = '{$p_wss_num}', ";
    $query .= "wss_vol_name = '{$p_wss_vol_name}', ";
    $query .= "wss_undertaker = '{$p_wss_undertaker}', ";
    $query .= "wss_de_type = '{$p_wss_de_typelist}', ";
    $query .= "wss_vol_num = '{$p_wss_vol_num}', ";
    $query .= "wss_vol_phone = '{$p_wss_vol_phone}', ";
    $query .= "wss_vol_addr = '{$p_wss_vol_addr}', ";
    $query .= "wss_vol_email = '{$p_wss_vol_email}', ";
    $query .= "wss_pj_area = '{$p_wss_pj_area}', ";
    $query .= "wss_pj_seat_county = '{$p_wss_pj_seat_county}', ";
    $query .= "wss_pj_seat_town = '{$p_wss_pj_seat_town}', ";
    $query .= "wss_pj_seat_alley = '{$p_wss_pj_seat_alley}', ";
    $query .= "wss_pj_seat_no = '{$p_wss_pj_seat_no}', ";
    $query .= "wss_pj_seat_count = '{$p_wss_pj_seat_count}', ";
    $query .= "wss_pj_co = '{$p_wss_pj_co}', ";
    $query .= "wss_pj_own = '{$p_wss_pj_own}', ";
    $query .= "wss_pj_add = '{$p_wss_pj_add}', ";
    $query .= "wss_check_item1 = '{$p_wss_check_item1}', ";
    $query .= "wss_check_item2 = '{$p_wss_check_item2}', ";
    $query .= "wss_check_item3 = '{$p_wss_check_item3}', ";
    $query .= "wss_check_item4 = '{$p_wss_check_item4}', ";
    $query .= "wss_sc_slope = '{$p_wss_sc_slope}', ";
    $query .= "wss_sc_ag_road_lgth = '{$p_wss_sc_ag_road_lgth}', ";
    $query .= "wss_sc_ag_road_wth = '{$p_wss_sc_ag_road_wth}', ";
    $query .= "wss_sc_oth_road_wth = '{$p_wss_sc_oth_road_wth}', ";
    $query .= "wss_sc_oth_road_total = '{$p_wss_sc_oth_road_total}', ";
    $query .= "wss_sc_exist_road_total = '{$p_wss_sc_exist_road_total}', ";
    $query .= "wss_sc_arch_area = '{$p_wss_sc_arch_area}', ";
    $query .= "wss_sc_arch_oth_area = '{$p_wss_sc_arch_oth_area}', ";
    $query .= "wss_sc_arch_total = '{$p_wss_sc_arch_total}', ";
    $query .= "wss_sc_accu = '{$p_wss_sc_accu}', ";
    $query .= "wss_sc_adopt = '{$p_wss_sc_adopt}', ";
    $query .= "wss_sc_oth_type = '{$p_wss_sc_oth_type}', ";
    $query .= "wss_sc_faci_area = '{$p_wss_sc_faci_area}', ";
    $query .= "wss_sc_faci_oth_area = '{$p_wss_sc_faci_oth_area}', ";
    $query .= "wss_sc_faci_total = '{$p_wss_sc_faci_total}', ";
    $query .= "wss_sc_sum = '{$p_wss_sc_sum}', ";
    $query .= "wss_att_pre = '{$p_wss_att_pre}', ";
    $query .= "wss_ad_remark = '{$p_wss_ad_remark}', ";
    
    // $query .= "wss_apy_date = '{$p_wss_apy_date}', ";
    $query .= "wss_apy_tnum = '{$p_wss_apy_tnum}', ";
    $query .= "wss_apv_date = '{$p_wss_apv_date}', ";
    $query .= "wss_apv_tnum = '{$p_wss_apv_tnum}', ";
    $query .= "wss_main_apv_date = '{$p_wss_main_apv_date}', ";
    $query .= "wss_main_apv_tnum = '{$p_wss_main_apv_tnum}', ";
    $query .= "wss_st_date = '{$p_wss_st_date}', ";
    $query .= "wss_rm_st_date = '{$p_wss_rm_st_date}', ";
    $query .= "wss_ac_st_date = '{$p_wss_ac_st_date}', ";
    $query .= "wss_end_date = '{$p_wss_end_date}', ";
    $query .= "wss_rm_end_date = '{$p_wss_rm_end_date}', ";
    $query .= "wss_ac_end_date = '{$p_wss_ac_end_date}', ";
    $query .= "wss_rm_crew = '{$p_wss_rm_crew}', ";
    $query .= "wss_remark = '{$p_wss_remark}', ";
    $query .= "wss_add_1 = '{$p_wss_add_1}', ";
    $query .= "wss_add_2 = '{$p_wss_add_2}', ";
    $query .= "wss_add_3 = '{$p_wss_add_3}', ";
    $query .= "wss_add_4 = '{$p_wss_add_4}', ";
    $query .= "wss_remark_add = '{$p_wss_remark_addlist}', ";
    $query .= "wss_remark_fac = '{$p_wss_remark_faclist}', ";
    $query .= "wss_remark_loc = '{$p_wss_remark_loclist}', ";
    $query .= "wss_remark_num = '{$p_wss_remark_numlist}', ";
    $query .= "wss_remark_size = '{$p_wss_remark_sizelist}', ";
    $query .= "wss_remark_oth = '{$p_wss_remark_othlist}', ";
    $query .= "wss_apy_date1 = '{$p_wss_apy_date1}', ";
    $query .= "wss_apy_date2 = '{$p_wss_apy_date2}', ";
    $query .= "wss_apy_tnum1 = '{$p_wss_apy_tnum1}', ";
    $query .= "wss_apy_tnum2 = '{$p_wss_apy_tnum2}', ";
    $query .= "wss_apv_date1 = '{$p_wss_apv_date1}', ";
    $query .= "wss_apv_date2 = '{$p_wss_apv_date2}', ";
    $query .= "wss_apv_tnum1 = '{$p_wss_apv_tnum1}', ";
    $query .= "wss_apv_tnum2 = '{$p_wss_apv_tnum2}', ";
    $query .= "wss_ex_end_date1 = '{$p_wss_ex_end_date1}', ";
    $query .= "wss_ex_end_date2 = '{$p_wss_ex_end_date2}', ";
    $query .= "wss_rm_end_date1 = '{$p_wss_rm_end_date1}', ";
    $query .= "wss_rm_end_date2 = '{$p_wss_rm_end_date2}', ";
    $query .= "wss_close = '{$p_wss_close}', ";
    $query .= "wss_ex_remark1 = '{$p_wss_ex_remark1}', ";
    $query .= "wss_ex_remark2 = '{$p_wss_ex_remark2}', ";
    $query .= "wss_files = '{$timestamped_filesname_string}' ";


    $query .= "WHERE wss_id = '{$the_wss_id}' ";

    $update_project = mysqli_query($connection, $query);
    comfirmQuery($update_project, '編輯成功', null);

}

if(isset($_POST['delete_project'])){

    $filenameToDelete = $_POST['delete_filename'];
    $wss_files_array = explode(",", $wss_files);
    $wss_files_array = array_diff($wss_files_array, [$filenameToDelete]);
    $wss_files_left = implode(",", $wss_files_array);
 
    $query = "UPDATE $WSSimple SET ";

    $query .= "wss_files = '{$wss_files_left}' ";
    
    $query .= "WHERE wss_id = '{$the_wss_id}' ";

    $delete_files = mysqli_query($connection, $query);
    comfirmQuery($delete_files, '刪除成功', null);
}

$query = "SELECT * FROM $WSSimple WHERE wss_id = $the_wss_id";
$select_all_WSsimple_query_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_WSsimple_query_by_id)){

    $wss_id = $row['wss_id']; //序號

    $wss_de_date = $row['wss_de_date']; //申報日期
    if($wss_de_date == "1970-01-01"){
        $wss_de_date = "";
    }

    $wss_agency = $row['wss_agency']; //受理機關
    $wss_name = $row['wss_name']; //計畫名稱
    $wss_num = $row['wss_num']; //案件編號 14碼 UP0711107006
    $wss_undertaker = $row['wss_undertaker']; //案件承辦人員
    $wss_de_type = $row['wss_de_type']; //開發種類
    $wss_de_typelist = explode(", ",$wss_de_type);

    $wss_vol_name = $row['wss_vol_name']; //水土保持義務人名稱
    $wss_vol_num = $row['wss_vol_num']; //國民身分證統一編號或營利事業統一編號
    $wss_vol_phone = $row['wss_vol_phone']; //電話
    $wss_vol_addr = $row['wss_vol_addr']; //住居所或營業所
    $wss_vol_email = $row['wss_vol_email']; //電子郵件

    $wss_vol = [$wss_vol_name, $wss_vol_num, $wss_vol_phone, $wss_vol_addr, $wss_vol_email];

    $wss_pj_area = $row['wss_pj_area']; //計畫面積
    $wss_pj_seat_county = $row['wss_pj_seat_county']; //實施地點 土地座落 縣
    $wss_pj_seat_town = $row['wss_pj_seat_town']; //實施地點 土地座落 市鎮
    $wss_pj_seat_alley = $row['wss_pj_seat_alley']; //實施地點 土地座落 段
    $wss_pj_seat_no = $row['wss_pj_seat_no']; //實施地點 土地座落 號
    $wss_pj_seat_count = $row['wss_pj_seat_count']; //實施地點 土地座落 筆數
    $wss_pj_co = $row['wss_pj_co']; //土地座標
    // $wss_pj_co_data = explode(",",ltrim(rtrim($wss_pj_co,')' ),'('));

    $wss_pj_own = $row['wss_pj_own']; //土地權屬
    $wss_pj_add = $row['wss_pj_add']; //土地權屬

    $wss_check_item1 = $row['wss_check_item1']; //檢核事項
    $wss_check_item2 = $row['wss_check_item2']; 
    $wss_check_item3 = $row['wss_check_item3']; 
    $wss_check_item4 = $row['wss_check_item4']; 

    $wss_sc_slope = $row['wss_sc_slope']; //農業整坡作業公頃
    $wss_sc_ag_road_lgth = $row['wss_sc_ag_road_lgth']; //修築農路 長度
    $wss_sc_ag_road_wth = $row['wss_sc_ag_road_wth']; //修築農路 路基寬度
    $wss_sc_oth_road_wth = $row['wss_sc_oth_road_wth']; //修建其他道路 路基寬度
    $wss_sc_oth_road_total = $row['wss_sc_oth_road_total']; //修建其他道路 路基總面積

    $wss_sc_exist_road_total = $row['wss_sc_exist_road_total']; //改善或維護既有道路 路基總面積

    $wss_sc_arch_area = $row['wss_sc_arch_area']; //開發建築用地 建築面積
    $wss_sc_arch_oth_area = $row['wss_sc_arch_oth_area']; //開發建築用地 其他開挖整地面積
    $wss_sc_arch_total = $row['wss_sc_arch_total']; //開發建築用地 合計

    $wss_sc_accu = $row['wss_sc_accu']; //堆積土石
    $wss_sc_adopt = $row['wss_sc_adopt']; //採取土石

    $wss_sc_oth_type = $row['wss_sc_oth_type']; //設置公園、墳墓、運動場地、原住民在原住民族地區依原住民族基本法第十九條規定採取礦物或其他開挖整地
    $wss_sc_faci_area = $row['wss_sc_faci_area']; //農作產銷設施之農業生產設施、林業設施之林業經營設施或畜牧設施之養畜設施、養禽設施、孵化場(室)設施、青貯設施
    $wss_sc_faci_oth_area = $row['wss_sc_faci_oth_area']; //其他開挖整地面積
    $wss_sc_faci_total = $row['wss_sc_faci_total']; //合計

    $wss_sc_sum = $row['wss_sc_sum']; //挖、填方總和
    $wss_att_pre = $row['wss_att_pre']; //附款或注意事項

    $wss_remark_add = $row['wss_remark_add']; //備註
    $wss_remark_addlist = array_filter(explode(", ",$wss_remark_add));
    $wss_remark_fac = $row['wss_remark_fac']; 
    $wss_remark_faclist = explode(", ",$wss_remark_fac);
    $wss_remark_loc = $row['wss_remark_loc']; 
    $wss_remark_loclist = explode(", ",$wss_remark_loc);
    $wss_remark_num = $row['wss_remark_num']; 
    $wss_remark_numlist = explode(", ",$wss_remark_num);
    $wss_remark_size = $row['wss_remark_size']; 
    $wss_remark_sizelist = explode(", ",$wss_remark_size);
    $wss_remark_oth = $row['wss_remark_oth']; 
    $wss_remark_othlist = explode(", ",$wss_remark_oth);

    $wss_ad_remark = $row['wss_ad_remark']; //行政備註
    $wss_apy_date = $row['wss_apy_date']; //申請日期
    if($wss_apy_date == "1970-01-01"){
        $wss_apy_date = "";
    }
    $wss_apy_tnum = $row['wss_apy_tnum']; //申請文號
    $wss_apv_date = $row['wss_apv_date']; //核准日期
    if($wss_apv_date == "1970-01-01"){
        $wss_apv_date = "";
    }
    $wss_apv_tnum = $row['wss_apv_tnum']; //核准文號
    $wss_main_apv_date = $row['wss_main_apv_date']; //目的事業主管機關核准日期
    $wss_main_apv_tnum = $row['wss_main_apv_tnum']; //目的事業主管機關核准文號
    $wss_st_date = $row['wss_st_date']; //應開工日期
    if($wss_st_date == "1970-01-01"){
        $wss_st_date = "";
    }
    $wss_rm_st_date = $row['wss_rm_st_date']; //提醒開工日期
    if($wss_rm_st_date == "1970-01-01"){
        $wss_rm_st_date = "";
    }
    $wss_ac_st_date = $row['wss_ac_st_date']; //實際開工日期
    if($wss_ac_st_date == "1970-01-01"){
        $wss_ac_st_date = "";
    }
    $wss_end_date = $row['wss_end_date']; //預定完工日期
    if($wss_end_date == "1970-01-01"){
        $wss_end_date = "";
    }
    $wss_rm_end_date = $row['wss_rm_end_date']; //提醒完工日期
    if($wss_rm_end_date == "1970-01-01"){
        $wss_rm_end_date = "";
    }
    $wss_ac_end_date = $row['wss_ac_end_date']; //實際完工日期
    if($wss_ac_end_date == "1970-01-01"){
        $wss_ac_end_date = "";
    }
    $wss_rm_crew = $row['wss_rm_crew']; //提醒通知人員
    $wss_remark = $row['wss_remark']; //備註
    $wss_add_1 = $row['wss_add_1']; //開工前輔導
    $wss_add_2 = $row['wss_add_2']; //期初檢查
    $wss_add_3 = $row['wss_add_3']; //施工中檢查
    $wss_add_4 = $row['wss_add_4']; //完工檢查

    // 第一二次展延
    $wss_apy_date1 = $row['wss_apy_date1']; //申請日期
    if($wss_apy_date1 == "1970-01-01"){
        $wss_apy_date1 = "";
    }
    $wss_apy_date2 = $row['wss_apy_date2']; //申請日期
    if($wss_apy_date2 == "1970-01-01"){
        $wss_apy_date2 = "";
    }
    $wss_apy_tnum1 = $row['wss_apy_tnum1']; //申請文號
    $wss_apy_tnum2 = $row['wss_apy_tnum2']; //申請文號

    $wss_apv_date1 = $row['wss_apv_date1']; //核准日期
    if($wss_apv_date1 == "1970-01-01"){
        $wss_apv_date1 = "";
    }
    $wss_apv_date2 = $row['wss_apv_date2']; //核准日期
    if($wss_apv_date2 == "1970-01-01"){
        $wss_apv_date2 = "";
    }
    $wss_apv_tnum1 = $row['wss_apv_tnum1']; //核准文號
    $wss_apv_tnum2 = $row['wss_apv_tnum2']; //核准文號

    $wss_ex_end_date1 = $row['wss_ex_end_date1']; //展延完工日期
    if($wss_ex_end_date1 == "1970-01-01"){
        $wss_ex_end_date1 = "";
    }
    $wss_ex_end_date2 = $row['wss_ex_end_date2']; //展延完工日期
    if($wss_ex_end_date2 == "1970-01-01"){
        $wss_ex_end_date2 = "";
    }
    $wss_rm_end_date1 = $row['wss_rm_end_date1']; //提醒完工日期
    if($wss_rm_end_date1 == "1970-01-01"){
        $wss_rm_end_date1 = "";
    }
    $wss_rm_end_date2 = $row['wss_rm_end_date2']; //提醒完工日期
    if($wss_rm_end_date2 == "1970-01-01"){
        $wss_rm_end_date2 = "";
    }

    $wss_close = $row['wss_close']; //結案與否
    $wss_ex_remark1 = $row['wss_ex_remark1']; //展延備註1
    $wss_ex_remark2 = $row['wss_ex_remark2']; //展延備註2
 
    $wss_files = $row['wss_files']; //顧問公司彙整歷次空拍資料pdf
    if (!empty($wss_files)) {
        $wss_files_array = explode(",", $wss_files);
    } else {
        $wss_files_array = "";
    }
}

// ALL USER
$queryUser = "SELECT * FROM userlist WHERE user_role = 'auther'";
$select_all_user_query = mysqli_query($connection, $queryUser);
$user_fullname = array(); 

while($row = mysqli_fetch_assoc($select_all_user_query)){


    $user_fullname[] = $row['user_fullname']; //姓名
}
// ALL DATA for Seat
$queryData = "SELECT wss_pj_seat_town, wss_pj_seat_alley, wss_pj_seat_no FROM $WSSimple";
$select_all_wssimple_query = mysqli_query($connection, $queryData);
$your_database_data = array();
while ($row = mysqli_fetch_assoc($select_all_wssimple_query)) {
    $your_database_data[] = $row;
}

?>

<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <h1 class="h4 mb-4">編輯 簡易水保申請書 <?php echo $wss_num;?> <?php echo $wss_name;?> <?php
                                        if($wss_close == "1"){
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
                    <h2 class="h5 mb-4">簡易水土保持申報書內容

                    </h2>
                    <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header " id="flush-headingOne">
                                <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="true"
                                    aria-controls="flush-collapseOne">
                                    基本資料
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <label for="wss_undertaker" class="col-form-label">案件承辦人員 <span class='text-danger'>*</span></label>
                                    <select id="wss_undertaker_select" name="wss_undertaker" class="form-select" onchange="utaker(value)">
                                        <?php if (empty($wss_undertaker)): ?>
                                            <option value="" selected >請選擇承辦人員</option>
                                        <?php endif; ?>
            
                                        <?php foreach ($user_fullname as $fullname): ?>
                                            <?php if ($fullname === $wss_undertaker): ?>
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
                                    <label for="wss_num" class="col-form-label">案件編號</label>
                                    <input id="wss_num" name="wss_num" type="text" class="form-control" value="<?php echo $wss_num;?>" > 

                                    <label for="wss_de_date" class="col-form-label">申報日期</label>
                                    <div class="input-group ">
                                        <input id="wss_de_date" type="date" class="form-control" name="wss_de_date" value="<?php echo $wss_de_date;?>" onchange="de(value)">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    
                                    <label for="wss_apy_tnum" class="col-form-label">申請文號</label>
                                    <input type="text" class="form-control" id="wss_apy_tnum" name="wss_apy_tnum" value="<?php echo $wss_apy_tnum;?>"  onchange="num(value)">
                                    <label for="wss_agency-name" class="col-form-label" >受理機關</label>
                                    <input id="wss_agency" name="wss_agency" type="text" class="form-control" value="雲林縣政府">
                                    <label for="wss_name" class="col-form-label" >計畫名稱 <span class='text-danger'>*</span></label>
                                    <input id="wss_name" name="wss_name" type="text" class="form-control" value="<?php echo $wss_name;?>" >
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    開發種類
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse "
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                <input type="hidden" name="wss_de_type[]" value="無" checked>
                                <?php
                                    $type = '[{"name":"從事農、林、漁、牧地之開發利用所需之修築農路：路基寬度未滿四公尺，且長度未滿五百公尺者"},
                                    {"name":"從事農、林、漁、牧地之開發利用所需之整坡作業：未滿二公頃者"},
                                    {"name":"修建鐵路、公路、農路以外之其他道路：路基寬度未滿四公尺，且路基總面積未滿二千平方公尺"},
                                    {"name":"改善或維護既有道路者：拓寬路基或改變路線之路基總面積未滿二千平方公尺"},
                                    {"name":"開發建築用地：建築面積及其他開挖整地面積未滿五百平方公尺者"},
                                    {"name":"農作產銷設施之農業生產設施、林業設施之林業經營設施或畜牧設施之養畜設施、養禽設施、孵化場(室)設施、青貯設施：建築面積及其他開挖整地面積合計未滿一公頃；免申請建築執照者，前開建築面積以其興建設施面積核計"},
                                    {"name":"堆積土石"},
                                    {"name":"採取土石：土石方未滿三十立方公尺者"},
                                    {"name":"設置公園、墳墓、運動場地、原住民在原住民族地區依原住民族基本法第十九條規定採取礦物或其他開挖整地：開挖整地面積未滿一千平方公尺"},
                                    {"name":"其他法令規定，得以簡易水土保持申報書代替者"}]';
                                    $type_array = json_decode( $type, true );

                                    foreach($type_array as $key=>$item) { 
                                        $name = $item['name']; 
                                        
                                        if(in_array($name, $wss_de_typelist)){
                                            $checked = "checked";
                                        }else{
                                            $checked = "";
                                        }
                                        
                                        echo "<div class='form-check'>";
                                        echo "<input class='form-check-input' type='checkbox' name='wss_de_type[]' value='$name' id='type$key' $checked>";
                                        echo "<label class='form-check-label' for='type$key'>";
                                        echo "$name";
                                        echo "</label>";
                                        echo "</div>";
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
                                    水土保持義務人

                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse "
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            
                                <div class="accordion-body">
                                    <?php
                                        $vol = '[{"title_cn":"姓名或名稱","title_en":"wss_vol_name","type":"text","required":"false"},
                                        {"title_cn":"國民身分證統一編號或營利事業統一編號","title_en":"wss_vol_num","type":"text","required":"false"},
                                        {"title_cn":"電話","title_en":"wss_vol_phone","type":"text","required":"true"},
                                        {"title_cn":"住居所或營業所","title_en":"wss_vol_addr","type":"text","required":"false"},
                                        {"title_cn":"電子郵件","title_en":"wss_vol_email","type":"email","required":"false"}]';
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
                                            echo "<label for='$title_en' class='col-form-label'>$title_cn $star</label>";
                                            echo "<input id='$title_en' name='$title_en' type='$type' class='form-control' $required value='$wss_vol[$key]' onchange='de(value)'>";
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
                                    實施地點

                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse "
                                aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                        <label class="col-sm-2 col-form-label">計畫面積
                                        </label>
                                        <div class="input-group">
                                            <input type="number" step="0.0000001" class="form-control" name="wss_pj_area" value="<?php echo $wss_pj_area;?>">
                                            <span class="input-group-text" id="">公頃</span>
                                        </div>
                                        <label class="col-sm-2 col-form-label">實施地點
                                            土地座落
                                        </label>
                                        <div class="input-group mb-2">

                                            <select class="form-select" id="wss_pj_seat_county" name="wss_pj_seat_county" value="<?php echo $wss_pj_seat_county;?>">
                                                <option value="雲林縣" selected>雲林縣</option>
                                            </select>

                                            <select class="form-select" id="wss_pj_seat_town" name="wss_pj_seat_town" >
                                                <?php
                                                    $areaitem = '[{"area":"斗六市","value":"斗六市"},{"area":"古坑鄉","value":"古坑鄉"},{"area":"林內鄉","value":"林內鄉"}]';
                                                    $areaitem_array = json_decode( $areaitem, true );
                                                    
                                                    foreach($areaitem_array as $item) { 
                                                        $value = $item['value'];
                                                        $area = $item['area'];

                                                        if($wss_pj_seat_town == $value){ 
                                                            $selected = "selected";
                                                        }else{
                                                            $selected = "";
                                                        }
                                                        
                                                        echo "<option value='$value' $selected >$area</option>";
                                                    }
                                                ?>
                                            </select>
                                            <input id="road" type="hidden" value="<?php echo $wss_pj_seat_alley?>">

                                            <select class="form-select" id="wss_pj_seat_alley" name="wss_pj_seat_alley" value="<?php echo $wss_pj_seat_alley;?>">
                                                <?php
                                                    if($wss_pj_seat_town == "斗六市"){
                                                        $alleyitem = '[{"area":"斗六市","road":"九老爺段","value":"九老爺段" },{"area":"斗六市","road":"八德段","value":"八德段" },{"area":"斗六市","road":"十三段","value":"十三段" },{"area":"斗六市","road":"三平段","value":"三平段" },{"area":"斗六市","road":"大北勢段大北勢小段","value":"大北勢段大北勢小段" },{"area":"斗六市","road":"大北勢段甲六埤小段","value":"大北勢段甲六埤小段" },{"area":"斗六市","road":"大北勢段林子頭小段","value":"大北勢段林子頭小段" },{"area":"斗六市","road":"大竹圍段","value":"大竹圍段" },{"area":"斗六市","road":"大崙段大崙小段","value":"大崙段大崙小段" },{"area":"斗六市","road":"大崙段茄苳腳小段","value":"大崙段茄苳腳小段" },{"area":"斗六市","road":"大潭段大潭小段","value":"大潭段大潭小段" },{"area":"斗六市","road":"大潭段社口小段","value":"大潭段社口小段" },{"area":"斗六市","road":"中興段","value":"中興段" },{"area":"斗六市","road":"內林段","value":"內林段" },{"area":"斗六市","road":"公正段","value":"公正段" },{"area":"斗六市","road":"斗六一段","value":"斗六一段" },{"area":"斗六市","road":"斗六二段","value":"斗六二段" },{"area":"斗六市","road":"斗六三段","value":"斗六三段" },{"area":"斗六市","road":"斗六段","value":"斗六段" },{"area":"斗六市","road":"水尾口段","value":"水尾口段" },{"area":"斗六市","road":"牛埔段","value":"牛埔段" },{"area":"斗六市","road":"北環段","value":"北環段" },{"area":"斗六市","road":"半路段","value":"半路段" },{"area":"斗六市","road":"正心段","value":"正心段" },{"area":"斗六市","road":"石牛溪段","value":"石牛溪段" },{"area":"斗六市","road":"石農段","value":"石農段" },{"area":"斗六市","road":"石榴段","value":"石榴段" },{"area":"斗六市","road":"石榴班段","value":"石榴班段" },{"area":"斗六市","road":"光明段","value":"光明段" },{"area":"斗六市","road":"光復段","value":"光復段" },{"area":"斗六市","road":"竹圍子段","value":"竹圍子段" },{"area":"斗六市","road":"竹頭段","value":"竹頭段" },{"area":"斗六市","road":"自強段","value":"自強段" },{"area":"斗六市","road":"西平段","value":"西平段" },{"area":"斗六市","road":"秀才段","value":"秀才段" },{"area":"斗六市","road":"府文段","value":"府文段" },{"area":"斗六市","road":"明德段","value":"明德段" },{"area":"斗六市","road":"林子頭段林子頭小段","value":"林子頭段林子頭小段" },{"area":"斗六市","road":"林子頭段番子溝小段","value":"林子頭段番子溝小段" },{"area":"斗六市","road":"林頭段","value":"林頭段" },{"area":"斗六市","road":"虎溪段","value":"虎溪段" },{"area":"斗六市","road":"長平段","value":"長平段" },{"area":"斗六市","road":"長安段","value":"長安段" },{"area":"斗六市","road":"保庄段","value":"保庄段" },{"area":"斗六市","road":"保長廍段后庄子小段","value":"保長廍段后庄子小段" },{"area":"斗六市","road":"保長廍段虎尾溪小段","value":"保長廍段虎尾溪小段" },{"area":"斗六市","road":"保長廍段保長廍小段","value":"保長廍段保長廍小段" },{"area":"斗六市","road":"咬狗北段","value":"咬狗北段" },{"area":"斗六市","road":"咬狗庄段","value":"咬狗庄段" },{"area":"斗六市","road":"咬狗段","value":"咬狗段" },{"area":"斗六市","road":"建成段","value":"建成段" },{"area":"斗六市","road":"後庄段","value":"後庄段" },{"area":"斗六市","road":"科一段","value":"科一段" },{"area":"斗六市","road":"科二段","value":"科二段" },{"area":"斗六市","road":"科工段","value":"科工段" },{"area":"斗六市","road":"科加段","value":"科加段" },{"area":"斗六市","road":"貞寮段","value":"貞寮段" },{"area":"斗六市","road":"重光東段","value":"重光東段" },{"area":"斗六市","road":"重光段","value":"重光段" },{"area":"斗六市","road":"海豐崙段朱丹灣小段","value":"海豐崙段朱丹灣小段" },{"area":"斗六市","road":"海豐崙段海豐崙小段","value":"海豐崙段海豐崙小段" },{"area":"斗六市","road":"秦寮段","value":"秦寮段" },{"area":"斗六市","road":"埤口段","value":"埤口段" },{"area":"斗六市","road":"崙仔段","value":"崙仔段" },{"area":"斗六市","road":"崙北段","value":"崙北段" },{"area":"斗六市","road":"崙南段","value":"崙南段" },{"area":"斗六市","road":"梅林西段","value":"梅林西段" },{"area":"斗六市","road":"梅林東段","value":"梅林東段" },{"area":"斗六市","road":"梅南段","value":"梅南段" },{"area":"斗六市","road":"湖山段","value":"湖山段" },{"area":"斗六市","road":"菜公段","value":"菜公段" },{"area":"斗六市","road":"雲林溪段","value":"雲林溪段" },{"area":"斗六市","road":"黃厝段","value":"黃厝段" },{"area":"斗六市","road":"新虎溪段","value":"新虎溪段" },{"area":"斗六市","road":"新溪洲段","value":"新溪洲段" },{"area":"斗六市","road":"溝子埧段瓦厝子小段","value":"溝子埧段瓦厝子小段" },{"area":"斗六市","road":"溝子埧段柴裡小段","value":"溝子埧段柴裡小段" },{"area":"斗六市","road":"溝子埧段溝子埧小段","value":"溝子埧段溝子埧小段" },{"area":"斗六市","road":"溝垻段","value":"溝垻段" },{"area":"斗六市","road":"溪洲段","value":"溪洲段" },{"area":"斗六市","road":"萬年西段","value":"萬年西段" },{"area":"斗六市","road":"萬年東段","value":"萬年東段" },{"area":"斗六市","road":"嘉東段","value":"嘉東段" },{"area":"斗六市","road":"榴中段","value":"榴中段" },{"area":"斗六市","road":"榴北段","value":"榴北段" },{"area":"斗六市","road":"劉厝段","value":"劉厝段" },{"area":"斗六市","road":"龍潭段","value":"龍潭段" },{"area":"斗六市","road":"鎮西段","value":"鎮西段"}]';
                                                    }elseif($wss_pj_seat_town == "古坑鄉"){
                                                        $alleyitem = '[{"area":"古坑鄉","road":"下崁腳段","value":"下崁腳段" },{"area":"古坑鄉","road":"下麻園段","value":"下麻園段" },{"area":"古坑鄉","road":"大湖口段","value":"大湖口段" },{"area":"古坑鄉","road":"大湖底段","value":"大湖底段" },{"area":"古坑鄉","road":"中洲段","value":"中洲段" },{"area":"古坑鄉","road":"水碓西段","value":"水碓西段" },{"area":"古坑鄉","road":"水碓東段","value":"水碓東段" },{"area":"古坑鄉","road":"水碓段","value":"水碓段" },{"area":"古坑鄉","road":"水碓新段","value":"水碓新段" },{"area":"古坑鄉","road":"古坑段古坑小段","value":"古坑段古坑小段" },{"area":"古坑鄉","road":"古坑段湳子小段","value":"古坑段湳子小段" },{"area":"古坑鄉","road":"永光段","value":"永光段" },{"area":"古坑鄉","road":"永昌段","value":"永昌段" },{"area":"古坑鄉","road":"永興段","value":"永興段" },{"area":"古坑鄉","road":"田心段","value":"田心段" },{"area":"古坑鄉","road":"石坑段","value":"石坑段" },{"area":"古坑鄉","road":"尖山坑段","value":"尖山坑段" },{"area":"古坑鄉","road":"西華段","value":"西華段" },{"area":"古坑鄉","road":"東和段","value":"東和段" },{"area":"古坑鄉","road":"東陽段","value":"東陽段" },{"area":"古坑鄉","road":"東興段","value":"東興段" },{"area":"古坑鄉","road":"青山段","value":"青山段" },{"area":"古坑鄉","road":"南昌段","value":"南昌段" },{"area":"古坑鄉","road":"建德段","value":"建德段" },{"area":"古坑鄉","road":"苦苓腳段","value":"苦苓腳段" },{"area":"古坑鄉","road":"崁腳段","value":"崁腳段" },{"area":"古坑鄉","road":"崁頭厝段","value":"崁頭厝段" },{"area":"古坑鄉","road":"草嶺段","value":"草嶺段" },{"area":"古坑鄉","road":"高林北段","value":"高林北段" },{"area":"古坑鄉","road":"高林南段","value":"高林南段" },{"area":"古坑鄉","road":"高厝林子頭段","value":"高厝林子頭段" },{"area":"古坑鄉","road":"荷苞段","value":"荷苞段" },{"area":"古坑鄉","road":"頂新庄段","value":"頂新庄段" },{"area":"古坑鄉","road":"麻園庄段","value":"麻園庄段" },{"area":"古坑鄉","road":"麻園段","value":"麻園段" },{"area":"古坑鄉","road":"棋山段","value":"棋山段" },{"area":"古坑鄉","road":"棋東段","value":"棋東段" },{"area":"古坑鄉","road":"棋盤段","value":"棋盤段" },{"area":"古坑鄉","road":"棋盤厝段","value":"棋盤厝段" },{"area":"古坑鄉","road":"湳子段","value":"湳子段" },{"area":"古坑鄉","road":"新生段","value":"新生段" },{"area":"古坑鄉","road":"新光段","value":"新光段" },{"area":"古坑鄉","road":"新庄段","value":"新庄段" },{"area":"古坑鄉","road":"新園段","value":"新園段" },{"area":"古坑鄉","road":"溪邊厝段","value":"溪邊厝段" },{"area":"古坑鄉","road":"樟湖段","value":"樟湖段" }]';
                                                    }elseif($wss_pj_seat_town == "林內鄉"){
                                                        $alleyitem = '[{"area":"林內鄉","road":"九芎林段","value":"九芎林段" },{"area":"林內鄉","road":"九芎南段","value":"九芎南段" },{"area":"林內鄉","road":"九芎段","value":"九芎段" },{"area":"林內鄉","road":"中山段","value":"中山段" },{"area":"林內鄉","road":"仁愛段","value":"仁愛段" },{"area":"林內鄉","road":"永昌段","value":"永昌段" },{"area":"林內鄉","road":"成功段","value":"成功段" },{"area":"林內鄉","road":"芎林段","value":"芎林段" },{"area":"林內鄉","road":"芎蕉段","value":"芎蕉段" },{"area":"林內鄉","road":"林內段","value":"林內段" },{"area":"林內鄉","road":"長興段","value":"長興段" },{"area":"林內鄉","road":"重興段","value":"重興段" },{"area":"林內鄉","road":"烏麻段","value":"烏麻段" },{"area":"林內鄉","road":"烏塗子段","value":"烏塗子段" },{"area":"林內鄉","road":"烏塗段","value":"烏塗段" },{"area":"林內鄉","road":"頂庄段","value":"頂庄段" },{"area":"林內鄉","road":"湖山寮段","value":"湖山寮段" },{"area":"林內鄉","road":"湖本段","value":"湖本段" },{"area":"林內鄉","road":"進興段","value":"進興段" },{"area":"林內鄉","road":"新興段","value":"新興段" },{"area":"林內鄉","road":"寶隆段","value":"寶隆段" }]';
                                                    }
                                                    
                                                    $alleyitem_array = json_decode( $alleyitem, true );
                                                    
                                                    foreach($alleyitem_array as $item) { 
                                                        $area = $item['area'];
                                                        $value = $item['value'];
                                                        $road = $item['road'];

                                                        if($wss_pj_seat_alley == $value){ 
                                                            $selected = "selected";
                                                        }else{
                                                            $selected = "";
                                                        }
                                                        
                                                        echo "<option value='$value' $selected >$road</option>";
                                                    }
                                                ?>
                                            <option value="<?php echo $wss_pj_seat_alley;?>" ><?php echo $wss_pj_seat_alley;?></option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input id="wss_pj_seat_no" type="text" class="form-control" id="" name="wss_pj_seat_no" placeholder="請輸入地號" value="<?php echo $wss_pj_seat_no;?>">
                                            <input type="number" class="form-control" name="wss_pj_seat_count" placeholder="土地筆數" value="<?php echo $wss_pj_seat_count;?>">
                                            <span class="input-group-text" id="">筆</span>
                                        </div>
                                        <label for="" class="col-sm-2 col-form-label">土地座標 (TWD97) <span class='text-danger'>*</span></label>
                                        <div class="input-group">
                                            <input id="latlng" type="text" class="form-control" name="wss_pj_co" data-lat="23.6743232" data-lng="120.4345919" value="<?php echo $wss_pj_co;?>">
                                            <span class="input-group-text" id=""><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <div id="map" style="width: 100%; height: 60vh;"></div>
                                        <label for="wss_pj_own" class="col-sm-2 col-form-label">土地權屬</label>
                                        <input type="text" class="form-control" name="wss_pj_own" value="<?php echo $wss_pj_own;?>">
                                        <label for="wss_pj_add" class="col-sm-2 col-form-label">土地新增</label>
                                        <input type="text" class="form-control" name="wss_pj_add" value="<?php echo $wss_pj_add;?>">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFive" aria-expanded="false"
                                    aria-controls="flush-collapseFive">
                                    檢核事項

                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse "
                                aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                <?php 
                                            $checkitem = '[{"item":"申請開發基地內土地無違規開發情形","content":"水土保持計畫審核監督辦法第十條第一項第六款及第七款"},
                                            {"item":"申請開發基地內土地無座落於特定水土保持區","content":"水土保持法第十九條第二項及水土保持計畫審核監督辦法第十一條第四款"},
                                            {"item":"申請開發基地內土地無座落於國家公園範圍內","content":"水土保持法第十四條"},
                                            {"item":"申請開發基地內土地無座落於水庫集水區範圍內","content":"山坡地保育利用條例第三十二條之一"}]';
                                            $checkitem_array = json_decode( $checkitem, true );

                                            
        
                                            foreach($checkitem_array as $key=>$item) { 
                                                $name = $item['item']; 
                                                $content = $item['content']; 
                                                $id = $key + 1;
                                                $item = 'wss_check_item'.$id;
                                                if($$item == "有"){
                                                    $checked = "checked";
                                                    $checked_f = "";
                                                }else{
                                                    $checked = "";
                                                    $checked_f = "checked";
                                                }
                                                echo "<div class='row mb-4'>";
                                                echo "<div class='col-4 h6'>$name</div>";
                                                echo "<div class='col-4'>";
                                                echo "<div class='form-check form-check-inline'>";
                                                echo "<input class='form-check-input' type='radio' name='wss_check_item$id' id='wss_check_true_$id' $checked value='有'>";
                                                echo "<label class='form-check-label' for='wss_check_true_$id'>有</label>";
                                                echo "</div>";
                                                echo "<div class='form-check form-check-inline'>";
                                                echo "<input class='form-check-input' type='radio' name='wss_check_item$id' id='wss_check_false_$id' $checked_f value='無'>";
                                                echo "<label class='form-check-label' for='wss_check_false_$id'>無</label>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "<div class='col-4'>$content</div>";
                                                echo "</div>";
                                            }
                                            ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseSix" aria-expanded="false"
                                    aria-controls="flush-collapseSix">
                                    開發規模

                                </button>
                            </h2>
                            <div id="flush-collapseSix" class="accordion-collapse collapse "
                                aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">

                                        <label for="wss_sc_slope" class="col-sm-2 col-form-label">農業整坡作業公頃</label>
                                        <div class="input-group">
                                            <input id="wss_sc_slope" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_slope;?>" name="wss_sc_slope">
                                            <span class="input-group-text" id="">公頃</span>
                                        </div>
                                        <label for="wss_sc_ag_road_lgth" class="col-sm-2 col-form-label">修築農路</label>
                                        <div class="input-group">
                                            <span class="input-group-text">長度</span>
                                            <input id="wss_sc_ag_road_lgth" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_ag_road_lgth;?>" name="wss_sc_ag_road_lgth">
                                            <span class="input-group-text">公尺</span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text">路基寬度</span>
                                            <input id="wss_sc_ag_road_wth" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_ag_road_wth;?>" name="wss_sc_ag_road_wth">
                                            <span class="input-group-text">公尺</span>
                                        </div>
                                        <label for="wss_sc_oth_road_wth" class="col-sm-2 col-form-label">修建其他道路</label>
                                        <div class="input-group">
                                            <span class="input-group-text">路基寬度</span>
                                            <input id="wss_sc_oth_road_wth" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_oth_road_wth;?>" name="wss_sc_oth_road_wth">
                                            <span class="input-group-text">公尺</span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text">路基總面積</span>
                                            <input id="wss_sc_oth_road_total" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_oth_road_total;?>" name="wss_sc_oth_road_total">
                                            <span class="input-group-text">平方公尺</span>
                                        </div>
                                        <label for="wss_sc_exist_road_total" class="col-sm-2 col-form-label">改善或維護既有道路</label>
                                        <div class="input-group">
                                            <span class="input-group-text">路基總面積</span>
                                            <input id="wss_sc_exist_road_total" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_exist_road_total;?>" name="wss_sc_exist_road_total">
                                            <span class="input-group-text">平方公尺</span>
                                        </div>
                                        <label for="wss_sc_arch_area" class="col-sm-2 col-form-label">開發建築用地</label>
                                        <div class="input-group">
                                            <span class="input-group-text">建築面積</span>
                                            <input id="wss_sc_arch_area" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_arch_area;?>" name="wss_sc_arch_area">
                                            <span class="input-group-text">平方公尺</span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text">其他開挖整地面積</span>
                                            <input id="wss_sc_arch_oth_area" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_arch_oth_area;?>" name="wss_sc_arch_oth_area">
                                            <span class="input-group-text">平方公尺</span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text">合計</span>
                                            <input id="wss_sc_arch_total" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_arch_total;?>" name="wss_sc_arch_total">
                                            <span class="input-group-text">平方公尺</span>
                                        </div>
                                        <label for="wss_sc_accu" class="col-sm-2 col-form-label">堆積土石</label>
                                        <div class="input-group">
                                            <input id="wss_sc_accu" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_accu;?>" name="wss_sc_accu">
                                            <span class="input-group-text" id="">立方公尺</span>
                                        </div>
                                        <label for="wss_sc_adopt" class="col-sm-2 col-form-label">採取土石</label>
                                        <div class="input-group">
                                            <input id="wss_sc_adopt" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_adopt;?>" name="wss_sc_adopt">
                                            <span class="input-group-text" id="">立方公尺</span>
                                        </div>
                                        <label for="wss_sc_oth_type" class="col-auto col-form-label">設置公園、墳墓、運動場地、原住民在原住民族地區依原住民族基本法第十九條規定採取礦物或其他開挖整地</label>
                                        <div class="input-group">
                                            <span class="input-group-text">開挖整地面積</span>
                                            <input id="wss_sc_oth_type" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_oth_type;?>" name="wss_sc_oth_type">
                                            <span class="input-group-text">平方公尺</span>
                                        </div>
                                        <label for="wss_sc_faci_area" class="col-auto col-form-label">農作產銷設施之農業生產設施、林業設施之林業經營設施或畜牧設施之養畜設施、養禽設施、孵化場(室)設施、青貯設施</label>
                                        <div class="input-group">
                                            <span class="input-group-text">建築面積
                                            </span>
                                            <input id="wss_sc_faci_area" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_faci_area;?>" name="wss_sc_faci_area">
                                            <span class="input-group-text">平方公尺
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text">其他開挖整地面積</span>
                                            <input id="wss_sc_faci_oth_area" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_faci_oth_area;?>" name="wss_sc_faci_oth_area">
                                            <span class="input-group-text">平方公尺</span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text">合計</span>
                                            <input id="wss_sc_faci_total" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_faci_total;?>" name="wss_sc_faci_total">
                                            <span class="input-group-text">平方公尺</span>
                                        </div>
                                        <label for="wss_sc_sum" class="col-sm-2 col-form-label">挖、填方總和</label>
                                        <div class="input-group">
                                            <input id="wss_sc_sum" type="number" step="0.0000001" class="form-control" value="<?php echo $wss_sc_sum;?>" name="wss_sc_sum">
                                            <span class="input-group-text" id="">立方公尺</span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseSeven" aria-expanded="false"
                                    aria-controls="flush-collapseSeven">
                                    檢核事項

                                </button>
                            </h2>
                            <div id="flush-collapseSeven" class="accordion-collapse collapse "
                                aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <label for="wss_att_pre" class="col-sm-2 col-form-label">附款或注意事項</label>
                                    <textarea class="form-control" name="wss_att_pre" id="wss_att_pre" ><?php echo $wss_att_pre;?></textarea>
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
                                aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <ol style="list-style-type: cjk-ideographic;" id="OLRemark">
                                        <li class="pb-3">
                                            <div class="py-2 align-items-center">
                                                應擬具簡易水土保持申報書一式六份（及抄件若干份），內容包括下列書圖、文件：
                                                <ol>
                                                    <li>
                                                        實施地點土地位置圖、水土保持設施平面配置圖(包含挖填土石方區位、排水系統、擋土構造物、土方處理等)、
                                                        臨時防災設施配置圖、構造物示意圖及實施水土保持處理項目及數量明細表（如下表）。
                                                        <div class="list-area p-3">
                                                            <div id="TableAddAppendix" class="table">
                                                                <table class="table table-hover">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="cell th">項次</th>
                                                                        <th class="cell th">設施名稱</th>
                                                                        <th class="cell th">位置或編號</th>
                                                                        <th class="cell th">設計數量</th>
                                                                        <th class="cell th">設計尺寸</th>
                                                                        <th class="cell th">備註</th>  
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="tableList">   
                                                                        <?php
                                                                        $i = 0;
                                                                        for($i =0; $i < count($wss_remark_faclist); $i++){
                                                                            echo "<tr><th scope='row'>".($i+1)."</th>";
                                                                            echo "<td><input class='form-control' type='text' name='wss_remark_fac[]' value='$wss_remark_faclist[$i]'></td>";
                                                                            echo "<td><input class='form-control' type='text' name='wss_remark_loc[]' value='$wss_remark_loclist[$i]'></td>";
                                                                            echo "<td><input class='form-control' type='text' name='wss_remark_num[]' value='$wss_remark_numlist[$i]'></td>";
                                                                            echo "<td><input class='form-control' type='text' name='wss_remark_size[]' value='$wss_remark_sizelist[$i]'></td>";
                                                                            echo "<td><input class='form-control' type='text' name='wss_remark_oth[]' value='$wss_remark_othlist[$i]'></td></tr>";
                                                                        }
                                                                        ?>                                         
                                                                    </tbody>                                                      
                                                                </table>
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="addTable" data-num="<?php echo count($wss_remark_faclist);?>">
                                                                <i class="fas fa-plus mr-2 fa-sm"></i> 新增
                                                            </button>
                                                        </div>                                                
                                                    </li>
                                                    <li>
                                                        修建或改善道路之平面配置圖、各路段改善內容、數量等。
                                                    </li>
                                                    <li>
                                                        主管機關視審查需要，要求提供其他必要之相關書圖、文件。
                                                    </li>
                                                </ol>
                                            </div>
                                        </li>
                                        <li class="pb-3">
                                            同一案件如同時涉及多項「開發種類」者，請逐一勾選，惟各項「開發規模」均應符合水土保持計畫審核監督辦法第三條第一項各款規定；「開發種類」如符合前條第一項第二款規定，無山坡地保育利用條例第三十二條之一規定之適用。
                                        </li>
                                        <?php
                                        foreach($wss_remark_addlist as $item) { 
                            
                                            echo "<li class='pb-3'><input class='form-control' type='text' name='wss_remark_add[]' value='$item'></li>";
                                
                                        }
                                        ?>
                                    </ol>
                                    <button type="button" class="btn btn-primary" id="addRow">
                                        <i class="fas fa-plus mr-2 fa-sm"></i> 新增
                                    </button>
                                    <div>
                                        注意事項：本案土地合法使用權，由目的事業主管機關（單位）負責檢視。
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseNine" aria-expanded="false"
                                    aria-controls="flush-collapseNine">
                                    行政備註

                                </button>
                            </h2>
                            <div id="flush-collapseNine" class="accordion-collapse collapse "
                                aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <label for="wss_ad_remark" class="col-sm-2 col-form-label">行政備註</label>
                                    <textarea rows="6"  class="form-control" name="wss_ad_remark" id="wss_ad_remark" ><?php echo $wss_ad_remark;?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwelve">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwelve" aria-expanded="false"
                                    aria-controls="flush-collapseTwelve">
                                    上傳檔案
                                </button>
                            </h2>
                            <div id="flush-collapseTwelve" class="accordion-collapse collapse "
                                aria-labelledby="flush-headingTwelve" data-bs-parent="#maincontent">
                                <div class="accordion-body">
                                    <label for="wss_files" class="col-form-label">上傳檔案</label>
                                    <input type="file" class="form-control" id="wss_files" name="wss_files[]" multiple>
                                    <div >
                                    <?php
                                    if (!empty($wss_files_array) && !in_array("", $wss_files_array, true)) {
                                        foreach ($wss_files_array as $filename) {
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
                                    if (!empty($wss_files_array) && !in_array("", $wss_files_array, true)) {
                                        foreach ($wss_files_array as $filename) {
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
                            <h2 class="accordion-header" id="flush-headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTen" aria-expanded="false"
                                    aria-controls="flush-collapseTen"> 主管機關辦理情形
                                </button>
                            </h2>
                            <div id="flush-collapseTen" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTen" data-bs-parent="#competent">
                                <div class="accordion-body">
                                    <label for="undertaker" class="col-form-label">案件承辦人員 <span class='text-danger'>*</span></label>
                                    <input id="undertaker" name="undertaker" type="text" class="form-control" value="<?php echo $wss_undertaker;?>" disabled>
                                    <label for="wss_de_date" class="col-form-label">申報日期</label>
                                    <div class="input-group ">
                                        <input id="wss_de_date" type="date" class="form-control" name="wss_de_date" value="<?php echo $wss_de_date;?>" disabled>
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="apy_tnum" class="col-form-label">申請文號</label>
                                    <input type="text" class="form-control" id="apy_tnum" name="apy_tnum" value="<?php echo $wss_apy_tnum;?>" disabled>
                                    <label for="wss_apv_date" class="col-sm-2 col-form-label">核准日期</label>
                                    <div class="input-group">
                                        <input id="wss_apv_date" type="date" class="form-control" name="wss_apv_date" value="<?php echo $wss_apv_date;?>" onchange="apy(value)">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_apv_tnum" class="col-sm-2 col-form-label">核准文號</label>
                                    <input type="text" class="form-control" id="" name="wss_apv_tnum" value="<?php echo $wss_apv_tnum;?>" >
                                    <label for="wss_main_apv_date" class="col-form-label">目的事業主管機關核准日期</label>
                                    <div class="input-group ">
                                        <input id="wss_main_apv_date" type="date" class="form-control" name="wss_main_apv_date" value="<?php echo $wss_main_apv_date;?>" >
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_main_apv_tnum" class="col-form-label">目的事業主管機關核准文號</label>
                                    <input type="text" class="form-control" id="wss_main_apv_tnum" name="wss_main_apv_tnum" value="<?php echo $wss_main_apv_tnum;?>">
                                    <label id="wss_apv_tnum" for="wss_st_date" class="col-sm-2 col-form-label">應開工日期</label>
                                    <div class="input-group">
                                        <input id="wss_st_date" type="date" class="form-control" name="wss_st_date" value="<?php echo $wss_st_date;?>">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_rm_st_date" class="col-sm-2 col-form-label">提醒開工日期</label>
                                    <div class="input-group">
                                        <input id="wss_rm_st_date" type="date" class="form-control" name="wss_rm_st_date" value="<?php echo $wss_rm_st_date;?>">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_ac_st_date" class="col-sm-2 col-form-label">實際開工日期</label>
                                    <div class="input-group">
                                        <input id="wss_ac_st_date" type="date" class="form-control" name="wss_ac_st_date" value="<?php echo $wss_ac_st_date;?>">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_end_date" class="col-sm-2 col-form-label">預定完工日期</label>
                                    <div class="input-group">
                                        <input id="wss_end_date" type="date" class="form-control" name="wss_end_date" value="<?php echo $wss_end_date;?>" onchange="end(value)">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_rm_end_date" class="col-sm-2 col-form-label">提醒完工日期</label>
                                    <div class="input-group">
                                        <input id="wss_rm_end_date" type="date" class="form-control" name="wss_rm_end_date"  value="<?php echo $wss_rm_end_date;?>">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_ac_end_date" class="col-sm-2 col-form-label">實際完工日期</label>
                                    <div class="input-group">
                                        <input id="wss_ac_end_date" type="date" class="form-control" name="wss_ac_end_date" value="<?php echo $wss_ac_end_date;?>">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_rm_crew" class="col-sm-2 col-form-label">提醒通知人員</label>
                                    <div class="input-group">
                                        <input id="wss_rm_crew" type="text" class="form-control" name="wss_rm_crew" value="<?php echo empty($wss_rm_crew) ? $wss_undertaker : $wss_rm_crew; ?>">
                                        <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                                    </div>
                                    <label for="wss_add_1" class="col-form-label">開工前輔導</label>
                                    <input type="text" class="form-control" id="wss_add_1" name="wss_add_1" value="<?php echo $wss_add_1;?>">
                                    <label for="wss_add_2" class="col-form-label">期初檢查</label>
                                    <input type="text" class="form-control" id="wss_add_2" name="wss_add_2" value="<?php echo $wss_add_2;?>">
                                    <label for="wss_add_3" class="col-form-label">施工中檢查</label>
                                    <input type="text" class="form-control" id="wss_add_3" name="wss_add_3" value="<?php echo $wss_add_3;?>">
                                    <label for="wss_add_4" class="col-form-label">完工檢查</label>
                                    <input type="text" class="form-control" id="wss_add_4" name="wss_add_4" value="<?php echo $wss_add_4;?>">
                                    <label for="wss_rm_crew" class="col-sm-2 col-form-label">案件進度
                                        <?php
                                            if($wss_close == "1"){
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
                                        <input class="form-check-input" type="radio" name="wss_close" id="wss_close" <?php echo $checked;?> value="1">
                                        <label class="form-check-label" for="wss_close">已結案</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wss_close" id="wss_unclose" <?php echo $checked_f;?>  value="0">
                                        <label class="form-check-label" for="wss_unclose">辦理中</label>

                                    </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wss_close" id="wss_closed" value="1">
                                        <label class="form-check-label" for="wss_unclose">系統結案</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingEleven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseEleven" aria-expanded="false"
                                    aria-controls="flush-collapseEleven">
                                    備註
                                </button>
                            </h2>
                            <div id="flush-collapseEleven" class="accordion-collapse collapse "
                                aria-labelledby="flush-headingEleven" data-bs-parent="#competent">
                                <div class="accordion-body">
                                    <label for="wss_remark" class="col-form-label">備註</label>
                                    <textarea class="form-control" name="wss_remark" id="wss_remark" ><?php echo $wss_remark;?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="extend-heading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#extend-collapse1" aria-expanded="false" aria-controls="extend-collapse1">第1次展延</button>
                            </h2>
                            <div id="extend-collapse1" class="accordion-collapse collapse" aria-labelledby="extend-heading1" data-bs-parent="#competent">
                                <div class="accordion-body">
                                    <label for="wss_apy_date1" class="col-sm-2 col-form-label">申請日期</label>
                                    <div class="input-group">
                                        <input id="wss_apy_date1" type="date" class="form-control" name="wss_apy_date1" value="<?php echo $wss_apy_date1;?>"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_apy_tnum1" class="col-sm-2 col-form-label">申請文號</label> 
                                        <input type="text" class="form-control" id="wss_apy_tnum1" name="wss_apy_tnum1" value="<?php echo $wss_apy_tnum1;?>"> 
                                    <label for="wss_apv_date1" class="col-sm-2 col-form-label">核准日期</label>
                                    <div class="input-group">
                                        <input id="wss_apv_date1" type="date" class="form-control" name="wss_apv_date1" value="<?php echo $wss_apv_date1;?>"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_apv_tnum1" class="col-sm-2 col-form-label">核准文號</label> 
                                    <input type="text" class="form-control" id="wss_apv_tnum1" name="wss_apv_tnum1" value="<?php echo $wss_apv_tnum1;?>"> 
                                    <label for="wss_ex_end_date1" class="col-sm-2 col-form-label">展延完工日期</label>
                                    <div class="input-group">
                                        <input id="wss_ex_end_date1" type="date" class="form-control" name="wss_ex_end_date1" value="<?php echo $wss_ex_end_date1;?>" onchange="end(value)"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_ex_remark1" class="col-sm-2 col-form-label">備註</label>
                                    <textarea class="form-control" name="wss_ex_remark1" id="wss_ex_remark1" ><?php echo $wss_ex_remark1;?></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="extend-heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#extend-collapse2" aria-expanded="false" aria-controls="extend-collapse2">第2次展延</button>
                            </h2>
                            <div id="extend-collapse2" class="accordion-collapse collapse" aria-labelledby="extend-heading2" data-bs-parent="#competent">
                                <div class="accordion-body">
                                    <label for="wss_apy_date2" class="col-sm-2 col-form-label">申請日期</label>
                                    <div class="input-group">
                                        <input id="wss_apy_date2" type="date" class="form-control" name="wss_apy_date2" value="<?php echo $wss_apy_date2;?>"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_apy_tnum2" class="col-sm-2 col-form-label">申請文號</label> 
                                        <input type="text" class="form-control" id="wss_apy_tnum2" name="wss_apy_tnum2" value="<?php echo $wss_apy_tnum2;?>"> 
                                    <label for="wss_apv_date2" class="col-sm-2 col-form-label">核准日期</label>
                                    <div class="input-group">
                                        <input id="wss_apv_date2" type="date" class="form-control" name="wss_apv_date2" value="<?php echo $wss_apv_date2;?>"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_apv_tnum2" class="col-sm-2 col-form-label">核准文號</label> 
                                    <input type="text" class="form-control" id="wss_apv_tnum2" name="wss_apv_tnum2" value="<?php echo $wss_apv_tnum2;?>"> 
                                    <label for="wss_ex_end_date2" class="col-sm-2 col-form-label">展延完工日期</label>
                                    <div class="input-group">
                                        <input id="wss_ex_end_date2" type="date" class="form-control" name="wss_ex_end_date2" value="<?php echo $wss_ex_end_date2;?>" onchange="end(value)"> <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_ex_remark2" class="col-sm-2 col-form-label">備註</label>
                                    <textarea class="form-control" name="wss_ex_remark2" id="wss_ex_remark2" ><?php echo $wss_ex_remark2;?></textarea>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-secondary " href="WSSimpleApply.php"><i
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
<!-- <script src="./assets/street.js"></script> -->
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

    // 土地
    var wss_pj_seat_town = document.querySelector('#wss_pj_seat_town');
    var wss_pj_seat_alley = document.querySelector('#wss_pj_seat_alley');
    var road = document.querySelector('#road');

    // 定义巷弄列表
    var alleylist = [
      {
          'area': '斗六市',
          'road': '九老爺段',
          'value': '九老爺段'
      }, {
          'area': '斗六市',
          'road': '八德段',
          'value': '八德段'
      }, {
          'area': '斗六市',
          'road': '十三段',
          'value': '十三段'
      }, {
          'area': '斗六市',
          'road': '三平段',
          'value': '三平段'
      }, {
          'area': '斗六市',
          'road': '大北勢段大北勢小段',
          'value': '大北勢段大北勢小段'
      }, {
          'area': '斗六市',
          'road': '大北勢段甲六埤小段',
          'value': '大北勢段甲六埤小段'
      }, {
          'area': '斗六市',
          'road': '大北勢段林子頭小段',
          'value': '大北勢段林子頭小段'
      }, {
          'area': '斗六市',
          'road': '大竹圍段',
          'value': '大竹圍段'
      }, {
          'area': '斗六市',
          'road': '大崙段大崙小段',
          'value': '大崙段大崙小段'
      }, {
          'area': '斗六市',
          'road': '大崙段茄苳腳小段',
          'value': '大崙段茄苳腳小段'
      }, {
          'area': '斗六市',
          'road': '大潭段大潭小段',
          'value': '大潭段大潭小段'
      }, {
          'area': '斗六市',
          'road': '大潭段社口小段',
          'value': '大潭段社口小段'
      }, {
          'area': '斗六市',
          'road': '中興段',
          'value': '中興段'
      }, {
          'area': '斗六市',
          'road': '內林段',
          'value': '內林段'
      }, {
          'area': '斗六市',
          'road': '公正段',
          'value': '公正段'
      }, {
          'area': '斗六市',
          'road': '斗六一段',
          'value': '斗六一段'
      }, {
          'area': '斗六市',
          'road': '斗六二段',
          'value': '斗六二段'
      }, {
          'area': '斗六市',
          'road': '斗六三段',
          'value': '斗六三段'
      }, {
          'area': '斗六市',
          'road': '斗六段',
          'value': '斗六段'
      }, {
          'area': '斗六市',
          'road': '水尾口段',
          'value': '水尾口段'
      }, {
          'area': '斗六市',
          'road': '牛埔段',
          'value': '牛埔段'
      }, {
          'area': '斗六市',
          'road': '北環段',
          'value': '北環段'
      }, {
          'area': '斗六市',
          'road': '半路段',
          'value': '半路段'
      }, {
          'area': '斗六市',
          'road': '正心段',
          'value': '正心段'
      }, {
          'area': '斗六市',
          'road': '石牛溪段',
          'value': '石牛溪段'
      }, {
          'area': '斗六市',
          'road': '石農段',
          'value': '石農段'
      }, {
          'area': '斗六市',
          'road': '石榴段',
          'value': '石榴段'
      }, {
          'area': '斗六市',
          'road': '石榴班段',
          'value': '石榴班段'
      }, {
          'area': '斗六市',
          'road': '光明段',
          'value': '光明段'
      }, {
          'area': '斗六市',
          'road': '光復段',
          'value': '光復段'
      }, {
          'area': '斗六市',
          'road': '竹圍子段',
          'value': '竹圍子段'
      }, {
          'area': '斗六市',
          'road': '竹頭段',
          'value': '竹頭段'
      }, {
          'area': '斗六市',
          'road': '自強段',
          'value': '自強段'
      }, {
          'area': '斗六市',
          'road': '西平段',
          'value': '西平段'
      }, {
          'area': '斗六市',
          'road': '秀才段',
          'value': '秀才段'
      }, {
          'area': '斗六市',
          'road': '府文段',
          'value': '府文段'
      }, {
          'area': '斗六市',
          'road': '明德段',
          'value': '明德段'
      }, {
          'area': '斗六市',
          'road': '林子頭段林子頭小段',
          'value': '林子頭段林子頭小段'
      }, {
          'area': '斗六市',
          'road': '林子頭段番子溝小段',
          'value': '林子頭段番子溝小段'
      }, {
          'area': '斗六市',
          'road': '林頭段',
          'value': '林頭段'
      }, {
          'area': '斗六市',
          'road': '虎溪段',
          'value': '虎溪段'
      }, {
          'area': '斗六市',
          'road': '長平段',
          'value': '長平段'
      }, {
          'area': '斗六市',
          'road': '長安段',
          'value': '長安段'
      }, {
          'area': '斗六市',
          'road': '保庄段',
          'value': '保庄段'
      }, {
          'area': '斗六市',
          'road': '保長廍段后庄子小段',
          'value': '保長廍段后庄子小段'
      }, {
          'area': '斗六市',
          'road': '保長廍段虎尾溪小段',
          'value': '保長廍段虎尾溪小段'
      }, {
          'area': '斗六市',
          'road': '保長廍段保長廍小段',
          'value': '保長廍段保長廍小段'
      }, {
          'area': '斗六市',
          'road': '咬狗北段',
          'value': '咬狗北段'
      }, {
          'area': '斗六市',
          'road': '咬狗庄段',
          'value': '咬狗庄段'
      }, {
          'area': '斗六市',
          'road': '咬狗段',
          'value': '咬狗段'
      }, {
          'area': '斗六市',
          'road': '建成段',
          'value': '建成段'
      }, {
          'area': '斗六市',
          'road': '後庄段',
          'value': '後庄段'
      }, {
          'area': '斗六市',
          'road': '科一段',
          'value': '科一段'
      }, {
          'area': '斗六市',
          'road': '科二段',
          'value': '科二段'
      }, {
          'area': '斗六市',
          'road': '科工段',
          'value': '科工段'
      }, {
          'area': '斗六市',
          'road': '科加段',
          'value': '科加段'
      }, {
          'area': '斗六市',
          'road': '貞寮段',
          'value': '貞寮段'
      }, {
          'area': '斗六市',
          'road': '重光東段',
          'value': '重光東段'
      }, {
          'area': '斗六市',
          'road': '重光段',
          'value': '重光段'
      }, {
          'area': '斗六市',
          'road': '海豐崙段朱丹灣小段',
          'value': '海豐崙段朱丹灣小段'
      }, {
          'area': '斗六市',
          'road': '海豐崙段海豐崙小段',
          'value': '海豐崙段海豐崙小段'
      }, {
          'area': '斗六市',
          'road': '秦寮段',
          'value': '秦寮段'
      }, {
          'area': '斗六市',
          'road': '埤口段',
          'value': '埤口段'
      }, {
          'area': '斗六市',
          'road': '崙仔段',
          'value': '崙仔段'
      }, {
          'area': '斗六市',
          'road': '崙北段',
          'value': '崙北段'
      }, {
          'area': '斗六市',
          'road': '崙南段',
          'value': '崙南段'
      }, {
          'area': '斗六市',
          'road': '梅林西段',
          'value': '梅林西段'
      }, {
          'area': '斗六市',
          'road': '梅林東段',
          'value': '梅林東段'
      }, {
          'area': '斗六市',
          'road': '梅南段',
          'value': '梅南段'
      }, {
          'area': '斗六市',
          'road': '湖山段',
          'value': '湖山段'
      }, {
          'area': '斗六市',
          'road': '菜公段',
          'value': '菜公段'
      }, {
          'area': '斗六市',
          'road': '雲林溪段',
          'value': '雲林溪段'
      }, {
          'area': '斗六市',
          'road': '黃厝段',
          'value': '黃厝段'
      }, {
          'area': '斗六市',
          'road': '新虎溪段',
          'value': '新虎溪段'
      }, {
          'area': '斗六市',
          'road': '新溪洲段',
          'value': '新溪洲段'
      }, {
          'area': '斗六市',
          'road': '溝子埧段瓦厝子小段',
          'value': '溝子埧段瓦厝子小段'
      }, {
          'area': '斗六市',
          'road': '溝子埧段柴裡小段',
          'value': '溝子埧段柴裡小段'
      }, {
          'area': '斗六市',
          'road': '溝子埧段溝子埧小段',
          'value': '溝子埧段溝子埧小段'
      }, {
          'area': '斗六市',
          'road': '溝垻段',
          'value': '溝垻段'
      }, {
          'area': '斗六市',
          'road': '溪洲段',
          'value': '溪洲段'
      }, {
          'area': '斗六市',
          'road': '萬年西段',
          'value': '萬年西段'
      }, {
          'area': '斗六市',
          'road': '萬年東段',
          'value': '萬年東段'
      }, {
          'area': '斗六市',
          'road': '嘉東段',
          'value': '嘉東段'
      }, {
          'area': '斗六市',
          'road': '榴中段',
          'value': '榴中段'
      }, {
          'area': '斗六市',
          'road': '榴北段',
          'value': '榴北段'
      }, {
          'area': '斗六市',
          'road': '劉厝段',
          'value': '劉厝段'
      }, {
          'area': '斗六市',
          'road': '龍潭段',
          'value': '龍潭段'
      }, {
          'area': '斗六市',
          'road': '鎮西段',
          'value': '鎮西段'
      },


      {
          'area': '古坑鄉',
          'road': '下崁腳段',
          'value': '下崁腳段'
      },

      {
          'area': '古坑鄉',
          'road': '下麻園段',
          'value': '下麻園段'
      },

      {
          'area': '古坑鄉',
          'road': '大湖口段',
          'value': '大湖口段'
      },

      {
          'area': '古坑鄉',
          'road': '大湖底段',
          'value': '大湖底段'
      },

      {
          'area': '古坑鄉',
          'road': '中洲段',
          'value': '中洲段'
      },

      {
          'area': '古坑鄉',
          'road': '水碓西段',
          'value': '水碓西段'
      },

      {
          'area': '古坑鄉',
          'road': '水碓東段',
          'value': '水碓東段'
      },

      {
          'area': '古坑鄉',
          'road': '水碓段',
          'value': '水碓段'
      },

      {
          'area': '古坑鄉',
          'road': '水碓新段',
          'value': '水碓新段'
      },

      {
          'area': '古坑鄉',
          'road': '古坑段古坑小段',
          'value': '古坑段古坑小段'
      },

      {
          'area': '古坑鄉',
          'road': '古坑段湳子小段',
          'value': '古坑段湳子小段'
      },

      {
          'area': '古坑鄉',
          'road': '永光段',
          'value': '永光段'
      },

      {
          'area': '古坑鄉',
          'road': '永昌段',
          'value': '永昌段'
      },

      {
          'area': '古坑鄉',
          'road': '永興段',
          'value': '永興段'
      },

      {
          'area': '古坑鄉',
          'road': '田心段',
          'value': '田心段'
      },

      {
          'area': '古坑鄉',
          'road': '石坑段',
          'value': '石坑段'
      },

      {
          'area': '古坑鄉',
          'road': '尖山坑段',
          'value': '尖山坑段'
      },

      {
          'area': '古坑鄉',
          'road': '西華段',
          'value': '西華段'
      },

      {
          'area': '古坑鄉',
          'road': '東和段',
          'value': '東和段'
      },

      {
          'area': '古坑鄉',
          'road': '東陽段',
          'value': '東陽段'
      },

      {
          'area': '古坑鄉',
          'road': '東興段',
          'value': '東興段'
      },

      {
          'area': '古坑鄉',
          'road': '青山段',
          'value': '青山段'
      },

      {
          'area': '古坑鄉',
          'road': '南昌段',
          'value': '南昌段'
      },

      {
          'area': '古坑鄉',
          'road': '建德段',
          'value': '建德段'
      },

      {
          'area': '古坑鄉',
          'road': '苦苓腳段',
          'value': '苦苓腳段'
      },

      {
          'area': '古坑鄉',
          'road': '崁腳段',
          'value': '崁腳段'
      },

      {
          'area': '古坑鄉',
          'road': '崁頭厝段',
          'value': '崁頭厝段'
      },

      {
          'area': '古坑鄉',
          'road': '草嶺段',
          'value': '草嶺段'
      },

      {
          'area': '古坑鄉',
          'road': '高林北段',
          'value': '高林北段'
      },

      {
          'area': '古坑鄉',
          'road': '高林南段',
          'value': '高林南段'
      },

      {
          'area': '古坑鄉',
          'road': '高厝林子頭段',
          'value': '高厝林子頭段'
      },

      {
          'area': '古坑鄉',
          'road': '荷苞段',
          'value': '荷苞段'
      },

      {
          'area': '古坑鄉',
          'road': '頂新庄段',
          'value': '頂新庄段'
      },

      {
          'area': '古坑鄉',
          'road': '麻園庄段',
          'value': '麻園庄段'
      },

      {
          'area': '古坑鄉',
          'road': '麻園段',
          'value': '麻園段'
      },

      {
          'area': '古坑鄉',
          'road': '棋山段',
          'value': '棋山段'
      },

      {
          'area': '古坑鄉',
          'road': '棋東段',
          'value': '棋東段'
      },

      {
          'area': '古坑鄉',
          'road': '棋盤段',
          'value': '棋盤段'
      },

      {
          'area': '古坑鄉',
          'road': '棋盤厝段',
          'value': '棋盤厝段'
      },

      {
          'area': '古坑鄉',
          'road': '湳子段',
          'value': '湳子段'
      },

      {
          'area': '古坑鄉',
          'road': '新生段',
          'value': '新生段'
      },

      {
          'area': '古坑鄉',
          'road': '新光段',
          'value': '新光段'
      },

      {
          'area': '古坑鄉',
          'road': '新庄段',
          'value': '新庄段'
      },

      {
          'area': '古坑鄉',
          'road': '新園段',
          'value': '新園段'
      },

      {
          'area': '古坑鄉',
          'road': '溪邊厝段',
          'value': '溪邊厝段'
      },

      {
          'area': '古坑鄉',
          'road': '樟湖段',
          'value': '樟湖段'
      },

      {
          'area': '林內鄉',
          'road': '九芎林段',
          'value': '九芎林段'
      }, {
          'area': '林內鄉',
          'road': '九芎南段',
          'value': '九芎南段'
      }, {
          'area': '林內鄉',
          'road': '九芎段',
          'value': '九芎段'
      }, {
          'area': '林內鄉',
          'road': '中山段',
          'value': '中山段'
      }, {
          'area': '林內鄉',
          'road': '仁愛段',
          'value': '仁愛段'
      }, {
          'area': '林內鄉',
          'road': '永昌段',
          'value': '永昌段'
      }, {
          'area': '林內鄉',
          'road': '成功段',
          'value': '成功段'
      }, {
          'area': '林內鄉',
          'road': '芎林段',
          'value': '芎林段'
      }, {
          'area': '林內鄉',
          'road': '芎蕉段',
          'value': '芎蕉段'
      }, {
          'area': '林內鄉',
          'road': '林內段',
          'value': '林內段'
      }, {
          'area': '林內鄉',
          'road': '長興段',
          'value': '長興段'
      }, {
          'area': '林內鄉',
          'road': '重興段',
          'value': '重興段'
      }, {
          'area': '林內鄉',
          'road': '烏麻段',
          'value': '烏麻段'
      }, {
          'area': '林內鄉',
          'road': '烏塗子段',
          'value': '烏塗子段'
      }, {
          'area': '林內鄉',
          'road': '烏塗段',
          'value': '烏塗段'
      }, {
          'area': '林內鄉',
          'road': '頂庄段',
          'value': '頂庄段'
      }, {
          'area': '林內鄉',
          'road': '湖山寮段',
          'value': '湖山寮段'
      }, {
          'area': '林內鄉',
          'road': '湖本段',
          'value': '湖本段'
      }, {
          'area': '林內鄉',
          'road': '進興段',
          'value': '進興段'
      }, {
          'area': '林內鄉',
          'road': '新興段',
          'value': '新興段'
      }, {
          'area': '林內鄉',
          'road': '寶隆段',
          'value': '寶隆段'
      }
  ]

    // 初始设置
    var alleyleng = alleylist.length;

    // 更新巷弄选项
    function updateAlley() {
        var str2 = '<option value="" selected>請選擇路段</option>';
        
        for (var i = 0; i < alleyleng; i++) {
            if (wss_pj_seat_town.value == alleylist[i].area) {
                var select = (road.value == alleylist[i].value) ? 'selected' : '';
                str2 += '<option value="' + alleylist[i].value + '" ' + select + ' >' + alleylist[i].road + '</option>';
            }
        }
        
        wss_pj_seat_alley.innerHTML = str2;
    }

    // 初始加载巷弄选项
    updateAlley();

    // 城市选择变更事件处理
    function handleTownChange(e) {
        updateAlley();

        // 更新其他相关字段的值，如果有的话
        var wsv_pj_town = document.querySelector('#wsv_pj_town');
        var wsv_psh_town = document.querySelector('#wsv_psh_town');

        if (wsv_pj_town) { 
            wsv_pj_town.value = e.target.value;
        }
        if (wsv_psh_town) {
            wsv_psh_town.value = e.target.value;
        }
    }

    wss_pj_seat_town.addEventListener('change', handleTownChange);

    // 巷弄选择变更事件处理
    function handleAlleyChange(e) {
        var wsv_pj_lot = document.querySelector('#wsv_pj_lot');
        if (wsv_pj_lot) {
            wsv_pj_lot.value = e.target.value;
        }
    }

    wss_pj_seat_alley.addEventListener('change', handleAlleyChange);

    // 確認土地位置是否重複
    document.addEventListener("DOMContentLoaded", function() {
        var townSelect = document.getElementById("wss_pj_seat_town");
        var alleySelect = document.getElementById("wss_pj_seat_alley");
        var seatNoInput = document.getElementById("wss_pj_seat_no");

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
    

    // 承辦人、提醒通知人員
    const undertakerSelect = document.getElementById("wss_undertaker_select");
    const selectedUndertaker = document.getElementById("undertaker");
    const wspRmCrew = document.getElementById("wss_rm_crew");

    undertakerSelect.addEventListener("change", function() {
        const selectedValue = undertakerSelect.value;
        selectedUndertaker.value = selectedValue;
        wspRmCrew.value = selectedValue + '、張雅琴';

    });

    // 提醒完工日期
    function end(val) {
        date = new Date(val);
        wss_end_date = convertDate(date);
        document.getElementById('wss_end_date').value = wss_end_date;

        rm_end = date.setDate(date.getDate() - 20);
        rm_end_d = new Date(rm_end);
        wss_rm_end_date = convertDate(rm_end_d);
        document.getElementById('wss_rm_end_date').value = wss_rm_end_date;

    }
    
    function convertDate(date) {
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth()+1).toString();
        var dd  = date.getDate().toString();
        
        var mmChars = mm.split('');
        var ddChars = dd.split('');
        
        return yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
    }
    
    // 承辦人、提醒通知人員
    function utaker(val){
        document.getElementById('undertaker').value = val; 
        document.getElementById('wss_rm_crew').value = val; 
    }
    // 申請申報日期
    function de(val){
        document.getElementById('wss_apy_date').value = val; 
    }
    // 申請文號
    function num(val){
        document.getElementById('apy_tnum').value = val; 
    }


    function rmd(){
        date2 = new Date(document.getElementById('wss_st_date').value)
        rm = date2.setDate(date2.getDate()-20)
        rm_d = new Date(rm)
        wss_rm_st_date = convertDate(rm_d)
        document.getElementById('wss_rm_st_date').value = wss_rm_st_date; 

    }
    // 應開工日期
    function apy(val){
        date = new Date(val)
        st = date.setDate(date.getDate()+365)
        st_d = new Date(st)

        wss_st_date = convertDate(st_d)
        document.getElementById('wss_st_date').value = wss_st_date; 
        rmd();

    }


</script>