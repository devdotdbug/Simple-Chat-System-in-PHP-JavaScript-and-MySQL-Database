<?php session_start(); $page_title = "User"; include("header.php");
    echo($page->get_html()); 
    require("info.php"); $ref = ""; $body_ref = ""; $search_place = "";
    $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
    $connection->string();

    switch ($_GET["p"]) {
        case "sdfKJ8e39HKJoijo904df4MKDJF49":
            $ref = "Fint People";
            $body_ref = "Sugestions://";
            $search_place = "Search for friends...";
        break;
        case "csdfKJ8esdnfj4DKFD58esjdkfs":
            $ref = "User is on mosesinc";
            $body_ref = "<!--User://-->";
            $search_place = "Search user document...";
        break;
        case "s945u784yhrejkthrjhtndlKSDf":
            $ref = "Your friends on mosesinc";
            $body_ref = "Friends://";
            $search_place = "Search Your friends...";

            $id = $info->id;
            $sql1 = "SELECT * FROM friends WHERE user1='$id' OR user2='$id'";
            $r = $conn->query($sql1);
            $number_of_friends = 0;
            if (!$r->num_rows > 0) {
                $number_of_friends = 0;
            } else {
                while ($freinds = $r->fetch_assoc()) {
                    $p_id1 = $freinds["user1"];
                    $p_id2 = $freinds["user2"];
                    $sql2 = "SELECT id, username, gender, photo FROM users WHERE id='$p_id2'";
                    $freinds = $conn->query($sql2)->fetch_assoc();
                    if($freinds["id"] != $id){ $number_of_friends += 1; }
                    $sql2 = "SELECT id, username, gender, photo FROM users WHERE id='$p_id1'";
                    $freinds = $conn->query($sql2)->fetch_assoc();
                    //SECOND SEARCH
                    if($freinds["id"] != $id){ $number_of_friends += 1; }
                }
            }
            $body_ref.= "($number_of_friends)";
        break;
        case "dfkdiojogi54vpee509fogjd":
            $ref = "People wants to be your friend";
            $body_ref = "Requests://";
            $search_place = "Search for People...";
        break;
        default:
            header("Location: /404");
            exit;
    }
?>
<header class="user-header">
    <a class="w3-button w3-hover-white" href="index"><i class="bi bi-reply-fill w3-xxlarge"></i></a>
    <span id="site-name">mosesinc</span>
    <b><?php echo($ref); ?></b>
