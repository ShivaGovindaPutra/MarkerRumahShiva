<!DOCTYPE html>
<html>
  <head>
    <title>Contoh Peta Leaflet</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <style>
      #map {
        height: 100vh;
      }

      .leaflet-popup-content {
        width: 250px;
        height: 100px;
      }

      .col {
        float: left;
        width: 50%;
      }
      .row:after {
        content: "";
        display: table;
        clear: both;
      }
    </style>
  </head>
  <body class="bg-slate-500 lg:overflow-hidden">
    <div class="text-white min-h-screen container lg:flex lg:justify-between p-5">
      <div class="p-2">
        <h2 style="text-align: center;">MAPS MARKER</h2>  

    <div id="map"></div>
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.min.js"></script>
    <script>
      // Menampilkan peta
      var mymap = L.map("map").setView(
        [-8.603607422866869, 115.25938289670269],
        11
      );

      // Menambahkan layer peta
      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
          'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
        maxZoom: 18,
      }).addTo(mymap);

      // Membuat icon dari gambar PNG
      var myIcon = L.icon({
        iconUrl: "icon.webp",
        iconSize: [80, 80],
        iconAnchor: [20, 40],
      });

      // Buat marker dengan popup
      var marker = L.marker([-8.661702661592212, 115.17982721328737], {
        draggable: true,
      }).addTo(mymap);

      // Format popup content
      function formatContent(lat, lng) {
          return `
              <div class="wrapper">
                  <div class="row">
                      <div class="cell merged" style="text-align:center">Koordinat</div>
                  </div>
                  <div class="row">
                      <div class="col">Latitude</div>
                      <div class="col">${lat}</div>
                  </div>
                  <div class="row">
                      <div class="col">Longitude</div>
                      <div class="col">${lng}</div>
                  </div>
              </div>
          `;
      }

      var popupOpen = false;

      // Menambahkan event listener pada marker untuk menampilkan atau menutup popup
      marker.on("click", function () {
          if (!popupOpen) {
              var latLng = marker.getLatLng();
              var popupContent = formatContent(latLng.lat, latLng.lng);

              var popup = L.popup({
                  offset: [0, -30],
                  maxWidth: 250,
                  maxHeight: 100
              }).setLatLng(marker.getLatLng()).setContent(popupContent);

              marker.bindPopup(popup).openPopup();

              popupOpen = true;
          } else {
              marker.closePopup();
              popupOpen = false;
          }
      });

    </script>
  </body>
</html>
