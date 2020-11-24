<?php
    include_once "base.php";

    $_SESSION['user']=[$_GET['acc'],$_GET['pw']];
    $_SESSION['acount']=$pdo->query("select * from account where acc='{$_SESSION['user'][0]}' && pw='{$_SESSION['user'][1]}'")->fetchAll();

    
    header('location:index.php');

?>