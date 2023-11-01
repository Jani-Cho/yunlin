<?php 
$pageTitle = "違規取締案件";
include "../functions.php";
include "../includes/header.php";

if(isset($_GET['pj_id'])){
    $the_pj_id = $_GET['pj_id'];
}

function convertToTwDate($ad_date) {
    $ad_date_obj = new DateTime($ad_date);
    $tw_year = $ad_date_obj->format('Y') - 1911;
    $tw_date = $tw_year . $ad_date_obj->format('-m-d');
    return $tw_date;
}
$query = "SELECT * FROM $WSViolate WHERE wsv_id = $the_pj_id";
$select_all_wsvimple_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_wsvimple_query)){

    $wsv_id = $row['wsv_id']; //序號
    $wsv_co_first_img_1 = $row['wsv_co_first_img_1']; 
    $wsv_co_first_img_2 = $row['wsv_co_first_img_2']; 
    $wsv_co_second_img_1 = $row['wsv_co_second_img_1']; 
    $wsv_co_second_img_2 = $row['wsv_co_second_img_2']; 
    $wsv_co_third_img_1 = $row['wsv_co_third_img_1']; 
    $wsv_co_third_img_2 = $row['wsv_co_third_img_2']; 

    // $wsv_name = $row['wsv_name']; //案件
    $wsv_num = $row['wsv_num']; //案件編號
    $wsv_county = $row['wsv_county']; //縣市
    $wsv_town = $row['wsv_town']; //鄉鎮市區
    $wsv_alley = $row['wsv_alley']; //鄉鎮市區

    $wsv_pj_date = $row['wsv_pj_date']; //查報日期
    if($wsv_pj_date == "1970-01-01"){
        $wsv_pj_date = "";
    }else{
        $wsv_pj_date = convertToTwDate($wsv_pj_date);
    }
    $wsv_undertaker = $row['wsv_undertaker']; //縣府查報人員
    $wsv_pj_invest_email = $row['wsv_pj_invest_email']; //人員email
    $wsv_vol_num = $row['wsv_vol_num']; //行為人身分證(或公司)統一編號
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
    }else{
        $wsv_co_first_date = convertToTwDate($wsv_co_first_date);
    }
    $wsv_co_second_date = $row['wsv_co_second_date']; //縣市政府第二次空拍日期
    if($wsv_co_second_date == "1970-01-01"){
        $wsv_co_second_date = "";
    }else{
        $wsv_co_second_date = convertToTwDate($wsv_co_second_date);
    }
    $wsv_co_third_date = $row['wsv_co_third_date']; //縣市政府第三次空拍日期
    if($wsv_co_third_date == "1970-01-01"){
        $wsv_co_third_date = "";
    }else{
        $wsv_co_third_date = convertToTwDate($wsv_co_third_date);
    }
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

    $wsv_vio_area = $row['wsv_vio_area']; //違規面積(公頃)
    $wsv_vio_item = $row['wsv_vio_item']; //主違規項目

    $wsv_vio_pdf = $row['wsv_vio_pdf']; //顧問公司彙整歷次空拍資料pdf

    $wsv_vio_live_photo = $row['wsv_vio_live_photo']; //現場檢查照片
    $wsv_vio_remark = $row['wsv_vio_remark']; //備註
    $wsv_psh_rate = $row['wsv_psh_rate']; //行政處分 處分次別
    $wsv_psh_name = $row['wsv_psh_name']; //受處分人
    $wsv_psh_date = $row['wsv_psh_date']; //處罰日期
    if($wsv_psh_date == "1970-01-01"){
        $wsv_psh_date = "";
    }else{
        $wsv_psh_date = convertToTwDate($wsv_psh_date);
    }
    $wsv_psh_num = $row['wsv_psh_num']; //處罰文號
    $wsv_psh_cost = $row['wsv_psh_cost']; //罰鍰金額(元)
    $wsv_psh_end_date = $row['wsv_psh_end_date']; //罰鍰完繳日期
    if($wsv_psh_end_date == "1970-01-01"){
        $wsv_psh_end_date = "";
    }else{
        $wsv_psh_end_date = convertToTwDate($wsv_psh_end_date);
    }
    $wsv_psh_deadline = $row['wsv_psh_deadline']; //限期改正日期
    if($wsv_psh_deadline == "1970-01-01"){
        $wsv_psh_deadline = "";
    }else{
        $wsv_psh_deadline = convertToTwDate($wsv_psh_deadline);
    }
    $wsv_psh_pre = $row['wsv_psh_pre']; //預先通知限期改正日期
    if($wsv_psh_pre == "1970-01-01"){
        $wsv_psh_pre = "";
    }else{
        $wsv_psh_pre = convertToTwDate($wsv_psh_pre);
    }
    $wsv_psh_remark = $row['wsv_psh_remark']; //備註
    $wsv_close = $row['wsv_close']; //結案進度
}

