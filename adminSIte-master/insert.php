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
            case "BRANDINSERT":
                $this->brandInsert();
                break;
            case "MODELINSERT":
                 $this->modelInsert();
                 break;
            case "ISSUEINSERT":
                $this->issueInsert();
                break;
            case "SOLUTIONINSERT":
                $this->solutionInsert();
                break;   
            case "MASTERINSERT":
                $this->masterInsert();
                break;                
        }
    }


    private function onDestroy(){
        $this->pdo=null;
        exit();
    } 

    
    private function brandInsert(){
        $res=new stdclass();
        $res->BRANDNAME=filter_input(INPUT_POST,"BRANDNAME");

        echo json_encode($res);
            
        $insertQuery="insert into brands(BRANDNAME)
        values(?)";
        $state=$this->pdo->prepare($insertQuery);
        $state->execute([
            "$res->BRANDNAME"
        ]);
        if($state){
            echo "done";
        }else{
            echo $pdo->error;
            echo "fail";
        }

    }

    private function modelInsert(){
        $res=new stdclass();
        $res->MODELNAME=filter_input(INPUT_POST,"MODELNAME");
        $res->BID=filter_input(INPUT_POST,"BID");

        echo json_encode($res);
            
        $insertQuery="insert into models(MODELNAME,BID)
        values(?,?)";
        $state=$this->pdo->prepare($insertQuery);
        $state->execute([
            "$res->MODELNAME","$res->BID"
        ]);
        if($state){
            echo "done";
        }else{
            echo $pdo->error;
            echo "fail";
        }

    }



    private function issueInsert(){
        $res=new stdclass();
        $res->ISSUENAME=filter_input(INPUT_POST,"ISSUENAME");

        echo json_encode($res);
            
        $insertQuery="insert into issues(ISSUENAME)
        values(?)";
        $state=$this->pdo->prepare($insertQuery);
        $state->execute([
            "$res->ISSUENAME"
        ]);
        if($state){
            echo "done";
        }else{
            echo $pdo->error;
            echo "fail";
        }

    }

    private function solutionInsert(){
        $res=new stdclass();
        $res->SOLUTIONNAME=filter_input(INPUT_POST,"SOLUTIONNAME");

        echo json_encode($res);
            
        $insertQuery="insert into solutions(SOLUTIONNAME)
        values(?)";
        $state=$this->pdo->prepare($insertQuery);
        $state->execute([
            "$res->SOLUTIONNAME"
        ]);
        if($state){
            echo "done";
        }else{
            echo $pdo->error;
            echo "fail";
        }

    }

    private function masterInsert(){
        $res=new stdclass();
        $res->BID=filter_input(INPUT_POST,"BID");
        $res->MID=filter_input(INPUT_POST,"MID");
        $res->IID=filter_input(INPUT_POST,"IID");
        $res->SID=filter_input(INPUT_POST,"SID");

        echo json_encode($res);
            
        $insertQuery="insert into MASTER(BID,MID,IID,SID)
        values(?,?,?,?)";
        $state=$this->pdo->prepare($insertQuery);
        $state->execute([
            $res->BID , $res->MID, $res->IID, $res->SID
        ]);
        if($state){
            echo "done";
        }else{
            echo $pdo->error;
            echo "fail";
        }

    }




}
new main();

?>