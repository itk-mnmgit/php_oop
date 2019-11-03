<?php
require_once 'Models/Todo.php';

$todo = new Todo();
$tasks = $todo->asc();

header('Location: index.php');

//デフォルトがASCだからASCを押された時はindex.htmlに戻る
//                  DESCが押された時はdesc.phpに飛ばす
//もっといいソートの表示方法ありそう