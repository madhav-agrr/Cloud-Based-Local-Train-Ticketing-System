<?php
session_start();
if($_SESSION['auth']!='true'){
    header('location:login.php');
}
?>
<html>
<head>
    <title>Payment Gateway</title>
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
        input[type="password"],
        input[type="date"] {
            padding: 10px;
            margin: 10px;
            margin-left: 0px;
            width: 100%;
            border: none;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
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

        /* 3D effect for radio buttons */
        .radio-container {
            display: inline-block;
            position: relative;
            padding-left: 30px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 18px;
        }

        .radio-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #ccc;
            border-radius: 50%;
        }

        .radio-container:hover input ~ .checkmark {
            background-color: #aaa;
        }

        .radio-container input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .radio-container input:checked ~ .checkmark:after {
            display: block;
        }

        .radio-container .checkmark:after {
            top: 6px;
            left: 6px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
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
        <h1>Payment Gateway</h1>
        <form action="receipt.php" onsubmit="return validateForm()">
            <h2>Select Payment Method</h2>
            <label class="radio-container">
                UPI
                <input type="radio" name="payment" id="upi" value="upi">
                <span class="checkmark"></span>
            </label>
            <br>
            <label class="radio-container">
                Card
                <input type="radio" name="payment" id="card" value="card">
                <span class="checkmark"></span>
            </label>
            <br>
            <div id="upi-form" style="display: none;">
                <input type="text" placeholder="UPI ID" id="upi-id">
            </div>
            <div id="card-form" style="display: none;">
                <input type="text" placeholder="Card Number" id="card-number">
                <br>
                <input type="text" placeholder="Cardholder Name" id="card-holder">
                <br>
                <input type="date" placeholder="Expiry Date" id="expiry-date">
                <br>
                <input type="password" placeholder="CVV" id="cvv">
            </div>
            <input type="submit" value="Pay">
        </form>
    </div>
    <script>
        const upiForm = document.getElementById('upi-form');
        const cardForm = document.getElementById('card-form');

        const upiRadio = document.getElementById('upi');
        const cardRadio = document.getElementById('card');

        upiRadio.addEventListener('change', () => {
            upiForm.style.display = 'block';
            cardForm.style.display = 'none';
        });

        cardRadio.addEventListener('change', () => {
            upiForm.style.display = 'none';
            cardForm.style.display = 'block';
        });

        function validateForm() {
    const upiId = document.getElementById('upi-id');
    const cardNumber = document.getElementById('card-number');
    const cardHolder = document.getElementById('card-holder');
    const expiryDate = document.getElementById('expiry-date');
    const cvv = document.getElementById('cvv');

    if (!upiRadio.checked && !cardRadio.checked) {
        alert('Please select a payment method');
        return false;
    }

    if (upiRadio.checked) {
        if (upiId.value === '') {
            alert('Please enter UPI ID');
            return false;
        }
    }

    if (cardRadio.checked) {
        if (cardNumber.value === '') {
            alert('Please enter Card Number');
            return false;
        }

        if (cardHolder.value === '') {
            alert('Please enter Cardholder Name');
            return false;
        }

        if (expiryDate.value === '') {
            alert('Please enter Expiry Date');
            return false;
        }

        if (cvv.value === '') {
            alert('Please enter CVV');
            return false;
        }
    }

    return true;
}
    </script>
</body>
</html>