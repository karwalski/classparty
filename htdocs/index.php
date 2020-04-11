<?PHP

// Placeholder for classparty main page


?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Classparty</title>
  <meta name="description" content="ClassParty">
  <meta name="author" content="karwalski">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="favicon.png">
		
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="/js/face-api/face-api.js"></script>
  <script src="/js/face-api/faceDetectionControls.js"></script>
  <script src="/js/face-api/commons.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-orange fixed-top">
      <a class="navbar-brand" href="/">ClassParty</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="ar.php?location=chichen-itza.jpg">Excursions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Brain Break</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Classes</a>
              <a class="dropdown-item" href="#">Class work</a>
              <a class="dropdown-item" href="#">Classmates</a>
              <a class="dropdown-item" href="https://classroom.google.com/">Clasic Google Classrooms</a>
            </div>
          </li>
        </ul>
          <button class="btn btn-outline-success my-2 my-sm-0" onclick="oauthSignIn()" id="signin">SignIn</button>
      </div>
    </nav>
	
	

    <main role="main" class="container main-container">
	   <div class="container">
  <div class="row">
    <div class="col">
<div class="container">
  <div class="row">
    <div class="col"  id="sidebar">
	    <div id="user">
		    <div id="userPic"></div>
		    <div id="userName"></div>
	    </div>
	    <div class="arrow-yellow">
		    </div><span class="arrow-text">Classes:</span><BR />
	    <div id="sidebar-classes">
		    </div>
	    
	    <div class="arrow-yellow">
		    </div><span class="arrow-text">Brain Break:</span><BR />
	    <button type="button" class="btn btn-cp-primary btn-lg" onclick='window.location.href ="ar.php?location=chichen-itza.jpg";'>Brain Break</button>
	    
	    <div class="arrow-yellow">
		    </div><span class="arrow-text">Games:</span><BR />
	    <button type="button" class="btn btn-cp-primary btn-lg">Game 1</button>
	    <button type="button" class="btn btn-cp-primary btn-lg">Game 2</button>
	    <button type="button" class="btn btn-cp-primary btn-lg">Game 3</button>
	    
    </div>
    <div class=".col-" id="threeDots" onclick="document.getElementById('sidebar').style.display = document.getElementById('sidebar').style.display == 'none' ? 'inline-block' : 'none';">
      	.<BR />
	.<BR />
	.<BR />
	    
    </div>
  </div>
</div>
    </div>
    <div class="col-6">

	    
<div class="starter-template">
		<video onloadedmetadata="onPlay(this)" id="inputVideo" autoplay muted playsinline class="webcam"></video>
	<canvas id="overlay" class="faceoverlay"></canvas>
	</div>
	<div id="feed">
		<div class="post pinned">
			<p><strong>Welcome!</strong></p><br>
			<p>We have designed a virtual classroom linked to ‘Google Classroom’.  This is a more interactive and beneficial version.  It includes features that help children feel as if they were at school. The website is linked in to ‘Google Classroom’ so other children or teachers in the class can still use the old version.</p>
<p>Augmented Reality - Using the students webcam to generate an bitmoji style character and shares with the class, so no student video is transferred to the server. (Teachers can use augmented bitmojis, or real video feed). Classmates can see other students bitmojis talking in the classroom and walk around playground and have breakout conversations (like a game).</p>
<p>Virtual Reality - Students can wear google cardboard to see their teacher in their living room, and go on excursions with live presenters, where they can see classmates bitmojis walking along side them and ask questions to the facilitator of the excursion location (farms, museums etc)</p>

		</div>
				<div class="post">
			<p><strong>Safe WebCam use with school children</strong></p><br>
			<p>This website asks you to enable your webcam, however unlikely other video conference software the webcam is processed on the students computer and only sends the facial landmarks to the ClassParty server. These facial landmarks can be used with third party emoji/bitmoji characters to communicate with their teacher and classmates during virtual classrooms and in the AR and VR experiences.</p>
			<p>Child safety and security issues associated with mainstream video conference software has been in the news alot in the last few weeks, and our solution offers an alternate to transmitting videos of childrens faces.</p>
			<p>If you enabled your webcam, you can preview this functionality at the top of this feed. In production, you would be able to see your teacher and classmates 'faces'.</p>
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
    <div class="col" id="assignments">
    </div>
  </div>
