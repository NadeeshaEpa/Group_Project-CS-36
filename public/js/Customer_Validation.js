const email = document.getElementById("email");
const emailLabel = document.getElementById("email-label");
const submit = document.getElementById("submit-btn");

const password= document.getElementById("password");
const passwordLabel = document.getElementById("password-label");
const cpassword = document.getElementById("cpassword");
const cpasswordLabel = document.getElementById("cpassword-label");

const billno = document.getElementById("billnum");
const billnoLabel = document.getElementById("billnum-label");

const username = document.getElementById("username");
const usernameLabel = document.getElementById("username-label");

const contact = document.getElementById("contactnumber");
const contactLabel = document.getElementById("contactnum-label");

var emailflag=0;
var passwordflag=0;
var cpasswordflag=0;
var billnoflag=0;
var usernameflag=0;
var contactflag=0;

email?.addEventListener("input", function () {
    var reg = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (!reg.test(email.value)) {
        emailLabel.innerHTML = "Invalid Email";
        emailLabel.style.color = "red";
        submit.disabled = true;
        emailflag=1;
    } else {
        emailValidation();
    }
});

password?.addEventListener("input", function () {
    //password must be 8 characters long and contain at least one number and one lowercase letter and one uppercase letter
    if(password.value.length < 8){
        passwordLabel.innerHTML = "Password must be 8 characters long";
        passwordLabel.style.color = "red";
        submit.disabled = true;
    }else if(!password.value.match(/[a-z]/) || !password.value.match(/[A-Z]/)){
        passwordLabel.innerHTML = "Password must contain at least one lowercase letter and one uppercase letter";
        passwordLabel.style.color = "red";
        submit.disabled = true;
    }else if(!password.value.match(/[0-9]/)){
        passwordLabel.innerHTML = "Password must contain at least one number";
        passwordLabel.style.color = "red";
        submit.disabled = true;
        passwordflag=1;
    }else{
        passwordLabel.innerHTML = "Password:";
        passwordLabel.style.color = "black";
        password.style.borderColor = "green";
        password.style.borderWidth = "2px";
        passwordflag=0;
        // submit.disabled = false;
    }
});
cpassword?.addEventListener("input", function () {
    if (cpassword.value != password.value) {
        cpasswordLabel.innerHTML = "Passwords do not match";
        cpasswordLabel.style.color = "red";
        cpassword.style.borderColor = "red";
        cpassword.style.borderWidth = "2px";
        submit.disabled = true;
        cpasswordflag=1;
    } else {
        cpasswordLabel.innerHTML = "Confirm Password:";
        cpasswordLabel.style.color = "black";
        cpassword.style.borderColor = "green";
        cpassword.style.borderWidth = "2px";
        cpasswordflag=0;
        // submit.disabled = false;
    }
});
billnum?.addEventListener("input", function () {
    //should include 10 numbers
    var pattern=/^[0-9]{10}$/;
    if (!pattern.test(billnum.value)) {
        billnoLabel.innerHTML = "Invalid Bill Number";
        billnoLabel.style.color = "red";
        submit.disabled = true;
        billnoflag=1;
    } else {
        billnoLabel.innerHTML = "Electricity Bill Number:";
        billnoLabel.style.color = "black";
        billno.style.borderColor = "green";
        billno.style.borderWidth = "2px";
        billnoflag=0;
        // submit.disabled = false;
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
                usernameLabel.innerHTML = "Username already exists";
                usernameLabel.style.color = "red";
                usernameflag=1;
            } else {
                usernameLabel.innerHTML = "Username";
                usernameLabel.style.color = "black";
                username.style.borderColor = "green";
                username.style.borderWidth = "2px";
                usernameflag=0;
                // submit.disabled = false;
            }
        }
    };
    xhttp.open("POST", "http://localhost:8001/controller/customer/validation_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + username.value);
}

function emailValidation() {
    var xhttp = new XMLHttpRequest();   
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            if (response == "true") {
                emailLabel.innerHTML = "Email already exists";
                emailLabel.style.color = "red";
                emailflag=1;
            } else {
                emailLabel.innerHTML = "Email";
                emailLabel.style.color = "black";
                email.style.borderColor = "green";
                email.style.borderWidth = "2px";
                // submit.disabled = false;
                emailflag=0;
            }
        }
    };
    xhttp.open("POST", "http://localhost:8001/controller/customer/validation_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + email.value);
}
contact?.addEventListener("input", function () {
    //should include 9 numbers
    var pattern=/^[0-9]{9}$/;
    if (!pattern.test(contact.value)) {
        contactLabel.innerHTML = "Invalid Contact Number";  
        contactLabel.style.color = "red";
        submit.disabled = true;
        contactflag=1;
    } else {
        contactLabel.innerHTML = "Contact Number:";
        contactLabel.style.color = "black";
        contact.style.borderColor = "green";
        contact.style.borderWidth = "2px";
        contactflag=0;
        // submit.disabled = false;
    }
});
submitValidation();
function submitValidation(){
    if(emailflag==0 && passwordflag==0 && cpasswordflag==0 && billnoflag==0 && usernameflag==0 && contactflag==0){
        submit.disabled = false;
    }else{
        submit.disabled = true;
    }
}