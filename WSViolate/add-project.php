<?php 
if(isset($_POST['add_project'])){
    // $wsv_name = $_POST['wsv_name']; //案件
    $wsv_num = $_POST['wsv_num']; //案件編號

    
    $wsv_county = $_POST['wsv_county']; //縣市
    $wsv_town = $_POST['wsv_town']; //鄉鎮市區
    $wsv_alley = $_POST['wsv_alley']; //路段

    $wsv_pj_date = date('Y-m-d', strtotime($_POST['wsv_pj_date'])); //查報日期
    $wsv_undertaker = $_POST['wsv_undertaker']; //縣府查報人員
    $wsv_pj_invest_email = $_POST['wsv_pj_invest_email']; //人員email

    $wsv_vol_num = $_POST['wsv_vol_num']; //身分證(或公司)統一編號
    $wsv_vol_name = $_POST['wsv_vol_name']; //行為人姓名
    $wsv_vol_phone = $_POST['wsv_vol_phone']; //行為人電話
    $wsv_vol_addr = $_POST['wsv_vol_addr']; //行為人地址
    $wsv_vol_remark = $_POST['wsv_vol_remark']; //備註

    $wsv_pj_type = $_POST['wsv_pj_type']; //土地類別
    $wsv_pj_area = $_POST['wsv_pj_area']; //土地面積(公頃)
    // $wsv_pj_county = $_POST['wsv_pj_county']; //縣市
    // $wsv_pj_town = $_POST['wsv_pj_town']; //鄉鎮市區
    // $wsv_pj_lot = $_POST['wsv_pj_lot']; //地段
    $wsv_pj_num = $_POST['wsv_pj_num']; //地號
    $wsv_pj_remark = $_POST['wsv_pj_remark']; //備註

    
    $wsv_pj_co = $_POST['wsv_pj_co']; //座標資料
    $wsv_co_first_date = date('Y-m-d', strtotime($_POST['wsv_co_first_date'])); //縣市政府第一次空拍日期
   
    //縣市政府第一次空拍日期照片
    $uploaded_wsv_co_first_img_1 = $_FILES['wsv_co_first_img_1'];
        
    $timestamped_wsv_co_first_img_1 = []; 
    if (!empty($uploaded_wsv_co_first_img_1['name'][0])) {

        foreach ($uploaded_wsv_co_first_img_1['name'] as $key => $filename) {
            $temp_file_wsv_co_first_img_1 = $uploaded_wsv_co_first_img_1['tmp_name'][$key];
            $timestamp = time();
            $timestamped_filename_wsv_co_first_img_1 = 'wsv_' . $timestamp . '_' . $filename;
            
            move_uploaded_file($temp_file_wsv_co_first_img_1, "./assets/imgs/$timestamped_filename_wsv_co_first_img_1");

            $timestamped_wsv_co_first_img_1[] = $timestamped_filename_wsv_co_first_img_1;
        }
    }
    $timestamped_wsv_co_first_img_1_string = implode(',', $timestamped_wsv_co_first_img_1);

    
    
    $wsv_co_second_date = date('Y-m-d', strtotime($_POST['wsv_co_second_date'])); //縣市政府第二次空拍日期

    //縣市政府第二次空拍日期照片

    $uploaded_wsv_co_second_img_1 = $_FILES['wsv_co_second_img_1'];
        
    $timestamped_wsv_co_second_img_1 = []; 
    if (!empty($uploaded_wsv_co_second_img_1['name'][0])) {

        foreach ($uploaded_wsv_co_second_img_1['name'] as $key => $filename) {
            $temp_file_wsv_co_second_img_1 = $uploaded_wsv_co_second_img_1['tmp_name'][$key];
            $timestamp = time();
            $timestamped_filename_wsv_co_second_img_1 = 'wsv_' . $timestamp . '_' . $filename;
            
            move_uploaded_file($temp_file_wsv_co_second_img_1, "./assets/imgs/$timestamped_filename_wsv_co_second_img_1");

            $timestamped_wsv_co_second_img_1[] = $timestamped_filename_wsv_co_second_img_1;
        }
    }
    $timestamped_wsv_co_second_img_1_string = implode(',', $timestamped_wsv_co_second_img_1);

    
    $wsv_co_third_date = date('Y-m-d', strtotime($_POST['wsv_co_third_date'])); //縣市政府第三次空拍日期
    
    //縣市政府第三次空拍日期照片

    $uploaded_wsv_co_third_img_1 = $_FILES['wsv_co_third_img_1'];
        
    $timestamped_wsv_co_third_img_1 = []; 

    if (!empty($uploaded_wsv_co_third_img_1['name'][0])) {

        foreach ($uploaded_wsv_co_third_img_1['name'] as $key => $filename) {
            $temp_file_wsv_co_third_img_1 = $uploaded_wsv_co_third_img_1['tmp_name'][$key];
            $timestamp = time();
            $timestamped_filename_wsv_co_third_img_1 = 'wsv_' . $timestamp . '_' . $filename;
            
            move_uploaded_file($temp_file_wsv_co_third_img_1, "./assets/imgs/$timestamped_filename_wsv_co_third_img_1");

            $timestamped_wsv_co_third_img_1[] = $timestamped_filename_wsv_co_third_img_1;
        }
    }
    $timestamped_wsv_co_third_img_1_string = implode(',', $timestamped_wsv_co_third_img_1);



    $wsv_vio_area = $_POST['wsv_vio_area']; //違規面積(公頃)
    $wsv_vio_item = $_POST['wsv_vio_item']; //主違規項目

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
           $timestamped_filename_pdf = 'wsl_' . $timestamp . '_' . $filename;
   
           move_uploaded_file($temp_file_pdf, "./assets/imgs/$timestamped_filename_pdf");
   
           $timestamped_filenames_pdf[] = $timestamped_filename_pdf;
       }
   }
   $timestamped_filename_pdf_string = implode(',', $timestamped_filenames_pdf);


    //現場檢查照片
    $uploaded_files = $_FILES['wsv_vio_live_photo'];

    $timestamped_filenames = []; 
    if (!empty($uploaded_files['name'][0])) {

        foreach ($uploaded_files['name'] as $key => $filename) {
            $temp_file = $uploaded_files['tmp_name'][$key];
            $timestamp = time();
            $timestamped_filename = 'wsl_' . $timestamp . '_' . $filename;
            
            move_uploaded_file($temp_file, "./assets/imgs/$timestamped_filename");

            $timestamped_filenames[] = $timestamped_filename;
        }
    }

    $timestamped_filenames_string = implode(',', $timestamped_filenames);



    $wsv_vio_remark = $_POST['wsv_vio_remark']; //備註

    $wsv_psh_rate = $_POST['wsv_psh_rate']; //行政處分 處分次別


    $wsv_psh_name = $_POST['wsv_psh_name']; //受處分人
    $wsv_psh_date = date('Y-m-d', strtotime($_POST['wsv_psh_date'])); //處罰日期

    $wsv_psh_num = $_POST['wsv_psh_num']; //處罰文號

    $wsv_psh_cost = $_POST['wsv_psh_cost']; //罰鍰金額(元)

    $wsv_psh_end_date = date('Y-m-d', strtotime($_POST['wsv_psh_end_date'])); //罰鍰完繳日期

    $wsv_psh_deadline = date('Y-m-d', strtotime($_POST['wsv_psh_deadline'])); //限期改正日期
    $wsv_psh_pre = date('Y-m-d', strtotime($_POST['wsv_psh_pre'])); //預先通知限期改正日期
    $wsv_psh_remark = $_POST['wsv_psh_remark']; //備註
  
    $wsv_close = $_POST['wsv_close']; //結案進度

    $query = "INSERT INTO $WSViolate(wsv_num, wsv_co_first_img_1, wsv_co_second_img_1, wsv_co_third_img_1, wsv_county, wsv_town, wsv_alley, wsv_pj_date, wsv_undertaker, wsv_pj_invest_email, wsv_vol_num, wsv_vol_name, wsv_vol_phone, wsv_vol_addr, wsv_vol_remark, wsv_pj_type, wsv_pj_area, wsv_pj_num, wsv_pj_remark, wsv_pj_co, wsv_co_first_date, wsv_co_second_date, wsv_co_third_date, wsv_vio_area, wsv_vio_item, wsv_vio_pdf, wsv_vio_live_photo, wsv_vio_remark, wsv_psh_rate, wsv_psh_name, wsv_psh_date, wsv_psh_num, wsv_psh_cost, wsv_psh_end_date, wsv_psh_deadline, wsv_psh_pre, wsv_psh_remark, wsv_close )";
    $query .=
    "VALUES('{$wsv_num}', '{$timestamped_wsv_co_first_img_1_string}', '{$timestamped_wsv_co_second_img_1_string}', '{$timestamped_wsv_co_third_img_1_string}', '{$wsv_county}', '{$wsv_town}', '{$wsv_alley}', '{$wsv_pj_date}', '{$wsv_undertaker}', '{$wsv_pj_invest_email}', '{$wsv_vol_num}', '{$wsv_vol_name}', '{$wsv_vol_phone}', '{$wsv_vol_addr}', '{$wsv_vol_remark}', '{$wsv_pj_type}', '{$wsv_pj_area}', '{$wsv_pj_num}', '{$wsv_pj_remark}', '{$wsv_pj_co}', '{$wsv_co_first_date}', '{$wsv_co_second_date}', '{$wsv_co_third_date}', '{$wsv_vio_area}', '{$wsv_vio_item}', '{$timestamped_filename_pdf_string}', '{$timestamped_filenames_string}', '{$wsv_vio_remark}', '{$wsv_psh_rate}', '{$wsv_psh_name}', '{$wsv_psh_date}', '{$wsv_psh_num}', '{$wsv_psh_cost}', '{$wsv_psh_end_date}', '{$wsv_psh_deadline}', '{$wsv_psh_pre}', '{$wsv_psh_remark}', '{$wsv_close}')";
    
    
    $WS_add_project = mysqli_query($connection, $query);

    comfirmQuery($WS_add_project, '新增成功', null);
}
?>

