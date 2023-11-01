<?php 
if(isset($_POST['role_select_delete'])){
    $all_select = $_POST['role_select'];
    $all_select_role = implode(', ', $all_select);

    $query = "DELETE FROM roles WHERE role_id IN($all_select_role) ";
    $delete_query = mysqli_query($connection, $query);

    
    comfirmQuery($delete_query, '刪除角色成功', null);
};
if(isset($_POST['submit'])){
    createRole();
}
 
?>

<main>
    <div class="container-fluid p-4">
        <div class="row ">
            <div class="col-12">

                <h1 class="h4 mb-4">角色權限設定
                </h1>
            </div>
        </div>
        <div class="row g-3">
            
            <div class="col-6">
                <form class="form" action="" method="post">  
                <div class="p-3 border bg-light rounded">
                    <h2 class="h5 mb-4">角色列表</h2>
                    <div>
                        <button type="button" class="btn btn-primary btn-sm me-md-2" data-bs-toggle="modal" data-bs-target="#roleCreateModal">
                            <i class="fas fa-plus me-2"></i>新增
                            </button>
                        <button class="btn btn-danger btn-sm me-md-2 " type="button" data-bs-toggle='modal' data-bs-target='#roleDeleteModal'><i
                                class="fas fa-trash me-2"></i>刪除
                        </button>
                        <button class="btn btn-secondary btn-sm me-md-2 " type="button" ><i
                                class="fas fa-trash me-2"></i>批次設定權限
                        </button>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">選取</th>
                                <th scope="col">角色代碼</th>
                                <th scope="col">角色名稱<i class="fas fa-sort"></i></th>
                                <th scope="col">備註<i class="fas fa-sort"></i></th>
                                <th scope="col">顯示系統維護中 <i class="fas fa-sort"></i></th>
                                <th scope="col">編輯</th>
                                <th scope="col">設定</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php 
                            $query = "SELECT * FROM roles ";

                            $select_all_role_query = mysqli_query($connection, $query);
                            
                            while($row = mysqli_fetch_assoc($select_all_role_query)){
                                $role_id= $row['role_id'];
                                $role_name= $row['role_name'];
                                $role_ch= $row['role_ch'];
                                $remark= $row['remark'];

                                $the_role = [$role_id, $role_name, $role_ch, $remark];
                            
                                 echo "<tr>
                                 <td> <input class='form-check-input' type='checkbox' name='role_select[]' value='$the_role[0]' id='role_$the_role[0]'></td>
                                 <td>$the_role[1]</td>
                                 <td>$the_role[2]</td>
                                 <td>$the_role[3]</td>
                                 <td><input class='form-check-input' type='checkbox'></td>
                                 <td>
                                    <div id='edit-modal' data-bs-toggle='modal' data-bs-target='#roleEditModal'>
                                    <i class='fas fa-edit'></i></div>
                                 </td>
                                 <td><i class='fas fa-cog'></i></td>
                             </tr>";

                             }
                            ?>
                  
 

                        </tbody>
                    </table>
                    <div class="modal fade" id="roleCreateModal" tabindex="-1" aria-labelledby="roleCreate" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="roleCreate">新增角色</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="role-create" class="form" action="" method="post">  
                                <div class="modal-body">
                                    <label for="role_ch" class="col-sm-2 col-form-label">角色代碼 *</label>
                                    <input type="text" class="form-control" id="role_ch" name="role_ch">
                                    <label for="role_name" class="col-sm-2 col-form-label">角色名稱 *</label>
                                    <input type="text" class="form-control" id="role_name" name="role_name">
                                    <label for="remark" class="col-sm-2 col-form-label">備註</label>
                                    <input type="text" class="form-control" id="remark" name="remark">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消
                                        </button>
                                        <input type="submit" class="btn btn-primary" value="確認新增" name="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="roleDeleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                是否確認刪除所選取的角色 ？
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" name="role_select_delete">確定</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">取消</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </form>
            </div>
            <div class="col-3">
                <div class="p-3 border bg-light rounded">
                    <h2 class="h5 mb-4">權限顯示
                        
                    </h2>
                    <div>
            
                
            
                        <button class="btn btn-primary btn-sm me-md-2 " type="button"><i class="fas fa-angle-double-down me-2"></i>展開
                        </button>
                        <button class="btn btn-secondary btn-sm me-md-2 " type="button"><i class="fas fa-history me-2"></i>歷程
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="p-3 border bg-light">
                    <h2 class="h5 mb-4">權限設定


                    </h2>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="roleEditModal" tabindex="-1" aria-labelledby="roleEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="roleEdit">編輯角色

            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="role-edit" class="form" action="" method="post">  
            <div class="modal-body">
                <label for="role_ch" class="col-sm-2 col-form-label">角色代碼 *</label>
                <input type="text" class="form-control" id="role_ch" name="role_ch" value="<?php echo $the_role_ch;?>">
                <label for="role_name" class="col-sm-2 col-form-label">角色名稱 *</label>
                <input type="text" class="form-control" id="role_name" name="role_name" value="<?php echo $the_role_name;?>">
                <label for="remark" class="col-sm-2 col-form-label">備註</label>
                <input type="text" class="form-control" id="remark" name="remark" value="<?php echo $the_remark;?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消
                    
                    </button>
                    <input type="submit" class="btn btn-primary" value="確認" name="submit">
                </div>
            </div>
        </form>
    </div>
</div>

