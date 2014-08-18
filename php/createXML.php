<?php
$formData = $_GET;
$partsNodes = array();
$rootNode = new SimpleXMLElement( "<?xml version='1.0' encoding='UTF-8' standalone='yes'?><root></root>" );

foreach ($formData as $key => $data) {
    $row = intval(substr($key,5));
    if ($row != 0 && !isset($partsNodes[$row])) {
        $partsNodes[$row] = $rootNode->addChild('parts');
        $partsNodes[$row]->addAttribute('row', $row);
    }

    switch (substr($key,0,5)){
        case 'title':
            if(isset($partsNodes[$row])){
                $partsNodes[$row]->addChild('title', $data);
            }
            break;
        case 'selec':
            if(isset($partsNodes[$row])){
                $partsNodes[$row]->addAttribute('type', $data);
            }
            break;
        case 'optio':
            if (isset($partsNodes[$row])) {
                switch ($partsNodes[$row]['type']) {
                case 'radio':
                case 'check':
                    if (!empty($data)) {
                        $options = explode(',', $data);
                        $optionNode = $partsNodes[$row]->addChild('options');
                        foreach ($options as $option) {
                            $optionNode->addChild('option', $option);
                        }
                    }
                    break;
                default:
                }
            }
            break;
        default:
    }
}
//for($i = 0; $i < $rootNode->count(); $i++){
//    var_dump($rootNode->parts[$i]->tittle);
//    if(empty($rootNode->parts[$i]->tittle)){
//        unset($rootNode->parts[$i]);
//    }
////    var_dump($rootNode->parts[$i]);
//}
foreach ($rootNode as $node) {
    echo $node->title;
    if(empty($node->title)){
        var_dump($node);
        unset($node);
    }
}

$file_name = $formData['filen'];
$file_path = '../xml/'.$file_name.'.xml';

$dom = new DOMDocument( '1.0' );
$dom->loadXML( $rootNode->asXML() );
$dom->formatOutput = true;
$dom->save(mb_convert_encoding($file_path,'SJIS','auto'));
//echo $dom->saveXML();

function a(){
$rootNode = new SimpleXMLElement( "<?xml version='1.0' encoding='UTF-8' standalone='yes'?><root></root>" );
//テキストフィールド 
$partsNode = $rootNode->addChild('parts');
$partsNode->addAttribute('type', 'textFeild');
$partsNode->addChild('title', $title);
//テキストエリア
$partsNode = $rootNode->addChild('parts');
$partsNode->addAttribute('type', 'textArea');
$partsNode->addChild('title', $title);
//ラベル
$partsNode = $rootNode->addChild('parts');
$partsNode->addAttribute('type', 'label');
$partsNode->addChild('title', $title);


// ノードの追加
$itemNode = $rootNode->addChild('item');
$itemNode->addChild( 'itemCode', 'mk' );
$itemNode->addChild( 'itemName', 'orange' );
 
$itemNode = $rootNode->addChild('item');
$itemNode->addChild( 'itemCode', 'ap' );
$itemNode->addChild( 'itemName', 'apple' );
 
$itemNode = $rootNode->addChild('item');
$itemNode->addChild( 'itemCode', 'tof' );
$itemNode->addChild( 'itemName', '豆腐' );
 
// ノードに属性を追加
$itemNode->addAttribute('stock', 'none');
 
// 作ったxmlツリーを出力する
$dom = new DOMDocument( '1.0' );
$dom->loadXML( $rootNode->asXML() );
$dom->formatOutput = true;
//$dom->save('../xml/create_test.xml');
echo $dom->saveXML();
}