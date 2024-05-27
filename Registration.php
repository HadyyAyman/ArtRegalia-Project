<?php include "includes/db.php" ?>

<?php include "includes/head.php" ?>
  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->
  <?php include "includes/navigation.php" ?>


  <?php 

  if(isset($_POST['create'])){

    // get user inputs
    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $user_username = $_POST["user_username"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];

    if(!empty($user_firstname) && !empty($user_username) && !empty($user_email) && !empty($user_password)){

      //clean inputs
      $user_firstname = mysqli_real_escape_String($connection, $user_firstname);
      $user_username = mysqli_real_escape_String($connection, $user_username);
      $user_email = mysqli_real_escape_String($connection, $user_email);
      $user_password = mysqli_real_escape_String($connection, $user_password);

      //encrypt password
      $user_password = password_hash($artisan_password, PASSWORD_BCRYPT);

      //validate inputs
      $query = "INSERT INTO users (user_firstName, user_lastName, username, user_email, user_password, user_role) ";
      $query .= "VALUES ('{$user_firstname}', '{$user_lastname}', '{$user_username}', '{$user_email}', '{$user_password}', 'User' )";
      $registration_query = mysqli_query($connection, $query);
      if(!$registration_query){die("Query Failed" . mysqli_error($connection));}
      $message = "<script> alert('Registration has been submitted.')</script>";

    }else {
      $message = "Fields can not be empty";
    }

  }else{
    $message = "";
  }

  ?>


  <main class="login-page">
    <div class="form">
    <?php echo "<h5 class='text-center'>$message</h5>"; ?>
      <form class="register-form" method="POST">
        <h2 style="color:var(--color2);">Register</h2>
        <input type="text" name="user_firstname" placeholder="First Name *" />
        <input type="text" name="user_lastname" placeholder="Last Name*"  />
        <input type="text" name="user_username" placeholder="Username *" />
        <input type="email" name="user_email" placeholder="Email *" />
        <input type="password" name="user_password" placeholder="Password *" />
        <input type="submit" class="btn" name="create" value="Create" style="border:none;">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </input>
        <p class="message">Already registered? <a href="login.php">Sign In</a></p>
        <p class="message">Register as artisan? <a href="artisan-registration.php">Sign Up</a></p>
      </form>
    </div>
  </main>

  <?php include "includes/footer.php" ?>
  <script src="./javascript/Home.js" charset="UTF-8"></script>

  <?php include "includes/closingtags.php" ?>