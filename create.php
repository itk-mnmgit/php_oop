<?php

require_once 'Models/Todo.php';
$task=$_POST['task'];
//インスタンス作成
$todo = new Todo();
//DBに格納
$todo->create($task);
//格納後index.phpに戻る
header('Location: index.php');
