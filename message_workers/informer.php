<?php
    session_start();
    require("../c.con/@conn.php");
    require("../info_off.php");

    #Chat INFO
    if(isset($_GET["uid"])){
        $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
        $connection->string();
        $conn = $connection->conn;
    
        $person_sql = "SELECT id, username, photo, gender FROM users WHERE id='".$_GET["uid"]."'";
        $person_result = $conn->query($person_sql);
        if(!$person_result->num_rows > 0){header("Location: /chats");exit;}
        $person_row = $person_result->fetch_assoc();
        $user1 = $info->id;
        $user2 = $person_row["id"];
    
    }else{header("Location: /error");exit;}
    
        $friendship = $conn->query("SELECT * FROM friends WHERE user1 in('$user1','$user2') AND user2 in('$user2','$user1')")->fetch_assoc();
        $chat_key = $friendship["userskey"];
    #END

        $SQL = "(SELECT * FROM messages WHERE chat_key='$chat_key' ORDER BY id DESC LIMIT 10) ORDER BY id";
        $result = $conn->query($SQL);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $message = $row["messages"];
                require("../theme/xcon/xcon.php");
                $date = $row["date"];
                if($row["sender"] == $user1){
                    echo("
                        <div class='messaged-box-out msgbo'>
                        <div class='messaged-box right-box'>
                            <div class='text-box'>
                                $message
                            </div>
                            <div class='date'><small>$date</small></div>
                        </div>
                        </div>
                   ");
                }else{
                    echo("
                        <div class='messaged-box-out msgbo'>
                        <div class='messaged-box left-box'>
                            <div class='text-box'>
                                $message
                            </div>
                            <div class='date'><small>$date</small></div>
                        </div>
                        </div>
                    ");
                }
            }
        }else{
            echo("<h2>Start a chat  with this user</h2>");
        }
?>