<html>
<head>
    <title>User Registration</title>
    <style> 
        .header {
		    font-family: Helvetica;
            margin: 0;
            padding: 0;
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
			margin-left:10px;
        }

        .nav {
            display: flex;
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
		
        html {
            margin-top: 0;
        }

        body {
            font-family: Helvetica, Times New Roman;
            font-weight:bold;
			margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin-left: 480px;
            margin-top: 0px;
            padding: 20px;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            padding: 4px;
            border-radius: 4px;
            cursor: pointer;
            opacity: 0.7;
        }

        [name="img"] {
            display: block;
            margin-left: 600px;
            margin-bottom: 0px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            margin-top: 0px;
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
        input[type="email"],
        input[type="password"],
        select,
        input[type="date"] {
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        td,
        tr {
            padding: 8px;
            align: center;
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
                <a href="Contact us.php">Contact Us</a>
        </nav>
    </div>
    <img src="http://localhost/website/aa.png" alt="user profile" height="200px" name="img">
    <div class="container">
        <h1>User Sign In</h1>
        <form action="authenticate.php" method="POST">
            <table>
                <div class="form-group">
                    <tr>
                        <td><label for="email">Email ID:</label></td>
                        <td><input type="email" id="email" name="email" placeholder="Enter your email ID"></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label for="pwd">Password:</label></td>
                        <td><input type="password" id="pwd" name="password" placeholder="Enter your password"></td>
                    </tr>
                </div>
                <div class="form-group">
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Sign in"></td>
                </tr>
				<tr><td colspan="2" align="center"><a href="signup.php">Not a User? Register Here!!</a></td></tr>
            </table>
        </form>
    </div>
</body>
</html>
