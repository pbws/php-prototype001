<?php
function writeTitleValue($pValue, $pName){
    echo "<input type='hidden' value='{$pValue}' name='T{$pName}'";
}

$formData = $_GET;
if(!$formData || !$formData['xml']){
    header("Location: http://localhost/php-prototype001/php/xmlInputList.php",true,301);
}
$file_name = $formData['xml'];
$file_path = '../xml/'.$file_name.'.xml';
echo "<h1>{$file_name}</h1>";
$xml = @simplexml_load_file(mb_convert_encoding($file_path,'SJIS','auto'));

$textField_Cnt = 0;
$textArea_Cnt = 0;
$label_Cnt = 0;
$radio_Cnt = 0;
$check_Cnt = 0;

if($xml){
    header("Content-type: text/html; charset=utf-8");
    echo "<form action='xmlGetTest.php' method='get'>";
    echo "<input type='hidden' value='{$file_name}' name='filenm' />";
    
    foreach ($xml->parts as $parts) {
        switch ($parts['type']){
        case 'textf':
            $textField_Cnt += 1;
            writeTitleValue($parts->title, 'textf'.$textField_Cnt);
            echo '<p>';
            echo $parts->title;
            echo "<input type='text' name='textf{$textField_Cnt}' />";
            echo '</p>';
            break;
        case 'texta':
            $textArea_Cnt += 1;
            writeTitleValue($parts->title, 'texta'.$textArea_Cnt);
            echo '<p>';
            echo $parts->title;
            echo "<textarea name='texta{$textArea_Cnt}'></textarea>";
            echo '</p>';
            break;
        case 'label':
            $label_Cnt += 1;
            writeTitleValue($parts->title, 'label'.$label_Cnt);
            echo '<p>';
            echo '<h1>';
            echo $parts->title;
            echo '</h1>';
            echo '</p>';
            break;
        case 'radio':
            $radio_Cnt += 1;
            writeTitleValue($parts->title, 'radio'.$radio_Cnt);
            echo '<p>';
            echo $parts->title;
            foreach ($parts->options->option as $option){
                echo "<label><input type='radio' name='radio{$radio_Cnt}' value='{$option}' />{$option}</label>";
            }
            echo '</p>';
            break;
        case 'check':
            $check_Cnt += 1;
            writeTitleValue($parts->title, 'check'.$check_Cnt);
            echo '<p>';
            echo $parts->title;
            foreach ($parts->options->option as $option){
                echo "<label><input type='checkbox' name='check{$check_Cnt}[]' value='{$option}' />{$option}</label>";
            }
            echo '</p>';
            break;
        default:
            break;
        }
    }
    echo "<input type='submit' value='決定' /></form><button onclick=location.href='xmlInputList.php'>戻る</button>";
}else {
    header("Location: http://localhost/php-prototype001/php/xmlInputList.php",true,301);
}
?>