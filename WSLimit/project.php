<?php 
$pageTitle = "超限利用表單";

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
$query = "SELECT * FROM wslimit WHERE wsl_id = $the_pj_id";
$select_all_wslimple_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_wslimple_query)){

    
    
    $wsl_id = $row['wsl_id']; //序號

    $wsl_undertaker = $row['wsl_undertaker']; //承辦人
    $wsl_cats = $row['wsl_cats']; //案件類別
    
    $wsl_source = $row['wsl_source']; //查報主資訊來源
    
    $wsl_county = $row['wsl_county']; //實施地點 土地座落 縣
    $wsl_town = $row['wsl_town']; //鄉市
    // $wsl_alley = $row['wsl_alley']; //路段
    
    $wsl_unit = $row['wsl_unit']; //案件移來單位
    $wsl_apy_date = $row['wsl_apy_date']; //查(通)報日期
    if($wsl_apy_date == "1970-01-01"){
        $wsl_apy_date = "";
    }else{
        $wsl_apy_date= convertToTwDate($wsl_apy_date);
    }
    $wsl_apy_num = $row['wsl_apy_num']; //查(通)報文號
    $wsl_sent_date = $row['wsl_sent_date']; //農村發展及水土保持署函送日期
    if($wsl_sent_date == "1970-01-01"){
        $wsl_sent_date = "";
    }else{
        $wsl_sent_date = convertToTwDate($wsl_sent_date);
    }
    $wsl_sent_num = $row['wsl_sent_num']; //農村發展及水土保持署函送文號
    
    $wsl_acp_date = $row['wsl_acp_date']; //縣市政府收文日期
    if($wsl_acp_date == "1970-01-01"){
        $wsl_acp_date = "";
    }else{
        $wsl_acp_date= convertToTwDate($wsl_acp_date);
    }
    $wsl_acp_num = $row['wsl_acp_num']; //縣市政府收文文號

    $wsl_type = $row['wsl_type']; //土地編定類別
    $wsl_area = $row['wsl_area']; //水庫集水區流域

    $wsl_p_type = $row['wsl_p_type']; //土地種類
    $wsl_p_dcp = $row['wsl_p_dcp']; //現場位置描述
    $wsl_p_sta = $row['wsl_p_sta']; //現場狀況
    
    $wsl_reason = $row['wsl_reason']; //清查原因
    $wsl_reason_oth = $row['wsl_reason_oth']; //清查原因

    $wsl_if_ocase = $row['wsl_if_ocase']; //是否為原民課案件
    
    $wsl_if = $row['wsl_if']; //是否為
    $wsl_if_list = explode(", ",$wsl_if);

    $wsl_vol_num = $row['wsl_vol_num']; //身分證(或公司)統一編號
    $wsl_vol_name = $row['wsl_vol_name']; //姓名
    $wsl_vol_phone = $row['wsl_vol_phone']; //電話
    $wsl_vol_addr = $row['wsl_vol_addr']; //地址
    $wsl_remark = $row['wsl_remark']; //備註

    $wsl_vol = [$wsl_vol_num, $wsl_vol_name, $wsl_vol_phone, $wsl_vol_addr];


    $wsl_pj_cats = $row['wsl_pj_cats']; //土地類別
    $wsl_pj_no = $row['wsl_pj_no']; //土地資料編號
    $wsl_pj_own = $row['wsl_pj_own']; //土地權屬
    $wsl_pj_og = $row['wsl_pj_og']; //公有土地管理機關
    $wsl_pj_og_oth = $row['wsl_pj_og_oth']; //公有土地管理機關
    
    $wsl_pj_area = $row['wsl_pj_area']; //土地面積(公頃)

    // $wsl_pj_seat_county = $row['wsl_pj_seat_county']; //縣市
    // $wsl_pj_seat_town = $row['wsl_pj_seat_town']; //鄉鎮市區
    $wsl_pj_seat_alley = $row['wsl_pj_seat_alley']; //地段
    $wsl_pj_seat_no = $row['wsl_pj_seat_no']; //地號
    $wsl_pj_remark = $row['wsl_pj_remark']; //備註

    $wsl_pj_co = $row['wsl_pj_co']; //坐標資料(TWD97)
    $wsl_ch_date = $row['wsl_ch_date']; //縣市政府查復日期：
    if($wsl_ch_date == "1970-01-01"){
        $wsl_ch_date = "";
    }else{
        $wsl_ch_date = convertToTwDate($wsl_ch_date);
    }
    $wsl_ch_result = $row['wsl_ch_result']; //縣市政府查證結果
    
    $wsl_vl_type = $row['wsl_vl_type']; //違規法律類別
    
    $wsl_val_type = $row['wsl_val_type']; //違規行政法別
    $wsl_val_cost = $row['wsl_val_cost']; //違反行政法已罰鍰金額：
    $wsl_val_area = $row['wsl_val_area']; //*違規面積(公頃)
    $wsl_val_item = $row['wsl_val_item']; //主違規項目
    $wsl_val_crop = $row['wsl_val_crop']; //現況作物
    $wsl_val_crop_oth = $row['wsl_val_crop_oth']; //現況作物
    
    $wsl_pu_date = $row['wsl_pu_date']; //處分日期
    if($wsl_pu_date == "1970-01-01"){
        $wsl_pu_date = "";
    }else{
        $wsl_pu_date = convertToTwDate($wsl_pu_date);
    }
    $wsl_val_ph = $row['wsl_val_ph']; //行政程序處理紀要
    $wsl_val_ph_item = $row['wsl_val_ph_item']; //主違規項目
    $wsl_val_img = $row['wsl_val_img']; //現場檢查照片
    $wsl_val_img_array = explode(",", $wsl_val_img);

    $wsl_val_remark = $row['wsl_val_remark']; //備註(現場查證狀況描述)
    
    
    $wsl_psh_rate = $row['wsl_psh_rate']; //處分次別
    $wsl_psh_name = $row['wsl_psh_name']; //受處分人
    $wsl_psh_county = $row['wsl_psh_county']; //縣市
    
    $wsl_psh_town = $row['wsl_psh_town']; //鄉鎮市區
    
    $wsl_psh_area = $row['wsl_psh_area']; //違規面積(公頃)
    
    $wsl_psh_date = $row['wsl_psh_date']; //處罰日期
    if($wsl_psh_date == "1970-01-01"){
        $wsl_psh_date = "";
    }else{
        $wsl_psh_date= convertToTwDate($wsl_psh_date);
    }
    $wsl_psh_num = $row['wsl_psh_num']; //處罰文號
    $wsl_psh_cost = $row['wsl_psh_cost']; //罰鍰金額(元)
    $wsl_psh_end_date = $row['wsl_psh_end_date']; //罰鍰完繳日期
    if($wsl_psh_end_date == "1970-01-01"){
        $wsl_psh_end_date = "";
    }else{
        $wsl_psh_end_date = convertToTwDate($wsl_psh_end_date);
    }
    $wsl_psh_deadline = $row['wsl_psh_deadline']; //限期改正日期
    if($wsl_psh_deadline == "1970-01-01"){
        $wsl_psh_deadline = "";
    }else{
        $wsl_psh_deadline = convertToTwDate($wsl_psh_deadline);
    }
    $wsl_psh_pre = $row['wsl_psh_pre']; //預先通知限期改正日期
    if($wsl_psh_pre == "1970-01-01"){
        $wsl_psh_pre = "";
    }else{
        $wsl_psh_pre = convertToTwDate($wsl_psh_pre);
    }
    $wsl_psh_remark = $row['wsl_psh_remark']; //備註
    

    $wsl_close = $row['wsl_close']; //結案與否

}

