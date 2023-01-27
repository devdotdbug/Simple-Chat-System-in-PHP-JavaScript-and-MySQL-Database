<?php session_start();
    if (isset($_GET["signout"]) && $_GET["signout"] == 345834579345) {
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        header("location:signin");
    } else {
        header("Location: error?l=".rand());
    }
?>