<?php session_start(); require("info.php");
if(isset($_GET["uid"])){
    $uid = $_GET["uid"];
    $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
    $connection->string();
    $conn = $connection->conn;
    
    $person_sql = "SELECT id, username, photo, gender, background FROM users WHERE id='".$_GET["uid"]."'";
    $person_result = $conn->query($person_sql);
    if(!$person_result->num_rows > 0){header("Location: /chats");exit;}
    $person_row = $person_result->fetch_assoc();
    $user1 = $info->id;
    $user2 = $person_row["id"];
    
}else{header("Location: /error");exit;}

$friendship = $conn->query("SELECT * FROM friends WHERE user1 in('$user1','$user2') AND user2 in('$user2','$user1')")->fetch_assoc();
$chat_key = $friendship["userskey"];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Messages</title>
		<link rel="stylesheet" href="./theme/@i/bootstrap-icons.css">
		<link rel="stylesheet" href="./layout.css.php">
        <style>
            html, body, #chatsShowBox {
                scroll-behavior: smooth;
            }
        </style>
	</head>
    <body style="overflow-x:hidden;padding:0;margin:0;">
    <header class="chat-header">
        <a style="font-size:45px;color:#000;" href="chats"><i class="bi bi-reply-fill"></i></a>
        <img src="<?php echo($person_row["photo"]); ?>" class="chat-favicon" style="width:50px;height:50px;">
        <h1 style="display:inline-block;">Gab...</h1>
        <img src="<?php echo($info->photo); ?>" class="chat-favicon" style="width:50px;height:50px;">
        <i style="font-size: 40px;float:right;padding: 15px;" class="bi bi-gear"></i>
    </header>
    <main class="chat-body">
        <section class="left">
           <form class="search-box">
               <i class="bi bi-search"></i><input type="text" id="search-box" placeholder="Search in chats">
            </form>
            <div class="tip-profile" id="chat_list_tip"></div>
        </section>
        <section class="middle" id="chatsShowBox">
            <div class="messages_box_home" id="messages_box"></div>
            <div class="message-editor-embed">
                <div class="xcons">
                    <button onclick="sendXcon('xcon-0')"><img src="./theme/xcon/xcon-0.png"></button>
                    <button onclick="sendXcon('xcon-1')"><img src="./theme/xcon/xcon-1.png"></button>
                    <button onclick="sendXcon('xcon-2')"><img src="./theme/xcon/xcon-2.png"></button>
                    <button onclick="sendXcon('xcon-3')"><img src="./theme/xcon/xcon-3.png"></button>
                    <button onclick="sendXcon('xcon-4')"><img src="./theme/xcon/xcon-4.png"></button>
                    <button onclick="sendXcon('xcon-5')"><img src="./theme/xcon/xcon-5.png"></button>
                </div>
                <div class="custom-text-area">
                    <div class="custom-message-ex-box">
                        <form method="get" onsubmit="return false">
                            <textarea placeholder="Write message" id="message_text" rows="1"></textarea>
                            <div class="custom-send-button">
                                <button id="chat_message_submit" onclick='send()'><i class="bi bi-send" style="font-size:x-large"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="right">
            <div class="tip-profile" style="/*background-image:url('<?php if($person_row["background"] == "default"){echo("./uploads/background/default.gif");}else{echo($person_row["background"]);} ?>');background-repeat:no-repeat;background-size:cover;text-align:center;color:#fff;text-shadow:1px 1px 0px #000;padding:8px;*/">
                <?php
                    $pp = ($person_row["photo"] == "default")?"./uploads/default.png":$person_row["photo"];
                    echo("
                        <img src='$pp' style='width:40px;height:40px;border-radius:50%;'>
                        <h2 class='chat-tip-name'>".$person_row["username"]."</h2>
                    ");
                ?>
            </div>
        </section>
    </main>
    <script>
            let chat_area = document.getElementById("chat_list_tip");
            <?php $mid = $info->id; ?>
            let message_box = document.getElementById("messages_box");
            setInterval(() => {
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        message_box.innerHTML = this.responseText;
                    }
            }
        xhttp.open("GET", "./message_workers/informer.php?uid=<?php echo($uid); ?>");
        xhttp.send();
    }, 1000);
    var sendOnce = true;
    function send() {
        if (sendOnce === true) {
            let message = document.getElementById("message_text");
            var submit = true;
            if(message.value == ""){submit = false;}
            if(message.value.length > 5000){submit = false;}
            if (submit===true) {
                var xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        message.value = "";
                        setTimeout(scrolling,2000);
                    }
                }
                xhttp.open("POST", "./message_workers/messenger.php");
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("chat_key=<?php echo($chat_key); ?>&uid=<?php echo($uid); ?>&mid=<?php echo($mid); ?>&mtxt="+message.value);
            }
            sendOnce = false;
        }
        setTimeout(() => { sendOnce = true; }, 1000);
    }

let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            chat_area.innerHTML = this.responseText;
        }
    }
xhttp.open("GET", "chat_list_tip.php", true);
xhttp.send();
window.onload = ()=> {
    setTimeout(() => {
        scrolling();
    }, 2000);
}
function scrolling() {
    let box = document.getElementById("chatsShowBox");
    box.scrollTop += 500;
}
let box = document.getElementById("chatsShowBox");
let oldMsgbo = document.getElementsByClassName("msgbo");
const sessionContainer = ["x",0];
let scrollLimit = 0;

function autoScroll() {
    let msgbo = document.getElementsByClassName("msgbo");
    let SCIndex1 = sessionContainer[1];
    for(let i = 0; i < msgbo.length; i++){
        elemHeight = msgbo[i].offsetHeight;
        scrollLimit += elemHeight;
        scrollLimit += 50;
    }
    if(SCIndex1 < msgbo.length) {
        box.scrollTop = scrollLimit;
        sessionContainer[1] = msgbo.length;
        // console.log(SCIndex1);
        // console.log("new: "+msgbo.length);
    }
    if (oldMsgbo.length < 10) { return; }
    let x = msgbo[9].innerText;
    let SCIndex0 = sessionContainer[0];
    let setItem = true;
    if(setItem === true){
        sessionContainer[0] = oldMsgbo[9].innerText;
        setItem = false;
    }
    if(SCIndex0 != x){
        box.scrollTop = scrollLimit;
        // console.log("old: "+SCIndex0);
        // console.log("new: "+x+"\n"); 
    }
}
setInterval(() => { autoScroll(); }, 500);

var sendOnce = true;
function sendXcon(index) {
        if (sendOnce === true) {
            var submit = true;
            if(index == ""){submit = false;}
            if (submit===true) {
                var xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        setTimeout(scrolling,1000);
                    }
                }
                xhttp.open("POST", "./message_workers/messenger.php");
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("chat_key=<?php echo($chat_key); ?>&uid=<?php echo($uid); ?>&mid=<?php echo($mid); ?>&mtxt="+index+"&type=xcon");
            }
        }
        sendOnce = false;
        setTimeout(() => { sendOnce = true; }, 2000);
}
</script>
</body>
</html>