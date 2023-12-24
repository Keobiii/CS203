<?php
if(isset($_POST['submit'])){
    $conn = mysqli_connect('localhost', 'root', '', 'project') or die("Error in connection!");

    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_email = mysqli_query($conn, "SELECT id, role, password FROM users WHERE email='$email'");

    if(mysqli_num_rows($check_email) > 0){
        $row = mysqli_fetch_assoc($check_email);

        if(password_verify($password, $row['password'])){
            $_SESSION["user_id"] = $row['id'];
            $_SESSION['logged_in'] = true;

            if($row['role'] == 'admin'){
                header("Location: admin.php");
            }else{
                header("Location: inside.php?id=" . $row['id']);
            }
        }else{
            echo "<script>alert('Email or Password is incorrect. Please try again.');</script>";
        }
    }else{
        echo "<script>alert('Email or Password is incorrect. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
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
    }


    .login {
        position: absolute;
        width: 350px;
        height: 500px;
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
        top: 100px;
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
        top: 13px;
        font-size: 15px;
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
        top: 150px;
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
    }
    .sign-up p a{
        color: #77A7FF;
        cursor: pointer;
        font-size: none;
        text-decoration: none;
    }    
    </style>
</head>
<body>
    <div class="login">
        <img src="product/nike.png" alt="">
        <form action="index.php" method="POST">
            <div class="user-input">
                <input type="text" id="username" name="email" required>
                <span>Email</span>
            </div>
            <div class="user-input">
                <input type="password" id="password" name="password" required>
                <span>Password</span>
            </div>
            <button type="submit" name="submit" id="button">LOG IN</button>

            <div class="sign-up">
                <p>Don't have an account? <a href="sign-up.php">Sign up</a></p>
            </div>
    </div>
     </form>



</body>
</html>