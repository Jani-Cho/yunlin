
<?php
if(isset($_POST['user_select_delete'])){
    $all_select = $_POST['user_select'];
    $all_select_pj = implode(', ', $all_select);

    $query = "DELETE FROM userlist WHERE userid IN($all_select_pj) ";
    $delete_query = mysqli_query($connection, $query);

    
    comfirmQuery($delete_query, '刪除完成', 'UserList.php');
};
$num = 10; // 預設顯示筆數
$total = $num; // 實際顯示筆數


if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1; //當前頁數
}

if(isset($_GET['total'])){
    $total = intval($_GET['total']);
}else{
    $total = $num;
}

if($page == 1){
    $show = 0;
}else{
    $show = ($page * $total) - $total; // 從第幾筆開始顯示
}

if(isset($_GET['order'])){
    $order = $_GET['order'];
}else{
    $order = 'userid'; // 預設排序對象
}
if(isset($_GET['sort'])){
    $sort = $_GET['sort'];
}else{
    $sort = 'ASC'; // 預設排序方向
}


$user_query_count = "SELECT * FROM userlist";
$find_count = mysqli_query($connection, $user_query_count);
$count = mysqli_num_rows($find_count); // 總筆數

$pages = ceil($count / $total); // 總頁數


$query = "SELECT * FROM userlist ORDER BY $order $sort LIMIT $show, $total ";
$select_all_user_query = mysqli_query($connection, $query);

?>
<main>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h4 mb-4">所有人員列表</h1>
            </div>
            <div class="p-4 mb-2 bg-light text-dark rounded">

                <form class="row" action="UserList.php?type=search" method="post">
                    <div class="col-lg-1">
                        <label for="select_search" class="text-lg mb-2">查詢欄位</label>

                        <select name="select_search" class="form-select mb-2" >
                            <option value="all" selected>不拘</option>
                            <option value="user_account">帳號</option>
                            <option value="user_fullname">姓名</option>
                            <option value="user_agency">單位</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="user-search" class="text-lg mb-2">關鍵字搜尋</label>
                        <input name="search" type="text" class="form-control mb-2" id="user-search" placeholder="請輸入關鍵字">
                    </div>
                    <div class="col-lg-1">
                        <label for="user_state" class="text-lg mb-2">狀態</label>
                        <select name="user_state" class="form-select mb-2">
                            <option value="all" selected>不拘</option>
                            <option value="N">停用</option>
                            <option value="Y">啟用 </option>
                        </select>                        
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <button class="btn btn-primary me-md-2" name="submit"><i class="fas fa-search me-2"></i>查詢</button>
                        <button class="btn btn-secondary" type="button" onclick="window.location.href='UserList.php'">列出所有</button>
                    </div>
                </form>
            </div>
            <div class="p-4 mb-2 bg-light text-dark rounded">
                <form method="post">
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">

                        <a class="btn btn-primary me-md-2 " href="UserList.php?type=add-user"><i
                                class="fas fa-plus me-2"></i>新增</a>
                        <button type="button" class="btn btn-danger me-md-2 " data-bs-toggle='modal' data-bs-target='#deleteModal'><i class="fas fa-trash me-2"></i>刪除
                        </button>
                        
                    </div>

                    <div class="table-responsive">
                        <table id="tablelist" class="table table-striped table-hover">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col"> <input class="form-check-input" type="checkbox" id="select-all" ></th>
                                    <?php
                                        $vol = '[{"title_cn":"序號","title_en":"userid"},
                                        {"title_cn":"帳號","title_en":"user_account"},
                                        {"title_cn":"姓名","title_en":"user_fullname"},
                                        {"title_cn":"單位","title_en":"user_agency"},
                                        {"title_cn":"角色","title_en":"user_role"}]';
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
                                            

                                            echo "<th scope='col'>";
                                            echo "<a class='text-light' href='?total=$total&page=$page&order=$title_en&&sort=$sortby'>";
                                            echo "$title_cn";
                                            echo "<i class='fas fa-sort$icon $type'>";
                                            echo "</i>";
                                            echo "</a>";
                                            echo "</th>";
                                        }

                                    ?>
                                    <th scope="col">審核狀態</th>
                                    <th scope="col">啟用狀態</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php 
                                

                                while($row = mysqli_fetch_assoc($select_all_user_query)){

                                    $userid = $row['userid']; //序號
                                    $user_account = $row['user_account']; //帳號
                                    $user_fullname = $row['user_fullname']; //姓名
                                    $user_agency = $row['user_agency']; //單位
                                    $user_role = $row['user_role']; //角色
                                    $user_check = $row['user_check']; //審核狀態
                                    if( $user_check == "N"){
                                        $user_check = "<span class='text-primary'>未審核</span>";
                                    }else{
                                        $user_check = "通過";
                                    }
                                    $user_start = $row['user_start']; //啟用狀態
                                    if( $user_start == "N"){
                                        $user_start = "<span class='text-danger'>停用</span>";
                                    }else{
                                        $user_start = "啟用";
                                    }

                                    echo "<tr>";
                                    echo "<td scope='row'> <input class='form-check-input' type='checkbox' name='user_select[]' value='$userid' id='wsp_$userid'></td>";
                                    echo "<td scope='row'>$userid</td>";
                                    echo "<td scope='row'><a href='?type=edit&userid={$userid}'>$user_account</a></td>";
                                    echo "<td scope='row'>$user_fullname</td>";
                                    echo "<td scope='row'>$user_agency</td>";
                                    echo "<td scope='row'>$user_role</td>";
                                    echo "<td scope='row'>$user_check</td>";
                                    echo "<td scope='row'>$user_start</td>";
                                    echo "</tr>";

                                    
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
                                是否確認刪除所選取的人員帳號 ？
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" name="user_select_delete">確定</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">取消</button>
                                </div>
                            </div>
                        </div>
                    </div>
               
                    <div class="mx-auto m-3 row align-items-center"> 
                        每頁 
                        <div class="col-4 col-md-1">

                            <select class="pagesize custom-select  form-select" onchange="window.location='?total='+this.value">
                                    <option value="5" <?php if($total == "5"){ echo " selected"; }?>>5</option>
                                    <option value="10" <?php if($total == "10"){ echo " selected"; }?>>10</option>
                                    <option value="20" <?php if($total == "20"){ echo " selected"; }?>>20</option>
                                    <option value="50" <?php if($total == "50"){ echo " selected"; }?>>50</option>
                                </select>
                            </div>                  
                            筆，
                            第<?php if($count != 0){echo $page."/";};?><?php echo $pages;?>頁，共<?php echo $count;?>筆
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            

                            <?php 
                                
                                if($page > 1){
                                    $pre = "";
                                }else{
                                    $pre = "disabled";
                                }
                            
                                echo "<li class='page-item $pre'><a class='page-link' href='?total=$total&page=".($page-1)."&order=$order&&sort=$sort'>上一頁</a></li>";
                                for($i =1; $i <= $pages; $i++){
                                    if($i == $page){
                                        $active = "active";
                                    }else{
                                        $active = "";
                                    }
                                    echo "<li class='page-item'><a class='page-link $active' href='?total=$total&page={$i}&order=$order&&sort=$sort'>{$i}</a></li>";
                                }

                                if($page < $pages){
                                    $next = "";
                                }else{
                                    $next = "disabled";
                                }
                                echo "<li class='page-item $next'><a class='page-link' href='?total=$total&page=".($page+1)."&order=$order&&sort=$sort'>下一頁</a></li>";
                                
                            
                            ?>
                            
                        
                        </ul>
                    </nav>
                </form>
            </div>

        </div>
    </div>

</main>
