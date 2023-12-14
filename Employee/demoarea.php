<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <style>
        body {
            background-color: #2b2b2b;
            color: #fff;
            font-family: Arial, sans-serif;
            font-size: 18px;
            text-align: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .typing-animation {
            overflow: hidden;
            border-right: 0.15em solid #fff;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: 0.15em;
            animation: typing 1s steps(40, end), blink-caret 0.75s step-end infinite;
        }
        
        @keyframes typing {
            from { width: 0; }
            to { width: 14em; }
        }
        
        @keyframes blink-caret {
            from, to { border-color: transparent; }
            50% { border-color: #fff; }
        }
        
        .input-container {
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 400px;
            width: 100%;
        }
        
        .input-container input[type="email"], .input-container input[type="password"] {
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            border: none;
            outline: none;
            margin-right: 10px;
            background-color: #333;
            color: #fff;
            width: 100%;
        }
        
        .input-container .arrow-icon {
            background-color: #444;
            border: none;
            outline: none;
            cursor: pointer;
            color: #fff;
            font-size: 24px;
            padding: 8px 12px;
            border-radius: 50%;
        }
        
        .label {
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        #error-message {
            color: red;
            margin-top: 10px;
        }
        
        @media screen and (max-width: 480px) {
            .input-container {
                flex-direction: column;
            }
            
            .input-container input[type="email"], .input-container input[type="password"] {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="typing-animation label">Enter your email</div>
    <div class="input-container">
        <input type="email" placeholder="Your email address" id="email-input">
        <button class="arrow-icon" onclick="submitEmail()">&#10148;</button>
    </div>
    <div class="typing-animation label" id="password-animation" style="display: none;">Enter your password</div>
    <div class="input-container" id="password-input" style="display: none;">
        <input type="password" placeholder="Your password" id="password-field">
        <button class="arrow-icon" onclick="submitPassword()">&#10148;</button>
    </div>
    <div id="error-message" style="display: none;"></div>
    
    <script>
        function submitEmail() {
            var email = document.getElementById('email-input').value;

            // Show the password input area and password typing animation
            document.getElementById('password-animation').style.display = 'block';
            document.getElementById('password-input').style.display = 'flex';
            
            // Store the entered email
            localStorage.setItem('email', email);
        }
        
        function submitPassword() {
            var password = document.getElementById('password-field').value;

            // Retrieve the stored email
            var email = localStorage.getItem('email');

            // Make an AJAX request to check the credentials
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var response = JSON.parse(this.responseText);

                        if (response.success) {
                            alert('Credentials are correct!');
                        } else {
                            displayErrorMessage('Invalid credentials!');
                        }
                    } else {
                        displayErrorMessage('An error occurred. Please try again later.');
                    }
                }
            };
            xhttp.open("POST", "php/validate.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password));
        }

        function displayErrorMessage(message) {
            var errorMessage = document.getElementById('error-message');
            errorMessage.textContent = message;
            errorMessage.style.display = 'block';
        }
    </script>
</body>
</html>
