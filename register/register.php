<?php

// Database connection details
$servername = "localhost";
$username = "root";  // Default XAMPP username
$password = "";  // Default XAMPP password is empty
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $district = $_POST['district'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO registrations (name, email, phone, city, district) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $city, $district);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!');</script>";

        // Send email
        // $to = $email;
        // $subject = "Registration Confirmation";
        // $message = "Hello $name,\n\nThank you for registering with us.\n\nDetails:\nPhone: $phone\nCity: $city\nDistrict: $district\n\nWe look forward to connecting with you!";
        // $headers = "From: vbest.velur@gmail.com";

        // if (mail($to, $subject, $message, $headers)) {
        //     echo "<script> alert('A confirmation email has been sent to $email.'); </script>";
        // } else {
        //     echo "<script>alert('There was an error sending the email.');</script> ";
        // }

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
