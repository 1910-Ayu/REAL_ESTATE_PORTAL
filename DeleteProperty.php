

<?php
include_once("config/config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "delete from property where sno = $id");

if($result){
    header("Location: ViewProperties.php");
}
?>

