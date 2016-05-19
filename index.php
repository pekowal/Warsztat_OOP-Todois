<?php
require_once __DIR__ . "/src/connectDB.php";
$allTasks = Task::GetAllTasks($conn);

?>

<!DOCTYPE html>
<html lang="en">
<?php
include "head.php";
//unset($_SESSION);
?>
<body class="text-center">
<div class="page-header"><h1>Todois</h1></div>
<a href="addTasks.php" class="btn btn-default">Dalej</a>

<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (strlen($_POST['name']) > 0 && strlen($_POST['content']) > 0) {
        $newtask = new Task();
        $newtask->setContent($_POST['content']);
        $newtask->setName($_POST['name']);
        $newtask->setPriority($_POST['priority']);
        $newtask->saveToDB($conn);
    } else {
        echo '<div class="alert alert-warning">Wypełnij poprawnie formularz</div>';
    }

}
if (!empty($_GET['taskID'])) {
    foreach ($allTasks as $task) {
        if ($task->getId() == $_GET['taskID']) {
            $task->endTask($conn);
          //  var_dump($task);
        }

    }

}

//var_dump($newtask);
?>
<?php

$allTasks = Task::GetAllTasks($conn);

//var_dump($allTasks);


?>
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>Nazwa:</th>
                <th>Opis:</th>
                <th>Priorytet:</th>
                <th>Usuń:</th>
            </tr>
            </thead>
            <tbody>
        <?php
        if (isset($allTasks)) {
            foreach ($allTasks as $task) {
                echo "<tr>";
                if ($task->getFinished() == 1) {
                    echo "<th><s>{$task->getName()}</s></th>";
                } else {
                    echo "<th>".$task->getName()."</th>";
                }
                echo "<th>".$task->getContent()."</th>";
                echo "<th>";
                switch ($task->getPriority()) {
                    case -2:
                        echo "Very Low";
                        break;
                    case -1:
                        echo "Low";
                        break;
                    case 0:
                        echo "Normal";
                        break;
                    case 1;
                        echo "High";
                        break;
                    case 2:
                        echo "Very High";
                        break;
                    default:
                        echo "Normal";
                }
                echo "</th>";
                echo "<th>";
                if ($task->getFinished() == 0) {
                    echo "<form method='get'>";
                    echo "<button class='btn btn-success' name='taskID' value='{$task->getId()}'>Zakończ</button><br>";
                } else {
                    echo "<span class='text-center'>Zakończone</span>";
                }
                echo "</th>";
                echo "<form>";
                echo "</div>";
            }
        }


        ?>
    </div>

</div>
</body>

</html>

<?php


$conn->close();
$conn = null;

?>

