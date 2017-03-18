<?php
function debug($arr){
    echo '<pre>' . print_r($arr, true). '</pre>';
}
require_once ('pq.php');

//$file = $_FILES['uploadfile']['tmp_name'];
if (empty($_FILES['userfile']['tmp_name'])){
    $file = file_get_contents("t.html");
}else{
    $file = file_get_contents($_FILES['userfile']['tmp_name']);
}

$document = phpQuery::newDocumentHTML($file);
$tr = pq($document)->find('tr:gt(2)');
$balance = [];
$operations = [];
$i = 0;
$sum = 0;

foreach ($tr as $mspt){

    //debug($mspt);
    if (pq($mspt)->find('td:eq(2)')->html() == 'buy' or pq($mspt)->find('td:eq(2)')->html() == 'balance'){
        $operations[$i] = str_replace(" ", "", pq($mspt)->find(' .mspt:last')->html());
        $sum = $sum + $operations[$i];//pq($mspt)->find(' .mspt:last')->html();
        $balance[$i] = $sum;
        //echo $balance[$i] . " " . $operations[$i] . " " .$i . "<br>";
    }
    $i++;
}
//debug($operations);
//debug($balance);
