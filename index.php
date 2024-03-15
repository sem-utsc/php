<?php
$dsn = "mysql:host=db;port=3306;dbname=mariadb;charset=utf8mb4";

$options = [
  PDO::ATTR_EMULATE_PREPARES   => false, // Disable emulation mode for "real" prepared statements
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Disable errors in the form of exceptions
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Make the default fetch be an associative array
];

try {
  $pdo = new PDO($dsn, "mariadb", "mariadb", $options);
} 
catch (Exception $e) {
  error_log($e->getMessage());
  exit($e->getMessage()); 
}
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

$unbufferedResult = $pdo->query("SELECT name FROM users");
foreach ($unbufferedResult as $row) {
    echo $row['name'] . PHP_EOL;
}

$title = 'PHP is awesome!!!';
require 'index.view.php';