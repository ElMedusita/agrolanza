document.addEventListener("DOMContentLoaded", function () {
    var latitud = parseFloat(document.getElementById("latitud").value) || 29.015526;
    var longitud = parseFloat(document.getElementById("longitud").value) || -13.614990;

    var map = L.map('show_map').setView([latitud, longitud], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    }).addTo(map);

    var marker = L.marker([latitud, longitud], { draggable: true }).addTo(map)
        .bindPopup("Arrastra el marcador o haz clic en el mapa")
        .openPopup();

    marker.on("dragend", function (event) {
        var position = marker.getLatLng();
        document.getElementById("latitud").value = position.lat.toFixed(6);
        document.getElementById("longitud").value = position.lng.toFixed(6);
    });

    map.on("click", function (event) {
        var lat = event.latlng.lat.toFixed(6);
        var lng = event.latlng.lng.toFixed(6);

        document.getElementById("latitud").value = lat;
        document.getElementById("longitud").value = lng;

        marker.setLatLng([lat, lng]);
    });

    document.getElementById("latitud").addEventListener("change", updateMarker);
    document.getElementById("longitud").addEventListener("change", updateMarker);

    function updateMarker() {
        var newLat = parseFloat(document.getElementById("latitud").value) || latitud;
        var newLon = parseFloat(document.getElementById("longitud").value) || longitud;
        marker.setLatLng([newLat, newLon]);
        map.setView([newLat, newLon], 15);
    }
});
