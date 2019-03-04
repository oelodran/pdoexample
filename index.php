<?php
$host = 'localhost';
$user = 'root';
$password = 'leon';
$dbname = 'pdoposts';

// set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

// Create a PDO instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

# PDO QUERY

//$stmt = $pdo->query('SELECT * FROM posts');
//
//while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//    echo $row['title'] . '<br />';
//}

//while($row = $stmt->fetch()) {
//    echo $row->title . '<br />';
//}

# PREPARED STATEMENTS (prepare & execute)

// UNSAFE

//$sql = "SELECT * FROM posts WHERE author = '$author'";

// FETCH MULTIPLE POSTS

// User Input
$author = 'Brad';
$is_published = true;
$id = 1;

// Positional Params
//$sql = 'SELECT * FROM posts WHERE author = ?';
//$stmt = $pdo->prepare($sql);
//$stmt->execute([$author]);
//$posts = $stmt->fetchAll();

// Named Params
//$sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
//$stmt = $pdo->prepare($sql);
//$stmt->execute(['author' => $author, 'is_published' => $is_published]);
//$posts = $stmt->fetchAll();

// var_dump($posts);
//foreach ($posts as $post) {
//    echo $post->title . '<br>';
//}

// FETCH SINGLE POST
$sql = 'SELECT * FROM posts WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$post = $stmt->fetch();

?>

<h1><?php echo $post->title ?></h1>

<p><?php echo $post->body ?></p>
