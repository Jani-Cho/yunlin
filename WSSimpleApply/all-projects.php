
<?php

if(isset($_GET['delete'])){
    $the_wss_id = $_GET['delete'];
    $query = "DELETE FROM $WSSimple WHERE wss_id = {$the_wss_id}";
    $delete_query = mysqli_query($connection, $query);

    
    comfirmQuery($delete_query, '刪除完成', 'WSSimpleApply.php');

    
};

if(isset($_POST['wss_select_pj_delete'])){
    $all_select = $_POST['wss_select_pj'];
    $all_select_pj = implode(', ', $all_select);

    $query = "DELETE FROM $WSSimple WHERE wss_id IN($all_select_pj) ";
    $delete_query = mysqli_query($connection, $query);

    
    comfirmQuery($delete_query, '刪除完成', 'WSSimpleApply.php');
};

$num = 10; // 分頁筆數
$total = $num;


if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

if(isset($_GET['total'])){
    $total = intval($_GET['total']);
}else{
    $total = $num;
}


if($page == 1){
    $show = 0;
}else{
    $show = ($page * $total) - $total;
}

if(isset($_GET['order'])){
    $order = $_GET['order'];
}else{
    $order = 'wss_close'; // 預設排序對象
}

if(isset($_GET['sort'])){
    $sort = $_GET['sort'];
}else{
    $sort = 'ASC'; // 預設排序方向
}

$post_query_count = "SELECT * FROM $WSSimple";
$find_count = mysqli_query($connection, $post_query_count);
$count = mysqli_num_rows($find_count);

$pages = ceil($count / $total);


