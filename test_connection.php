<?php
// Informasi koneksi database
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "sera"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);
    $album = $conn->real_escape_string($_POST["album"]);

    $sql = "INSERT INTO spotify_data (username, album) VALUES ('$username', '$album')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('your recommendation is saved in the database! thank you!♡.'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'index.html';</script>";
    }
}

$conn->close();
