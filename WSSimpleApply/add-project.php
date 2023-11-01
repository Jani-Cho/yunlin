<?php 
if(isset($_POST['add_project'])){
    $wss_de_date = date('Y-m-d', strtotime($_POST['wss_de_date'])); //申報日期
    $wss_agency = $_POST['wss_agency']; //受理機關
    $wss_name = $_POST['wss_name']; //計畫名稱
    $wss_num = $_POST['wss_num']; //案件編號 14碼 UP0711107006

    $wss_de_type = $_POST['wss_de_type']; //開發種類
    if(count($wss_de_type) > 1 ){
        array_shift($wss_de_type); 
    }
    $wss_de_typelist = implode(", ",$wss_de_type);
    // echo $wss_de_typelist;
    
    $wss_vol_name = $_POST['wss_vol_name']; //水土保持義務人名稱
    $wss_vol_num = $_POST['wss_vol_num']; //國民身分證統一編號或營利事業統一編號
    $wss_vol_phone = $_POST['wss_vol_phone']; //電話
    $wss_vol_addr = $_POST['wss_vol_addr']; //住居所或營業所
    $wss_vol_email = $_POST['wss_vol_email']; //電子郵件

    $wss_pj_area = $_POST['wss_pj_area']; //計畫面積
    $wss_pj_seat_county = $_POST['wss_pj_seat_county']; //實施地點 土地座落 縣
    $wss_pj_seat_town = $_POST['wss_pj_seat_town']; //實施地點 土地座落 市鎮
    $wss_pj_seat_alley = $_POST['wss_pj_seat_alley']; //實施地點 土地座落 段
    $wss_pj_seat_no = $_POST['wss_pj_seat_no']; //實施地點 土地座落 號
    $wss_pj_seat_count = $_POST['wss_pj_seat_count']; //實施地點 土地座落 筆數
    $wss_pj_co = $_POST['wss_pj_co']; //土地座標
    $wss_pj_add = $_POST['wss_pj_add']; //土地新增

    $wss_pj_own = $_POST['wss_pj_own']; //土地權屬

    $wss_check_item1 = $_POST['wss_check_item1']; //檢核事項
    $wss_check_item2 = $_POST['wss_check_item2']; 
    $wss_check_item3 = $_POST['wss_check_item3']; 
    $wss_check_item4 = $_POST['wss_check_item4']; 

    $wss_sc_slope = $_POST['wss_sc_slope']; //農業整坡作業公頃
    $wss_sc_ag_road_lgth = $_POST['wss_sc_ag_road_lgth']; //修築農路 長度
    $wss_sc_ag_road_wth = $_POST['wss_sc_ag_road_wth']; //修築農路 路基寬度
    $wss_sc_oth_road_wth = $_POST['wss_sc_oth_road_wth']; //修建其他道路 路基寬度
    $wss_sc_oth_road_total = $_POST['wss_sc_oth_road_total']; //修建其他道路 路基總面積

    $wss_sc_exist_road_total = $_POST['wss_sc_exist_road_total']; //改善或維護既有道路 路基總面積

    $wss_sc_arch_area = $_POST['wss_sc_arch_area']; //開發建築用地 建築面積
    $wss_sc_arch_oth_area = $_POST['wss_sc_arch_oth_area']; //開發建築用地 其他開挖整地面積
    $wss_sc_arch_total = $_POST['wss_sc_arch_total']; //開發建築用地 合計

    $wss_sc_accu = $_POST['wss_sc_accu']; //堆積土石
    $wss_sc_adopt = $_POST['wss_sc_adopt']; //採取土石

    $wss_sc_oth_type = $_POST['wss_sc_oth_type']; //設置公園、墳墓、運動場地、原住民在原住民族地區依原住民族基本法第十九條規定採取礦物或其他開挖整地
    $wss_sc_faci_area = $_POST['wss_sc_faci_area']; //農作產銷設施之農業生產設施、林業設施之林業經營設施或畜牧設施之養畜設施、養禽設施、孵化場(室)設施、青貯設施
    $wss_sc_faci_oth_area = $_POST['wss_sc_faci_oth_area']; //其他開挖整地面積
    $wss_sc_faci_total = $_POST['wss_sc_faci_total']; //合計

    $wss_sc_sum = $_POST['wss_sc_sum']; //挖、填方總和
    $wss_att_pre = $_POST['wss_att_pre']; //附款或注意事項
    
    if(isset($_POST['wss_remark_add'])){
    $wss_remark_add = $_POST['wss_remark_add']; //備註
    $wss_remark_addlist = implode(", ",$wss_remark_add);}
    else{
        $wss_remark_addlist = "";
    }
    if(isset($_POST['wss_remark_fac'])){
    $wss_remark_fac = $_POST['wss_remark_fac']; //設施名稱	
    $wss_remark_faclist = implode(", ",$wss_remark_fac);}
    else{
        $wss_remark_faclist = "";
    }
    if(isset($_POST['wss_remark_loc'])){
    $wss_remark_loc = $_POST['wss_remark_loc']; //位置或編號		
    $wss_remark_loclist = implode(", ",$wss_remark_loc);}
    else{
        $wss_remark_loclist = "";
    }
    if(isset($_POST['wss_remark_num'])){
    $wss_remark_num = $_POST['wss_remark_num']; //設計數量		
    $wss_remark_numlist = implode(", ",$wss_remark_num);}
    else{
        $wss_remark_numlist = "";
    }
    if(isset($_POST['wss_remark_size'])){
    $wss_remark_size = $_POST['wss_remark_size']; //設計尺寸		
    $wss_remark_sizelist = implode(", ",$wss_remark_size);}
    else{
        $wss_remark_sizelist = "";
    }
    if(isset($_POST['wss_remark_oth'])){
    $wss_remark_oth = $_POST['wss_remark_oth']; //備註	
    $wss_remark_othlist = implode(", ",$wss_remark_oth);}
    else{
        $wss_remark_othlist = "";
    }
    $wss_ad_remark = $_POST['wss_ad_remark']; //行政備註	

    $wss_undertaker = $_POST['wss_undertaker']; //案件承辦人員
    // $wss_apy_date = date('Y-m-d', strtotime($_POST['wss_apy_date'])); //申請日期
    $wss_apy_tnum = $_POST['wss_apy_tnum']; //申請文號

    $wss_apv_date = date('Y-m-d', strtotime($_POST['wss_apv_date'])); //核准日期

    $wss_apv_tnum = $_POST['wss_apv_tnum']; //核准文號
    $wss_main_apv_date = date('Y-m-d', strtotime($_POST['wss_main_apv_date'])); //目的事業主管機關核准日期
    $wss_main_apv_tnum = $_POST['wss_main_apv_tnum']; //目的事業主管機關核准文號

    $wss_st_date = date('Y-m-d', strtotime($_POST['wss_st_date'])); //應開工日期

    $wss_rm_st_date = date('Y-m-d', strtotime($_POST['wss_rm_st_date'])); //提醒開工日期

    $wss_ac_st_date = date('Y-m-d', strtotime($_POST['wss_ac_st_date'])); //實際開工日期

    $wss_end_date = date('Y-m-d', strtotime($_POST['wss_end_date'])); //預定完工日期

    $wss_rm_end_date = date('Y-m-d', strtotime($_POST['wss_rm_end_date'])); //提醒完工日期

    $wss_ac_end_date = date('Y-m-d', strtotime($_POST['wss_ac_end_date'])); //實際完工日期

    $wss_rm_crew = $_POST['wss_rm_crew']; //提醒通知人員
    $wss_remark = $_POST['wss_remark']; //備註
    $wss_add_1 = $_POST['wss_add_1']; //開工前輔導
    $wss_add_2 = $_POST['wss_add_2']; //期初檢查
    $wss_add_3 = $_POST['wss_add_3']; //施工中檢查
    $wss_add_4 = $_POST['wss_add_4']; //完工檢查
  
     // 第一二次展延
    if(isset($_POST['wss_apy_date1'])){
        $wss_apy_date1 = date('Y-m-d', strtotime($_POST['wss_apy_date1'])); //申請日期
    }else{
        $wss_apy_date1 = date('Y-m-d', strtotime('')); 

    }
    if(isset($_POST['wss_apy_date2'])){
        $wss_apy_date2 = date('Y-m-d', strtotime($_POST['wss_apy_date2'])); //申請日期
    }else{
        $wss_apy_date2 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wss_apy_tnum1'])){
        $wss_apy_tnum1 = $_POST['wss_apy_tnum1']; //申請文號
    }else{
        $wss_apy_tnum1 = ""; 

    }
    if(isset($_POST['wss_apy_tnum2'])){
        $wss_apy_tnum2 = $_POST['wss_apy_tnum2']; //申請文號
    }else{
        $wss_apy_tnum2 = ""; 

    }

    if(isset($_POST['wss_apv_date1'])){
        $wss_apv_date1 = date('Y-m-d', strtotime($_POST['wss_apv_date1'])); //核准日期
    }else{
        $wss_apv_date1 = date('Y-m-d', strtotime('')); 

    }
    if(isset($_POST['wss_apv_date2'])){
        $wss_apv_date2 = date('Y-m-d', strtotime($_POST['wss_apv_date2'])); //核准日期
    }else{
        $wss_apv_date2 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wss_apv_tnum1'])){
        $wss_apv_tnum1 = $_POST['wss_apv_tnum1']; //核准文號
    }else{
        $wss_apv_tnum1 = ""; 

    }
    if(isset($_POST['wss_apv_tnum2'])){
        $wss_apv_tnum2 = $_POST['wss_apv_tnum2']; //核准文號
    }else{
        $wss_apv_tnum2 = ""; 

    }

    if(isset($_POST['wss_ex_end_date1'])){
        $wss_ex_end_date1 = date('Y-m-d', strtotime($_POST['wss_ex_end_date1'])); //展延完工日期
    }else{
        $wss_ex_end_date1 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wss_ex_end_date2'])){
        $wss_ex_end_date2 = date('Y-m-d', strtotime($_POST['wss_ex_end_date2'])); //展延完工日期
    }else{
        $wss_ex_end_date2 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wss_rm_end_date1'])){
        $wss_rm_end_date1 = date('Y-m-d', strtotime($_POST['wss_rm_end_date1'])); //提醒完工日期
    }else{
        $wss_rm_end_date1 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wss_rm_end_date2'])){
        $wss_rm_end_date2 = date('Y-m-d', strtotime($_POST['wss_rm_end_date2'])); //提醒完工日期
    }else{
        $wss_rm_end_date2 = date('Y-m-d', strtotime('')); 

    }

    $wss_close = $_POST['wss_close']; //結案進度
   
    if(isset($_POST['wss_ex_remark1'])){
        $wss_ex_remark1 = $_POST['wss_ex_remark1']; //展延備註1
    }else{
        $wss_ex_remark1 = ""; //展延備註1

    }
    if(isset($_POST['wss_ex_remark2'])){
        $wss_ex_remark2 = $_POST['wss_ex_remark2']; //展延備註2
    }else{
        $wss_ex_remark2 = ""; //展延備註2

    }

    //上傳資料
    $uploaded_files = $_FILES['wss_files'];

    $timestamped_filesname = [];

    if (!empty($uploaded_files['name'][0])) {
    
        foreach ($uploaded_files['name'] as $key => $filename) {
            $temp_files = $uploaded_files['tmp_name'][$key];
            $timestamp = time();
            $timestamped_filename = 'wss_' . $timestamp . '_' . $filename;
    
            move_uploaded_file($temp_files, "./assets/imgs/$timestamped_filename");
    
            $timestamped_filesname[] = $timestamped_filename;
        }
    }
    $timestamped_filesname_string = implode(',', $timestamped_filesname);




    $query = "INSERT INTO $WSSimple(wss_de_date, wss_agency, wss_name, wss_num, wss_vol_name, wss_undertaker, wss_de_type, wss_vol_num, wss_vol_phone, wss_vol_addr, wss_vol_email, wss_pj_area, wss_pj_seat_county, wss_pj_seat_town, wss_pj_seat_alley, wss_pj_seat_no, wss_pj_seat_count, wss_pj_co, wss_pj_add, wss_pj_own, wss_check_item1, wss_check_item2, wss_check_item3, wss_check_item4, wss_sc_slope, wss_sc_ag_road_lgth, wss_sc_ag_road_wth, wss_sc_oth_road_wth, wss_sc_oth_road_total, wss_sc_exist_road_total, wss_sc_arch_area, wss_sc_arch_oth_area, wss_sc_arch_total, wss_sc_accu, wss_sc_adopt, wss_sc_oth_type, wss_sc_faci_area, wss_sc_faci_oth_area, wss_sc_faci_total, wss_sc_sum, wss_att_pre, wss_apy_tnum, wss_apv_date, wss_apv_tnum, wss_main_apv_date, wss_main_apv_tnum, wss_st_date, wss_rm_st_date, wss_ac_st_date, wss_end_date, wss_rm_end_date, wss_ac_end_date, wss_rm_crew, wss_add_1, wss_add_2, wss_add_3, wss_add_4, wss_remark, wss_remark_add, wss_remark_fac, wss_remark_loc, wss_remark_num, wss_remark_size, wss_remark_oth, wss_ad_remark, wss_apy_date1, wss_apy_date2, wss_apy_tnum1, wss_apy_tnum2, wss_apv_date1, wss_apv_date2, wss_apv_tnum1, wss_apv_tnum2, wss_ex_end_date1, wss_ex_end_date2, wss_rm_end_date1, wss_rm_end_date2, wss_close, wss_ex_remark1, wss_ex_remark2, wss_files)";
    $query .=
    "VALUES('{$wss_de_date}','{$wss_agency}','{$wss_name}','{$wss_num}','{$wss_vol_name}','{$wss_undertaker}','{$wss_de_typelist}','{$wss_vol_num}', '{$wss_vol_phone}', '{$wss_vol_addr}', '{$wss_vol_email}', '{$wss_pj_area}', '{$wss_pj_seat_county}', '{$wss_pj_seat_town}', '{$wss_pj_seat_alley}', '{$wss_pj_seat_no}', '{$wss_pj_seat_count}', '{$wss_pj_co}', '{$wss_pj_add}', '{$wss_pj_own}', '{$wss_check_item1}', '{$wss_check_item2}', '{$wss_check_item3}', '{$wss_check_item4}', '{$wss_sc_slope}', '{$wss_sc_ag_road_lgth}', '{$wss_sc_ag_road_wth}', '{$wss_sc_oth_road_wth}', '{$wss_sc_oth_road_total}', '{$wss_sc_exist_road_total}', '{$wss_sc_arch_area}', '{$wss_sc_arch_oth_area}', '{$wss_sc_arch_total}', '{$wss_sc_accu}', '{$wss_sc_adopt}', '{$wss_sc_oth_type}', '{$wss_sc_faci_area}', '{$wss_sc_faci_oth_area}', '{$wss_sc_faci_total}', '{$wss_sc_sum}', '{$wss_att_pre}', '{$wss_apy_tnum}', '{$wss_apv_date}', '{$wss_apv_tnum}', '{$wss_main_apv_date}', '{$wss_main_apv_tnum}', '{$wss_st_date}', '{$wss_rm_st_date}', '{$wss_ac_st_date}', '{$wss_end_date}', '{$wss_rm_end_date}', '{$wss_ac_end_date}', '{$wss_rm_crew}', '{$wss_add_1}', '{$wss_add_2}', '{$wss_add_3}', '{$wss_add_4}', '{$wss_remark}', '{$wss_remark_addlist}', '{$wss_remark_faclist}', '{$wss_remark_loclist}', '{$wss_remark_numlist}', '{$wss_remark_sizelist}', '{$wss_remark_othlist}', '{$wss_ad_remark}', '{$wss_apy_date1}', '{$wss_apy_date2}', '{$wss_apy_tnum1}', '{$wss_apy_tnum2}', '{$wss_apv_date1}', '{$wss_apv_date2}', '{$wss_apv_tnum1}', '{$wss_apv_tnum2}', '{$wss_ex_end_date1}', '{$wss_ex_end_date2}', '{$wss_rm_end_date1}', '{$wss_rm_end_date2}', '{$wss_close}', '{$wss_ex_remark1}', '{$wss_ex_remark2}', '{$timestamped_filesname_string}')";

    $WS_add_project = mysqli_query($connection, $query);

    comfirmQuery($WS_add_project, '新增成功', null);

    
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
                <h1 class="h4 mb-4">新增 簡易水保申請書</h1>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="p-4 mb-4 bg-light text-dark rounded">
                    <h2 class="h5 mb-4">簡易水土保持申報書內容

                    </h2>
                    <div class="accordion accordion-flush mb-3" id="maincontent">
                        <div class="accordion-item">
                            <h2 class="accordion-header " id="flush-headingOne">
                                <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="true"
                                    aria-controls="flush-collapseOne">
                                    基本資料
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="flush-headingOne" data-bs-parent="#maincontent">
                                <div class="accordion-body">

                                    <label for="wss_undertaker" class="col-form-label">案件承辦人員 <span class='text-danger'>*</span></label>
                                    <select id="wss_undertaker_select" name="wss_undertaker" class="form-select">
                                        <option value="" selected>請選擇承辦人員</option>
                                        <?php foreach ($user_fullname as $fullname): ?>
                                            <option value="<?php echo $fullname; ?>">
                                            <?php echo $fullname; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>   
                                    <label for="wss_num" class="col-form-label">案件編號</label>
                                    <input id="wss_num" name="wss_num" type="text" class="form-control"> 

                                    <label for="wss_de_date" class="col-form-label">申報日期</label>
                                    <div class="input-group ">
                                        <input id="wss_de_date" type="date" class="form-control" name="wss_de_date" onchange="de(value)">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    
                                    <label for="wss_apy_tnum" class="col-form-label">申請文號</label>
                                    <input type="text" class="form-control" id="wss_apy_tnum" name="wss_apy_tnum" onchange="num(value)">

                                    <label for="wss_agency-name" class="col-form-label">受理機關</label>
                                    <input id="wss_agency" name="wss_agency" type="text" class="form-control" value="雲林縣政府">
                                    <label for="wss_name" class="col-form-label">計畫名稱 <span class="text-danger">*</span></label>
                                    <input id="wss_name" name="wss_name" type="text" class="form-control">
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
                                aria-labelledby="flush-headingTwo" data-bs-parent="#maincontent">
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
                                        
                                        echo "<div class='form-check'>";
                                        echo "<input class='form-check-input' type='checkbox' name='wss_de_type[]' value='$name' id='type$key'> ";
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
                                aria-labelledby="flush-headingThree" data-bs-parent="#maincontent">
                                <div class="accordion-body">
                                <?php
                                    $vol = '[{"title_cn":"姓名或名稱","title_en":"wss_vol_name","type":"text","required":"false"},
                                    {"title_cn":"國民身分證統一編號或營利事業統一編號","title_en":"wss_vol_num","type":"text","required":"false"},
                                    {"title_cn":"電話","title_en":"wss_vol_phone","type":"text","required":"true"},
                                    {"title_cn":"住居所或營業所","title_en":"wss_vol_addr","type":"text","required":"false"},
                                    {"title_cn":"電子郵件","title_en":"wss_vol_email","type":"email","required":"false"}]';
                                    $vol_array = json_decode( $vol, true );

                                    foreach($vol_array as $item) { 
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
                                        echo "<input id='$title_en' name='$title_en' type='$type' class='form-control' $required>";
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
                                aria-labelledby="flush-headingFour" data-bs-parent="#maincontent">
                                <div class="accordion-body">
                                    <label class="col-form-label">計畫面積
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="number" step="0.0000001" value="0" class="form-control" name="wss_pj_area">
                                        <span class="input-group-text" id="">公頃</span>
                                    </div>
                                    <label class="col-form-label">實施地點
                                        土地座落
                                    </label>
                                    <div class="input-group mb-2">

                                        <select class="form-select" id="wss_pj_seat_county" name="wss_pj_seat_county">
                                            <option value="雲林縣" selected>雲林縣</option>

                                        </select>

                                        <select class="form-select" id="wss_pj_seat_town" name="wss_pj_seat_town">
                                            <option value="" selected >請選擇</option>
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

                                        <select class="form-select" id="wss_pj_seat_alley" name="wss_pj_seat_alley">
                                            <option value="" selected>請選擇</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input id="wss_pj_seat_no" type="text" class="form-control" name="wss_pj_seat_no" placeholder="請輸入地號">
                                        <input type="number" class="form-control" name="wss_pj_seat_count" placeholder="土地筆數">
                                        <span class="input-group-text">筆</span>
                                    </div>
                                    <label for="" class="col-form-label">土地座標 (TWD97) <span class='text-danger'>*</span></label>
                                    <div class="input-group mb-3">
                                        <input id="latlng" type="text" class="form-control" name="wss_pj_co" data-lat="23.6743232" data-lng="120.4345919" value="">
                                        <span class="input-group-text" id=""><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <div id="map" style="width: 100%; height: 60vh;"></div>
                                    <label for="wss_pj_own" class="col-form-label">土地權屬</label>
                                    <input type="text" class="form-control" name="wss_pj_own">
                                    <label for="wss_pj_add" class="col-form-label">土地新增</label>
                                    <input type="text" class="form-control" name="wss_pj_add">
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
                                aria-labelledby="flush-headingFive" data-bs-parent="#maincontent">
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
                                            echo "<div class='row mb-4'>";
                                            echo "<div class='col-4 h6'>$name</div>";
                                            echo "<div class='col-4'>";
                                            echo "<div class='form-check form-check-inline'>";
                                            echo "<input class='form-check-input' type='radio' name='wss_check_item".($key+1)."' id='wss_check_true_".($key+1)."' checked value='有'>";
                                            echo "<label class='form-check-label' for='wss_check_true_".($key+1)."'>有</label>";
                                            echo "</div>";
                                            echo "<div class='form-check form-check-inline'>";
                                            echo "<input class='form-check-input' type='radio' name='wss_check_item".($key+1)."' id='wss_check_false_".($key+1)."' value='無'>";
                                            echo "<label class='form-check-label' for='wss_check_false_".($key+1)."'>無</label>";
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
                            <div id="flush-collapseSix" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingSix" data-bs-parent="#maincontent">
                                <div class="accordion-body">

                                    <label for="wss_sc_slope" class="col-form-label">農業整坡作業公頃</label>
                                    <div class="input-group mb-3">
                                        <input id="wss_sc_slope" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_slope">
                                        <span class="input-group-text" id="">公頃</span>
                                    </div>
                                    <label for="wss_sc_ag_road_lgth" class="col-form-label">修築農路</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">長度</span>
                                        <input id="wss_sc_ag_road_lgth" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_ag_road_lgth">
                                        <span class="input-group-text">公尺</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">路基寬度</span>
                                        <input id="wss_sc_ag_road_wth" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_ag_road_wth">
                                        <span class="input-group-text">公尺</span>
                                    </div>
                                    <label for="wss_sc_oth_road_wth" class="col-form-label">修建其他道路</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">路基寬度</span>
                                        <input id="wss_sc_oth_road_wth" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_oth_road_wth">
                                        <span class="input-group-text">公尺</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">路基總面積</span>
                                        <input id="wss_sc_oth_road_total" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_oth_road_total">
                                        <span class="input-group-text">平方公尺</span>
                                    </div>
                                    <label for="wss_sc_exist_road_total" class="col-form-label">改善或維護既有道路</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">路基總面積</span>
                                        <input id="wss_sc_exist_road_total" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_exist_road_total">
                                        <span class="input-group-text">平方公尺</span>
                                    </div>
                                    <label for="wss_sc_arch_area" class="col-form-label">開發建築用地</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">建築面積</span>
                                        <input id="wss_sc_arch_area" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_arch_area">
                                        <span class="input-group-text">平方公尺</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">其他開挖整地面積</span>
                                        <input id="wss_sc_arch_oth_area" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_arch_oth_area">
                                        <span class="input-group-text">平方公尺</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">合計</span>
                                        <input id="wss_sc_arch_total" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_arch_total">
                                        <span class="input-group-text">平方公尺</span>
                                    </div>
                                    <label for="wss_sc_accu" class="col-form-label">堆積土石</label>
                                    <div class="input-group mb-3">
                                        <input id="wss_sc_accu" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_accu">
                                        <span class="input-group-text">立方公尺</span>
                                    </div>
                                    <label for="wss_sc_adopt" class="col-form-label">採取土石</label>
                                    <div class="input-group mb-3">
                                        <input id="wss_sc_adopt" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_adopt">
                                        <span class="input-group-text">立方公尺</span>
                                    </div>
                                    <label for="wss_sc_oth_type" class="col-auto col-form-label">設置公園、墳墓、運動場地、原住民在原住民族地區依原住民族基本法第十九條規定採取礦物或其他開挖整地</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">開挖整地面積</span>
                                        <input id="wss_sc_oth_type" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_oth_type">
                                        <span class="input-group-text">平方公尺</span>
                                    </div>
                                    <label for="wss_sc_faci_area" class="col-auto col-form-label">農作產銷設施之農業生產設施、林業設施之林業經營設施或畜牧設施之養畜設施、養禽設施、孵化場(室)設施、青貯設施</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">建築面積
                                        </span>
                                        <input id="wss_sc_faci_area" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_faci_area">
                                        <span class="input-group-text">平方公尺
                                        </span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">其他開挖整地面積</span>
                                        <input id="wss_sc_faci_oth_area" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_faci_oth_area">
                                        <span class="input-group-text">平方公尺</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">合計</span>
                                        <input id="wss_sc_faci_total" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_faci_total">
                                        <span class="input-group-text">平方公尺</span>
                                    </div>
                                    <label for="wss_sc_sum" class="col-form-label">挖、填方總和</label>
                                    <div class="input-group mb-3">
                                        <input id="wss_sc_sum" type="number" step="0.0000001" value="0" class="form-control" name="wss_sc_sum">
                                        <span class="input-group-text">立方公尺</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseSeven" aria-expanded="false"
                                    aria-controls="flush-collapseSeven">
                                    附款或注意事項
                                </button>
                            </h2>
                            <div id="flush-collapseSeven" class="accordion-collapse collapse "
                                aria-labelledby="flush-headingSeven" data-bs-parent="#maincontent">
                                <div class="accordion-body">
                                    <label for="wss_att_pre" class="col-form-label">附款或注意事項</label>
                                    <textarea class="form-control" name="wss_att_pre" id="wss_att_pre"></textarea>
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
                                aria-labelledby="flush-headingEight" data-bs-parent="#maincontent">
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
                                                                <table class="table table-hover align-middle">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="cell th">項次</th>
                                                                        <th class="cell th">設施名稱</th>
                                                                        <th class="cell th">位置或編號</th>
                                                                        <th class="cell th">設計數量</th>
                                                                        <th class="cell th">設計尺寸</th>
                                                                        <th class="cell th">備註</th>  
                                                                        <!-- <th class="cell th">移除</th>   -->
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="tableList">   
                                                                                                                        
                                                                    </tbody>                                                      
                                                                </table>
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="addTable" data-num="0">
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
                                aria-labelledby="flush-headingNine" data-bs-parent="#maincontent">
                                <div class="accordion-body">
                                    <label for="wss_ad_remark" class="col-form-label">行政備註</label>
                                    <textarea rows="6" class="form-control" name="wss_ad_remark" id="wss_ad_remark" ></textarea>
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
                                    <label for="undertaker" class="col-form-label">案件承辦人員 <span class='text-danger'>*</span>
                                    </label>
                                    <input id="undertaker" name="undertaker" type="text" class="form-control" disabled>
                                    <label for="wss_apy_date" class="col-form-label">申請日期
                                    </label>
                                    <div class="input-group mb-3">
                                        <input id="wss_apy_date" type="date" class="form-control" name="wss_apy_date" disabled>
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="apy_tnum" class="col-form-label">申請文號</label>
                                    <input type="text" class="form-control" id="apy_tnum" name="apy_tnum" disabled>
                                    <label id="wss_apy_tnum" for="wss_apv_date" class="col-form-label">核准日期</label>
                                    <div class="input-group mb-3">
                                        <input id="wss_apv_date" type="date" class="form-control" name="wss_apv_date" onchange="apy(value)">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_apv_tnum" class="col-form-label">核准文號</label>
                                    <input type="text" class="form-control" id="" name="wss_apv_tnum">
                                    <label for="wss_main_apv_date" class="col-form-label">目的事業主管機關核准日期</label>
                                    <div class="input-group ">
                                        <input id="wss_main_apv_date" type="date" class="form-control" name="wss_main_apv_date" >
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_main_apv_tnum" class="col-form-label">目的事業主管機關核准文號</label>
                                    <input type="text" class="form-control" id="wss_main_apv_tnum" name="wss_main_apv_tnum">
                                    <label id="wss_apv_tnum" for="wss_st_date" class="col-form-label">應開工日期</label>
                                    <div class="input-group mb-3">
                                        <input id="wss_st_date" type="date" class="form-control" name="wss_st_date">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_rm_st_date" class="col-form-label">提醒開工日期</label>
                                    <div class="input-group mb-3">
                                        <input id="wss_rm_st_date" type="date" class="form-control" name="wss_rm_st_date">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_ac_st_date" class="col-form-label">實際開工日期</label>
                                    <div class="input-group mb-3">
                                        <input id="wss_ac_st_date" type="date" class="form-control" name="wss_ac_st_date">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_end_date" class="col-form-label">預定完工日期</label>
                                    <div class="input-group mb-3">
                                        <input id="wss_end_date" type="date" class="form-control" name="wss_end_date" onchange="end(value)">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_rm_end_date" class="col-form-label">提醒完工日期</label>
                                    <div class="input-group mb-3">
                                        <input id="wss_rm_end_date" type="date" class="form-control" name="wss_rm_end_date" >
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_ac_end_date" class="col-form-label">實際完工日期</label>
                                    <div class="input-group mb-3">
                                        <input id="wss_ac_end_date" type="date" class="form-control" name="wss_ac_end_date">
                                        <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label for="wss_rm_crew" class="col-form-label">提醒通知人員</label>
                                    <div class="input-group mb-3">
                                        <input id="wss_rm_crew" type="text" class="form-control" name="wss_rm_crew">
                                        <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                                    </div>
                                    <label for="wss_add_1" class="col-form-label">開工前輔導</label>
                                    <input type="text" class="form-control" id="wss_add_1" name="wss_add_1">
                                    <label for="wss_add_2" class="col-form-label">期初檢查</label>
                                    <input type="text" class="form-control" id="wss_add_2" name="wss_add_2">
                                    <label for="wss_add_3" class="col-form-label">施工中檢查</label>
                                    <input type="text" class="form-control" id="wss_add_3" name="wss_add_3">
                                    <label for="wss_add_4" class="col-form-label">完工檢查</label>
                                    <input type="text" class="form-control" id="wss_add_4" name="wss_add_4">
                                    <label class="col-form-label">案件進度</label>
                                    <div class="input-group ">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wss_close" id="wss_closed"  value="1">
                                        <label class="form-check-label" for="wss_closed">已結案</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wss_close" id="wss_unclose"  value="0" checked>
                                        <label class="form-check-label" for="wss_unclose">辦理中</label>

                                    </div>
				                     <div class="form-check form-check-inline">
                                    	<input class="form-check-input" type="radio" name="wss_close" id="wss_closed" value="1">
                                    	<label class="form-check-label" for="wss_closed">系統結案</label>
                                    </div>
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
                                    <textarea class="form-control" name="wss_remark" id="wss_remark" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex ">
                            <button type="button" class="btn btn-primary" id="extend" data-num="0"><i class="fas fa-plus mr-2 fa-sm"></i> 展延</button>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-secondary " href="WSSimpleApply.php"><i
                                class="fas fa-times-circle me-2"></i>取消</a>
                        <input class="btn btn-primary" type="submit" name="add_project" value="儲存">
                        <!-- <button class="btn btn-dark " type="button"><i class="fas fa-file-export me-2"></i>匯出</button> -->
                    </div>
                </div>
            </form>

        </div>
    </div>

</main>

<script src="./assets/map.js"></script>

<script src="./assets/street.js"></script>

<script>

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
    
    // 展延
    let index = 1;

    document.getElementById("extend").addEventListener("click", function() {
        if (index === 3) {
            alert('延展以兩次為限');
            return;
        }

        const competent = document.getElementById("competent");

        // 创建一个新的 accordion-item 元素
        const accordionItem = document.createElement("div");
        accordionItem.classList.add("accordion-item");

        // 创建 accordion-header 元素
        const accordionHeader = document.createElement("h2");
        accordionHeader.classList.add("accordion-header");
        accordionHeader.id = "extend-heading" + index;

        // 创建按钮元素
        const button = document.createElement("button");
        button.classList.add("accordion-button", "collapsed");
        button.type = "button";
        button.setAttribute("data-bs-toggle", "collapse");
        button.setAttribute("data-bs-target", "#extend-collapse" + index);
        button.setAttribute("aria-expanded", "false");
        button.setAttribute("aria-controls", "extend-collapse" + index);
        button.textContent = "第" + index + "次展延";
        
        accordionHeader.appendChild(button);
        accordionItem.appendChild(accordionHeader);
        
        // 创建 accordion-collapse 元素
        const accordionCollapse = document.createElement("div");
        accordionCollapse.classList.add("accordion-collapse", "collapse");
        accordionCollapse.setAttribute("data-bs-parent", "#competent");
        
        accordionCollapse.id = "extend-collapse" + index;

        // 创建 accordion-body 元素
        const accordionBody = document.createElement("div");
        accordionBody.classList.add("accordion-body");

        // 创建所有指定的表单字段
        const formFields = [
            { label: "申請日期", type: "date", name: "wss_apy_date" + index },
            { label: "申請文號", type: "text", name: "wss_apy_tnum" + index },
            { label: "核准日期", type: "date", name: "wss_apv_date" + index },
            { label: "核准文號", type: "text", name: "wss_apv_tnum" + index },
            { label: "展延完工日期", type: "date", name: "wss_ex_end_date" + index, onchange: "end(value)" },
            // { label: "提醒完工日期", type: "date", name: "wss_rm_end_date" +  index},
            { label: "備註", type: "textarea", name: "wss_ex_remark" + index }

        ];

        formFields.forEach(field => {
            const label = document.createElement("label");
            label.classList.add("col-form-label");
            label.textContent = field.label;

            if (field.type === "textarea") {
                // 创建<textarea>元素
                const textarea = document.createElement("textarea");
                textarea.id = field.name;
                textarea.classList.add("form-control");
                textarea.name = field.name;
                textarea.rows = 4; // 设置行数，根据需要调整

                // 添加<textarea>元素到DOM
                accordionBody.appendChild(label);
                accordionBody.appendChild(textarea);
            } else {
                // 创建<input>元素
                const inputGroup = document.createElement("div");
                inputGroup.classList.add("input-group");

                const input = document.createElement("input");
                input.id = field.name;
                input.type = field.type;
                input.classList.add("form-control");
                input.name = field.name;

                if (field.onchange) {
                    input.setAttribute("onchange", field.onchange);
                }

                inputGroup.appendChild(input);

                accordionBody.appendChild(label);
                accordionBody.appendChild(inputGroup);
            }
        });

        accordionCollapse.appendChild(accordionBody);
        accordionItem.appendChild(accordionCollapse);
        competent.appendChild(accordionItem);

        index++;
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