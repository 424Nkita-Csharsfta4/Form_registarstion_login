<?php

$conn = new mysqli("localhost", "root", "", "gamumu");

if ($conn -> connect_error) {
    die ("Ошибка подключения: " + $conn ->connect_error);
}
echo "Подключение в норме бро";
$conn->close();
?>
