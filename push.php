<?php include "connection.php"
    if(isset($_POST['username'] && isset($_POST['password']){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT ChatContent FROM Chat WHERE Username = $username AND 'Password' = $password";

        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0){
            while($data = mysqli_fetch_assoc($result)){

            }
        } else {
            echo json_encode(array('success' => 0));
        }

        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('success' => 0));
    }
?>