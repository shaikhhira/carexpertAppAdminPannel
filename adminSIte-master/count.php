<?php

class main{
    protected $pdo;
    

    function __construct(){
        $database="./data.php";
        include_once($database);
        $db=new Database();
        $this->pdo=$db->connect();
        $this->REQUEST();
        
    }

    private function REQUEST(){
        $req=filter_input(INPUT_POST,"REQUEST");
        if($req){
            $this->allFunctions($req);
        }else{
            $this->onDestroy();
        }
    }
    
    private function allFunctions($req){
        switch($req){
            case "BRANDCOUNT":
                $this->brandCounting();
                break;
            case "MODELCOUNT":
                 $this->modelCounting();
                 break;
            case "ISSUECOUNT":
                $this->issueCounting();
                break;
            case "SOLUTIONCOUNT":
                $this->solutionCounting();
                break;              
        }
    }

    private function onDestroy(){
        $this->pdo=null;
        exit();
    } 

    private function brandCounting(){
        $brandTotalNumber="select * from brands";
        $state=$this->pdo->prepare($brandTotalNumber);
        $state->execute();
        if($state){
            $brandTotal = json_encode($state->rowCount());
            echo $brandTotal;
            $this->onDestroy();
        }else{
            echo $this->pdo->error;
            echo "fail";
        }
    }

    private function modelCounting(){
        $modelTotalNumber="select * from models";
        $state=$this->pdo->prepare($modelTotalNumber);
        $state->execute();
        if($state){
            $modelTotal = json_encode($state->rowCount());
            echo $modelTotal;
            $this->onDestroy();
        }else{
            echo $this->pdo->error;
            echo "fail";
        }
    }

    private function issueCounting(){
        $issueTotalNumber="select * from issues";
        $state=$this->pdo->prepare($issueTotalNumber);
        $state->execute();
        if($state){
            $issueTotal = json_encode($state->rowCount());
            echo $issueTotal;
            $this->onDestroy();
        }else{
            echo $this->pdo->error;
            echo "fail";
        }
    }

    private function solutionCounting(){
        $solutionTotalNumber="select * from solutions";
        $state=$this->pdo->prepare($solutionTotalNumber);
        $state->execute();
        if($state){
            $solutionTotal = json_encode($state->rowCount());
            echo $solutionTotal;
            $this->onDestroy();
        }else{
            echo $this->pdo->error;
            echo "fail";
        }
    }
    
  

}
new main();

?>