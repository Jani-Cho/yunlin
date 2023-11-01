<?php 
$pageTitle = "首頁";
include "functions.php";
include "includes/header.php";
// include "includes/admin_header.php";
include "includes/nav.php";


  if(isset($_POST['select_search'])){
    $type = $_POST['select_search'];
  }else{
    $type = "all";
  }

  
  $query = "SELECT * FROM WSProject ";
    
  $select_all_wsproject_query = mysqli_query($connection, $query);
  $wsp_results = array();
  while($row = mysqli_fetch_assoc($select_all_wsproject_query)){
      
      $wsp_id = $row['wsp_id']; 
      $wsp_pj_co = $row['wsp_pj_co']; 
      $wsp_name = $row['wsp_name']; 
  
      $wsp_results[] = $wsp_pj_co;
      $wsp_namelist[] = $wsp_name;
  
      $wsp_pj = '{"type": "水土保持計畫案件", "id": "'.$wsp_id.'", "co": "'.$wsp_pj_co.'", "name": "'.$wsp_name.'"}';
      $wsp_pjs[] =  $wsp_pj;
  }
  $query = "SELECT * FROM WSSimple ";
  $select_all_wspimple_query = mysqli_query($connection, $query);
  $wss_results = array();
  while($row = mysqli_fetch_assoc($select_all_wspimple_query)){
      
      $wss_id = $row['wss_id']; 
      $wss_pj_co = $row['wss_pj_co']; 
      $wss_name = $row['wss_name']; 
  
      $wss_results[] = $wss_pj_co;
  
      $wss_pj = '{"type": "簡易水保申請書", "id": "'.$wss_id.'", "co": "'.$wss_pj_co.'", "name": "'.$wss_name.'"}';
      $wss_pjs[] =  $wss_pj;
      
  }
  $query = "SELECT * FROM WSViolate ";
  $select_all_wsviolate_query = mysqli_query($connection, $query);
  $wsv_results = array();
  while($row = mysqli_fetch_assoc($select_all_wsviolate_query)){
      
      $wsv_id = $row['wsv_id']; 
      $wsv_pj_co = $row['wsv_pj_co']; 

      $wsv_results[] = $wsv_pj_co;

      $wsv_pj = '{"type": "簡易水保申請書", "id": "'.$wsv_id.'", "co": "'.$wsv_pj_co.'", "name": "違規取締表單'.$wsv_id.'"}';
      $wsv_pjs[] =  $wsv_pj;
      
  }



?>
<main>
  
  <div class="container-fluid p-4">
    <div class="row">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">

    <a class="btn btn-primary btn-sm me-md-2" href="alertList.php" class="link-primary text-dark">屆期資料</a>
