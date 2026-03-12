<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css\style.css" />
    <title>Todo List In PHP / MySql</title>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <a class="heading" href="#">ToDo List</a>
    </nav>
    
    <div class="container">
        <div class="input-area">
            <!-- Form for inputting tasks -->
            <form method="POST" action="./php/add_task.php">
                <input type="text" name="task"
                        placeholder="write your tasks here..." required />
                <button class="btn" name="add">
                    Add Task
                </button>
            </form>
        </div>

        <!-- Table to display tasks -->
        <table class="table">
            <thead>
                <tr>
                <th>#</th>
                <th>Tasks</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    require './php/config.php';

                    $fetchingtasks = mysqli_query($conn, "SELECT * FROM `task` ORDER BY `task_id` ASC") or die(mysqli_error($conn));

                    $count = 1;

                    while ($fetch = $fetchingtasks->fetch_array()) {
                ?>
                        <tr class="border-bottom">
                            <td>
                                <?php echo $count++ ?>
                            </td>

                            <td>
                                <?php echo $fetch['task'] ?>
                            </td>

                            <td>
                                <?php echo $fetch['status'] ?>
                            </td>

                            <td colspan="2" class="action">
                                <?php
                                    if ($fetch['status'] != "Done") {
                                        echo '<a href="./php/update_task.php?task_id='. $fetch['task_id'] .'" class="btn-completed">✔</a>';
                                    }
                                ?>

                                <a href= "./php/delete_task.php?task_id=<?php echo $fetch['task_id'] ?>" class="btn-remove">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                ?>
        </tbody>
        </table>
    </div>
</body>
</html>
