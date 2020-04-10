  
<?PHP

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

</head>

<body>
	
<?PHP readfile('top-menu.html'); ?>
	
<p>
	<br>
</p>

<div id="content">

<div class="joinmeet">Join Brain Break</div>

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


</body>
</html>
