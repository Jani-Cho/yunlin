<?php 
$pageTitle = "工程信件通知";
include "functions.php";
include "includes/header.php";

$today =  date("Y-m-d");

?>
<?php    
    require 'includes/PHPMailer.php';   // 匯入PHPMailer類別       
    require 'includes/SMTP.php';          
    require 'includes/Exception.php';   
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    $mail = new PHPMailer();                        // 建立新物件        

    $mail->IsSMTP();                                // 設定使用SMTP方式寄信        
    $mail->Host = "smtp.gmail.com";                 // Gmail的SMTP主機        
    $mail->SMTPAuth = true;                         // 設定SMTP需要驗證

    $mail->SMTPSecure = "ssl";                      // Gmail的SMTP主機需要使用SSL連線   
    $mail->Port = 465;                              // Gmail的SMTP主機的port為465   
    
    
    $mail->Username = "noreply.yunlinn@gmail.com";     // 設定驗證帳號        
    $mail->Password = "sfmmodtnhzgqvixo";              // 設定驗證密碼  需開啟兩步驗證取得驗證碼      
    
    $mail->CharSet = "utf-8";                       // 設定郵件編碼   
    $mail->Encoding = "base64";
    $mail->WordWrap = 50;                           // 每50個字元自動斷行
               
    $mail->setFrom("noreply.yunlinn@gmail.com");         // 設定寄件者信箱        
    $mail->FromName = "管理系統";                 // 設定寄件者姓名        
          
      
    $mail->IsHTML(true);                            // 設定郵件內容為HTML        

    // 測試收件名單
    // $mailList =       
    //     array(
    //         array("geotaiwan5566@gmail.com","第一個人","797659"),
    //         array("jjjj7940001@hotmail.com","第二個人","997465"),
    //         array("ylhg40408@mail.yunlin.gov.tw","張雅琴","40408")     
    //     );

    // 實際收件名單
    // $mailList =       
    //     array(
    //         array("ylhg71190@mail.yunlin.gov.tw","林昶榕","71190"),
    //         array("ylhg71187@mail.yunlin.gov.tw","簡士淵","71187"),
    //         array("ylhg40408@mail.yunlin.gov.tw","張雅琴","40408"),   
    //         array("ylhg71446@mail.yunlin.gov.tw","徐千筑","71446"),    
    //         array("ylhg71185@mail.yunlin.gov.tw","徐仕祐","71185")     
    //     );

?>  
<?php 
$queryUser = "SELECT * FROM userlist WHERE user_role = 'auther'";
$select_all_user_query = mysqli_query($connection, $queryUser);
$user_fullname = array(); 

while($row = mysqli_fetch_assoc($select_all_user_query)){

    $user_fullname[] = $row['user_fullname']; //姓名
    $user_email = $row['user_email']; //信箱

}
?> 
<?php 


