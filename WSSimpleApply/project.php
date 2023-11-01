<?php 
$pageTitle = "簡易水保申請書";

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
$query = "SELECT * FROM $WSSimple WHERE wss_id = $the_pj_id";
$select_all_WSsimple_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_WSsimple_query)){
    $wss_de_date = $row['wss_de_date']; //申報日期
    if($wss_de_date == "1970-01-01"){
        $wss_de_date = "";
    }else{
        $wss_de_date = convertToTwDate($wss_de_date);
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

    $wss_pj_area = $row['wss_pj_area']; //計畫面積
    $wss_pj_seat_county = $row['wss_pj_seat_county']; //實施地點 土地座落 縣
    $wss_pj_seat_town = $row['wss_pj_seat_town']; //實施地點 土地座落 市鎮
    $wss_pj_seat_alley = $row['wss_pj_seat_alley']; //實施地點 土地座落 段
    $wss_pj_seat_no = $row['wss_pj_seat_no']; //實施地點 土地座落 號
    $wss_pj_seat_count = $row['wss_pj_seat_count']; //實施地點 土地座落 筆數
    $wss_pj_co = $row['wss_pj_co']; //土地座標
    $wss_pj_own = $row['wss_pj_own']; //土地權屬

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

    $wss_undertaker = $row['wss_undertaker']; //案件承辦人員
    $wss_apy_date = $row['wss_apy_date']; //申請日期
    if($wss_apy_date == "1970-01-01"){
        $wss_apy_date = "";
    }else{
        $wss_apy_date = convertToTwDate($wss_apy_date);
    }
    $wss_apy_tnum = $row['wss_apy_tnum']; //申請文號

    $wss_apv_date = $row['wss_apv_date']; //核准日期
    if($wss_apv_date == "1970-01-01"){
        $wss_apv_date = "";
    }else{
        $wss_apv_date = convertToTwDate($wss_apv_date);
    }

    $wss_apv_tnum = $row['wss_apv_tnum']; //核准文號

    $wss_st_date = $row['wss_st_date']; //應開工日期
    if($wss_st_date == "1970-01-01"){
        $wss_st_date = "";
    }else{
        $wss_st_date = convertToTwDate($wss_st_date);
    }

    $wss_rm_st_date = $row['wss_rm_st_date']; //提醒開工日期
    if($wss_rm_st_date == "1970-01-01"){
        $wss_rm_st_date = "";
    }else{
        $wss_rm_st_date = convertToTwDate($wss_rm_st_date);
    }

    $wss_ac_st_date = $row['wss_ac_st_date']; //實際開工日期
    if($wss_ac_st_date == "1970-01-01"){
        $wss_ac_st_date = "";
    }else{
        $wss_ac_st_date = convertToTwDate($wss_ac_st_date);
    }

    $wss_end_date = $row['wss_end_date']; //預定完工日期
    if($wss_end_date == "1970-01-01"){
        $wss_end_date = "";
    }else{
        $wss_end_date = convertToTwDate($wss_end_date);
    }

    $wss_rm_end_date = $row['wss_rm_end_date']; //提醒完工日期
    if($wss_rm_end_date == "1970-01-01"){
        $wss_rm_end_date = "";
    }else{
        $wss_rm_end_date = convertToTwDate($wss_rm_end_date);
    }

    $wss_ac_end_date = $row['wss_ac_end_date']; //實際完工日期
    if($wss_ac_end_date == "1970-01-01"){
        $wss_ac_end_date = "";
    }else{
        $wss_ac_end_date = convertToTwDate($wss_ac_end_date);
    }

    $wss_rm_crew = $row['wss_rm_crew']; //提醒通知人員
    $wss_close = $row['wss_close']; //結案進度
}

?>
<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <h1 class="h4 mb-4">簡易水保申請書</h1>
            </div>

            <div id="print-not" class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                <button class="btn btn-dark " onclick="window.print()" type="button"><i class="fas fa-file-export me-2"></i>匯出</button>
            </div>

            <table class="table table-striped">
                <tr>
                    <td>結案進度</td>
                    <td><?php
                                    if($wss_close == "1"){
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
                    <td><?php echo $wss_num;?></td>
                </tr>
                <tr>
                    <td class="col-4">申報日期</td>
                    <td><?php echo $wss_de_date;?></td>
                </tr>
                <tr>
                    <td>受理機關</td>
                    <td><?php echo $wss_agency;?></td>
                </tr>
                <tr>
                    <td>計畫名稱</td>
                    <td><?php echo $wss_name;?></td>
                </tr>
  
          
                <tr>
                    <td>開發種類</td>
                    <td><?php 
                    foreach($wss_de_typelist as $item) {
                        echo  "$item</br>";
                    }
                    ?></td>
                </tr>
                <tr>
                    <td>水土保持義務人</td>
                    <td><?php echo $wss_vol_name;?></td>
                </tr>
                <tr>
                    <td>國民身分證統一編號或營利事業統一編號</td>
                    <td><?php echo $wss_vol_num;?></td>
                </tr>
                <tr>
                    <td>電話</td>
                    <td><?php echo $wss_vol_phone;?></td>
                </tr>
                <tr>
                    <td>住居所或營業所</td>
                    <td><?php echo $wss_vol_addr;?></td>
                </tr>
                <tr>
                    <td>電子郵件</td>
                    <td><?php echo $wss_vol_email;?></td>
                </tr>
                <tr>
                    <td>計畫面積</td>
                    <td><?php echo $wss_pj_area;?></td>
                </tr>
                <tr>
                    <td>土地座落</td>
                    <td><?php echo $wss_pj_seat_county .$wss_pj_seat_town .$wss_pj_seat_alley .$wss_pj_seat_no .$wss_pj_seat_count;?></td>
                </tr>
                <tr>
                    <td>土地座標(TWD97) *</td>
                    <td><?php echo $wss_pj_co;?></td>
                </tr>
                <tr>
                    <td>土地權屬</td>
                    <td><?php echo $wss_pj_own;?></td>
                </tr>
                <tr>
                    <td>申請開發基地內土地無違規開發情形</td>
                    <td><?php echo $wss_check_item1;?></td>
                </tr>
                <tr>
                    <td>申請開發基地內土地無座落於特定水土保持區</td>
                    <td><?php echo $wss_check_item2;?></td>
                </tr>
                <tr>
                    <td>申請開發基地內土地無座落於國家公園範圍內</td>
                    <td><?php echo $wss_check_item3;?></td>
                </tr>
                <tr>
                    <td>申請開發基地內土地無座落於水庫集水區範圍內</td>
                    <td><?php echo $wss_check_item4;?></td>
                </tr>
                <tr>
                    <td>農業整坡作業公頃</td>
                    <td><?php echo $wss_sc_slope;?>公頃</td>
                </tr>
                <tr>
                    <td>修築農路</td>
                    <td>長度<?php echo $wss_sc_ag_road_lgth;?>公尺</td>
                </tr>
                <tr>
                    <td></td>
                    <td>路基寬度<?php echo $wss_sc_ag_road_wth;?>公尺</td>
                </tr>
                <tr>
                    <td>修建其他道路</td>
                    <td>路基寬度<?php echo $wss_sc_oth_road_wth;?>公尺</td>
                </tr>
                <tr>
                    <td></td>
                    <td>路基總面積<?php echo $wss_sc_oth_road_total;?>平方公尺</td>
                </tr>
                <tr>
                    <td>改善或維護既有道路</td>
                    <td>路基總面積<?php echo $wss_sc_exist_road_total;?>平方公尺</td>
                </tr>
                <tr>
                    <td>開發建築用地</td>
                    <td>建築面積<?php echo $wss_sc_arch_area;?>平方公尺</td>
                </tr>
                <tr>
                    <td></td>
                    <td>其他開挖整地面積<?php echo $wss_sc_arch_oth_area;?>平方公尺</td>
                </tr>
                <tr>
                    <td></td>
                    <td>合計<?php echo $wss_sc_arch_total;?>平方公尺</td>
                </tr>
                <tr>
                    <td>堆積土石</td>
                    <td><?php echo $wss_sc_accu;?>立方公尺</td>
                </tr>
                <tr>
                    <td>採取土石</td>
                    <td><?php echo $wss_sc_adopt;?>立方公尺</td>
                </tr>
                <tr>
                    <td>設置公園、墳墓、運動場地、原住民在原住民族地區依原住民族基本法第十九條規定採取礦物或其他開挖整地</td>
              
                    <td>開挖整地面積<?php echo $wss_sc_oth_type;?>平方公尺</td>
                </tr>
                <tr>
                    <td>農作產銷設施之農業生產設施、林業設施之林業經營設施或畜牧設施之養畜設施、養禽設施、孵化場(室)設施、青貯設施</td>
         
                    <td>建築面積<?php echo $wss_sc_faci_area;?>平方公尺</td>
                </tr>
                <tr>
                    <td>其他開挖整地面積</td>
                    <td><?php echo $wss_sc_faci_oth_area;?>平方公尺</td>
                </tr>
                <tr>
                    <td>合計</td>
                    <td><?php echo $wss_sc_faci_total;?>平方公尺</td>
                </tr>
                <tr>
                    <td>挖、填方總和</td>
                    <td><?php echo $wss_sc_sum;?>立方公尺</td>
                </tr>
                <tr>
                    <td>附款或注意事項</td>
                    <td><?php echo $wss_att_pre;?></td>
                </tr>
                <tr>
                    <td>案件承辦人員 *</td>
                    <td><?php echo $wss_undertaker;?></td>
                </tr>
                <tr>
                    <td>申請日期</td>
                    <td><?php echo $wss_apy_date;?></td>
                </tr>
                <tr>
                    <td>申請文號</td>
                    <td><?php echo $wss_apy_tnum;?></td>
                </tr>
                <tr>
                    <td>核准日期</td>
                    <td><?php echo $wss_apv_date;?></td>
                </tr>
                <tr>
                    <td>核准文號</td>
                    <td><?php echo $wss_apv_tnum;?></td>
                </tr>
                <tr>
                    <td>應開工日期</td>
                    <td><?php echo $wss_st_date;?></td>
                </tr>
                <tr>
                    <td>提醒開工日期</td>
                    <td><?php echo $wss_rm_st_date;?></td>
                </tr>
                <tr>
                    <td>實際開工日期</td>
                    <td><?php echo $wss_ac_st_date;?></td>
                </tr>
                <tr>
                    <td>預定完工日期</td>
                    <td><?php echo $wss_end_date;?></td>
                </tr>
                <tr>
                    <td>提醒完工日期</td>
                    <td><?php echo $wss_rm_end_date;?></td>
                </tr>
                <tr>
                    <td>實際完工日期</td>
                    <td><?php echo $wss_ac_end_date;?></td>
                </tr>
                <tr>
                    <td>提醒通知人員</td>
                    <td><?php echo $wss_rm_crew;?></td>
                </tr>
              
            </table>


        </div>
    </div>

</main>