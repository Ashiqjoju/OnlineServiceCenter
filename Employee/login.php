<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<?php include_once "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="path/to/font-awesome.min.css">
  <style>
  
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  height: 100%;
    opacity: 1;
    animation: fadeInOut 1s linear;
    background-color: #333; 
  }
  

.wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 75vh;
  padding-top: 10%;
  background-color: #333;
 }

.form {
  width: 100%;
  margin-top: 0;
  padding: 40px;

}

.form header {
  font-size: 24px;
  font-weight: bold;
  color: #fff;
  text-align: center;
  margin-bottom: 25px;
}

.form .field {
  margin-bottom: 20px;
}

.form .field label {
  display: block;
  font-size: 14px;
  font-weight: bold;
  color: #fff;
  margin-bottom: 5px;
}

.form .field input[type="text"],
.form .field input[type="password"] {
  position: relative;
  width: 100%;
  padding: 10px;
  font-size: 14px;
  color: #000;
  border: none;
  border-radius: 5px;
  box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;
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

  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.form .link {
  font-size: 14px;
  color: #fff;
  text-align: center;
  margin-top: 20px;
}

.form .link a {
color: #1ea1f1;
}

.form .error-text {
  font-size: 14px;
  color:#021B79;
  margin-bottom: 10px;
}

  </style>


<style>
  .gooey{
    position: absolute;
  top: 50%;
  left: 50%;
  width: 142px;
  height: 40px;
  margin: -20px 0 0 -71px;
  background-color: rgba(0, 0, 0, 0.8);
  border-radius: 10px;
  filter: contrast(20);
  }

  
  .dot{
    position: absolute;
    width: 16px;
    height: 16px;
    top: 12px;
    left: 15px;
    filter: blur(4px);
    background: #fff;
    border-radius: 50%;
    transform: translateX(0);
    animation: dot 2.8s infinite;
  }
  .dots{
    transform: translateX(0);
    margin-top: 12px;
    margin-left: 31px;
    animation: dots 2.8s infinite;
  }
    .span{
      display: block;
      float: left;
      width: 16px;
      height: 16px;
      margin-left: 16px;
      filter: blur(4px);
      background: #fff;
      border-radius: 50%;
  }

@keyframes dot{
  50%{
    transform: translateX(96px);
  }
}
@keyframes dots{
  50% {
    transform: translateX(-31px);
  }
}
  
    
  #loadingDiv {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
  }
  #overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    z-index: 9998;
  }
</style>

</head>
<body>
<div id="overlay"></div>

  <div class="wrapper">
    <section class="form login">
      <header>LOGIN</header>
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
          <input type="submit" name="submit" id="login" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
    </section>
  </div>
  <script src="path/to/font-awesome.min.js"></script>
</body>
</html>

<div id="loadingDiv">
  <div class="loading">
  <div class="gooey">
  <span class="dot"></span>
  <div class="dots">
    <span class="span"></span>
    <span class="span"></span>
    <span class="span"></span>
  </div>
</div>
  </div>
</div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>
     
  
<script>

document.getElementById("login").addEventListener("click", showLoading);

function showLoading() {
  var loadingDiv = document.getElementById("loadingDiv");
  var overlay = document.getElementById("overlay");
  loadingDiv.style.display = "block";
  overlay.style.display = "block";

  // Simulating a delay for demonstration purposes
  setTimeout(function() {
    loadingDiv.style.display = "none";
    overlay.style.display = "none";
  }, 1500);
}
</script>
