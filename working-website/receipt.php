<?php
session_start();
if ($_SESSION['auth'] != 'true') {
    header('location:login.php');
}

$servername = "localhost";
$username = "root";
$pwd = "";
$dbname = "login_info";
$name = $_SESSION['name'];
$bookingID = "";

    $con = mysqli_connect($servername, $username, $pwd, $dbname);

    if ($con) {
        // Fetching source, destination, and price from the database
        $sql = "SELECT source, destination, price FROM booking_info WHERE name='$name' ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $bookingInfo = mysqli_fetch_assoc($result);

            // Generating a random booking ID
            $bookingID = md5(uniqid());
			
			 $updateSql = "UPDATE booking_info SET booking_id='$bookingID' WHERE name='$name' ORDER BY id DESC LIMIT 1";
			 $updateResult = mysqli_query($con, $updateSql);
        }
    }
?>
<html>
<head>
    <title>Booking Summary - e-TICKET</title>
    <style>
        html {
            margin: 0;
            padding: 0;
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
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        .booking-details {
            margin-bottom: 20px;
        }

        .booking-details label {
            display: block;
            margin-bottom: 5px;
        }

        .booking-details span {
            font-weight: normal;
        }

        .print-receipt {
            text-align: center;
            margin-top: 20px;
        }

        .print-receipt button {
            background-color: #222;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .print-receipt button:hover {
            background-color: #000;
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
        <h1>Booking Summary</h1>
        <div class="booking-details">
            <label>Booking ID:</label>
            <span><?php echo $bookingID; ?></span>
        </div>
        <div class="booking-details">
            <label>Name:</label>
            <span><?php echo $_SESSION['name']; ?></span>
        </div>
        <div class="booking-details">
            <label>Email:</label>
            <span><?php echo $_SESSION['email']; ?></span>
        </div>
        <?php if (!empty($bookingInfo)) : ?>
            <div class="booking-details">
                <label>Source Station:</label>
                <span><?php echo $bookingInfo['source']; ?></span>
            </div>
            <div class="booking-details">
                <label>Destination:</label>
                <span><?php echo $bookingInfo['destination']; ?></span>
            </div>
            <div class="booking-details">
                <label>Amount:</label>
                <span><?php echo $bookingInfo['price']; ?></span>
            </div>
        <?php else : ?>
            <div class="booking-details">
                <span>No booking information available</span>
            </div>
        <?php endif; ?>
        <div class="print-receipt">
            <button onclick="window.print()">Print Receipt</button>
        </div>
    </div>
</body>
</html>
