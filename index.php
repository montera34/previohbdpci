<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head profile="http://gmpg.org/xfn/11">
	<title>Estudios previos. Hacia una base de datos p&uacute;blica de cad&aacute;veres inmobiliarios</title>
	<meta http-equiv="content-type" content="text/html"/>
	<meta name="description" content="hacia base de datos publica burbuja inmobiliaria. Estudios previos" />
	<meta charset="utf-8">

	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5/leaflet.css" />
	<link rel="stylesheet" href="css/style.css">
	
</head>
<body>
<div id="fb-root"></div>
	<div class="container main-container">
		<h1>Estudios previos. Hacia una base de datos p&uacute;blica de cad&aacute;veres inmobiliarios</h1>
		<div id="desc">
      <p>Superposici&oacute;n de bases de datos de estudios previos sobre cad&aacute;veres inmobiliarios. <br>
      Puedes ver algunos de los <a href="http://6000km.org/cadaveres/site/mapas.html">proyectos participantes en esta web</a>.<br>
      <a href="http://www.6000km.org/2014/11/03/que-paso-en-el-encuentro-de-hacia-una-base-de-datos-publica-de-cadaveres-inmobiliarios/">M&aacute;s informaci&oacute;n sobre el proyecto Hacia una base de datos p&uacute;blica de cad&aacute;veres inmobiliarios</a>.<br>
      <p id="leyenda">Leyenda:
      	<span style="background-color:#0033CC;color:white;">6000km</span>
      	<span style="background-color:#DD0000;color:white;">Especulaci&oacute;n (Ecologistas en Acci&oacute;n)</span>
      	<span style="background-color:#FF66CC;color:white;">Medit Urban</span>
      	<span style="background-color:#339900;color:white;">Naci&oacute;n Rotonda</span>
      	<span style="background-color:#990099;color:white;">Neoruinas (Tenerife)</span>
      	<span style="background-color:#FFFF00;">Ruinas modernas</span>
      </p>
		</div>
		<script src="data/hacia.js"></script>
		
		<script src="data/especulacionecologistas.js"></script>
		<script src="data/ruinasmodernas.js"></script>
		<script src="data/nacionrotonda.js"></script>
		<script src="data/6000km.js"></script>
		<script src="data/mediturban.js"></script>
		<script src="data/neoruinas.js"></script>
		
		<script src="http://cdn.leafletjs.com/leaflet-0.4.5/leaflet.js"></script>
		<div tabindex="0" class="leaflet-container leaflet-fade-anim" id="map" style="width: 100%; height: 600px; position: relative;"></div>
		<div class="page-footer">
		<p>Proyectos que participan aportando sus datos:<br>
		<ul>
			<li><a href="http://6000km.org/localizaciones/">6.000km (Basurama)</a></li>
			<li><a href="http://ecowiki.ecologistasenaccion.org/wiki/Mapa_de_la_especulaci%C3%B3n_2012">Mapa de Especlaci&oacute;n (Ecologistas en Acción)</a></li>
			<li><a href="http://mediturban.blogspot.com.es/2014/03/gestion-integral-para-el-reciclaje-de.html">Medit_Urban</a></li>
			<li><a href="http://www.nacionrotonda.com/">Nación Rotonda</a></li>
			<li><a href="https://www.facebook.com/neoruinas">Neo-Ruinas</a></li>
			<li><a href="http://www.juliaschulzdornburg.com/?page_id=644">Ruinas contemporáneas</a></li>
		</ul>
		</p>
			<p>Contribuye mejorando el c&oacute;digo en <a href="https://github.com/montera34/previohbdpci">https://github.com/montera34/previohbdpci</a></p>
		</div>
	</div>
