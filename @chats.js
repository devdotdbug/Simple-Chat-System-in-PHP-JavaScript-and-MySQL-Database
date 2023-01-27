let chat_area = document.getElementById("chat_area");
let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            chat_area.innerHTML = this.responseText;
        }
    }
xhttp.open("GET", "chats_list.php", true);
xhttp.send();