<?php
error_reporting(E_ALL); // Enable error reporting for debugging

session_start();
if ($_SESSION['auth'] != 'true') {
    header('location: login.php');
    exit(); // Add an exit statement after the redirect
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>e-TICKET - Train Ticket Booking</title>
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
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            padding: 4px;
            border-radius: 4px;
            cursor: pointer;
            filter: invert(0.1%);
        }

        img {
            display: block;
            margin: 0 auto;
            margin-bottom: 0;
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
	<script>
        function submitForm(action) {
            document.getElementById('myForm').action = action;
            document.getElementById('myForm').submit();
        }
    </script>
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
    <h1>Reserve Your Ticket</h1>
    <form id="myForm" method="post">
        <table>
            <tr>
                <td>
                    <label>From:</label>
                    <select name="source">
                        <option value=""></option>
                        <option value="Panvel">Panvel</option>
                        <option value="Khandeshwar">Khandeshwar</option>
                        <option value="Manasarovar">Manasarovar</option>
                        <option value="Kharghar">Kharghar</option>
                        <option value="Thane">Thane</option>
                    </select>
                </td>

                <td>
                    <label>To:</label>
                    <select name="destination">
                        <option value=""></option>
                        <option value="Khandeshwar">Khandeshwar</option>
                        <option value="Manasarovar">Manasarovar</option>
                        <option value="Kharghar">Kharghar</option>
                        <option value="Belapur CBD">Belapur CBD</option>
                        <option value="Turbhe">Turbhe</option>
                        <option value="Koparkhairne">Koparkhairne</option>
                        <option value="Ghansoli">Ghansoli</option>
                        <option value="Seawood Darave">Seawood Darave</option>
                        <option value="Nerul">Nerul</option>
                        <option value="Juinagar">Juinagar</option>
                    </select>
                </td>

            </tr>
            <tr>
                <td><label>Departure</label></td>
                <td><input type="date" name="departure_date"></td>
            </tr>
            <tr>
                <td><label>Return</label></td>
                <td><input type="date" name="return_date"></td>
            </tr>
            <tr>
                <td><label>Total No. Of Passengers:</label></td>
                <td><input type="number" name="total_passengers" placeholder="Total Passengers" required></td>
            </tr>
            <tr>
                <td>
                    <label>Travel Class:</label>
                </td>
                <td>
                    <select name="travel_class" required>
                        <option value=""></option>
                        <option value="First Class - 1A">First Class - 1A</option>
                        <option value="AC 2 tier - 2A">AC 2 tier - 2A</option>
                        <option value="AC 3 tier - 3A">AC 3 tier - 3A</option>
                        <option value="Sleeper Class">Sleeper Class</option>
                        <option value="General">General</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="button" value="Save Details" onclick="submitForm('save.php')" style="background-color: #222; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; transition: background-color 0.3s;"><br><br>
                    <input type="button" value="Check Availability" onclick="submitForm('train details.php')" style="background-color: #222; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; transition: background-color 0.3s;">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
