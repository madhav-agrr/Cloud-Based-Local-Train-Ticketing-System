<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $source = $_POST['source'];
    $departure_date = $_POST['departure_date'];
    $destination = $_POST['destination'];
    $travel_class = $_POST['travel_class'];
}

if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 'true') {
    header('location: login.php');
    exit();
}
?>

<html>
<head>
	<title>e-TICKET - Train Ticket Booking</title>
	<style>
		html {
			margin: 0;
			padding: 0;
		}

		p {
			text-align: center;
		}

		body {
			font-family: Helvetica;
			font-weight: bold;
			margin: 0;
			padding: 0;
		}

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

		* {
			margin: 0;
			padding: 0;
		}

		h1 {
			text-align: center;
			color: #333;
			margin-bottom: 20px;
			margin-top: 0;
			font-family: Times New Roman;
		}

		.table-box {
			margin: 50px auto;
		}

		.table-row {
			display: table;
			width: 80%;
			margin: 10px auto;
			font-family: sans-serif;
			background: transparent;
			padding: 12px 0;
			color: #555;
			font-size: 13px;
			box-shadow: 0 1px 4px 0px rgba(0, 0, 50, 0.3);
		}

		.table-head {
			background: #8665f7;
			box-shadow: none;
			color: #fff;
			font-weight: 600;
		}

		.table-head .table-cell {
			border-right: none;
		}

		.table-cell {
			display: table-cell;
			width: 20%;
			text-align: center;
			padding: 4px 0;
			border-right: 1px solid #d6d4d4;
			vertical-align: middle;
		}

		.first-cell {
			text-align: left;
			padding-left: 10px;
		}

		.last-cell {
			border-right: none;
		}

		a {
			text-decoration: none;
			color: #FFFFFF;
		}

		.book-button {
			display: inline-block;
			padding: 10px 20px;
			background-color: #f44336;
			color: white;
			border-radius: 5px;
			border: none;
			cursor: pointer;
			transition: transform 0.3s, box-shadow 0.3s;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
		}

		.book-button:hover {
			transform: scale(1.05);
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
		}

		@media only screen and (max-width: 600px) {
			.table-row {
				font-size: 11px;
			}
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
	<div class="table-box">
        <h1>Trains from <?php echo $source; ?> to <?php echo $destination; ?></h1>
        <div class="table-row table-head">
            <div class="table-cell first-cell">
                <p>Station</p>
            </div>
            <div class="table-cell first-cell">
                <p>Date</p>
            </div>
            <div class="table-cell">
                <p>Class</p>
            </div>
            <div class="table-cell last-cell">
                <p>Price</p>
            </div>
            <div class="table-cell last-cell">
                <p></p>
            </div>
        </div>

        <?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_info";
$name = $_SESSION['name'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch train details
$sql = "SELECT * FROM train_price WHERE source='$source' AND destination='$destination'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display train details in table rows
    while ($row = $result->fetch_assoc()) {
        echo '<div class="table-row">';
        echo '<div class="table-cell first-cell">';
        echo '<p>' . $row['source'] . '</p>';
        echo '</div>';
        echo '<div class="table-cell first-cell">';
        echo '<p>' . $departure_date . '</p>';
        echo '</div>';
        echo '<div class="table-cell">';
        echo '<p>' . $row['travel_class'] . '</p>';
        echo '</div>';
        echo '<div class="table-cell last-cell">';
        echo '<p>' . $row['price'] . '</p>';
        echo '</div>';
        echo '<div class="table-cell">';
        echo '<form method="POST" action="passenger_details.php">';
        echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
        echo '<input type="hidden" name="name" value="' . $name . '">';
        echo '<input type="hidden" name="source" value="' . $row['source'] . '">';
        echo '<input type="hidden" name="destination" value="' . $row['destination'] . '">';
        echo '<input type="hidden" name="departure_date" value="' . $departure_date . '">';
        echo '<button class="book-button" type="submit">Book Now</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';

        // Update booking_info table with the retrieved price
        $price = $row['price'];
        $source = $row['source'];
        $destination = $row['destination'];
        $departure_date = $departure_date;

        $updateSql = "UPDATE booking_info SET price='$price' WHERE name='$name' AND source='$source' AND destination='$destination' AND departure_date='$departure_date'";
        $updateResult = $conn->query($updateSql);
        if (!$updateResult) {
            echo "Error updating booking_info table: " . $conn->error;
        }
    }
} else {
    echo "No trains available for the selected route.";
}

$conn->close();
?>

    </div>
</body>
</html>