<?php
include('../../controller/authentification.php');
session_start();
if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  if (check_empty($email, $password)) {
    if (login($email, $password)) {
      $Role = GetRole($email, $password);
      $_SESSION['email'] = $email; 
      $_SESSION['role'] = $Role; 
      if ($Role == "USER") {
        header('location:./UserHomePage.php');
      } elseif ($Role = "Secraitaire") {
        // header('location:./login.php?error');
      }
    } else {
      header('location:./login.php?error');
    }
  } else {
    header('location:./login.php?missing');
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
  <title>Login-Page</title>
</head>

<body>


  <div class="form-container">
    <div class="llg">
      <img src="../assets/images/sports.png" alt="">
      <div class="logo">
        <h1>TETOUAN<span>SPORT</span></h1>
      </div>
    </div>
    <form action="" method="POST">
      <h3>login now</h3>
      <?php
      if (isset($_GET['missing'])) {
        echo '<span class="error-msg"> Please Fill All The Blanks </span>';
      };
      if (isset($_GET['error'])) {
        echo '<span class="error-msg"> Email Or Password is Incorrect ! </span>';
      };
      if (isset($_GET['AccountCreated'])) {
        echo '<span class="done-msg"> congratulation ! You have created an account </span>';
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">

      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="./register.php">register now</a></p>
    </form>

  </div>

</body>

</html>