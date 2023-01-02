

<?php
include_once("config/config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "delete from broker where sno = $id");

if($result){
    header("Location: ViewBrokers.php");
}
?>
