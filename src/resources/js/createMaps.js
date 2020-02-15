function createMap() {
    var element = document.getElementById("createMap");
    var marker;
    var options = {
        zoom: 4,
        center: { lat: 51.513416, lng: -0.129761 }
    };

    var myMap = new google.maps.Map(element, options);

    google.maps.event.addListener(myMap, "click", function(event) {
        placeMarker(event.latLng);
    });

    function placeMarker(location) {
        if (marker) {
            marker.setMap(null);
        }
        marker = new google.maps.Marker({
            position: location,
            map: myMap
        });
        document.getElementById("lat").value = location.lat();
        document.getElementById("lng").value = location.lng();
        marker.addListener("click", function() {
            this.setMap(null);
            document.getElementById("lat").value = null;
            document.getElementById("lng").value = null;
        });
    }
}

window.createMap = createMap;
