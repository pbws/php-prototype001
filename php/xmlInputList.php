<?php
mb_language("Japanese");

$files = array();
if ($dir = opendir("../xml/")) {
    while (($file = readdir($dir)) !== false) {
        if ($file != "." && $file != "..") {
            $lnum = strrpos($file, '.');
            $files[] = mb_convert_encoding(substr($file,0,$lnum), 'UTF-8', 'auto');
        }
    } 
    closedir($dir);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>入力 -XML一覧-</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>XML一覧</h1>
        <h3>入力するフォームを選択して下さい。</h3>
        <ul>
        <?php
        foreach ($files as $file) {
            echo "<li><a href='xmlView.php?xml={$file}'>{$file}</a></li>";
        }
        ?>
        </ul>
        <button onclick="location.href='index.html'">戻る</button>
    </body>
</html>
