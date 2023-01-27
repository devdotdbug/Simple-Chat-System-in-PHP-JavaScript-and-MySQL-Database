<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        require_once("@conn.php");

        #SIGN IN CODE
        if (isset($_POST["signin"])) {
            function test_data($data) {
                $data = htmlspecialchars($data);
                $data = stripslashes($data);
                $data = trim($data);
                return $data;
            }
            $email = test_data($_POST["username"]);
            $password = test_data($_POST["password"]);
            $submit = true;
            if (empty($email) || empty($password)) { http_response_code(400); $submit=false; }
            if ($submit === true) {
                $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
                $connection->string();
                $conn = $connection->conn;
                if($conn->query("SELECT id FROM users WHERE email='$email' AND user_password='$password'")->num_rows > 0){
                    $_SESSION["username"] = (String) $email;
                    $_SESSION["password"] = (String) $password;
                } else {
                    http_response_code(400);
                    echo("<p>Wrong password or email address.</p>");
                }
            } else {
                http_response_code(400);
            }


            #SIGNUP CODE
        } elseif (isset($_POST["signup"])) {
            function test_data($data) {
                $data = htmlspecialchars($data);
                $data = stripslashes($data);
                $data = trim($data);
                return $data;
            }
            $username = test_data($_POST["username"]);
            $gender = test_data($_POST["gender"]);
            $email = test_data($_POST["email"]);
            $password = test_data($_POST["password"]);
            $submit = true;
            $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
            $connection->string();
            if($connection->conn->query("SELECT id FROM users WHERE email='$email'")->num_rows > 0){
                $submit = false;
                echo("<p><span class='w3-text-red'>SERVICE DETECTED</span> - This email has been used by another user.</p>");
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){$submit=false;echo("Invalid email address");http_response_code(400);}
            
            if (empty($username) || empty($email) || empty($password) || empty($gender)) { http_response_code(400); $submit=false; }
            if ($submit === true) {
                $chars = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
                $n = "";
                $chat_id_arr = array('m','inc');
                for ($i=0; $i < count($chars); $i++) {
                    $z = (int) rand(0,25);
                    array_push($chat_id_arr, $chars[$z]);
                    $n.= $chars[$z];
                }
                $chat_id = (String) $n;
                #print_r($chat_id_arr);
                #echo($chat_id);
                $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
                $connection->string();
                $conn = $connection->conn;
                $query = $conn->prepare("INSERT INTO users(username,chat_id, gender, email, user_password) VALUES(?, ?, ?, ?, ?)");
                $query->bind_param("sssss", $username, $chat_id, $gender, $email, $password);
                    $username = (String) $username;
                    $chat_id = (String) $chat_id.= "@inc";
                    $gender = (String) $gender;
                    $email = (String) $email;
                    $password = (String) $password;
                $query->execute();
                $conn->close();
                $_SESSION["username"] = $email;
                $_SESSION["password"] = $password;
            } else {
                http_response_code(400);
            }

        } elseif (isset($_POST["uploadPhoto"])){
            require_once("../info_off.php");
            $upload_message = "";
            $upload_status = true;
            if(empty($_FILES["photo"])){header("Location:../profile?up_msg=error");exit; }
            $folder = "../uploads/photo/";
            $file = $folder.basename($_FILES["photo"]["name"]);
            $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["photo"]["tmp_name"]);
            if ($check !== false) {
                if($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "gif") {
                    $upload_status = false;
                    $upload_message.=" Sorry only JPG, PNG and GIF file formats are allowed! ";
                }
                if ($upload_status === true) {
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $file)) {
                        $_SESSION["new_file_name"] = $folder."MOSES_INC_IMG_(uploads)_".$info->id."_".rand().".png";
                        if($info->photo != "default"){unlink($info->photo);}
                        $conn->query("UPDATE users SET photo='".$_SESSION["new_file_name"]."' WHERE email='".$info->get_email()."'");
                        rename($file, $_SESSION["new_file_name"]);
                        unset($_SESSION["new_file_name"]);
                        $upload_message = " Your profile photo was successfuly updated! ";
                    } else {
                        $upload_message.=" There was an error uploading your file. ";
                    }
                } else { $upload_message.="Sorry your photo ".htmlspecialchars($_FILES["photo"]["name"])." was not uploaded. "; }
            } else {
                $upload_message.=" Invalid file ";
            }
            header("Location:../profile?up_msg=$upload_message");
            
        } elseif (isset($_POST["uploadBackground"])){
            require_once("../info_off.php");
            $upload_message = "";
            $upload_status = true;
            if(empty($_FILES["background"])){header("Location:../profile?up_msg=error");exit; }
            $folder = "../uploads/background/users/";
            $file = $folder.basename($_FILES["background"]["name"]);
            $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["background"]["tmp_name"]);
            if ($check !== false) {
                if($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "gif") {
                    $upload_status = false;
                    $upload_message.=" Sorry only JPG, PNG and GIF file formats are allowed! ";
                }
                if ($upload_status === true) {
                    if (move_uploaded_file($_FILES["background"]["tmp_name"], $file)) {
                        $_SESSION["new_file_name"] = $folder."MOSES_INC_IMG_(uploads)_".$info->id."_".rand().".jpg";
                        if($info->background != "default"){unlink($info->background);}
                        $conn->query("UPDATE users SET background='".$_SESSION["new_file_name"]."' WHERE email='".$info->get_email()."'");
                        rename($file, $_SESSION["new_file_name"]);
                        unset($_SESSION["new_file_name"]);
                        $upload_message = " Your background image was successfuly updated! ";
                    } else {
                        $upload_message.=" There was an error uploading your file. ";
                    }
                } else { $upload_message.="Sorry your image ".htmlspecialchars($_FILES["photo"]["name"])." was not uploaded. "; }
            } else {
                $upload_message.=" Invalid file ";
            }
            header("Location:../profile?up_msg=$upload_message");
            
        } else {
            http_response_code(401);
        }

        
    } else {
        http_response_code(403);
        header("Location:../error.php?r=".rand());
    }
?>