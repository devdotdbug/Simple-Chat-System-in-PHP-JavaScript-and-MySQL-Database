<?php session_start();
    require("../c.con/@conn.php");
    require("../info_off.php");
    $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
    $connection->string();

    $myid = $info->id;
    $sql0 = "SELECT * FROM friendrequest WHERE userto='$myid'";
    $q0 = $connection->conn->query($sql0);
    while($request = $q0->fetch_assoc()){

        $sql = "SELECT id, username, photo, gender FROM users WHERE id='".$request["userfrom"]."'";
        $row = $connection->conn->query($sql)->fetch_assoc();
        $im = ($row["photo"]=="default") ? "uploads/default.png" : $row["photo"];
        $gen_i = ($row["gender"] == "male") ? "<i class='bi bi-gender-male'></i>" : "<i class='bi bi-gender-female'></i>";
        $intro = ($row["gender"] == "male") ? "Hello!!" : "Hi!";
        echo("
            <div class='people-card'>
            <button class='request-button w3-right' id='qb' onclick='cancelRequest(`".$row["id"]."`)'>Say No</button>
                <button class='request-button w3-right' id='qb' onclick='acceptRequest(`".$row["id"]."`)'>Say Yes</button>
                <img src='$im' alt='Image of ".$row["username"]."' style='width:50px;height:50px;'><br>
                <span class='people-card-name'><b>".$row["username"]."</b></span><br>
                <i class='bi bi-volume-up' style='font-size:1.5em;'></i> $intro lets be friends<br><p></p>
                                <div class='tip-box'>
                                    <img src='$im' alt='Image of ".$row["username"]."' style='width:100px;height:100px;'><br>
                                <span class='people-card-name'><b>".$row["username"]."</b></span><br>
                            <span class='people-card-name'>$gen_i<b>".$row["gender"]."</b></span><br>
                        <a href='user?p=csdfKJ8esdnfj4DKFD58esjdkfs&_uid=".$row["id"]."'>View profile</a>
                    </div>
                </div>
       ");
    }
    if(!$q0->num_rows > 0){echo("<h3><i class='bi bi-volume-up'></i>Hmmm!!! People didn't try to associate with you.</h3>");}
    #print_r($connection->conn->error);
?>