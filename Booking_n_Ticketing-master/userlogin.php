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
    		width:112%;
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
  			<center><h3>M-ticket</h3></center>
            <form action="userlogin2.php" method="POST" enctype="multipart/form-data">
  			<input type="text" placeholder="Username..." name="username"/>
  			<input type="password" placeholder="Password..." name="password"/>
  			<button type="submit" name="login">Login to account</button>
        </form>
  		</div>

</body>
</html>


    