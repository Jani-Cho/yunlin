<?php 
$pageTitle = "系統權限管理";
include "functions.php";
include "includes/header.php";
include "includes/nav.php";

?>
<?php
if(isset($_GET['type'])){
    $type = $_GET['type'];
}else{
    $type = "";
}

switch($type){
    case 'add-user';

        include "user/add-user.php";

    break;

    case 'profile';

        include "user/profile.php";
        
    
    break;

    case 'edit';

        include "user/edit-user.php";
    
    break;

    case 'role';

        include "user/role.php";

    break;

    case 'search';

        include "user/search.php";

    break;

    default:

        include "user/all-user.php";

    break;
}
?>

<?php include "includes/footer.php" ?>