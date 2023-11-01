<?php 
$pageTitle = "水土保持計畫案件";

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
$query = "SELECT * FROM $WSProject WHERE wsp_id = $the_pj_id";
$select_all_wspimple_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_wspimple_query)){

    $wsp_undertaker = $row['wsp_undertaker']; //案件承辦人員
    
    $wsp_vol_name = $row['wsp_vol_name']; //水土保持義務人名稱
    $wsp_vol_num = $row['wsp_vol_num']; //國民身分證統一編號或營利事業統一編號
    $wsp_vol_phone = $row['wsp_vol_phone']; //電話
    $wsp_vol_addr = $row['wsp_vol_addr']; //住居所或營業所
    $wsp_vol_email = $row['wsp_vol_email']; //電子郵件

    $wsp_name = $row['wsp_name']; //計畫名稱
    $wsp_num = $row['wsp_num']; //案件編號
    $wsp_pj_area = $row['wsp_pj_area']; //計畫面積
    $wsp_pj_seat_county = $row['wsp_pj_seat_county']; //實施地點 土地座落 縣
    $wsp_pj_seat_town = $row['wsp_pj_seat_town']; //實施地點 土地座落 市鎮
    $wsp_pj_seat_alley = $row['wsp_pj_seat_alley']; //實施地點 土地座落 段
    $wsp_pj_seat_no = $row['wsp_pj_seat_no']; //實施地點 土地座落 號
    $wsp_pj_seat_count = $row['wsp_pj_seat_count']; //實施地點 土地座落 筆數
    $wsp_pj_co = $row['wsp_pj_co']; //土地座標
    $wsp_pj_own = $row['wsp_pj_own']; //土地權屬

    $wsp_undertaker = $row['wsp_undertaker']; //案件承辦人員
    $wsp_apy_date = $row['wsp_apy_date']; //申請日期
    if($wsp_apy_date == "1970-01-01"){
        $wsp_apy_date = "";
    }else{
        $wsp_apy_date = convertToTwDate($wsp_apy_date);
    }
    $wsp_apy_tnum = $row['wsp_apy_tnum']; //申請文號

    $wsp_apv_date = $row['wsp_apv_date']; //核准日期
    if($wsp_apv_date == "1970-01-01"){
        $wsp_apv_date = "";
    }else{
        $wsp_apv_date = convertToTwDate($wsp_apv_date);
    }
    $wsp_apv_tnum = $row['wsp_apv_tnum']; //核准文號

    $wsp_st_date = $row['wsp_st_date']; //應開工日期
    if($wsp_st_date == "1970-01-01"){
        $wsp_st_date = "";
    }else{
        $wsp_st_date = convertToTwDate($wsp_st_date);
    }
    $wsp_rm_st_date = $row['wsp_rm_st_date']; //提醒開工日期
    if($wsp_rm_st_date == "1970-01-01"){
        $wsp_rm_st_date = "";
    }else{
        $wsp_rm_st_date = convertToTwDate($wsp_rm_st_date);
    }
    $wsp_ac_st_date = $row['wsp_ac_st_date']; //實際開工日期
    if($wsp_ac_st_date == "1970-01-01"){
        $wsp_ac_st_date = "";
    }else{
        $wsp_ac_st_date = convertToTwDate($wsp_ac_st_date);
    }
    $wsp_end_date = $row['wsp_end_date']; //預定完工日期
    if($wsp_end_date == "1970-01-01"){
        $wsp_end_date = "";
    }else{
        $wsp_end_date = convertToTwDate($wsp_end_date);
    }
    $wsp_rm_end_date = $row['wsp_rm_end_date']; //提醒完工日期
    if($wsp_rm_end_date == "1970-01-01"){
        $wsp_rm_end_date = "";
    }else{
        $wsp_rm_end_date = convertToTwDate($wsp_rm_end_date);
    }
    $wsp_ac_end_date = $row['wsp_ac_end_date']; //實際完工日期
    if($wsp_ac_end_date == "1970-01-01"){
        $wsp_ac_end_date = "";
    }else{
        $wsp_ac_end_date = convertToTwDate($wsp_ac_end_date);
    }
    $wsp_rm_crew = $row['wsp_rm_crew']; //提醒通知人員

    // 第一二次展延
    $wsp_apy_date1 = $row['wsp_apy_date1']; //申請日期
    if($wsp_apy_date1 == "1970-01-01"){
        $wsp_apy_date1 = "";
    }else{
        $wsp_apy_date1 = convertToTwDate($wsp_apy_date1);
    }
    $wsp_apy_date2 = $row['wsp_apy_date2']; //申請日期
    if($wsp_apy_date2 == "1970-01-01"){
        $wsp_apy_date2 = "";
    }else{
        $wsp_apy_date2 = convertToTwDate($wsp_apy_date2);
    }
    $wsp_apy_tnum1 = $row['wsp_apy_tnum1']; //申請文號
    $wsp_apy_tnum2 = $row['wsp_apy_tnum2']; //申請文號

    $wsp_apv_date1 = $row['wsp_apv_date1']; //核准日期
    if($wsp_apv_date1 == "1970-01-01"){
        $wsp_apv_date1 = "";
    }else{
        $wsp_apv_date1 = convertToTwDate($wsp_apv_date1);
    }
    $wsp_apv_date2 = $row['wsp_apv_date2']; //核准日期
    if($wsp_apv_date2 == "1970-01-01"){
        $wsp_apv_date2 = "";
    }else{
        $wsp_apv_date2 = convertToTwDate($wsp_apv_date2);
    }
    $wsp_apv_tnum1 = $row['wsp_apv_tnum1']; //核准文號
    $wsp_apv_tnum2 = $row['wsp_apv_tnum2']; //核准文號

    $wsp_ex_end_date1 = $row['wsp_ex_end_date1']; //展延完工日期
    if($wsp_ex_end_date1 == "1970-01-01"){
        $wsp_ex_end_date1 = "";
    }else{
        $wsp_ex_end_date1 = convertToTwDate($wsp_ex_end_date1);
    }
    $wsp_ex_end_date2 = $row['wsp_ex_end_date2']; //展延完工日期
    if($wsp_ex_end_date2 == "1970-01-01"){
        $wsp_ex_end_date2 = "";
    }else{
        $wsp_ex_end_date2 = convertToTwDate($wsp_ex_end_date2);
    }
    $wsp_rm_end_date1 = $row['wsp_rm_end_date1']; //提醒完工日期
    if($wsp_rm_end_date1 == "1970-01-01"){
        $wsp_rm_end_date1 = "";
    }else{
        $wsp_rm_end_date1 = convertToTwDate($wsp_rm_end_date1);
    }
    $wsp_rm_end_date2 = $row['wsp_rm_end_date2']; //提醒完工日期
    if($wsp_rm_end_date2 == "1970-01-01"){
        $wsp_rm_end_date2 = "";
    }else{
        $wsp_rm_end_date2 = convertToTwDate($wsp_rm_end_date2);
    }
    $wsp_close = $row['wsp_close']; //結案進度

}

