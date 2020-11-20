<?php
    include_once "base.php";

    $codeBase=["AB","CA","ZS","BD","WD","GF","WQ","QX"];
    echo "資料產生中";
    echo date("Y-m-d H:i:s");
    for($i=1;$i<=1000;$i++){
    $code=$codeBase[rand(0,5)];
    $number=sprintf("%08d",rand(0,99999999));
    $payment=rand(0,20000);
    $start=strtotime("2020-01-01");
    $end=strtotime("2020-12-31");
    $date=date("Y-m-d",rand($start,$end));
    $period=ceil(explode("-",$date,)[1]/2);
    $hope=[
        'code'=>$code,
        'number'=>$number,
        'payment'=>$payment,
        'date'=>$date,
        'period'=>$period
    ];
        $sql="insert into invoices (`".implode("`,`",array_keys($hope))."`) values('".implode("','",$hope)."')";
        $pdo->exec($sql); 
    }
    





?>