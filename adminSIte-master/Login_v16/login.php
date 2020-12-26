<?php

class main{
    protected $pdo;
    

    function __construct(){
        $database="../data.php";
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
            case "LOGIN":
                $this->login();
                break;
            case "LOGIN":
                $this->logout();
                break;    
            case "MODELCOUNT":
                 $this->modelCounting();
                 break;             
        }
    }

    private function onDestroy(){
        $this->pdo=null;
        exit();
    } 

    private function login(){
        $res=new stdclass();
        $res->LUSERNAME=Filter_input(INPUT_POST,"LUSERNAME");
        $res->LPASSWORD=Filter_input(INPUT_POST,"LPASSWORD");

        $selectQuery="select * from login 
                      where LUSERNAME='$res->LUSERNAME' and LPASSWORD='$res->LPASSWORD' ";
        $state=$pdo->prepare($updateQuery);
        $state->execute();
        if($state->rowCount()==1){
           echo "done";
           $this->onDestroy();
        }else{
            echo $pdo->error;
            echo "fail";
            $this->onDestroy();
            session_destroy();
        }
    }
    private function logout(){
        
        session_start();
        if(session_destroy()){
            echo "<script>alert('done')</script>";
        }
    }

  

}
new main();

?>