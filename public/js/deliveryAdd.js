// function Add_a_delivery_person(){
   
// }

// function get_distance(lat1, lon1, lat2, lon2){
//     // Calculate the distance between the two points using the Haversine formula
//     const R = 6371; // Radius of the earth in km
//     const dLat = deg2rad(lat2 - lat1);
//     const dLon = deg2rad(lon2 - lon1);
//     const a =
//       Math.sin(dLat / 2) * Math.sin(dLat / 2) +
//       Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
//       Math.sin(dLon / 2) * Math.sin(dLon / 2);
//     const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
//     const distance = R * c; // Distance in km
//     return distance;
// }
  
// function deg2rad(deg) {
//     return deg * (Math.PI/180);
// }
// let map;
// let directionsService;

// function initMap() {
//   // Create a map object centered at the user's current location
//   navigator.geolocation.getCurrentPosition(function(position) {
//     const userLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
//     map = new google.maps.Map(document.getElementById("map"), {
//       center: userLocation,
//       zoom: 14,
//     });

//     // Create a directions service object
//     directionsService = new google.maps.DirectionsService();
//   });
// }
// function calcRoute(targetLat, targetLng) {
//     // Set the origin and destination for the directions request
//     const origin = new google.maps.LatLng(userLat, userLng);
//     const destination = new google.maps.LatLng(targetLat, targetLng);
  
//     // Create a directions request object
//     const request = {
//       origin: origin,
//       destination: destination,
//       travelMode: google.maps.TravelMode.DRIVING,
//     };
  
//     // Call the directions service to calculate the route
//     directionsService.route(request, function(result, status) {
//       if (status == google.maps.DirectionsStatus.OK) {
//         // Display the route on the map
//         const directionsRenderer = new google.maps.DirectionsRenderer();
//         directionsRenderer.setMap(map);
//         directionsRenderer.setDirections(result);
//       } else {
//         // Handle errors
//         console.log("Error: " + status);
//       }
//     });
//   }
  