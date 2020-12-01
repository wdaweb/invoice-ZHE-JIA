
<?php include_once "acc_top_base.php";

    session_start();
    $_SESSION=array();

?>

<body>
    <div class="container">
    <div class="bg1">
    <div class="col-8 d-flex justify-content-between p-3 mx-auto border bg2" style="width:285px;height:430px">
    <form class="px-2" action="tmp.php" method="get">
    <div class="text-center pt-5"><h2>帳號登入</h2></div>
    <div  >
    <div class="my-1" > 帳號：<input type="text" name="acc"></div>
    <div class="my-3"> 密碼：<input type="text" name="pw"></div>
    <div><?php
        if(isset($_GET['error'])){
            echo "<span  style='color:red;'>帳號或密碼錯誤</span>";
        }else{
            echo " <span> &nbsp</span>";
        }
        
    ?></div>
    <div class="d-flex justify-content-between p-1">
    <input class="btn btn-primary btn-sm " style="width:227px;" type="submit" value="登入"></div>
    </div>
    <br>
    <div class="text-right pr-1"><a href="create_acc.php" class="btn btn-info btn-sm">註冊帳號</a></div>
    </form>
    
    </div>
    </div>
    </div>

    

</body>
<?php include_once "acc_bom_base.php";?>








<?php







?>