const company = document.getElementById("company");
const companyLabel = document.getElementById("company-label");

const weight = document.getElementById("weight");
const weightLabel = document.getElementById("weight-label");

const submit = document.getElementById("submit");

const staff_form = document.getElementById("staff_form");

var companyflag=0;
var weightflag=0;

function cylinderexit(){
    var xhttp = new XMLHttpRequest();   
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            if (response == "true") {
                usernameLabel.innerHTML = "Gas Cylinder already exists";
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
    xhttp.open("POST", "http://localhost/Group_36/controller/staff/validation_controller.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Weight=" + Weight.value);
}