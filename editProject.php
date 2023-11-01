<?php 
include "functions.php";
include "includes/header.php";
include "includes/nav.php";

$query = "SELECT * FROM WSprojects";
$select_all_WSprojects_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_WSprojects_query)){
    $wsp_name = $row['wsp_name']; //計畫名稱
    $wsp_unit = $row['wsp_unit']; //單位
    $wsp_undertaker = $row['wsp_undertaker']; //承辦人
    $wsp_vol_name = $row['wsp_vol_name']; //水土保持義務人名稱
    $wsp_vol_num = $row['wsp_vol_num']; //國民身分證統一編號或營利事業統一編號
    $wsp_vol_phone = $row['wsp_vol_phone']; //電話
    $wsp_vol_addr = $row['wsp_vol_addr']; //住居所或營業所
    $wsp_vol_email = $row['wsp_vol_email']; //電子郵件
    $wsp_un_name = $row['wsp_un_name']; //承辦技師姓名
    $wsp_un_off = $row['wsp_un_off']; //技師職業機構或事務所
    $wsp_un_email = $row['wsp_un_email']; //電子郵件
    $wsp_un_date = $row['wsp_un_date']; //製作年月日
    $wsp_pj_pur = $row['wsp_pj_pur']; //計畫目的
    $wsp_pj_scp = $row['wsp_pj_scp']; //計畫範圍
    $wsp_pj_sum = $row['wsp_pj_sum']; //開挖整地概述
    $wsp_pj_fac = $row['wsp_pj_fac']; //水土保持設施
    $wsp_pj_pre = $row['wsp_pj_pre']; //開發期間之防災措施
    $wsp_pj_way = $row['wsp_pj_way']; //預定施工方式
    $wsp_pj_cost = $row['wsp_pj_cost']; //水土保持計畫設施項目、數量及總工程造價
    $wsp_pj_area = $row['wsp_pj_area']; //計畫面積
    $wsp_pj_co = $row['wsp_pj_co']; //土地座標
    $wsp_pj_own = $row['wsp_pj_own']; //土地權屬
    $wsp_pj_seat = $row['wsp_pj_seat']; //實施地點 土地座落
}

?>

