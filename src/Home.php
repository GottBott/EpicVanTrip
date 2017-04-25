<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Epic Van Trip!</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/Home_Style.css">
    <link href="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body id="home" data-spy="scroll" data-target=".navbar" data-offset="60">
    <!-- Add Google Maps production <script  type="text/javascript" language="JavaScript" src="../js/map.js"></script>-->
    <script src="http://maps.googleapis.com/maps/api/js?key=myKEY"></script>
    <script type="text/javascript" language="JavaScript" src="../js/fb.js"></script>
    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 30) {
                $('subTitle').addClass('shrinkSubTitle');
                if ($(document).scrollTop() > 50) {
                    $('mainTitle').addClass('shrinkMainTitle');

                }
            } else {
                $('mainTitle').removeClass('shrinkMainTitle');
                $('subTitle').removeClass('shrinkSubTitle');
                $('mainTitle').removeClass('vcenter');
            }
        });
    </script>
    <!-- Navbar at top of page which includes title/menu and current location -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="col-xs-3 col-md-2">
            <div class="navbar-loc">
                <span class="glyphicon glyphicon-screenshot location-icon"></span>
                <a class="location-text" id="currentLocation" href="#map"></a>
            </div>
        </div>
        <div class="col-xs-5 col-md-4">
            <mainTitle class="myTitle" href="#home">
                <p class="text-center">*EPIC VAN TRIP*</p>
            </mainTitle>
        </div>
        <div class="col-xs-4 col-md-2">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="col-xs-12 col-md-4">
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <h4>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#home">HOME</a></li>
						<li><a href="#photos">PHOTOS</a></li>
						<li><a href="#map">MAP</a></li>
						<li><a href="#climb">CLIMB</a></li>
						<li><a href="#blog">BLOG</a></li>
					</ul>
				</h4>
        </div>
        <div class="col-xs-3 col-md-1"></div>
        <div class="col-xs-5 col-md-6">
            <subTitle class="mySubtitle">
                <p class="text-center">Following The Weather</p>
            </subTitle>
        </div>
    </nav>
	
