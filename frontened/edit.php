<!DOCTYPE html>
<html>

<head>
    <title>IPL Dashboard - Edit Player</title>
    <link rel="stylesheet" href="/assets/css/edit.css">
</head>
<?php
include '../logics/edit.php';
?>

<body>
    <h2>Edit Player</h2>

    <div class="container">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br>

            <label for="runs">Runs:</label>
            <input type="number" id="runs" name="runs" value="<?php echo $runs; ?>"><br>

            <label for="balls_faced">Balls Faced:</label>
            <input type="number" id="balls_faced" name="balls_faced" value="<?php echo $balls_faced; ?>"><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>