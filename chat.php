<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat App</title>
    <link href="styles.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</head>
<body>
    <?php include "connection.php";
        $sql = "SELECT Username FROM Chat";

        $result = mysqli_query($con, $sql);

        echo " <table border='1'>
                <thead>
                   <tr>
                        <th>Contacts</th>
                   </tr>
               </thead>
               <tbody>";


        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Username'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>
         </table> <br><br>";
    ?>
    <!--    form to update SQL table-->
    <form class="chat-send-form">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" required>

        <label for="chat-content">Chat Message</label>
        <textarea id="chat-content" name="chat-content" placeholder="Enter message here..."></textarea>
        <div id="error-log">
                <span id="message-log"><span>
        </div>
    </form>


    <!--    form for listener to receive message-->
    <form class="chat-receive-form">
        <label for="contact-name">Enter Contact Name</label>
        <input type="text" id="contact-name" name="contact-name" placeholder="moe1">

        <button id="receive-btn">Listen</button>

        <label for="retrieved-content">Message Display</label>
        <textarea id="retrieved-content" placeholder="Retrieved message will display here..."></textarea>
    </form>
</body>
</html>