<?php
    class Moses_Inc_Connection {
        public $server_name;
        protected $user_name;
        private $password;
        protected $db_name;
        public $conn;
        function __construct($server_name, $user_name, $password, $db_name) {
            $this->server_name = $server_name;
            $this->user_name = $user_name;
            $this->password = $password;
            $this->db_name = $db_name;
        }
        public function string() {
            try {
                $this->conn = new mysqli($this->server_name, $this->user_name, $this->password, $this->db_name);
                if ($this->conn->connect_errno) { throw new Exception("Error! Faild to connect."); }
            } catch (Exception $e) {
                exit("Oops! SERVER REQUEST - ERROR.<br>");
            } finally {
                #print_r($this->conn);
            }
        }
    }
?>