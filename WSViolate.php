<?php 
$pageTitle = "違規取締案件";
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

        include "WSViolate/add-project.php";

    break;

    case 'edit-project';

        include "WSViolate/edit-project.php";
    
    break;

    case 'search';

        include "WSViolate/search.php";
    
    break;

    default:

        include "WSViolate/all-projects.php";

    break;
}
?>

<?php include "includes/footer.php" ?>