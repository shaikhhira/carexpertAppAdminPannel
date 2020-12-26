<?php

class main{
    protected $pdo;
    

    function __construct(){
        $database="./data.php";
        include_once($database);
        $db=new Database();
        $this->pdo=$db->connect();
        $this->dropDownSolution();
        
    }


    


    private function onDestroy(){
        $this->pdo=null;
        exit();
    } 

    private function dropDownSolution(){
        $selectBrand="select * from SOLUTIONS";
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


