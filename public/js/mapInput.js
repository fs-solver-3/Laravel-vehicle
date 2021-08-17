function initialize() {

    $('Form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    const locationInputs = document.getElementsByClassName("map-input");
    if (locationInputs){
        const autocompletes = [];
        const geocoder = new google.maps.Geocoder;
        for (let i = 0; i < locationInputs.length; i++) {
    
            const input = locationInputs[i];
            const fieldKey = input.id.replace("-input", "");
            const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';
    
            const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -33.8688;
            const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 151.2195;
    
            const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
                center: {lat: latitude, lng: longitude},
                zoom: 13
            });
            const marker = new google.maps.Marker({
                map: map,
                position: {lat: latitude, lng: longitude},
            });
    
            marker.setVisible(isEdit);
    
            const autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.key = fieldKey;
            autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
    
            // get address
            var myLatlng = new google.maps.LatLng(latitude, longitude);
            var myOptions = {
                zoom: 13,
                center: myLatlng
            }
    
            // var map = new google.maps.Map(document.getElementById("address-map"), myOptions);
    
            google.maps.event.addListener(map, 'click', function (event) {
                geocoder.geocode({
                    'latLng': event.latLng
                }, function (results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        const lat = results[0].geometry.location.lat();
                        const lng = results[0].geometry.location.lng();
                        setLocationCoordinates(autocomplete.key, lat, lng, results[0].address_components); 
                        $('#address-input').val(results[0].formatted_address);
                        console.log(lat, lng, results[0].address_components);
                    }
                });
            });
        }
    
        for (let i = 0; i < autocompletes.length; i++) {
            const input = autocompletes[i].input;
            const autocomplete = autocompletes[i].autocomplete;
            const map = autocompletes[i].map;
            const marker = autocompletes[i].marker;
    
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                marker.setVisible(false);
                const place = autocomplete.getPlace();
    
                geocoder.geocode({'placeId': place.place_id}, function (results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        const lat = results[0].geometry.location.lat();
                        const lng = results[0].geometry.location.lng();
                        setLocationCoordinates(autocomplete.key, lat, lng, results[0].address_components);
                        console.log(lat, lng, results[0].address_components);
                    }
                });
    
                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    input.value = "";
                    $('#address-latitude').val(0);
                    $('#address-longitude').val(0);
                    $('#address-component').val(0);
                    return;
                }
    
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
    
            });
        }
    }

    

}

function setLocationCoordinates(key, lat, lng, address) {
    const latitudeField = document.getElementById(key + "-" + "latitude");
    const longitudeField = document.getElementById(key + "-" + "longitude");
    const address_component = document.getElementById(key + "-" + "component");
    latitudeField.value = lat;
    longitudeField.value = lng;
    address_component.value = JSON.stringify(address);
}


