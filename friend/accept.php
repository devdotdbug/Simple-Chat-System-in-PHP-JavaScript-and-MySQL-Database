<?php
    #if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])){header("Location: /error");}
    if (isset($_GET["q_f"]) && isset($_GET["_uid"]) && isset($_GET["ufm"]) && $_GET["q_f"] == "dfj") {

        require("../c.con/@conn.php");
        $user1 = $_GET["_uid"];
        $user2 = $_GET["ufm"];

        $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
        $connection->string();
        $conn = $connection->conn;
        $sql1 = "SELECT chat_id FROM users WHERE id='$user1'";
        $sql2 = "SELECT chat_id FROM users WHERE id='$user2'";
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
        if(!$result1->num_rows > 0) { exit; }
        if(!$result2->num_rows > 0) { exit; }
        $row1 = $result1->fetch_assoc();
        $row2 = $result2->fetch_assoc();
        $friend_id = $row1["chat_id"].$row2["chat_id"];
        $sql3 = "INSERT INTO friends(userskey, user1, user2) VALUES('$friend_id','$user1','$user2')";
        $conn->query($sql3);
        $sql = "DELETE FROM friendrequest WHERE userfrom in('$user1','$user2') AND userto in('$user2','$user1')";
        $conn->query($sql);
        #print_r($conn);


    } else {http_response_code(400);echo("Bad!"); }
?>