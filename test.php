<?php 

    include_once "base.php";

    $row3=find3('invoices',['code'=>'CA', 'number'=>'29586435']);

    echo $row3['code'].$row3['number']."<hr>";

    function find3($table,$id){
        global $pdo;

        if(is_array($id)){
            foreach($id as $key => $value){

                $tmp[]=sprintf("`%s`='%s'",$key,$value);
                // $tmp[]="$key". "="."$value";
            }
            $row=$pdo->query("select * from $table where ".implode(" && ",$tmp))->fetch();
        }else {
            $row=$pdo->query("select * from $table where id='$id' ")->fetch();
        }
        
        return $row;
    }

    function all($table,...$arg){
        global $pdo;

        $sql="select * from $table";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                //製作在where後面句子的字串(陣列格式)
                if(!empty($arg[0])){
                    foreach($arg[0] as $key => $value){
                    
                        $tmp[]=sprintf("`%s`='%s'",$key,$value);

                    }
                    $sql=$sql." where ".implode(' && ',$tmp);
                }
            }else{
                //製作非陣列的語句接在$sql後面

                $sql=$sql.$arg[0];    

            }
        }
        if(isset($arg[1])){
            //製作接在最後面的句子字串
            $sql=$sql.$arg[1];
        }
        echo $sql."<br>";
        return $pdo->query($sql)->fetchAll();
    }

    all('invoices');
    echo "<hr>";
    all('invoices',['code'=>"AA",'period'=>6]);
    echo "<hr>";
    all('invoices',['code'=>"CA",'period'=>1],"order by date desc");
    echo "<hr>";
    all('invoices'," limit 5");
    echo "<hr>";

    function del ($table,$id){

        global $pdo;
        $sql="delete from $table where";
        if(is_array($id)){
            
            
            foreach($id as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
                
            }
            $sql=$sql.implode(" && ",$tmp);
        }else {
            $sql=$sql. " id='$id' ";
        }
        $row=$pdo->exec($sql);
        return $row;
    }

    del('invoices',120);


    function update($table,$id,$number){

        global $pdo;
        $sql="update $table SET number = '$number' ";

        foreach($id as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
            

        }
            $sql=$sql." where ".implode(" && ", $tmp);
            $row=$pdo->exec($sql);
            return $row;
    }

    update('invoices',['id'=>'130'],12345678);


    // INSERT INTO `table`(`id`,`name`) VALUES ( '12' , 'stanley' );
    // function insert(){

    //     $sql="insert into $table  number = '$number' ";



    // }



















    // echo "<pre>";
    // print_r(all('invoices')[0]);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($value);
    // echo "</pre>";

    // $row=find('invoices',"id='120'");

    // echo $row['code'].$row['number']."1<hr>";;

    // function find($table,$def){
    //     global $pdo;
    //     $row=$pdo->query("select * from $table where $def ")->fetch();

        
    //     return $row;

    // }

    // find2('invoices',"id='120'");

    // function find2($table,$def){
    //     global $pdo;
    //     $row=$pdo->query("select * from $table where $def ")->fetch();

    //     echo $row['code'].$row['number'];

    // }

?>