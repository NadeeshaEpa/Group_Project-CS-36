const email = document.getElementById("email");
const emailLabel = document.getElementById("email-label");
const submit = document.getElementById("update-btn");

const username = document.getElementById("username");
const usernameLabel = document.getElementById("username-label");

const contact = document.getElementById("contactnumber");
const contactLabel = document.getElementById("contactnum-label");

const customer_form = document.getElementById("customer_update_form");

var emailflag=0;
var usernameflag=0;
var contactflag=0;

email?.addEventListener("input", function () {
    var reg = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (!reg.test(email.value)) {
        emailLabel.innerHTML = "Invalid Email";
        emailLabel.style.color = "red";
        //submit.disabled = true;
        emailflag=1;
    } else {
        emailValidation();
    }
});
username?.addEventListener("input", function () {
    usernameexit();
});

function usernameexit(){
    var xhttp = new XMLHttpRequest();   
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            console.log(response);

            if (response == "true") {
                usernameLabel.innerHTML = "*Username already exists";
                usernameLabel.style.color = "red";
                //change the font size of the label
                usernameLabel.style.borderColor = "red";
                usernameLabel.style.fontSize = "14px";
                usernameflag=1;
            } else {
                usernameLabel.innerHTML = "Username";
                usernameLabel.style.color = "black";
                username.style.borderColor = "green";
                username.style.borderWidth = "2px";
                usernameLabel.style.fontSize = "16px";
                usernameflag=0;
                // submit.disabled = false;
            }
        }
    };
    xhttp.open("POST", "http://localhost:8001/controller/customer/validation_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("update_username=" + username.value);
}

function emailValidation() {
    var xhttp = new XMLHttpRequest();   
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            if (response == "true") {
                emailLabel.innerHTML = "*Email already exists";
                emailLabel.style.color = "red";
                emailLabel.style.fontSize = "14px";
                email.style.borderColor = "red";
                emailflag=1;
            } else {
                emailLabel.innerHTML = "Email";
                emailLabel.style.color = "black";
                email.style.borderColor = "green";
                email.style.borderWidth = "2px";
                emailLabel.style.fontSize = "16px";
                // submit.disabled = false;
                emailflag=0;
            }
        }
    };
    xhttp.open("POST", "http://localhost:8001/controller/customer/validation_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("updateemail=" + email.value);
}
contact?.addEventListener("input", function () {
    //should include 9 numbers
    var pattern=/^[0-9]{9}$/;
    if (!pattern.test(contact.value)) {
        contactLabel.innerHTML = "*Invalid Contact Number";  
        contactLabel.style.color = "red";
        contactLabel.style.fontSize = "14px";
        // submit.disabled = true;
        contactflag=1;
    } else {
        contactLabel.innerHTML = "Contact Number:";
        contactLabel.style.color = "black";
        contact.style.borderColor = "green";
        contact.style.borderWidth = "2px";
        contactLabel.style.fontSize = "16px";
        contactflag=0;
        // submit.disabled = false;
    }
});
customer_form?.addEventListener("submit", function (e) {
    if (!(usernameflag==0 && emailflag==0 && passwordflag==0 && cpasswordflag==0 && billnoflag==0 && contactflag==0)) {
        e.preventDefault();
    }
});