<?php
    $errors = "";
    
    $db = mysqli_connect('localhost','root','','tasklist');

    if (isset($_POST['submit'])){
        $task = $_POST['task'];
        if (empty($task)){
            $errors = "Must fil in the task";
        }
        else
        mysqli_query($db,"INSERT INTO todo (task) VALUES ('$task')");
        header('location: ToDoList.php');
    }

    $task = mysqli_query($db,"SELECT * FROM todo");

    
?>

<html>
<head>
        <title> Objectives for Today </title>
        <link rel="stylesheet" type="text/css" href="styleSheet.css">
</head>
<body>
    <div class="heading">
        <h2> Todo List application using PHP and MySQL</h2>
    </div>
    <form method="POST" action="ToDoList.php">
    <?php if(isset($errors)) { ?>
        <p><?php echo $errors; ?> </p>
    <?php } ?>
        <input type="text" name="task" class="task_input">
        <button type="submit" class="task_btn" name="submit">Add Task</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>N</th>
                <th>Task</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($task)) { ?>
                         <tr>
                         <td><?php echo $row['id']; ?></td>
                         <td class="task"><?php echo $row['task']; ?></td>
                         <td class="delete">
                         <a href="#">x</a>
                        </td>
                     </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>