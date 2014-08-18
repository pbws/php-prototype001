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
        <title>編集 -XML一覧-</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>XML一覧</h1>
        <button onclick="location.href='xmlCreate.php'">新規作成</button>
        <h3>編集するフォームを選択して下さい。</h3>
        <ul>
        <?php
        foreach ($files as $file) {
            echo "<li><a href='xmlEdit.php?xml={$file}'>{$file}</a></li>";
        }
        ?>
        </ul>
        <button onclick="location.href='index.html'">戻る</button>
    </body>
</html>
