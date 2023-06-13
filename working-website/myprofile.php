<?php
session_start();
if ($_SESSION['auth'] != 'true') {
    header("location: login.php");
}
include 'header.php';
?>

<?php
$servername = "localhost";
$username = "root";
$pwd = "";
$dbname = "login_info";

$con = mysqli_connect($servername, $username, $pwd, $dbname);
?>

<h2><center><img src="mypro.png"/><b>USER PROFILE DETAILS</center></b></h2>

<style>
	img{
		heigh:50px;
		width:50px;
		
	}
    table {
        width: 50%;
        margin: 0 auto;
        border-collapse: collapse;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        border: 1px solid #ccc;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ccc;
        color: black;
        background-color: #f2f2f2;
    }

    th {
        background-color: #454545;
		color: white;
    }

    h2 {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    img {
        margin-right: 10px;
    }
</style>

<table>
    <tr>
        <th>Name</th>
        <td><?php echo $_SESSION['name']; ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $_SESSION['email']; ?></td>
    </tr>
    <tr>
        <th>Gender</th>
        <td><?php echo $_SESSION['gender']; ?></td>
    </tr>
    <tr>
        <th>Date of Birth</th>
        <td><?php echo $_SESSION['dob']; ?></td>
    </tr>
    <tr>
        <th>Contact Number</th>
        <td><?php echo $_SESSION['contact']; ?></td>
    </tr>
</table>
