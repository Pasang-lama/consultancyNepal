<?php
session_start();
require_once "../../database.php";
require_once "../../tables.php";

// Function to sanitize and validate input data
function sanitizeInput($input)
{
    // Trim spaces, remove HTML tags, and prevent SQL injection
    return htmlspecialchars(trim($input));
}

$db = Database::Instance();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clear previous error messages
    unset($_SESSION['nameError']);
    unset($_SESSION['emailError']);
    unset($_SESSION['numberError']);

    // Retrieve and sanitize form inputs
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $number = sanitizeInput($_POST['number']);

    // Validate required fields
    if (empty($name)) {
        $_SESSION['nameError'] = 'Name is required';
    }

    if (empty($email)) {
        $_SESSION['emailError'] = 'Email is required';
    }

    if (empty($number)) {
        $_SESSION['numberError'] = 'Number is required';
    }

    // Validate name (no special characters)
    if (!empty($name) && !preg_match("/^[a-zA-Z ]*$/", $name)) {
        $_SESSION['nameError'] = 'Invalid name';
    }

    // Validate email
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailError'] = 'Invalid email';
    }

    // Validate number (numeric, optional additional validation)
    if (!empty($number) && (!is_numeric($number))) {
        $_SESSION['numberError'] = 'Invalid number';
    }

    // Insert data into the database if all validations pass
    if (empty($_SESSION['nameError']) && empty($_SESSION['emailError']) && empty($_SESSION['numberError'])) {
        $params = ['name' => $name, 'email' => $email, 'number' => $number];
        $result = $db->Insert('class_registration', $params);

        if ($result) {
            $_SESSION['message'] = 'Registered Successfully';
            $_SESSION['messageType'] = 'success';
        } else {
            $_SESSION['message'] = 'Registration failed';
            $_SESSION['messageType'] = 'error';
        }
    }

    header("Location: http://localhost/Consultancy-Nepal");
    exit();
}
?>
