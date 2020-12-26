<?php

class main{
    protected $pdo;
    

    function __construct(){
        $database="./data.php";
        include_once($database);
        $db=new Database();
        $this->pdo=$db->connect();
        $this->dropDownBrand();
        
    }


    


    private function onDestroy(){
        $this->pdo=null;
        exit();
    } 

    private function dropDownBrand(){
        $selectBrand="select * from BRANDS";
        $state=$this->pdo->prepare($selectBrand);
        $state->execute();
        if($state){
            $result=$state->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(array('data'=>$result));
            $this->onDestroy();
        }else{
            echo $pdo->error;
            echo "fail";
            $this->onDestroy();
        }
    }
}
new main();

?>


