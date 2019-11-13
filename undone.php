<?php

require_once ('Models/Todo.php');

//完了ボタンが押されたタスクのIDを取得
$id = $_GET['id'];

//Todoクラスのインスタンス化
$todo = new Todo();

//doneメソッドを実行
$todo->undone($id);

echo json_encode($id);

//更新したタスクのIDを返す