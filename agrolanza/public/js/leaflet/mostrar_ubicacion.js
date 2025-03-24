document.addEventListener("DOMContentLoaded", function () {
    var latitud = parseFloat(document.getElementById("latitud").value) || 28.99;
    var longitud = parseFloat(document.getElementById("longitud").value) || -13.54;

    var mapContainer = document.getElementById("show_map");
    mapContainer.style.width = "100%";
    mapContainer.style.height = "400px";

    window.map = L.map(mapContainer).setView([latitud, longitud], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    }).addTo(window.map);

    window.marker = L.marker([latitud, longitud]).addTo(window.map)
        .bindPopup("Ubicación de la parcela")
        .openPopup();

    document.getElementById("id_cliente").addEventListener("change", function () {
        var parcelaId = this.value;
        var seleccionada = parcelas.find(p => p.id == parcelaId);

        if (seleccionada) {
            document.getElementById("latitud").value = seleccionada.latitud;
            document.getElementById("longitud").value = seleccionada.longitud;
            updateMap();
        } else {
            document.getElementById("latitud").value = "";
            document.getElementById("longitud").value = "";
        }
    });
});

function updateMap() {
    var newLat = parseFloat(document.getElementById("latitud").value) || 28.99;
    var newLon = parseFloat(document.getElementById("longitud").value) || -13.54;
    window.marker.setLatLng([newLat, newLon]);
    window.map.setView([newLat, newLon], 15);
}
