// function getLocation(callback) {
//     if (navigator.geolocation) {
//       // Get the current position
//       navigator.geolocation.getCurrentPosition(function(position) {
//         // Call the callback function with the location data
//         callback({ latitude: position.coords.latitude, longitude: position.coords.longitude });
//       }, function(error) {
//         // Handle location errors
//         console.error("Location error: " + error.message);
//         callback(null);
//       }, {
//         // Specify options for location acquisition
//         enableHighAccuracy: true,
//         timeout: 5000,
//         maximumAge: 0
//       });
//     } else {
//       // Geolocation is not supported by this browser
//       console.error("Geolocation is not supported by this browser.");
//       callback(null);
//     }
//   }
  
//   function saveLocation(location) {
//     // Send an AJAX POST request to the PHP file
//     var xhr = new XMLHttpRequest();
//     xhr.open("POST", "http://localhost/Group_Project-CS-36/controller/deliveryperson/deliveryLiveLocationcontroller.php", true);
//     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhr.onreadystatechange = function() {
//       if (xhr.readyState === 4 && xhr.status === 200) {
//         console.log("Location saved successfully.");
//       }
//     };
//     xhr.send("latitude=" + location.latitude + "&longitude=" + location.longitude);
//   }
  
//   // Call getLocation and saveLocation every 5 seconds
//   setInterval(function() {
//     getLocation(function(location) {
//       if (location) {
//         console.log("Latitude: " + location.latitude);
//         console.log("Longitude: " + location.longitude);
//         saveLocation(location);
//       } else {
//         console.log("Failed to get location.");
//       }
//     });
//   }, 5000);

  

// function getLocation(callback) {
//   if (navigator.geolocation) {
//     // Get the current position
//     navigator.geolocation.getCurrentPosition(function(position) {
//       // Call the callback function with the location data
//       callback({ latitude: position.coords.latitude, longitude: position.coords.longitude });
//     }, function(error) {
//       // Handle location errors
//       console.error("Location error: " + error.message);
//       callback(null);
//     }, {
//       // Specify options for location acquisition
//       enableHighAccuracy: true,
//       timeout: 5000,
//       maximumAge: 0
//     });
//   } else {
//     // Geolocation is not supported by this browser
//     console.error("Geolocation is not supported by this browser.");
//     callback(null);
//   }
// }

// function saveLocation(location) {
//   // Set up the URL for the Google Maps API request
//   var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + location.latitude + "," + location.longitude + "&key=AIzaSyD2eSy5egkITKWg1EMsa1i1WcpPi29dgK0";

//   // Send an AJAX GET request to the Google Maps API to get the address data
//   var xhr = new XMLHttpRequest();
//   xhr.open("GET", url, true);
//   xhr.onreadystatechange = function() {
//     if (xhr.readyState === 4 && xhr.status === 200) {
//       // Parse the JSON response to get the address data
//       var jsonResponse = JSON.parse(xhr.responseText);
//       var addressData = jsonResponse.results[0];

//       // Extract the formatted address from the address data
//       var formattedAddress = addressData.formatted_address;

//       // Send an AJAX POST request to the PHP script to save the location data
//       var xhr2 = new XMLHttpRequest();
//       xhr2.open("POST", "http://localhost/Group_Project-CS-36/controller/deliveryperson/deliveryLiveLocationcontroller.php", true);
//       xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//       xhr2.onreadystatechange = function() {
//         if (xhr2.readyState === 4 && xhr2.status === 200) {
//           console.log("Location saved successfully.");
//         }
//       };
//       xhr2.send("latitude=" + location.latitude + "&longitude=" + location.longitude + "&address=" + encodeURIComponent(formattedAddress));
//     }
//   };
//   xhr.send();
// }

// // Call getLocation and saveLocation every 5 seconds
// setInterval(function() {
//   getLocation(function(location) {
//     if (location) {
//       console.log("Latitude: " + location.latitude);
//       console.log("Longitude: " + location.longitude);
//       saveLocation(location);
//     } else {
//       console.log("Failed to get location.");
//     }
//   });
// }, 5000);



//////////////////////////////////////////////////////////////////////////////////////////////////////////////


function getLocation(callback) {
  if (navigator.geolocation) {
    // Get the current position
    navigator.geolocation.getCurrentPosition(function(position) {
      // Call the callback function with the location data
      callback({ latitude: position.coords.latitude, longitude: position.coords.longitude });
    }, function(error) {
      // Handle location errors
      console.error("Location error: " + error.message);
      callback(null);
    }, {
      // Specify options for location acquisition
      enableHighAccuracy: true,
      timeout: 10000,
      maximumAge: 30000
    });
  } else {
    // Geolocation is not supported by this browser
    console.error("Geolocation is not supported by this browser.");
    callback(null);
  }
}

function saveLocation(location) {
  // Send an AJAX POST request to the PHP file
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/Group_36/controller/deliveryperson/deliveryLiveLocationcontroller.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log("Location saved successfully.");
    }
  };
  xhr.send("latitude=" + location.latitude + "&longitude=" + location.longitude);
}

// Call getLocation and saveLocation every 10 seconds
setInterval(function() {
  getLocation(function(location) {
    if (location) {
      console.log("Latitude: " + location.latitude);
      console.log("Longitude: " + location.longitude);
      saveLocation(location);
    } else {
      console.log("Failed to get location.");
    }
  });
}, 10000);





