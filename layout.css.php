<?php session_start(); ?>
<?php 
    require_once("c.con/@conn.php"); require_once("info_off.php");
    $color = parse_ini_file("theme/config.ini");
    $gender = $info->gender;
    $main_color = $color['other'];
    $main_color = ($gender == "male") ? $color['male'] : $color['female'];
?>
@font-face {
    font-family: mosesincfont;
    src: url(./theme/fonts/CURLZ___.TTF);
}
@font-face {
    font-family: site-font;
    src: url(./theme/fonts/BAUHS93.TTF);
}
body {
    overflow-x: hidden;
    background-color: #f9f9f9;
}
a:link {color: <?php echo($main_color) ?>;}
a:hover {color: <?php echo($main_color) ?>;}
a:visited {color: <?php echo($main_color) ?>;}
a:active {color: <?php echo($main_color) ?>;}
.user-name {
    font-family: mosesincfont !important;
    user-select: none;
    border-radius: 100px 100px 0px 0px;
    color: #fff;
    text-shadow: 1px 1px 0px #444, 2px 2px 1px #000;
    font-size: 200%;
    letter-spacing: 5px;
}
.profile-top-nav {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background-color: #fff;
    box-shadow: 0px 1px 5px rgba(0,0,0,0.1);
    z-index: 5;
}
#profile-background {
    background-color: #f3f3f3;
    padding-top: 50px !important;
    background-image: url("<?php if($info->background == "default"){echo("./uploads/background/default.gif");}else{echo($info->background);} ?>");
    background-repeat: no-repeat;
    background-size: cover;
    background-atatchment: intial;
    background-position: top-left;
}
#profile-header {
    margin-top: 50px;
    text-align: center;
}
.alert {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 5;
}
.profile-nav {
    width: 100%;
    background-color: #fff;
    box-shadow: 0px 2px 5px rgba(0,0,0,0.2);
    position: sticky;
    top: 50px;
    padding: 8px;
    z-index: 1;
    display: flex;
}
@media screen and (max-width:600px) { .profile-nav{ overflow-x: auto; } }
.sticky { position: fixed; }
.profile-nav > button, .profile-nav > a {
    border: none;
    color: #fff;
    border: 1px solid <?php switch($gender){case "male":echo($color['male']);break;case "female":echo($color['female']);break;default:echo("transparent;color:#000");}; ?>;
    color: <?php switch($gender){case "male":echo($color['male']);break;case "female":echo($color['female']);break;default:echo("transparent;color:#000");}; ?>;
    padding: 8px 25px;
    text-decoration: none;
    margin-right: 3px;
    font-size: 25px;
    cursor: pointer;
    background-color: #fff;
    border-radius: 3px;
} 
.profile-nav > button:hover, .profile-nav > a:hover {
    background-color: #fff;
    color: <?php switch($gender){case "male":echo($color['male']);break;case "female":echo($color['female']);break;}; ?>;
}
.profile-up-button {
    position: absolute;
    bottom: 0;
    right: 8px;
    z-index: 1;
    border: 1px solid gray;
    border-radius: 50%;
    height: 30px;
    width: 30px;
}
.profile-body {
    position: relative;
    padding: 3px;
}
.profile-body::after {
    clear: both;
    content: "";
    display: table;
}
.profile-body .left {
    max-width: 100%;
    width: 95%;
    background-color: #fff;
    float: left;
    margin: 16px <?php echo(5 / 2); ?>%;
    min-height: 50vh;
    border-radius: 0px;
    padding: 8px;
    box-shadow: 0px 0px 12px rgba(0,0,0,0.1);
    z-index: 3;
}
.profile-body .right {
    max-width: 100%;
    width: 95%;
    background-color: #fff;
    float: left;
    margin: 16px <?php echo(5 /2); ?>%;
    min-height: 50vh;
    border-radius: 0px;
    box-shadow: 0px 0px 12px rgba(0,0,0,0.1);
    padding: 8px;
    padding-bottom: 200px;
}
.tooltip-box {
    position: absolute;
    font-size: 15px;
    background-color: #fff;
    min-width: 300px;
    max-height: 40px;
    width: auto;
    top: -40px;
    left: 0;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
    border-radius: 3px;
    z-index: 1;
    padding: 5px 8px;
}
.tooltip-box::before {
    content: "";
    position: absolute;
    display: inline-block;
    background-color: transparent;
    border: 8px solid transparent;
    border-left-color: #fff;
    border-bottom-color: #fff;
    padding: 0;
    bottom: -8px;
    left: 8px;
    transform: rotate(-45deg);
    box-shadow: -2px 2px 4px rgba(0,0,0,0.1);
    z-index: 1;
}
.editor {
    background-color: #fff;
    border-bottom: 1px solid #f2f2f2;
    width: 100%;
    margin: 5px auto 0px auto;
    padding: 3px;
}
.editor form {
    display: flex;
}
.editor textarea {
    background-color: transparent;
    width: 60%;
    border: none;
    font-size: 100%;
    padding: 10px 3px;
    resize: none;
    border-radius: 30px;
    font-family: arial;
    font-weight: normal;
}
.editor textarea:focus {
    border: none;
    outline: none;
    box-shadow: 0px 0px 0px transparent;
}
.editor button, .editor input[type=submit] {
    width: <?php echo(40 / 2); ?>%;
    border: none;
    background-color: #f5f5f5;
    border-radius: 50%;
    color: <?php echo($main_color); ?>;
}
.editor button:hover, .editor input[type=submit]:hover { background-color: #f3f3f3; }
.home-top-nav {
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #fff;
    box-shadow: 2px 0px 8px rgba(0,0,0,0.2);
    text-align: center;
    z-index: 2;
}
.home-top-nav a, .home-top-nav button {
    background-color: transparent;
    border: none;
    color: <?php echo($main_color); ?>;
    font-size: 2.5em;
    padding: 8px 15px;
    cursor: pointer;
    text-align: center;
}
.home-body {
    margin-top: 0px;
}
.home-body::after {
    content: "";
    clear: both;
    display: table;
}
.home-body .left {
    width: 25%;
    box-shadow: 0px -25px 25px rgba(0,0,0,0.1);
    height: 100%;
    padding: 8px;
    padding-top: 30px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #fff;
    z-index: 3;
    display: none;
}
.home-body .middle {
    width: 50%;
    padding: 8px;
}
.home-body .right {
    background-color: #fff;
    width: 25%;
    box-shadow: 0px -25px 25px rgba(0,0,0,0.1);
    height: 100%;
    padding: 8px;
    z-index: 3;
    position: fixed;
    top: 0;
    right: 0;
    display: none;
}
.home-body .col {
    float: left;
    width: 100%;
}
.search-box {
    background-color: #fff;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
    padding: 8px;
    border-radius: 25px;
}
.search-box input[type=text] {
    border: none;
    width: 80%;
    font-size: 100%;
}
.search-box input[type=text]:focus {
    border: none;
    outline: none;
    box-shadow: 0px 0px 0px transparent;
}
.search-box .bi {
    border: none;
    width: 20%;
    font-size: 2em;
    color: <?php echo($main_color); ?>;
}
.left-card {
    box-shadow: 0px 0px 8px rgba(0,0,0,0.2);
    padding: 3px;
    border-radius: 15px;
}
.left-links {margin-top: 20px;}
.left-links a {
    text-decoration: none;
    color: #ccc;
}
.left-links .bi {
    color: <?php echo($main_color); ?>;
    font-size: 1.5em;
}
#site-name {
    color: <?php echo($main_color) ?>;
    float: left;
    font-size: 2.5em;
    font-family: site-font;
    margin-left: 3px;
    display: none;
}

