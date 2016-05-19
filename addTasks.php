<?php

require_once __DIR__."/src/connectDB.php";

?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<body>
<div class="container">
    <div class="page-header text-center"><h1>Dodaj Zadnie</h1></div>

    <form method="POST" action="index.php" class="form-horizontal">
        <label class="control-label col-sm-2">Nazwa zadania:</label>
        <div class="form-group col-sm-10">
            <input type="text" placeholder="Nazwa" name="name" class="form-control col-sm-10"><br>
        </div>
        <label class="control-label col-sm-2">Treść zadania:</label>
        <div class="form-group col-sm-10">
            <input type="text" class="form-control" placeholder="Treść" name="content"><br>
        </div>
        <label class="control-label col-sm-2">Priorytet:</label>
        <div class="form-group col-sm-10">
            <select name="priority" id="priority" class="form-control">
                <option value="2">Very High</option>
                <option value="1">High</option>
                <option value="0">Normal</option>
                <option value="-1">Low</option>
                <option value="-2">Very Low</option>
            </select>
        </div>
        <div class="col-sm-offset-2">
            <button type="submit" class="btn btn-success">Dodaj</button>
        </div>

    </form>
</div>
</body>

</html>


<?php

$conn->close();
$conn = null;

?>

