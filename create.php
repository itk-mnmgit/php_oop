<?php

header("Content-type: application/json; charset=utf-8");

require_once 'Models/Todo.php';
$task=$_POST['task'];
//インスタンス作成
$todo = new Todo();
//DBに格納
// $todo->create($task);

//作成したタスクのIDを取得
$latestId = $todo->create($task);

//最新のタスクを取得
$latestTask = $todo->get($latestId);

//最新のタスクをjson形式にして通信元に返す
echo json_encode($latestTask);


//格納後index.phpに戻る
// header('Location: index.php');
