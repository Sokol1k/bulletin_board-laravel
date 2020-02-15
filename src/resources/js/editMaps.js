function editMap() {
    var element = document.getElementById("editMap");
    var lat = parseFloat(document.getElementById("lat").value);
    var lng = parseFloat(document.getElementById("lng").value);
    var marker, options, myMap;

    if (lat && lng) {
        options = {
            zoom: 18,
            center: { lat: lat, lng: lng }
        };

        myMap = new google.maps.Map(element, options);

        marker = new google.maps.Marker({
            position: { lat: lat, lng: lng },
            map: myMap
        });
        marker.addListener("click", function() {
            this.setMap(null);
            document.getElementById("lat").value = null;
            document.getElementById("lng").value = null;
        });
    } else {
        options = {
            zoom: 4,
            center: { lat: 51.513416, lng: -0.129761 }
        };

        myMap = new google.maps.Map(element, options);
    }

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

window.editMap = editMap;