<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <h1 class="h4 mb-4">編輯 水土保持計畫案件</h1>
            </div>
            <div class="p-4 mb-4 bg-light text-dark rounded">
                <h2 class="h5 mb-4">水土保持計畫內容
                </h2>
                <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header " id="flush-headingOne">
                            <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="true"
                                aria-controls="flush-collapseOne">
                                水土保持計畫
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <label for="project-name" class="col-sm-2 col-form-label">計畫名稱 *
                                </label>
                                <input type="text" class="form-control" id="project-name" value="<?php echo $wsp_name; ?>" required>
                                <label for="project-name" class="col-sm-2 col-form-label">實施地點
                                    土地座落
                                </label>
                                <div class="input-group mb-2">

                                    <select class="form-select" id="country" required="">
                                        <option value="" selected>雲林縣</option>

                                    </select>

                                    <select class="form-select" id="country" required="">
                                        <option value="">請選擇</option>
                                        <option>斗六市</option>
                                    </select>

                                    <select class="form-select" id="country" required="">
                                        <option value="">請選擇</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="" value="" placeholder="請輸入地號">
                                    <input type="text" class="form-control" placeholder="土地筆數" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id="">筆

                                    </span>
                                </div>

                                <label for="project-name" class="col-sm-2 col-form-label">土地權屬

                                </label>
                                <input type="text" class="form-control" id="project-name" value="" required>

                                <label for="project-name" class="col-sm-2 col-form-label">計畫面積
                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id="">公頃</span>
                                </div>
                                <label for="project-name" class="col-sm-2 col-form-label">土地座標
                                    (TWD97) *</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i
                                            class="fas fa-map-marker-alt"></i></span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                水土保持義務人
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <label for="project-name" class="col-sm-2 col-form-label">水土保持義務人名稱
                                </label>
                                <input type="text" class="form-control" id="" value="">
                                <label for="project-name" class="col-sm-2 col-form-label">國民身分證統一編號或營利事業統一編號
                                </label>
                                <input type="text" class="form-control" id="" value="">
                                <label for="project-name" class="col-sm-2 col-form-label">電話
                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-phone"></i></span>
                                </div>
                                <label for="project-name" class="col-sm-2 col-form-label">住居所或營業所
                                </label>
                                <input type="text" class="form-control" id="" value="">
                                <label for="project-name" class="col-sm-2 col-form-label">電子郵件 *
                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-envelope"></i></span>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                承辦單位
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <label for="project-name" class="col-sm-2 col-form-label">承辦技師姓名

                                </label>
                                <input type="text" class="form-control" id="" value="">
                                <label for="project-name" class="col-sm-2 col-form-label">技師職業機構或事務所

                                </label>
                                <input type="text" class="form-control" id="" value="">
                                <label for="project-name" class="col-sm-2 col-form-label">電話
                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-phone"></i></span>
                                </div>
                            
                                <label for="project-name" class="col-sm-2 col-form-label">電子郵件 *
                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-envelope"></i></span>
                                </div>
                                <label for="project-name" class="col-sm-2 col-form-label">製作年月日

                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseFour">
                                計畫內容概述
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse "
                            aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <label for="project-name" class="col-sm-2 col-form-label">計畫目的</label>
                                <textarea class="form-control" placeholder="" id=""></textarea>
                                <label for="project-name" class="col-sm-2 col-form-label">計畫範圍
                                </label>
                                <textarea class="form-control" placeholder="" id=""></textarea>
                                <label for="project-name" class="col-sm-2 col-form-label">開挖整地概述
                                </label>
                                <textarea class="form-control" placeholder="" id=""></textarea>
                                <label for="project-name" class="col-sm-2 col-form-label">水土保持設施
                                </label>
                                <textarea class="form-control" placeholder="" id=""></textarea>
                                <label for="project-name" class="col-sm-2 col-form-label">開發期間之防災措施
                                </label>
                                <textarea class="form-control" placeholder="" id=""></textarea>
                                <label for="project-name" class="col-sm-2 col-form-label">預定施工方式
                                </label>
                                <textarea class="form-control" placeholder="" id=""></textarea>
                                <label for="project-name" class="col-sm-2 col-form-label">水土保持計畫設施項目、數量及總工程造價
                                </label>
                                <textarea class="form-control" placeholder="" id=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 mb-2 bg-light text-dark rounded">
                <h2 class="h5 mb-4">主管機關辦理情形
                </h2>
                <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFive" aria-expanded="false"
                            aria-controls="flush-collapseFive"> 主管機關辦理情形
                        </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                                <label for="project-name" class="col-sm-2 col-form-label">案件承辦人員 *
                                </label>
                                <input type="text" class="form-control" id="" value="">
                                <label for="project-name" class="col-sm-2 col-form-label">申請日期
                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="project-name" class="col-sm-2 col-form-label">申請文號

                                </label>
                                <input type="text" class="form-control" id="" value="">
                                <label for="project-name" class="col-sm-2 col-form-label">核准日期


                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="project-name" class="col-sm-2 col-form-label">核准文號


                                </label>
                                <input type="text" class="form-control" id="" value="">
                                <label for="project-name" class="col-sm-2 col-form-label">應開工日期


                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="project-name" class="col-sm-2 col-form-label">提醒開工日期


                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="project-name" class="col-sm-2 col-form-label">實際開工日期


                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="project-name" class="col-sm-2 col-form-label">預定完工日期


                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="project-name" class="col-sm-2 col-form-label">提醒完工日期


                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="project-name" class="col-sm-2 col-form-label">實際完工日期


                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                </div>
                                <label for="project-name" class="col-sm-2 col-form-label">提醒通知人員



                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="">
                                    <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                                </div>


                            </div>
                        </div>
                    </div>
        
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-secondary " href="/WSProject.html"><i
                            class="fas fa-times-circle me-2"></i>取消</a>
                    <button class="btn btn-primary" type="button"><i class="fas fa-save me-2"></i>儲存</button>
                    <button class="btn btn-dark " type="button"><i class="fas fa-file-export me-2"></i>匯出</button>
                </div>
            </div>


        </div>
    </div>
</main>


<?php include "includes/footer.php" ?>