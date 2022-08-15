<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB GIS</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

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

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .leaflet-container {
            height: 470px;
            width: 600px;
            max-width: 100%;
            max-height: 100%;
        }
    </style>

</head>

<body>
    @include('layouts.detail')
    @foreach ($data as $d)
        <div class="container">
            <div class="card shadow shadow-sm mt-4 mb-4">
                <div class="card-body">
                    <a class="btn btn-success btn-sm" href="/data">Kembali</a>
                    <h3 class="text-center font-weight-bold">DETAIL COFFEE SHOP</h3>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 p-2">
                            <img class="img-fluid rounded mx-auto d-block"
                                src="{{ url('images/numpanh/') }}/{{ $d->Gambar }}">
                        </div>
                        <div class="col-lg-6 p-2">
                            <div class="map" id="peta">
                                <input type="hidden" name="latitude" id="latitude" value="{{ $d->Latitude }}">
                                <input type="hidden" name="longitude" id="longitude" value="{{ $d->Longitude }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <!-- Detail -->
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="font-weight-bold">Nama Coffee Shop</p>
                                </div>
                                <div class="col-lg-1">
                                    <p class="d-none d-sm-block">:</p>
                                </div>
                                <div class="col-lg-7">
                                    <p>{{ $d->Title }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="font-weight-bold">Alamat</p>
                                </div>
                                <div class="col-lg-1">
                                    <p class="d-none d-sm-block">:</p>
                                </div>
                                <div class="col-lg-7">
                                    <p>{{ $d->Alamat }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4 ">
                                    <p class="font-weight-bold">Latitude</p>
                                </div>
                                <div class="col-lg-1">
                                    <p class="d-none d-sm-block">:</p>
                                </div>
                                <div class="col-lg-7">
                                    <p>{{ $d->Latitude }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="font-weight-bold">Longitude</p>
                                </div>
                                <div class="col-lg-1">
                                    <p class="d-none d-sm-block">:</p>
                                </div>
                                <div class="col-lg-7">
                                    <p>{{ $d->Longitude }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-start">
                            <small>{{ $d->Date_Created }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    var Latitude = document.getElementById("latitude").value;
    var Longitude = document.getElementById("longitude").value;

    var map = L.map('peta', {
        zoomControl: false
    }).setView([Latitude, Longitude], 19);

    L.control.zoom({
        position: 'topright'
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

    L.marker([Latitude, Longitude], {
        icon: drinkIcon
    }).addTo(map)
</script>

</html>
