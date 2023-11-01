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
    $mail->Username = "janicho117@gmail.com";     // 設定驗證帳號        
    $mail->Password = "xzjcwfeqznviccef";              // 設定驗證密碼        
    
    $mail->CharSet = "utf-8";                       // 設定郵件編碼   
    $mail->Encoding = "base64";
    $mail->WordWrap = 50;                           // 每50個字元自動斷行
          
          
    $mail->Subject = "【水土保持申請案件管理系統】簡易水保申報書-開工提醒";                     // 設定郵件標題        
    $mail->setFrom("janicho117@gmail.com");         // 設定寄件者信箱        
    $mail->FromName = "管理系統";                 // 設定寄件者姓名        
          
      
    $mail->IsHTML(true);                            // 設定郵件內容為HTML        


    $mailList =       // 代表收件者資訊的陣列   (信箱, 姓名, 代碼)
        array(
            array("janicho117@gmail.com","第一個人","797659"),
            array("tutorj79@gmail.com","第二個人","997465"),
            array("ssnfighting0314@gmail.com","第三個人","410803")        
        );

        
    foreach ($mailList as $receiver) {
        $mail->AddAddress($receiver[0], $receiver[1]);  // 收件者郵件及名稱 
        $mail->Body =                                   // AddAddress(receiverMail, receiverName)
            "
            計畫名稱：<br>
            預定開工日期：<br>
            實際開工日期：<br>

            請前往http://yunlinapp.azurewebites.net進行確認
            ";
        if($mail->Send()) {                             // 郵件寄出
            echo $receiver[0]." 已收到信件！<br/>";
        } else {
            echo $mail->ErrorInfo . "<br/>";
        }
        $mail->ClearAddresses();                        // 清除使用者欄位，為下一封信做準備
    }   
    

?>  