<?php session_start(); require("../info.php");
    $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
    $connection->string();
    class People {
        private $connect;
        private $sql;
        public $query;
        public function __construct($network) {
            $this->connect = $network;
            $this->sql = "SELECT * FROM users WHERE NOT email='".$_SESSION["username"]."'";
            $this->query = $this->connect->query($this->sql);
        }
    }
    $people = new People($connection->conn);
    if (!$people->query->num_rows > 0) {echo("<h2>No users are available!</h2>");} else { 

    while ($person = $people->query->fetch_assoc()) { $p1 = $info->id; $p2 = $person["id"];
        $check_if_f_sql = "SELECT id FROM friends WHERE user1 in('$p1','$p2') AND user2 in('$p2','$p1')";
        if($conn->query($check_if_f_sql)->num_rows > 0) { 
            continue; 
        }

        $sql9 = "SELECT * FROM friendrequest WHERE userfrom='$p1' AND userto='$p2'";
            $con9 = new mysqli("localhost","root", "", "moses_inc");
                if(!$con9){echo("Con 9 Faild");}
                    $q9 = $con9->query($sql9);
                        $result = $q9->fetch_assoc();
        $sql10 = "SELECT * FROM friendrequest WHERE userfrom='$p2' AND userto='$p1'";
            $q10 = $con9->query($sql10);
                $result10 = $q10->fetch_assoc();
                    #print_r($q10);

                            echo($con9->error);
                                $body = $function = "";
                                    $function = "requestFriend('".$person["id"]."')"; $body = "Associate";

        if($q9->num_rows > 0){
            if($result["userfrom"] == $info->id){ $function = "cancelRequest('".$person["id"]."')"; $body = "Disassociate"; }
        }
        if($q10->num_rows > 0){
            if($result10["userto"] == $info->id){ $function = "acceptRequest('".$person["id"]."')"; $body = "Say Yes"; }
        }
        $send_button = '<button class="request-button" id="qb" onclick="'.$function.'">'.$body.'</button>';
            $uid = $person["id"];
                $im = ($person["photo"]=="default") ? "uploads/default.png" : $person["photo"];
                    $gen_i = ($person["gender"] == "male") ? "<i class='bi bi-gender-male'></i>" : "<i class='bi bi-gender-female'></i>";
                        echo("
                            <div class='people-card'>
                                <img src='$im' alt='Image of ".$person["username"]."' style='width:80px;height:80px;'>
                                $send_button
                                <a href='user?p=csdfKJ8esdnfj4DKFD58esjdkfs&_uid=".$person["id"]."'>
                                    <span class='people-card-name'><b>".$person["username"]."</b></span>
                                        </a>
                                            <div class='tip-box'>
                                                <img src='$im' alt='Image of ".$person["username"]."' style='width:100px;height:100px;'><br>
                                            <span class='people-card-name'><b>".$person["username"]."</b></span><br>
                                        <span class='people-card-name'>$gen_i<b>".$person["gender"]."</b></span><br>
                                    <a href='user?p=csdfKJ8esdnfj4DKFD58esjdkfs&_uid=".$person["id"]."'>View profile</a>
                                </div>
                            </div>
                        ");
        }
    }

?>