const email = document.getElementById("email");
const emailLabel = document.getElementById("email-label");
const submit = document.getElementById("submit");

const password= document.getElementById("password");
const passwordLabel = document.getElementById("password-label");

const cpassword = document.getElementById("cpassword");
const cpasswordLabel = document.getElementById("cpassword-label");


const username = document.getElementById("username");
const usernameLabel = document.getElementById("username-label");

const contact = document.getElementById("contactnumber");
const contactLabel = document.getElementById("contactnum-label");


const nic = document.getElementById("nic");
const nicLabel = document.getElementById("nic-label");

const deliveryperson_form = document.getElementById("deliveryperson_form");

var emailflag=0;
var passwordflag=0;
var cpasswordflag=0;
var nicflag=0;
var usernameflag=0;
var contactflag=0;


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

password?.addEventListener("input", function () {
    //password must be 8 characters long and contain at least one number and one lowercase letter and one uppercase letter
    if(password.value.length < 8){
        passwordLabel.innerHTML = "Password must be 8 characters long";
        passwordLabel.style.color = "red";
        //submit.disabled = true;
    }else if(!password.value.match(/[a-z]/) || !password.value.match(/[A-Z]/)){
        passwordLabel.innerHTML = "Password must contain at least one lowercase letter and one uppercase letter";
        passwordLabel.style.color = "red";
        //submit.disabled = true;
    }else if(!password.value.match(/[0-9]/)){
        passwordLabel.innerHTML = "Password must contain at least one number";
        passwordLabel.style.color = "red";
        //submit.disabled = true;
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
        //submit.disabled = true;
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

username?.addEventListener("input", function () {
    usernameexit();
});

contact?.addEventListener("input", function () {
    //should include 9 numbers
    var pattern=/^[0-9]{10}$/;
    if (!pattern.test(contact.value)) {
        contactLabel.innerHTML = "Invalid Contact Number";  
        contactLabel.style.color = "red";
        // submit.disabled = true;
        contactflag=1;
    } else {
        contactLabel.innerHTML = "Contact Number:";
        contactLabel.style.color = "black";
        contact.style.borderColor = "green";
        contact.style.borderWidth = "2px";
        // submit.disabled = false;
        contactflag=0;
    }
});

nic?.addEventListener("input",function(){
    var pattern=/^([0-9]{9}[x|X|v|V]|[0-9]{12})$/;
    if (!pattern.test(nic.value)) {
        nicLabel.innerHTML = "Invalid NIC Number";  
        nicLabel.style.color = "red";
        // submit.disabled = true;
        nicflag=1;
    } else {
        nicValidation();
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
    xhttp.open("POST", "http://localhost:8001/controller/deliveryperson/validation_controller.php", true);
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
    xhttp.open("POST", "http://localhost:8001/controller/deliveryperson/validation_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + email.value);
}

function nicValidation() {
    var xhttp = new XMLHttpRequest();   
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            if (response == "true") {
                nicLabel.innerHTML = "User already exsist";
                nicLabel.style.color = "red";
                nicflag=1;
            } else {
                nicLabel.innerHTML = "NIC :";
                nicLabel.style.color = "black";
                nic.style.borderColor = "green";
                nic.style.borderWidth = "2px";
                // submit.disabled = false;
                nicflag=0;
            }
        }
    };
    xhttp.open("POST", "http://localhost:8001/controller/admin/validation_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("nic=" + nic.value);
}

deliveryperson_form?.addEventListener("submit", function (e) {
    if (!(usernameflag==0 && emailflag==0 && passwordflag==0 && cpasswordflag==0 && nicflag==0 && contactflag==0)) {
        e.preventDefault();
    }
});