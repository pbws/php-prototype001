<?php
function echoRow(){
    $row = 20;
    for ($i = 1; $i <= $row; $i++){
        echo <<< EOD
            <tr>
                <td><input type="text" name="title{$i}" /></td>
                <td>
                    <select name="selec{$i}">
                        <option value="textf">テキストフィールド</option>
                        <option value="texta">テキストエリア</option>
                        <option value="label">ラベル</option>
                        <option value="radio">ラジオボタン</option>
                        <option value="check">チェックボックス</option>
                    </select>
                </td>
                <td><input type="text" name="optio{$i}" /></td>
            </tr>
EOD
        ;
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form action="createXML.php" method="get">
                <p>
                    <label>名称<input type="text" name="filen" /></label>
                </p>
                <table>
                    <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>種類</th>
                            <th>オプション</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echoRow(); ?>
                    </tbody>
                </table>
                <input type="submit" value="決定" />
            </form>
        </div>
    </body>
</html>
