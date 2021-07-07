<?php include_once "acc_top_base.php";?>


<body>
    <div class="container ">
        <div class="bg1">
        <div class="col-8 p-3 mx-auto border d-flex justify-content-between bg2 " style="width:285px;height:430px">
            <form class="px-2" action="create_acc.php" method="get">
                <div class="text-center pt-5"><h2>註冊帳號</h2></div>
                <div class="my-1" >帳號：<input type="text" name="acc"></div>
                <div>
                
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
                    echo " <span> &nbsp</span>";
                    }
                    if($tmp==0){
                        echo "<span style='color:red'>帳號重複</span>";
                    }else if(!empty($_GET['pw'])) {
                        $sql="insert into `account` (`acc`,`pw`) values ('{$_GET['acc']}','{$_GET['pw']}')";
                        $pdo->exec($sql);
                        
                        header("location:account.php");
                    }
                    
                }else if(empty($_GET['acc']) && isset($_GET['acc'])){
                    echo " <span style='color:red;'> 帳號不能為空</span>";
                }else{
                    echo " <span> &nbsp</span>";
                }
                
                ?>
                </div>
                <div class="my-1">密碼：<input type="text" name="pw"></div>
                <div>
                <?php
                if(!empty($_GET['pw'])){
                    echo " <span> &nbsp</span>";
                }else if(empty($_GET['pw']) && isset($_GET['pw'])){
                    echo " <span style='color:red;'>密碼不能為空</span>";
                }else{
                    echo " <span > &nbsp</span>";
                }

                ?>
                </div>
                
                
                <div class="d-flex justify-content-between p-1">
                <input class="btn btn-primary btn-sm" type="submit" value="確認">
                <input class="btn btn-primary btn-sm" type="reset" value="重置">
                </div>
                <br>
                <div class="text-right"><a href="account.php" class="btn btn-info btn-sm">帳號登入</a></div>
            </form>
        </div>
        </div>
    </div>
</body>



















<?php include_once "acc_bom_base.php";?>