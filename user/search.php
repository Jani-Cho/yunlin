
<?php
if(isset($_POST['user_select_delete'])){
    $all_select = $_POST['user_select'];
    $all_select_pj = implode(', ', $all_select);

    $query = "DELETE FROM userlist WHERE userid IN($all_select_pj) ";
    $delete_query = mysqli_query($connection, $query);

    
    comfirmQuery($delete_query, '刪除完成', 'UserList.php');
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
    $search_type = $_POST['select_search'];
    $search_state = $_POST['user_state'];
    $search = $_POST['search'];

    if($search == ""){

        $count = 0;
    }else{

        if($search_type == "all"){
            if($search_state == 'all'){
                $query = "SELECT * FROM userlist WHERE user_account LIKE '%$search%' OR user_fullname LIKE '%$search%' OR user_agency LIKE '%$search%' OR user_team LIKE '%$search%' OR user_role LIKE '%$search%' ";
            }else{
                $query = "SELECT * FROM userlist WHERE (user_start LIKE '%$search_state%') AND (user_account LIKE '%$search%' OR user_fullname LIKE '%$search%' OR user_agency LIKE '%$search%' OR user_team LIKE '%$search%' OR user_role LIKE '%$search%')";
            }
        }else{
            if($search_state == 'all'){
                $query = "SELECT * FROM userlist WHERE $search_type LIKE '%$search%' ";
            }else{
                $query = "SELECT * FROM userlist WHERE (user_start LIKE '%$search_state%') AND  ($search_type LIKE '%$search%') ";
            }

        }
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
            <div class="m-2">
            <?php     
             if(isset($search_type)){
                if( $search_type == 'user_account'){$search_name = '帳號';}
                if($search_type == 'user_fullname'){$search_name = '姓名';}
                if($search_type == 'user_agency'){$search_name = '單位';}
                if($search_type == 'all'){$search_name = '';}
             
                if($count == 0){
                    echo $search_name.' 無搜尋關鍵字「'.$search.'」的結果';
                }else{
                if($search != ""){
                    echo $search_name.' 與關鍵字「'.$search.'」相關的結果，共'.$count.'筆';
                }
                ?>
            </div>
            <div class="p-4 mb-2  bg-light text-dark rounded">
                <form method="post">
               
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">

                    <a class="btn btn-primary me-md-2 " href="UserList.php?type=add-user"><i
                            class="fas fa-plus me-2"></i>新增</a>
                    <button type="button" class="btn btn-danger me-md-2 " data-bs-toggle='modal' data-bs-target='#deleteModal'><i class="fas fa-trash me-2"></i>刪除
                    </button>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col"> <input class="form-check-input" type="checkbox" id="select-all" ></th>

                            
                                <th scope="col">序號</th>
                                <th scope="col">帳號</th>
                                <th scope="col">姓名</th>
                                <th scope="col">單位</th>
                                <th scope="col">角色</th>
                                <th scope="col">審核狀態</th>
                                <th scope="col">啟用狀態</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php 
                            

                            while($row = mysqli_fetch_assoc($search_query)){

                                $user_id = $row['userid']; //序號
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
                                    $user_start = "<span class='text-primary'>啟用</span>";
                                }

                                echo "<tr>";
                                echo "<td> <input class='form-check-input' type='checkbox' name='user_select[]' value='$user_id' id='wsp_$user_id'></td>";
                                echo "<th scope='row'>$user_id</th>";
                                echo "<td>$user_account</td>";
                                echo "<td>$user_fullname</td>";
                                echo "<td>$user_agency</td>";
                                echo "<td>$user_role</td>";
                                echo "<td>$user_check</td>";
                                echo "<td>$user_start</td>";
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
                            是否確認刪除所選取的人員帳號  ？
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" name="user_select_delete">確定</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">取消</button>
                            </div>
                        </div>
                    </div>
                </div>

                
            </form>
        </div> 
        <?php  }};?>                
        </div>
    </div>

</main>
