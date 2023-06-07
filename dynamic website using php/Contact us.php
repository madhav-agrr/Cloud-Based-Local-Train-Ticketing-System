<html>
<head>
    <title>Contact Us - e-TICKET</title>
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

        input[type="text"],
        textarea {
            padding: 10px;
            margin: 10px;
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
			margin: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
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
            <a href="sitehome.php">Home</a>
        </nav>
    </div>
    <div class="container">
        <h1>Contact Us</h1>
        <form action="mailto:madhavagrr@gmail.com" method="post" enctype="text/plain">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="text" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <input type="submit" value="Send Message">
        </form>
    </div>
</body>
</html>
