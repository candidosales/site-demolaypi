<?php get_header(); ?>

		<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/handlebars-1.0.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/api.google-maps.diretoria.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/regioes.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/diretorias.js"></script>
		<script >
		$(function(){ 

			var source = 
			'<p>Selecione abaixo para destacar no mapa</p>'+
			'<ul>'+
			'{{#each cavalaria}}'+
			'<li id="{{number}}-menu" class="diretoria-cavalaria" data-id="{{number}}" data-type="{{type}}" data-lat="{{lat}}" data-lng="{{lng}}" data-zindex="{{zIndex}}" data-zoom="15" data-title="{{title}}">{{title}}</li>'+
			'{{/each}}</ul>';
			var template = Handlebars.compile(source);
			$("#menu-diretoria").html(template(diretorias));


			  var map, type;
			  
			  initialize();

			  function initialize() {
				var myLatLng = new google.maps.LatLng(-6.774, -42.894);
				var myOptions = {
				  zoom: 6,
				  center: myLatLng,
				  mapTypeId: google.maps.MapTypeId.TERRAIN
				};

				map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

		  		var norte;
				var centroNorte;
				var centroSul;
				var sul;

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
				centroNorte.setMap(map);
				centroSul.setMap(map);
				sul.setMap(map);


				
				type = $('#diretoria').attr('class');
		  		setMarkers(map,type,diretorias[type]);
		  	}


			 $('li.diretoria-'+type+'').click(function(e){

			 	var t = $(this);
				var id = t.data('id');
				var index = t.data('index');
				var zoom = t.data('zoom');
				$.each(marker, function(i, value) {
					
					value.setAnimation(null);

					if(value.id == id && value.index == index && map_windows[i]) {
						$.each(map_windows, function(x, window) {
							window.close();
						});
						selectContent(value);
						map_windows[i].open(map,value);
					}
				});
				e.preventDefault();
			 });
		  	

		  });
		</script>


<div class="row">
  	<div class="eight columns">
  	   <div class="twelve columns">
  	   	<div id="menu-diretoria" class="four columns">
  	   		
  	   	</div>
  	   	<div class="eight columns">
  	   		 <section id="map">
	   			<div id="map_canvas" style="height: 422px;"></div>
	  		 </section>
  	   	</div>
	   </div>
	  		<h2 id="title-cavalaria"></h2>
	  	<div id="diretoria" class="cavalaria">
	 
		</div><!-- diretoria-->
	</div><!-- eight columns-->
	<div class="four columns">
		<?php get_sidebar("cavalaria"); ?>
	</div>
</div><!-- row-->
<?php get_footer(); ?>


