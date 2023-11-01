
<?php



if(isset($_GET['delete'])){
    $the_wsl_id = $_GET['delete'];
    $query = "DELETE FROM wslimit WHERE wsl_id = {$the_wsl_id}";
    $delete_query = mysqli_query($connection, $query);

    
    comfirmQuery($delete_query, '刪除完成', 'wslimit.php');

    
};
if(isset($_POST['wsl_select_pj_delete'])){
    $all_select = $_POST['wsl_select_pj'];
    $all_select_pj = implode(', ', $all_select);

    $query = "DELETE FROM wslimit WHERE wsl_id IN($all_select_pj) ";
    $delete_query = mysqli_query($connection, $query);

    
    comfirmQuery($delete_query, '刪除完成', 'wslimit.php');
};
$total = 10; // 分頁筆數

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

if($page == 1){
    $page_1 = 0;
}else{
    $page_1 = ($page * $total) - $total;
}


if(isset($_POST['submit'])){
    $search = $_POST['search'];
    if(isset($_POST['state'])){
        $state = 1;
    }else{
        $state = "";
    }

    if($search == "" && $state != 1){


        $count = 0;
    }else{
        $query = "SELECT * FROM wslimit WHERE (wsl_apy_num LIKE '%$search%' OR wsl_undertaker LIKE '%$search%' OR wsl_vol_name LIKE '%$search%' OR wsl_id LIKE '%$search%') AND wsl_close LIKE '%$state%' ";

        $search_query = mysqli_query($connection, $query);
        comfirmQuery($search_query, null, null);
    
        $count = mysqli_num_rows($search_query);
        $pages = ceil($count / $total);
    }
 
 }

?>
<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <h1 class="h4 mb-4">違規取締表單</h1>
            </div>
            <div class="p-4 mb-2 bg-light text-dark rounded">

                <form class="row" action="" method="post">
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
                        <button class="btn btn-secondary" type="button" onclick="window.location.href='wslimit.php'">列出所有</button>
                    </div>
                </form>
            </div>
            <div class="m-2">
            <?php     
            
                if(isset($search)){
                    if($count == 0){
                        if($state == "1"){
                            echo '無搜尋 '.$search.' 相關且已結案的結果';
                        }else{
                            echo '無搜尋 '.$search.' 結果';
                        }
                    }else{
                        if($search != "" && $state == "1"){
                            echo '與關鍵字「'.$search.'」相關且已結案的義務人、案件編號或承辦人員，共'.$count.'筆';
                        }else if($search == "" && $state == "1"){
                            echo '已結案，共'.$count.'筆';
    
                        }else{
                            echo '與關鍵字「'.$search.'」相關義務人、案件編號或承辦人員，共'.$count.'筆';
    
                        }
            ?>
            </div>
            <div class="p-4 mb-2 bg-light text-dark rounded">
                <form method="post">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">

                        <a class="btn btn-primary me-md-2 " href="WSProject.php?type=add-project"><i
                                class="fas fa-plus me-2"></i>新增</a>
                        <button type="button" class="btn btn-danger me-md-2 " data-bs-toggle='modal' data-bs-target='#deleteModal'><i class="fas fa-trash me-2"></i>刪除
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col"> <input class="form-check-input" type="checkbox" id="select-all" ></th>
                                    <th scope="col">序號</th>
                                    <th scope="col">案件進度</th>
                                    <th scope="col" class="col-sm-3">計畫名稱<i class="fas fa-sort"></i></th>
                                    <th scope="col" class="col-sm-3">行為人名稱<i class="fas fa-sort"></i></th>
                                    <th scope="col" class="col-sm-3">承辦人<i class="fas fa-sort"></i></th>
                                    <th scope="col">編輯</th>
                                    <th scope="col">刪除</th>
                                    <th scope="col">匯出</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php 
                                

                                while($row = mysqli_fetch_assoc($search_query)){

                                    $wsl_id = $row['wsl_id']; //序號
                                    $wsl_name = $row['wsl_name']; //計畫名稱
                                    $wsl_vol_name = $row['wsl_vol_name']; //水土保持義務人名稱
                                    $wsl_undertaker = $row['wsl_undertaker']; //承辦人
                                    $wsl_close = $row['wsl_close']; //案件進度
                                    if($wsl_close == "1"){
                                        $wsl_close =  "<span class='badge rounded-pill bg-primary'>已結案</span>";
                                        
                                    }else{
                                        $wsl_close =  "<span class='badge rounded-pill bg-secondary'>未結案</span>";
                                       
                                    }
                                    echo "<tr>";
                                    echo "<td> <input class='form-check-input' type='checkbox' name='wsl_select_pj[]' value='$wsl_id' id='wsl_$wsl_id'></td>";
                                    echo "<th scope='row'>$wsl_id</th>";
                                    echo "<td>$wsl_close</td>";
                                    echo "<td>違規取締表單0$wsl_id</td>";
                                    echo "<td>$wsl_vol_name</td>";
                                    echo "<td>$wsl_undertaker</td>";
                                    echo "<td><a href='?type=edit-project&pj_id={$wsl_id}'><i class='fas fa-edit'></i></a></td>";
                                    echo "<td><i class='fas fa-trash text-danger' data-bs-toggle='modal' data-bs-target='#exampleModal$wsl_id'></i></td>";
                                    echo "<td><a href='./wslimit/project.php?pj_id={$wsl_id}' target='_blank'><i class='fas fa-file-export'></i></a></td>";
                                    echo "</tr>";
                                    echo "<div class='modal fade' id='exampleModal$wsl_id' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                                    echo "<div class='modal-dialog'>";
                                    echo "<div class='modal-content'>";
                                    echo "<div class='modal-header'>";
                                    echo "<h5 class='modal-title' id='exampleModalLabel'></h5>";
                                    echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                                    echo "</div>";
                                    echo "<div class='modal-body'>";
                                    echo "是否確認刪除計畫 序號[$wsl_id] $wsl_name ？";
                                    echo "</div>";
                                    echo "<div class='modal-footer'>";
                                    echo "<a class='btn btn-secondary' href='wslimit.php?delete=$wsl_id' >確定</a>";
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
                                    <button class="btn btn-secondary" name="wsl_select_pj_delete">確定</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">取消</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php  }};?>                
                    
                </form>
            </div> 
        </div>
    </div>

</main>