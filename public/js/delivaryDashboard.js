//    // Get the menu button
//    var menuBtn = document.getElementById("menuid3");

//    // Get the menu
//    var menu = document.getElementById("subTopic1");

//    // Add an event listener to the menu button to toggle the menu
//    menuBtn.addEventListener("mouseover", function() {
//        if (menu.style.display === "none") {
//            menu.style.display = "block";
//        } else {
//            menu.style.display = "none";
//        }
//    });

/* profile update password section*/

   // Get the menu button
   var de_menuBtn = document.getElementById("d_changepasswordid");

   // Get the menu
   var de_menu = document.getElementById("delivary_form_id");

   //validation part
   const password= document.getElementById("npwdid");
   const passwordLabel = document.getElementById("newpasswordlableid");

   const cpassword = document.getElementById("cnpwdid");
   const cpasswordLabel = document.getElementById("coformpasswordlableid");

//    // delete account popup message
//    var modal = document.getElementById('id01');
   


/* */


const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})

/*////////////////////////////////get a current time and date of month*/



/*get month*/
// let date = new Date();
// let month_index=date.getMonth();
// let day=date.getDate();

// let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
// let monthName = months[month_index];

// let getDayLable=document.getElementById('dayid');
// let getMonthLable=document.getElementById('monthid');

// getDayLable.innerHTML=day;
// getMonthLable.innerHTML=monthName;



let date = new Date();
let month_index=date.getMonth();
let day=date.getDate();

let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
let monthName = months[month_index];

let getDayLable=document.getElementById('dayid');
let getMonthLable=document.getElementById('monthid');

if(getDayLable){
  getDayLable.innerHTML=day;
}
if(getMonthLable){
  getMonthLable.innerHTML=monthName;
}


//time calculate function
function updateClock() {
    var now = new Date();
    var h = now.getHours();
    var m = now.getMinutes();
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    
    var time = h + ":" + m ;
    // document.getElementById("timeid").innerHTML = time;
    // setTimeout(updateClock, 1000);
	var timeId = document.getElementById("timeid");
    if (timeId) {
        timeId.innerHTML = time;
        setTimeout(updateClock, 1000);
    } else {
        console.error("Element with id 'timeid' not found in the DOM");
    }
}
updateClock();




/*count and amount of the delivary */

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    
    var response = JSON.parse(this.responseText);
    console.log(response);
    incomeid2.innerHTML = response.total_fee['SUM(Delivery_fee)'];
	Nodeliverid2.innerHTML = response.delivery_count['COUNT(*)'];
    
};
xhttp.open("GET", "http://localhost/Group_Project-CS-36/controller/deliveryperson/deliveryCountcontroller.php", true);
xhttp.send();

/* */

/* profile update password section*/

   // Add an event listener to the menu button to toggle the menu
   de_menuBtn.addEventListener("click", function() {
	if (de_menu.style.display === "none") {
		de_menu.style.display = "block";
	} else {
		de_menu.style.display = "none";
	}
});

//new password validation

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


// // delete account popup message
//     window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
//     }


/*  */





  




