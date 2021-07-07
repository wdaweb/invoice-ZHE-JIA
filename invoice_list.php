
<?php
    include_once "base.php";
    //處理分頁
    $data="select count(*) from invoices where period='{$_GET['period']}' && `name`='{$_SESSION['user']['acc']}'";
    $data=$pdo->query($data)->fetch();
    $per=20;
    $pages = ceil($data[0]/$per);

    if(isset($_GET['pages'])){
        $page=$_GET['pages'];
    }else{
        $page=1;
    }

    $start = ($page-1)*$per;

    //處理發票資料庫
    $sql="select * from `invoices` where `name`='{$_SESSION['user']['acc']}' &&`period`='{$_GET['period']}' order by date desc limit $start,$per";

    $rows=$pdo->query($sql)->fetchAll();


?>
<div class="row justify-content-around" sytle="padding-0">
    <li style="list-style-type:none"><a href="?do=invoice_list&period=1">1,2月</a></li>
    <li style="list-style-type:none"><a href="?do=invoice_list&period=2">3,4月</a> </li>
    <li style="list-style-type:none"><a href="?do=invoice_list&period=3">5,6月</a> </li>
    <li style="list-style-type:none"><a href="?do=invoice_list&period=4">7,8月</a> </li>
    <li style="list-style-type:none"><a href="?do=invoice_list&period=5">9,10月</a> </li>
    <li style="list-style-type:none"><a href="?do=invoice_list&period=6">11,12月</a></li>
</div>
<table class="table text-center">
     <tr>
        <td>發票號碼</td>
        <td>消費日期</td>
        <td>消費金額</td>
        <td>操作</td>

     </tr>
     <?php
     //從資料庫提取的資料放入table
    foreach($rows as $row){

    
    ?>
     <tr>
        <td><?=$row['code'].$row['number'];?></td>
        <td><?=$row['date'];?></td>
        <td><?=$row['payment'];?></td>


        <td>
            <button class="btn btn-sm btn-primary">
                <a class="text-white" href="?do=edit_invoice&id=<?=$row['id'];?>">編輯</a>
            </button>
            <button class="btn btn-sm btn-danger">
                <a  class ="text-white" href="?do=del_invoice&id=<?=$row['id'];?>">刪除</a>
            </button>
            <button class="btn btn-sm btn-success">
                <a  class ="text-white" href="?do=award&id=<?=$row['id'];?>">對獎</a>
            </button>
        </td>
     
     </tr>
     <?php
     
    }


     ?>

</table>

<?php
        //印出分頁列表
        echo "<div class='row justify-content-around'>";
        for($i=1;$i<=$pages;$i++){
            echo "<a href='?do=invoice_list&pages=$i&period={$_GET['period']}'>$i</a>";
        }
?>