?>
<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <h1 class="h4 mb-4">水土保持計畫案件</h1>
            </div>

            <div id="print-not" class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                <button class="btn btn-dark " onclick="window.print()" type="button"><i class="fas fa-file-export me-2"></i>匯出</button>
            </div>
            <div class="table-responsive">
                <h2 class="h5 mb-4">水土保持計畫案件內容</h2>

                <table class="table table-striped">
                    <tr>
                        <td>結案進度</td>
                        <td><?php
                                        if($wsp_close == "1"){
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
                        <td><?php echo $wsp_num;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">計畫名稱</td>
                        <td><?php echo $wsp_name;?></td>
                    </tr>
                    

                    <tr>
                        <td>水土保持義務人</td>
                        <td><?php echo $wsp_vol_name;?></td>
                    </tr>
                    <tr>
                        <td>國民身分證統一編號或營利事業統一編號</td>
                        <td><?php echo $wsp_vol_num;?></td>
                    </tr>
                    <tr>
                        <td>電話</td>
                        <td><?php echo $wsp_vol_phone;?></td>
                    </tr>
                    <tr>
                        <td>住居所或營業所</td>
                        <td><?php echo $wsp_vol_addr;?></td>
                    </tr>
                    <tr>
                        <td>電子郵件</td>
                        <td><?php echo $wsp_vol_email;?></td>
                    </tr>
                    <tr>
                        <td>計畫面積</td>
                        <td><?php echo $wsp_pj_area;?></td>
                    </tr>
                    <tr>
                        <td>土地座落</td>
                        <td><?php echo $wsp_pj_seat_county .$wsp_pj_seat_town .$wsp_pj_seat_alley .$wsp_pj_seat_no .$wsp_pj_seat_count;?></td>
                    </tr>
                    <tr>
                        <td>土地座標(TWD97) *</td>
                        <td><?php echo $wsp_pj_co;?></td>
                    </tr>
                    <tr>
                        <td>土地權屬</td>
                        <td><?php echo $wsp_pj_own;?></td>
                    </tr>
                    <tr>
                        <td>案件承辦人員 *</td>
                        <td><?php echo $wsp_undertaker;?></td>
                    </tr>
                    <tr>
                        <td>申請日期</td>
                        <td><?php echo $wsp_apy_date;?></td>
                    </tr>
                    <tr>
                        <td>申請文號</td>
                        <td><?php echo $wsp_apy_tnum;?></td>
                    </tr>
                    <tr>
                        <td>核准日期</td>
                        <td><?php echo $wsp_apv_date;?></td>
                    </tr>
                    <tr>
                        <td>核准文號</td>
                        <td><?php echo $wsp_apv_tnum;?></td>
                    </tr>
                    <tr>
                        <td>應開工日期</td>
                        <td><?php echo $wsp_st_date;?></td>
                    </tr>
                    <tr>
                        <td>提醒開工日期</td>
                        <td><?php echo $wsp_rm_st_date;?></td>
                    </tr>
                    <tr>
                        <td>實際開工日期</td>
                        <td><?php echo $wsp_ac_st_date;?></td>
                    </tr>
                    <tr>
                        <td>預定完工日期</td>
                        <td><?php echo $wsp_end_date;?></td>
                    </tr>
                    <tr>
                        <td>提醒完工日期</td>
                        <td><?php echo $wsp_rm_end_date;?></td>
                    </tr>
                    <tr>
                        <td>實際完工日期</td>
                        <td><?php echo $wsp_ac_end_date;?></td>
                    </tr>
                    <tr>
                        <td>提醒通知人員</td>
                        <td><?php echo $wsp_rm_crew;?></td>
                    </tr>
                
                </table>
            </div>
            <div class="table-responsive">
                <h2 class="h5 mb-4">第1次展延</h2>
                <table class="table table-striped">
                    <tr>
                        <td class="col-4">申請日期</td>
                        <td><?php echo $wsp_apy_date1;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">申請文號</td>
                        <td><?php echo $wsp_apy_tnum1;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">核准日期</td>
                        <td><?php echo $wsp_apv_date1;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">核准文號</td>
                        <td><?php echo $wsp_apv_tnum1;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">展延完工日期</td>
                        <td><?php echo $wsp_ex_end_date1;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">提醒完工日期</td>
                        <td><?php echo $wsp_rm_end_date1;?></td>
                    </tr>

                </table>
            </div>
            <div class="table-responsive">
                <h2 class="h5 mb-4">第2次展延</h2>
                <table class="table table-striped">
                    <tr>
                        <td class="col-4">申請日期</td>
                        <td><?php echo $wsp_apy_date2;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">申請文號</td>
                        <td><?php echo $wsp_apy_tnum2;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">核准日期</td>
                        <td><?php echo $wsp_apv_date2;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">核准文號</td>
                        <td><?php echo $wsp_apv_tnum2;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">展延完工日期</td>
                        <td><?php echo $wsp_ex_end_date2;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">提醒完工日期</td>
                        <td><?php echo $wsp_rm_end_date2;?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>

</main>