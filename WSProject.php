<?php 
$pageTitle = "水土保持計畫案件";
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
    case 'add-project';

        include "WSProject/add-project.php";

    break;

    case 'edit-project';

        include "WSProject/edit-project.php";
    
    break;

    case 'search';

        include "WSProject/search.php";
    
    break;

    default:

        include "WSProject/all-projects.php";

    break;
}
?>

<?php include "includes/footer.php" ?>