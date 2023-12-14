<?php 
  session_start();
  include_once "config.php";
  $uid=$_SESSION['unique_id'];
  if(!isset($_SESSION['unique_id'])){
    header("location: ../../Miniproject/Home/login.php");
  }

  $sql = "SELECT * FROM service_center WHERE unique_id = '$uid'";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $user["fname"]; ?></title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Header -->
  <header class="sub-header">
    <div class="left-content">
      <p>Welcome to <?php echo $user["device"]; ?> service center. We provide quality services for your devices.</p>
    </div>
    <div class="right-icons">
      <ul>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="logout.php?logout_id=<?php  echo $uid;?>">Logout</a></a></li>
      </ul>
    </div>
  </header>

  <!-- Navigation -->
  <div class="background-header">
    <div class="header-area">
        <div class="logo"><?php echo $user["fname"]; ?></div>
      <nav class="main-nav clearfix">
       
        <div class="menu-trigger"></div>
        <ul class="nav">
            <li><a href="#" style="color:#0575E6;">Home</a></li>
            <li><a href="chat.php?unique_id=<?php echo $user["unique_id"]; ?>">Chats</a>
</li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">FAQ</a></li>
        </ul>
      </nav>
    </div>
  </div>


  <?php 
  
  if ($user["device"] == "television"){

  ?>


<section class="service-center-section">
  <div class="service-card">
    <img src="../images/company/tv_img.png" alt="TV 1">
    <h3 class="service-title">TV Repair</h3>
    <p class="service-description">We specialize in TV repair services for a wide range of brands and models. Whether you're experiencing a blank screen, audio issues, or connectivity problems, our skilled technicians can diagnose and fix the problem.</p>
  </div>

  <div class="service-card" >
    <img src="../images/company/tv_img.png" alt="TV 2">
    <h3 class="service-title">TV Installation</h3>
    <p class="service-description">Let our professionals handle your TV installation to ensure a seamless and hassle-free experience. We'll mount your TV securely, connect all necessary cables, and optimize the settings for optimal picture and sound quality.</p>
  </div>

  <div class="service-card">
    <img src="../images/company/tv_img.png" alt="TV 3">
    <h3 class="service-title">TV Maintenance</h3>
    <p class="service-description">Keep your TV running smoothly with regular maintenance. Our services include cleaning, software updates, and calibration to maintain optimal performance and extend the lifespan of your TV.</p>
  </div>
</section>


<?php 

  }
  
 elseif  ($user["device"] == "computer"){

  ?>


<section class="service-center-section">
  <div class="service-card" style="background-color: #fff;">
    <img src="../images/company/image.avif" alt="Computer 1">
    <h3 class="service-title">Computer Repair</h3>
    <p class="service-description">We offer comprehensive computer repair services, including hardware diagnostics, software troubleshooting, virus removal, and data recovery. Our skilled technicians will get your computer back up and running in no time.</p>
  </div>

  <div class="service-card" style="background-color: #fff;">
    <img src="../images/company/image.avif" alt="Computer 2">
    <h3 class="service-title">Computer Upgrades</h3>
    <p class="service-description">Upgrade your computer's performance and capabilities with our professional upgrade services. Whether it's increasing RAM, adding storage, or installing a faster processor, we've got you covered.</p>
  </div>

  <div class="service-card" style="background-color: #fff;">
    <img src="../images/company/image.avif" alt="Computer 3">
    <h3 class="service-title">Computer Maintenance</h3>
    <p class="service-description">Keep your computer in top shape with regular maintenance. We offer services such as hardware cleaning, software optimization, and system updates to ensure your computer runs smoothly and efficiently.</p>
  </div>
</section>


<?php 

  }
  
 elseif  ($user["device"] == "smartphone"){

  ?>


<section class="developers-section">

<section class="service-center-section">
  <div class="service-card">
    <img src="../images/company/image2.png" alt="Smartphone 1">
    <h3 class="service-title">Smartphone Repair</h3>
    <p class="service-description">Our expert technicians provide reliable and efficient smartphone repair services. Whether it's a cracked screen, battery replacement, or software issues, we've got you covered.</p>
  </div>

  <div class="service-card">
    <img src="../images/company/image2.png" alt="Smartphone 2">
    <h3 class="service-title">Smartphone Accessories</h3>
    <p class="service-description">Discover a wide range of high-quality smartphone accessories to enhance your device's functionality and protection. From cases and screen protectors to chargers and headphones, we have it all.</p>
  </div>

  <div class="service-card">
    <img src="../images/company/image2.png" alt="Smartphone 3">
    <h3 class="service-title">Smartphone Upgrades</h3>
    <p class="service-description">Upgrade your smartphone with the latest hardware and software enhancements. Our technicians can help you optimize your device's performance and ensure it stays up to date.</p>
  </div>
</section>

</section>

<?php 

  }
  
  ?>

<section class="section-contact">
  <h2>Contact Us</h2>
  <p>Feel free to reach out to us for any inquiries or to schedule an appointment.</p>
  <div class="contact-form">
    <form>
      <input type="text" placeholder="Your Name">
      <input type="email" placeholder="Your Email">
      <textarea placeholder="Your Message"></textarea>
      <input type="submit" value="Send Message">
    </form>
  </div>
</section>



  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">
      <p>&copy; 2023 Service Center. All rights reserved.</p>
    </div>
  </footer>
</body>

</html>
<?php
} else {
    echo "No user found.";
}

?>