$query = "SELECT * FROM $WSProject ";
$select_all_wsproject_query_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_wsproject_query_by_id)){

    $wsp_id = $row['wsp_id']; //序號

    $wsp_name = $row['wsp_name']; //計畫名稱
    $wsp_undertaker = $row['wsp_undertaker']; //承辦人

    $wsp_pj_seat_town = $row['wsp_pj_seat_town']; //鄉市
    $wsp_pj_seat_alley = $row['wsp_pj_seat_alley']; //路段
    $wsp_pj_seat_no = $row['wsp_pj_seat_no']; //地號

    $wsp_vol_name = $row['wsp_vol_name']; //水土保持義務人名稱

    $wsp_st_date = $row['wsp_st_date']; //應開工日期
    if($wsp_st_date == "1970-01-01"){
        $wsp_st_date = "";
    }
    $wsp_rm_st_date = $row['wsp_rm_st_date']; //提醒開工日期
    if($wsp_rm_st_date == "1970-01-01"){
        $wsp_rm_st_date = "";
    }
    $wsp_ac_st_date = $row['wsp_ac_st_date']; //實際開工日期
    if($wsp_ac_st_date == "1970-01-01"){
        $wsp_ac_st_date = "";
    }
    $wsp_end_date = $row['wsp_end_date']; //預定完工日期
    if($wsp_end_date == "1970-01-01"){
        $wsp_end_date = "";
    }

    $wsp_rm_end_date = $row['wsp_rm_end_date']; //提醒完工日期
    if($wsp_rm_end_date == "1970-01-01"){
        $wsp_rm_end_date = "";
    }
    $wsp_ac_end_date = $row['wsp_ac_end_date']; //實際完工日期
    if($wsp_ac_end_date == "1970-01-01"){
        $wsp_ac_end_date = "";
    }
    $wsp_rm_crew = $row['wsp_rm_crew']; //提醒通知人員

    // 第一次展延
    $wsp_apv_date1 = $row['wsp_apv_date1']; //核准日期
    if($wsp_apv_date1 == "1970-01-01"){
        $wsp_apv_date1 = "";
    }
    $wsp_ex_end_date1 = $row['wsp_ex_end_date1']; //展延完工日期
    if($wsp_ex_end_date1 == "1970-01-01"){
        $wsp_ex_end_date1 = "";
    }
    $wsp_rm_end_date1 = $row['wsp_rm_end_date1']; //提醒完工日期
    if($wsp_rm_end_date1 == "1970-01-01"){
        $wsp_rm_end_date1 = "";
    }

    
    if($wsp_ex_end_date1 !== ""){
       $wsp_rm_end_date = $wsp_rm_end_date1;
    //    echo "展延一次，提醒完工日期為 $wsp_rm_end_date";
    }

    // 第二次展延
    $wsp_apv_date2 = $row['wsp_apv_date2']; //核准日期
    if($wsp_apv_date2 == "1970-01-01"){
        $wsp_apv_date2 = "";
    }
    $wsp_ex_end_date2 = $row['wsp_ex_end_date2']; //展延完工日期
    if($wsp_ex_end_date2 == "1970-01-01"){
        $wsp_ex_end_date2 = "";
    }
    $wsp_rm_end_date2 = $row['wsp_rm_end_date2']; //提醒完工日期
    if($wsp_rm_end_date2 == "1970-01-01"){
        $wsp_rm_end_date2 = "";
    }

    if($wsp_ex_end_date2 !== ""){
        $wsp_rm_end_date = $wsp_rm_end_date2;
        // echo "展延二次，提醒完工日期為 $wsp_rm_end_date";
     }

    $wsp_undertaker = $wsp_undertaker; // 承辦人的名稱
    $user_key = array_search($wsp_undertaker, $user_fullname); // 找到對應的名稱在 $user_fullname 中的索引


    // 未開工 且 超過提醒開工日期
    if (($wsp_ac_st_date == "") && ($wsp_rm_st_date <= $today)){
        // $mail->Subject = "【水土保持申請案件管理系統】水土保持計畫案件[$wsp_id]$wsp_name-開工提醒";    // 設定郵件標題 
        $mail->Subject = "$wsp_name$wsp_vol_name $wsp_pj_seat_town $wsp_pj_seat_alley $wsp_pj_seat_no-開工提醒";    // 設定郵件標題   

        if ($user_key !== false) {
            $receiverEmail = $user_email[$user_key]; // 使用對應的 $user_email
            $mail->AddAddress($receiverEmail, $wsp_undertaker); // 收件者郵件及名稱

            // 自動加入名單中的地址
            $additionalEmail = 'ylhg40408@mail.yunlin.gov.tw';
            $mail->AddAddress($additionalEmail, '張雅琴'); // 添加額外的收件人

            $mail->Body =
                "
                水土保持計畫案件<br>
                計畫名稱：[編號$wsp_id]$wsp_name<br>
                預定開工日期：$wsp_st_date<br>
                實際開工日期：未開工<br>
                承辦人：$wsp_undertaker<br>
                <br>
                請前往系統進行確認
                ";
            if ($mail->Send()) {
                echo $wsp_undertaker . " 已收到計畫[$wsp_name]開工提醒通知信件！<br/>";
            } else {
                echo $mail->ErrorInfo . "<br/>";
            }
            $mail->ClearAddresses(); // 清除使用者欄位，為下一封信做準備
        } else {
            // 未有對應承辦名稱
        }  
             
        
    }

    // 已填寫預定完工日期但未完工 且 超過提醒完工日期
    if (($wsp_end_date !== "") && ($wsp_ac_end_date == "") && ($wsp_rm_end_date <= $today)){
        // $mail->Subject = "【水土保持申請案件管理系統】水土保持計畫案件[$wsp_id]$wsp_name-完工提醒";    // 設定郵件標題   
        $mail->Subject = "$wsp_name$wsp_vol_name $wsp_pj_seat_town $wsp_pj_seat_alley $wsp_pj_seat_no-完工提醒";    // 設定郵件標題   

        if ($user_key !== false) {
            $receiverEmail = $user_email[$user_key]; // 使用對應的 $user_email
            $mail->AddAddress($receiverEmail, $wsp_undertaker); // 收件者郵件及名稱

            // 自動加入名單中的地址
            $additionalEmail = 'ylhg40408@mail.yunlin.gov.tw';
            $mail->AddAddress($additionalEmail, '張雅琴'); // 添加額外的收件人

            $mail->Body =
                "
                水土保持計畫案件<br>
                計畫名稱：[編號$wsp_id]$wsp_name<br>
                預定完工日期：$wsp_end_date<br>
                實際完工日期：未完工<br>
                承辦人：$wsp_undertaker<br>
                <br>
                請前往系統進行確認                ";
            if ($mail->Send()) {
                echo $wsp_undertaker . " 已收到計畫[$wsp_name]完工提醒通知信件！<br/>";
            } else {
                echo $mail->ErrorInfo . "<br/>";
            }
            $mail->ClearAddresses(); // 清除使用者欄位，為下一封信做準備
        } else {
            // 未有對應承辦名稱
        }  
        
        
    }

}
?>

