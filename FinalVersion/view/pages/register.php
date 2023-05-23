<?php
include('../../controller/authentification.php');
if (isset($_POST["submit"])) {
   $first_name = $_POST["first_name"];
   $last_name = $_POST["last_name"];
   $date = $_POST["date"];
   $gender = $_POST["gender"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $cpassword = $_POST["cpassword"];
   if(AccountExist($email)){
    
      header('location:./register.php?error');
   }
   else{
      if ($password != $cpassword) {
         header('location:./register.php?Passworderror');
      }else{
        $rslt = createUser($first_name, $last_name, $date,   $gender,  $email,$password );
        if( $rslt ){
            header('location:./login.php?AccountCreated');
        }
        else{
         header('location:./register.php?SomethingWorong');
        }
         
      }
     
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Register-Page</title>
</head>
<body>
   
   <div class="form-container">

      <form action="" method="post">
         <h3>register now</h3>
         <?php
           if (isset($_GET['error'])) {
            echo '<span class="error-msg"> Account allready exist ! </span>';
          };
          if (isset($_GET['Passworderror'])) {
            echo '<span class="error-msg"> Check your password </span>';
          };
          if (isset($_GET['SomethingWorong'])) {
            echo '<span class="error-msg"> Something went wrong </span>';
          };
         ?>
         <div class="form-group">
            <input type="text" name="first_name" style="display: inline-block; width: 48%;" required placeholder="First name" autocomplete="off">
            <input type="text" name="last_name" style="display: inline-block; width: 48%; margin-left: 10px;" required placeholder="Last name" autocomplete="off">
         </div>
        
         <select  required name="gender"  id="">
         <option value="" disabled selected>Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
         </select>
         <input type="date" name="date" required  autocomplete="off">
         <input type="email" name="email" required placeholder="Enter your email" autocomplete="off">
         <input type="password" name="password" required placeholder="Enter your password" autocomplete="off">
         <input type="password" name="cpassword" required placeholder="Confirm your password" autocomplete="off">
       

         <input type="submit" name="submit" value="register now" class="form-btn">
         <p>already have an account? <a href="./login.php">login now</a></p>
      </form>
      
   </div>

</body>
</html>