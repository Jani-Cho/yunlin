<?php 
$pageTitle = "首頁";
include "functions.php";
include "includes/header.php";
// include "includes/admin_header.php";
include "includes/nav.php";



  
$query = "SELECT * FROM WSProject ";
    $select_all_wsproject_query = mysqli_query($connection, $query);
    $wsp_results = array();
    while($row = mysqli_fetch_assoc($select_all_wsproject_query)){
        
        $wsp_id = $row['wsp_id']; 
        $wsp_pj_co = $row['wsp_pj_co']; 
        $wsp_undertaker = $row['wsp_undertaker']; 
        $wsp_name = $row['wsp_name']; 
        $wsp_rm_st_date = $row['wsp_rm_st_date']; //提醒開工日期
        if($wsp_rm_st_date == "1970-01-01"){
            $wsp_rm_st_date = "";
        }
        $wsp_rm_end_date = $row['wsp_rm_end_date']; //提醒完工日期
        if($wsp_rm_end_date == "1970-01-01"){
            $wsp_rm_end_date = "";
        }
        $wsp_ac_st_date = $row['wsp_ac_st_date']; //實際開工日期
        if($wsp_ac_st_date == "1970-01-01"){
            $wsp_ac_st_date = "";
        }
        $wsp_end_date = $row['wsp_end_date']; //預定完工日期
        if($wsp_end_date == "1970-01-01"){
            $wsp_end_date = "";
        }
        $wsp_ac_end_date = $row['wsp_ac_end_date']; //實際完工日期
        if($wsp_ac_end_date == "1970-01-01"){
            $wsp_ac_end_date = "";
        }
        
        $current_date = date("Y-m-d");
        if ($wsp_ac_st_date == "") {
            $status = '未開工';
        } elseif ($wsp_ac_st_date !== "" && $wsp_ac_end_date == "") {
            if($current_date >= $wsp_end_date){

                $status = '超過預定完工日期但未完工';
            }else{
                $status = '未完工';

            }
        } else {
            continue;
        }

        $wsp_results[] = $wsp_pj_co;
        $wsp_namelist[] = $wsp_name;

        $wsp_pj = '{"type": "水土保持計畫案件", "id": "'.$wsp_id.'", "co": "'.$wsp_pj_co.'", "name": "'.$wsp_name.'", "undertaker": "'.$wsp_undertaker.'", "status": "'.$status.'", "wsp_rm_end_date": "'.$wsp_rm_end_date.'",  "wsp_ac_st_date": "'.$wsp_ac_st_date.'", "wsp_end_date": "'.$wsp_end_date.'"}';
        $wsp_pjs[] =  $wsp_pj;
    }

  $query = "SELECT * FROM WSSimple ";
  $select_all_wspimple_query = mysqli_query($connection, $query);
  $wss_results = array();
  while($row = mysqli_fetch_assoc($select_all_wspimple_query)){
      
      $wss_id = $row['wss_id']; 
      $wss_pj_co = $row['wss_pj_co']; 
      $wss_undertaker = $row['wss_undertaker']; 
      $wss_name = $row['wss_name']; 

      $wss_rm_st_date = $row['wss_rm_st_date']; //提醒開工日期
      if($wss_rm_st_date == "1970-01-01"){
          $wss_rm_st_date = "";
      }
      $wss_rm_end_date = $row['wss_rm_end_date']; //提醒完工日期
      if($wss_rm_end_date == "1970-01-01"){
          $wss_rm_end_date = "";
      }
      $wss_ac_st_date = $row['wss_ac_st_date']; //實際開工日期
      if($wss_ac_st_date == "1970-01-01"){
          $wss_ac_st_date = "";
      }
      $wss_end_date = $row['wss_end_date']; //預定完工日期
      if($wss_end_date == "1970-01-01"){
          $wss_end_date = "";
      }
      $wss_ac_end_date = $row['wss_ac_end_date']; //實際完工日期
      if($wss_ac_end_date == "1970-01-01"){
          $wss_ac_end_date = "";
      }
      
      $current_date = date("Y-m-d");
      if ($wss_ac_st_date == "") {
          $status = '未開工';
      } elseif ($wss_ac_st_date !== "" && $wss_ac_end_date == "") {
          if($current_date >= $wss_end_date){

              $status = '超過預定完工日期但未完工';
          }else{
              $status = '未完工';

          }
      } else {
          continue;
      }
  
      $wss_results[] = $wss_pj_co;
      $wss_namelist[] = $wss_name;

      $wss_pj = '{"type": "簡易水保申請書", "id": "'.$wss_id.'", "co": "'.$wss_pj_co.'", "name": "'.$wss_name.'", "undertaker": "'.$wss_undertaker.'", "status": "'.$status.'", "wss_rm_end_date": "'.$wss_rm_end_date.'",  "wss_ac_st_date": "'.$wss_ac_st_date.'", "wss_end_date": "'.$wss_end_date.'"}';
      $wss_pjs[] =  $wss_pj;
      
  }




