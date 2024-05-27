<?php include "includes/db.php" ?>

<?php include "includes/head.php" ?>

  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->
  <?php include "includes/navigation.php" ?>


<?php 

if(isset($_POST['artisan_create'])){

$artist = isset($_POST['artist']) ? 1 : 0;
$craftsmen = isset($_POST['craftsmen']) ? 1 : 0;

$artisan_brandname = $_POST['artisan_brandname'];
$artisan_firstname = $_POST['artisan_firstname'];
$artisan_lastname = $_POST['artisan_lastname'];
$artisan_username = $_POST['artisan_username'];
$artisan_email = $_POST['artisan_email'];
$artisan_password = $_POST['artisan_password'];
$artisan_mobile = $_POST['artisan_mobile'];
$artisan_phone = $_POST['artisan_phone'];

$artisan_facebook = $_POST['artisan_facebook'];
$artisan_instagram = $_POST['artisan_instagram'];
$artisan_tiktok = $_POST['artisan_tiktok'];
$artisan_twitter = $_POST['artisan_twitter'];
$artisan_youtube = $_POST['artisan_youtube'];


$artisan_address1 = $_POST['artisan_address1'];
$artisan_address2 = $_POST['artisan_address2'];
$artisan_zipcode = $_POST['artisan_zipcode'];
$country = $_POST['country'];
$state = $_POST['state'];

if(!empty($artisan_brandname) && !empty($artisan_firstname) && !empty($artisan_username) && !empty($artisan_email) && !empty($artisan_password) && !empty($artisan_mobile) && !empty($artisan_address1) && !empty($artisan_zipcode)){

  //clean inputs
  $artisan_brandname = mysqli_real_escape_string($connection, $artisan_brandname);
  $artisan_firstname = mysqli_real_escape_string($connection, $artisan_firstname);
  $artisan_lastname = mysqli_real_escape_string($connection, $artisan_lastname);
  $artisan_username = mysqli_real_escape_string($connection, $artisan_username);
  $artisan_email = mysqli_real_escape_string($connection, $artisan_email);
  $artisan_password = mysqli_real_escape_string($connection, $artisan_password);
  $artisan_mobile = mysqli_real_escape_string($connection, $artisan_mobile);
  $artisan_phone = mysqli_real_escape_string($connection, $artisan_phone);
  $artisan_facebook = mysqli_real_escape_string($connection, $artisan_facebook);
  $artisan_instagram = mysqli_real_escape_string($connection, $artisan_instagram);
  $artisan_tiktok = mysqli_real_escape_string($connection, $artisan_tiktok);
  $artisan_twitter = mysqli_real_escape_string($connection, $artisan_twitter);
  $artisan_youtube = mysqli_real_escape_string($connection, $artisan_youtube);
  $artisan_address1 = mysqli_real_escape_string($connection, $artisan_address1);
  $artisan_address2 = mysqli_real_escape_string($connection, $artisan_address2);
  $artisan_zipcode = mysqli_real_escape_string($connection, $artisan_zipcode);

  //encrypt password
  $artisan_password = password_hash($artisan_password, PASSWORD_BCRYPT);

  
  // validate inputs 
  $query = "INSERT INTO artisans (is_artist, is_craftsmen, artisan_brand, artisan_firstname, artisan_lastname,
  artisan_username, artisan_email, artisan_password, artisan_mobile, artisan_phone, artisan_facebook, 
  artisan_instagram, artisan_tiktok, artisan_twitter, artisan_youtube, artisan_address1, artisan_address2,
  artisan_zipcode, artisan_country, artisan_state) ";

  $query .= "VALUES ('{$artist}' , '{$craftsmen}' , '{$artisan_brandname}' , '{$artisan_firstname}' ,
   '{$artisan_lastname}' , '{$artisan_username}' , '{$artisan_email}' , '{$artisan_password }' , '{$artisan_mobile}',
   '{$artisan_phone}', '{$artisan_facebook}', '{$artisan_instagram}', '{$artisan_tiktok}',
   '{$artisan_twitter}', '{$artisan_youtube }', '{$artisan_address1}', '{$artisan_address2}', '{$artisan_zipcode}',
   '{$country}', '{$state }')";

  $artisan_registration_query = mysqli_query($connection, $query);
  if(!$artisan_registration_query){die("Query Failed" . mysqli_error($connection));}
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
          <input type="text" placeholder="Brand Name*" name="artisan_brandname" />
          <input type="text" placeholder="First Name*" name="artisan_firstname" />
          <input type="text" placeholder="Last Name*" name="artisan_lastname" />
          <input type="text" placeholder="User Name*" name="artisan_username" />
          <input type="email" placeholder="Email*" name="artisan_email" />
          <input type="password" placeholder="Password*" name="artisan_password" />
          <input type="text" placeholder="Mobile*" name="artisan_mobile" />
          <input type="text" placeholder="Phone*" name="artisan_phone" />
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
          <input type="text" placeholder="Address 1*" name="artisan_address1" />
          <input type="text" placeholder="Address 2*" name="artisan_address2" />
          <input type="text" placeholder="Zipcode*" name="artisan_zipcode" />
          <div class="select-container col-12">
            <select name="country" id="country_id" class="col-6">
              <option value="1">Country*</option>
              <option value="2">Egypt*</option>
            </select>

            <select name="state" id="state_id" class="col-6">
              <option value="1">State*</option>
              <option value="2">Cairo</option>
              <option value="3">Alexandria</option>
              <option value="4">Port Said</option>
              <option value="5">Suez</option>
              <option value="6">Damietta</option>
              <option value="7">Ismailia</option>
              <option value="8">Kafr El Sheikh</option>
              <option value="9">Al Gharbiyah</option>
              <option value="10"> Al Monufiyah</option>
              <option value="11">Al Daqahliyah</option>
              <option value="12"> Al Sharqiyah</option>
              <option value="13">Al Qalyubiyah</option>
              <option value="14">Al Menofiyah</option>
              <option value="15">Giza</option>
              <option value="16">Al Fayyum</option>
              <option value="17">Bani Swaif</option>
              <option value="18">Minya</option>
              <option value="19">Assiut</option>
              <option value="20">Sohag</option>
              <option value="21">Qena</option>
              <option value="22">Luxor</option>
              <option value="23">Aswan</option>
              <option value="24">Red Sea</option>
              <option value="25">New Valley</option>
              <option value="26">Mersa Matruh</option>
              <option value="27">North Sinai</option>
              <option value="28">South Sinai</option>
            </select>
          </div>
        </div>

        <input type="submit" name="artisan_create" value="Create" class="btn artisan-register-btn" style="border:0;">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </input>
        <p class="message">Already registered? <a href="login.html">Sign In</a></p>
      </form>
    </div>
  </main>

  <?php include "includes/footer.php" ?>
  <script src="./javascript/Home.js" charset="UTF-8"></script>
  <?php include "includes/closingtags.php" ?>