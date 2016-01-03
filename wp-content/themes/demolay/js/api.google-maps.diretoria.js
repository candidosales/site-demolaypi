		var auxMarker = null, marker = [], map_windows = [];

		function setMarkers(map,type, locations) {
		  // Add markers to the map
		  // Marker sizes are expressed as a Size of X,Y
		  // where the origin of the image (0,0) is located
		  // in the top left of the image.

		  // Origins, anchor positions and coordinates of the marker
		  // increase in the X direction to the right and in
		  // the Y direction down.
		 var image = new google.maps.MarkerImage('/admin/wp-content/themes/demolay/img/marker_map_'+type+'.png',
			  // This marker is 20 pixels wide by 32 pixels tall.
			  new google.maps.Size(40, 52),
			  // The origin for this image is 0,0.
			  new google.maps.Point(0,0),
			  // The anchor for this image is the base of the flagpole at 0,32.
			  new google.maps.Point(20, 52));
		  /*var shadow = new google.maps.MarkerImage('/admin/wp-content/themes/demolay/img/marker_map_shadow_'+type+'.png',
			  // The shadow image is larger in the horizontal dimension
			  // while the position and offset are the same as for the main image.
			  new google.maps.Size(42, 32),
			  new google.maps.Point(0,0),
			  new google.maps.Point(4, 32));*/
			  // Shapes define the clickable region of the icon.
			  // The type defines an HTML &lt;area&gt; element 'poly' which
			  // traces out a polygon as a series of X,Y points. The final
			  // coordinate closes the poly by connecting to the first
			  // coordinate.

		  var shape = {
			  coord: [1, 1, 1, 20, 18, 20, 18 , 1],
			  type: 'poly'
		  };
		  
		  var tam = locations.length
		  
		  for (var i = 0; i < tam; i++) {
			var diretoria = locations[i];
			var myLatLng = new google.maps.LatLng(diretoria['lat'], diretoria['lng']);
		    marker[i] = new google.maps.Marker({
				position: myLatLng,
				map: map,
				icon: image,
				shape: shape,
				type: diretoria['type'],
				id: diretoria['number'],
				zIndex: diretoria['zIndex'],
				title: diretoria['title'],
				city: diretoria['city']
			});
			 attachSecretMessage(marker[i], contentWindow(marker[i],marker[i].id));
		  	 if(i==0){
		  		selectContent(marker[i]);
		 	 }
		  }

		}
			
		  // The five markers show a secret message when clicked
		  // but that message is not within the marker's instance data
		  function attachSecretMessage(value, message) {
			var infowindow = new google.maps.InfoWindow({
			  content: message,
			  maxWidth: 300
			});


			map_windows.push(infowindow);	
				google.maps.event.addListener(value, 'click', function() {
				  	infowindow.open(value.get('map'), value);
					//Pega os dados do último balão apresentado
					selectContent(value);	
				});
		  }
		  
		  function contentWindow(value, id){
			return '<div id="baloon-'+id+'" class="'+value.type+'" rel="'+id+'" >'+
						'<h2><img width="20" height="20" src="/admin/wp-content/themes/demolay/img/cavalaria-mini.png"/> '+value.title+', N°'+value.id+'</h2>'+
						'<p>'+value.city+'</p>'+
					'</div>';
		  }

		  //Fará as mudanças de animação do marcador e a seleção na lista
		  	function toggleBounce(value) {
		  			
			        if (value.getAnimation() != null) {
			          value.setAnimation(null);
			          $('#'+value.id+'-menu').removeClass('active');

			        } else {
				        if(auxMarker !=null && auxMarker.id != value.id){
				        	auxMarker.setAnimation(null);
				        	$('#'+auxMarker.id+'-menu').removeClass('active');
				        }
				        auxMarker = value;
				        value.setAnimation(google.maps.Animation.BOUNCE);
				        $('#'+value.id+'-menu').addClass('active');

			        }
			}

			//Carrega o contéudo específico da diretoria
			function loadContent(value){
				$.ajax({
					  url: '/admin/wp-content/themes/demolay/diretoria/'+value.type+'/'+ value.id+'.php',
					  dataType: "html",
					  type: 'GET',
					  beforeSend: function(){
					  },
					  complete: function(){
					  },
					  success: function(data){
					  	$('#diretoria').html(data);
					  }
					});
			}

			function selectContent(value){
				loadContent(value);
		 	 	$('#title-'+value.type).html(value.title+', N° '+value.id);
		 	 	toggleBounce(value);
			}

	