.people-card {
    width: 100%;
    height: auto;
    display: block;
    /*box-shadow: 0px 0px 5px rgba(0,0,0,0.1);*/
    margin-top: 0px;
    padding: 8px;
    border-radius: 5px;
    transition: .3s;
    cursor: pointer;
    position: relative;
    background-color: #fff;
    overflow: display;
    border-radius: 0px;
    border-bottom: 1px solid #dddddd;
}
.people-card:hover {
    /*box-shadow: 0px 0px 15px rgba(0,0,0,0.2);*/
    background-color: #f8f8f8;
}
.people-card img {
    border-radius: 50%;
}
.people-card .tip-box {
    z-index: 1;
    background-color: #fff;
    box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
    position: absolute;
    left: -320px;
    padding: 15px;
    top: 0px;
    min-width: 300px;
    min-height: 200px;
    border-radius: 15px;
    display: none;
    text-align: center;
    user-select: none;
    cursor: initial;
}
.people-card .tip-box::after {
    content: " ";
    display: inline-block;
    z-index: 1;
    background-color: #fff;
    border: 15px solid #fff;
    height: 45px;
    width: 45px;
    position: absolute;
    right: -20px;
    top: 15px;
    transform: rotate(130deg);
    box-shadow: -2px -2px 5px rgba(0,0,0,0.1);
}
.people-card:hover .tip-box {
    display: none;
}
.request-button {
    border: none;
    background-color: <?php echo($main_color); ?>;
    color: #fff;
    padding: 8px 15px;
    margin-top: 8px;
    margin-left: 3px;
    border-radius: 3px;
    font-size: 1.1em;
    float: right;
}
.request-button:hover { opacity: 0.8; }
.overay {
    background-color: rgba(0,0,0,0.5);
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    display: none;
    z-index: 5;
    user-select: none;
}
.overay .overay-content {
    background-color: #fff;
    margin-top: 30vh;
    display: block;
    max-width: 100%;
    width: 400px;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    padding: 8px 15px;
    border-radius: 8px;
    box-shadow: 0px 0px 35px rgba(255,255,255,0.3);
}
.overay .overay-content button {
    border: none;
    background: <?php echo($main_color); ?>;
    padding: 4px 15px;
    color: #fff;
    border-radius: 3px;
}
.overay .overay-content button:hover { opacity: 0.8; }
.unfriend {
    border: none;
    background-color: #f44336;
    color: #fff;
    padding: 5px 10px;
    border-radius: 3px;
    float: right;
    margin: 8px;
}
.unfriend:hover {
    box-shadow: 0px 0px 25px rgba(255,0,0,0.3);
}
.my-chats-list {
    background-color: #fff;
    display: block;
    border-bottom: 1px solid #ddd;
    padding: 8px 15px;
    border-radius: 8px 8px 8px 8px;
    text-decoration: none;
    color: #000 !important;
}
.my-chats-list:hover { transition: .3s; background-color: #f9f9f9; }
.my-chats-list img {
    border-radius: 50%;
}
.my-chats-list .my-name { font-size: 1em; text-decoration: none; }
.my-chats-list .my-gender { font-size: 2em; float: right; padding: 8px; }
.chat-header {
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 5;
    background-color: #fff;
    padding: 15px 8px 2px 8px ;
    border-bottom: 1px solid #ddd;
}
<?php #Chat boy style starts ?>
.chat-body {
    box-sizing: border-box;
    width: 100%;
    max-height: 80%;
    height: 100%;
    overflow-x: hidden;
}
.chat-body .left {
    width: 100%;
    float: left;
    padding-top: 100px;
    padding-bottom: 100px;
    max-height: 100%;
    display: none;
    background-color: #fff;
    height: 100%;
    box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
}
.chat-body .middle {
    max-width: 99%;
    min-width: 99%;
    margin: 0px <?php echo(1 / 2); ?>%;
    float: left;
    padding: 3px;
    padding-top: 80px;
    max-height: 70%;
    height: 70vh;
    overflow-y: auto;
    overflow-x: none;
    background-color: transparent;
    display: block;
}
.chat-body .right {
    width: 100%;
    float: left;
    max-height: 20%;
    display: none;
    position: fixed;
    bottom: 0;
    left: 0;
    border: 1px solid #ddd;
    background-color: #fff;
    padding: 0px 0px 25px 8px;
    box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
    height: auto;
}

.messages_box_home {
    width: 100%;
    background-color: transparent;
    display: block;
    max-height: 100%;
}
.messages_box_home .messaged-box {
    max-width: 80%;
    background-color: #f3f3f3;
    padding: 8px;
    border-radius: 8px;
    margin: 8px;
    display: inline-block;
}
.messages_box_home .messaged-box-out .date {
    color: #000;
    display: inline-block;
    margin-top: 3px;
    overflow: hidden;
    background-color: transparent;
    font-size: 0.5em;
}

.messages_box_home .messaged-box-out {
    width: 100%;
    display: block;
    padding: 0;
    margin: 0;
}
.messages_box_home .messaged-box-out::after {
    content: "";
    clear: both;
    display: table;
}
.messages_box_home .right-box {
    background-color: <?php echo($main_color); ?>;
    float: right;
    margin-right: 25px;
    position: relative;
    max-width: 65%;
    word-wrap: break-word;
}
.messages_box_home .right-box::after {
    content: " ";
    background-color: transparent;
    display: inline-block;
    border: 10px solid transparent;
    border-color: transparent <?php echo($main_color); ?> <?php echo($main_color); ?> transparent;
    position: absolute;
    right: -6px;
    top: 10px;
    transform: rotate(-35deg);
}
.messages_box_home .left-box {
    background-color: #e8f1d4;
    float: left;
    margin-left: 25px;
    position: relative;
    max-width: 65%;
    word-wrap: break-word;
}
.messages_box_home .left-box::before {
    content: " ";
    background-color: transparent;
    display: inline-block;
    border: 10px solid transparent;
    border-color: transparent #e8f1d4 #e8f1d4 transparent;
    position: absolute;
    left: -6px;
    top: 10px;
    transform: rotate(120deg);
}
.message-editor-embed {
    position: static;
    background-color: #fff;
    display: block;
    width: 100%;
    padding: 8px 8px 25px 8px;
    position: fixed;
    bottom: 0;
    border-top: 1px solid #ddd;
}
.message-editor-embed textarea {
    border: none;
    width: 75%;
    float: left;
    background-color: #f3f3f3;
    user-select: none;
    padding: 8px 15px;
    height: 100%;
    border-radius: 25px;
    font-size: 150%;
    border: 1px solid #ddd;
}
.message-editor-embed textarea:focus {
    background-color: #f3f3f3;
    outline: none;
    box-shadow: 0px 0px 8px transparent;
}
.message-editor-embed .custom-send-button {
    width: 10%;
    display: block;
    float: left;
    background-color: transparent;
}
.message-editor-embed .custom-send-button button {
    border: none;
    background-color: transparent;
    color: <?php echo($main_color); ?>;
    margin: 8px 15px;
}
.chat-favicon {
    border-radius: 50%;
}
.tip-profile {
    display: none;
}

.user-header {
        background-color: #fff;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
        padding: 5px;
        display: block;
        z-index: 2;
    }
    .user-body {
        margin-top: 0px;
        margin: 0;
        padding: 0;
    }
    .user-body::after {
        content: "";
        clear: both;
        display: table;
    }
    .user-body .col {
        float: left;
    }
    .user-body .left {
        width: 100%;
        box-shadow: 0px -5px 5px rgba(0,0,0,0.1);
        height: 95%;
        padding: 8px;
        padding-top: 80px;
        position: relative;
        top: initial;
        left: initial;
        z-index: 0;
        display: none;
        float: left;
        background-color: #fff;
    }
    .user-body .right {
        width: 100%;
        box-shadow: 0px -0px 0px rgba(0,0,0,0);
        height: 95%;
        padding: 3px;
        padding-top: 40px;
        padding-bottom: 100px;
        z-index: 0;
        display: block;
        position: relative;
        left: initial;
        right:: initial;
        float: left;
        margin-left: 0px;
    }
    



@media screen and (min-width: 600px) {
    .home-top-nav {
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #fff;
        box-shadow: 1px 0px 3px rgba(0,0,0,0.1);
        text-align: center;
        z-index: 2;
    }
    #site-name {
        color: <?php echo($main_color) ?>;
        float: left;
        font-size: 2.5em;
        font-family: site-font;
        margin-left: 3px;
        display: inline-block;
        user-select: none;
    }
    .home-body {
    margin-top: 0px;
    }
    .home-body::after {
    content: "";
    clear: both;
    display: table;
    }
    .home-body .col {
    float: left;
    }
    .home-body .left {
        width: 25%;
        box-shadow: 0px -25px 8px rgba(0,0,0,0.1);
        height: 95%;
        padding: 8px;
        padding-top: 30px;
        position: relative;
        top: initial;
        left: initial;
        z-index: 0;
        display: block;
    }
    .home-body .middle {
        width: 50%;
        padding: 8px;
    }
    .home-body .right {
        width: 25%;
        box-shadow: 0px -25px 8px rgba(0,0,0,0.1);
        height: 95%;
        padding: 8px;
        z-index: 0;
        display: block;
        position: relative;
        left: initial;
        right:: initial;
    }
    .search-box {
    background-color: #fff;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
    padding: 8px;
    border-radius: 25px;
    }
    .search-box input[type=text] {
    border: none;
    width: 80%;
    font-size: 100%;
    }
    .search-box input[type=text]:focus {
    border: none;
    outline: none;
    box-shadow: 0px 0px 0px transparent;
    }
    .search-box .bi {
    border: none;
    width: 20%;
    font-size: 2em;
    color: <?php echo($main_color); ?>;
    }
    .hide-menu { display: none !important; }



    .user-header {
        background-color: #fff;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
        padding: 5px;
        display: block;
        z-index: 2;
    }
    .user-body {
        margin-top: 0px;
    }
    .user-body::after {
        content: "";
        clear: both;
        display: table;
    }
    .user-body .col {
        float: left;
    }
    .user-body .left {
        width: 30%;
        box-shadow: 0px -5px 5px rgba(0,0,0,0.1);
        height: 100%;
        padding: 8px;
        padding-top: 80px;
        position: relative;
        top: initial;
        left: initial;
        z-index: 0;
        display: block;
        float: left;
        background-color: #fff;
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        overflow-x: hidden;
    }
    .user-body .right {
        width: 70%;
        box-shadow: 0px -0px 0px rgba(0,0,0,0);
        height: auto;
        padding: 15px;
        padding-bottom: 200px;
        padding-top: 50px;
        display: block;
        position: relative;
        left: initial;
        right:: initial;
        float: left;
        margin-left: 30%;
        z-index: 0;
    }
    


    .left-card {
    box-shadow: 0px 0px 8px rgba(0,0,0,0.2);
    padding: 3px;
    border-radius: 15px;
    }
    .left-links {margin-top: 20px;}
    .left-links a {
    text-decoration: none;
    color: #ccc;
    }
    .left-links .bi {
    color: <?php echo($main_color); ?>;
    font-size: 1.5em;
    }

    <?php #chat style starts ?>
.chat-header {
    height: 70px;
    margin-left: 25%;
}
.chat-body {
    box-sizing: border-box;
    width: 100%;
    max-height: 100%;
    height: 80vh;
    margin-top: 50px;
    overflow: hidden;
}
.chat-body:after {
    content: "";
    clear: both;
    display: table;
}
.chat-body .left {
    width: 25%;
    float: left;
    padding-top: 30px;
    padding-bottom: 200px;
    max-height: 100%;
    display: block;
    overflow-y: auto;
    height: 100%;
    position: fixed;
    left: 0;
    top: 0;
    z-index: 16;
    background-color: #fff;
    box-shadow: 0px 0px 0px transparent;
    border-right: 1px solid #ddd;
}
.chat-body .middle {
    max-width: 50%;
    min-width: initial;
    width: 50%;
    float: left;
    padding: 8px;
    padding-top: 30px;
    max-height: 70%;
    height: 60vh;
    overflow-y: auto;
    margin: 0;
    margin-left: 25%;
    margin-right: 25%;
}
.chat-body .right {
    background-color: #fff;
    box-shadow: 0px 0px 0px transparent;
    width: 23%;
    height: 100%;
    max-height: 100%;
    float: initial;
    display: block;
    border-left: 1px solid #ddd;
    position: fixed;
    left: initial;
    top: 0;
    right: 0;
    z-index: 16;
}

.messages_box_home {
    width: 100%;
    background-color: transparent;
    display: block;
    max-height: 100%;
}
.messages_box_home .messaged-box {
    max-width: 80%;
    background-color: #f3f3f3;
    padding: 8px;
    border-radius: 8px;
    margin: 8px;
    display: inline-block;
}

.messages_box_home .messaged-box-out {
    width: 100%;
    display: block;
    padding: 0;
    margin: 0;
}
.messages_box_home .messaged-box-out::after {
    content: "";
    clear: both;
    display: table;
}
.messages_box_home .right-box {
    background-color: <?php echo($main_color); ?>;
    float: right;
    margin-right: 25px;
    position: relative;
    max-width: 60%;
}
.messages_box_home .right-box::after {
    content: " ";
    background-color: transparent;
    display: inline-block;
    border: 10px solid transparent;
    border-color: transparent <?php echo($main_color); ?> <?php echo($main_color); ?> transparent;
    position: absolute;
    right: -6px;
    top: 10px;
    transform: rotate(-35deg);
}
.messages_box_home .left-box {
    background-color: #e8f1d4;
    float: left;
    margin-left: 25px;
    position: relative;
    max-width: 60%;
}
.messages_box_home .left-box::before {
    content: " ";
    background-color: transparent;
    display: inline-block;
    border: 10px solid transparent;
    border-color: transparent #e8f1d4 #e8f1d4 transparent;
    position: absolute;
    left: -6px;
    top: 10px;
    transform: rotate(120deg);
}
.message-editor-embed {
    position: fixed;
    bottom: 0;
    left: 25%;
    right: 25%;
    background-color: #303030;
    display: block;
    width: 50%;
    max-height: 20%;
    height: 20vh;
    border-top: 1px solid #ddd;
    margin: 0;
    padding-top: 0px;
    z-index: 5;
}
.message-editor-embed textarea {
    max-width: 80%;
    width: 500px;
    height: 50px;
    resize: none;
    font-size: 120%;
}
.tip-profile {
    display: block;
}

.profile-body .left {
    max-width: 35%;
    width: 35%;
    background-color: #fff;
    float: left;
    margin: 16px <?php echo(5 / 2); ?>%;
    min-height: 50vh;
    border-radius: 0px;
    padding: 8px;
    box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
    padding-bottom: 200px;
    z-index: 3;
}
.profile-body .right {
    max-width: 50%;
    width: 50%;
    background-color: #fff;
    float: left;
    margin: 16px <?php echo(5 /2); ?>%;
    min-height: 50vh;
    border-radius: 0px;
    box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
    padding-bottom: 200px;
    padding: 8px;
}
.editor textarea {
    width: 80%;
}
.editor button, .editor input[type=submit] {
    width: 50px;
    height: 50px;
    border: none;
    background-color: #f5f5f5;
    border-radius: 50%;
    color: <?php echo($main_color); ?>;
}
.editor button:hover, .editor input[type=submit]:hover { background-color: #f3f3f3; }
.people-card:hover .tip-box {
    display: inline-block;
}

}