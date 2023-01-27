<?php session_start(); require("info.php"); $page_title = $info->user_name; include("header.php");
    echo($page->get_html()); 
?>
        <!-- <div class="w3-container" style="margin-top:30px;">
             <?php 
                 #if(isset($_GET["up_msg"])){echo("<div class='w3-hide w3-container w3-light-gray w3-border w3-border-gray w3-padding w3-round w3-top w3-margin-top w3-animate-top alert'>".htmlspecialchars($_GET["up_msg"])."</div>");}
             ?>
        </div> -->
    <header id="profile-header">
        <div class="w3-container w3-padding w3-tooltip" id="profile-background">
            <button class="w3-display-right w3-text w3-button w3-circle" style="margin-right:30px;width:60px;height:60px;" onclick="document.getElementById('backgroundUploader').classList.add('w3-show')"><i class="bi bi-camera w3-xlarge"></i></button>
            <div class="w3-gray w3-circle w3-center" style="width:100px;height:100px;overflow:none;margin-left:auto;margin-right:auto;position:relative;">
                <img class="w3-circle" src="<?php if($info->photo == "default"){echo("./uploads/default.png");}else{echo($info->photo);} ?>" alt="Profile image of <?php echo(htmlspecialchars("$info->user_name")); ?>" style="width:100%;height:100%;">
                <button class="profile-up-button" onclick="document.getElementById('photoUploader').classList.add('w3-show')"><i class="bi bi-camera"></i></button>
            </div>
            <h2 class="user-name"><?php echo(strtoupper($info->user_name)); ?></h2>
        </div>
    </header>
    <nav class="profile-top-nav">
        <a class="w3-button w3-hover-white" href="index"><i class="bi bi-reply-fill w3-xxlarge"></i></a>
        <a href="./signout.php?signout=345834579345" class="w3-button w3-right w3-hover-white"><i class="bi bi-door-open w3-xxlarge"></i></a>
        <a class="w3-button w3-hover-white w3-right" href="index"><i class="bi bi-gear-fill w3-xxlarge"></i></a>
    </nav>
    <nav class="profile-nav" id="profileNav">
        <button class="w3-tooltip" onclick="document.getElementById('photoUploader').classList.add('w3-show')"><span class="w3-text tooltip-box w3-hide-small">Update profile photo</span><i class='bi bi-camera'></i></button>
        <button class="w3-tooltip" onclick="document.getElementById('backgroundUploader').classList.add('w3-show')"><span class="w3-text tooltip-box w3-hide-small">Update background photo</span><i class="bi bi-camera-fill"></i></i></button>
        <button class="w3-tooltip"><span class="w3-text tooltip-box w3-hide-small">View as</span><i class="bi bi-eye"></i></button>
        <button class="w3-tooltip"><span class="w3-text tooltip-box w3-hide-small">See photos</span><i class="bi bi-image"></i></button>
        <button class="w3-tooltip"><span class="w3-text tooltip-box w3-hide-small">See Videos</span><i class="bi bi-collection-play"></i></button>
    </nav>
     <main class="profile-body">
        <section class="left">
            <h3>About</h3>
            <ul class="w3-ul">
                <li class="w3-container"><b>Home Town</n>/ <button class="w3-button w3-light-gray w3-circle w3-right" style="width:40px;height:40px;"><i class="bi bi-tools"></i></button></li>
                <li class="w3-container"><b>Gender</n>/ <small><?php echo($info->gender); ?></small><button class="w3-button w3-light-gray w3-circle w3-right" style="width:40px;height:40px;"><i class="bi bi-tools"></i></button></li>
                <li class="w3-container"><b>Email</n>/ <small><?php echo($info->get_email()); ?></small><button class="w3-button w3-light-gray w3-circle w3-right" style="width:40px;height:40px;"><i class="bi bi-tools"></i></button></li>
            </ul>
            <h3>Friends</h3>
        </section>
        <section class="right">
            <h2>Timeline/</h2>
            <div class="editor">
                <form>
                    <button>Tag</button>
                    <textarea placeholder="Write a short status..."></textarea>
                    <input type="submit" value="Post">
                </form>
            </div>
        </section>
     </main>
<script>
    let proNav = document.getElementById("profileNav");
    let sticky = proNav.offsetTop;
    window.onscroll = ()=>{ stickyProfileNav(); }
    window.addEventListener('click', (event)=> {
        let photoUp = document.getElementById("photoUploader");
        let backgroundUp = document.getElementById("backgroundUploader");
        if (event.target == photoUp) { photoUp.classList.remove("w3-show"); }
        if (event.target == backgroundUp) { backgroundUp.classList.remove("w3-show"); }
    });
    function stickyProfileNav() {
        if ((window.pageYOffset+30) >= sticky) {proNav.classList.add("sticky")}else{proNav.classList.remove("sticky");}
    }
</script>
<?php include("c.includes/upload.include.php") ?>
<?php include("c.includes/upload.background.include.php") ?>
<?php $use_footer=false; include("footer.php"); ?>