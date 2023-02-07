<?php
session_start();
 
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Siyapatha</title>
		<link href="css/login-styles.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="container">
			<div class="left">
				<aside>
					<p id="top" class="blocktext">Welcome! to CMS</p>
					<p id="meddle" class="blocktext">Class Management System</p>
					<p id="low" class="blocktext" >Siyapatha Institute of Education Gampaha</p>
					<center><img src="images/system_images/login.png" width="173" height="166"  alt=""/></center> 
				</aside>
			</div>
			<div class="right">
				<aside>
					<center>
						<form >
							<p id="login">Login</p>
							<div class="alert"><p style="color:red;" id="msg"></p></div>
							<input type="text" class="tbox" placeholder="User Name" id="username">
							<input type="password" class="tbox" placeholder="Password" id="password">
							<!-- <input type="reset" class="right button-reset"> -->
							<input type="button" class="button-purple" value="Login" onclick="login()">
						</form>
					</center>
				</aside>
			</div>
		</div>
	</body>
</html>




<script>
	
	function login(){
		var login=true;
		
		var username=document.getElementById("username").value;
		var password=document.getElementById("password").value;
		
		$.ajax({
            url: "model/login2.php",
            data: {
                login: login,
				username: username,
				password: password
                
            },
            //dataType:"JSON",
            success:function(data){
                
					$('#msg').html(data);
				


				
            }
        })
        return false;
	}




</script>