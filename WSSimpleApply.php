<?php 
$pageTitle = "簡易水保申請書";
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

        include "WSSimpleApply/add-project.php";

    break;

    case 'edit-project';

        include "WSSimpleApply/edit-project.php";
    
    break;

    case 'search';

        include "WSSimpleApply/search.php";
    
    break;

    default:

        include "WSSimpleApply/all-projects.php";

    break;
}
?>

<?php include "includes/footer.php" ?>