<?php

    include_once "base.php";

    $period_str=[
        1=>'1,2月',
        2=>'3,4月',
        3=>'5,6月',
        4=>'7,8月',
        5=>'9,10月',
        6=>'11,12月'


    ];
        echo "你要對的發票是".$_GET['year']."年,";
        echo "期數是".$period_str[$_GET['period']]."<br>";

        $awards=$pdo->query("select * from award_numbers where name='{$_SESSION['user']['acc']}' && year='{$_GET['year']}' && period='{$_GET['period']}'")->fetchAll();
        $invoices=$pdo->query("select * from invoices where name='{$_SESSION['user']['acc']}' && period='{$_GET['period']}' && left(date,4)='{$_GET['year']}' Order by date desc")->fetchAll();

        $type=[
            1=>'特別獎',
            2=>'特獎',
            3=>'頭獎',
            4=>'六獎'
        ];
        $sum=0;
        foreach($invoices as $invoice){

            foreach($awards as $award){
                switch($award['type']){
                    case 1:
                        if($invoice['number'] == $award['number']){
                            echo $invoice['number']."中".$type[$award['type']]."了<br>";
                            $sum=$sum+10000000;
                        }
                    break;
                    case 2:
                        if($invoice['number'] == $award['number']){
                            echo $invoice['number']."中".$type[$award['type']]."了<br>";
                            $sum=$sum+2000000;
                        }
                    break;
                    case 3:
                            for($i=1;$i<=5;$i++){
                                if(mb_substr($invoice['number'],0+$i,8) == mb_substr($award['number'],0+$i,8)){
                                    echo $invoice['number']."中".$awardStr[$i]."獎了<br>";
                                    $sum=$sum+$awardMoney1[$i];
                                break;
                                }
                                
                            }
                    break;
                    case 4:
                        if(mb_substr($invoice['number'],5,8) == $award['number']){
                            echo $invoice['number']."中".$awardStr[5]."獎了<br>";
                            $sum=$sum+200;
                        }



                }

            }
        }
        echo "總獎金：".$sum."元";
        // echo "<pre>";
        // print_r($awards);
        // echo "</pre><br>";
        // echo "<pre>";
        // print_r($invoices);
        // echo "</pre>";

?>
