<?php
    if(!isset($_SESSION["username"])){header("Location: /error");}
    if(!isset($_SESSION["password"])){header("Location: /error");}
    if (isset($_GET["q_f"]) && isset($_GET["_uid"]) && isset($_GET["ufm"]) && $_GET["q_f"] == "dfj") {

        require("../c.con/@conn.php");
        $userto = $_GET["_uid"];
        $userfrom = $_GET["ufm"];

        $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
        $connection->string();
        $conn = $connection->conn;
        $sql = "DELETE FROM friends WHERE user1 in('$userfrom','$userto') AND user2 in('$userfrom','$userto')";
        $conn->query($sql);
        header("location: /user?p=s945u784yhrejkthrjhtndlKSDf");

    } else { header("Location: /error"); }
?>