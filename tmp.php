<?php
    include_once "base.php";

    $_SESSION['user']=['acc'=>$_GET['acc'],'pw'=>$_GET['pw']];
    $_SESSION['acount']=$pdo->query("select * from account where acc='{$_SESSION['user']['acc']}' && pw='{$_SESSION['user']['pw']}'")->fetchAll();
    
    


    
    header("location:index.php");

?>