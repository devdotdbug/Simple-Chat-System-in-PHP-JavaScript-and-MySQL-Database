<?php session_start(); require("c.con/@conn.php");
    require("info_off.php");
    $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
    $connection->string();
    $conn = $connection->conn;
    $info = new User_info($connection->conn);
    $id = $info->id;
    $sql1 = "SELECT * FROM friends WHERE user1='$id' OR user2='$id'";
    $r = $conn->query($sql1);
    $number_of_friends = 0;
    if (!$r->num_rows > 0) {
        echo("<h2>You do not have a friend!</h2>");
    } else {
        while ($friends = $r->fetch_assoc()) {
            $p_id1 = $friends["user1"];
            $p_id2 = $friends["user2"];
            $sql2 = "SELECT id, username, gender, photo FROM users WHERE id='$p_id2'";
            $friends = $conn->query($sql2)->fetch_assoc();
            $gender = ($friends["gender"] == "male")?"<i class='bi bi-gender-male'></i>":"<i class='bi bi-gender-female'></i>";
            
            if ($friends["id"] != $id) {
                $uid = $friends["id"];
                echo("
                    <a href='./message?&uid=$uid' class='my-chats-list'>
                        <img src='".$friends["photo"]."' alt='Photo' style='width:50px;height:50px;'>
                        <span class='my-name'>".$friends["username"]."</span>
                        <spna class='my-gender'>$gender</span>
                    </a>
                "); 
            }
            
            $sql2 = "SELECT id, username, gender, photo FROM users WHERE id='$p_id1'";
            $friends = $conn->query($sql2)->fetch_assoc();
            $gender = ($friends["gender"] == "male")?"<i class='bi bi-gender-male'></i>":"<i class='bi bi-gender-female'></i>";
            
            if ($friends["id"] != $id) { 
                $uid = $friends["id"];
                echo("
                    <a href='./message?&uid=$uid' class='my-chats-list'>
                        <img src='".$friends["photo"]."' alt='Photo' style='width:50px;height:50px;'>
                        <span class='my-name'>".$friends["username"]."</span>
                        <spna class='my-gender'>$gender</span>
                    </a>
                "); 
            }
            
        }
    }
    #print_r($connection->conn);
?>