<?php

$query = "SELECT * FROM $WSSimple ";
$select_all_WSsimple_query_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_WSsimple_query_by_id)){

    $wss_id = $row['wss_id']; //序號

    $wss_name = $row['wss_name']; //計畫名稱
    $wss_undertaker = $row['wss_undertaker']; //案件承辦人員

    $wss_pj_seat_town = $row['wss_pj_seat_town']; //鄉市
    $wss_pj_seat_alley = $row['wss_pj_seat_alley']; //路段
    $wss_pj_seat_no = $row['wss_pj_seat_no']; //地號

    $wss_vol_name = $row['wss_vol_name']; //水土保持義務人名稱


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

    // 第一次展延
    $wss_ex_end_date1 = $row['wss_ex_end_date1']; //展延完工日期
    if($wss_ex_end_date1 == "1970-01-01"){
        $wss_ex_end_date1 = "";
    }
    $wss_rm_end_date1 = $row['wss_rm_end_date1']; //提醒完工日期
    if($wss_rm_end_date1 == "1970-01-01"){
        $wss_rm_end_date1 = "";
    }
    if($wss_ex_end_date1 !== ""){
        $wss_rm_end_date = $wss_rm_end_date1;
     //    echo "展延一次，提醒完工日期為 $wss_rm_end_date1";
     }

    // 第二次展延
    $wss_ex_end_date2 = $row['wss_ex_end_date2']; //展延完工日期
    if($wss_ex_end_date2 == "1970-01-01"){
        $wss_ex_end_date2 = "";
    }
    $wss_rm_end_date2 = $row['wss_rm_end_date2']; //提醒完工日期
    if($wss_rm_end_date2 == "1970-01-01"){
        $wss_rm_end_date2 = "";
    }
    if($wss_ex_end_date2 !== ""){
        $wss_rm_end_date = $wss_rm_end_date2;
        // echo "展延二次，提醒完工日期為 $wss_rm_end_date2";
    }

    $user_key = array_search($wss_undertaker, $user_fullname); // 找到對應的名稱在 $user_fullname 中的索引
    
    // 未開工 且 超過提醒開工日期
    if (($wss_ac_st_date == "") && ($wss_rm_st_date <= $today)){
        // $mail->Subject = "【水土保持申請案件管理系統】簡易水保申請書[$wss_id]$wss_name-開工提醒";    // 設定郵件標題 
        $mail->Subject = "$wss_name之$wss_vol_name $wss_pj_seat_town $wss_pj_seat_alley $wss_pj_seat_no-開工提醒";    // 設定郵件標題   
  
        if ($user_key !== false) {
            $receiverEmail = $user_email[$user_key]; // 使用對應的 $user_email
            $mail->AddAddress($receiverEmail, $wss_undertaker); // 收件者郵件及名稱

            // 自動加入名單中的地址
            $additionalEmail = 'ylhg40408@mail.yunlin.gov.tw';
            $mail->AddAddress($additionalEmail, '張雅琴'); // 添加額外的收件人

            $mail->Body =
                "
                簡易水保申請書<br>
                計畫名稱：[編號$wss_id]$wss_name<br>
                預定開工日期：$wss_st_date<br>
                實際開工日期：未開工<br>
                承辦人：$wss_undertaker<br>
                <br>
                請前往系統進行確認
                ";
            if ($mail->Send()) {
                echo $wss_undertaker . " 已收到計畫[$wss_name]開工提醒通知信件！<br/>";
            } else {
                echo $mail->ErrorInfo . "<br/>";
            }
            $mail->ClearAddresses(); // 清除使用者欄位，為下一封信做準備
        } else {
            // 未有對應承辦名稱
        }
       
        
        
    }

    // 已填寫預定完工日期但未完工 且 超過提醒完工日期
    if (($wss_end_date !== "") && ($wss_ac_end_date == "") && ($wss_rm_end_date <= $today)){
        // $mail->Subject = "【水土保持申請案件管理系統】簡易水保申請書[$wss_id]$wss_name-完工提醒";    // 設定郵件標題  
        $mail->Subject = "$wss_name之$wss_vol_name $wss_pj_seat_town $wss_pj_seat_alley $wss_pj_seat_no-完工提醒";    // 設定郵件標題   

        if ($user_key !== false) {
            $receiverEmail = $user_email[$user_key]; // 使用對應的 $user_email
            $mail->AddAddress($receiverEmail, $wss_undertaker); // 收件者郵件及名稱
            $mail->Body =
                "
                簡易水保申請書<br>
                計畫名稱：[編號$wss_id]$wss_name<br>
                預定完工日期：$wss_end_date<br>
                實際完工日期：未完工<br>
                承辦人：$wss_undertaker<br>
                <br>
                請前往系統進行確認
                ";
            if ($mail->Send()) {
                echo $wss_undertaker . " 已收到計畫[$wss_name]完工提醒通知信件！<br/>";
            } else {
                echo $mail->ErrorInfo . "<br/>";
            }
            $mail->ClearAddresses(); // 清除使用者欄位，為下一封信做準備
        } else {
            // 未有對應承辦名稱
        }


    }

}
?>

