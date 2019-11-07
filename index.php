<?php

require_once 'function.php';
require_once 'Models/Todo.php';

$todo = new Todo();
$tasks = $todo->all();

//ソースを表示 or echo '<pre>'; echo '</pre>'; で囲む
// var_dump($tasks);

?>


<!-- ---------ここからHTML------------>

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
                <span class="text-light">
                    SeedKun
                </span>
            </div>
        </nav>
    </header>
    <main class="container py-5">
        <section>
            <form class="form-row justify-content-center" action="create.php" method="POST">
                <div class="col-10 col-md-6 py-2">
                    <input type="text" id="input-task" class="form-control" placeholder="ADD TODO" name='task'>
                </div>
                <div class="py-2 col-md-3 col-10">
                    <button type="submit" id="add-button" class="col-12 btn btn-secondary">ADD</button>
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
                        <th>EDIT</th>
                        <th>DELETE</th>
                        <th>CHANGE STATUS</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($tasks as $task):?>
                    <tr class = "<?php echo h($task['id']); ?>">
                        <td>
                        <?php echo h($task['name']); ?>
                        </td>
                        <td>
                        <?php echo h($task['update_at']); ?>
                        </td>

                    <?php if (h($task['done_flg']) == 0): ?>
                        <td>NOT YET</td>
                    <?php else : ?>
                        <td>DONE</td>
                    <?php endif; ?>

                        <td>
                            <a class="text-success" href="edit.php?id=<?php echo h($task['id']); ?>">EDIT</a>
                        </td>
                        <td>
                        <a data-id="<?php echo $task['id']; ?>" class="text-danger delete-button feedoutDelete" href="delete.php?id=<?php echo $task['id']; ?>">DELETE</a>
                        </td>
                    <?php if (h($task['done_flg']) == 0): ?>
                        <td>
                            <button class="btn done-button btn-ml">
                            <i class="fas fa-check-square"></i>
                            </button>
                        </td>
                    <?php else: ?>
                    <td>
                            <button class="btn undone-button btn-ml">
                            <i class="far fa-check-square"></i>
                            </button>
                        </td>
                    <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>