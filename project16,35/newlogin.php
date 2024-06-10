<html>
<head>
	<title>LOGIN FORM</title>
	<body>
    <link rel="stylesheet" href="loginsss.css">
	<div class="wrapper">
		<form action="" method="POST">
			<h1>LOGIN FORM</h1>
    <div class="input-box">
		<input type="email" name="Email" class="input-box" placeholder="@gmail.com">
</div>
<div class="input-box">
	<input type="password" name="Password" class="input-box" placeholder="password">
</div>
<button type="submit" name="signin" style="margin-top:20px">Login</button>
</form>
</div>
</body>
</head>
</html>
<?php
if($_POST)
{
	$Email=$_POST['Email'];
	$Password=$_POST['Password'];
	if(isset($_POST['signin']))
	{
      $conn=mysqli_connect("localhost","root","","grocery");
	  $query="SELECT * from login";
	  $query1=mysqli_query($conn,$query);
	  while($rows=mysqli_fetch_array($query1))
	  {
		if($rows['password'] == $Password && $rows['email'] == $Email)
		{
		  header("Location:newdashboard.php");
		}
		else{
			echo "<script>alert('login failed')</script>";
		}
	  }
	}
}
?>