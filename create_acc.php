<?php include_once "acc_top_base.php";?>


<body>
    <div class="container">
        <div class="col-8 p-3 mx-auto border d-flex justify-content-between ">
            <form action="create_acc.php" method="get">
                <h3>註冊帳號</h3>
                <div>帳號：<input type="text" name="acc">
                <?php 
                $tmp=0;
                if(!empty($_GET['acc'])){
                    $acces=$pdo->query("select * from `account`")->fetchALL();
                    foreach($acces as $acc){
                        if($acc['acc'] == $_GET['acc']){
                            $tmp=0;
                        break;
                        }else {
                            $tmp=1;
                        }
                    //header("location:account.php");
                    }
                    if($tmp==0){
                        echo "帳號重複";
                    }else if(!empty($_GET['pw'])) {
                        $sql="insert into `account` (`acc`,`pw`) values ('{$_GET['acc']}','{$_GET['pw']}')";
                        $pdo->exec($sql);
                        header("location:account.php");
                    }
                    
                }else if(empty($_GET['acc']) && isset($_GET['acc'])){
                    echo "帳號不能為空";
                }
                
                ?>
                </div>
                <div>密碼：<input type="text" name="pw">
                <?php
                if(!empty($_GET['pw'])){

                }else if(empty($_GET['pw']) && isset($_GET['pw'])){
                    echo "密碼不能為空";
                }

                ?>
                </div>
                <div><a href="account.php">帳號登入</a></div>
                <div class="d-flex justify-content-between p-1">
                <input class="btn btn-primary btn-sm" type="submit" value="確認">
                <input class="btn btn-primary btn-sm" type="reset" value="重置">
                </div>
            </form>
        </div>
    </div>
</body>






?>













<?php include_once "acc_bom_base.php";?>