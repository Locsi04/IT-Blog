<?php
$driver = 'mysql';
$host = 'localhost';
$db_name = 'it blog'; 
$db_user = 'root';
$db_pass = 'mysql';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC];

try {
    $dsn = "$driver:host=$host;dbname=$db_name;charset=$charset";
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (PDOException $e) {
    die("Помилка підключення до бази даних: " . $e->getMessage());
}
?>
