<?php session_start(); $page_title = "Home"; include("header.php");
    echo($page->get_html()); 
    require("info.php");
?>
<header class="user-header">
    <a class="w3-button w3-hover-white" href="index"><i class="bi bi-reply-fill w3-xxlarge"></i></a>
    <h1 style="display:inline-block;">Messages</h1>
</header>
<main class="user-body">
		<section class="left" style="padding-top:100px;">
		    <form class="search-box">
                <i class="bi bi-search"></i><input type="text" id="search-box" placeholder="Search in chats">
            </form>
		</section>
		<section class="right" id="chat_area"></section>
</main>
<script src="@chats.js"></script>
<?php $use_footer=false; include("footer.php"); ?>