<span onclick="showBox()" style="display:inline-block;font-size:2.5em;padding:8px;" class="hide-menu"><i class="bi bi-chevron-compact-left"></i></span>
<a href="profile">
<div class="left-card">
    <img class="w3-circle" src="<?php if($info->photo == "default"){echo("./uploads/default.png");}else{echo($info->photo);} ?>" alt="<?php echo(htmlspecialchars("$info->user_name")); ?>" style="width:40px;height:40px;">
    <b><?php echo($info->user_name); ?></b>
</div>
</a>
<nav class="left-links">
    <ul class="w3-ul">
        <li><a href="chats"><i class="bi bi-chat-dots"> </i>Messages</a></li>
        <li><a href="./user?p=s945u784yhrejkthrjhtndlKSDf"><i class="bi bi-person-check"></i>Friends</a></li>
        <li><a href="./user?p=sdfKJ8e39HKJoijo904df4MKDJF49"><i class="bi bi-people"></i> Find People</a></li>
        <li><a href="./user?p=dfkdiojogi54vpee509fogjd"><i class="bi bi-person-plus"></i> Friend Requests</a></li>
        <li><a href="#"><i class="bi bi-gear"></i> Settings</a></li>
        <li><a href="#"><i class="bi bi-shield-exclamation"></i> Help</a></li>
        <li><a href="#"><i class="bi bi-shield-check"></i> Privacy</a></li>
        <li><a href="./signout.php?signout=345834579345"><i class="bi bi-door-open"></i> Sign out</a></li>
    </ul>
</nav>