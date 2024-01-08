<?php
include 'api.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $email = $_POST["email"];

    if ($password != $confirm_password) {
        echo "Konfirmasi password tidak sesuai.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO tb_user VALUES ('','$username', '$hashed_password','$email')";
        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Berhasil mendaftar'); window.location = 'index.html'</script>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}
?>