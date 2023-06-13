<?php
	
	$servername = "localhost";
	$username = "root";
	$pwd = "";
	$dbname = "login_info";
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$con = mysqli_connect($servername,$username,$pwd,$dbname);
	
	if($con){
	//echo "Connection successfull";
	$sql = " SELECT * from signup_data where email='$email' and password='$password' ";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)==1){
		session_start();
		$_SESSION['auth']='true';
		header("location:ticket reserve.php");
		$row_signupdata = mysqli_fetch_array($result);
	session_start();
	$_SESSION['email']=$email;
	$_SESSION['name']=$row_signupdata['name'];
	$_SESSION['gender']=$row_signupdata['gender'];
	$_SESSION['dob']=$row_signupdata['dob'];
    $_SESSION['contact']=$row_signupdata['contact'];
	}else{
		echo "<center><h1><b>Invalid Credentials.Try Again!<b></h1></center><br><br>";
echo '<center><table><tr><td><A href="login.php"><button value="Sign In!!" style="background-color: #222;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        text-transform: uppercase;
        font-weight: bold;">Sign In</button></a></td></tr></table></center>';
	}
}else{
	//die(mysqli_error($con));	
	echo "Connection failed".mysqli_connect_error();
}
	}
?>