?>
<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <h1 class="h4 mb-4">超限利用表單</h1>
            </div>

            <div id="print-not" class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                <button class="btn btn-dark " onclick="window.print()" type="button"><i class="fas fa-file-export me-2"></i>匯出</button>
            </div>
            <div class="table-responsive">
                <h2 class="h5 mb-4">超限利用案件內容</h2>

                <table class="table table-striped">
                    <tr>
                        <td class="col-4">結案進度</td>
                        <td><?php
                                        if($wsl_close == "1"){
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
                        <td class="col-4">承辦人</td>
                        <td><?php echo $wsl_undertaker;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">案件類別</td>
                        <td><?php echo $wsl_cats;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">查報主資訊來源</td>
                        <td><?php echo $wsl_source;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">實施地點</td>
                        <td><?php echo $wsl_county;?><?php echo $wsl_town;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">案件移來單位</td>
                        <td><?php echo $wsl_unit;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">查(通)報日期</td>
                        <td><?php echo $wsl_apy_date;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">查(通)報文號</td>
                        <td><?php echo $wsl_apy_num;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">農村發展及水土保持署函送日期</td>
                        <td><?php echo $wsl_sent_date;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">農村發展及水土保持署函送文號</td>
                        <td><?php echo $wsl_sent_num;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">縣市政府收文日期</td>
                        <td><?php echo $wsl_acp_date;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">縣市政府收文文號</td>
                        <td><?php echo $wsl_acp_num;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">土地編定類別</td>
                        <td><?php echo $wsl_type;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">水庫集水區流域</td>
                        <td><?php echo $wsl_area;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">土地種類</td>
                        <td><?php echo $wsl_p_type;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">現場位置描述</td>
                        <td><?php echo $wsl_p_dcp;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">現場狀況</td>
                        <td><?php echo $wsl_p_sta;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">清查原因</td>
                        <td><?php echo $wsl_reason;?> <?php echo $wsl_reason_oth;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">是否為原民課案件</td>
                        <td><?php echo $wsl_if_ocase;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">是否為</td>
                        <td><?php echo $wsl_if;?></td>
                    </tr>
                </table>
            </div>
            <div class="table-responsive">
                <h2 class="h5 mb-4">行為人資料</h2>
                <table class="table table-striped">
                    <tr>
                        <td class="col-4">身分證(或公司)統一編號</td>
                        <td><?php echo $wsl_vol_num;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">姓名</td>
                        <td><?php echo $wsl_vol_name;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">電話</td>
                        <td><?php echo $wsl_vol_phone;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">地址</td>
                        <td><?php echo $wsl_vol_addr;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">備註</td>
                        <td><?php echo $wsl_remark;?></td>
                    </tr>
                    </table>
            </div>
            <div class="table-responsive">
                <h2 class="h5 mb-4">土地資料</h2>
                <table class="table table-striped">
                    <tr>
                        <td class="col-4">土地類別</td>
                        <td><?php echo $wsl_pj_cats;?></td>
                    </tr>
                
                    <tr>
                        <td class="col-4">土地資料編號</td>
                        <td><?php echo $wsl_pj_no;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">土地權屬</td>
                        <td><?php echo $wsl_pj_own;?></td>
                    </tr>
                 
                    <tr>
                        <td class="col-4">公有土地管理機關</td>
                        <td><?php echo $wsl_pj_og;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">公有土地管理機關</td>
                        <td><?php echo $wsl_pj_og_oth;?></td>
                    </tr>
                
                    <tr>
                        <td class="col-4">土地面積(公頃)</td>
                        <td><?php echo $wsl_pj_area;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">地段</td>
                        <td><?php echo $wsl_county;?><?php echo $wsl_town;?><?php echo $wsl_pj_seat_alley;?></td>
                    </tr>
                 
                    <tr>
                        <td class="col-4">地號</td>
                        <td><?php echo $wsl_pj_seat_no;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">備註</td>
                        <td><?php echo $wsl_pj_remark;?></td>
                    </tr>
                  
                
                </table>
            </div>
            <div class="table-responsive">
                <h2 class="h5 mb-4">查證結果</h2>
                <table class="table table-striped">
                    <tr>
                        <td class="col-4">坐標資料(TWD97)</td>
                        <td><?php echo $wsl_pj_co;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">縣市政府查復日期：</td>
                        <td><?php echo $wsl_ch_date;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">縣市政府查證結果</td>
                        <td><?php echo $wsl_ch_result;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">違規法律類別</td>
                        <td><?php echo $wsl_vl_type;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">違規行政法別</td>
                        <td><?php echo $wsl_val_type;?></td>
                    </tr>
                
                    <tr>
                        <td class="col-4">違反行政法已罰鍰金額：</td>
                        <td><?php echo $wsl_val_cost;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">違規面積(公頃)</td>
                        <td><?php echo $wsl_val_area;?></td>
                    </tr>
                 
                    <tr>
                        <td class="col-4">主違規項目</td>
                        <td><?php echo $wsl_val_item;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">現況作物</td>
                        <td><?php echo $wsl_val_crop;?> <?php echo $wsl_val_crop_oth;?></td>
                    </tr>
                
                    <tr>
                        <td class="col-4">處分日期</td>
                        <td><?php echo $wsl_pu_date;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">行政程序處理紀要</td>
                        <td><?php echo $wsl_val_ph;?><?php echo $wsl_pj_seat_alley;?></td>
                    </tr>
                 
                    <tr>
                        <td class="col-4">主違規項目</td>
                        <td><?php echo $wsl_val_ph_item;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">備註</td>
                        <td><?php echo $wsl_val_remark;?></td>
                    </tr>
                  
                
                </table>
            </div>
            <div class="table-responsive">
                <h2 class="h5 mb-4">行政處分</h2>
                <table class="table table-striped">
                 
                    <tr>
                        <td class="col-4">處分次別</td>
                        <td><?php echo $wsl_psh_rate;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">受處分人</td>
                        <td><?php echo $wsl_psh_name;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">縣市</td>
                        <td><?php echo $wsl_county;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">鄉鎮市區</td>
                        <td><?php echo $wsl_town;?></td>
                    </tr>
                
                    <tr>
                        <td class="col-4">違規面積(公頃)</td>
                        <td><?php echo $wsl_val_area;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">處罰日期</td>
                        <td><?php echo $wsl_psh_date;?></td>
                    </tr>
                 
                    <tr>
                        <td class="col-4">處罰文號</td>
                        <td><?php echo $wsl_psh_num;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">罰鍰金額(元)</td>
                        <td><?php echo $wsl_psh_cost;?></td>
                    </tr>
                
                    <tr>
                        <td class="col-4">罰鍰完繳日期</td>
                        <td><?php echo $wsl_psh_end_date;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">限期改正日期</td>
                        <td><?php echo $wsl_psh_deadline;?></td>
                    </tr>
                 
                    <tr>
                        <td class="col-4">預先通知限期改正日期</td>
                        <td><?php echo $wsl_psh_pre;?></td>
                    </tr>
                    <tr>
                        <td class="col-4">備註</td>
                        <td><?php echo $wsl_psh_remark;?></td>
                    </tr>
                  
                
                </table>
            </div>
            
           
        </div>
    </div>

</main>