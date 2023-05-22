<?php
    global $user = new User() ;
    include('../../Model/User.php');
    function login ($email , $password){
        $result = $user->valide($email , $password);
        if ($result) {
            return true ;
        } else {
            return false ;
        }
    }
    function check_empty ($email , $password){
        if($email !="" || $password !=""){
            return 1 ;
        }
        else {
            return 0 ;
        }
    }
    function GetRole ($email , $password){
        $user->get_role($email , $password);
        return $user ;
    }
?>