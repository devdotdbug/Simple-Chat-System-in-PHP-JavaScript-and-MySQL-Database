<?php
    session_start();
    include("../c.con/@conn.php");
    $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
    $connection->string();
    if(!isset($_SESSION["username"])){http_response_code(404);exit;}
    if(!isset($_SESSION["password"])){http_response_code(404);exit;}
    function _test_data($data) {
        $data = htmlspecialchars($data);
        $data = trim($data);
        stripslashes($data);
        return $data;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $chat_key = $_POST["chat_key"];
        $uid = $_POST["uid"];
        $mid = $_POST["mid"];
        $mtxt = $_POST["mtxt"];
        $submit = true;
        require("../theme/xcon/xcon_setter.php");
        if(empty($mtxt)){$submit = false;}

        if(isset($_POST["chat_key"]) && $submit === true){
            $sql = "INSERT INTO messages(chat_key, sender, receiver, messages) VALUES(?,?,?,?)";
            $statement = $connection->conn->prepare($sql);
            $statement->bind_param("ssss", $chat_key, $sender, $receiver, $messages);
                $chat_key = _test_data($chat_key);
                $sender = _test_data($mid);
                $receiver = _test_data($uid);
                $messages = _test_data($mtxt);
            $statement->execute();
            $statement->close();
            $connection->conn->close();
        }
    } else {http_response_code(400);}
?>