?>
<main>
  
  <div class="container-fluid p-4">
    <div class="row">

      <div class="col-12">
          <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
            <h2 class="h5">水土保持計畫案件</h2>
            <a href="WSProject.php" class="link-primary text-dark">查看所有計劃案件</a>
          </div>
          <div class="p-4 mb-2 bg-light text-dark rounded">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                  <thead>
                    <tr class="">
                      <th scope="col" class="col-sm-1">序號</th>
                      <th scope="col" class="col-sm-1">狀態</th>
                      <th scope="col" class="col-sm-5">計畫名稱</th>
                      <th scope="col" class="col-sm-2">開工日期</th>
                      <th scope="col" class="col-sm-2">預計完工日期</th>
                      <th scope="col" class="col-sm-2">提醒完工日期</th>
                      <th scope="col" class="col-sm-3">案件承辦人員</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                  <?php
                  if(!empty($wsp_pjs)){

                      foreach ($wsp_pjs as $wsp_pj) {
                          $data = json_decode($wsp_pj, true);
                          echo "<tr>";
                          echo "<td>{$data['id']}</td>";
                          echo "<td>{$data['status']}</td>";
                          echo "<td><a href='WSProject.php?type=edit-project&pj_id={$data['id']}'>{$data['name']}</a></td>";
  
                          echo "<td>{$data['wsp_ac_st_date']}</td>";
                          echo "<td>{$data['wsp_end_date']}</td>";
                          echo "<td>{$data['wsp_rm_end_date']}</td>";
                          echo "<td>{$data['undertaker']}</td>";
                          echo "</tr>";
                      }
                  }
                    ?>
                  </tbody>
              </table>
            </div>
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
            <h2 class="h5">簡易水保申請書</h2>
            <a href="WSSimpleApply.php" class="link-primary text-dark">查看所有申請書</a>
          </div>
          <div class="p-4 mb-2 bg-light text-dark rounded">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="">
                    <th scope="col" class="col-sm-1">序號</th>
                    <th scope="col" class="col-sm-1">狀態</th>

                    <th scope="col" class="col-sm-5">計畫名稱</th>
                    <th scope="col" class="col-sm-2">開工日期</th>
                      <th scope="col" class="col-sm-2">預計完工日期</th>
                      <th scope="col" class="col-sm-2">提醒完工日期</th>

                    <th scope="col" class="col-sm-3">案件承辦人員</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                    foreach ($wss_pjs as $wss_pj) {
                        $data = json_decode($wss_pj, true);
                        echo "<tr>";
                        echo "<td>{$data['id']}</td>";
                        echo "<td>{$data['status']}</td>";
                        echo "<td><a href='WSSimpleApply.php?type=edit-project&pj_id={$data['id']}'>{$data['name']}</a></td>";
  
                        echo "<td>{$data['wss_ac_st_date']}</td>";
                        echo "<td>{$data['wss_end_date']}</td>";
                        echo "<td>{$data['wss_rm_end_date']}</td>";
                      echo "<td>{$data['undertaker']}</td>";
                        echo "</tr>";
                    }
                    ?>
                  </tbody>
              </table>
            </div>
      
          </div>
     
      </div>
 
    </div>
  </div>
</main>

<?php include "includes/footer.php" ?>