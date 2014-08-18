<?php
require_once '../lib/qdmail.1.2.6b/qdmail.php';

$formData = $_GET;
$message = '';
foreach ($formData as $key => $data){
    //タイトル
    if(substr($key,0,1) === 'T'){
        switch (substr($key,1,5)){
            case 'textf':
                echo "<h3>{$data}</h3>";
                $message = $message.''.$data.PHP_EOL;
                break;
            case 'texta':
                echo "<h3>{$data}</h3>";
                $message = $message.''.$data.PHP_EOL;
                break;
            case 'label':
                echo "<h2>{$data}</h2>";
                $message = $message.$data.PHP_EOL;
                break;
            case 'radio':
                echo "<h3>{$data}</h3>";
                $message = $message.''.$data.PHP_EOL;
                break;
            case 'check':
                echo "<h3>{$data}</h3>";
                $message = $message.''.$data.PHP_EOL;
                break;
            default:
                echo '<h3><h3/>';
        }
    }else {
        switch (substr($key,0,5)){
            case 'textf':
                echo "<ul><li>{$data}</li></ul>";
                $message = $message.'・'.$data.PHP_EOL;
                break;
            case 'texta':
                echo "<ul><li>{$data}</li></ul>";
                $message = $message.''.$data.PHP_EOL;
                break;
            case 'radio':
                echo "<ul><li>{$data}</li></ul>";
                $message = $message.'・'.$data.PHP_EOL;
                break;
            case 'check':
                echo '<ul>';
                foreach ($data as $d) {
                    echo "<li>{$d}</li>";
                    $message = $message.'・'.$d.PHP_EOL;
                }
                echo '</ul>';
                break;
            default:
                echo '<h3><h3/>';
        }
    }
}
mb_language('ja');

$to      = 'test@test.com';
$subject = '[XCAT]WEB申請システム';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion().
    "Content-Type: text/html; charset=\"ISO-2022-JP\";\r\n" ; //ヘッダはISO-2022-JPを指定する
;

$mail = new Qdmail();
$mail -> easyText(
      array( 'mailto@example.com' , '宛先(日本語OK)' ),
      '[WEB申請システム]申請' ,
      $message,
      array( 'from@example.com' , '配信元（日本語OK)' )
 );

 header("Location: http://localhost/php-prototype001/php/xmlInputList.php",true,301);
