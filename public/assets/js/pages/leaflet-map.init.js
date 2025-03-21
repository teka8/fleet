/*
Template Name: StarCode & Dashboard Template
Author: StarCode Kh
Website: https://StarCode Kh.in/
Contact: StarCode Kh@gmail.com
File: Leaflet init js
*/

// leaflet-map
var mymap = L.map('leaflet-map').setView([9.019499967671436, 38.724549707223574], 11);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoidGhlbWVzYnJhbmQiLCJhIjoiY2xmbmc3bTV4MGw1ejNzbnJqOWpubzhnciJ9.DNkdZVKLnQ6I9NOz7EED-w', {
    maxZoom: 18,
    // attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
    //     '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    //     'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(mymap);

// leaflet-map-marker
var markermap = L.map('leaflet-map-marker').setView([9.019499967671436, 38.724549707223574], 13);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoidGhlbWVzYnJhbmQiLCJhIjoiY2xmbmc3bTV4MGw1ejNzbnJqOWpubzhnciJ9.DNkdZVKLnQ6I9NOz7EED-w', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(markermap);

var mapPinIcon = L.icon({
    iconUrl: 'assets/images/map-pin.png',
});

L.marker([51.5, -0.09], { icon: mapPinIcon }).addTo(markermap);

L.circle([51.508, -0.11], {
    color: '#0ab39c',
    fillColor: '#0ab39c',
    fillOpacity: 0.5,
    radius: 500
}).addTo(markermap);

L.polygon([
    [51.509, -0.08],
    [51.503, -0.06],
    [51.51, -0.047]
], {
    color: '#405189',
    fillColor: '#405189',
}).addTo(markermap);


// Working with popups
var popupmap = L.map('leaflet-map-popup').setView([9.019499967671436, 38.724549707223574], 13);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoidGhlbWVzYnJhbmQiLCJhIjoiY2xmbmc3bTV4MGw1ejNzbnJqOWpubzhnciJ9.DNkdZVKLnQ6I9NOz7EED-w', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(popupmap);

var mapPinIcon = L.icon({
    iconUrl: 'assets/images/map-pin.png',
});
L.marker([51.5, -0.09], { icon: mapPinIcon }).addTo(popupmap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

L.circle([51.508, -0.11], 500, {
    color: '#f06548',
    fillColor: '#f06548',
    fillOpacity: 0.5
}).addTo(popupmap).bindPopup("I am a circle.");

L.polygon([
    [51.509, -0.08],
    [51.503, -0.06],
    [51.51, -0.047]
], {
    color: '#405189',
    fillColor: '#405189',
}).addTo(popupmap).bindPopup("I am a polygon.");

var popup = L.popup();

// leaflet-map-custom-icons
var customiconsmap = L.map('leaflet-map-custom-icons').setView([51.5, -0.09], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(customiconsmap);

var LeafIcon = L.Icon.extend({
    options: {
        iconSize: [45, 45],
        iconAnchor: [22, 94],
        popupAnchor: [-3, -76]
    }
});

var greenIcon = new LeafIcon({
    iconUrl: 'assets/images/logo-sm.png'
});

L.marker([51.5, -0.09], {
    icon: greenIcon
}).addTo(customiconsmap);


// Interactive Choropleth Map
var interactivemap = L.map('leaflet-map-interactive-map').setView([37.8, -96], 4);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoidGhlbWVzYnJhbmQiLCJhIjoiY2xmbmc3bTV4MGw1ejNzbnJqOWpubzhnciJ9.DNkdZVKLnQ6I9NOz7EED-w', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/light-v9',
    tileSize: 512,
    zoomOffset: -1
}).addTo(interactivemap);


// get color depending on population density value
function getColor(d) {
    return d > 1000 ? '#405189' :
        d > 500 ? '#516194' :
            d > 200 ? '#63719E' :
                d > 100 ? '#7480A9' :
                    d > 50 ? '#8590B4' :
                        d > 20 ? '#97A0BF' :
                            d > 10 ? '#A8B0C9' :
                                '#A8B0C9';
}

function style(feature) {
    return {
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7,
        fillColor: getColor(feature.properties.density)
    };
}

var geojson = L.geoJson(statesData, {
    style: style,
}).addTo(interactivemap);

// leaflet-map-group-control
var cities = L.layerGroup();

var mapPinIcon = L.icon({
    iconUrl: 'assets/images/map-pin.png',
});

L.marker([39.61, -105.02], { icon: mapPinIcon }).bindPopup('This is Littleton, CO.').addTo(cities),
    L.marker([39.74, -104.99], { icon: mapPinIcon }).bindPopup('This is Denver, CO.').addTo(cities),
    L.marker([39.73, -104.8], { icon: mapPinIcon }).bindPopup('This is Aurora, CO.').addTo(cities),
    L.marker([39.77, -105.23], { icon: mapPinIcon }).bindPopup('This is Golden, CO.').addTo(cities);


var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoidGhlbWVzYnJhbmQiLCJhIjoiY2xmbmc3bTV4MGw1ejNzbnJqOWpubzhnciJ9.DNkdZVKLnQ6I9NOz7EED-w';

var grayscale = L.tileLayer(mbUrl, {
    id: 'mapbox/light-v9',
    tileSize: 512,
    zoomOffset: -1,
    attribution: mbAttr
}),
    streets = L.tileLayer(mbUrl, {
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        attribution: mbAttr
    });

var layergroupcontrolmap = L.map('leaflet-map-group-control', {
    center: [39.73, -104.99],
    zoom: 10,
    layers: [streets, cities]
});

var baseLayers = {
    "Grayscale": grayscale,
    "Streets": streets
};

var overlays = {
    "Cities": cities
};

L.control.layers(baseLayers, overlays).addTo(layergroupcontrolmap);