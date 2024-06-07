<?php
ob_start(); // Start output buffering
include "includes/db.php";
?>

<?php include "includes/head.php"; ?>

  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->
  <?php include "includes/navigation.php"; ?>


<?php 

if(isset($_POST['artisan_create'])){

// common users table data
$user_gender = $_POST["gender"];
$user_firstname = $_POST["user_firstname"];
$user_lastname = $_POST["user_lastname"];
$username = $_POST["username"];
$user_email = $_POST["user_email"];
$user_password = $_POST["user_password"];
$user_address = $_POST['user_address'];
$user_phone = $_POST['user_phone'];
  
// specific artisan table data
$artist = isset($_POST['artist']) ? 1 : 0;
$craftsmen = isset($_POST['craftsmen']) ? 1 : 0;
$brand_name = $_POST['brand_name'];
$artisan_facebook = $_POST['artisan_facebook'];
$artisan_instagram = $_POST['artisan_instagram'];
$artisan_tiktok = $_POST['artisan_tiktok'];
$artisan_twitter = $_POST['artisan_twitter'];
$artisan_youtube = $_POST['artisan_youtube'];
$country = $_POST['country'];
$state = $_POST['state'];

if(!empty($brand_name) && !empty($user_firstname) && !empty($username) && !empty($user_email) && !empty($user_password) && !empty($user_address) ){

  //clean inputs
  $brand_name = mysqli_real_escape_string($connection, $brand_name);
  $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
  $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
  $username = mysqli_real_escape_string($connection, $username);
  $user_email = mysqli_real_escape_string($connection, $user_email);
  $user_password = mysqli_real_escape_string($connection, $user_password);

  $user_phone = mysqli_real_escape_string($connection, $user_phone);
  $artisan_facebook = mysqli_real_escape_string($connection, $artisan_facebook);
  $artisan_instagram = mysqli_real_escape_string($connection, $artisan_instagram);
  $artisan_tiktok = mysqli_real_escape_string($connection, $artisan_tiktok);
  $artisan_twitter = mysqli_real_escape_string($connection, $artisan_twitter);
  $artisan_youtube = mysqli_real_escape_string($connection, $artisan_youtube);
  $user_address = mysqli_real_escape_string($connection, $user_address);


  //encrypt password
  $user_password = password_hash($user_password, PASSWORD_BCRYPT);

  
   // insert user data
   $query = "INSERT INTO users (user_gender, user_email, user_firstname, user_lastname, username, user_password, user_address, user_phone) ";
   $query .= "VALUES ('{$user_gender}', '{$user_email}', '{$user_firstname}', '{$user_lastname}', '{$username}', '{$user_password}', '{$user_address}' , '{$user_phone}')";
   $user_registration_query = mysqli_query($connection, $query);

   if (!$user_registration_query) {
       die("User Query Failed" . mysqli_error($connection));
   }

   // get the ID of the inserted user
   $user_id = mysqli_insert_id($connection);

   // insert artisan data
   $artisan_query = "INSERT INTO artisans (artisan_ID, is_artist, is_craftsmen, brand_name, artisan_facebook, artisan_instagram, artisan_tiktok, artisan_twitter, artisan_youtube, artisan_country, artisan_state) ";
   $artisan_query .= "VALUES ({$user_id}, '{$artist}', '{$craftsmen}', '{$brand_name}', '{$artisan_facebook}', '{$artisan_instagram}', '{$artisan_tiktok}', '{$artisan_twitter}', '{$artisan_youtube}', '{$country}', '{$state}') ";
   $artisan_registration_query = mysqli_query($connection, $artisan_query);

   if (!$artisan_registration_query) {
       die("Artisan Query Failed" . mysqli_error($connection));
   }

   $message = "<script> alert('Registration has been submitted.')</script>";

   }else {
     $message = "Fields can not be empty";
   }

 }else{
   $message = "";
 }