?>
<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <h1 class="h4 mb-4">違規取締案件</h1>
            </div>


            <div id="print-not" class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                <button class="btn btn-dark " onclick="window.print()" type="button"><i class="fas fa-file-export me-2"></i>匯出</button>
            </div>

            <table class="table table-striped">
                <tr>
                    <td>結案進度</td>
                    <td><?php
                                    if($wsv_close == "1"){
                                        echo  "<span class='badge rounded-pill bg-primary'>已結案</span>";
                                        $checked = "checked";
                                        $checked_f = "";
                                    }else{
                                        echo  "<span class='badge rounded-pill bg-secondary'>未結案</span>";
                                        $checked = "";
                                        $checked_f = "checked";
                                    }
                                ?></td>
                </tr>
                <tr>
                    <td>案件編號</td>
                    <td><?php echo $wsv_num;?></td>
                </tr>
                <tr>
                    <td class="col-4">地點</td>
                    <td><?php echo $wsv_county;?> <?php echo $wsv_town;?> <?php echo $wsv_alley;?></td>
                </tr>

                <tr>
                    <td>查(通)報日期</td>
                    <td><?php echo $wsv_pj_date;?></td>
                </tr>
                <tr>
                    <td>縣府查報人員 *</td>
                    <td><?php echo $wsv_undertaker;?></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><?php echo $wsv_pj_invest_email;?></td>
                </tr>
                <tr>
                    <td>行為人身分證(或公司)統一編號</td>
                    <td><?php echo $wsv_vol_num;?></td>
                </tr>
                <tr>
                    <td>行為人姓名</td>
                    <td><?php echo $wsv_vol_name;?></td>
                </tr>
                <tr>
                    <td>行為人電話</td>
                    <td><?php echo $wsv_vol_phone;?></td>
                </tr>
                <tr>
                    <td>行為人地址</td>
                    <td><?php echo $wsv_vol_addr;?></td>
                </tr>
                <tr>
                    <td>備註</td>
                    <td><?php echo $wsv_vol_remark;?></td>
                </tr>
                <tr>
                    <td>土地類別</td>
                    <td><?php echo $wsv_pj_type;?></td>
                </tr>
                <tr>
                    <td>土地面積(公頃)</td>
                    <td><?php echo $wsv_pj_area;?></td>
                </tr>
                <tr>
                    <td>縣市</td>
                    <td><?php echo $wsv_pj_county;?></td>
                </tr>
                <tr>
                    <td>鄉鎮市區</td>
                    <td><?php echo $wsv_pj_town;?></td>
                </tr>
                <tr>
                    <td>地段</td>
                    <td><?php echo $wsv_pj_lot;?></td>
                </tr>
                <tr>
                    <td>地號</td>
                    <td><?php echo $wsv_pj_num;?></td>
                </tr>
                <tr>
                    <td>備註</td>
                    <td><?php echo $wsv_pj_remark;?></td>
                </tr>
                <tr>
                    <td>縣市政府第一次空拍日期</td>
                    <td><?php echo $wsv_co_first_date;?></td>
                </tr>
                <tr>
                    <td>第一次空拍相關照片上傳</td>
                    <td>
                        <?php
                            if (!empty($wsv_co_first_img_1_array) && !in_array("", $wsv_co_first_img_1_array, true)) {
                                foreach ($wsv_co_first_img_1_array as $filename) {
                                    echo "<img src='../assets/imgs/$filename' class='figure-img img-fluid rounded' alt='$filename'>";
                                }
                            } 
                        ?>
                    </td>
                </tr>
               
                <tr>
                    <td>縣市政府第二次空拍日期</td>
                    <td><?php echo $wsv_co_second_date;?></td>
                </tr>
                <tr>
                    <td>第二次空拍相關照片上傳</td>
                    <td>
                        <?php
                            if (!empty($wsv_co_second_img_1_array) && !in_array("", $wsv_co_second_img_1_array, true)) {
                                foreach ($wsv_co_second_img_1_array as $filename) {
                                    echo "<img src='../assets/imgs/$filename' class='figure-img img-fluid rounded' alt='$filename'>";
                                }
                            } 
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td>縣市政府第三次空拍日期</td>
                    <td><?php echo $wsv_co_third_date;?></td>
                </tr>
                <tr>
                    <td>第三次空拍相關照片上傳</td>
                    <td>
                    <?php
                            if (!empty($wsv_co_third_img_1_array) && !in_array("", $wsv_co_third_img_1_array, true)) {
                                foreach ($wsv_co_third_img_1_array as $filename) {
                                    echo "<img src='../assets/imgs/$filename' class='figure-img img-fluid rounded' alt='$filename'>";
                                }
                            } 
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td>違規面積(公頃)</td>
                    <td><?php echo $wsv_vio_area;?></td>
                </tr>
                <tr>
                    <td>主違規項目</td>
                    <td><?php echo $wsv_vio_item;?></td>
                </tr>
                <tr>
                    <td>顧問公司彙整歷次空拍資料pdf</td>
                    <td>
                        <img src="<?php echo '../assets/imgs/'.$wsv_vio_pdf.''?>" class="figure-img img-fluid rounded" alt="<?php echo $wsv_vio_pdf?>" >
                    </td>
                </tr>
                <tr>
                    <td>現場檢查照片</td>
                    <td>
                        <?php
                        if (!empty($wsv_vio_live_photo_array) && !in_array("", $wsv_vio_live_photo_array, true)) {
                            foreach ($wsv_vio_live_photo_array as $filename) {
                                echo "<img src='../assets/imgs/$filename' class='figure-img img-fluid rounded' alt='$filename'>";

                            }
                        } 
                        
                          
                        ?>
                        
                    </td>
                </tr>
                <tr>
                    <td>備註</td>
                    <td><?php echo $wsv_vio_remark;?></td>
                </tr>
                <tr>
                    <td>行政處分 處分次別</td>
                    <td><?php echo $wsv_psh_rate;?></td>
                </tr>
                <tr>
                    <td>受處分人</td>
                    <td><?php echo $wsv_psh_name;?></td>
                </tr>
                <tr>
                    <td>處罰日期</td>
                    <td><?php echo $wsv_psh_date;?></td>
                </tr>
                <tr>
                    <td>處罰文號</td>
                    <td><?php echo $wsv_psh_num;?></td>
                </tr>
                <tr>
                    <td>罰鍰金額(元)</td>
                    <td><?php echo $wsv_psh_cost;?></td>
                </tr>
                <tr>
                    <td>罰鍰完繳日期</td>
                    <td><?php echo $wsv_psh_end_date;?></td>
                </tr>
                <tr>
                    <td>限期改正日期</td>
                    <td><?php echo $wsv_psh_deadline;?></td>
                </tr>
                <tr>
                    <td>預先通知限期改正日期</td>
                    <td><?php echo $wsv_psh_pre;?></td>
                </tr>
                <tr>
                    <td>備註</td>
                    <td><?php echo $wsv_psh_remark;?></td>
                </tr>
            </table>


        </div>
    </div>

</main>