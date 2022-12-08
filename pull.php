<?php include "connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$contactName = mysqli_real_escape_string($con, $_GET['ContactName']);

$sql = "SELECT ChatContent FROM Chat WHERE Username = '$contactName'";

$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result)){
    echo json_encode($row['ChatContent']);
}

mysqli_close($con);
?>