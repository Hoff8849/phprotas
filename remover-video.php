<?php

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

//$id = $_GET['id'];
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$sql = 'DELETE FROM videos WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $id);

if ($stmt->execute() === false) {
    header('location: /?sucesso=0');
}else{
    header('location: /?sucesso=1');
}