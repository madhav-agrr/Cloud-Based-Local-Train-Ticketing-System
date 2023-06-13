<?php
error_reporting(E_ALL); // Enable error reporting for debugging

session_start();
if ($_SESSION['auth'] != 'true') {
    header('location:login.php');
    exit(); // Add an exit statement after the redirect
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $totalPassengers = $_POST['total_passengers'];
    $departure_date = $_POST['departure_date'];
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $travel_class = $_POST['travel_class'];
    $name = $_SESSION['name'];

    // Validate departure date
    if (empty($departure_date)) {
        echo "Incorrect departure Date!!";
        exit();
    }

    // Validate if departure date is in the past
    $currentDate = date("Y-m-d");
    if (strtotime($departure_date) < strtotime($currentDate)) {
        echo "Incorrect departure Date!!";
        exit();
    }

    $servername = "localhost";
    $username = "root";
    $pwd = "";
    $dbname = "login_info";
    $conn = new mysqli($servername, $username, $pwd, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO booking_info (name, total_passengers, departure_date, price, source, destination,travel_class)
                            VALUES (?, ?, ?, 0, ?, ?, ?)");
    $stmt->bind_param("sissss", $name, $totalPassengers, $departure_date, $source, $destination, $travel_class);

    if ($stmt->execute()) {
          echo "<script>alert('Saved!!'); window.location.href='ticket reserve.php'; event.preventDefault();</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>
