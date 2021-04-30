<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = $pdo->prepare("SELECT * FROM prak1_pwl.user WHERE email=:a AND password=:b");
$sql->bindParam(':a', $email);
$sql->bindParam(':b', $password);
$sql->execute();

$data = $sql->fetch();

if (!empty($data)) {
    $_SESSION['email'] = $data['email'];
    $_SESSION['password'] = $data['password'];
    header("location: " . $base_url . "./login/index.php");
} else {
    setcookie("message", "Maaf, username atau password anda salah");
    header("location: " . $base_url . "index.php");
}
