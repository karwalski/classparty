<?PHP

// Placeholder for classparty main page


?>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Classparty</title>
  <meta name="description" content="ClassParty">
  <meta name="author" content="karwalski">
	<link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="icon" type="image/png" href="favicon.png">
	
<script src="/js/face-api/face-api.js"></script>
  <script src="/js/face-api/faceDetectionControls.js"></script>
  <script src="/js/face-api/commons.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

</head>

<body>
	<?PHP readfile('top-menu.html'); ?>

<p>
	<br>
</p>
<div id="banner">
	<h1>
		ClassParty
	</h1>
</div>
<div id="sidebar">

</div>
<div id="content">
		<video onloadedmetadata="onPlay(this)" id="inputVideo" autoplay muted playsinline class="webcam"></video>
	<canvas id="overlay" class="faceoverlay"></canvas>
	<div id="feed">
		<div class="post pinned">
			Welcome!<br>
			<br>
			<br>
			This is a placeholder page for the ACS #flattenthecurvehack challenge
		</div>
		<div class="post">
			Test post
			
		</div>

		<div class="post">
			<strong>VR Excursion examples</strong><br>
Chichen Itza<a href="vr.php?location=chichen-itza.jpg">VR</a> <a href="ar.php?location=chichen-itza.jpg">AR</a><br />
Christ Redeemer<a href="vr.php?location=christ-redeemer.jpg">VR</a> <a href="ar.php?location=christ-redeemer.jpg">AR</a><br />
Machu Picchu<a href="vr.php?location=machu-picchu.jpgg">VR</a> <a href="ar.php?location=machu-picchu.jpg">AR</a><br />
Petra<a href="vr.php?location=petra.jpg">VR</a> <a href="ar.php?location=petra.jpg">AR</a><br />
Taj Mahal<a href="vr.php?location=taj-mahal.jpg">VR</a> <a href="ar.php?location=taj-mahal.jpg">AR</a><br />
		</div>
	</div>
</div>
	


<script>
	
		
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
                'scope': 'https://www.googleapis.com/auth/classroom.courses.readonly https://www.googleapis.com/auth/classroom.coursework.me.readonly',
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
	
const urlParams = new URLSearchParams(window.location.hash);
	
if (urlParams.get('token_type') != null) {
	
	  var d = new Date();
  d.setTime(d.getTime() + ( urlParams.get('expires_in')*1000));
  var expires = "expires="+ d.toUTCString();
	
	document.cookie = "token_type=" + urlParams.get('token_type') + ";" + expires + ";path=/";
	document.cookie = "access_token=" + urlParams.get('access_token') + ";" + expires + ";path=/";
	
}
	
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return false;
}

	
if (getCookie("access_token")) {	
	
	document.getElementById('signin').style.display = 'none';
	
		  var xhttp = new XMLHttpRequest();
			var server = "https://classroom.googleapis.com/v1/";
			var request = "courses";
			var params = "?studentId=me&courseStates=ACTIVE";
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {

			var response = JSON.parse(this.responseText);
			    
			    	// '<div class="sidebar-lessons">History</div>'
			    for (var i = 0; i < response.courses.length; i++)
			    {
				document.getElementById("sidebar").innerHTML += '<div class="sidebar-lessons" onClick="goToCourse(' + response.courses[i].id + ')">' + response.courses[i].name + '</div>'; 
			    }
			    

				
		    }
		  }
		  xhttp.open("GET", server + request + params, true);
		
			xhttp.setRequestHeader("Authorization", getCookie('token_type') + " " + getCookie('access_token'));
			xhttp.setRequestHeader("Content-Type", "application/json");
		  xhttp.send();
					
}
	
	
	// Course control
	