</div> 
    </main>
	


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
                'scope': 'https://www.googleapis.com/auth/classroom.rosters.readonly https://www.googleapis.com/auth/classroom.announcements.readonly https://www.googleapis.com/auth/classroom.courses.readonly https://www.googleapis.com/auth/classroom.coursework.me.readonly',
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
			    
			    document.getElementById("sidebar-classes").innerHTML = "";
			    	// '<div class="sidebar-lessons">History</div>'
			    for (var i = 0; i < response.courses.length; i++)
			    {
				    //<button type="button" class="btn btn-primary btn-lg"
				document.getElementById("sidebar-classes").innerHTML += '<button type="button" class="btn btn-cp-primary btn-lg" onClick="goToCourse(' + response.courses[i].id + ')">' + response.courses[i].name + '</button>';        
 			    }
	  		    // document.getElementById("sidebar-classes").innerHTML += '<button type="button" class="btn btn-cp-primary btn-lg" onclick="window.location.href =\'ar.php?location=chichen-itza.jpg\';">Brain Break</button>';        


				
		    }
		  }
		  xhttp.open("GET", server + request + params, true);
		
			xhttp.setRequestHeader("Authorization", getCookie('token_type') + " " + getCookie('access_token'));
			xhttp.setRequestHeader("Content-Type", "application/json");
		  xhttp.send();
	
	
		// Get Student
	// Limiting API scope to only pull fullname, not email or dispaly picture etc.
	// Potentially give them a random psuedonym instead of their real name that is linked to their userId

	
			// Get my name
		  var xhttp = new XMLHttpRequest();
			var server = "https://classroom.googleapis.com/v1/";
			var request = "userProfiles/me";
			var params = "";
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
			var response = JSON.parse(this.responseText);


			document.getElementById("userName").innerHTML += response.name.fullName;      

	
	
			    }
		  }
		  xhttp.open("GET", server + request + params, true);
		
			xhttp.setRequestHeader("Authorization", getCookie('token_type') + " " + getCookie('access_token'));
			xhttp.setRequestHeader("Content-Type", "application/json");
		  xhttp.send();
					
}
	
	
	// Course control
	
function goToCourse(courseId) {

	
	// Get coursework
		  var xhttp = new XMLHttpRequest();
			var server = "https://classroom.googleapis.com/v1/";
			var request = "courses/" + courseId + "/courseWork";
			var params = "?courseWorkStates=PUBLISHED";
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
			var response = JSON.parse(this.responseText);
			    document.getElementById("assignments").innerHTML = "";
			    	// </div>
			    for (var i = 0; i < response.courseWork.length; i++)
			    {
				    //<button type="button" class="btn btn-primary btn-lg">Large button</button>
				document.getElementById("assignments").innerHTML += '<button type="button" class="btn btn-cp-primary btn-lg" onClick="goToCourseWork(' + response.courseWork[i].id + ')">' + response.courseWork[i].title + '</button>';      
			    }	
	
	
			    }
		  }
		  xhttp.open("GET", server + request + params, true);
		
			xhttp.setRequestHeader("Authorization", getCookie('token_type') + " " + getCookie('access_token'));
			xhttp.setRequestHeader("Content-Type", "application/json");
		  xhttp.send();
	
	
		// Get announcements
		  var xhttp = new XMLHttpRequest();
			var server = "https://classroom.googleapis.com/v1/";
			var request = "courses/" + courseId + "/announcements";
			var params = "?announcementStates=PUBLISHED";
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
			var response = JSON.parse(this.responseText);
			    document.getElementById("feed").innerHTML = "";
			    	// </div>
			    for (var i = 0; i < response.announcements.length; i++)
			    {
				    //<button type="button" class="btn btn-primary btn-lg">Large button</button>
				document.getElementById("feed").innerHTML += '<div class="post">' + response.announcements[i].text + '</div>';      
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
