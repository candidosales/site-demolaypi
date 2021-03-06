		var regiaoNorte = [
			new google.maps.LatLng(-4.171, -41.069),/*Come�a do primeiro ponto da direita*/
			new google.maps.LatLng(-3.831, -41.277),
			new google.maps.LatLng(-3.491, -41.387),
			new google.maps.LatLng(-3.349, -41.453),
			new google.maps.LatLng(-3.162, -41.343),
			new google.maps.LatLng(-2.965, -41.255),
			new google.maps.LatLng(-2.910, -41.343),
			new google.maps.LatLng(-2.877, -41.640),
			new google.maps.LatLng(-2.767, -41.838),
			new google.maps.LatLng(-2.990, -41.822),
			new google.maps.LatLng(-3.195, -41.981),
			new google.maps.LatLng(-3.387, -42.174),
			new google.maps.LatLng(-3.44, -42.51),
			new google.maps.LatLng(-3.85, -42.75),
			new google.maps.LatLng(-4.20, -43.01),
			new google.maps.LatLng(-4.27, -42.30),
			new google.maps.LatLng(-4.37, -41.40)
		];

		var regiaoCentroNorte = [
			new google.maps.LatLng(-6.141, -40.85),/*Come�a do primeiro ponto da direita*/
			new google.maps.LatLng(-5.441, -40.94),
			new google.maps.LatLng(-4.960, -41.10),
			new google.maps.LatLng(-4.472, -41.19),
			new google.maps.LatLng(-4.171, -41.069),
			new google.maps.LatLng(-4.374, -41.40),
			new google.maps.LatLng(-4.270, -42.30),
			new google.maps.LatLng(-4.199, -43.01),
			new google.maps.LatLng(-4.522, -42.90),
			new google.maps.LatLng(-4.576, -42.891),
			new google.maps.LatLng(-4.757, -42.94),
			new google.maps.LatLng(-5.118, -42.85),
			new google.maps.LatLng(-5.386, -42.91),
			new google.maps.LatLng(-5.545, -43.014),
			new google.maps.LatLng(-5.725, -43.11),
			new google.maps.LatLng(-6.097, -43.073),
			new google.maps.LatLng(-6.240, -42.865),
			new google.maps.LatLng(-6.222, -42.586),
			new google.maps.LatLng(-6.257, -42.124),
			new google.maps.LatLng(-6.258, -41.825),
			new google.maps.LatLng(-6.242, -41.183)
		];
		var regiaoCentroSul = [
			new google.maps.LatLng(-6.240, -42.865),
			new google.maps.LatLng(-6.222, -42.586),
			new google.maps.LatLng(-6.257, -42.124),
			new google.maps.LatLng(-6.258, -41.825),
			new google.maps.LatLng(-6.242, -41.183),
			new google.maps.LatLng(-6.141, -40.85),
			new google.maps.LatLng(-6.314, -40.784),
			new google.maps.LatLng(-6.535, -40.779),
			new google.maps.LatLng(-6.715, -40.562),
			new google.maps.LatLng(-6.809, -40.424),
			new google.maps.LatLng(-6.920, -40.427),
			new google.maps.LatLng(-7.203, -40.498),
			new google.maps.LatLng(-7.386, -40.562),
			new google.maps.LatLng(-7.548, -40.686),
			new google.maps.LatLng(-7.730, -40.680),
			new google.maps.LatLng(-7.469, -41.663),
			new google.maps.LatLng(-7.085, -42.292),
			new google.maps.LatLng(-6.667, -42.932),
			new google.maps.LatLng(-6.460, -42.880)
		];
		
		var regiaoSul = [
			new google.maps.LatLng(-7.730, -40.680),
			new google.maps.LatLng(-7.469, -41.663),
			new google.maps.LatLng(-7.085, -42.292),
			new google.maps.LatLng(-6.667, -42.932),
			new google.maps.LatLng(-6.752, -43.212),
			new google.maps.LatLng(-6.828, -43.473),
			new google.maps.LatLng(-6.700, -43.624),
			new google.maps.LatLng(-6.759, -44.004),
			new google.maps.LatLng(-7.230, -44.556),
			new google.maps.LatLng(-7.441, -44.916),
			new google.maps.LatLng(-7.554, -45.257),
			new google.maps.LatLng(-7.980, -45.552),
			new google.maps.LatLng(-8.570, -45.795),
			new google.maps.LatLng(-8.927, -45.998),
			new google.maps.LatLng(-9.341, -45.906),
			new google.maps.LatLng(-9.341, -45.906),
			new google.maps.LatLng(-9.855, -45.871),
			new google.maps.LatLng(-10.019, -45.867),
			new google.maps.LatLng(-10.241, -45.953),
			new google.maps.LatLng(-10.260, -45.783),
			new google.maps.LatLng(-10.146, -45.678),
			new google.maps.LatLng(-10.118, -45.582),
			new google.maps.LatLng(-10.320, -45.475),
			new google.maps.LatLng(-10.481, -45.419),
			new google.maps.LatLng(-10.728, -45.346),
			new google.maps.LatLng(-10.854, -45.047),
			new google.maps.LatLng(-10.758, -44.687),
			new google.maps.LatLng(-10.642, -44.489),
			new google.maps.LatLng(-10.559, -44.308),
			new google.maps.LatLng(-10.626, -44.124),
			new google.maps.LatLng(-10.428, -44.026),
			new google.maps.LatLng(-10.180, -43.778),
			new google.maps.LatLng(-9.993, -43.669),
			new google.maps.LatLng(-9.865, -43.673),
			new google.maps.LatLng(-9.831, -43.661),
			new google.maps.LatLng(-9.589, -43.841),
			new google.maps.LatLng(-9.391, -43.650),
			new google.maps.LatLng(-9.288, -43.410),
			new google.maps.LatLng(-9.385, -43.147),
			new google.maps.LatLng(-9.551, -42.841),
			new google.maps.LatLng(-9.463, -42.465),
			new google.maps.LatLng(-9.292, -42.214),
			new google.maps.LatLng(-9.244, -41.851),
			new google.maps.LatLng(-8.962, -41.613),
			new google.maps.LatLng(-8.691, -41.346),
			new google.maps.LatLng(-8.432, -41.028),
			new google.maps.LatLng(-8.144, -40.604),
			new google.maps.LatLng(-7.859, -40.541)		
		];