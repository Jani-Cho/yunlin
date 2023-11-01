<?php 
if(isset($_POST['add_project'])){

    $wsl_undertaker = $_POST['wsl_undertaker']; //案件承辦人
    $wsl_cats = $_POST['wsl_cats']; //案件類別
    
    if(isset($_POST['wsl_source'])){
        $wsl_source = $_POST['wsl_source']; //查報主資訊來源
    } else {
        $wsl_source = ""; 
    }
    $wsl_county = $_POST['wsl_county']; //實施地點 土地座落 縣
    $wsl_town = $_POST['wsl_town']; //鄉市
    // $wsl_alley = $_POST['wsl_alley']; //路段
    
    $wsl_unit = $_POST['wsl_unit']; //案件移來單位
    $wsl_apy_date = date('Y-m-d', strtotime($_POST['wsl_apy_date'])); //查(通)報日期
    $wsl_apy_num = $_POST['wsl_apy_num']; //查(通)報文號
    
    $wsl_sent_date = date('Y-m-d', strtotime($_POST['wsl_sent_date'])); //農村發展及水土保持署函送日期
    $wsl_sent_num = $_POST['wsl_sent_num']; //農村發展及水土保持署函送文號
 
    $wsl_acp_date = date('Y-m-d', strtotime($_POST['wsl_acp_date'])); //縣市政府收文日期
    $wsl_acp_num = $_POST['wsl_acp_num']; //縣市政府收文文號

    $wsl_type = $_POST['wsl_type']; //土地編定類別
    $wsl_area = $_POST['wsl_area']; //水庫集水區流域

    $wsl_p_type = $_POST['wsl_p_type']; //土地種類
    $wsl_p_dcp = $_POST['wsl_p_dcp']; //現場位置描述
    $wsl_p_sta = $_POST['wsl_p_sta']; //現場狀況
    
    $wsl_reason = $_POST['wsl_reason']; //清查原因
    $wsl_reason_oth = $_POST['wsl_reason_oth']; //清查原因
    if(isset($_POST['wsl_if_ocase'])){
        $wsl_if_ocase = $_POST['wsl_if_ocase']; //是否為原民課案件
    } else {
        $wsl_if_ocase = ""; 
    }
    $wsl_if = $_POST['wsl_if']; //是否為
    if(count($wsl_if) > 1 ){
        array_shift($wsl_if); 
    }
    $wsl_if_list = implode(", ",$wsl_if);

    
    $wsl_vol_num = $_POST['wsl_vol_num']; //身分證(或公司)統一編號
    $wsl_vol_name = $_POST['wsl_vol_name']; //姓名
    $wsl_vol_phone = $_POST['wsl_vol_phone']; //電話
    $wsl_vol_addr = $_POST['wsl_vol_addr']; //地址
    $wsl_remark = $_POST['wsl_remark']; //備註

    if(isset($_POST['wsl_pj_cats'])){
        $wsl_pj_cats = $_POST['wsl_pj_cats']; //土地類別
    } else {
        $wsl_pj_cats = ""; 
    }
    $wsl_pj_no = $_POST['wsl_pj_no']; //土地資料編號
    if(isset($_POST['wsl_pj_own'])){
        $wsl_pj_own = $_POST['wsl_pj_own']; //土地權屬
    } else {
        $wsl_pj_own = ""; 
    }
    if(isset($_POST['wsl_pj_og'])){
        $wsl_pj_og = $_POST['wsl_pj_og']; //公有土地管理機關
    } else {
        $wsl_pj_og = ""; 
    }
    $wsl_pj_og_oth = $_POST['wsl_pj_og_oth']; //公有土地管理機關
    $wsl_pj_area = $_POST['wsl_pj_area']; //土地面積(公頃)

    // $wsl_pj_seat_county = $_POST['wsl_pj_seat_county']; //縣市
    // $wsl_pj_seat_town = $_POST['wsl_pj_seat_town']; //鄉鎮市區
    $wsl_pj_seat_alley = $_POST['wsl_pj_seat_alley']; //地段
    $wsl_pj_seat_no = $_POST['wsl_pj_seat_no']; //地號
    $wsl_pj_remark = $_POST['wsl_pj_remark']; //備註

    $wsl_pj_co = $_POST['wsl_pj_co']; //坐標資料(TWD97)
    $wsl_ch_date = date('Y-m-d', strtotime($_POST['wsl_ch_date'])); //縣市政府查復日期：
    if(isset($_POST['wsl_ch_result'])){
        $wsl_ch_result = $_POST['wsl_ch_result']; //縣市政府查證結果
    } else {
        $wsl_ch_result = ""; 
    }
    if(isset($_POST['wsl_vl_type'])){
        $wsl_vl_type = $_POST['wsl_vl_type']; //違規法律類別
    } else {
        $wsl_vl_type = ""; 
    }
    $wsl_val_type = $_POST['wsl_val_type']; //違規行政法別
    $wsl_val_cost = $_POST['wsl_val_cost']; //違反行政法已罰鍰金額：
    $wsl_val_area = $_POST['wsl_val_area']; //*違規面積(公頃)
    $wsl_val_item = $_POST['wsl_val_item']; //主違規項目
    if(isset($_POST['wsl_val_crop'])){
        $wsl_val_crop = $_POST['wsl_val_crop']; //現況作物
    } else {
        $wsl_val_crop = ""; 
    }
    $wsl_val_crop_oth = $_POST['wsl_val_crop_oth']; //現況作物

    $wsl_pu_date = date('Y-m-d', strtotime($_POST['wsl_pu_date'])); //處分日期
    $wsl_val_ph = $_POST['wsl_val_ph']; //行政程序處理紀要
    $wsl_val_ph_item = $_POST['wsl_val_ph_item']; //主違規項目

    //現場檢查照片
    $uploaded_files = $_FILES['wsl_val_img'];
    
    $timestamped_filenames = []; 

    foreach ($uploaded_files['name'] as $key => $filename) {
        $temp_file = $uploaded_files['tmp_name'][$key];
        $timestamp = time();
        $timestamped_filename = 'wsl_' . $timestamp . '_' . $filename;
        
        move_uploaded_file($temp_file, "./assets/imgs/$timestamped_filename");

        $timestamped_filenames[] = $timestamped_filename;
    }
    $timestamped_filenames_string = implode(',', $timestamped_filenames);





    $wsl_val_remark = $_POST['wsl_val_remark']; //備註(現場查證狀況描述)
    
    
    $wsl_psh_rate = $_POST['wsl_psh_rate']; //處分次別
    $wsl_psh_name = $_POST['wsl_psh_name']; //受處分人
    if(isset($_POST['wsl_psh_county'])){
        $wsl_psh_county = $_POST['wsl_psh_county']; //縣市
    } else {
        $wsl_psh_county = ""; 
    }
    if(isset($_POST['wsl_psh_town'])){
        $wsl_psh_town = $_POST['wsl_psh_town']; //鄉鎮市區
    } else {
        $wsl_psh_town = ""; 
    }
    if(isset($_POST['wsl_psh_area'])){
        $wsl_psh_area = $_POST['wsl_psh_area']; //違規面積(公頃)
    } else {
        $wsl_psh_area = ""; 
    }
    $wsl_psh_date = date('Y-m-d', strtotime($_POST['wsl_psh_date'])); //處罰日期
    $wsl_psh_num = $_POST['wsl_psh_num']; //處罰文號
    $wsl_psh_cost = $_POST['wsl_psh_cost']; //罰鍰金額(元)
    $wsl_psh_end_date = date('Y-m-d', strtotime($_POST['wsl_psh_end_date'])); //罰鍰完繳日期
    $wsl_psh_deadline = date('Y-m-d', strtotime($_POST['wsl_psh_deadline'])); //限期改正日期
    $wsl_psh_pre = date('Y-m-d', strtotime($_POST['wsl_psh_pre'])); //預先通知限期改正日期
    $wsl_psh_remark = $_POST['wsl_psh_remark']; //備註
    
    $query = "INSERT INTO wslimit(wsl_undertaker, wsl_cats, wsl_source, wsl_town, wsl_county, wsl_unit, wsl_apy_date, wsl_apy_num, wsl_sent_date, wsl_sent_num, wsl_acp_date, wsl_acp_num, wsl_type, wsl_area, wsl_p_type, wsl_p_dcp, wsl_p_sta, wsl_reason, wsl_reason_oth, wsl_if_ocase, wsl_if, wsl_vol_num, wsl_vol_name, wsl_vol_phone, wsl_vol_addr, wsl_remark, wsl_pj_cats, wsl_pj_no, wsl_pj_own, wsl_pj_og, wsl_pj_og_oth, wsl_pj_area, wsl_pj_seat_alley, wsl_pj_seat_no, wsl_pj_remark, wsl_pj_co, wsl_ch_date, wsl_ch_result, wsl_vl_type, wsl_val_type, wsl_val_cost, wsl_val_area, wsl_val_item, wsl_val_crop, wsl_val_crop_oth, wsl_pu_date, wsl_val_ph, wsl_val_ph_item, wsl_val_img, wsl_val_remark, wsl_psh_rate, wsl_psh_name, wsl_psh_county, wsl_psh_town, wsl_psh_area, wsl_psh_date, wsl_psh_num, wsl_psh_cost, wsl_psh_end_date, wsl_psh_deadline, wsl_psh_pre, wsl_psh_remark)";
    $query .=
    "VALUES( '{$wsl_undertaker}', '{$wsl_cats}', '{$wsl_source}', '{$wsl_town}', '{$wsl_county}', '{$wsl_unit}', '{$wsl_apy_date}', '{$wsl_apy_num}', '{$wsl_sent_date}', '{$wsl_sent_num}', '{$wsl_acp_date}', '{$wsl_acp_num}', '{$wsl_type}', '{$wsl_area}', '{$wsl_p_type}', '{$wsl_p_dcp}', '{$wsl_p_sta}', '{$wsl_reason}', '{$wsl_reason_oth}', '{$wsl_if_ocase}', '{$wsl_if_list}', '{$wsl_vol_num}', '{$wsl_vol_name}', '{$wsl_vol_phone}', '{$wsl_vol_addr}', '{$wsl_remark}', '{$wsl_pj_cats}', '{$wsl_pj_no}', '{$wsl_pj_own}', '{$wsl_pj_og}', '{$wsl_pj_og_oth}', '{$wsl_pj_area}', '{$wsl_pj_seat_alley}', '{$wsl_pj_seat_no}', '{$wsl_pj_remark}', '{$wsl_pj_co}', '{$wsl_ch_date}', '{$wsl_ch_result}', '{$wsl_vl_type}', '{$wsl_val_type}', '{$wsl_val_cost}', '{$wsl_val_area}', '{$wsl_val_item}', '{$wsl_val_crop}', '{$wsl_val_crop_oth}', '{$wsl_pu_date}', '{$wsl_val_ph}', '{$wsl_val_ph_item}', '{$timestamped_filenames_string}', '{$wsl_val_remark}', '{$wsl_psh_rate}', '{$wsl_psh_name}', '{$wsl_psh_county}', '{$wsl_psh_town}', '{$wsl_psh_area}', '{$wsl_psh_date}', '{$wsl_psh_num}', '{$wsl_psh_cost}', '{$wsl_psh_end_date}', '{$wsl_psh_deadline}', '{$wsl_psh_pre}', '{$wsl_psh_remark}')";


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


?>


<main>
    <div class="container-fluid p-4">
        <div class="_POST">
            <div class="col-12">
                <h1 class="h4 mb-4">新增 超限利用案件</h1>
            </div>
            <form enctype="multipart/form-data" method="POST" action="">
            <div class="p-4 mb-4 bg-light text-dark rounded">
                <h2 class="h5 mb-4">超限利用案件內容

                </h2>
                
                <div class="accordion accordion-flush mb-3" id="maincontent">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                基本資料
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                                <label for="wsl_undertaker" class="col-form-label">案件承辦人</label>
                                <select id="wsl_undertaker_select" name="wsl_undertaker" class="form-select" >
                                    <option value="" selected>請選擇承辦人員</option>
                                    <?php foreach ($user_fullname as $fullname): ?>
                                        <option value="<?php echo $fullname; ?>">
                                         <?php echo $fullname; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>  
                                
                                <label for="wsl_cats" class="col-form-label">案件類別</label>
                                <div class="input-group ">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_cats" id="wsl_cats_t"  value="農業使用" checked>
                                        <label class="form-check-label" for="wsl_cats_t">農業使用</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_cats" id="wsl_cats_y"  value="非農業使用" >
                                        <label class="form-check-label" for="wsl_cats_y">非農業使用</label>
                                    </div>
                                </div>

                                <label for="wsl_source" class="col-form-label">查報主資訊來源</label>
                                <select id="wsl_source" name="wsl_source" class="form-select">
                                    <option value="" selected >請選擇</option>
                                    <option value="依行政區">依行政區</option>
                                    <option value="依行為人">依行為人</option>
                                    <option value="未依計畫施作案件">未依計畫施作案件</option>
                                </select>   

                                <label for="wsl_county" class="col-form-label">鄉市</label>
                                <div  class="input-group mb-2">

                                    <select class="form-select" id="wsl_county" name="wsl_county">
                                        <option value="雲林縣" selected>雲林縣</option>
                                    </select> 

                                    <select class="form-select" id="wss_pj_seat_town" name="wsl_town">
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
   
                                </div>
                                <label for="wsl_unit" class="col-form-label">案件移來單位</label>
                                <input type="text" class="form-control" id="wsl_unit" name="wsl_unit">
                                <label for="wsl_apy_date" class="col-form-label">查(通)報日期</label>
                                <div class="input-group ">
                                    <input type="date" class="form-control" name="wsl_apy_date">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsl_apy_num" class="col-form-label">查(通)報文號</label>
                                <input type="text" class="form-control" id="wsl_apy_num" name="wsl_apy_num">
                                <label for="wsl_sent_date" class="col-form-label">農村發展及水土保持署函送日期</label>
                                <div class="input-group ">
                                    <input type="date" class="form-control" name="wsl_sent_date">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsl_sent_num" class="col-form-label">農村發展及水土保持署函送文號</label>
                                <input type="text" class="form-control" id="wsl_sent_num" name="wsl_sent_num">
                                <label for="wsl_acp_date" class="col-form-label">縣市政府收文日期</label>
                                <div class="input-group ">
                                    <input type="date" class="form-control" name="wsl_acp_date">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsl_acp_num" class="col-form-label">縣市政府收文文號</label>
                                <input type="text" class="form-control" id="wsl_acp_num" name="wsl_acp_num">
                                <label for="wsl_type" class="col-form-label">土地編定類別</label>
                                <input type="text" class="form-control" id="wsl_type" name="wsl_type">
                                <label for="wsl_area" class="col-form-label">水庫集水區流域</label>
                                <input type="text" class="form-control" id="wsl_area" name="wsl_area">
                                
                                <label for="wsl_p_type" class="col-form-label">土地種類 <span class='text-danger'>*</span></label>
                                <div class="input-group ">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_p_type" id="wsl_p_type_t"  value="0" checked>
                                        <label class="form-check-label" for="wsl_p_type_t">都市土地</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_p_type" id="wsl_p_type_y"  value="1" >
                                        <label class="form-check-label" for="wsl_p_type_y">非都市土地</label>
                                    </div>
                                </div> 
                                
                                <label for="wsl_p_dcp" class="col-form-label">現場位置描述</label>
                                <input type="text" class="form-control" id="wsl_p_dcp" name="wsl_p_dcp">
                                <label for="wsl_p_sta" class="col-form-label">現場狀況</label>
                                <input type="text" class="form-control" id="wsl_p_sta" name="wsl_p_sta">
                                
                                <label for="wsl_reason" class="col-form-label">清查原因 <span class='text-danger'>*</span></label>
                                <div class="input-group ">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_reason" id="wsl_reason_1"  value="因恢復自然植生解除列管" checked>
                                        <label class="form-check-label" for="wsl_reason_1">因恢復自然植生解除列管</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_reason" id="wsl_reason_2"  value="因非農業使用解除列管" >
                                        <label class="form-check-label" for="wsl_reason_2">因非農業使用解除列管</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_reason" id="wsl_reason_3"  value="改正清查工作" >
                                        <label class="form-check-label" for="wsl_reason_3">改正清查工作</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_reason" id="wsl_reason_4"  value="其他">
                                        <label class="form-check-label" for="wsl_reason_4">其他</label>
                                    </div>
                                    <input class="form-control" type="text" id="otherReason" name="wsl_reason_oth">

                                </div> 

                                <label for="wsl_if_ocase" class="col-form-label">是否為原民課案件 <span class='text-danger'>*</span></label>
                                <select id="wsl_if_ocase" name="wsl_if_ocase" class="form-select">
                                    <option value="" selected >請選擇</option>
                                    <option value="是">是</option>
                                    <option value="否">否</option>
                                </select>   
                                <label for="wsl_if" class="col-form-label">是否為 <span class='text-danger'>*</span></label>
                                <input type="hidden" name="wsl_if[]" value="無" checked>
                                <?php
                                        $type = '[{"name":"土石流潛勢區"},
                                        {"name":"集水區"},
                                        {"name":"水源水質水量保護區及水源特定區"},
                                        {"name":"檳榔管理方案"}]';
                                    $type_array = json_decode( $type, true );

                                    foreach($type_array as $key=>$item) { 
                                        $name = $item['name']; 
                                        
                                        echo "<div class='form-check'>";
                                        echo "<input class='form-check-input' type='checkbox' name='wsl_if[]' value='$name' id='type$key'> ";
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
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            行為人資料
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingTwo" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                            <?php
                                $vol = '[{"title_cn":"身分證(或公司)統一編號","title_en":"wsl_vol_num","type":"text","required":"false"},
                                {"title_cn":"姓名","title_en":"wsl_vol_name","type":"text","required":"true"},
                                {"title_cn":"電話","title_en":"wsl_vol_phone","type":"text","required":"false"},
                                {"title_cn":"地址","title_en":"wsl_vol_addr","type":"text","required":"false"}]';
                                $vol_array = json_decode( $vol, true );

                                foreach($vol_array as $item) { 
                                    $title_cn = $item['title_cn']; 
                                    $title_en = $item['title_en']; 
                                    $type = $item['type']; 
                                    $required = $item['required']; 
                                    if ($required == 'true'){
                                        $required = "";
                                        $star = "<span class='text-danger'>*</span>";
                                    }else{
                                        $required = "";
                                        $star = "";
                                    }
                                    echo "<label for='$title_en' class='col-form-label'>$title_cn $star</label>";
                                    echo "<input id='$title_en' name='$title_en' type='$type' class='form-control' $required>";
                                }
                            ?>
                                <label for="wsl_remark" class="col-form-label">備註</label>
                                <textarea class="form-control" name="wsl_remark" id="wsl_remark" ></textarea>

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
                                <label for="wsl_pj_cats" class="col-form-label">土地類別</label>
                                <select id="wsl_pj_cats" name="wsl_pj_cats" class="form-select">
                                    <option value="" selected>請選擇</option>

                                    <option value="地籍資料">地籍資料</option>
                                    <option value="林班資料">林班資料</option>
                                    <option value="暫未編定">暫未編定</option>
                                </select>  
                                 
                                <label for="wsl_pj_no" class="col-form-label">土地資料編號</label>
                                <input type="text" class="form-control" id="wsl_pj_no" name="wsl_pj_no">
                                <label for="wsl_pj_own" class="col-form-label">土地權屬<span class='text-danger'>*</span></label>
                                <select id="wsl_pj_own" name="wsl_pj_own" class="form-select">
                                    <option value="" selected disabled>請選擇</option>
                                    <option value="公有">公有</option>
                                    <option value="私有">私有</option>
                                    <option value="公、私有">公、私有</option>
                                </select>   
                                <label for="wsl_pj_og" class="col-form-label">公有土地管理機關</label>
                                <select id="wsl_pj_og" name="wsl_pj_og" class="form-select">
                                    <option value="" selected disabled>請選擇</option>
                                    <option value="原住民委員會">原住民委員會</option>
                                    <option value="財政部國有財產署">財政部國有財產署</option>
                                    <option value="農業部林業及自然保育署">農業部林業及自然保育署</option>
                                    <option value="其他">其他</option>
                                </select>   
                                <div id="otherOptionInput" style="display: none;">
                                    <input type="text" class="form-control" id="wsl_pj_og_oth" name="wsl_pj_og_oth" placeholder="其他">
                                </div>

                                <label for="wsl_pj_area" class="col-form-label">土地面積(公頃)</label>
                                <input type="text" class="form-control" id="wsl_pj_area" name="wsl_pj_area">
                                
                                <label for="wsl_pj_seat_county" class="col-form-label">縣市、鄉鎮市區（與基本資料相同）<span class='text-danger'>*</span></label>
                                <div  class="input-group mb-2">
                                    <input type="text" class="form-control" id="wsl_pj_seat_county" name="wsl_pj_seat_county" disabled value="雲林縣">
                                    <input type="text" class="form-control" id="wsl_pj_seat_town" name="wsl_pj_seat_town" disabled value="">
                                </div>
                                <label for="wsl_pj_seat_county" class="col-form-label">地段 <span class='text-danger'>*</span></label>
                                <div  class="input-group mb-2">
                                    <input id="road" type="hidden" value="">

                                    <select class="form-select" id="wss_pj_seat_alley" name="wsl_pj_seat_alley">
                                        <option value="" selected>請選擇</option>
       
                                    </select>
                                    
                                </div>
                                <label for="wsl_pj_seat_no" class="col-form-label">地號</label>
                                <input id="wsl_pj_seat_no" type="text" class="form-control"  name="wsl_pj_seat_no" placeholder="請輸入地號">
                                <label for="wsl_pj_remark" class="col-form-label">備註</label>
                                <textarea class="form-control" name="wsl_pj_remark" id="wsl_pj_remark" ></textarea>
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
                                <label for="" class="col-form-label">坐標資料(TWD97) </label>
                                <div class="input-group mb-3">
                                    <input id="latlng" type="text" class="form-control" name="wsl_pj_co" data-lat="23.6743232" data-lng="120.4345919" value="">
                                    <span class="input-group-text" id=""><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <div id="map" class="mb-4" style="width: 100%; height: 60vh;"></div>

                                <label for="wsl_ch_date" class="col-form-label">縣市政府查復日期</label>
                                <div class="input-group ">
                                    <input type="date" class="form-control" name="wsl_ch_date">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsl_ch_result" class="col-form-label">縣市政府查證結果</label>
                                <select id="wsl_ch_result" name="wsl_ch_result" class="form-select">
                                    <option value="" selected disabled>請選擇</option>
                                    <option value="違規案件">違規案件</option>
                                    <option value="非違規案件">非違規案件</option>
                                </select> 
                                <label for="wsl_vl_type" class="col-form-label">違規法律類別</label>
                                <select id="wsl_vl_type" name="wsl_vl_type" class="form-select">
                                    <option value="" selected disabled>請選擇</option>
                                    <option value="觸及刑事法律">觸及刑事法律</option>
                                    <option value="違反行政法">違反行政法</option>
                                    <option value="同時觸及刑事法律及違反行政法">同時觸及刑事法律及違反行政法</option>
                                </select> 

                                <label for="wsl_val_type" class="col-form-label">違規行政法別</label>
                                <input type="text" class="form-control" id="wsl_val_type" name="wsl_val_type">

                                <label for="wsl_val_cost" class="col-form-label">違反行政法已罰鍰金額</label>
                                <input type="text" class="form-control" id="wsl_val_cost" name="wsl_val_cost">

                                <label for="wsl_val_area" class="col-form-label">違規面積(公頃) <span class='text-danger'>*</span></label>
                                <input type="text" class="form-control" id="wsl_val_area" name="wsl_val_area">
                                <label for="wsl_val_item" class="col-form-label">主違規項目 <span class='text-danger'>*</span></label>
                                <select class="form-select" id="wsl_val_item" name="wsl_val_item" >
                                    <option value="" selected>請選擇</option>
                                    <option value="01a違規農業使用">01a違規農業使用</option>
                                    <option value="01b超限利用">01b超限利用</option>
                                    <option value="02開發建築用地">02開發建築用地</option>
                                    <option value="03採取土石">03採取土石</option>
                                    <option value="04修建道路或溝渠">04修建道路或溝渠(含鐵、公路)</option>
                                    <option value="05探礦、採礦">05探礦、採礦</option>
                                    <option value="06堆積土石">06堆積土石</option>
                                    <option value="07設置供原、遊憩用地、運動場地或軍事訓練場">07設置供原、遊憩用地、運動場地或軍事訓練場</option>
                                    <option value="08設置墳墓">08設置墳墓</option>
                                    <option value="09處理廢棄物">09處理廢棄物</option>
                                    <option value="10其他開挖整地">10其他開挖整地</option>
                                    <option value="11未依核定計畫施工">11未依核定計畫施工</option>
                                    <option value="12未依規定限期改正">12未依規定限期改正</option>
                                    <option value="13整坡作業">13整坡作業</option>
                                </select>
                                <label for="wsl_val_crop" class="col-form-label">現況作物 <span class='text-danger'>*</span></label>
                                <div class="input-group ">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_val_crop" id="wsl_val_crop_1"  value="檳榔">
                                        <label class="form-check-label" for="wsl_val_crop_1">檳榔</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_val_crop" id="wsl_val_crop_2"  value="果樹">
                                        <label class="form-check-label" for="wsl_val_crop_2">果樹</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_val_crop" id="wsl_val_crop_3"  value="茶樹">
                                        <label class="form-check-label" for="wsl_val_crop_3">茶樹</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_val_crop" id="wsl_val_crop_4"  value="蔬菜等草本植物">
                                        <label class="form-check-label" for="wsl_val_crop_4">蔬菜等草本植物</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsl_val_crop" id="wsl_val_crop_5"  value="其他">
                                        <label class="form-check-label" for="wsl_val_crop_5">其他</label>
                                    </div>
                                    <input class="form-control" type="text" id="otherCrop" name="wsl_val_crop_oth" style="display: none;" value="">

                                </div> 
                                <label for="wsl_pu_date" class="col-form-label">處分日期：(開立處分書)</label>
                                <div class="input-group ">
                                    <input type="date" class="form-control" name="wsl_pu_date">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsl_val_ph" class="col-form-label">行政程序處理紀要</label>
                                <input type="text" class="form-control" id="wsl_val_ph" name="wsl_val_ph">
                                <label for="wsl_val_ph_item" class="col-form-label">主違規項目 <span class='text-danger'>*</span></label>
                                <select class="form-select" id="wsl_val_ph_item" name="wsl_val_ph_item" >
                                    <option value="" selected>請選擇</option>
                                    <option value="01a違規農業使用">01a違規農業使用</option>
                                    <option value="01b超限利用">01b超限利用</option>
                                    <option value="02開發建築用地">02開發建築用地</option>
                                    <option value="03採取土石">03採取土石</option>
                                    <option value="04修建道路或溝渠">04修建道路或溝渠(含鐵、公路)</option>
                                    <option value="05探礦、採礦">05探礦、採礦</option>
                                    <option value="06堆積土石">06堆積土石</option>
                                    <option value="07設置供原、遊憩用地、運動場地或軍事訓練場">07設置供原、遊憩用地、運動場地或軍事訓練場</option>
                                    <option value="08設置墳墓">08設置墳墓</option>
                                    <option value="09處理廢棄物">09處理廢棄物</option>
                                    <option value="10其他開挖整地">10其他開挖整地</option>
                                    <option value="11未依核定計畫施工">11未依核定計畫施工</option>
                                    <option value="12未依規定限期改正">12未依規定限期改正</option>
                                    <option value="13整坡作業">13整坡作業</option>
                                </select>
                                <label for="wsl_val_img" class="col-form-label">現場檢查照片</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="wsl_val_img" name="wsl_val_img[]" multiple>
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                </div>


                                <label for="wsl_val_remark" class="col-form-label">備註(現場查證狀況描述)</label>
                                <textarea class="form-control" name="wsl_val_remark" id="wsl_val_remark" ></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFive" aria-expanded="false"
                                aria-controls="flush-collapseFive">
                                行政處分
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingFive" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                            <div class="accordion-body">
                                <label for="wsl_psh_rate" class="col-form-label">處分次別</label>
                                <input id="wsl_psh_rate" name="wsl_psh_rate" type="text" class="form-control">
                                <label for="wsl_psh_name" class="col-form-label">受處分人 <span class='text-danger'>*</span></label>
                                <input id="wsl_psh_name" name="wsl_psh_name" type="text" class="form-control" >
                                <label for="wsl_psh_county" class="col-form-label">縣市(與基本資料相同)</label>
                                <input type="text" class="form-control" id="wsl_psh_county" name="wsl_psh_county" disabled value="雲林縣">
                                <label for="wsl_psh_town" class="col-form-label">鄉鎮市區(與基本資料相同)</label>  
                                <input type="text" class="form-control" id="wsl_psh_town" name="wsl_psh_town" disabled>
                                <label for="wsl_psh_area" class="col-form-label">違規面積(公頃)</label>
                                <div class="input-group ">
                                    <input type="number" step="0.0001" class="form-control" id="wsl_psh_area" name="wsl_psh_area" disabled>
                                    <span class="input-group-text" >公頃</span>
                                </div>

                                <label for="wsl_psh_date" class="col-form-label">處罰日期</label>
                                <div id="wsl_psh_date" class="input-group">
                                    <input type="date" class="form-control" name="wsl_psh_date" >
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsl_psh_num" class="col-form-label">處罰文號</label>
                                <input type="text" class="form-control" id="wsl_psh_num" name="wsl_psh_num">
                                <label for="wsl_psh_cost" class="col-form-label">罰鍰金額(元)</label>
                                <div class="input-group">
                                    <input id="wsl_psh_cost" type="number" step="1" class="form-control" name="wsl_psh_cost" value="0">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <label id="wsl_psh_end_date" for="wsl_psh_end_date" class="col-form-label">罰鍰完繳日期</label>
                                <div class="input-group">
                                    <input id="wsl_psh_end_date" type="date" class="form-control" name="wsl_psh_end_date">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label id="wsl_psh_deadline" for="wsl_psh_deadline" class="col-form-label">限期改正日期</label>
                                <div class="input-group">
                                    <input id="wsl_psh_deadline" type="date" class="form-control" name="wsl_psh_deadline" onchange="end(value)">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsl_psh_pre" class="col-form-label">預先通知限期改正日期</label>
                                <div class="input-group">
                                    <input id="wsl_psh_pre" type="date" class="form-control" name="wsl_psh_pre">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsl_psh_remark" class="col-form-label">備註</label>
                                <div class="input-group">
                                    <input id="wsl_psh_remark" type="text" class="form-control" name="wsl_psh_remark">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-secondary " href="wslimit.php"><i
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
    const undertakerSelect = document.getElementById("wsl_undertaker_select");

    undertakerSelect.addEventListener("change", function() {
        const selectedValue = undertakerSelect.value;
    });


    const wssPjSeatTown = document.getElementById("wss_pj_seat_town");
    const wslPjSeatTown = document.getElementById("wsl_pj_seat_town");
    const wslPshTown = document.getElementById("wsl_psh_town");

    wssPjSeatTown.addEventListener("change", function() {
        const selectedTown = wssPjSeatTown.value;

        wslPjSeatTown.value = selectedTown;
        wslPshTown.value = selectedTown;
    });

    const wslValArea = document.getElementById("wsl_val_area");
    const wslPshArea = document.getElementById("wsl_psh_area");

    wslValArea.addEventListener("change", function() {
        const areaCount = wslValArea.value;

        wslPshArea.value = areaCount;
    });


    var otherCropInput = document.getElementById("otherCrop");
    var otherCropRadio = document.getElementById("wsl_val_crop_5");

    if (otherCropRadio.checked) {
        otherCropInput.style.display = "block";
    }

    otherCropRadio.addEventListener("change", function () {
        if (otherCropRadio.checked) {
            otherCropInput.style.display = "block";
        } else {
            otherCropInput.style.display = "none";
        }
    });


    const selectElement = document.getElementById("wsl_pj_og");
    const otherOptionInput = document.getElementById("otherOptionInput");
    const wsl_pj_og_oth = document.getElementById("wsl_pj_og_oth");

    
    selectElement.addEventListener("change", function() {
        if (selectElement.value === "其他") {
            otherOptionInput.style.display = "block";
        } else {
            otherOptionInput.style.display = "none";
        }
    });

       // 土地
       var wsl_town = document.querySelector('#wss_pj_seat_town');
    var wsl_pj_seat_alley = document.querySelector('#wss_pj_seat_alley');
    var road = document.querySelector('#road');

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
            if (wsl_town.value == alleylist[i].area) {
                var select = (road.value == alleylist[i].value) ? 'selected' : '';
                str2 += '<option value="' + alleylist[i].value + '" ' + select + ' >' + alleylist[i].road + '</option>';
            }
        }
        
        wsl_pj_seat_alley.innerHTML = str2;
    }

    // 初始加载巷弄选项
    updateAlley();

    // 城市选择变更事件处理
    function handleTownChange(e) {
        updateAlley();

        // 更新其他相关字段的值，如果有的话
        var wsl_town = document.querySelector('#wsl_town');

        if (wsl_town) { 
            wsl_town.value = e.target.value;
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

    document.addEventListener("DOMContentLoaded", function() {
        var townSelect = document.getElementById("wss_pj_seat_town");
        townSelect.addEventListener("change", checkForDuplicates);
        
        
        var townData = document.getElementById("wsl_pj_seat_town");

        
        function checkForDuplicates() {
            var selectedTown = townSelect.value;
            
            townData.value = selectedTown;
            
        }


    });
    function end(val){
        date = new Date(val)
        rm_end = date.setDate(date.getDate()-10)
        rm_end_d = new Date(rm_end)

        wsv_psh_pre = convertDate(rm_end_d)
        document.getElementById('wsl_psh_pre').value = wsv_psh_pre; 
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