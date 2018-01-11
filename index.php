<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Login Form</h2></center>
			
		<form action="index.php" method="post">
		<div class="imgcontainer">
				 
				 <img src="imgs/avatar.png" alt="Avatar" class="avatar">
		
		</div>
			<div class="inner_container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="login_button" name="login" type="submit">Login</button>
				
				<a href="register.php"><button type="button" class="register_btn">Register</button></a>
		
       		</div>
		</form>
		
		<?php
		
		//$target_dir = "imgs/";
       // $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
		   
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				
				$query = "select * from this where username='$username' and password='$password' ";
				
				$query_run = mysqli_query($con,$query);
		
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] =$row['username'];
					$_SESSION['password'] = $row['password'];
					$_SESSION['avatar']= $row['avatar'];

					header( "Location: homepage.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>