<?php

$query = "SELECT * FROM $WSViolate ";
$select_all_WSviolate_query_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_WSviolate_query_by_id)){

    $wsv_id = $row['wsv_id']; //序號

    // $wsv_name = $row['wsv_name']; //計畫名稱
    $wsv_undertaker = $row['wsv_undertaker']; //縣府查報人員
    $wsv_psh_name = $row['wsv_psh_name']; //受處分人
    
    $wsv_county = $row['wsv_county']; //縣市
    $wsv_town = $row['wsv_town']; //鄉鎮市區
    $wsv_alley = $row['wsv_alley']; //路段
    
    $wsv_psh_deadline = $row['wsv_psh_deadline']; //限期改正日期
    if($wsv_psh_deadline == "1970-01-01"){
        $wsv_psh_deadline = "";
    }
    $wsv_psh_pre = $row['wsv_psh_pre']; //預先通知限期改正日期
    if($wsv_psh_pre == "1970-01-01"){
        $wsv_psh_pre = "";
    }
    
    $user_key = array_search($wsv_undertaker, $user_fullname); // 找到對應的名稱在 $user_fullname 中的索引
    // 預先通知限期改正日期
    if (($wsv_psh_deadline != "") && ($wsv_psh_pre == $today)){
        // $mail->Subject = "【水土保持申請案件管理系統】違規取締表單[$wsv_id]$wsv_name-限期改正提醒";    // 設定郵件標題   
        $mail->Subject = "違規取締表單[$wsv_id]之$wsv_psh_name $wsv_county $wsv_town $wsv_alley-限期改正提醒";    // 設定郵件標題   

        if ($user_key !== false) {
            $receiverEmail = $user_email[$user_key]; // 使用對應的 $user_email
            $mail->AddAddress($receiverEmail, $wsv_undertaker); // 收件者郵件及名稱
            $mail->Body =
                "
                違規取締表單<br>
                計畫名稱：[編號$wsv_id]$wsv_name<br>
                限期改正日期：$wsv_psh_deadline<br>
                承辦人：$wsv_undertaker<br>
                <br>
                請前往系統進行確認
                ";
            if ($mail->Send()) {
                echo $wsv_undertaker . " ㄒ<br/>";
            } else {
                echo $mail->ErrorInfo . "<br/>";
            }
            $mail->ClearAddresses(); // 清除使用者欄位，為下一封信做準備
        } else {
            // 未有對應承辦名稱
        }
 
    }



}
?>
<?php