</div>

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
                      <th scope="col" class="col-sm-5">計畫名稱</th>
                      <th scope="col" class="col-sm-3">水土保持義務人名稱</th>
                      <th scope="col" class="col-sm-3">案件承辦人員</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    <?php
                    showAllProjects('p',$WSProject);
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
                    <th scope="col" class="col-sm-5">計畫名稱</th>
                    <th scope="col" class="col-sm-3">水土保持義務人名稱</th>
                    <th scope="col" class="col-sm-3">案件承辦人員</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  <?php
                    showAllProjects('s',$WSSimple);
                    ?>
                </tbody>
              </table>
            </div>
      
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
            <h2 class="h5">水土保持違規取締案件</h2>
            <a href="WSViolate.php" class="link-primary text-dark">查看所有取締案件</a>
          </div>
          <div class="p-4 mb-2 bg-light text-dark rounded">
            <div class="table-responsive ">
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="">
                    <th scope="col" class="col-sm-1">序號</th>
                    <th scope="col" class="col-sm-5">計畫名稱</th>
                    <th scope="col" class="col-sm-3">水土保持義務人名稱</th>
                    <th scope="col" class="col-sm-3">案件承辦人員</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                    showAllProjects('v','WSviolate');
                    ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
            <h2 class="h5">超限利用表單</h2>
            <a href="WSlimit.php" class="link-primary text-dark">查看所有案件</a>
          </div>
          <div class="p-4 mb-2 bg-light text-dark rounded">
            <div class="table-responsive ">
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="">
                    <th scope="col" class="col-sm-1">序號</th>
                    <th scope="col" class="col-sm-5">計畫名稱</th>
                    <th scope="col" class="col-sm-3">水土保持義務人名稱</th>
                    <th scope="col" class="col-sm-3">案件承辦人員</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                    showAllProjects('l','wslimit');
                    ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
      <div class="col-12">
        <div class="p-4 mb-2 bg-light text-dark rounded">
            <h2 class="h5">地理資訊系統圖台</h2>
            <form class="row align-items-center" action="map.php" method="post">
                <div class="col-lg-2">
                  <select name="get_year" class="form-select" onchange="this.form.submit()">
                      <option value="" selected>年度</option>
                      <option value="2021">110</option>
                      <option value="2022">111 </option>
                  </select>                    
                </div>
                <div class="col-lg-2">

                  <select class="form-select" id="wss_pj_seat_town" name="wsp_pj_seat_town" onchange="this.form.submit()">
                      <option value="" selected >請選擇鄉鎮市區</option>
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
                </div>
                <div class="col-lg-2">

                  <select class="form-select" id="wss_pj_seat_alley" name="wsp_pj_seat_alley" onchange="this.form.submit()">
                      <option value="" >請選擇路段</option>
                  </select>
                </div>
                <div class="col-lg-6">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="select_search" id="all" value="all" onchange="this.form.submit()" checked>
                    <label class="form-check-label" for="all">全部</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="select_search" id="wsp" value="wsp" onchange="this.form.submit()" >
                    <label class="form-check-label" for="wsp">水土保持</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="select_search" id="wss" value="wss" onchange="this.form.submit()" >
                    <label class="form-check-label" for="wss">簡易水保</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="select_search" id="wsv" value="wsv" onchange="this.form.submit()" >
                    <label class="form-check-label" for="wsv">違規取締</label>
                  </div>
                </div>
  
  
      
                <div id="map" class="mt-3" style="width: 100%; height: 60vh;"></div>
        
            </form>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="./assets/mapall.js"></script>
<script src="./assets/street.js"></script>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
<script src="./assets/map/catiline.js"></script>
<script src="./assets/map/leaflet.shpfile.js"></script>
<script>
    <?php
    // $w_all = json_encode($w_all);
    // echo "var w_all = ". $w_all . ";\n";
    $wsp_pjs = json_encode($wsp_pjs);
    echo "var wsp_pjs = ". $wsp_pjs . ";\n";
    $wss_pjs = json_encode($wss_pjs);
    echo "var wss_pjs = ". $wss_pjs . ";\n";
    $wsv_pjs = json_encode($wsv_pjs);
    echo "var wsv_pjs = ". $wsv_pjs . ";\n";
    ?>

    // 建立 Leaflet 地圖
    var map = L.map('map');

    // 設定經緯度座標
    map.setView(new L.LatLng(23.65, 120.60), 12);

    // 設定圖資來源
    var osmUrl='https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    var osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 16});
    map.addLayer(osm);

    // var watercolor = L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png');
    // watercolor.addTo(map);
    // var zip = "debrisstream1726_20210107_twd97.zip"
    // var shpfile = new L.Shapefile(zip,{});

    // shpfile.addTo(map);

    // shpfile.once("data:loaded", function () { 
    //     alert("test!");
    // })

    // getPjMap(null, null, null, null);


  getPjMap(wsp_pjs, 'blue', 'WSProject')
  getPjMap(wss_pjs, 'red', 'WSSimpleApply')
  getPjMap(wsv_pjs, 'purple', 'WSViolate')
  function getPjMap(pj, col, url){
    for (var i = 0; i < pj.length; i++) {
      ws = JSON.parse(pj[i]);
      ws_loc  = ws.co.split(',');

      if(ws_loc == "" ){
        latlan_arr_ws = [ '' , '' ]
      }else{

        var latlan_ws = UTM2LatLon(ws_loc[0], ws_loc[1], 0, 0);
        var X84 = Number(latlan_ws[0]);
        var Y84 = Number(latlan_ws[1]);
        loc_ws_arr = [ X84 , Y84 ] // 案件位置
        map.attributionControl.setPrefix(false);
        var marker_ws = new L.circleMarker(loc_ws_arr, {
            draggable: false
        }).setStyle({color: col}).bindPopup(ws.type+'<br/><strong><a target="_blank" href="'+url+'.php?type=edit-project&pj_id='+ws.id+'">'+ ws.name +'</a></strong><br/>緯度：'+ X84+'<br/>經度：'+Y84+'')
        .openPopup();
  
        map.addLayer(marker_ws);
      }

    }
  }
  


</script>
<?php include "includes/footer.php" ?>