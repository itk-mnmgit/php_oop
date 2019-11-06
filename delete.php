<?php

require_once 'Models/Todo.php';

$id = $_GET['id'];
$todo = new Todo();
// $task = $todo->delete($id);

$todo->delete($id);

echo json_encode($id);


// header('Location: index.php');