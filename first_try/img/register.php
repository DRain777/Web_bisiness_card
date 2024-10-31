<?php
// Соединение с базой данных (настрой по своему хосту)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Вставка данных в базу
$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "Регистрация успешна!";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