$query = "SELECT * FROM $WSSimple ORDER BY $order $sort LIMIT $show, $total";
$select_all_WSsimple_query = mysqli_query($connection, $query);
?>
<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <h1 class="h4 mb-4">簡易水保申請書</h1>
            </div>
            <div class="p-4 mb-2 bg-light text-dark rounded">

                <form class="row" action="WSSimpleApply.php?type=search" method="post">
                    <div>
                        <label for="project-search">關鍵字查詢
                        </label>
                        <input name="search" type="text" class="form-control mb-2" id="project-search" placeholder="請輸入關鍵字">
                        <div class="input-group ">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="state" id="project-closed" value="1">
                                <label class="form-check-label" for="project-closed">已結案</label>
                            </div>
                          
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" name="submit"><i class="fas fa-search me-2"></i>查詢</button>
                        <button class="btn btn-secondary" type="button" onclick="window.location.href='WSSimpleApply.php'">列出所有</button>
                    </div>
                </form>
            </div>
            <div class="p-4 mb-2 bg-light text-dark rounded">
                <form class="row align-items-center" action="includes/export.php" method="post">
                    <div class="col-lg-2">
                        <input type="hidden" name="get_type" value="wss">
                        <select name="get_year" class="form-select">
                            <option value="" selected>年度</option>
                            <option value="2021">110</option>
                            <option value="2022">111 </option>
                            <option value="2023">112 </option>

                        </select>                    
                    </div>
                    <div class="col-lg-2">
    
                        <button class="btn btn-dark" type="button" onclick="this.form.submit()"><i class="fas fa-file-export me-2"></i>報表輸出</button>
                    </div>
                </form>
                <form method="post">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">

                        <a class="btn btn-primary me-md-2 " href="WSSimpleApply.php?type=add-project"><i
                                class="fas fa-plus me-2"></i>新增</a>
                        <button type="button" class="btn btn-danger me-md-2 " data-bs-toggle='modal' data-bs-target='#deleteModal'><i class="fas fa-trash me-2"></i>刪除
                        </button>
                        <!-- <button class="btn btn-danger me-md-2 " name="wss_select_pj_delete"><i class="fas fa-trash me-2"></i>刪除
                        </button> -->
                    </div>

                    <div class="table-responsive">
                        
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col"> <input class="form-check-input" type="checkbox" id="select-all" ></th>
                                    <?php
                                            $vol = '[{"title_cn":"序號","title_en":"wss_id"},
                                            {"title_cn":"結案進度","title_en":"wss_close"},
                                            {"title_cn":"計畫名稱","title_en":"wss_name"},
                                            {"title_cn":"水土保持義務人名稱","title_en":"wss_vol_name"},
                                            {"title_cn":"案件承辦人員","title_en":"wss_undertaker"}]';
                                            $vol_array = json_decode( $vol, true );

                                            foreach($vol_array as $key=>$item) { 
                                                $title_cn = $item['title_cn']; 
                                                $title_en = $item['title_en']; 
                                                if($order == $title_en){
                                                    $type = 'text-primary';
                                                    if($sort == 'ASC'){
                                                        $sortby = 'DESC';
                                                        $icon = '-down';
                                                    }else{
                                                        $sortby = 'ASC';
                                                        $icon = '-up';
                                                    }
                                                }else{
                                                    $sortby = 'ASC';
                                                    $type = 'text-secondary';
                                                    $icon = '';
                                                }
                                                

                                                echo "<th scope='col' class=''>";
                                                echo "<a class='text-light' href='?total=$total&page=$page&order=$title_en&&sort=$sortby'>";
                                                echo "$title_cn";
                                                echo "<i class='fas fa-sort$icon $type'>";
                                                echo "</i>";
                                                echo "</a>";
                                                echo "</th>";
                                            }

                                        ?>
                                
                  
                                    <th scope="col">編輯</th>
                                    <th scope="col">刪除</th>
                                    <th scope="col">匯出</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php 
                                
        
                                while($row = mysqli_fetch_assoc($select_all_WSsimple_query)){
        
                                    $wss_id = $row['wss_id']; //序號
                                    $wss_name = $row['wss_name']; //計畫名稱
                                    $wss_vol_name = $row['wss_vol_name']; //水土保持義務人名稱
                                    $wss_undertaker = $row['wss_undertaker']; //案件承辦人員
                                    $wss_close = $row['wss_close']; //結案進度
                                    if($wss_close == "1"){
                                        $wss_close =  "<span class='badge rounded-pill bg-primary'>已結案</span>";
                                        
                                    }else{
                                        $wss_close =  "<span class='badge rounded-pill bg-secondary'>未結案</span>";
                                       
                                    }
                                    echo "<tr>";
                                    echo "<td> <input class='form-check-input' type='checkbox' name='wss_select_pj[]' value='$wss_id' id='wss_$wss_id'></td>";
                                    echo "<th scope='row'>$wss_id</th>";
                                    echo "<td>$wss_close</td>";
                                    echo "<td>$wss_name</td>";
                                    echo "<td>$wss_vol_name</td>";
                                    echo "<td>$wss_undertaker</td>";
                                    echo "<td><a href='?type=edit-project&pj_id={$wss_id}'><i class='fas fa-edit'></i></a></td>";
                                    echo "<td><i class='fas fa-trash text-danger' data-bs-toggle='modal' data-bs-target='#exampleModal$wss_id'></i></td>";
                                    echo "<td><a href='./WSSimpleApply/project.php?pj_id={$wss_id}' target='_blank'><i class='fas fa-file-export'></i></a></td>";
                                    echo "</tr>";
                                    echo "<div class='modal fade' id='exampleModal$wss_id' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                                    echo "<div class='modal-dialog'>";
                                    echo "<div class='modal-content'>";
                                    echo "<div class='modal-header'>";
                                    echo "<h5 class='modal-title' id='exampleModalLabel'></h5>";
                                    echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                                    echo "</div>";
                                    echo "<div class='modal-body'>";
                                    echo "是否確認刪除計畫 序號[$wss_id] $wss_name ？";
                                    echo "</div>";
                                    echo "<div class='modal-footer'>";
                                    echo "<a class='btn btn-secondary' href='WSSimpleApply.php?delete=$wss_id' >確定</a>";
                                    echo "<button type='button' class='btn btn-danger' data-bs-dismiss='modal'>取消</button>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    
                                }?>
        
        
                            </tbody>
                        </table>
                    </div>

                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                是否確認刪除所選取的這些計畫  ？
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" name="wss_select_pj_delete">確定</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">取消</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include "./includes/pagination.php";?>

                </form>

            </div>

        </div>
    </div>

</main>
