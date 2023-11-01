<?php 
$pageTitle = "地理資訊系統圖台";
include "functions.php";
include "includes/header.php";
include "includes/admin_header.php";
include "includes/nav.php";


if(isset($_POST['select_search'])){
  $type = $_POST['select_search'];
}else{
  $type = "all";
}
if(isset($_POST['wsp_pj_seat_town'])){
  $county = $_POST['wsp_pj_seat_town'];
}else{
  $county = "";
}
if(isset($_POST['wsp_pj_seat_alley']) && $county != ""){
  $road = $_POST['wsp_pj_seat_alley'];
}else{
  $road = "";
}

if($type == "wsp" || $type == "all"){

  $query = "SELECT * FROM WSProject WHERE wsp_pj_seat_town LIKE '%$county%' AND wsp_pj_seat_alley LIKE '%$road%' ";
    
  $select_all_wsproject_query = mysqli_query($connection, $query);
  $wsp_results = array();
  while($row = mysqli_fetch_assoc($select_all_wsproject_query)){
      
      $wsp_id = $row['wsp_id']; 
      $wsp_pj_co = $row['wsp_pj_co']; 
      $wsp_name = $row['wsp_name']; 
  
      $wsp_results[] = $wsp_pj_co;
  
      $wsp_pj = '{"type": "水土保持計畫案件", "id": "'.$wsp_id.'", "co": "'.$wsp_pj_co.'", "name": "'.$wsp_name.'"}';
      $wsp_pjs[] =  $wsp_pj;
  }
}
if($type == "wss" || $type == "all"){

  $query = "SELECT * FROM WSSimple WHERE wss_pj_seat_town LIKE '%$county%' AND wss_pj_seat_alley LIKE '%$road%' ";
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
}
if($type == "wsv" || $type == "all"){

  $query = "SELECT * FROM WSViolate WHERE wsv_town LIKE '%$county%' AND wsv_alley LIKE '%$road%' ";
  $select_all_wsviolate_query = mysqli_query($connection, $query);
  $wsv_results = array();
  while($row = mysqli_fetch_assoc($select_all_wsviolate_query)){
      
      $wsv_id = $row['wsv_id']; 
      $wsv_pj_co = $row['wsv_pj_co']; 

      $wsv_results[] = $wsv_pj_co;

      $wsv_pj = '{"type": "簡易水保申請書", "id": "'.$wsv_id.'", "co": "'.$wsv_pj_co.'", "name": "違規取締表單'.$wsv_id.'"}';
      $wsv_pjs[] =  $wsv_pj;
      
  }
}

?>
<main>
  
  <div class="container-fluid p-4">
    <div class="row">

      <div class="col-12">
        <div class="p-4 mb-2 bg-light text-dark rounded">
            <h2 class="h5">地理資訊系統圖台</h2>
            <form class="row align-items-center" action="map.php" method="post" id="pjs">
              <div class="col-lg-2">
                  <select name="user_state" class="form-select">
                      <option value="all" selected>年度</option>
                      <!-- <option value="">110</option>
                      <option value="">111 </option> -->
                  </select>                    
                </div>
                <div class="col-lg-2">

                  <select class="form-select" id="wss_pj_seat_town" name="wsp_pj_seat_town" onchange="countyChoose()">
                      <option value="" selected >請選擇鄉鎮市區</option>
                      <?php
                          $areaitem = '[{"area":"斗六市","value":"斗六市"},{"area":"古坑鄉","value":"古坑鄉"},{"area":"林內鄉","value":"林內鄉"}]';
                          $areaitem_array = json_decode( $areaitem, true );
                          
                          foreach($areaitem_array as $item) { 
                              $value = $item['value'];
                              $area = $item['area'];

                              if($county == $value){
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }
                                
                              echo "<option value='$value' $selected>$area</option>";
                          }
                      ?>
                  </select>
                </div>
                <div class="col-lg-2" >
                  <input id="road" type="hidden" value="<?php echo $road?>">
                  <select class="form-select" id="wss_pj_seat_alley" name="wsp_pj_seat_alley" onchange="this.form.submit()">
                      <option value="" >請選擇路段</option>
                  </select>
                </div>
                <div class="col-lg-6">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="select_search" id="all" value="all" onchange="this.form.submit()" <?php  if($type=="all"){ echo 'checked';}?>>
                    <label class="form-check-label" for="all">全部類型</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="select_search" id="wsp" value="wsp" onchange="this.form.submit()" <?php  if($type=="wsp"){ echo 'checked';}?>>
                    <label class="form-check-label" for="wsp">水土保持</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="select_search" id="wss" value="wss" onchange="this.form.submit()" <?php  if($type=="wss"){ echo 'checked';}?>>
                    <label class="form-check-label" for="wss">簡易水保</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="select_search" id="wsv" value="wsv" onchange="this.form.submit()" <?php  if($type=="wsv"){ echo 'checked';}?>>
                    <label class="form-check-label" for="wsv">違規取締</label>
                  </div>
      
                </div>


                <div id="map" class="mt-3" style="width: 100%; height: 75vh;"></div>
        
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
    function countyChoose(){ 
      document.getElementById('wss_pj_seat_alley').value = ''; 
      document.getElementById('pjs').submit(); 
    } 
    <?php
    if(!empty($wsp_pjs)){

      $wsp_pjs = json_encode($wsp_pjs);
      echo "var wsp_pjs = ". $wsp_pjs . ";\n";
    }else{
      echo "var wsp_pjs ;\n";
    }
    if(!empty($wss_pjs)){
      $wss_pjs = json_encode($wss_pjs);
      echo "var wss_pjs = ". $wss_pjs . ";\n";
    }else{
      echo "var wss_pjs ;\n";
    }
    if(!empty($wsv_pjs)){
      $wsv_pjs = json_encode($wsv_pjs);
      echo "var wsv_pjs = ". $wsv_pjs . ";\n";
    }else{
      echo "var wsv_pjs ;\n";
    }
    ?>
    

    // 建立 Leaflet 地圖
    var map = L.map('map');

    // 設定經緯度座標
    map.setView(new L.LatLng(23.65, 120.60), 12);

    // 設定圖資來源
    var osmUrl='https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    var osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 16});
    map.addLayer(osm);

  
    if(wsp_pjs){
      getPjMap(wsp_pjs, 'blue', 'WSProject')
    }
    if(wss_pjs){
      getPjMap(wss_pjs, 'red', 'WSSimpleApply')
    }    
    if(wsv_pjs){
      getPjMap(wsv_pjs, 'purple', 'WSViolate')
    }    

    function getPjMap(pj, col, url){
      console.log(pj)

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