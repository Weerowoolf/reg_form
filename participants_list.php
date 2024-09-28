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

// Получение данных из базы
$sql = "SELECT full_name, phone, email, section, dob, report, topic FROM participants";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Список зарегистрированных участников</h2>";
    echo "<table border='1'>
            <tr>
                <th>ФИО</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Секция</th>
                <th>Дата рождения</th>
                <th>Доклад</th>
                <th>Тема доклада</th>
            </tr>";
    
    // Вывод данных в таблицу
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['full_name']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['email']}</td>
                <td>{$row['section']}</td>
                <td>{$row['dob']}</td>
                <td>" . ($row['report'] ? 'Да'
