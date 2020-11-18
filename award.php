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
    
    $award=$pdo->query("select * from award_numbers where year= '$year' && period='$period'")->fetchAll();
    echo "<pre>";
    print_r($award);
    echo "</pre>";

?>