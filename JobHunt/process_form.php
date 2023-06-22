<?php
// Mengambil nilai dari form
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$role = $_POST['role'];
$message = $_POST['message'];

// Menghubungkan ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jobportal';

$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi database
if ($conn->connect_error) {
    die('Koneksi database gagal: ' . $conn->connect_error);
}

// Menyimpan data ke database
$sql = "INSERT INTO contacts (name, email, number, role, message) VALUES ('$name', '$email', '$number', '$role', '$message')";

if ($conn->query($sql) === TRUE) {
    // Menutup koneksi database
    $conn->close();

    // Mengarahkan kembali ke halaman contact.html
    header("Location: contact.html");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi database
$conn->close();
?>
