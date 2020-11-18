<?php
    include_once "base.php";

    $inv_id=$_GET['id'];

    $invoice=$pdo->query("select * from invoices where id='$inv_id'")->fetch();

    $number=$invoice['number'];

    // echo "<pre>";
    // print_r($invoice);
    // echo "</pre>";

/*  找出獎號
    1.確認期數>目前發票的日期
    2.得到期數>找出此期數的開獎號碼


*/

    $date=$invoice['date'];
    //explode('-',$date)取得日期的陣列，第二個陣列元素就是月份
    //月份即可推算期數，並且有年份也有期數了
    $period=ceil(explode('-',$date)[1]/2);
    $year=explode('-',$date)[0];
    
    $awards=$pdo->query("select * from award_numbers where year= '$year' && period='$period'")->fetchAll();
    //  echo "<pre>";
    //  print_r($awards);
    //  echo "</pre>";

    $all_res=-1;
    foreach($awards as $award){

        switch($award['type']){
            case 1:
                if($award['number'] == $number){
                    echo "<br>".$number."<br>";
                    echo "中特別獎了";
                    echo "中1000萬元";
                    $all_res=1;
                }
            break;
            case 2:
                if($award['number'] == $number){
                    echo "<br>".$number."<br>";
                    echo "中特獎了";
                    echo "中200萬元";
                    $all_res=1;
                }
            break;
            case 3:
                $res=-1;
                for($i=5;$i>=0;$i--){
                    $target=mb_substr($award['number'],$i,8-$i,'utf8');
                    $mynumber=mb_substr($number,$i,8-$i,'utf8');
                    
                    if($target == $mynumber){
                        $res=$i;
                    }else {
                        break;
                    }
                }
                if($res != -1){
                echo $number."號<br>";
                echo "$awardStr[$res]獎<br>";
                echo "中$awardMoney[$res]元";
                $all_res=1;                  
                }

            break;
            case 4:
                if($award['number'] == mb_substr($number,5,3,'utf8')){
                    echo "<br>".$number."<br>";
                    echo "中六獎了";
                    echo "中200元";
                    $all_res=1;
                }
            break;


        }


    }
    if($all_res==-1){
        echo "銘謝惠顧";
    }

?>