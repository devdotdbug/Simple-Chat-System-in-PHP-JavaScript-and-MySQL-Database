<?php
    if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
        $connection = new Moses_Inc_Connection("localhost", "root", "", "moses_inc");
        $connection->string();
        $conn = $connection->conn;
        class User_info {
            public $id;
            public $user_name;
            public $photo;
            public $background;
            public $gender;
            protected $email;
            private $password;
            private $connect;
            private $sql;
            private $query;
            private $info;
            public function __construct($network) {
                $this->connect = $network;
                $this->sql = "SELECT * FROM users WHERE email='".$_SESSION["username"]."' AND user_password='".$_SESSION["password"]."'";
                $this->query = $this->connect->query($this->sql);
                $this->info = $this->query->fetch_assoc();
                $this->user_name = $this->info["username"];
                $this->id = $this->info["id"];
                $this->gender = $this->info["gender"];
                $this->photo = $this->info["photo"];
                $this->background = $this->info["background"];
                $this->email = $this->info["email"];
                $this->password = $this->info["user_password"];
                if(!$this->query->num_rows > 0){ unset($_SESSION["password"]); unset($_SESSION["username"]); session_destroy();$r=rand(); header("Location:error.php?r=$r");exit; }
            }
            public function get_email() {
                return $this->email;
            }
        }
    }
    $info = new User_info($connection->conn);
?>