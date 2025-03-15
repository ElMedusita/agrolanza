document.addEventListener("DOMContentLoaded", function () {
    var latitud = parseFloat(document.getElementById("latitud").value) || 28.99; // Latitud predeterminada
    var longitud = parseFloat(document.getElementById("longitud").value) || -13.54; // Longitud predeterminada

    var map = L.map('map').setView([latitud, longitud], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    }).addTo(map);

    var marker = L.marker([latitud, longitud]).addTo(map)
        .bindPopup("Ubicación de la parcela")
        .openPopup();

    document.getElementById("latitud").addEventListener("change", updateMap);
    document.getElementById("longitud").addEventListener("change", updateMap);

    function updateMap() {
        var newLat = parseFloat(document.getElementById("latitud").value) || 28.99;
        var newLon = parseFloat(document.getElementById("longitud").value) || -13.54;
        marker.setLatLng([newLat, newLon]);
        map.setView([newLat, newLon], 15);
    }
});
