<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<style>


* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  background-color: #333;
  font-family: Arial, sans-serif;
  opacity: 1;
  animation: fadeInOut 1s linear;
}

@keyframes fadeInOut {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0.5;
  }
  100% {
      opacity: 1;
    }
}

.wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 95vh;
  background-color: #333;
}

.form {
  width: 100%;
  margin-top: 10%;
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
  box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;
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
  padding: 10px;
  font-size: 16px;
  font-weight: bold;
  color: #fff;
  border: none;
  background: #0575E6;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #021B79, #0575E6);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #021B79, #0575E6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  border-radius: 5px;
  cursor: pointer;
}

.form .link {
  font-size: 14px;
  color: #fff;
  text-align: center;
  margin-top: 20px;
}

.form .error-text {
  font-size: 14px;
  color: linear-gradient(to right, #021B79, #0575E6);
  margin-bottom: 10px;
}
.form .link a {
color: #1ea1f1;
}
  </style>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>SIGNUP</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input style="font-size:smaller;color:#fff" type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" >
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
