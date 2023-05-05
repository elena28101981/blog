<?php

require 'config/constants.php';

//get back from data if there was registration error
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

//delete signup data session
unset($_SESSION['sign-up-data']);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP & mySQL Blog application with Admin Panel</title>
    <link rel="stylesheet" href="./css/style.css" />
    <!--Iconscount CDN-->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!--Google Fonts Montserrat-->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <section class="form__section">
      <div class="container form__section-container">
        <h2>Sign Up</h2>
        <?php
          if(isset($_SESSION['signup'])) : ?> 
            <div class="alert__message error">
              <p>
                <?= $_SESSION['signup'];
                unset($_SESSION['signup']);
                ?>
              </p>
            </div>
            <?php endif ?>
            
        <form action="<?=ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
          <input type="text" name="firstname" value="<?=  $firstname ?>" placeholder="First Name" />
          <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name" />
          <input type="text" name="username" value="<?= $username ?>" placeholder="Username" />
          <input type="email" name="email" value="<?= $email ?>" placeholder="Email" />
          <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create password" />
          <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm password" />

          <div class="form__control">
            <label for="avatar">User Avatar</label>
            <input type="file" name="avatar" id="avatar" />
          </div>
          <button type="submit" name="submit" class="btn">Sign Up</button>
          <small>
            Alredy have an account? <a href="./signin.php">Sign In</a>
          </small>
        </form>
      </div>
    </section>
  </body>
</html>
