<?php 
$pageTitle = "超限利用";
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

        include "WSLimit/add-project.php";

    break;

    case 'edit-project';

        include "WSLimit/edit-project.php";
    
    break;

    case 'search';

        include "WSLimit/search.php";
    
    break;

    default:

        include "WSLimit/all-projects.php";

    break;
}
?>

<?php include "includes/footer.php" ?>