<?PHP

// Placeholder for classparty main page


?>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Classparty</title>
  <meta name="description" content="Classparty">
  <meta name="author" content="karwalski">
	<link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
	<link rel="icon" type="image/png" href="favicon.png">

</head>

<body>
	
	<div id="top-menu">
	<div class="top-menu-links">
		AR Meeting
	</div>
	<div class="top-menu-links">
		Brain Break
	</div>
	<div class="top-menu-links">
		Google Classrom
	</div>
	<div class="top-menu-links" onclick="oauthSignIn()">
		Sign In
	</div>
</div>
<p>
	<br>
</p>
<div id="banner">
	<h1>
		ClassParty
	</h1>
</div>
<div id="sidebar">
	<h2>
		Today
	</h2>
	<div class="sidebar-lessons">
		History
	</div>
	<div class="sidebar-lessons">
		Math
	</div>
	<div class="sidebar-lessons">
		Brain Break
	</div>
	<div class="sidebar-lessons">
		Science
	</div>
	<div class="sidebar-lessons">
		Science
	</div>
	<div class="sidebar-lessons">
		Brain Break
	</div>
	<div class="sidebar-lessons">
		Physical Education
	</div>
	<div class="sidebar-lessons">
		Art
	</div>
</div>
<div id="content">
	<div id="feed">
		<div class="post pinned">
			Welcome!<br>
			<br>
			<br>
			This is a placeholder page for the ACS #flattenthecurvehack challenge
		</div>
		<div class="post">
			<strong>My classes</strong><br>
			<div id="raw"></div>
		</div>
		<div class="post">
			<strong>My webcam</strong><br>
			<div id="container">
				<video autoplay="true" id="videoElement"></video> <button id="start">Start Video</button><button id="stop">Stop Video</button>
			</div>
		</div>
		<div class="post">
			<strong>VR Example</strong><br>
			<div id="vrview"></div>
		</div>
	</div>
</div>
	

<script>
	// example from https://www.kirupa.com/html5/accessing_your_webcam_in_html5.htm

	var video = document.querySelector("#videoElement");
	
	var startVideo = document.querySelector("#start");
    startVideo.addEventListener("click", start, false);
	function start(e) {

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
    })
    .catch(function (err0r) {
      console.log("Something went wrong!");
    });
}}

	var stopVideo = document.querySelector("#stop");
    stopVideo.addEventListener("click", stop, false);

    function stop(e) {
      var stream = video.srcObject;
      var tracks = stream.getTracks();

      for (var i = 0; i < tracks.length; i++) {
        var track = tracks[i];
        track.stop();
      }

      video.srcObject = null;
    }
</script>


	

    <script src="vrview.min.js"></script>
	
	<script>
		
	window.addEventListener('load', onVrViewLoad);

function onVrViewLoad() {
  // Selector '#vrview' finds element with id 'vrview'.
  var vrView = new VRView.Player('#vrview', {
    image: 'chichen-itza.jpg'
  });
}	
		
		
		
// Google OAuth2.0
function oauthSignIn() {
  var oauth2Endpoint = 'https://accounts.google.com/o/oauth2/v2/auth';

  // Create <form> element to submit parameters to OAuth 2.0 endpoint.
  var form = document.createElement('form');
  form.setAttribute('method', 'GET'); // Send as a GET request.
  form.setAttribute('action', oauth2Endpoint);

  // Parameters to pass to OAuth 2.0 endpoint.
  var params = {'client_id': '522572922800-m16cu28278v69hud1po3v8kt3f7atfeo.apps.googleusercontent.com',
                'redirect_uri': 'https://classparty.net/',
                'response_type': 'token',
                'scope': 'https://www.googleapis.com/auth/classroom.courses.readonly',
                'include_granted_scopes': 'true',
                'state': 'pass-through value'};

  // Add form parameters as hidden input values.
  for (var p in params) {
    var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', p);
    input.setAttribute('value', params[p]);
    form.appendChild(input);
  }

  // Add form to page and submit it to open the OAuth 2.0 endpoint.
  document.body.appendChild(form);
  form.submit();
}
		
		  var xhttp = new XMLHttpRequest();
			var server = "https://classroom.googleapis.com/v1/";
			var request = "courses";
			var params = "?studentId=me&courseStates=ACTIVE";
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
			// Raw output
			document.getElementById("raw").innerHTML = this.responseText;
			var response = JSON.parse(this.responseText);
				
		    }
		  }
		  xhttp.open("GET", server + request + params, true);
		const urlParams = new URLSearchParams(window.location.hash);
			xhttp.setRequestHeader("Authorization", urlParams.get('token_type') + " " + urlParams.get('access_token'));
			xhttp.setRequestHeader("Content-Type", "application/json");
		  xhttp.send();
					
		
	</script>
</body>
</html>
