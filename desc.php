<?php
require_once 'function.php';
require_once 'Models/Todo.php';


$todo = new Todo();
$tasks = $todo->desc();


// header('Location: index.php');
?>

<!-- ---------ここからHTML---------- -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

</head>
<body>
    <header class="px-5 bg-secondary">
        <nav class="navbar navbar-dark">
            <a href="index.php" class="navbar-brand">TODO APP</a>
            <div class="justify-content-end">
                <span class="text-light">Itsuki</span>
            </div>
        </nav>
    </header>
    <main class="container py-5">
        <section>
            <form class="form-row justify-content-center" action="create.php" method="POST">
                <div class="col-10 col-md-6 py-2">
                    <input type="text" class="form-control" placeholder="ADD TODO" name='task'>
                </div>
                <div class="py-2 col-md-3 col-10">
                    <button type="submit" class="col-12 btn btn-secondary">ADD</button>
                </div>
            </form>
        </section>
        <section class="mt-5">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-secondary text-light">
                        <th>TODO</th>
                        <th>
                            <dl class="toggle-menu">
                                <dt class="js-toggle">UPDATE_AT</dt>
                                <dd>
                                    <a class="text-light" href="asc.php">ASC</a>
                                </dd>
                                <dd>
                                    <a class="text-light" href="asc.php">DESC</a>
                                </dd>
                            </dl>
                        </th>
                        <th>STATUS</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
            <?php foreach ($tasks as $task):?>
                <tr>
                    <td>
                    <?php echo h($task['name']); ?>
                    </td>
                    <td>
<!-- date(”表示方法", "strtotime(表示する日時)") : 日付を表示するフォーマットを変更 -->
<!-- strtotime(表示する日時) : 英文形式の日付を Unix タイムスタンプに変換する -->
                    <?php echo date("F, j(D) Y H:i", strtotime($task['update_at']));?>
                    </td>
                    <td>?</td>
                        <td>
                            <a class="text-success" href="edit.php?id=<?php echo h($task['id']); ?>">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                        <td>
                            <a class="text-danger" href="delete.php?id=<?php echo $task['id']; ?>">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                </tr>
            <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src='assets/js/app.js'></script>
</body>
</html>