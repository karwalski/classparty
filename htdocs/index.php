<?PHP

// Placeholder for classparty main page


?>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Classparty</title>
  <meta name="description" content="Classparty">
  <meta name="author" content="karwalski">

</head>

<body>
	Welcome!<BR />
	<BR />
	<BR />
	This is a placeholder page for the ACS #flattenthecurvehack challenge<BR />
	<BR />
	<button onClick="oauthSignIn()">Test Google Auth</button><BR />
	<DIV id="raw"></DIV>
	
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
