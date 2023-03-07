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
        timeout: 5000,
        maximumAge: 0
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
    xhr.open("POST", "http://localhost/Group_Project-CS-36/controller/deliveryperson/deliveryLiveLocationcontroller.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log("Location saved successfully.");
      }
    };
    xhr.send("latitude=" + location.latitude + "&longitude=" + location.longitude);
  }
  
  // Call getLocation and saveLocation every 5 seconds
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
  }, 5000);

  
  // Add the delivery person
  function AddDeliveryPerson() {
    setInterval(function() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          // Do something with the response from the PHP file
        }
      };
      xhttp.open("POST", "http://localhost/Group_Project-CS-36/controller/deliveryperson/deliveryPersonAddDeliveryController.php", true);
      xhttp.send();
    }, 1000); // Repeat the AJAX request every 1000 milliseconds (1 second)
  }
  
  