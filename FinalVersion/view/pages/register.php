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
            if(isset($error)){
               foreach($error as $error){
                  echo '<span class="error-msg">'.$error.'</span>';
               };
            };
         ?>
         <div class="form-group">
            <input type="text" name="first_name" style="display: inline-block; width: 48%;" required placeholder="First name" autocomplete="off">
            <input type="text" name="last_name" style="display: inline-block; width: 48%; margin-left: 10px;" required placeholder="Last name" autocomplete="off">
         </div>
         <input type="email" name="email" required placeholder="Enter your email" autocomplete="off">
         <input type="password" name="password" required placeholder="Enter your password" autocomplete="off">
         <input type="password" name="cpassword" required placeholder="Confirm your password" autocomplete="off">

         <input type="submit" name="submit" value="register now" class="form-btn">
         <p>already have an account? <a href="./login.php">login now</a></p>
      </form>
      
   </div>

</body>
</html>