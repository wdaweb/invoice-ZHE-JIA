<?php

    $dsn="mysql:host=localhost;dbname=invoice;charset=utf8";
    $pdo=new PDO($dsn,'root','');

date_default_timezone_set("Asia/Taipei");
session_start();

    $awardStr=['頭','二','三','四','五','六'];
    // $awardStr=['六','五','四','三','二','一'];
    $awardMoney=['20萬','15萬','10萬','5萬','1萬','200'];
?>