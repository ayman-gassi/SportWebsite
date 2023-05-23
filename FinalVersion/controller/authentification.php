<?php
   
   include('../../Model/User.php');

   $user = new User();
   
   function login($email, $password) {
       global $user;
       $result = $user->valide($email, $password);
       if ($result) {
           return true;
       } else {
           return false;
       }
   }
   
   function check_empty($email, $password) {
       if ($email != "" || $password != "") {
           return 1;
       } else {
           return 0;
       }
   }
   
   function GetRole($email, $password) {
       global $user;
       $role = $user->get_role($email, $password);
       return $role;
   }
   function AccountExist($email){
    global $user;
    $account = $user->get_email($email);
    return $account;
   }
   function createUser($first_name, $last_name, $date,   $gender,  $email,$password ){
    $NewUser = new User();
     $NewUser->User($first_name, $last_name, $date,   $gender,  $email,$password );
     return  $NewUser->flush_user($NewUser);
   
   }
   
?>