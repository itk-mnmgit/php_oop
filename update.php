<?php

require_once 'function.php';
require_once 'Models/Todo.php';

//input type"hidden"はPOST
$id = $_POST['id'];
$task = $_POST['task'];

$todo = new Todo();
$task = $todo->update($task, $id);

header('Location: index.php');