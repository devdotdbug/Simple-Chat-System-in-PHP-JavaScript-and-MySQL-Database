<?php session_start(); $page_title = "Home"; include("header.php");
    echo($page->get_html()); 
    require("info.php");
?>
<nav class="home-top-nav">
    <span id="site-name">mosesinc</span>
    <a href=""><i class="bi bi-house"></i></a>
    <a href="profile"><i class="bi bi-person"></i></a>
    <a href="chats"><i class="bi bi-chat-dots"></i></a>
    <button class="menu hide-menu" onclick="showBox()"><i class="bi bi-list"></i></button>
</nav>
<main class="home-body">
    <section class="left col w3-animate-left" id="menuBox"><?php include("home/left.php"); ?></section>
    <section class="middle col"><?php include("home/home.php"); ?></section>
    <section class="right col w3-animate-right"><?php include("home/right.php"); ?></section>
</main>
<script>
    function showBox () {
        let x = document.getElementById("menuBox");
        if(x.style.display == "block"){ x.style.display = "none";} else {
            x.style.display = "block";
        }
    }
</script>
<?php $use_footer=false; include("footer.php"); ?>