$(document).ready(function(){

   var myLatLng = {lat: -24.397, lng:80.644};

    map = new google.maps.Map(document.getElementById("map"), {
        center: {lat: -24.397, lng:80.644},
        zoom: 8
    });

    //marker
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
    });

    var request = {
        location: myLatLng,
        radius: '1500',
        type: ['school']
    };

    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);

    function callback(results, status) {

        console.log(results);
        // if (status == google.maps.places.PlacesServiceStatus.OK) {
        //     for (var i = 0; i < results.length; i++) {
        //         var place = results[i];
        //         createMarker(results[i]);
        //     }
        // }
    }
});