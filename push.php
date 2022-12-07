<?php include "connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$responseCode = -1;

if($_POST['Username'] && $_POST['Password'] ){
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $chatContent = $_POST['ChatContent'];

    $sql = "SELECT * FROM Chat WHERE Username = '$username'";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            if($data["Password"] == $password){
                $chatContentSql = "UPDATE Chat SET ChatContent = '$chatContent' WHERE Username = '$username'";

                if(!$con->query($chatContentSql) === TRUE){
                    echo "Error: " . $chatContentSql . "<br>" . $con->error;
                }
                $responseCode = 1;
            } else {
                $responseCode = 0;
            }
        }
    } else {
        $responseCode = 0;
    }
} else {
 $responseCode = 0;
}

echo $responseCode;
?>