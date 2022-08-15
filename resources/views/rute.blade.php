<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB GIS</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/js/leaflet-routing-machine/dist/leaflet-routing-machine.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.8/dist/esri-leaflet.js"
        integrity="sha512-E0DKVahIg0p1UHR2Kf9NX7x7TUewJb30mxkxEm2qOYTVJObgsAGpEol9F6iK6oefCbkJiA4/i6fnTHzM6H1kEA=="
        crossorigin=""></script>

    <!-- Load Esri Leaflet Vector from CDN -->
    <script src="https://unpkg.com/esri-leaflet-vector@3.1.2/dist/esri-leaflet-vector.js"
        integrity="sha512-SnA/TobYvMdLwGPv48bsO+9ROk7kqKu/tI9TelKQsDe+KZL0TUUWml56TZIMGcpHcVctpaU6Mz4bvboUQDuU3w=="
        crossorigin=""></script>

    <script src="/js/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
</head>

<body>
    @include('layouts.main')
    @foreach ($data as $d)
        <input type="hidden" name="latitude" id="latitude" value="{{ $d->Latitude }}">
        <input type="hidden" name="longitude" id="longitude" value="{{ $d->Longitude }}">
    @endforeach
    <div id="map"></div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="/js/L.Control.MousePosition.js"></script>

<script>
    var Latitude = document.getElementById("latitude").value;
    var Longitude = document.getElementById("longitude").value;

    $(document).ready(function() {
        kesini(Latitude, Longitude)
    });

    var map = L.map('map', {
        zoomControl: false
    }).setView([Latitude, Longitude], 13);

    L.control.zoom({
        position: 'topleft'
    }).addTo(map);

    L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 30,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    var drinkIcon = L.icon({
        iconUrl: '/images/drink.png',
        iconSize: [30, 36],
        shadowSize: [50, 64],
        iconAnchor: [15, 36],
        shadowAnchor: [4, 62],
        popupAnchor: [-3, -76]
    });

    marker = L.marker([Latitude, Longitude], {
        icon: drinkIcon
    }).addTo(map);

    var legend = L.control({
        position: "bottomright"
    });

    legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h4>Legenda</h4>";
        div.innerHTML +=
            '<img src="/images/drink.png" width="18px" class="icon py-2"></i><span class="px-2">Coffee Shop</span><br>';
        div.innerHTML += '<i style="background: #477AC2"></i><span>Perairan</span><br>';
        div.innerHTML += '<i style="background: #448D40"></i><span>Hutan</span><br>';
        div.innerHTML += '<i style="background: #E6E696"></i><span>Toko</span><br>';
        div.innerHTML += '<i style="background: #E8E6E0"></i><span>Perkotaan</span><br>';

        return div;
    };

    legend.addTo(map);

    L.control.mousePosition().addTo(map);

    var control = L.Routing.control({
        waypoints: [
            L.latLng(),
            L.latLng()
        ],
        lineOptions: {
            styles: [{
                color: 'blue',
                opacity: 1,
                weight: 5
            }]
        },
        routeWhileDragging: true
    }).addTo(map);

    getlocation();

    function getlocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showposition);
        } else {
            x.innerHTML = "Bye";
        }
    }

    function showposition(posisi) {
        var latlang2 = [posisi.coords.latitude, posisi.coords.longitude];
        control.spliceWaypoints(0, 1, latlang2);
        map.panTo(latlang2);
    };

    function kesini(Latitude, Longitude) {
        var latlang1 = L.latLng(Latitude, Longitude);
        control.spliceWaypoints(control.getWaypoints().length - 1, 1, latlang1);
        console.log(control.getWaypoints().length);
    }
</script>

</html>
