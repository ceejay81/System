<?php
include 'db_connect.php';
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);

    $sql = "SELECT * FROM teachers WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (verifyPassword($password, $row['password'])) {
            session_start();
            $_SESSION['teacher_id'] = $row['id'];
            $_SESSION['teacher_name'] = $row['name'];
            $_SESSION['teacher_random_id'] = $row['random_id'];
            header("Location: teacher_dashboard.php");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with this email";
    }
}
?>
