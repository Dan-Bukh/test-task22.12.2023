<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="basic.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="input_file">
        </br></br>
        <input type="submit" value="Нажмите для загрузки">
    </form>
    <br>
    <?php 
    session_start();
        if(isset($_SESSION['result'])) {
            if($_SESSION['result'] == 'error') {
               ?> <div class="error"></div> <?php
            } else if ($_SESSION['result'] == 'success') {
                ?> 
                <div class="success"></div> 
                <?php foreach($_SESSION['file_text'] as $value) {
                ?> <p><?= $value. ' = ' . preg_match_all("/[0-9]/", $value) ?></p><?php
                } ?>
                <?php
            }
        }
        unset($_SESSION['result']);
        unset($_SESSION['file_text']);
    session_destroy();
    ?>
</body>
</html>