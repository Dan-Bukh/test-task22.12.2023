<?php
session_start();

if(isset($_FILES) && $_FILES['input_file']['error'] == 0 && $_FILES['input_file']['type'] == 'text/plain') {
    $file_name = rand(0, 100). '_'. $_FILES['input_file']['name'];
    move_uploaded_file($_FILES['input_file']['tmp_name'], dirname(__FILE__). '/files'. '/'. $file_name);
    $file_text = file_get_contents("files/$file_name");
    $file_text = str_split($file_text, 30);
    $_SESSION['file_text'] = $file_text;
    $_SESSION['result'] = 'success';
} else { 
    $_SESSION['result'] = 'error';
}
header("Location: /");

