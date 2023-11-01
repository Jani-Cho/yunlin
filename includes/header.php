<?php 
// 資料庫名稱
$WSProject = "WSProject"; // 水土保持計畫案件
$WSSimple = "WSSimple"; // 簡易水保申請書
$WSViolate = "WSViolate"; // 簡易水保申請書
session_start();
if(!isset($_SESSION['role'])){
  if($_SERVER['REQUEST_URI'] !== '/login.php'){
    header('Location: login.php');
  }
}
?>
<!doctype html>
<html lang="TW-zh">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $(document).ready(function(){
        $("#select-all").click(function(){
          $("input[type='checkbox']").prop('checked', this.checked);
        })

        $("#addRow").click(function(){

          $("#OLRemark").append("<li class='pb-3'><input class='form-control' type='text' name='wss_remark_add[]'></li>");
        })

        $i = 0;
        $("#addTable").click(function(){
          $i = $("#addTable").attr("data-num");
          
          $i++;
          $("#tableList").append("<tr id='r_" + $i + "'><th scope='row'>" + $i + "</th><td><input class='form-control' type='text' name='wss_remark_fac[]'></td><td><input class='form-control' type='text' name='wss_remark_loc[]'></td><td><input class='form-control' type='text' name='wss_remark_num[]'></td><td><input class='form-control' type='text' name='wss_remark_size[]'></td><td><input class='form-control' type='text' name='wss_remark_oth[]'></td></tr>");
          // $("#tableList").append("<tr id='r_" + $i + "'><th scope='row'>" + $i + "</th><td><input class='form-control' type='text' name='wss_remark_fac[]'></td><td><input class='form-control' type='text' name='wss_remark_loc[]'></td><td><input class='form-control' type='text' name='wss_remark_num[]'></td><td><input class='form-control' type='text' name='wss_remark_size[]'></td><td><input class='form-control' type='text' name='wss_remark_oth[]'></td><td><i class='fas fa-trash me-2' onclick='delete_row(" + $i + ")'></i></td></tr>");
          
          $("#addTable").attr("data-num", $i);
        })
        

      });
      // }
    </script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />

    <style>
      table *{
        word-break: keep-all;
      }
      .figure-img{
        height: 200px;
      }
	
	.accordion-button{
        background: #e7f1ff;
      }

      @media print{    
          #print-not
          {
              display: none !important;
          }
      }
    </style>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <!-- <script src="/assets/map/catiline.js"></script> -->
    <!-- <script src="/assets/map/leaflet.shpfile.js"></script> -->
    
    <title><?php echo $pageTitle; ?> | 水土保持申請案件管理系統</title>
  </head>
  <body>