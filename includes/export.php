<?php 
include_once 'db.php';

if(isset($_POST['get_year'])){
    $year = $_POST['get_year'];
}else{
    $year = "";
}

$type = $_POST['get_type'];
if($type == "wsp"){
    $p_name = "水土保持計畫案件";
    $p_type = 'WSProject';
    $p_date = 'wsp_apy_date';
}else if($type == "wss"){
    $p_name = "簡易水保申請書";
    $p_type = 'WSSimple';
    $p_date = 'wss_apy_date';

}else if($type == "wsv"){
    $p_name = "水土保持違規取締案件";
    $p_type ='WSViolate';
    $p_date = 'wsv_pj_date'; /* 查報日期 */

}else if($type == "wsl"){
    $p_name = "超限利用表單案件";
    $p_type ='WSLimit';
    $p_date = 'wsl_apy_date'; /* 查報日期 */

}
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}

 
$fileName = date('Y-m-d') . ".xls"; 
$fields = array('序號', '申報日期', '案件名稱', '義務人名稱', '案件承辦人員'); 
 
// Display column names as first row 
$excelData = implode(",", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = "SELECT * FROM $p_type WHERE $p_date LIKE '$year%' ";
$select_all_wspimple_query = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_all_wspimple_query)){
    
    $id = $row[$type.'_id']; //序號
    $date = $row[$p_date]; //申請日期
    if($date == "1970-01-01"){
        $date = "";
    }
    if($type== "wsv"){
        $p_name = '違規取締表單'.$id; //計畫名稱
        
    }else if($type== "wsl"){
        $p_name = '超限利用表單'.$id; //計畫名稱

    }else{
        $p_name = $row[$type.'_name']; //計畫名稱

    }
    $vol_name = $row[$type.'_vol_name']; //義務人名稱
    $undertaker = $row[$type.'_undertaker']; //案件承辦人員

    $lineData = array($id, $date, $p_name, $vol_name, $undertaker); 
    array_walk($lineData, 'filterData'); 
    $excelData .= implode(",", array_values($lineData)) . "\n";
}


// Headers for download 
ob_start();
header("Content-Type: application/vnd.ms-excel; charset=UTF-8"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
ob_end_flush();
// Render excel data 
echo $excelData; 
 
exit;
