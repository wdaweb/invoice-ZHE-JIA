<?php include_once "acc_top_base.php";?>


<body>
    <div class="container">
        <div class="col-8 p-3 mx-auto border d-flex justify-content-between ">
            <form action="create_acc.php" method="get">
                <div>帳號：<input type="text" name="acc"></div>
                <div>密碼：<input type="text" name="pw"></div>
                <div><a href="account.php">帳號登入</a></div>
                <div class="d-flex justify-content-between p-1">
                <input class="btn btn-primary btn-sm" type="submit" value="確認">
                <input class="btn btn-primary btn-sm" type="reset" value="重置">
                </div>
            </form>
        </div>
    </div>
</body>

<?php 
    if(isset($_GET['acc']) && isset($_GET['pw'])){
    $sql="insert into `account` (`acc`,`pw`) values ('{$_GET['acc']}','{$_GET['pw']}')";
    $pdo->exec($sql);
    header("location:account.php");
    }




?>













<?php include_once "acc_bom_base.php";?>