<main>
    <div class="container-fluid p-4">
        <div class="_POST">
            <div class="col-12">
                <h1 class="h4 mb-4">新增 違規取締表單</h1>
            </div>
            <form enctype="multipart/form-data" method="POST" action="">
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
                                <input id="wsv_num" name="wsv_num" type="text" class="form-control"> 
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
                                                
                                                echo "<option value='$value'  >$area</option>";
                                            }
                                        ?>
                                    </select>

                                    <select class="form-select" id="wss_pj_seat_alley" name="wsv_alley">
                                        <option value="" selected>請選擇</option>
                                    </select>
                                </div>
                                <label for="wsv_pj_date" class="col-form-label">查(通)報日期</label>
                                <input id="wsv_pj_date" type="date" class="form-control" name="wsv_pj_date" >
                         
                                <label for="wsv_undertaker" class="col-form-label">縣府查報人員 <span class='text-danger'>*</span></label>
                                <input id="wsv_undertaker" name="wsv_undertaker" type="text" class="form-control" >
                                <label for="wsv_pj_invest_email" class="col-form-label">email <span class='text-danger'>*</span></label>
                                <input id="wsv_pj_invest_email" name="wsv_pj_invest_email" type="email" class="form-control" >   
                                <label for="wsp_rm_crew" class="col-sm-2 col-form-label">案件進度</label>
                                    <div class="input-group ">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsv_close" id="wsv_closed"  value="1">
                                        <label class="form-check-label" for="wsv_closed">已結案</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wsv_close" id="wsv_unclose"  value="0" checked>
                                        <label class="form-check-label" for="wsv_unclose">辦理中</label>

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
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                行為人資料
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingTwo" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                                <?php
                                    $vol = '[{"title_cn":"身分證(或公司)統一編號","title_en":"wsv_vol_num","type":"text","required":"false"},
                                    {"title_cn":"姓名","title_en":"wsv_vol_name","type":"text","required":"false"},
                                    {"title_cn":"電話","title_en":"wsv_vol_phone","type":"text","required":"false"},
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
                                土地資料
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingThree" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                                <label for="wsv_pj_type" class="col-form-label">土地類別</label>
                                <select class="form-select" id="wsv_pj_type" name="wsv_pj_type">
                                    <option value="地籍資料" selected>地籍資料</option>
                                    <option value="林班資料" selected>林班資料</option>
                                </select>
                                <label for="wsv_pj_area" class="col-form-label">土地面積(公頃)</label>
                                <div class="input-group ">
                                    <input type="number" step="0.0001" class="form-control" name="wsv_pj_area" value="0.0000">
                                    <span class="input-group-text" >公頃</span>
                                </div>
                                <label for="wsv_pj_county" class="col-form-label">縣市(與基本資料相同)</label>
                                <input type="text" class="form-control" id="wsv_pj_county" name="wsv_pj_county" disabled value="雲林縣">
                             
                                <label for="wsv_pj_town" class="col-form-label">鄉鎮市區(與基本資料相同)</label>  
                                <input type="text" class="form-control" id="wsv_pj_town" name="wsv_pj_town" disabled value="">
                             
                                <label for="wsv_pj_lot" class="col-form-label">地段(與基本資料相同)</label>
                                <input type="text" class="form-control" id="wsv_pj_lot" name="wsv_pj_lot" disabled value="">

                                <label for="wsv_pj_num" class="col-form-label">地號</label>
                                <input type="text" class="form-control" name="wsv_pj_num">
                                <label for="wsv_pj_remark" class="col-form-label">備註</label>
                                <input type="text" class="form-control" name="wsv_pj_remark">
            
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
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingFour" data-bs-parent="#maincontent">
                            <div class="accordion-body">
                                <label for="latlng" class="col-form-label">土地座標 (TWD97) <span class='text-danger'>*</span></label>
                                <div class="input-group mb-2">
                                    <input id="latlng" type="text" class="form-control" name="wsv_pj_co" data-lat="23.6743232" data-lng="120.4345919" value="">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <div id="map" style="width: 100%; height: 60vh;"></div>
                                
                                <label for="" class="col-form-label">縣市政府查證結果：</label>
                                <input type="text" class="form-control" id="" name="" >

                                <label for="wsv_co_first_date" class="col-form-label">縣市政府第1次空拍日期</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="wsv_co_first_date" name="wsv_co_first_date" >
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <div class="row mb-4">
                                    <div>
                                        <label for="wsv_co_first_img_1" class="col-form-label">第一次空拍相關照片上傳-1</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="wsv_co_first_img_1" name="wsv_co_first_img_1[]" multiple accept="image/*">
                                            <span class="input-group-text" ><i class="fas fa-image"></i></span>
                                        </div>
                                    </div>

                                </div>
                                <label for="wsv_co_second_date" class="col-form-label">縣市政府第2次空拍日期</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="wsv_co_second_date" name="wsv_co_second_date" >
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <div class="row mb-4">
                                    <div >
                                        <label for="wsv_co_second_img_1" class="col-form-label">第二次空拍相關照片上傳-1</label>
                                        <div class="input-group">
                                        <input type="file" class="form-control" id="wsv_co_second_img_1" name="wsv_co_second_img_1[]" multiple accept="image/*">
                                            <span class="input-group-text" ><i class="fas fa-image"></i></span>
                                        </div>
                                    </div>
                                    
                                </div>

                                <label for="wsv_co_third_date" class="col-form-label">縣市政府第3次空拍日期</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="wsv_co_third_date" name="wsv_co_third_date" >
                                    <span class="input-group-text" ><i class="fas fa-calendar"></i></span>
                                </div>
                                <div class="row mb-4">
                                    <div>
                                        <label for="wsv_co_third_img_1" class="col-form-label">第三次空拍相關照片上傳-1</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="wsv_co_third_img_1" name="wsv_co_third_img_1[]" multiple accept="image/*">
                                            <span class="input-group-text" ><i class="fas fa-image"></i></span>
                                        </div>
                                    
                                    </div>
                                </div>
                                <label for="wsv_vio_area" class="col-form-label">違規面積(公頃) <span class='text-danger'>*</span></label>
                                <div class="input-group ">
                                    <input type="number" step="0.0001" class="form-control" id="wsv_vio_area" name="wsv_vio_area" value="" >
                                    <span class="input-group-text" >公頃</span>
                                </div>
                                <label for="wsv_vio_item" class="col-form-label">主違規項目 <span class='text-danger'>*</span></label>
                                <select class="form-select" id="wsv_vio_item" name="wsv_vio_item" >
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
                                <label for="wsv_vio_pdf" class="col-form-label">顧問公司彙整歷次空拍資料pdf</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="wsv_vio_pdf" name="wsv_vio_pdf[]" multiple accept="application/pdf">
                                    <span class="input-group-text" ><i class="fas fa-image"></i></span>
                                </div>
                                <label for="wsv_vio_live_photo" class="col-form-label">現場檢查照片</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="wsv_vio_live_photo" name="wsv_vio_live_photo[]" multiple accept="image/*">
                                    <span class="input-group-text" ><i class="fas fa-image"></i></span>
                                </div>
                                <label for="wsv_vio_remark" class="col-form-label">備註</label>
                                <input type="text" class="form-control" name="wsv_vio_remark">

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
                                <input id="wsv_psh_rate" name="wsv_psh_rate" type="text" class="form-control">
                                <label for="wsv_psh_name" class="col-form-label">受處分人 <span class='text-danger'>*</span></label>
                                <input id="wsv_psh_name" name="wsv_psh_name" type="text" class="form-control" >
                                <label for="wsv_psh_county" class="col-form-label">縣市(與基本資料相同)</label>
                                <input type="text" class="form-control" id="wsv_psh_county" name="wsv_psh_county" disabled value="雲林縣">
                                <label for="wsv_psh_town" class="col-form-label">鄉鎮市區(與基本資料相同)</label>  
                                <input type="text" class="form-control" id="wsv_psh_town" name="wsv_psh_town" disabled value="">
                                <label for="wsv_psh_area" class="col-form-label">違規面積(公頃)</label>
                                <div class="input-group ">
                                    <input type="number" step="0.0001" class="form-control" id="wsv_psh_area" name="wsv_psh_area" disabled value="0.0000">
                                    <span class="input-group-text" >公頃</span>
                                </div>

                                <label for="wsv_psh_date" class="col-form-label">處罰日期</label>
                                <div id="wsv_psh_date" class="input-group">
                                    <input type="date" class="form-control" name="wsv_psh_date" >
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsv_psh_num" class="col-form-label">處罰文號</label>
                                <input type="text" class="form-control" id="wsv_psh_num" name="wsv_psh_num">
                                <label for="wsv_psh_cost" class="col-form-label">罰鍰金額(元)</label>
                                <div class="input-group">
                                    <input id="wsv_psh_cost" type="number" step="1" class="form-control" name="wsv_psh_cost" value="0">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <label id="wsv_psh_end_date" for="wsv_psh_end_date" class="col-form-label">罰鍰完繳日期</label>
                                <div class="input-group">
                                    <input id="wsv_psh_end_date" type="date" class="form-control" name="wsv_psh_end_date">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label id="wsv_psh_deadline" for="wsv_psh_deadline" class="col-form-label">限期改正日期</label>
                                <div class="input-group">
                                    <input id="wsv_psh_deadline" type="date" class="form-control" name="wsv_psh_deadline" onchange="end(value)">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsv_psh_pre" class="col-form-label">預先通知限期改正日期</label>
                                <div class="input-group">
                                    <input id="wsv_psh_pre" type="date" class="form-control" name="wsv_psh_pre">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="wsv_psh_remark" class="col-form-label">備註</label>
                                <div class="input-group">
                                    <input id="wsv_psh_remark" type="text" class="form-control" name="wsv_psh_remark">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> 

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-secondary " href="wsvroject.php"><i
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