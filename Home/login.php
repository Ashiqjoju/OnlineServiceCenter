<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: ../../Miniproject/Company/service_center.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smartphone service center</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Header -->
  <header class="sub-header">
    <div class="left-content">
      <p>Welcome to our service center. We provide quality services for your devices.</p>
    </div>
    <div class="right-icons">
      <ul>
        <li><a href="login.php">Login</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="about.html">About Us</a></li>
      </ul>
    </div>
  </header>

  <!-- Navigation -->
  <div class="background-header">
    <div class="header-area">
        <div class="logo">Smartphone Service Center</div>
      <nav class="main-nav clearfix">
       
        <div class="menu-trigger"></div>
        <ul class="nav">
          <li><a href="index.html" >Home</a></li>
          <li><a href="computer.html" style="color:#0575E6">Computers</a></li>
          <li><a href="smartphone.html">Smartphones</a></li>
          <li><a href="telivison.html" >TVs</a></li>
          <li><a href="#">Downloads</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">FAQ</a></li>
        </ul>
      </nav>
    </div>
  </div>

  <style>
    
      
      .login-title {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
      }
      
      .login-form {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      
      .login-label {
        font-size: 16px;
        color: #666;
        margin-bottom: 5px;
        text-align: left;
        width: 100%;
      }
      
      .login-input {
        width: 300px;
        height: 30px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
      }
      
      .login-button {
        width: 120px;
        height: 40px;
        background-color: #4CAF50;
        color: #fff;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      
.wrapper {
  display: flex;
  align-items: center;
  justify-content: center;

 }

.form {
  width: 100%;
  margin-top: 0;
  padding: 40px;

}

.form header {
  font-size: 24px;
  font-weight: bold;
  color: #333;
  
  margin-bottom: 25px;
}

.form .field {
  margin-bottom: 20px;
}

.form .field label {
  display: block;
  font-size: 14px;
  font-weight: bold;
  color: #666;
  margin-bottom: 5px;
}

.form .field input[type="text"],
.form .field input[type="password"] {
  position: relative;
  width: 100%;
  padding: 10px;
  font-size: 14px;
  color: #ccc;
  border: none;
  border-radius: 5px;
}

.form .field input[type="password"] i {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  color: #000;
  cursor: pointer;
}

.form .field input[type="password"] i:hover {
  color: #4caf50;
}

.form .field input[type="submit"] {
  width: 100%;
  padding: 9px;
  font-size: 16px;
  font-weight: bold;
  color: #fff;
  background: #0575E6;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #021B79, #0575E6);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #021B79, #0575E6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.form .link {
  font-size: 14px;
  color: #000;
  text-align: center;
  margin-top: 20px;
}

.form .link a {
color: #1ea1f1;
}

.form .error-text {
  font-size: 14px;
  color: #ff6666;
  margin-bottom: 10px;
}
 .error-text1 {
  font-size: 14px;
  color: #ff6666;
  margin-bottom: 10px;
}
  </style>

  <!-- About Us Section -->
  <section class="developers-section">
    <section class="service-center-section" >
        <div class="service-card" style="margin: 80px 80px 80px 0; ">
    
          <div class="wrapper">
            <section class="form login">
              <header>Company Login</header>
              <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="field input">
                  <label>Email Address</label>
                  <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                  <label>Password</label>
                  <div class="password-input">
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                  </div>
                </div>
                <div class="field button">
                  <input type="submit" id="login" name="submit" value="Login">
                </div>
              </form>
              <br>
            </section>
          </div>
        </div>
      
        </div>
        
            <div class="service-card" style="margin: 80px 0 80px 80px;">
        
            <div class="wrapper">
            <section class="form login">
              <header>Admin Login</header>
              <form action="#" method="POST" id="customLoginForm" autocomplete="off">
                <div class="error-text1"></div>
                <div class="field input">
                  <label>Email Address</label>
                  <input type="text" name="email" id="customEmail" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                  <label>Password</label>
                  <div class="password-input">
                    <input type="password" name="password" id="customPassword" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                  </div>
                </div>
                <div class="field button">
                  <input type="submit" onclick="handleCustomSubmit()" name="submit" value="Login">
                </div>
              </form>
              <br>
            </section>
          </div>
            </div>
          
          </section> 
    
</section>


<script>


    // Function to handle form submission
    function handleCustomSubmit() {
      
      var email = document.getElementById("customEmail").value;
      var password = document.getElementById("customPassword").value;
      errorText1 = form.querySelector(".error-text1");

      if (email === "admin" && password === "5555") {
        errorText1.style.display = "block";
                errorText1.textContent = "done";
      } else {
        errorText1.style.display = "block";
                errorText1.textContent = "error";
      }
    }
  </script>
  </script>



  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">
      <p>&copy; 2023 Service Center. All rights reserved.</p>
    </div>
  </footer>
</body>

<script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>
</html>
