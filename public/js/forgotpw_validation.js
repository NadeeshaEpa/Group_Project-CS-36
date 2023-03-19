const email = document.getElementById("email");
const emailLabel = document.getElementById("email-label");

const deliveryperson_form = document.getElementById("deliveryperson_form");

var emailflag=0;

email?.addEventListener("input", function () {
    var reg = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (!reg.test(email.value)) {
        emailLabel.innerHTML = "Invalid Email";
        emailLabel.style.color = "red";
        // 
        emailflag=1;
    } else {
        emailValidation();
    }
});

function usernameexit(){
    var xhttp = new XMLHttpRequest();   
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            if (response == "true") {
                usernameLabel.innerHTML = "Username already exists";
                usernameLabel.style.color = "red";
                usernameflag=1;
            } else {
                usernameLabel.innerHTML = "Username";
                usernameLabel.style.color = "black";
                username.style.borderColor = "green";
                username.style.borderWidth = "2px";
                // submit.disabled = false;
                usernameflag=0;
            }
        }
    };
    xhttp.open("POST", "http://localhost/Group_36/controller/deliveryperson/validation_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + username.value);
}