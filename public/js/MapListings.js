<<<<<<< HEAD
jQuery(document).ready(function($){
	//set your google maps parameters
	var latitude = '25.2048',
		longitude = '55.2708',
		map_zoom = 14;


	//google map custom marker icon - .png fallback for IE11
	var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
	var marker_url = ( is_internetExplorer11 ) ? '/images/cd-icon-location.png' : '/images/cd-icon-location.svg';
		
	//define the basic color of your map, plus a value for saturation and brightness
	var	main_color = '#2d313f',
		saturation_value= -20,
		brightness_value= 5;

	//we define here the style of the map
	var style= [ 
		{
			//set saturation for the labels on the map
			elementType: "labels",
			stylers: [
				{saturation: saturation_value}
			]
		},  
	    {	//poi stands for point of interest - don't show these lables on the map 
			featureType: "poi",
			elementType: "labels",
			stylers: [
				{visibility: "off"}
			]
		},
		{
			//don't show highways lables on the map
	        featureType: 'road.highway',
	        elementType: 'labels',
	        stylers: [
	            {visibility: "off"}
	        ]
	    }, 
		{ 	
			//don't show local road lables on the map
			featureType: "road.local", 
			elementType: "labels.icon", 
			stylers: [
				{visibility: "off"} 
			] 
		},
		{ 
			//don't show arterial road lables on the map
			featureType: "road.arterial", 
			elementType: "labels.icon", 
			stylers: [
				{visibility: "off"}
			] 
		},
		{
			//don't show road lables on the map
			featureType: "road",
			elementType: "geometry.stroke",
			stylers: [
				{visibility: "off"}
			]
		}, 
		//style different elements on the map
		{ 
			featureType: "transit", 
			elementType: "geometry.fill", 
			stylers: [
				{ hue: main_color },
				{ visibility: "on" }, 
				{ lightness: brightness_value }, 
				{ saturation: saturation_value }
			]
		}, 
		{
			featureType: "poi",
			elementType: "geometry.fill",
			stylers: [
				{ hue: main_color },
				{ visibility: "on" }, 
				{ lightness: brightness_value }, 
				{ saturation: saturation_value }
			]
		},
		{
			featureType: "poi.government",
			elementType: "geometry.fill",
			stylers: [
				{ hue: main_color },
				{ visibility: "on" }, 
				{ lightness: brightness_value }, 
				{ saturation: saturation_value }
			]
		},
		{
			featureType: "poi.sport_complex",
			elementType: "geometry.fill",
			stylers: [
				{ hue: main_color },
				{ visibility: "on" }, 
				{ lightness: brightness_value }, 
				{ saturation: saturation_value }
			]
		},
		{
			featureType: "poi.attraction",
			elementType: "geometry.fill",
			stylers: [
				{ hue: main_color },
				{ visibility: "on" }, 
				{ lightness: brightness_value }, 
				{ saturation: saturation_value }
			]
		},
		{
			featureType: "poi.business",
			elementType: "geometry.fill",
			stylers: [
				{ hue: main_color },
				{ visibility: "on" }, 
				{ lightness: brightness_value }, 
				{ saturation: saturation_value }
			]
		},
		{
			featureType: "transit",
			elementType: "geometry.fill",
			stylers: [
				{ hue: main_color },
				{ visibility: "on" }, 
				{ lightness: brightness_value }, 
				{ saturation: saturation_value }
			]
		},
		{
			featureType: "transit.station",
			elementType: "geometry.fill",
			stylers: [
				{ hue: main_color },
				{ visibility: "on" }, 
				{ lightness: brightness_value }, 
				{ saturation: saturation_value }
			]
		},
		{
			featureType: "landscape",
			stylers: [
				{ hue: main_color },
				{ visibility: "on" }, 
				{ lightness: brightness_value }, 
				{ saturation: saturation_value }
			]
			
		},
		{
			featureType: "road",
			elementType: "geometry.fill",
			stylers: [
				{ hue: main_color },
				{ visibility: "on" }, 
				{ lightness: brightness_value }, 
				{ saturation: saturation_value }
			]
		},
		{
			featureType: "road.highway",
			elementType: "geometry.fill",
			stylers: [
				{ hue: main_color },
				{ visibility: "on" }, 
				{ lightness: brightness_value }, 
				{ saturation: saturation_value }
			]
		}, 
		{
			featureType: "water",
			elementType: "geometry",
			stylers: [
				{ hue: main_color },
				{ visibility: "on" }, 
				{ lightness: brightness_value }, 
				{ saturation: saturation_value }
			]
		}
	];
		
	//set google map options
	var map_options = {
      	center: new google.maps.LatLng(latitude, longitude),
      	zoom: map_zoom,
      	panControl: false,
      	zoomControl: false,
      	mapTypeControl: false,
      	streetViewControl: false,
      	mapTypeId: google.maps.MapTypeId.ROADMAP,
      	scrollwheel: false,
      	styles: style,
    }
    //inizialize the map
	var map = new google.maps.Map(document.getElementById('google-container'), map_options);
	//add a custom marker to the map				
	var marker = new google.maps.Marker({
	  	position: new google.maps.LatLng(latitude, longitude),
	    map: map,
	    visible: true,
	 	icon: marker_url,
	});

	//add custom buttons for the zoom-in/zoom-out on the map
	function CustomZoomControl(controlDiv, map) {
		//grap the zoom elements from the DOM and insert them in the map 
	  	var controlUIzoomIn= document.getElementById('cd-zoom-in'),
	  		controlUIzoomOut= document.getElementById('cd-zoom-out');
	  	controlDiv.appendChild(controlUIzoomIn);
	  	controlDiv.appendChild(controlUIzoomOut);

		// Setup the click event listeners and zoom-in or out according to the clicked element
		google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
		    map.setZoom(map.getZoom()+1)
		});
		google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
		    map.setZoom(map.getZoom()-1)
		});
	}

	var zoomControlDiv = document.createElement('div');
 	var zoomControl = new CustomZoomControl(zoomControlDiv, map);

  	//insert the zoom div on the top left of the map
  	map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);
});
//# sourceMappingURL=MapListings.js.map
=======
jQuery(document).ready(function(e){function t(e,t){var i=document.getElementById("cd-zoom-in"),o=document.getElementById("cd-zoom-out");e.appendChild(i),e.appendChild(o),google.maps.event.addDomListener(i,"click",function(){t.setZoom(t.getZoom()+1)}),google.maps.event.addDomListener(o,"click",function(){t.setZoom(t.getZoom()-1)})}var i="25.2048",o="55.2708",s=14,l=navigator.userAgent.toLowerCase().indexOf("trident")>-1,n=l?"/images/cd-icon-location.png":"/images/cd-icon-location.svg",a="#2d313f",r=-20,y=5,p=[{elementType:"labels",stylers:[{saturation:r}]},{featureType:"poi",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"road.highway",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"road.local",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"road.arterial",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"geometry.stroke",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"geometry.fill",stylers:[{hue:a},{visibility:"on"},{lightness:y},{saturation:r}]},{featureType:"poi",elementType:"geometry.fill",stylers:[{hue:a},{visibility:"on"},{lightness:y},{saturation:r}]},{featureType:"poi.government",elementType:"geometry.fill",stylers:[{hue:a},{visibility:"on"},{lightness:y},{saturation:r}]},{featureType:"poi.sport_complex",elementType:"geometry.fill",stylers:[{hue:a},{visibility:"on"},{lightness:y},{saturation:r}]},{featureType:"poi.attraction",elementType:"geometry.fill",stylers:[{hue:a},{visibility:"on"},{lightness:y},{saturation:r}]},{featureType:"poi.business",elementType:"geometry.fill",stylers:[{hue:a},{visibility:"on"},{lightness:y},{saturation:r}]},{featureType:"transit",elementType:"geometry.fill",stylers:[{hue:a},{visibility:"on"},{lightness:y},{saturation:r}]},{featureType:"transit.station",elementType:"geometry.fill",stylers:[{hue:a},{visibility:"on"},{lightness:y},{saturation:r}]},{featureType:"landscape",stylers:[{hue:a},{visibility:"on"},{lightness:y},{saturation:r}]},{featureType:"road",elementType:"geometry.fill",stylers:[{hue:a},{visibility:"on"},{lightness:y},{saturation:r}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{hue:a},{visibility:"on"},{lightness:y},{saturation:r}]},{featureType:"water",elementType:"geometry",stylers:[{hue:a},{visibility:"on"},{lightness:y},{saturation:r}]}],m={center:new google.maps.LatLng(i,o),zoom:s,panControl:!1,zoomControl:!1,mapTypeControl:!1,streetViewControl:!1,mapTypeId:google.maps.MapTypeId.ROADMAP,scrollwheel:!1,styles:p},g=new google.maps.Map(document.getElementById("google-container"),m),u=(new google.maps.Marker({position:new google.maps.LatLng(i,o),map:g,visible:!0,icon:n}),document.createElement("div"));new t(u,g);g.controls[google.maps.ControlPosition.LEFT_TOP].push(u)});
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