<!-- about us section -->	
    <div id="home" class="container-fluid">
        <div class="row">
            <br>
            <br>
            <br>
            <div class="col-xs-12 ">
                <br>
                <br>
                <br>
                <h2>About Us</h2>
                <h3>
					We have a love for the outdoors. So much so that we left our jobs in search of epic adventures and long days in the mountains. This year you will find us on the classics, the best rock climbs and bike trails this continent has to offer. Starting in the east, we will wander our way around, living simply and looking forward to the next amazing experience.    </h4>
					<h3>
					We are Ben Gotthold and Dan Murphy. We live in a van, follow the weather, and are always in search of the next great rock or trail. Find our stories and adventures <a href="#blog">HERE</a> or send us a mail at epicvantrip@gmail.com </h4>
					<br>
				</div>
			</div>
		</div>
		<!-- photo carousel which populates with photos from a facebook album -->
		<div  class="container-fluid" id="photos">
			<div class="row">
				<div class="col-xs-12">
					<h2>Recent Adventures</h2>
					<div id="myCarousel" class="carousel CarouselImg slide text-center" data-ride="carousel">
						<!-- Indicators -->
						<ol id="carousel-ind" class="carousel-indicators">
						</ol>
						<!-- Wrapper for slides -->
						<div id="myDiv" class="carousel-inner" role="listbox">
						</div>
						<!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
						</a>
					</div>

				</div>
			</div>
		</div>
		<br>
		<!-- MAP which shows pins from locations we visisted -->
		<div id="map" class="container-fluid bg-grey">
			<h2>Where We've Been</h2>
			<div id="googleMap" class="col-xs-12" style="height:600px;width:100%;"></div>
		</div>
		<script>
			$(document).ready(function(){
			  // Add smooth scrolling to all links in navbar + footer link
			  $(".navbar a, footer a[href='#home']").on('click', function(event) {

			    // Prevent default anchor click behavior
			    event.preventDefault();

			    // Store hash
			    var hash = this.hash;

			    // Using jQuery's animate() method to add smooth page scroll
			    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
			    $('html, body').animate({
			      scrollTop: $(hash).offset().top
			    }, 900, function(){

			      // Add hash (#) to URL when done scrolling (default click behavior)
			      window.location.hash = hash;
			    });
			  });

			  $(window).scroll(function() {
			    $(".slideanim").each(function(){
			      var pos = $(this).offset().top;

			      var winTop = $(window).scrollTop();
			        if (pos < winTop + 600) {
			          $(this).addClass("slide");
			        }
			    });
			  });
			$('#myClimbs').dataTable({
			     "order": [[ 1, "desc" ]]
			 });
			})

			$(window).on('activate.bs.scrollspy', function (e) {
			    history.replaceState({}, "", $("a[href^='#']", e.target).attr("href"));
			});
		</script>
		<?php
			// fetch the user
			$json = file_get_contents("https://www.mountainproject.com/data?action=getUser&email=bengotthold@gmail.com&key=112138806-92c2229f1e14a46293b61172fda280b2");
			$user = json_decode($json, true); // create as associative array

			// fetch the user's ticks
			$json = file_get_contents("https://www.mountainproject.com/data?action=getTicks&userId={$user['id']}&key=112138806-92c2229f1e14a46293b61172fda280b2");
			$ticks = json_decode($json, true);

			$ids = array();
			for ($i=0; $i<min(199, count($ticks['ticks'])); $i++){ // show up to the last three
			    array_push($ids, $ticks['ticks'][$i]['routeId']);
			    }

			// fetch route data 
			$routeIds = implode(',',$ids);
			$json = file_get_contents("https://www.mountainproject.com/data?action=getRoutes&routeIds=$routeIds&key=112138806-92c2229f1e14a46293b61172fda280b2");
			$tickRoutes = json_decode($json, true);
			//print_r($tickRoutes);

			?>
		<br>
		<div id="climb" class="container-fluid col-xs-12">
			<div>
				<h2>On The Wall</h2>
				<table id="myClimbs" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Route</th>
							<th>Date</th>
							<th>Type</th>
							<th>Grade</th>
							<th>Wall</th>
							<th>State</th>
						</tr>
					</thead>
					<tbody>
						<?php $types = array();
							$grades = array();
							for ($i=0; $i<min(199, count($ticks['ticks'])); $i++){
							$types[] = $tickRoutes['routes'][$i]['type']; 
							$grades[] = substr($tickRoutes['routes'][$i]['rating'],0,4);
							 ?>
						<tr> 
							<td> 
							<a href= <?php echo $tickRoutes['routes'][$i]['url'] ?> ><?php  echo $tickRoutes['routes'][$i]['name'] ?> </a>
							</td>
							<td> <?php  echo $ticks['ticks'][$i]['date'] ?> </td>
							<td> <?php  echo $tickRoutes['routes'][$i]['type'] ?> </td>
							<td> <?php  echo $tickRoutes['routes'][$i]['rating'] ?> </td>
							<td> <?php  echo end($tickRoutes['routes'][$i]['location']) ?> </td>
							<td> <?php  echo $tickRoutes['routes'][$i]['location'][0] ?> </td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<script type="text/javascript">
			var typeArray= <?php echo json_encode($types); ?>;
			var gradeArray= <?php echo json_encode($grades); ?>;

			// clean up the type array to get rid of slash values
			var typeArrayClean=[]
			for (var i = 0; i < typeArray.length; i++) {
				typeArrayClean.push(typeArray[i].split(",")[0]);
			}
			var typeArray = typeArrayClean;

			// clean up the grade array to get rid of slash values and split into rope and boldering
			var gradeArrayBoldering = []
			var gradeArrayRope = []
			var temp = null; 
			for (var i = 0; i < gradeArray.length; i++) {
				temp = gradeArray[i].split(/\+|\-/)[0];
				if(temp.includes("V")){
					gradeArrayBoldering.push(temp);
				} else if(! temp.includes("rd")){
					gradeArrayRope.push(temp);
				}
			}

			typeArray.sort();
			gradeArrayBoldering.sort();
			gradeArrayRope.sort();

			var types = [];
			types.push(["type","Number"])
			var current = null;
			var cnt = 0;
			for (var i = 0; i < typeArray.length; i++) {
			 if (typeArray[i] != current) {
			     if (cnt > 0) {
			         var temp = [current,cnt];
			         types.push(temp);

			     }
			     current = typeArray[i];
			     cnt = 1;
			 } else {
			     cnt++;
			 }
			}
			if (cnt > 0) {
			 var temp = [current,cnt];
			 types.push(temp);
			}

			var gradesBoldering = [];
			gradesBoldering.push(["Grade","Number"])
			var current = null;
			var cnt = 0;
			for (var i = 0; i < gradeArrayBoldering.length; i++) {
			 if (gradeArrayBoldering[i] != current) {
			     if (cnt > 0) {
			         var temp = [current,cnt];
			         gradesBoldering.push(temp);
			     }
			     current = gradeArrayBoldering[i];
			     cnt = 1;
			 } else {
			     cnt++;
			 }
			}
			if (cnt > 0) {
			 var temp = [current,cnt];
			 gradesBoldering.push(temp);
			}

			var gradesRope = [];
			gradesRope.push(["Grade","Number"])
			var current = null;
			var cnt = 0;
			for (var i = 0; i < gradeArrayRope.length; i++) {
			 if (gradeArrayRope[i] != current) {
			     if (cnt > 0) {
			         var temp = [current,cnt];
			         gradesRope.push(temp);
			     }
			     current = gradeArrayRope[i];
			     cnt = 1;
			 } else {
			     cnt++;
			 }
			}
			if (cnt > 0) {
			 var temp = [current,cnt];
			 gradesRope.push(temp);
			}

			   google.charts.load("current", {packages:["corechart"]});
			   google.charts.setOnLoadCallback(drawChart);
			   function drawChart() {
			     var dataTypes = google.visualization.arrayToDataTable(types);
			     var dataGradesBoldering = google.visualization.arrayToDataTable(gradesBoldering);
			     var dataGradesRope = google.visualization.arrayToDataTable(gradesRope);

			     var colOptions = {
			       title: 'Climbing by Type',
			       is3D: true,
			       legend: {position: 'none'},
			     };
			      var pieOptionsBoldering = {
			       title: 'Bolders by Grade',
			       is3D: true,
			     };
			      var pieOptionsRope = {
			       title: 'Pitches by Grade',
			       is3D: true,
			     };

			     var typeChart = new google.visualization.ColumnChart(document.getElementById('columnChart'));
			     typeChart.draw(dataTypes, colOptions);

			     var gradeChartBoldering = new google.visualization.PieChart(document.getElementById('piechartBoldering'));
			     gradeChartBoldering.draw(dataGradesBoldering, pieOptionsBoldering);

			     var gradeChartRope = new google.visualization.PieChart(document.getElementById('piechartRope'));
			     gradeChartRope.draw(dataGradesRope, pieOptionsRope);
			   }

		</script>
		<div class="row">

			  <div class="clearfix"></div>
			  <div class="col-md-4">
			    <div id="columnChart" style="width: 100%; min-height: 400px;"></div>
			  </div>
			  <div class="col-md-4">
			    <div id="piechartBoldering" style="width: 100%; min-height: 400px;"></div>
			  </div>
			  <div class="col-md-4">
			    <div id="piechartRope" style="width: 100%; min-height: 400px;"></div>
			  </div>

			</div>

			<div id="blog" class="container-fluid">
			<div class="col-xs-12">
				<h2>Stories From the Road<span class="badge">0</span></h2>
			</div>
		</div>
		<footer class="container-fluid text-center">
			<div class="wrapper col1"></div>
			<div class="wrapper col5">
				<div id="footer">
					<p class="fl_left">Ben Gotthold : &copy; 2017 - All Rights Reserved - <a href="#">www.epicvantrip.com</a> </p>
					<br class="clear" />
				</div>
			</div>
		</footer>
		<?php
			error_reporting(0);
			$app_id = 'myID';
			$app_sec = 'mySec';
			$album_id = 'myAlbum';

			$url = "https://graph.facebook.com/oauth/access_token?client_id={$app_id}&client_secret={$app_sec}&grant_type=client_credentials";
			$access_token = file_get_contents($url);
			echo "<div  id=\"myKey\">{$access_token}</div>"

			?>
	</body>
</html>
