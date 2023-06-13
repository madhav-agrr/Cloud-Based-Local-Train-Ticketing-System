<html>
<head>
    <title>e-TICKET - Train Ticket Booking</title>
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
            background: url('train.gif') center center fixed;
            background-size: cover;
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

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            perspective: 1000px;
            transform-style: preserve-3d;
            transform: rotateY(30deg);
        }

        h1 {
            margin-bottom: 20px;
            transform: translateZ(50px);
        }

        p {
            margin-bottom: 20px;
            transform: translateZ(50px);
        }

        .cta-button {
            display: inline-block;
            background-color: #222;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
            transform: translateZ(50px);
        }

        .cta-button:hover {
            background-color: #000;
        }

        .register-button {
            display: inline-block;
            background-color: white;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 10px;
            border: 2px solid #000;
            transform: translateZ(50px);
        }

        .register-button:hover {
            background-color: #f2f2f2;
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
        </nav>
    </div>
    <div class="container">
        <h1>Welcome to <i>e-TICKET</i></h1>
        <p>Book your local train tickets online hassle-free!</p>
        <a href="login.php" class="cta-button">Sign In</a>
        <a href="signup.php" class="register-button">Register</a>
    </div>
</body>
</html>
