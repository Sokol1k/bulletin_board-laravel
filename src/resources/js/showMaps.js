function showMap() {
    var element = document.getElementById("showMap");
    var lat = parseFloat(element.dataset.lat);
    var lng = parseFloat(element.dataset.lng);
    var options = {
        zoom: 18,
        center: { lat: lat, lng: lng }
    };

    var myMap = new google.maps.Map(element, options);

    var marker = addMarker({ lat: lat, lng: lng });

    function addMarker(coordinates) {
        return new google.maps.Marker({
            position: coordinates,
            map: myMap
        });
    }
}

window.showMap = showMap;
