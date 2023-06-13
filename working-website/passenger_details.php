<?php
session_start();
if($_SESSION['auth']!='true'){
    header('location:login.php');
}
?>
<?php
// Retrieve the total passenger value from the booking_info table in the database
$servername = "localhost";
$username = "root";
$pwd = "";
$dbname = "login_info";

$conn = new mysqli($servername, $username, $pwd, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT total_passengers FROM booking_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalPassengers = $row["total_passengers"];
} else {
    $totalPassengers = 0; // Set a default value if the total passenger value is not available
}

$conn->close();
?>



<html>
<head>
    <title>e-TICKET - Passenger Details</title>
    <style>
        .header {
            background-color: #333;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 40px;
            width: 40px;
            margin-right: 20px;
            margin-left: 10px;
        }

        .nav {
            display: flex;
            margin-right: 5px;
            align-items: center;
        }

        .nav a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .nav a:hover {
            background-color: #555;
        }

        .user-profile {
            display: flex;
            align-items: center;
            position: relative;
        }

        .user-profile img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
            right: 0;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #555;
        }
        html {
            margin-top: 0;
            padding: 0;
        }

        body {
            font-family: Helvetica, Times New Roman;
            font-weight: bold;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 45%;
            margin: 0 auto;
            padding: 20px;
        }
		h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            margin-top: 0;
        }
		form {
            background-color: #f4f4f4;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        select,
        input[type="date"] {
            padding: 10px;
            margin: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-left: 20px;
        }

        td,
        tr {
            padding: 8px;
            text-align: center;
            font-family: Helvetica, Times New Roman;
            font-weight: bold;
        }

        input[type="submit"] {
            background-color: #222;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #000;
        }

        .signin-link {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="http://localhost/website/logo.jpg" alt="Train Logo">
        <span><i>e-TICKET</i></span>
    </div>
    <nav class="nav">
        <a href="Contact us.php">Contact Us</a>
        <div class="user-profile dropdown">
            <img src="http://localhost/website/travel.png" alt="Profile Photo">
            <div class="dropdown-content">
			<a href="myprofile.php">My Account</a>
                <a href="logout.php">Sign Out</a>
            </div>
        </div>
    </nav>
</div>
<div class="container">
    <h1>Passenger Details</h1>
    <form action="payment gateway.php" method="post">
        <table>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
            </tr>
            <?php
for ($i = 1; $i <= $totalPassengers; $i++) {
    echo '<tr>';
    echo '<td><input type="text" name="name[]" placeholder="Passenger ' . $i . ' Name"></td>';
    echo '<td><input type="number" name="age[]" placeholder="Passenger ' . $i . ' Age"></td>';
    echo '<td><select name="gender[]">';
    echo '<option></option>';
    echo '<option>Male</option>';
    echo '<option>Female</option>';
    echo '</select></td>';
    echo '</tr>';
}
?>

            <tr>
                <td colspan="3" align="center">
                    <input type="submit" value="Confirm Booking">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
