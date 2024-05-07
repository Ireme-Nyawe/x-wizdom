<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="components/css/style.css">
</head>
<body>
    <h3>Trade</h3>
        <form action="" method="post">
            <h3 class="form-title">Add New Trade Here</h3>
            <br>
            <p>
                <label for="">Trade Name</label><br>
                <input type="text" name="name" palaceholder="type--" required>
            </p>
            <p><br>
                <input class="submit" type="submit" name="add" value="Add Now">
            </p>
            <?php
            if(isset($_POST['add'])){
                echo "clicked";
            }
            ?>
        </form>
</body>
</html>