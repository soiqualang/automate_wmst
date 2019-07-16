var map = L.map('map', {
    zoom: 12,
    zoomDelta: 0.5,
    zoomSnap: 0.5,    
    fullscreenControl: true,
    timeDimension: true,
    timeDimensionControl: true,
    center: [10.9978,106.5801],
});

var hash = new L.Hash(map);

//106.64,15.46

// https://ogcie.iblsoft.com/metocean/wms?SERVICE=WMS&VERSION=1.3.0&REQUEST=GetCapabilities
//http://girs.vn:8081/geoserver15/test/wms?SERVICE=WMS&VERSION=1.3.0&REQUEST=GetCapabilities

var atlas_vietnamWMS = "http://dev.dothanhlong.org:8080/geoserver/atlas_vietnam/wms";
var testWMS = "https://ogcie.iblsoft.com/metocean/wms";
var wmst_serv='http://girs.vn:8081/geoserver15/automate/wms';

var proxy = 'proxy.php';


var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr}), streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});

grayscale.addTo(map);

var baseLayer=L.tileLayer.wms(testWMS, {
    layers: 'foreground-lines',
    format: 'image/png',
    transparent: true,
    crs: L.CRS.EPSG4326
});
//baseLayer.addTo(map);




var LST_source = L.tileLayer.wms(wmst_serv, {
        layers: 'lst',
    format: 'image/png',
    transparent: true,
	crs: L.CRS.EPSG4326,
    time: '0001-01-01T00:00:00'
});

var LST = L.timeDimension.layer.wms(LST_source, {
    proxy: proxy,
    updateTimeDimension: true,
});
//LST.addTo(map);


var NDVI_source = L.tileLayer.wms(wmst_serv, {
        layers: 'ndvi',
    format: 'image/png',
    transparent: true,
	crs: L.CRS.EPSG4326,
    time: '0001-01-01T00:00:00'
});

var NDVI = L.timeDimension.layer.wms(NDVI_source, {
    proxy: proxy,
    updateTimeDimension: true,
});
//NDVI.addTo(map);



var baseMaps = {
    "Lớp nền": grayscale
};

var overlayMaps = {
    "LST": LST,
	"NDVI":NDVI,
    "Lớp ranh thế giới": baseLayer
};

L.control.layers(baseMaps, overlayMaps).addTo(map);

/*
var testLegend = L.control({
    position: 'topright'
});
testLegend.onAdd = function(map) {
    var src = testWMS + "?SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&LAYER=timeline_georeferencer&style=test:bentre_wmst&FORMAT=image/png";
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML +=
        '<img src="' + src + '" alt="legend">';
    return div;
};
testLegend.addTo(map);
*/