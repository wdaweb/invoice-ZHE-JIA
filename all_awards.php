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

        $awards=$pdo->query("select * from award_numbers where year='{$_GET['year']}' && period='{$_GET['period']}'")->fetchAll();
        $invoices=$pdo->query("select * from invoices where period='{$_GET['period']}' && left(date,4)='{$_GET['year']}' Order by date desc")->fetchAll();

        $type=[
            1=>'特獎',
            2=>'特別獎',
            3=>'頭獎',
            4=>'六獎'
        ];

        foreach($invoices as $invoice){

            foreach($awards as $award){
                switch($award['type']){
                    case 1:
                        if($invoice['number'] == $award['number']){
                            echo $invoice['number']."中".$type[$award['type']]."了<br>";
                        }
                    break;
                    case 2:
                        if($invoice['number'] == $award['number']){
                            echo $invoice['number']."中".$type[$award['type']]."了<br>";
                        }
                    break;
                    case 3:
                            for($i=0;$i<5;$i++){
                                if(mb_substr($invoice['number'],6-$i,8) == mb_substr($award['number'],6-$i,8)){
                                    echo $invoice['number']."中".$type[$award['type']]."了<br>";
                                }
                                
                            }
                            
                        
                    break;



                }

            }
        }

        // echo "<pre>";
        // print_r($awards);
        // echo "</pre><br>";
        // echo "<pre>";
        // print_r($invoices);
        // echo "</pre>";

?>

單期全部對獎