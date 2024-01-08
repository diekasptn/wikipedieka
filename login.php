<?php
include 'api.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM tb_user WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        if (password_verify($password, $hashed_password)) {
            echo "<script>alert('Berhasil masuk'); window.location = 'index.html'</script>";
        } else {
            echo "Login gagal. Password tidak sesuai.";
        }
    } else {
        echo "Login gagal. Pengguna tidak ditemukan.";
    }
}

$conn->close();
?>
