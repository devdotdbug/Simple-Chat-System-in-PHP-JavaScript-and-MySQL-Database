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
        $sql = "INSERT INTO friendrequest(userfrom, userto) VALUES('$userfrom','$userto') ";
        $q = $conn->query($sql);
        //if($q->error){http_response_code(400);}else{http_response_code(200);}
        #print_r($q);
        #echo(mysqli_error($q));

    } else {http_response_code(400);echo("Bad!"); }
?>