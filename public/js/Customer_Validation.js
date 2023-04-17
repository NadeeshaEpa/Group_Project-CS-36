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

const customer_form = document.getElementById("customer_form");

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
        emailLabel.style.fontSize = "15px";
        //submit.disabled = true;
        emailflag=1;
    } else {
        emailValidation();
    }
});

password?.addEventListener("input", function () {
    //password must be 8 characters long and contain at least one number and one lowercase letter and one uppercase letter
    if(password.value.length < 8 || !password.value.match(/[a-z]/) ||!password.value.match(/[A-Z]/)||!password.value.match(/[0-9]/)){
        passwordLabel.innerHTML = "*Password must be 8 characters long and contain at least one number and one lowercase letter and one uppercase letter*";
        passwordLabel.style.color = "red";
        passwordLabel.style.fontSize = "15px";
        passwordflag=1;
    }else{
        passwordLabel.innerHTML = "Password:";
        passwordLabel.style.color = "black";
        password.style.borderColor = "green";
        passwordLabel.style.fontSize = "18px";
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
        cpasswordLabel.style.fontSize = "15px";
        cpassword.style.borderWidth = "2px";
        //submit.disabled = true;
        cpasswordflag=1;
    } else {
        cpasswordLabel.innerHTML = "Confirm Password:";
        cpasswordLabel.style.color = "black";
        cpasswordLabel.style.fontSize = "18px";
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
        billnoLabel.style.fontSize = "15px";
        //submit.disabled = true;
        billnoflag=1;
    } else {
        billnoLabel.innerHTML = "Electricity Bill Number:";
        billnoLabel.style.color = "black";
        billnoLabel.style.fontSize = "18px";
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
                usernameLabel.style.fontSize = "15px";
                usernameflag=1;
            } else {
                usernameLabel.innerHTML = "Username";
                usernameLabel.style.color = "black";
                usernameLabel.style.fontSize = "18px";
                username.style.borderColor = "green";
                username.style.borderWidth = "2px";
                usernameflag=0;
                // submit.disabled = false;
            }
        }
    };
    xhttp.open("POST", "http://localhost/Group_36/controller/customer/validation_controller.php", true);
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
contact?.addEventListener("input", function () {
    //should include 9 numbers
    var pattern=/^[0-9]{9}$/;
    if (!pattern.test(contact.value)) {
        contactLabel.innerHTML = "Invalid Contact Number";  
        contactLabel.style.color = "red";
        contactLabel.style.fontSize = "15px";
        // submit.disabled = true;
        contactflag=1;
    } else {
        contactLabel.innerHTML = "Contact Number:";
        contactLabel.style.color = "black";
        contactLabel.style.fontSize = "18px";
        contact.style.borderColor = "green";
        contact.style.borderWidth = "2px";
        contactflag=0;
        // submit.disabled = false;
    }
});
customer_form?.addEventListener("submit", function (e) {
    if (!(usernameflag==0 && emailflag==0 && passwordflag==0 && cpasswordflag==0 && billnoflag==0 && contactflag==0)) {
        e.preventDefault();
    }
});