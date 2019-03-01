<?php
$host = 'localhost';
$user = 'root';
$password = 'leon';
$dbname = 'pdoposts';

// set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

// Create a PDO instance
$pdo = new PDO($dsn, $user, $password);

# PDO QUERY

$stmt = $pdo->query('SELECT * FROM posts');

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['title'] . '<br />';
}