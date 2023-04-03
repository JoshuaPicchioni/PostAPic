<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post A Pic Signup</title>
    <link rel="stylesheet" href="../css/stylesheet1.css">
    
    <script src="https://www.gstatic.com/firebasejs/9.18.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.18.0/firebase-firestore-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.18.0/firebase-auth-compat.js"></script>
    <!-- <script src="../js/auth.js"></script> -->
</head>
<body>
    
    <div class="container">
        <h1 >POST @ PIC  </h1>    
    </div>
    
    <br></br>
    <div class="form">
        <div class="email">
            <!------E mail -->
            <label for="email">E Mail</label>
            <input type="email" name="email" id="email" placeholder="Enter email">
        </div>

        <div class="password">
            <!------Password -->
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter password">
        </div>

        
    <!---Sign up button-->
    <button id="submit-btn" onclick="SignUp()"> Signup </button>
        
    <!----Sign in (if already have an account)-->
    <p>Already have an account ?</p>
    <span> <a href="signIn.php"> Sign In</a></span>

    </div>
    <script src="../js/auth.js"></script>
</body>
</html>
