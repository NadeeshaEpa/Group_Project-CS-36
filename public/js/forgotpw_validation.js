const email = document.getElementById("email");
const emailLabel = document.getElementById("email-label");
<<<<<<< HEAD

const deliveryperson_form = document.getElementById("deliveryperson_form");
=======
const forgotpw_form = document.getElementById("fpw_form");
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458

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

<<<<<<< HEAD
function usernameexit(){
=======
function emailValidation() {
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
    var xhttp = new XMLHttpRequest();   
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

<<<<<<< HEAD
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
    xhttp.open("POST", "http://localhost/GP36/controller/deliveryperson/validation_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + username.value);
}
=======
            if (response == "false") {
                emailLabel.innerHTML = "Email does not exist";
                emailLabel.style.color = "red";
                emailLabel.style.fontSize = "15px";
                emailflag=1;
            } else {
                emailLabel.innerHTML = "Email";
                emailLabel.style.color = "black";
                emailLabel.style.fontSize = "18px";
                email.style.borderColor = "green";
                email.style.borderWidth = "2px";
                // submit.disabled = false;
                emailflag=0;
            }
        }
    };
    xhttp.open("POST", "http://localhost/Group_36/controller/customer/validation_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + email.value);
}
forgotpw_form?.addEventListener("submit", function (e) {
    if (!(emailflag==0)) {
        e.preventDefault();
    }
});
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
