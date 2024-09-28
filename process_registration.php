<?php
$host = 'localhost';
$db = 'conference';
$user = 'root';
$pass = 'password';

// Подключение к базе данных
$conn = new mysqli($host, $user, $pass, $db);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получение данных из формы
$fullName = $_POST['fullName'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$section = $_POST['section'];
$dob = $_POST['dob'] ?? null;
$report = isset($_POST['report']) ? 1 : 0;
$topic = $report ? $_POST['topic'] : null;

// Вставка данных в базу данных
$sql = "INSERT INTO participants (full_name, phone, email, section, dob, report, topic)
        VALUES ('$fullName', '$phone', '$email', '$section', '$dob', '$report', '$topic')";

if ($conn->query($sql) === TRUE) {
    echo "Регистрация успешно завершена!";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// Закрытие подключения
$conn->close();
?>
