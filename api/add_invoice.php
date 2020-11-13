<?php
//撰寫新增消費發票的程式碼
//將發票的號碼及相關資訊寫入資料庫
    include_once "../base.php"; // ../上一層
    $sql="insert into invoices (`".implode("`,`",array_keys($_POST))."`) values ('".implode("','",$_POST)."')";
    echo "$sql";
    $pdo->exec($sql);
    echo "新增完成";
    //header("location:../index.php");
?>