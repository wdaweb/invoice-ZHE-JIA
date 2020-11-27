
<?php include_once "acc_top_base.php";

    session_start();
    $_SESSION=array();

?>

<body>
    <div class="container">
    <div class="col-8 d-flex justify-content-between p-3 mx-auto border">
    <form action="tmp.php" method="get">
    <h2>帳號登入</h2>
    <div> 帳號：<input type="text" name="acc"></div>
    <div> 密碼：<input type="text" name="pw"></div>
    <div><a href="create_acc.php">註冊帳號</a></div>
    <div class="d-flex justify-content-between">
    <input class="btn btn-primary btn-sm" type="submit" value="登入">
    <input class="btn btn-primary btn-sm" type="reset" value="重置"></div>
    </form>
    </div>
    </div>
    


    

</body>
<?php include_once "acc_bom_base.php";?>








<?php







?>