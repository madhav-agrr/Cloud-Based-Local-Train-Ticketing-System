<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_info";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $contact = $_POST['contact'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format. Please enter a valid email address.');</script>";
    } else {
        // Validate password complexity
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            echo "<script>alert('Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number. Please try again.');</script>";
        } else {
            // Validate contact number length and format
            $contact = preg_replace('/[^0-9+]/', '', $contact); // Remove all non-numeric and non-plus characters
            if (strlen($contact) !== 10 && !preg_match('/^\+91[0-9]{10}$/', $contact)) {
                echo "<script>alert('Contact number should be 10 digits long and can include \'+91\' as the country code. Please try again.');</script>";
            } else {
                if ($password === $cpassword) {
                    $con = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM signup_data WHERE email='$email'";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        $num = mysqli_num_rows($result);
                        if ($num > 0) {
                            echo "<center><h1><b>Already Registered Credentials.. Try Again with Different User Credentials..<b></h1></center><br><br>";
                            echo '<center><table><tr><td><a href="signup.php"><button value="register" style="background-color: #222; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; transition: background-color 0.3s; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); text-transform: uppercase; font-weight: bold;">Sign In</button></a></td></tr></table></center>';
                        } else {
                            $sql = "INSERT INTO signup_data VALUES('$name','$email','$gender','$dob','$password','$cpassword','$contact')";
                            $result1 = mysqli_query($con, $sql);

                            if ($result1) {
                                echo "<center><h1><b>Registered Successfully!!<b></h1></center><br><br>";
                                echo '<center><table><tr><td><a href="login.php"><button value="Sign In!!" style="background-color: #222; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; transition: background-color 0.3s; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); text-transform: uppercase; font-weight: bold;">Sign In!!</button></a></td></tr></table></center>';
                            } else {
                                echo "<center><h1><b>Registered Unsuccessfully?! Try Again..<b></h1></center><br><br>";
                                echo '<center><table><tr><td><a href="signup.php"><button value="register" style="background-color: #222; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; transition: background-color 0.3s; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); text-transform: uppercase; font-weight: bold;">Register Here!!</button></a></td></tr></table></center>';
                            }
                        }
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }

                    mysqli_close($con);
                } else {
                    echo "<script>alert('Password and Confirm Password do not match. Please try again.');</script>";
                }
            }
        }
    }
}
?>
