<?php 
if(isset($_POST['add_project'])){
    // $wsp_unit = $_POST['wsp_unit']; //單位

    $wsp_name = $_POST['wsp_name']; //計畫名稱
    $wsp_num = $_POST['wsp_num']; //案件編號
    $wsp_pj_seat_county = $_POST['wsp_pj_seat_county']; //實施地點 土地座落 縣
    $wsp_pj_seat_town = $_POST['wsp_pj_seat_town']; //鄉市
    $wsp_pj_seat_alley = $_POST['wsp_pj_seat_alley']; //路段
    $wsp_pj_seat_no = $_POST['wsp_pj_seat_no']; //地號
    $wsp_pj_seat_count = $_POST['wsp_pj_seat_count']; //筆數
    $wsp_pj_own = $_POST['wsp_pj_own']; //土地權屬
    $wsp_pj_area = $_POST['wsp_pj_area']; //計畫面積
    $wsp_pj_co = $_POST['wsp_pj_co']; //土地座標
    $wsp_pj_add = $_POST['wsp_pj_add']; //土地新增
   
    $wsp_vol_name = $_POST['wsp_vol_name']; //水土保持義務人名稱
    $wsp_vol_num = $_POST['wsp_vol_num']; //國民身分證統一編號或營利事業統一編號
    $wsp_vol_phone = $_POST['wsp_vol_phone']; //電話
    $wsp_vol_addr = $_POST['wsp_vol_addr']; //住居所或營業所
    $wsp_vol_email = $_POST['wsp_vol_email']; //電子郵件

    $wsp_un_name = $_POST['wsp_un_name']; //承辦技師姓名
    $wsp_un_off = $_POST['wsp_un_off']; //技師職業機構或事務所
    $wsp_un_phone = $_POST['wsp_un_phone']; //電話
    $wsp_un_email = $_POST['wsp_un_email']; //電子郵件
    $wsp_un_date = date('Y-m-d', strtotime($_POST['wsp_un_date'])); //製作年月日

    $wsp_pj_pur = $_POST['wsp_pj_pur']; //計畫目的
    $wsp_pj_scp = $_POST['wsp_pj_scp']; //計畫範圍
    $wsp_pj_sum = $_POST['wsp_pj_sum']; //開挖整地概述
    $wsp_pj_fac = $_POST['wsp_pj_fac']; //水土保持設施
    $wsp_pj_pre = $_POST['wsp_pj_pre']; //開發期間之防災措施
    $wsp_pj_way = $_POST['wsp_pj_way']; //預定施工方式
    $wsp_pj_cost = $_POST['wsp_pj_cost']; //水土保持計畫設施項目、數量及總工程造價
    
    $wsp_ad_remark = $_POST['wsp_ad_remark']; //行政備註

    $wsp_undertaker = $_POST['wsp_undertaker']; //承辦人
    $wsp_apy_date = date('Y-m-d', strtotime($_POST['wsp_apy_date'])); //申請日期
    $wsp_apy_tnum = $_POST['wsp_apy_tnum']; //申請文號
    $wsp_apv_date = date('Y-m-d', strtotime($_POST['wsp_apv_date'])); //核准日期
    $wsp_apv_tnum = $_POST['wsp_apv_tnum']; //核准文號
    $wsp_main_apv_date = date('Y-m-d', strtotime($_POST['wsp_main_apv_date'])); //目的事業主管機關核准日期
    $wsp_main_apv_tnum = $_POST['wsp_main_apv_tnum']; //目的事業主管機關核准文號
    
    $wsp_st_date = date('Y-m-d', strtotime($_POST['wsp_st_date'])); //應開工日期
    $wsp_rm_st_date = date('Y-m-d', strtotime($_POST['wsp_rm_st_date'])); //提醒開工日期
    $wsp_ac_st_date = date('Y-m-d', strtotime($_POST['wsp_ac_st_date'])); //實際開工日期
    $wsp_end_date = date('Y-m-d', strtotime($_POST['wsp_end_date'])); //預定完工日期
    $wsp_rm_end_date = date('Y-m-d', strtotime($_POST['wsp_rm_end_date'])); //提醒完工日期
    $wsp_ac_end_date = date('Y-m-d', strtotime($_POST['wsp_ac_end_date'])); //實際完工日期
    $wsp_rm_crew = $_POST['wsp_rm_crew']; //提醒通知人員

     // 第一二次展延
     if(isset($_POST['wsp_apy_date1'])){
        $wsp_apy_date1 = date('Y-m-d', strtotime($_POST['wsp_apy_date1'])); //申請日期
    }else{
        $wsp_apy_date1 = date('Y-m-d', strtotime('')); 

    }
    if(isset($_POST['wsp_apy_date2'])){
        $wsp_apy_date2 = date('Y-m-d', strtotime($_POST['wsp_apy_date2'])); //申請日期
    }else{
        $wsp_apy_date2 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wsp_apy_tnum1'])){
        $wsp_apy_tnum1 = $_POST['wsp_apy_tnum1']; //申請文號
    }else{
        $wsp_apy_tnum1 = ""; 

    }
    if(isset($_POST['wsp_apy_tnum2'])){
        $wsp_apy_tnum2 = $_POST['wsp_apy_tnum2']; //申請文號
    }else{
        $wsp_apy_tnum2 = ""; 

    }

    if(isset($_POST['wsp_apv_date1'])){
        $wsp_apv_date1 = date('Y-m-d', strtotime($_POST['wsp_apv_date1'])); //核准日期
    }else{
        $wsp_apv_date1 = date('Y-m-d', strtotime('')); 

    }
    if(isset($_POST['wsp_apv_date2'])){
        $wsp_apv_date2 = date('Y-m-d', strtotime($_POST['wsp_apv_date2'])); //核准日期
    }else{
        $wsp_apv_date2 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wsp_apv_tnum1'])){
        $wsp_apv_tnum1 = $_POST['wsp_apv_tnum1']; //核准文號
    }else{
        $wsp_apv_tnum1 = ""; 

    }
    if(isset($_POST['wsp_apv_tnum2'])){
        $wsp_apv_tnum2 = $_POST['wsp_apv_tnum2']; //核准文號
    }else{
        $wsp_apv_tnum2 = ""; 

    }

    if(isset($_POST['wsp_ex_end_date1'])){
        $wsp_ex_end_date1 = date('Y-m-d', strtotime($_POST['wsp_ex_end_date1'])); //展延完工日期
    }else{
        $wsp_ex_end_date1 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wsp_ex_end_date2'])){
        $wsp_ex_end_date2 = date('Y-m-d', strtotime($_POST['wsp_ex_end_date2'])); //展延完工日期
    }else{
        $wsp_ex_end_date2 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wsp_rm_end_date1'])){
        $wsp_rm_end_date1 = date('Y-m-d', strtotime($_POST['wsp_rm_end_date1'])); //提醒完工日期
    }else{
        $wsp_rm_end_date1 = date('Y-m-d', strtotime('')); 

    }
     
    if(isset($_POST['wsp_rm_end_date2'])){
        $wsp_rm_end_date2 = date('Y-m-d', strtotime($_POST['wsp_rm_end_date2'])); //提醒完工日期
    }else{
        $wsp_rm_end_date2 = date('Y-m-d', strtotime('')); 

    }
    $wsp_remark = $_POST['wsp_remark']; //備註
    $wsp_close = $_POST['wsp_close']; //結案進度

    $wsp_add_1 = $_POST['wsp_add_1']; //開工前輔導
    $wsp_add_2 = $_POST['wsp_add_2']; //期初檢查
    $wsp_add_3 = $_POST['wsp_add_3']; //施工中檢查
    $wsp_add_4 = $_POST['wsp_add_4']; //完工檢查

    if(isset($_POST['wsp_ex_remark1'])){
        $wsp_ex_remark1 = $_POST['wsp_ex_remark1']; //展延備註1
    }else{
        $wsp_ex_remark1 = ""; //展延備註1

    }
    if(isset($_POST['wsp_ex_remark2'])){
        $wsp_ex_remark2 = $_POST['wsp_ex_remark2']; //展延備註2
    }else{
        $wsp_ex_remark2 = ""; //展延備註2

    }

    //上傳資料
    $uploaded_files = $_FILES['wsp_files'];

    $timestamped_filesname = [];

    if (!empty($uploaded_files['name'][0])) {
    
        foreach ($uploaded_files['name'] as $key => $filename) {
            $temp_files = $uploaded_files['tmp_name'][$key];
            $timestamp = time();
            $timestamped_filename = 'wsp_' . $timestamp . '_' . $filename;
    
            move_uploaded_file($temp_files, "./assets/imgs/$timestamped_filename");
    
            $timestamped_filesname[] = $timestamped_filename;
        }
    }
    $timestamped_filesname_string = implode(',', $timestamped_filesname);
    
    $query = "INSERT INTO $WSProject(wsp_name ,wsp_num, wsp_pj_seat_county ,wsp_pj_seat_town ,wsp_pj_seat_alley ,wsp_pj_seat_no ,wsp_pj_seat_count ,wsp_pj_own ,wsp_pj_area ,wsp_pj_co, wsp_pj_add, wsp_vol_name, wsp_vol_num, wsp_vol_phone, wsp_vol_addr, wsp_vol_email, wsp_un_name, wsp_un_off, wsp_un_phone, wsp_un_email, wsp_un_date, wsp_pj_pur, wsp_pj_scp, wsp_pj_sum, wsp_pj_fac, wsp_pj_pre, wsp_pj_way, wsp_pj_cost, wsp_ad_remark, wsp_undertaker, wsp_apy_date, wsp_apy_tnum, wsp_apv_date, wsp_apv_tnum, wsp_st_date, wsp_main_apv_date, wsp_main_apv_tnum, wsp_rm_st_date, wsp_ac_st_date, wsp_end_date, wsp_rm_end_date, wsp_ac_end_date, wsp_rm_crew, wsp_apy_date1, wsp_apy_date2, wsp_apy_tnum1, wsp_apy_tnum2, wsp_apv_date1, wsp_apv_date2, wsp_apv_tnum1, wsp_apv_tnum2, wsp_ex_end_date1, wsp_ex_end_date2, wsp_rm_end_date1, wsp_rm_end_date2, wsp_close, wsp_remark, wsp_add_1, wsp_add_2, wsp_add_3, wsp_add_4, wsp_ex_remark1, wsp_ex_remark2, wsp_files)";
    $query .=
    "VALUES( '{$wsp_name}', '{$wsp_num}', '{$wsp_pj_seat_county}', '{$wsp_pj_seat_town}', '{$wsp_pj_seat_alley}', '{$wsp_pj_seat_no}', '{$wsp_pj_seat_count}', '{$wsp_pj_own}', '{$wsp_pj_area}', '{$wsp_pj_co}', '{$wsp_pj_add}', '{$wsp_vol_name}', '{$wsp_vol_num}', '{$wsp_vol_phone}', '{$wsp_vol_addr}', '{$wsp_vol_email}', '{$wsp_un_name}', '{$wsp_un_off}', '{$wsp_un_phone}', '{$wsp_un_email}', '{$wsp_un_date}', '{$wsp_pj_pur}', '{$wsp_pj_scp}', '{$wsp_pj_sum}', '{$wsp_pj_fac}', '{$wsp_pj_pre}', '{$wsp_pj_way}', '{$wsp_pj_cost}', '{$wsp_ad_remark}', '{$wsp_undertaker}', '{$wsp_apy_date}', '{$wsp_apy_tnum}', '{$wsp_apv_date}', '{$wsp_apv_tnum}', '{$wsp_st_date}', '{$wsp_main_apv_date}', '{$wsp_main_apv_tnum}', '{$wsp_rm_st_date}', '{$wsp_ac_st_date}', '{$wsp_end_date}', '{$wsp_rm_end_date}', '{$wsp_ac_end_date}', '{$wsp_rm_crew}', '{$wsp_apy_date1}', '{$wsp_apy_date2}', '{$wsp_apy_tnum1}', '{$wsp_apy_tnum2}', '{$wsp_apv_date1}', '{$wsp_apv_date2}', '{$wsp_apv_tnum1}', '{$wsp_apv_tnum2}', '{$wsp_ex_end_date1}', '{$wsp_ex_end_date2}', '{$wsp_rm_end_date1}', '{$wsp_rm_end_date2}', '{$wsp_close}', '{$wsp_remark}', '{$wsp_add_1}', '{$wsp_add_2}', '{$wsp_add_3}', '{$wsp_add_4}', '{$wsp_ex_remark1}', '{$wsp_ex_remark2}', '{$timestamped_filesname_string}')";


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
        <div class="_POST">
            <div class="col-12">
                <h1 class="h4 mb-4">新增 水土保持計畫案件</h1>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="p-4 mb-4 bg-light text-dark rounded">
                <h2 class="h5 mb-4">水土保持計畫案件內容

                </h2>
                
                <div class="accordion accordion-flush mb-3" id="maincontent">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                水土保持計畫
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                                <label for="wsp_undertaker" class="col-form-label">案件承辦人員 <span class='text-danger'>*</span></label>
                                <select id="wsp_undertaker_select" name="wsp_undertaker" class="form-select" >
                                    <option value="" selected>請選擇承辦人員</option>
                                    <?php foreach ($user_fullname as $fullname): ?>
                                        <option value="<?php echo $fullname; ?>">
                                         <?php echo $fullname; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>   
                                <label for="wsp_num" class="col-form-label">案件編號</label>
                                <input id="wsp_num" name="wsp_num" type="text" class="form-control"> 

                                <label for="wsp_apy_date" class="col-form-label">申請日期</label>

                                <div class="input-group ">
                                    <input type="date" class="form-control" name="wsp_apy_date" onchange="de(value)">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_apy_tnum" class="col-form-label">申請文號</label>
                                <input type="text" class="form-control" id="wsp_apy_tnum" name="wsp_apy_tnum" onchange="num(value)">


                                <label for="wsp_name" class="col-form-label">計畫名稱 <span class='text-danger'>*</span></label>
                                <input type="text" class="form-control" id="wsp_name" name="wsp_name">

                                <label for="wss_pj_seat_county" class="col-form-label">實施地點 土地座落</label>
                                <div  class="input-group mb-2">

                                    <select class="form-select" id="wss_pj_seat_county" name="wsp_pj_seat_county">
                                        <option value="雲林縣" selected>雲林縣</option>
                                    </select> 

                                    <select class="form-select" id="wss_pj_seat_town" name="wsp_pj_seat_town">
                                        <option value="" selected >請選擇</option>
                                        <?php
                                            $areaitem = '[{"area":"斗六市","value":"斗六市"},{"area":"古坑鄉","value":"古坑鄉"},{"area":"林內鄉","value":"林內鄉"}]';
                                            $areaitem_array = json_decode( $areaitem, true );
                                            
                                            foreach($areaitem_array as $item) { 
                                                $value = $item['value'];
                                                $area = $item['area'];
                                                
                                                echo "<option value='$value'  >$area</option>";
                                            }
                                        ?>
                                    </select>
                                    <input id="road" type="hidden" value="<?php echo $wsp_pj_seat_alley?>">

                                    <select class="form-select" id="wss_pj_seat_alley" name="wsp_pj_seat_alley">
                                        <option value="" selected>請選擇</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2">
                                    <input id="wsp_pj_seat_no" type="text" class="form-control"  name="wsp_pj_seat_no" placeholder="請輸入地號">
                                    <input type="number" class="form-control" name="wsp_pj_seat_count" placeholder="土地筆數">
                                    <span class="input-group-text" >筆</span>
                                </div>
                                <label for="wsp_pj_own" class="col-form-label">土地權屬</label>
                                <input type="text" class="form-control" id="wsp_pj_own" name="wsp_pj_own">
                                <label for="wsp_pj_area" class="col-form-label">計畫面積</label>
                                <div class="input-group ">
                                    <input type="number" step="0.0000001" class="form-control" id="wsp_pj_area" name="wsp_pj_area" value="0.0000">
                                    <span class="input-group-text" >公頃</span>
                                </div>
                                <label for="latlng" class="col-form-label">土地座標 (TWD97) <span class='text-danger'>*</span></label>
                                <div class="input-group ">
                                    <input id="latlng" type="text" class="form-control" name="wsp_pj_co" data-lat="23.6743232" data-lng="120.4345919" value="">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <div id="map" style="width: 100%; height: 60vh;"></div>
                                <label for="wsp_pj_add" class="col-form-label">土地新增</label>
                                <input type="text" class="form-control" id="wsp_pj_add" name="wsp_pj_add">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                水土保持義務人
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingTwo" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                            <?php
                                $vol = '[{"title_cn":"水土保持義務人名稱","title_en":"wsp_vol_name","type":"text","required":"true"},
                                {"title_cn":"國民身分證統一編號或營利事業統一編號","title_en":"wsp_vol_num","type":"text","required":"false"},
                                {"title_cn":"電話","title_en":"wsp_vol_phone","type":"text","required":"true"},
                                {"title_cn":"住居所或營業所","title_en":"wsp_vol_addr","type":"text","required":"false"},
                                {"title_cn":"電子郵件","title_en":"wsp_vol_email","type":"email","required":"false"}]';
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
                                    echo "<label for='$title_en' class='col-form-label'>$title_cn $star</label>";
                                    echo "<input id='$title_en' name='$title_en' type='$type' class='form-control' $required>";
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
                                {"title_cn":"電話","title_en":"wsp_un_phone","type":"text","required":"false"},
                                {"title_cn":"電子郵件","title_en":"wsp_un_email","type":"email","required":"true"},
                                {"title_cn":"製作年月日","title_en":"wsp_un_date","type":"date","required":"false"}]';
                                $ag_array = json_decode( $ag, true );

                                foreach($ag_array as $item) { 
                                    $title_cn = $item['title_cn']; 
                                    $title_en = $item['title_en']; 
                                    $type = $item['type']; 
                                    $required = $item['required']; 
                                    if ($required == 'true'){
                                        $required = "";

                                    //     $required = "required";
                                        $star = "<span class='text-danger'>*</spn>";
                                    }else{
                                        $required = "";
                                        $star = "";
                                    }
                                    echo "<label for='$title_en' class=' col-form-label'>$title_cn $star</label>";
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

                                foreach($pd_array as $item) { 
                                    $title_cn = $item['title_cn']; 
                                    $title_en = $item['title_en']; 
        
                                    echo "<label for='$title_en' class='col-form-label'>$title_cn</label>";
                                    echo "<textarea class='form-control' name='$title_en' id='$title_en'></textarea>";
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
                                <textarea rows="6" class="form-control" name="wsp_ad_remark" id="wsp_ad_remark" ></textarea>
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
                        <div id="flush-collapseNine" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingNine" data-bs-parent="#competent">
                            <div class="accordion-body">
                                <label for="undertaker" class="col-form-label">案件承辦人員 <span class='text-danger'>*</span>
                                </label>
                                <input id="undertaker" name="undertaker" type="text" class="form-control" disabled>
                                <label for="wsp_apy_date" class="col-form-label">申請日期
                                </label>
                                <div class="input-group">
                                    <input id="wsp_apy_date" type="date" class="form-control" name="wsp_apy_date" disabled>
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="apy_tnum" class="col-form-label">申請文號</label>
                                <input type="text" class="form-control" id="apy_tnum" name="apy_tnum" disabled>

                                <label for="wsp_apv_date" class="col-form-label">核准日期</label>
                                <div class="input-group ">
                                    <input id="wsp_apv_date" type="date" class="form-control" name="wsp_apv_date"  onchange="apy(value)">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_apv_tnum" class="col-form-label">核准文號</label>
                                <input type="text" class="form-control" id="wsp_apv_tnum" name="wsp_apv_tnum">
                                <label for="wsp_main_apv_date" class="col-form-label">目的事業主管機關核准日期</label>
                                <div class="input-group ">
                                    <input id="wsp_main_apv_date" type="date" class="form-control" name="wsp_main_apv_date" >
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_main_apv_tnum" class="col-form-label">目的事業主管機關核准文號</label>
                                <input type="text" class="form-control" id="wsp_main_apv_tnum" name="wsp_main_apv_tnum">
                                <label for="wsp_st_date" class="col-form-label">應開工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_st_date" type="date" class="form-control" name="wsp_st_date">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_rm_st_date" class="col-form-label">提醒開工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_rm_st_date" type="date" class="form-control" name="wsp_rm_st_date">
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_ac_st_date" class="col-form-label">實際開工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_ac_st_date" type="date" class="form-control" name="wsp_ac_st_date">
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_end_date" class="col-form-label">預定完工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_end_date" type="date" class="form-control" name="wsp_end_date" onchange="end(value)">
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_rm_end_date" class="col-form-label">提醒完工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_rm_end_date" type="date" class="form-control" name="wsp_rm_end_date" >
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_ac_end_date" class="col-form-label">實際完工日期</label>
                                <div class="input-group ">
                                    <input id="wsp_ac_end_date" type="date" class="form-control" name="wsp_ac_end_date">
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsp_rm_crew" class="col-form-label">提醒通知人員</label>
                                <div class="input-group ">
                                    <input id="wsp_rm_crew" type="text" class="form-control" name="wsp_rm_crew">
                                    <span class="input-group-text" ><i class="fas fa-user"></i></span>
                                </div>
                                <label for="wsp_add_1" class="col-form-label">開工前輔導</label>
                                <input type="text" class="form-control" id="wsp_add_1" name="wsp_add_1">
                                <label for="wsp_add_2" class="col-form-label">期初檢查</label>
                                <input type="text" class="form-control" id="wsp_add_2" name="wsp_add_2">
                                <label for="wsp_add_3" class="col-form-label">施工中檢查</label>
                                <input type="text" class="form-control" id="wsp_add_3" name="wsp_add_3">
                                <label for="wsp_add_4" class="col-form-label">完工檢查</label>
                                <input type="text" class="form-control" id="wsp_add_4" name="wsp_add_4">
                                <label for="wsp_rm_crew" class="col-form-label">案件進度</label>
                                <div class="input-group ">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="wsp_close" id="wsp_closed"  value="1">
                                    <label class="form-check-label" for="wsp_closed">已結案</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="wsp_close" id="wsp_unclose"  value="0" checked>
                                    <label class="form-check-label" for="wsp_unclose">辦理中</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="wsp_close" id="wsp_closed" value="1">
                                    <label class="form-check-label" for="wsp_unclose">系統結案</label>
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
                                    <textarea class="form-control" name="wsp_remark" id="wsp_remark" ></textarea>
                                </div>
                            </div>
                        </div>

                </div>
                
                <div class="d-grid gap-2 d-md-flex ">
                         <button type="button" class="btn btn-primary" id="extend" data-num="0"><i class="fas fa-plus mr-2 fa-sm"></i> 展延</button>
                    </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-secondary " href="WSProject.php"><i
                            class="fas fa-times-circle me-2"></i>取消</a>
                    <input class="btn btn-primary" type="submit" name="add_project" value="新增">
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
            { label: "申請日期", type: "date", name: "wsp_apy_date" + index },
            { label: "申請文號", type: "text", name: "wsp_apy_tnum" + index },
            { label: "核准日期", type: "date", name: "wsp_apv_date" + index },
            { label: "核准文號", type: "text", name: "wsp_apv_tnum" + index },
            { label: "展延完工日期", type: "date", name: "wsp_ex_end_date" + index, onchange: "end(value)" },
            // { label: "提醒完工日期", type: "date", name: "wss_rm_end_date" +  index},
            { label: "備註", type: "textarea", name: "wsp_ex_remark" + index }

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

</script>