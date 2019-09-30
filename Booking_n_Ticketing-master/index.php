<!DOCTYPE html>
<html lang="en">
  <head>
 <title>M-ticketlogin</title>
 <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    <style>
    	body{
    		background: #fff;
    		padding: 0px;
    		margin: 0px;
    		font-family: 'Nunito', sans-serif;
    		font-size:16px;
    	}
    	input, button{
    		font-family: 'Nunito', sans-serif;
    		font-weight: 700;
    	}
    	.main-div, .loggedin-div{
    		width:20%;
    		margin:0px auto;
    		margin-top: 150px;
    		padding:20px;
        /*
        display: none;
        */
    	}

    	.main-div input{
    		display:block;
    		border:1px solid #ccc;
    		border-radius: 5px;
    		background: #fff;
    		padding:15px;
    		outline:none;
    		width:100%;
    		margin-bottom: 20px;
    		transition: 0.3s;
    		-webkit-transition: 0.3s;
    		-moz-transition: 0.3s;
    	}

    	.main-div input:focus {
    		border: 1px solid #777;
    	}

    	.main-div button, .loggedin-div button{
    		background: #5d8ffc;
    		color: #fff;
    		border: 1px solid #5d8ffc;
    		border-radius: 5px;
    		padding: 15px;
    		display: block;
    		width:100%;
    		transition: 0.3s;
    		-webkit-transition: 0.3s;
    		-moz-transition: 0.3s;
    	}

    	.main-div button:hover, .loggedin-div button:hover{
    		background: #fff;
    		color: #5d8ffc;
    		border: 1px solid #5d8ffc;
    		cursor: pointer;

    	}
      </style>
  </head>
  <body>
  		<div id="login_div" class="main-div">
  			<h3>M-ticket</h3>
  			<input type="email" placeholder="Email..." id="email_field"/>
  			<input type="password" placeholder="Password..." id="password_field"/>

  			<button onclick="login()">Login to account</button>
  		</div>

  		<div id="user_div" class="loggedin-div">
  			<h3>Welcome User</h3>
  			<p id="user_para">Welcome to M-ticket.</p>
  			<button onclick="logout()">Logout</button>
  		</div>


	
 
    <!-- Insert this script at the bottom of the HTML, but before you use any Firebase services -->

    <!-- Add the entire Firebase JavaScript SDK -->
    <script src="/__/firebase/7.0.0/firebase.js"></script>

  
  <!-- Previously loaded Firebase SDKs -->

  <!-- Initialize Firebase -->
  <script src="/__/firebase/init.js"></script>
  <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyDyp-sVty6snOiH7O8BYCrNFYTRAzOmhQY",
    authDomain: "tickets-42e10.firebaseapp.com",
    databaseURL: "https://tickets-42e10.firebaseio.com",
    projectId: "tickets-42e10",
    storageBucket: "",
    messagingSenderId: "456016658148",
    appId: "1:456016658148:web:f84adc761c5e14148bf6f1",
    measurementId: "G-EK22L20Q9Z"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>
		<script src="index.js"></script>
 </body>
</html>

