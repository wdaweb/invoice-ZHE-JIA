<?php

//撰寫建立各期中獎號碼的程式
//將表單傳送過來的中獎號碼寫入資料庫

//  include_once 是寫入某檔案的全部程式
include_once "../base.php";
$year=$_POST['year'];
$period=$_POST['period'];

//特別獎的新增 type=1

echo "<pre>";
print_r($_POST);
echo "</pre>";
        //以下4個if(!empty())避免空的input建入空值至資料表
        if(!empty($_POST['special_Prize'])){

        
        $sql="insert into
                award_numbers 
                    (`year`,`period`,`number`,`type`) 
                values
                    ('$year','$period','{$_POST['special_Prize']}','1')";

        $pdo->exec($sql);
        }
//特獎的新增 type=2
        if(!empty($_POST['special_Prize'])){

        
        $sql="insert into
                award_numbers 
                    (`year`,`period`,`number`,`type`) 
                values
                    ('$year','$period','{$_POST['grand_Prize']}','2')";
        $pdo->exec($sql);
        }
//頭獎 type=3
foreach($_POST['first_Prize'] as $first){

    if(!empty($first)){
    $sql="insert into
            award_numbers 
                (`year`,`period`,`number`,`type`) 
            values
                ('$year','$period','$first','3')";
    $pdo->exec($sql);
    }
}
//增開六獎 type=4

foreach($_POST['add_Six_Prize'] as $first){

    if(!empty($first)){
    $sql="insert into
            award_numbers 
                (`year`,`period`,`number`,`type`) 
            values
                ('$year','$period','$first','4')";
    $pdo->exec($sql);
    }
}


echo "新增完成";
header("location:../index.php?do=award_numbers&pd=".$year."-".$period);




?>