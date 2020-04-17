<?php
    include_once 'header.php';
?>

   <section class="main-container">
      <div class="main-wrapper">
          <h2>Sign up</h2>
          <form class="signup-form" action="includes/signup.inc.php" method="POST">
              <input type="text" name="fullName" placeholder="Full Name">
              <input type="text" name="email" placeholder="E-mail">
              <input type="date" name="dob" placeholder="Date of birth">
              <h4>Select Gender</h4><select id="gender" name="gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
              </select>
              <input type="text" name="username" placeholder="Username">
              <input type="password" name="userpwd" placeholder="Password">
              <input type="text" name="postaladd" placeholder="Postal Address">
              <input type="number" name="postcode" placeholder="Postcode">
              <button type="submit" name="submit">Sign up</button>
          </form>
      </div>
   </section>

   <?php
    include_once 'footer.php';
?>