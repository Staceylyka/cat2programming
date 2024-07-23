<?php
// submit_obituary.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $dod = $_POST['dod'];
    $context = $_POST['context'];
    $author = $_POST['author'];

    // Database connection details
    $hostname= "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "obituary_platform";

    // Create connection
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO obituaries (NAME, DATE_OF_BIRTH, DATE_OF_DEATH, CONTEXT, AUTHOR, SUBMISSION_DATE) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
    $stmt->bind_param("sssi", $name,$dob, $dod , $context, $author,);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>