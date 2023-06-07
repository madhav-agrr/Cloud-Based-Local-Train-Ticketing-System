<?php
session_start();
if($_SESSION['auth']!='true'){
	header('location:login.php');
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
                    <a href="logout.php">Sign Out</a>
                    <a href="myprofile.php">My Account</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <h1>Booking Summary</h1>
        <div class="booking-details">
            <label>Booking ID:</label>
            <span>123456</span>
        </div>
        <div class="booking-details">
            <label>Name:</label>
            <span>John Doe</span>
        </div>
        <div class="booking-details">
            <label>Email:</label>
            <span>johndoe@example.com</span>
        </div>
        <div class="booking-details">
            <label>Source Station:</label>
            <span>Station A</span>
        </div>
        <div class="booking-details">
            <label>Destination:</label>
            <span>Station B</span>
        </div>
        <div class="booking-details">
            <label>Amount:</label>
            <span>$50.00</span>
        </div>
        <div class="print-receipt">
            <button onclick="window.print()">Print Receipt</button>
        </div>
    </div>
</body>
</html>
