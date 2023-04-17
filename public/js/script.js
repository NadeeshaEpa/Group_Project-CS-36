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
<<<<<<< HEAD
=======

>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})

<<<<<<< HEAD
=======
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

>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458






const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





<<<<<<< HEAD
=======


>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})

