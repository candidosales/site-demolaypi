$(function(){ 
	  var map;
	  var infoWindow;

	  function initialize() {
		var myLatLng = new google.maps.LatLng(-6.774, -42.894);
		var myOptions = {
		  zoom: 6,
		  center: myLatLng,
		  zoomControlOptions: {
	        style: google.maps.ZoomControlStyle.SMALL
	      },
	      streetViewControl: false,
	      mapTypeControl: false,
		  mapTypeId: google.maps.MapTypeId.TERRAIN
		};

		var norte;
		var centroNorte;
		var centroSul;
		var sul;

		map = new google.maps.Map(document.getElementById("map_canvas"),
			myOptions);
		
		norte = new google.maps.Polygon({
		  paths: regiaoNorte,
		  strokeColor: "#FF0000",
		  strokeOpacity: 0.8,
		  strokeWeight: 2,
		  fillColor: "#FF0000",
		  fillOpacity: 0.4
		});
		
		centroNorte = new google.maps.Polygon({
		  paths: regiaoCentroNorte,
		  strokeColor: "#00FF00",
		  strokeOpacity: 0.8,
		  strokeWeight: 2,
		  fillColor: "#00FF00",
		  fillOpacity: 0.4
		});
		
		centroSul = new google.maps.Polygon({
		  paths: regiaoCentroSul,
		  strokeColor: "#0000FF",
		  strokeOpacity: 0.8,
		  strokeWeight: 2,
		  fillColor: "#0000FF",
		  fillOpacity: 0.4
		});
		sul = new google.maps.Polygon({
		  paths: regiaoSul,
		  strokeColor: "#FFFFFF",
		  strokeOpacity: 0.8,
		  strokeWeight: 2,
		  fillColor: "#FFFFFF",
		  fillOpacity: 0.4
		});

		norte.setMap(map);
		google.maps.event.addListener(norte, 'click', function(event) {
			infowindow.setContent("<b>Região Norte</b><hr/><br />Abrange o Capítulo de Parnaíba<br />");
			infowindow.setPosition(event.latLng);
			infowindow.open(map);
			revealRegion('norte');
		  });

		
		centroNorte.setMap(map);
		google.maps.event.addListener(centroNorte, 'click', function(event) {
			infowindow.setContent("<b>Região Centro Norte</b><hr/><br />Abrange os Capítulos de Altos, Teresina e Água Branca<br />");
			infowindow.setPosition(event.latLng);
			infowindow.open(map);
			revealRegion('centroNorte');
		  });
		
		centroSul.setMap(map);
		google.maps.event.addListener(centroSul, 'click', function(event) {
			infowindow.setContent("<b>Região Centro Sul</b><hr/><br />Abrange os Capítulos de Picos, Jaicós e Simões<br />");
			infowindow.setPosition(event.latLng);
			infowindow.open(map);
			revealRegion('centroSul');
		  });
		
		sul.setMap(map);
		google.maps.event.addListener(sul, 'click', function(event) {
			infowindow.setContent("<b>Região Sul</b><hr/><br />Abrange os Capítulos de Floriano, Canto do Buriti e Bom Jesus<br />");
			infowindow.setPosition(event.latLng);
			infowindow.open(map);
			revealRegion('sul');
		  });
		
		infowindow = new google.maps.InfoWindow();
		
		
	  }
	  	function revealRegion(region){
			
			$('#mestres-regionais ul li').each(function(index) {
				$(this).removeClass('active');
			});
			$('#'+region).addClass('active');
		}

	  function showArrays(event) {
		// Since this Polygon only has one path, we can call getPath()
		// to return the MVCArray of LatLngs
		var vertices = this.getPath();

		var contentString = "<b>Região Norte</b><br />Abrange os Capítulos de Parnaíba, Altos e Teresina<br />";
		// Replace our Info Window's content and position
		infowindow.setContent(contentString);
		infowindow.setPosition(event.latLng);

		infowindow.open(map);
	  }  

	  function var_dump(obj) {
		   if(typeof obj == "object") {
		      return "Type: "+typeof(obj)+((obj.constructor) ? "\nConstructor: "+obj.constructor : "")+"\nValue: " + obj;
		   } else {
		      return "Type: "+typeof(obj)+"\nValue: "+obj;
		   }
		}//end function var_dump


	initialize();
 });