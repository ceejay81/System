<?php
include 'db_connect.php';
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $password = hashPassword($_POST['password']);
    $random_id = generateRandomID();

    $sql = "INSERT INTO teachers (name, email, password, random_id) VALUES ('$name', '$email', '$password', '$random_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Teacher registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
