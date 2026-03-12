// Add Task Handler
<?php
    require_once 'config.php';

    if (isset($_POST['add'])) {
        if ($_POST['task'] != "") {
            $task = $_POST['task'];

            $addtasks = mysqli_query($conn, "INSERT INTO `task` VALUES('', '$task', 'Pending')") or die(mysqli_error($conn));

            header('location:../index.php');
        }
    }
?>