$query = "SELECT * FROM wslimit ";
$select_all_wslimit_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_wslimit_query)){

    
    $wsl_id = $row['wsl_id']; //序號

    $wsl_undertaker = $row['wsl_undertaker']; //縣府查報人員
    $wsl_psh_name = $row['wsl_psh_name']; //受處分人
    
    $wsl_county = $row['wsl_county']; //縣市
    $wsl_town = $row['wsl_town']; //鄉鎮市區
    $wsl_pj_seat_alley = $row['wsl_pj_seat_alley']; //路段
    
    $wsl_psh_deadline = $row['wsl_psh_deadline']; //限期改正日期
    if($wsl_psh_deadline == "1970-01-01"){
        $wsl_psh_deadline = "";
    }
    $wsl_psh_pre = $row['wsl_psh_pre']; //預先通知限期改正日期
    if($wsl_psh_pre == "1970-01-01"){
        $wsl_psh_pre = "";
    }
    
    $user_key = array_search($wsl_undertaker, $user_fullname); // 找到對應的名稱在 $user_fullname 中的索引
    // 預先通知限期改正日期
    if (($wsl_psh_deadline != "") && ($wsl_psh_pre == $today)){
        // $mail->Subject = "【水土保持申請案件管理系統】違規取締表單[$wsv_id]$wsv_name-限期改正提醒";    // 設定郵件標題   
        $mail->Subject = "超限利用案件[$wsl_id]之$wsl_psh_name $wsl_county $wsl_town $wsl_pj_seat_alley-限期改正提醒";    // 設定郵件標題   

        if ($user_key !== false) {
            $receiverEmail = $user_email[$user_key]; // 使用對應的 $user_email
            $mail->AddAddress($receiverEmail, $wsl_undertaker); // 收件者郵件及名稱
            $mail->Body =
                "
                超限利用案件<br>
                計畫名稱：[編號$wsl_id]$wsv_name<br>
                限期改正日期：$wsl_psh_deadline<br>
                承辦人：$wsl_undertaker<br>
                <br>
                請前往系統進行確認
                ";
            if ($mail->Send()) {
                echo $wsl_undertaker . " ㄒ<br/>";
            } else {
                echo $mail->ErrorInfo . "<br/>";
            }
            $mail->ClearAddresses(); // 清除使用者欄位，為下一封信做準備
        } else {
            // 未有對應承辦名稱
        }
 
    }

}
?>