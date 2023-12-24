<?php
    if(!isset($_POST['edit'])){
        $id=$_GET['id'];
		$conn = mysqli_connect('localhost','root','','project') or die ("Error in connection");
		$sql = "SELECT * FROM users WHERE id=" .$id;
		$results = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($results);
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
        h1{
            position: relative;
            top: 100px;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .container {
            width: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
        }

        .row {
            position: relative;
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            left: 70px;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        input {
            padding: 8px;
            width: 30%;
        }

        .profile{
            position: absolute;
            height: 200px;
            width: 200px;
            top: 20%;
            right: 125px;
        }
        .profile img{
            position: relative;
            object-fit: cover;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 5px solid black;
        }
        .info{
            position: absolute;
            bottom: 50px;
            right: 95px;
            width: 250px;

        }
        .info p{
            font-size: 20px;
            text-align: center;
        }

        button {
            position: relative;
            padding: 10px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            left: 70px;
            top: 10px;
        }
        .view-records{
            background-color: #4CAF50;
        }
        @media only screen and (max-width: 1024px) {

            .profile img{
                position: absolute;
                left: 150px;
                height: 200px;
                width: 200px;
                bottom: 20px;
            }
            .info p{
                position: relative;
                left: 150px;
                bottom: 40px;
                border: 1px solid red;
            }
            .row input{
                width: 175px;
            }
        }
        @media only screen and (max-width: 425px) {
            .profile img{
                position: absolute;
                top: -200%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        }
    </style>
</head>
<body>
    <h1>EDIT PROFILE</h1>
    <div class="container">
        <form action="edit.php" method="POST"> 
            <div class="row">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" value="<?=$row['fname']; ?>" required>
                <input type="text" name="id" value="<?=$row['id']; ?>" style="display:none">
            </div>
            <div class="row">
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" value="<?=$row['lname']; ?>" required>
            </div>
            <div class="row">
                <label for="contactnumber">Contact Number:</label>
                <input type="text" id="contactnumber" name="contactnumber" value="<?=$row['contact']; ?>" required>
            </div>
            <div class="row">
                <label for="email">Email Address:</label>
                <input type="text" id="email" name="email" value="<?=$row['email']; ?>" required>
            </div>
            <div class="profile">
                <img src="img/kerby.jpg" alt="">
            </div>
            <div class="info">
                <p><?=$row['fname']; ?> <?=$row['lname']; ?> </p>
            </div>
            <button type="submit" name="edit" value="save">Submit</button>
            <?php
                if($row['role'] == 'admin'){
                    ?>
                    <button type="button" class="view-records" onclick="window.location.href='admin.php'">View Records</button>
                    <?php
                }else{
                    ?>
                    <button type="button" class="view-records" onclick="window.location.href='inside.php?id=<?= $row['id'] ?>'">Back to Profile Page</button>
                    <?php
                }
            ?>
        </form>
    </div>
</body>
</html>
<?php
    }else{	
            $id = $_POST['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $contactnumber = $_POST['contactnumber'];
            $email = $_POST['email'];
            $conn = mysqli_connect('localhost','root','','project') or die("Error in connection!");
            
           
        

            
            $results = mysqli_query($conn, $sql) or die("Error in SQL!");
            $sql_id = "SELECT * FROM users WHERE id=" .$id;
            $results_two = mysqli_query($conn, $sql_id);
            $row = mysqli_fetch_assoc($results_two); 
            
            if(!$results){
                die("Error in SQl!");
            }else if (!preg_match("/^[a-zA-Z]+$/", $fname) || !preg_match("/^[a-zA-Z]+$/", $lname)) {
                echo '<script>';
                echo 'alert("First Name and Last Name should contain only alphabetic characters.");';
                echo 'window.location.href="edit.php?id=' . $row['id'] . '";';
                echo '</script>';
            }else if(strpos($email, '@gmail.com') === false){
                echo "<script>alert('Invalid Gmail address.');</script>";
            }else {
                $sql = "UPDATE users SET fname='$fname', lname='$lname', contact='$contactnumber', email='$email'
                WHERE id=" .$id;
                ?>
                <script>
                    alert("Successfully Changed");
                    <?php
                    if ($row['role'] == 'admin') {
                        echo 'window.location.href="admin.php";';
                    } else {
                        echo 'window.location.href="inside.php?id=' . $row['id'] . '";';
                    }
                    ?>
                </script>
                <?php
                
            }
        }
?>