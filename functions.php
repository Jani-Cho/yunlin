<?php include "includes/db.php"; ?>


<?php
function comfirmQuery($result, $text, $page){

    global $connection;
    
    if(!$result){
        die("QUERY FAILED" . mysqli_error($connection));
    }else{
        if($text){
            echo "<script type='text/javascript'>alert('$text');</script>";
        }
        if($page){
            echo "<script type='text/javascript'>window.location.href='$page';</script>";
        }
    }

    return $result;
}


function showAllProjects($type, $table){
    global $connection;

    $id= 'ws'.$type.'_id';
    $query = "SELECT * FROM $table ORDER BY $id DESC LIMIT 10 ";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Error: ' . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($result)){
        $ws_id= $row['ws'.$type.'_id'];
        $ws_name= $row['ws'.$type.'_name'];
        $ws_unit= $row['ws'.$type.'_vol_name'];
        $ws_undertaker= $row['ws'.$type.'_undertaker'];
        if($type == 'p'){ 
            $url = 'WSProject';
        }else if($type == 's'){
            $url = 'WSSimpleApply';
        }else if($type == 'v'){
            $url = 'WSViolate';
        }else if($type == 'l'){
            $url = 'WSLimit';
        }
 

        echo "<tr>
        <td>$ws_id</td>
        <td><a href='$url.php?type=edit-project&pj_id=$ws_id'>$ws_name</a></td>
        <td>$ws_unit</td>
        <td>$ws_undertaker</td>
        </tr>";
    }
}


function createRole(){
    global $connection;

    $role_name = $_POST['role_name'];
    $role_ch = $_POST['role_ch'];
    $remark = $_POST['remark'];

    $role_name = mysqli_real_escape_string($connection, $role_name );
    $role_ch = mysqli_real_escape_string($connection, $role_ch );
    $remark = mysqli_real_escape_string($connection, $remark );

    $query = "INSERT INTO roles(role_name,role_ch,remark) ";
    $query .= "VALUES ('$role_name', '$role_ch', '$remark')";

    $create_role = mysqli_query($connection, $query);
    comfirmQuery($create_role, '新增角色成功', null);
}
function updateRole(){
    global $connection;

    $role_name = $_POST['role_name'];
    $role_ch = $_POST['role_ch'];
    $remark = $_POST['remark'];

    $query = "UPDATE roles SET ";
    $query .= "role_name = '$role_name', ";
    $query .= "role_ch = '$role_ch' ";
    $query .= "remark = '$remark' ";
    $query .= "WHERE user_id = $id ";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Error: ' . mysqli_error($connection));
    }
}
function showAllRole(){
    global $connection;
    $query = "SELECT * FROM roles ";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Error: ' . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($result)){
        $role_id= $row['role_id'];
        $role_name= $row['role_name'];
        $role_ch= $row['role_ch'];
        $remark= $row['remark'];
        echo "<tr>
        <td> <input class='form-check-input' type='checkbox' id='$role_id'></td>
        <td>$role_ch</td>
        <td>$role_name</td>
        <td>$remark</td>
        <td><input class='form-check-input' type='checkbox'></td>
        <td>
        
        <div data-bs-toggle='modal' data-bs-target='#roleEditModal'>
        <i class='fas fa-edit'></i></div>
        <td><i class='fas fa-cog'></i></td>
    </tr>";
    }
}
function showAllData(){
    global $connection;
    $query = "SELECT * FROM users ";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Error: ' . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($result)){
        $id= $row['user_id'];
        echo "<option value='$id'>$id</option>";
    }
}

function updateData(){
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['user_id'];
    
    $query = "UPDATE users SET ";
    $query .= "username = '$username', ";
    $query .= "password = '$password' ";
    $query .= "WHERE user_id = $id ";
   
 
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}
function deleteData(){
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['user_id'];
    
    $query = "DELETE FROM users ";
    $query .= "WHERE user_id = $id ";
   
 
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}


?>