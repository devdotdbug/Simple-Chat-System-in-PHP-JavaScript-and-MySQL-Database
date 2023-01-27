<?php session_start(); $page_title = "Sign In"; include("header.php");
    echo($page->get_html()); 
    if(isset($_SESSION["username"]) && isset($_SESSION["password"])){ header("Location: index.php"); }
?>

<main class="w3-container w3-row w3-light-white">
    <div class="w3-container w3-hide w3-padding-large w3-pale-red w3-border w3-border-red w3-col l6 w3-card w3-animate-top w3-mobile" id="showErrors" style="width:50%;"></div>
    <div class="w3-container w3-hide w3-padding-large w3-pale-green w3-border w3-border-green w3-col l6 w3-card w3-animate-top w3-mobile" id="alert" style="width:50%;"></div>
    <div class="w3-container w3-light-gray w3-card-4 w3-col l6 w3-mobile w3-right" style="width:40%;">
        <h2>Sign In</h2>
        <form class="w3-container" onsubmit="return false;">
            <label>@Emal</label><br>
            <input class="w3-input" type="email" id="username"><br>
            <label>#Password</label><br>
            <input class="w3-input" type="password" id="password"><br>
            <input class="w3-button w3-blue" onclick="signIn()" type="submit" name="signin" value="Sign In"><br>
        </form>
        <div class="w3-container w3-center w3-padding w3-margin-bottom">
            <p>Don't have account??</p>
            <a href="signup.php">Sign Up!</a>
        </div>
    </div>
</main>

<script>
    function signIn() {
        let username = document.getElementById("username");
        let password = document.getElementById("password");
        let error = document.getElementById("showErrors");
        let alert = document.getElementById("alert");
        var submit = false;
        if(username.value == "" || password.value == ""){ error.innerHTML="Please Enter Required Infomations To Sign in!"; error.classList.remove("w3-hide");} else {error.classList.add("w3-hide"); submit=true;}
        if (submit===true) {
            var xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                if(this.readyState == 4 && this.status == 200) {
                    error.classList.add("w3-hide");
                    alert.innerHTML= "SUCCESS: Signed into Moses.inc..<br>"+this.responseText;
                    alert.classList.remove("w3-hide");
                    setTimeout(() => {
                        window.location.assign("index");
                    }, 500);
                } else {
                    error.innerHTML = "Oops! something went wrong.<br>"+this.responseText;
                    error.classList.remove("w3-hide");
                }
            }
            xhttp.open("POST", "c.con/engine.php");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("username="+username.value+"&password="+password.value+"&signin=true");
        }
    }
</script>

<?php $use_footer=false; include("footer.php"); ?>