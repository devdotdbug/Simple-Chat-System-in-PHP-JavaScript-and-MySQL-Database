<?php session_start(); $page_title = "Sign Up"; include("header.php");
    echo($page->get_html());
    if(isset($_SESSION["username"]) && isset($_SESSION["password"])){ header("Location: index.php"); }
?>

<main class="w3-container w3-light-white w3-row">
    <div class="w3-container w3-hide w3-padding-large w3-pale-red w3-border w3-border-red w3-col l6 w3-card w3-animate-top w3-mobile" id="showErrors" style="width:50%;"></div>
    <div class="w3-container w3-hide w3-padding-large w3-pale-green w3-border w3-border-green w3-col l6 w3-card w3-animate-top w3-mobile" id="alert" style="width:50%;"></div>
    <div class="w3-container w3-light-gray w3-card-4 w3-right w3-mobile" style="width:40%;">
        <h2>Sign Up</h2>
        <form class="w3-container" method="post" onsubmit="return false">
            <label>~Username</label><br>
            <input class="w3-input" type="text" id="username"><br>
            <label>+Gender</label> 
            <input type="radio" name="gender" value="male" class="w3-radio" id="genderMale">Male 
            <input type="radio" name="gender" value="female" class="w3-radio" id="genderFemale">Female<br><p></p>
            <label>@Email</label><br>
            <input class="w3-input" type="email" id="email"><br>
            <label>#Password</label><br>
            <input class="w3-input" type="password" id="password"><br>
            <input class="w3-button w3-blue" onclick="signUp()" type="submit" name="signup" value="Sign Up!"><br>
        </form>
        <div class="w3-container w3-center w3-padding w3-margin-bottom">
            <p>Have an account??</p>
            <a href="signin.php">Sign In</a>
        </div>
    </div>
</main>
<script>
    function signUp() {
        let username = document.getElementById("username");
        let email = document.getElementById("email");
        let password = document.getElementById("password");
        let male = document.getElementById("genderMale");
        let female = document.getElementById("genderFemale");
        let error = document.getElementById("showErrors");
        let alert = document.getElementById("alert");
        var gender = "other";
        var submit = false;
        if(username.value == "" || email.value == "" || password.value == ""){ error.innerHTML="Please provide the Required Infomations to sign up!"; error.classList.remove("w3-hide");} else {error.classList.add("w3-hide"); submit=true;}
        if(male.checked){gender = male.value;}
        if(female.checked){gender = female.value;}
        if (submit===true) {
            var xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                if(this.readyState == 4 && this.status == 200) {
                    error.classList.add("w3-hide");
                    alert.innerHTML= "SUCCESS: your have successfuly signed up for Moses.inc..<br>"+this.responseText;
                    alert.classList.remove("w3-hide");
                    setTimeout(() => {
                        window.location.href="index";
                    }, 500);
                } else {
                    error.innerHTML = "Oops! couldn't sign you up.<br>"+this.responseText;
                    error.classList.remove("w3-hide");
                }
            }
            xhttp.open("POST", "c.con/engine.php");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("username="+username.value+"&gender="+gender+"&email="+email.value+"&password="+password.value+"&signup=true");
        }
    }
</script>

<?php $use_footer=false; include("footer.php"); ?>