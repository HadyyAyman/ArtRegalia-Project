<?php
ob_start(); // Start output buffering
include "includes/db.php";
session_start();
?>
<?php include "includes/head.php"; ?>
  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->
  <?php include "includes/navigation.php"; ?>




<?php

if (isset($_POST['login'])) {

  // Capture the form data
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Clean the input data
  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);

  // Initialize variables to track login status
  $login_success = false;
  $user_type = '';

  // Check in users table
  $query = "SELECT * FROM users WHERE username = '{$username}'";
  $result = mysqli_query($connection, $query);
  if (!$result){
    die("QUERY FAILED" . mysqli_error($connection));
  }

  if (mysqli_num_rows($result) > 0) {
    // User found in users table
    while($row = mysqli_fetch_assoc($result)){
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstName'];
        $db_user_lastname = $row['user_lastName'];
        $db_user_role = $row['user_role'];
    }

    // Verify the password
    if (password_verify($password, $db_user_password)) {
        // Set session variables
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['username'] = $db_username;
        $_SESSION['user_firstName'] = $db_user_firstname;
        $_SESSION['user_lastName'] = $db_user_lastname;
        $_SESSION['user_type'] = $db_user_role; // 'admin' or 'user'
        $login_success = true;
        $user_type = $db_user_role;

        header("Location: index.php");
        exit(); // Ensure the script stops executing after redirection
    } else {
        $login_success = false;
    }
} else {
    // Check in artisans table
    $query = "SELECT * FROM artisans WHERE artisan_username = '{$username}'";
    $result = mysqli_query($connection, $query);
    if (!$result){
        die("QUERY FAILED" . mysqli_error($connection));
    }

    if (mysqli_num_rows($result) > 0) {
        // User found in artisans table
        while($row = mysqli_fetch_assoc($result)){
            $db_user_id = $row['artisan_id'];
            $db_username = $row['artisan_username'];
            $db_user_brand = $row['artisan_brand'];
            $db_user_password = $row['artisan_password'];
            $db_user_role = ($row['is_artist'] == 1) ? 'artist' : 'craftsman';
        }

        // Verify the password
        if (password_verify($password, $db_user_password)) {
            // Set session variables
            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['username'] = $db_username;
            $_SESSION['artisan_brand'] = $db_user_brand;
            $_SESSION['user_type'] = $db_user_role; // 'artist' or 'craftsman'
            $login_success = true;
            $user_type = $db_user_role;

            header("Location: index.php");
            exit(); // Ensure the script stops executing after redirection
        } else {
            $login_success = false;
        }
    } else {
        $login_success = false;
    }
}

if (!$login_success) {
    
    $error_message = "Invalid Information";
    
}
}

?>

  <main class="login-page">
    <div class="form">
      <form class="login-form" method="POST">
        <h2 style="color:var(--color2);"> Login</h2>
        <?php
            if (isset($error_message)) {
                echo "<p style='color:red;'>$error_message</p>";
            }
            ?>
        <input type="text" placeholder="Username" name="username" required />
        <input type="password" placeholder="Password" name="password" required />
        <input class="btn" type="submit" value="Sign-in" name="login" style="border:0;">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </input>
        <p class="message">Not registered? <a href="Registration.php">Create an account</a></p>
      </form>
    </div>
  </main>

  <?php include "includes/footer.php" ?>
  <script src="./javascript/Home.js" charset="UTF-8"></script>
  <?php include "includes/closingtags.php" ?>

  <?php
ob_end_flush(); // End output buffering and flush the output
?>