</div>
<script>
				
		function onEachFeature(feature, layer) {
    // does this feature have a property named description?
    if (feature.properties && feature.properties.name) {
        layer.bindPopup("<strong>"+feature.properties.name+"</strong><br>"+feature.properties.description);
				}
		}
		
		var especulacionOptions = {
		  radius: 8,
		  fillColor:"#DD0000",
		  color: "#000",
		  weight: 1,
		  opacity: 1,
		  fillOpacity: 0.8
		};
		
		var ruinasOptions = {
		  radius: 8,
		  fillColor:"#FFFF00",
		  color: "#000",
		  weight: 1,
		  opacity: 1,
		  fillOpacity: 0.8
		};
		
		var nacionrotondaOptions = {
		  radius: 8,
		  fillColor:"#339900",
		  color: "#000",
		  weight: 1,
		  opacity: 1,
		  fillOpacity: 0.8
		};
		
		var db6000kmOptions = {
		  radius: 8,
		  fillColor:"#0033CC",
		  color: "#000",
		  weight: 1,
		  opacity: 1,
		  fillOpacity: 0.8
		};
		
		var mediturbanOptions = {
		  radius: 8,
		  fillColor:"#FF66CC",
		  color: "#000",
		  weight: 1,
		  opacity: 1,
		  fillOpacity: 0.8
		};

		var neoruinasOptions = {
		  radius: 8,
		  fillColor:"#990099",
		  color: "#000",
		  weight: 1,
		  opacity: 1,
		  fillOpacity: 0.8
		};
		
		//nacion rotonda
		var nrotonda = new L.LayerGroup();
		L.geoJson(nacionrotonda, {
			onEachFeature: onEachFeature,
		  pointToLayer: function (feature, latlng) {
		      return L.circleMarker(latlng, nacionrotondaOptions);
		  }
		}).addTo(nrotonda);
		
		//ecologistas
		var ecolog = new L.LayerGroup();
		L.geoJson(especulacionecologistas, {
			onEachFeature: onEachFeature,
		  pointToLayer: function (feature, latlng) {
		      return L.circleMarker(latlng, especulacionOptions);
		  }
		}).addTo(ecolog);
		
		//ruinas modernas
		var ruinas = new L.LayerGroup();
		L.geoJson(ruinasmodernas, {
			onEachFeature: onEachFeature,
		  pointToLayer: function (feature, latlng) {
		      return L.circleMarker(latlng, ruinasOptions);
		  }
		}).addTo(ruinas);

		//6000km
		var seismil = new L.LayerGroup(); 
		L.geoJson(db6000km, {
			onEachFeature: onEachFeature,
		  pointToLayer: function (feature, latlng) {
		      return L.circleMarker(latlng, db6000kmOptions);
		  }
		}).addTo(seismil);
		
		//mediturban
		var medit = new L.LayerGroup();  
		L.geoJson(mediturban, {
			onEachFeature: onEachFeature,
		  pointToLayer: function (feature, latlng) {
		      return L.circleMarker(latlng, mediturbanOptions);
		  }
		}).addTo(medit);
		
		//neoruinas
		var neo = new L.LayerGroup();  
		L.geoJson(neoruinas, {
			onEachFeature: onEachFeature,
		  pointToLayer: function (feature, latlng) {
		      return L.circleMarker(latlng, neoruinasOptions);
		  }
		}).addTo(neo);
		
		var mbAttr = 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		mbUrl = 'https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png';
			
		var simple  = L.tileLayer(mbUrl, {id: 'examples.map-20v6611k',attribution: mbAttr});
		
		var pnoa = L.tileLayer.wms("http://www.ign.es/wms-inspire/pnoa-ma", {
			layers: 'OI.OrthoimageCoverage',
			format: 'image/jpeg',
			transparent: false,
			version: '1.3.0',
			attribution: "PNOA WMS. Cedido por © Instituto Geográfico Nacional de España"
		});

		var map = L.map('map', {
			center: [36, -2],
			zoom: 5,
			layers: [simple,nrotonda,ecolog,ruinas,seismil,medit,neo]
		});

		var baseLayers = {
			"Mapa": simple,
			"Ortofoto": pnoa
		};

		var overlays = {
			"6000 km": seismil,
			"Especulación (ecologistas en acción)": ecolog,
			"Medit Urban": medit,
			"Nación Rotonda": nrotonda,
			"Neoruinas (Tenerife)": neo,
			"Ruinas Modernas": ruinas
		};

		L.control.layers(baseLayers, overlays).addTo(map);
		
	</script>
<?php include "stats.php"; ?>
</body>
</html>