</header>
<main class="user-body">
    <section class="left">
        <form class="search-box">
            <i class="bi bi-search"></i><input type="text" id="search-box" placeholder="<?php echo($search_place); ?>">
                </form>
                    </section>

    <section class="right">
        <h2><?php echo($body_ref); ?></h2>
        <?php
            switch ($_GET["p"]) {
                case "sdfKJ8e39HKJoijo904df4MKDJF49":
                    ?>
                    <div id="pContent"><div>
                    <script>
                        const sessionBukit = ["x", "y"];
                        var update = false;
                        function getContents() {
                            let pxhttp = new XMLHttpRequest();
                            pxhttp.onreadystatechange = function() {
                                if(this.readyState == 4 && this.status == 200) {
                                    if(this.responseText.length != sessionBukit[0].length){
                                        sessionBukit[0] = this.responseText;
                                        update = true;
                                    }
                                    if(update === true){
                                        document.getElementById("pContent").innerHTML = this.responseText;
                                        update = false;
                                        //console.log(sessionBukit[0]);
                                    }
                                }
                            }
                            pxhttp.open("GET","user_docx/people.php");
                            pxhttp.send();
                        }
                        setInterval(() => { getContents(); }, 500);
                        //window.addEventListener('click', ()=>{ getContents(); });
                    </script>
                    <?php
                    break;            
                    case "csdfKJ8esdnfj4DKFD58esjdkfs":
                        class User {
                            private $connect;
                            private $sql;
                            public $query;
                            public function __construct($network) {
                                $this->connect = $network;
                                $this->sql = "SELECT * FROM users WHERE id='".$_GET["_uid"]."'";
                                $this->query = $this->connect->query($this->sql);
                            }
                        }
                        $user = new User($connection->conn);
                        if(!$user->query->num_rows > 0){ header("Location: /error");exit; }
                        $user = $user->query->fetch_assoc();
                        $photo = ($user["photo"] == "default") ? "./uploads/default.png" : $user["photo"];
                        $gender = ($user["gender"] == "male") ? "<i class='bi bi-gender-male'></i>" : "<i class='bi bi-gender-female'></i>";
                        echo('
                            <header id="profile-header">
                            <div class="w3-container w3-padding w3-tooltip" id="profile-background">
                            <button class="w3-display-right w3-text w3-button w3-circle" style="margin-right:30px;width:60px;height:60px;" onclick="document.getElementById(`backgroundUploader`).classList.add(`w3-show`)"><i class="bi bi-eye w3-xlarge"></i></button>
                            <div class="w3-gray w3-circle w3-center" style="width:100px;height:100px;overflow:none;margin-left:auto;margin-right:auto;position:relative;">
                            <img class="w3-circle" src="'.$photo.'" alt="Profile image of '.$user["username"].'" style="width:100%;height:100%;">
                            <button class="profile-up-button" onclick="document.getElementById(`photoUploader`).classList.add(`w3-show`)"><i class="bi bi-eye"></i></button>
                            </div><h2 class="user-name">'.strtoupper($user["username"]).'</h2></div>
                        </header>
                        <nav class="profile-nav" id="profileNav">
                            <button class="w3-tooltip"><span class="w3-text tooltip-box w3-hide-small">See photos of '.$user["username"].'</span><i class="bi bi-image"></i></button>
                            <button class="w3-tooltip"><span class="w3-text tooltip-box w3-hide-small">See Videos of '.$user["username"].'</span><i class="bi bi-collection-play"></i></button>
                            <button class="w3-tooltip"><span class="w3-text tooltip-box w3-hide-small">See diaries of '.$user["username"].'</span><i class="bi bi-book"></i></button>
                        </nav>
                        <div>
                        <h3>About</h3>
                        <ul class="w3-ul">
                            <li class="w3-container"><b>Home Town</n>/ <button class="w3-button w3-light-gray w3-circle w3-right" style="width:40px;height:40px;"><i class="bi bi-house-fill"></i></button></li>
                            <li class="w3-container"><b>Gender</n>/ <small>'.$user["gender"].'</small><button class="w3-button w3-light-gray w3-circle w3-right" style="width:40px;height:40px;">'.$gender.'</button></li>
                            <li class="w3-container"><b>Email</n>/ <small>'.$user["email"].'</small><button class="w3-button w3-light-gray w3-circle w3-right" style="width:40px;height:40px;"><i class="bi bi-envelope"></i></button></li>
                        </ul>
                            <h3>Friends</h3>
                        </div>
                    ');

                break;
                case "s945u784yhrejkthrjhtndlKSDf":
                    $id = $info->id;
                    $sql1 = "SELECT * FROM friends WHERE user1='$id' OR user2='$id'";
                    $r = $conn->query($sql1);
                    if (!$r->num_rows > 0) {
                        echo("<h2>You have no friends!</h2>");
                    } else { 
                        while ($freinds = $r->fetch_assoc()) {
                            $p_id1 = $freinds["user1"];
                            $p_id2 = $freinds["user2"];
                            $sql2 = "SELECT id, username, gender, photo FROM users WHERE id='$p_id2'";
                            $freinds = $conn->query($sql2)->fetch_assoc();
                            if($freinds["id"] != $id){ 
                                $im = ($freinds["photo"]=="default") ? "uploads/default.png" : $freinds["photo"];
                                $gen_i = ($freinds["gender"] == "male") ? "<i class='bi bi-gender-male'></i>" : "<i class='bi bi-gender-female'></i>";
                                echo("
                                <div class='people-card'>
                                    <img src='$im' alt='Image of ".$freinds["username"]."' style='width:50px;height:50px;'>
                                        <span class='people-card-name'><b>".$freinds["username"]."</b></span>
                                                <div class='tip-box'>
                                                    <img src='$im' alt='Image of ".$freinds["username"]."' style='width:100px;height:100px;'><br>
                                                <span class='people-card-name'><b>".$freinds["username"]."</b></span><br>
                                            <span class='people-card-name'>$gen_i<b>".$freinds["gender"]."</b></span><br>
                                        <a href='user?p=csdfKJ8esdnfj4DKFD58esjdkfs&_uid=".$freinds["id"]."'>View profile</a>
                                    </div>
                                    <button onclick='this.nextElementSibling.style.display=`block`' class='unfriend'>Unfriend</button>
                                    <div class='overay' id='overlay'>
                                        <div class='overay-content'>
                                            <h4>Are You sure you want to unfriend ".$freinds["username"]."?</h4>
                                            <button onclick='window.location.href=`./friend/delete.php?q_f=dfj&_uid=".$freinds["id"]."&&ufm=$id`'>Yes</button>
                                            <button onclick='this.parentElement.parentElement.style.display=`none`'>No</button>
                                        </div>
                                    </div>
                                    </div>
                                ");
                            }
                            $sql2 = "SELECT id, username, gender, photo FROM users WHERE id='$p_id1'";
                            $freinds = $conn->query($sql2)->fetch_assoc();
                            //SECOND SEARCH
                            if($freinds["id"] != $id){ 
                                $im = ($freinds["photo"]=="default") ? "uploads/default.png" : $freinds["photo"];
                                $gen_i = ($freinds["gender"] == "male") ? "<i class='bi bi-gender-male'></i>" : "<i class='bi bi-gender-female'></i>";
                                echo("
                                <div class='people-card'>
                                    <img src='$im' alt='Image of ".$freinds["username"]."' style='width:50px;height:50px;'>
                                        <span class='people-card-name'><b>".$freinds["username"]."</b></span>
                                                <div class='tip-box'>
                                                    <img src='$im' alt='Image of ".$freinds["username"]."' style='width:100px;height:100px;'><br>
                                                <span class='people-card-name'><b>".$freinds["username"]."</b></span><br>
                                            <span class='people-card-name'>$gen_i<b>".$freinds["gender"]."</b></span><br>
                                        <a href='user?p=csdfKJ8esdnfj4DKFD58esjdkfs&_uid=".$freinds["id"]."'>View profile</a>
                                    </div>
                                    <button onclick='this.nextElementSibling.style.display=`block`' class='unfriend'>Unfriend</button>
                                    <div class='overay' id='overlay'>
                                        <div class='overay-content'>
                                            <h4>Are You sure you want to unfriend ".$freinds["username"]."?</h4>
                                            <button onclick='window.location.href=`./friend/delete.php?q_f=dfj&_uid=".$freinds["id"]."&&ufm=$id`'>Yes</button>
                                            <button onclick='this.parentElement.parentElement.style.display=`none`'>No</button>
                                        </div>
                                    </div>
                                </div>
                                ");
                            }
                        }
                    }   
                break;
                case "dfkdiojogi54vpee509fogjd":
                    ?>
                        <div id="get_Friend_requests"></div>
                        <script>
                            var update = true;
                            const sessionBukit = ["x", "y"];
                            setInterval(() => {
                                let getReq = document.getElementById("get_Friend_requests");
                                let xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        if(sessionBukit[0].length != this.responseText.length) {
                                            sessionBukit[0] = this.responseText;
                                            update = true;
                                            //console.log(sessionBukit[0].length);
                                        }
                                        if(update === true){
                                            getReq.innerHTML = this.responseText;
                                            update = false;
                                        }
                                    }
                                }
                                xhttp.open("GET", "./user_docx/friendRequests.php", true);
                                xhttp.send();
                            }, 1000);
                        </script>
                    <?php
                break;
                default:
                    header("Location: /404");
                exit;
            }
        ?>
    </section>
</main>
<script>
    function requestFriend(userto) {
        xhttp = new XMLHttpRequest();
        xhttp.open(
            "GET", 
            "friend/send.php?q_f=dfj&_uid="+userto+"&&ufm=<?php echo($info->id); ?>",
        true);
        xhttp.send();
    }
    function cancelRequest(userfor) {
        xhttp = new XMLHttpRequest();
        xhttp.open(
            "GET", 
            "friend/cancel.php?q_f=dfj&_uid="+userfor+"&&ufm=<?php echo($info->id); ?>", 
        true);
        xhttp.send();
    }
    function acceptRequest(userfor) {
        xhttp = new XMLHttpRequest();
        xhttp.open(
            "GET", 
            "friend/accept.php?q_f=dfj&_uid="+userfor+"&&ufm=<?php echo($info->id); ?>", 
        true);
        xhttp.send();
    }
    window.addEventListener('click', (event)=>{
        let modal = document.getElementById("overlay");
        if(event.target == modal){modal.style.display = "none";}
    });
</script>
<?php $use_footer=false; include("footer.php"); ?>