function goToCourse(courseId) {

	
		  var xhttp = new XMLHttpRequest();
			var server = "https://classroom.googleapis.com/v1/";
			var request = "courses/" + courseId + "/courseWork";
			var params = "?courseWorkStates=PUBLISHED";
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
			// Raw output
			document.getElementById("raw").innerHTML = this.responseText;
			var response = JSON.parse(this.responseText);
			    document.getElementById("feed").innerHTML = "";
			    	// </div>
			    for (var i = 0; i < response.courseWork.length; i++)
			    {
				document.getElementById("feed").innerHTML += '<div class="post" onClick="goToCourseWork(' + response.courseWork[i].id + ')">' + response.courseWork[i].title + '</div>'; 
			    }	
	
	
			    }
		  }
		  xhttp.open("GET", server + request + params, true);
		
			xhttp.setRequestHeader("Authorization", getCookie('token_type') + " " + getCookie('access_token'));
			xhttp.setRequestHeader("Content-Type", "application/json");
		  xhttp.send();
}
	
	
	
	// Face landmark webcam script
	
	    let forwardTimes = []
    let withBoxes = false

    function onChangeHideBoundingBoxes(e) {
      withBoxes = !$(e.target).prop('checked')
    }

    function updateTimeStats(timeInMs) {
      forwardTimes = [timeInMs].concat(forwardTimes).slice(0, 30)
      const avgTimeInMs = forwardTimes.reduce((total, t) => total + t) / forwardTimes.length
      $('#time').val(`${Math.round(avgTimeInMs)} ms`)
      $('#fps').val(`${faceapi.utils.round(1000 / avgTimeInMs)}`)
    }

    async function onPlay() {
      const videoEl = $('#inputVideo').get(0)

      if(videoEl.paused || videoEl.ended || !isFaceDetectionModelLoaded())
        return setTimeout(() => onPlay())


      const options = getFaceDetectorOptions()
      

      const ts = Date.now()

      const result = await faceapi.detectSingleFace(videoEl, options).withFaceLandmarks()

      updateTimeStats(Date.now() - ts)

      if (result) {
        const canvas = $('#overlay').get(0)
        const dims = faceapi.matchDimensions(canvas, videoEl, true)
        const resizedResult = faceapi.resizeResults(result, dims)

        if (withBoxes) {
          faceapi.draw.drawDetections(canvas, resizedResult)
        }
        faceapi.draw.drawFaceLandmarks(canvas, resizedResult)
      }

      setTimeout(() => onPlay())
    }

    async function run() {
      // load face detection and face landmark models
      await changeFaceDetector(TINY_FACE_DETECTOR)
      await faceapi.loadFaceLandmarkModel('/')
      changeInputSize(224)

      // try to access users webcam and stream the images
      // to the video element
      const stream = await navigator.mediaDevices.getUserMedia({ video: {} })
      const videoEl = $('#inputVideo').get(0)
      videoEl.srcObject = stream
    }

    function updateResults() {}

        $(document).ready(function() {
      initFaceDetectionControls()
      run()
		

	});
	

var fps = 1;
function streamAjax() {
	
        var image =     document.getElementById("overlay").toDataURL("image/png");
        image = image.replace('data:image/png;base64,', '');
    $.ajax({
            type: 'POST',
            url: '/stream.php',
            data: '{ "imageData" : "' + image + '" }',
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            complete: function (response) {
		   
		    drawTeacher(response.responseText);
                    setTimeout(streamAjax, 1000 / fps);
            }
    });
}
	
// Disable ajax sending to server for now
// setTimeout(streamAjax, 1000 / fps);
	
	
	function drawTeacher(response) {
		// Add frame back into html for echo
		// <canvas id="teacher" width="640" height="480"></canvas>
			   // console.log("data:image/png;base64," + response);
		    	var canvas = document.getElementById("teacher");
			var ctx = canvas.getContext("2d");
			var image = new Image();
		    image.src = "data:image/png;base64," + response;
		    ctx.clearRect(0,0,640,480);
		    ctx.drawImage(image, 0, 0);
	}
	
	</script>
</body>
</html>
