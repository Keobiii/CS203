<?php
	if(isset($_POST['submit'])){
		$fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $contact = $_POST['contactnumber'];
		$email = $_POST['email'];
		$password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

		$conn = mysqli_connect('localhost','root','','project') or die("Error in connection!");
        $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"));
        $check_number = mysqli_num_rows(mysqli_query($conn, "SELECT contact FROM users WHERE contact='$contact'"));

        if (!preg_match("/^[a-zA-Z]+$/", $fname) || !preg_match("/^[a-zA-Z]+$/", $lname)) {
            echo "<script>alert('First Name and Last Name should contain only alphabetic characters.');</script>";
        }else if($password != $cpassword){
            echo "<script>alert('Password did not matched.');</script>";
        }else if(strpos($email, '@gmail.com') === false){
            echo "<script>alert('Invalid Gmail address.');</script>";
        }else if($check_email > 0){
            echo "<script>alert('Email already in used.');</script>";
        }else if($check_number > 0){
            echo "<script>alert('Conract Number already in used.');</script>";
        }else{
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            ?>
            <script>
                alert('Successfully Registered');
                window.location.href = 'index.php';
            </script>

            <?php


            $sql = "INSERT INTO users
             VALUES(null,'$fname','$lname','$contact', '$email', '$hashPassword', 'user')";
            
            $results = mysqli_query($conn, $sql) or die("Error in SQL!");
            
            if(!$results){
                die("Error in SQl!");
            }
        }
	}
?>
<html>
<head>
    <title>Nike</title>
    <link rel="icon" href="product/nike_icon.png" type="image/x-icon">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Chivo:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700&display=swap');
       *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        scroll-behavior: smooth;
        font-family: 'Chivo', sans-serif;

    }

    body{
        background-color: #f6f6f6;
        height: 100vh;
    }

    .login {
        position: absolute;
        width: 350px;
        height: 650px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #ffffff;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
    }
    .login img{
        position: relative;
        top: 40px;
        width: 250px;
        height: 100px;
        
    }
    .user-input {
        position: relative;
        top: 80px;
        margin-bottom: 10px;
    }
    .user-input input{
        position: relative;
        width: 260px; 
        height: 40px; 
        margin: 4px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid black;

    }
    .user-input span{
        position: absolute;
        left: 55px;
        top: 16px;
        font-size: 15px;
        font-family: none;
        color: gray;
        pointer-events: none;
        transition: .3s ease-in-out; 
        text-align: start;
        width: auto;
    }
    .user-input input:valid ~ span {
        transition: .3s ease-in-out;
        transform: translateX(-1px) translateY(-20px);
        font-size: 1em;
        background-color: white;
    }
    .user-input input:valid{
        padding-top: 10px;
        font-size: 1em;
        font-weight: bold;
    }

    button{
        position: relative;
        top: 100px;
        width: 60%;
        height: 32.5px;
        border-radius: 10px;
        background-color: black;
        color: white;
        font-weight: bolder;
        border: none;
        cursor: pointer;
    }
    .sign-up{
        position: absolute;
        bottom: 20px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .sign-up p{
        position: relative;
        top: 35%;
        font-size: 1em;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }
    .sign-up p a{
        color: #77A7FF;
        cursor: pointer;
        font-size: none;
        text-decoration: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }
    </style>
</head>
<body>
    <div class="login">
        <img src="product/nike.png" alt="">
    <form method="POST" action="sign-up.php">
        <div class="user-input">
            <input type="text" id="fullname" name="fname" required>
            <span>First Name</span>
        </div>
        <div class="user-input">
            <input type="text" id="fullname" name="lname" required>
            <span>Last Name</span>
        </div>
        <div class="user-input">
            <input type="number" id="email" name="contactnumber" required>
            <span>Contact Number</span>
        </div>
        <div class="user-input">
            <input type="text" id="email" name="email" required>
            <span>Email</span>
        </div>

        <div class="user-input">
            <input type="password" id="password" name="password" required>
            <span>Password</span>
        </div>
            <div class="user-input">
            <input type="password" id="cpassword" name="cpassword" required>
            <span>Confirm Password</span>
        </div>


        <button type="submit" id="button" name="submit">SUBMIT</button>
    </form>
        <div class="sign-up">
            <p>Already have account? <a href="index.php">Login</a></p>
        </div>
</body>
</html>
