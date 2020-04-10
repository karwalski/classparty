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
	<video onloadedmetadata="onPlay(this)" id="inputVideo" autoplay muted playsinline class="webcam"></video>
	<canvas id="overlay" class="faceoverlay"></canvas>
	<h1>
		ClassParty
	</h1>
</div>
<div id="sidebar">

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
			Teacher stream<BR />
			<canvas id="teacher" width="640" height="480"></canvas>
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
	

var fps = 60;
function streamAjax() {
	
        var image =     document.getElementById("overlay").toDataURL("image/png");
        image = image.replace('data:image/png;base64,', '');
    $.ajax({
            type: 'POST',
            url: '/stream.php',
            data: '{ "imageData" : "' + image + '" }',
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function (data) {
		    var canvas = document.getElementById("teacher");
			var ctx = canvas.getContext("2d");
			var image = new Image();
		    image.src = "data:image/png;base64," + data;
		    ctx.drawImage(image, 0, 0);
            },
            complete: function (data) {
                    // Schedule the next
                    setTimeout(streamAjax, 1000 / fps);
            }
    });
}
setTimeout(streamAjax, 1000 / fps);
	
	

var canvas = document.getElementById("teacher");
var ctx = canvas.getContext("2d");

var image = new Image();
image.onload = function() {
  ctx.drawImage(image, 0, 0);
};
image.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAoAAAAHgCAYAAAA10dzkAAAgAElEQVR4Xu3dCXhU5dn/8d9zEgLIkkzYZMlCEkEUK6LUve6t1qq1lRbmTBRt69L11bZ2saV2s2/7VttqN+nikjmDSrW22tatYt03FEURJAkkICpIJhHZsszzXieQiFZkgCQzc853rsurQJ45z31/7ud6/7//ZOaMEQ8EEEAAAQQQQACBUAmYUHVLswgggAACCCCAAAIiAHIIEEAAAQQQQACBkAkQAEM2cNpFAAEEEEAAAQQIgJwBBBBAAAEEEEAgZAIEwJANnHYRQAABBBBAAAECIGcAAQQQQAABBBAImQABMGQDp10EEEAAAQQQQIAAyBlAAAEEEEAAAQRCJkAADNnAaRcBBBBAAAEEECAAcgYQQAABBBBAAIGQCRAAQzZw2kUAAQQQQAABBAiAnAEEEEAAAQQQQCBkAgTAkA2cdhFAAAEEEEAAAQIgZwABBBBAAAEEEAiZAAEwZAOnXQQQQAABBBBAgADIGUAAAQQQQAABBEImQAAM2cBpFwEEEEAAAQQQIAByBhBAAAEEEEAAgZAJEABDNnDaRQABBBBAAAEECICcAQQQQAABBBBAIGQCBMCQDZx2EUAAAQQQQAABAiBnAAEEEEAAAQQQCJkAATBkA6ddBBBAAAEEEECAAMgZQAABBBBAAAEEQiZAAAzZwGkXAQQQQAABBBAgAHIGEEAAAQQQQACBkAkQAEM2cNpFAAEEEEAAAQQIgJwBBBBAAAEEEEAgZAIEwJANnHYRQAABBBBAAAECIGcAAQQQQAABBBAImQABMGQDp10EEEAAAQQQQIAAyBlAAAEEEEAAAQRCJkAADNnAaRcBBBBAAAEEECAAcgYQQAABBBBAAIGQCRAAQzZw2kUAAQQQQAABBAiAnAEEEEAAAQQQQCBkAgTAkA2cdhFAAAEEEEAAAQIgZwABBBBAAAEEEAiZAAEwZAOnXQQQQAABBBBAgADIGUAAAQQQQAABBEImQAAM2cBpFwEEEEAAAQQQIAByBhBAAAEEEEAAgZAJEABDNnDaRQABBBBAAAEECICcAQQQQAABBBBAIGQCBMCQDZx2EUAAAQQQQAABAiBnAAEEEEAAAQQQCJkAATBkA6ddBBBAAAEEEECAAMgZQAABBBBAAAEEQiZAAAzZwGkXAQQQQAABBBAgAHIGEEAAAQQQQACBkAkQAEM2cNpFAAEEEEAAAQQIgJwBBBBAAAEEEEAgZAIEwJANnHYRQAABBBBAAAECIGcAAQQQQAABBBAImQABMGQDp10EEEAAAQQQQIAAyBlAAAEEEEAAAQRCJkAADNnAaRcBBBBAAAEEECAAcgYQQAABBBBAAIGQCRAAQzZw2kUAAQQQQAABBAiAnAEEEEAAAQQQQCBkAgTAkA2cdhFAAAEEEEAAAQIgZwABBBBAAAEEEAiZAAEwZAOnXQQQQAABBBBAgADIGUAAAQQQQAABBEImQAAM2cBpFwEEEEAAAQQQIAByBhBAAAEEEEAAgZAJEABDNnDaRQABBBBAAAEECICcAQQQQAABBBBAIGQCBMCQDZx2EUAAAQQQQAABAiBnAAEEEEAAAQQQCJkAATBkA6ddBBBAAAEEEECAAMgZQAABBBBAAAEEQiZAAAzZwGkXAQQQQAABBBAgAHIGEEAAAQQQQACBkAkQAEM2cNpFAAEEEEAAAQQIgJwBBBBAAAEEEEAgZAIEwJANnHYRQAABBBBAAAECIGcAAQQQQAABBBAImQABMGQDp10EEEAAAQQQQIAAyBlAAAEEEEAAAQRCJkAADNnAaRcBBBBAAAEEECAAcgYQQAABBBBAAIGQCRAAQzZw2kUAAQQQQAABBAiAnAEEEEAAAQQQQCBkAgTAkA2cdhFAAAEEEEAAAQIgZwABBBBAAAEEEAiZAAEwZAOnXQQQQAABBBBAgADIGUAAAQQQQAABBEImQAAM2cBpFwEEEEAAAQQQIAByBhBAAAEEEEAAgZAJEABDNnDaRQABBBBAAAEECICcAQQQQAABBBBAIGQCBMCQDZx2EUAAAQQQQAABAiBnAAEEEEAAAQQQCJkAATBkA6ddBBBAAAEEEECAAMgZQAABBBBAAAEEQiZAAAzZwGkXAQQQQAABBBAgAHIGEEAAAQQQQACBkAkQAEM2cNpFAAEEEEAAAQQIgJwBBBBAAAEEEEAgZAIEwJANnHYRQAABBBBAAAECIGcAAQQQQAABBBAImQABMGQDp10EEEAAAQQQQIAAyBlAAAEEEEAAAQRCJkAADNnAaRcBBBBAAAEEECAAcgYQQAABBBBAAIGQCRAAQzZw2kUAAQQQQAABBAiAnAEEEEAAAQQQQCBkAgTAkA2cdhFAAAEEEEAAAQIgZwABBBBAAAEEEAiZAAEwZAOnXQQQQAABBBBAgADIGUAAAQQQQAABBEImQAAM2cBpFwEEEEAAAQQQIAByBhBAAAEEEEAAgZAJEABDNnDaRQABBBBAAAEECICcAQQQQAABBBBAIGQCBMCQDZx2EUAAAQQQQAABAiBnAAEEEEAAAQQQCJkAATBkA6ddBBBAAAEEEECAAMgZQAABBBBAAAEEQiZAAAzZwGkXAQQQQAABBBAgAHIGEEAAAQQQQACBkAkQAEM2cNpFAAEEEEAAAQQIgJwBBBBAAAEEEEAgZAIEwJANnHYRQAABBBBAAAECIGcAAQQQQAABBBAImQABMGQDp10EEEAAAQQQQIAAyBlAAAEEEEAAAQRCJkAADNnAaRcBBBBAAAEEECAAcgYQQAABBBBAAIGQCRAAQzZw2kUAAQQQQAABBAiAnAEEEEAAAQQQQCBkAgTAkA2cdhFAAAEEEEAAAQIgZwABBBBAAAEEEAiZAAEwZAOnXQQQQAABBBBAgADIGUAAAQQQQAABBEImQAAM2cBpFwEEEEAAAQQQIAByBhBAAAEEEEAAgZAJEABDNnDaRQABBBBAAAEECICcAQQQQAABBBBAIGQCBMCQDZx2EUAAAQQQQAABAiBnAAEEEEAAAQQQCJkAATBkA6ddBBBAAAEEEECAAMgZQAABBBBAAAEEQiZAAAzZwGkXAQQQQAABBBAgAHIGEEAAAQQQQACBkAkQAEM2cNpFAAEEEEAAAQQIgJwBBBBAAAEEEEAgZAIEwJANnHYRQAABBBBAAAECIGcAAQQQQAABBBAImQABMGQDp10EEEAAAQQQQIAAyBlAAAEEEEAAAQRCJkAADNnAaRcBBBBAAAEEECAAcgYQQAABBBBAAIGQCRAAQzZw2kUAAQQQQAABBAiAnAEEEEAAAQQQQCBkAgTAkA2cdhFAAAEEEEAAAQIgZwABBBBAAAEEEAiZAAEwZAOnXQQQQAABBBBAgADIGUAAAQQQQAABBEImQAAM2cBpFwEEEEAAAQQQIAByBhBAAAEEEEAAgZAJEABDNnDaRQABBBBAAAEECICcAQQQQAABBBBAIGQCBMCQDZx2EUAAAQQQQAABAiBnAAEEEEAAAQQQCJkAATBkA6ddBBBAAAEEEECAAMgZQAABBBBAAAEEQiZAAAzZwGkXAQQQQAABBBAgAHIGEEAAAQQQQACBkAkQAEM2cNpFAAEEEEAAAQQIgJwBBBBAAAEEEEAgZAIEwJANnHYRQAABBBBAAAECIGcAAQQQQAABBBAImQABMGQDp10EEEAAAQQQQIAAyBlAAAEEEEAAAQRCJkAADNnAaRcBBBBAAAEEECAAcgYQQAABBBBAAIGQCRAAQzZw2kUAAQQQQAABBAiAnAEEEEAAAQQQQCBkAgTAkA2cdhFAAAEEEEAAAQIgZwABBBBAAAEEEAiZAAEwZAOnXQQQQAABBBBAgADIGUAAAQQQQAABBEImQAAM2cBpFwEEEEAAAQQQIAByBhBAAAEEEEAAgZAJEABDNnDaRQABBBBAAAEECICcAQQQQAABBBBAIGQCBMCQDZx2EUAAAQQQQAABAiBnAAEEEEAAAQQQCJkAATBkA6ddBBBAAAEEEECAAMgZQAABBBBAAAEEQiZAAAzZwGkXAQQQQAABBBAgAHIGEEAAAQQQQACBkAkQAEM2cNpFAAEEEEAAAQQIgJwBBBBAAAEEEEAgZAIEwJANnHYRQAABBBBAAAECIGcAAQQQQAABBBAImQABMGQDp10EEEAAAQQQQIAAyBlAAAEEEEAAAQRCJkAADNnAaRcBBBBAAAEEECAAcgYQQAABBBBAAIGQCRAAQzZw2kUAAQQQQAABBAiAnAEEEEAAAQQQQCBkAgTAkA2cdhFAAAEEEEAAAQIgZwABBBBAAAEEEAiZAAEwZAOnXQQQQAABBBBAgADIGUAAAQQQQAABBEImQAAM2cBpFwEEEEAAAQQQIAByBhBAAAEEEEAAgZAJEABDNnDaRQABBBBAAAEECICcAQQQQAABBBBAIGQCBMCQDZx2EUAAAQQQQAABAiBnAAEEEEAAAQQQCJkAATBkA6ddBBBAAAEEEECAAMgZQAABBBBAAAEEQiZAAAzZwGkXAQQQQAABBBAgAHIGEEAAAQQQQACBkAkQAEM2cNpFAAEEEEAAAQQIgJwBBBBAAAEEEEAgZAIEwJANnHYRQAABBBBAAAECIGcAAQQQQAABBBAImQABMGQDp10EEEAAAQQQQIAAyBlAAAEEEEAAAQRCJkAADNnAaRcBBBBAAAEEECAAcgYQQAABBBBAAIGQCRAAQzZw2kUAAQQQQAABBAiAnAEEEEAAAQQQQCBkAgTAkA2cdhFAAAEEEEAAAQIgZwABBBBAAAEEEAiZAAEwZAOnXQQQ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";
	
	</script>
</body>
</html>
