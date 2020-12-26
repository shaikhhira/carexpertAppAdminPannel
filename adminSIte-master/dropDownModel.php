<?php

class main{
    protected $pdo;
    

    function __construct(){
        $database="./data.php";
        include_once($database);
        $db=new Database();
        $this->pdo=$db->connect();
        $this->dropDownModel();
        
    }


    


    private function onDestroy(){
        $this->pdo=null;
        exit();
    } 

    private function dropDownModel(){


        if(isset($_POST['bid'])){
            $selectBrand=("select * from MODELS where BID = ".$_POST['bid']);
            $state=$this->pdo->prepare($selectBrand);
            $state->execute();
            $result=$state->fetchAll(PDO::FETCH_ASSOC);
            
            if($state){
                echo json_encode($result);
                $this->onDestroy();
            }else{
                echo $pdo->error;
                echo "fail";
                $this->onDestroy();
            }
        }
    }
}
new main();

?>