?>


  <main class="login-page2">
    <div class="form artisan-form">
      <form class="artisan-register" method="POST">
      <?php echo "<h5 class='text-center'>$message</h5>"; ?>
        <h2>Register</h2>
        <div class="checkbox-container">

          <div class="checkbox">
            <input type="checkbox" id="artist-id" name="artist" value="Artist">
            <label for="artist-id">Artist</label>
          </div>
          <div class="checkbox">
            <input type="checkbox" id="Craftsmen-id" name="craftsmen" value="Craftsmen">
            <label for="Craftsmen-id">Craftsmen</label>
          </div>

        </div>

        <div class="Grid-Container">
        <select name="gender" id="registration-gender">
          <option value="0">Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
          <input type="text" placeholder="Brand Name*" name="brand_name" />
          <input type="text" placeholder="First Name*" name="user_firstname" />
          <input type="text" placeholder="Last Name*" name="user_lastname" />
          <input type="text" placeholder="User Name*" name="username" />
          <input type="email" placeholder="Email*" name="user_email" />
          <input type="password" placeholder="Password*" name="user_password" />
          <input type="text" placeholder="Phone*" name="user_phone" />
        </div>

        <hr style="border-color: #fff;" class="mb-4">

        <h5>Social Media</h5>
        <div class="Grid-Container">
          <input type="text" placeholder="Facebook*"  name="artisan_facebook" />
          <input type="text" placeholder="Instagram*"  name="artisan_instagram" />
          <input type="text" placeholder="Tiktok*"  name="artisan_tiktok" />
          <input type="text" placeholder="Twitter*"  name="artisan_twitter" />
          <input type="text" placeholder="Youtube*"  name="artisan_youtube" />
        </div>

        <hr style="border-color: #fff;" class="mb-4">
        <h5>Address</h5>
        <div class="Grid-Container">
          <input type="text" placeholder="Address *" name="user_address" />
          <div class="select-container col-12">
            <select name="country" id="country_id" class="col-6">
              <option value="1">Country</option>
              <option value="Egypt">Egypt</option>
            </select>

            <select name="state" id="state_id" class="col-6">
              <option value="1">State</option>
              <option value="Cairo">Cairo</option>
              <option value="Alexandria">Alexandria</option>
              <option value="Port Said">Port Said</option>
              <option value="Suez">Suez</option>
              <option value="Damietta">Damietta</option>
              <option value="Ismailia">Ismailia</option>
              <option value="Kafr El Sheikh">Kafr El Sheikh</option>
              <option value="Al Gharbiyah">Al Gharbiyah</option>
              <option value=" Al Monufiyah">Al Monufiyah</option>
              <option value="Al Daqahliyah">Al Daqahliyah</option>
              <option value="Al Sharqiyah">Al Sharqiyah</option>
              <option value="Al Qalyubiyah">Al Qalyubiyah</option>
              <option value="Al Menofiyah">Al Menofiyah</option>
              <option value="Giza">Giza</option>
              <option value="Al Fayyum">Al Fayyum</option>
              <option value="Bani Swaif">Bani Swaif</option>
              <option value="Minya">Minya</option>
              <option value="Assiut">Assiut</option>
              <option value="Sohag">Sohag</option>
              <option value="Qena">Qena</option>
              <option value="Luxor">Luxor</option>
              <option value="Aswan">Aswan</option>
              <option value="Red Sea">Red Sea</option>
              <option value="New Valley">New Valley</option>
              <option value="Mersa Matruh">Mersa Matruh</option>
              <option value="North Sinai">North Sinai</option>
              <option value="South Sinai">South Sinai</option>
            </select>
          </div>
        </div>

        <input type="submit" name="artisan_create" value="Create" class="btn artisan-register-btn" style="border:0;">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </input>
        <p class="message">Already registered? <a href="login.php">Sign In</a></p>
      </form>
    </div>
  </main>

  <?php include "includes/footer.php" ?>
  <script src="./javascript/Home.js" charset="UTF-8"></script>
  <?php include "includes/closingtags.php" ?>