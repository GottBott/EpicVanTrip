var myCenter = new google.maps.LatLng(38.0000, -94.7497);
var newark = new google.maps.LatLng(39.6837, -75.7497);
var map = "";

function initialize() {
	var mapProp = {
		center: myCenter,
		zoom: 5,
		scrollwheel: false,
		draggable: true,
		mapTypeId: 'terrain'
	};

	map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

	var newarkMarker = new google.maps.Marker({
		position: newark,
	});
	newarkMarker.setMap(map);

	var infowindow = new google.maps.InfoWindow({
		content: "We started our trip in Newark, DE"
	});

	google.maps.event.addListener(newarkMarker, 'click', function() {
		infowindow.open(map, newarkMarker);
	});



}

google.maps.event.addDomListener(window, 'load', initialize);



window.fbAsyncInit = function() {
	FB.init({
		appId: '965078140201758',
		xfbml: true,
		version: 'v2.8'
	});


	var access_code = document.getElementById("myKey").innerText;
	var json_token = JSON.parse(access_code);
	access_code = "access_token=" + json_token["access_token"]
	document.getElementById("myKey").style.visibility = "hidden";

	FB.api(
		"/1721671818103030/photos?" + access_code + "&fields=images,name" + "&offset=20",
		function(response) {
			if (response && !response.error) {
				//console.log(response);
				response.data.reverse();
				for (var i = 0; i < response.data.length && i <=10; i++) {
					var album = response.data[i];
					//console.log(album["images"]);
					mypic = album["images"][0];
					//console.log(album["name"])




					var img = document.createElement("img");
					img.src = mypic["source"];
					img.width = mypic["width"];
					img.height = mypic["height"];
					img.className = "img-responsive center-block";


					var capt = document.createElement("div");
					capt.innerHTML = album["name"]

					var ind = document.createElement("li");
					ind.setAttribute("data-target", "#myCarousel");
					ind.setAttribute("data-slide-to", i);
					ind.className = "";


					var container = document.createElement("div");
					if (i == 0) {
						container.className = "item active";
						ind.className = "active";
					} else {
						container.className = "item";
					}

					container.appendChild(img);
					container.appendChild(capt);

					document.getElementById("carousel-ind").appendChild(ind);
					document.getElementById("myDiv").appendChild(container);

				}
			} else {
				console.log(response);
			}


		}
	);



	
	FB.api(
		"/epicvantrip/posts?with=location&" + access_code + "&fields=place,created_time"+ "&limit=100",
		function(response) {
			if (response && !response.error) {
				var place_date;
				var first = 0;
				for (var i = 0; i < response.data.length; i++) {
					//console.log(response.data[i]);
					var checkin = response.data[i];
					var place_id = checkin["place"]["id"];
					//place_date = checkin["created_time"];
					//console.log(place_date);
					//console.log(checkin["place"]["name"]);
										
					if (first == 0){
						document.getElementById("currentLocation").innerHTML = checkin["place"]["name"];
					first =1;
					}
					FB.api(
						"/" + place_id + "?" + access_code + "&fields=location,name"+ "&limit=100",
						function(response1) {
							if (response1 && !response1.error) {
								 //console.log(response1);
								var location = response1["location"];
								var place_name = response1["name"];
								var lat = location["latitude"];
								var lon = location["longitude"];
								//console.log(lat);
								//console.log(lon);
								var pin = new google.maps.LatLng(lat, lon);

								var pinMarker = new google.maps.Marker({
									position: pin,
								});
								pinMarker.setMap(map);
                                
								var infowindow = new google.maps.InfoWindow({
									content: place_name
								});

								google.maps.event.addListener(pinMarker, 'click', function() {
									infowindow.open(map, pinMarker);
								});


							} else {
								console.log(response1);
							}
						}
					);

				}

			} else {
				console.log(response);
			}
		}
	);

};

(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {
		return; }
	js = d.createElement(s);
	js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));