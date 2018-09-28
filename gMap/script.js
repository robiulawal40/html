//alert(1);
/* gMap Api AIzaSyD5WrreVasrk_iFBApM505yVuf1PscioIw */
function initMap() {
 var options ={
   center:{
     lat: -25.344,
     lng: 131.036
   },
   zoom: 4
 },
 element = document.getElementById('nz_map');

// The map, centered
var map = new google.maps.Map(element, options );

var marker = new google.maps.Marker({
          position: options.center,
          map: map,
          title: 'Hello World!'
        });
//var marker = new google.maps.Marker({position: uluru, map: map});
}
