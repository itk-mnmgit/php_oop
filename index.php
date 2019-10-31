<?php

require_once 'function.php';
require_once 'Models/Todo.php';

$todo = new Todo();
$tasks = $todo->all();

//ソースを表示 or echo '<pre>'; echo '</pre>'; で囲む
// var_dump($tasks);

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
                        <th class=>TODO</th>
                        <th>DUE DATE</th>
                        <th>STATUS</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            <?php foreach ($tasks as $task):?>
                <tr>
                    <td>
                    <?php echo h($task['name']); ?>
                    </td>
                    <td>
                    <?php echo h($task['due_date']); ?>
                    </td>
                    <td>?</td>
                        <td>
                            <a class="text-success" href="edit.php?id=<?php echo h($task['id']); ?>">EDIT</a>
                        </td>
                        <td>
                        <a class="text-danger" href="delete.php?id=<?php echo $task['id']; ?>">DELETE</a>
                        </td>
                </tr>
            <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>