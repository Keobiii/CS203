<?php
    $id=$_GET['id'];
    $conn = mysqli_connect('localhost','root','','project') or die ("Error in connection");
    $sql = "SELECT * FROM users WHERE id=" .$id;
    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);
?>

<html>
<head>
    <title>Nike Store</title>
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
        header
        {
            position: sticky;
            top: 0px;
            height: 80px;  
            background-color: #fff; 
            display: flex;
            align-content: center;
            justify-content: center;
            z-index: 999999;
            
        }
        header .nike-logo{
            position: absolute;
            max-width: 5%;
            top: 20px;
            left: 100px;
        }
        header .user{
            position: absolute;
            font-size: 1.3em;
            right: 100px;
            top: 50%;
            color: red;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transform: translate(-50%, -50%);
        }

        header ul
        {
            display: flex;
            align-items: center;
        }
        header ul li
        {
            list-style: none;
            margin-right: 20px;
        }
        header ul li a
        {
            text-decoration: none;
            font-size: 20px;
            color: black;
        }

        .page-one
        {
            position: relative;
            width: 100%;
            min-height: 88.9vh;
            padding: 100px;
            background: #f6f6f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            align-content: center;
            overflow-y: hidden;
        }

        .content
        {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;


        }
        .content .textBox
        {
            position: relative;
            max-width: 600px;
            bottom: 50px;
        }
        .content .textBox h2
        {
            color: #000;
            font-size: 65px;
            line-height: 1.4em;
            font-weight: 500;
        }
        .content .textBox p
        {
            color: #333;
            font-size: 1.1em;
            font-family: 'Chivo', sans-serif;
            text-align: justify;
            width: 90%;
        }
        .content .imgBox
        {
            width: 600px;
            display: flex;
            justify-content: flex-end;
            padding-right: 60px;
            margin-top: -30px;
        }
        .content .imgBox img {
            max-width: 400px;
            rotate: 330deg;
            animation: floatAnimation 2s infinite ease-in-out;
        }

        @keyframes floatAnimation {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }



        .thumb
        {
            position: absolute;
            left: 50%;
            bottom: 20px;
            transform: translateX(-50%);
            display: flex;
        }
        .thumb li
        {
            list-style: none;
            display: inline-block;
            margin: 0 20px;
            cursor: pointer;
            transition: 0.5s;
        }
        .thumb li:hover
        {
            transform: translateY(-15px);
        }
        .thumb li img
        {
            max-width: 60px;
        }

        @keyframes fade-Up{
            from{
            opacity: 0; 
            transform: translateY(20px);
            }
            100%{
                opacity: 1;
                transform: translateY(0);
            }
        }

        .sci
        {
            position: absolute;
            left: 82%;
            bottom: 20px;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            flex-direction: row;
        }
        .sci li
        {
            margin: 0 30px;
            cursor: pointer;
            list-style: none;
        }
        .sci li:hover{
            color: white;
        }
        .sci li a
        {
            display: inline-block;
            margin: 5px 0;
            transform: scale(0.6);
            
        }

        .circle
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #2A2A2E;
            clip-path: circle(600px at right 49px);
        }

        .page-two{
            position: relative;
            width: 100%;
            min-height: 130vh;
            padding: 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f6f6f6;
            flex-wrap: wrap;
            align-content: center;
            overflow-y: hidden;
        }
        .product{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            width: 1000px;
            position: relative;
            top: 70px;
            left: 50%;
            transform: translate(-50%);

        }
        .box {
            position: relative;
        }
        .product-img{
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            margin-bottom: 0.5rem;
            transition: 0.5s;
        }
        .product-title {
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }
        .product-color{
            position: relative;
            top: -5px;
        }
        .product-price {
            font-weight: bold;


        }

        .box:hover{
            border: 1px solid black;
        }
        .product-img:hover
        {
            transform: scale(0.9);   
        
        }

        .page-three{
            position: relative;
            width: 100%;
            min-height: 100vh;
            padding: 100px;
            display: flex;
            background: #f6f6f6;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            align-content: center;
            overflow-y: hidden;
        }
        .circle2
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #2A2A2E;
            clip-path: circle(600px at left 130px);
        }
        .page-three .map{
            position: absolute;
            top: 25%;
            border-radius: 5%;
        }
        iframe{
            border-radius: 5%;
        }
        .page-three .container{
            position: absolute;
            top: 56%;
            left: 75%;
            transform: translate(-50%, -50%);
            width: 30%;
        }
        .row {
            position: relative;
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            
        }

        label {
            
            margin-bottom: 10px;
            font-weight: bold;
        }

        input {
            padding: 8px;
            width: 50%;
            border-radius: 5px;
            border: 1px solid black;
            outline: none;
            
        }
        textarea{
            padding: 8px;
            width: 100%;
            resize: none;
            border-radius: 5px;
            border: 1px solid black;
            outline: none;
        }
        .send-btn {
            position: relative;
            padding: 10px;
            background-color: black;
            text-transform: uppercase;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            left: 35%;
            width: 150px;
        }
        @media only screen and (max-width: 1024px) {
            .circle{
                clip-path: circle(443px at right 168px);
            }

                .content .imgBox img{
                max-width: 350px;
            }

                .content .textBox{
                left: -50px;
            }

                .circle2{
                clip-path: circle(530px at left 243px);
            }

                iframe{
                    position: relative;
                    max-width: 500px;
                    left: -70px;
                    top: 0px;

            }

        }
        @media only screen and (max-width: 768px) {
            .circle{
                clip-path: circle(403px at right 288px);
            }

            .content .textBox h2 {
                width: 100%;
                font-size: 70px;
            }
            .content .textBox p {
                width: 100%;
            }

            .content .imgBox img{
                max-width: 300px;
            }

            .thumb{
                bottom: 60px;
            }

            .circle2{
                clip-path: circle(500px at left 480px);
            }

            iframe{
                top: 60px;
            }
        }


    </style>
</head>
<body id="home">
    <header>
        <img src="product/nike.png" alt="" class="nike-logo">
        <ul>
            <li><a href="#home" onclick="home()">Home</a></li>
            <li><a href="#shop">Shop</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="edit.php?id=<?php echo $row['id']; ?>">Profile</a></li>
        </ul>
            <a href="index.php" class="user">Logout</a>
    </header>

    <div class="page-one" >
        <div class="circle"></div>
        <div class="content" >
            <div class="textBox">
                <h2>Just Do it.</h2>
                <p data-aos="fade-right" data-aos-duration="1000">Nike, Inc. is an American multinational corporation that is engaged in the design, development, manufacturing, 
                and worldwide marketing and sales of footwear, apparel, equipment, accessories, and services. The company 
                is headquartered near Beaverton, Oregon, in the Portland metropolitan area.</p>
            </div>        
           <div class="imgBox">
            <img src="product/blacknwhite.png" class="shoes" data-aos="fade-left" data-aos-duration="1000">
         </div>
        </div>
        <ul class="thumb">
            <li><img src="product/blacknwhite.png" onclick="imgSlider1('product/blacknwhite.png');changeCircleColor1('#2A2A2E')"></li>
            <li><img src="product/shoeblue.png" onclick="imgSlider1('product/shoeblue.png');changeCircleColor1('#42F7BD')"></li>
            <li><img src="product/spongebob.png"  onclick="imgSlider1('product/spongebob.png');changeCircleColor1('#9E7F01')"></li>
           
        </ul>
    </div>

    <div class="page-two" id="shop">
        <div class="product">
            <div class="box">
                <img src="product/Product1.png" class="product-img">
                <h2 class="product-title">Jordan Stay Loyal 2</h2>
                <p class="product-color">4 Available Color</p>
                <span class="product-price">Php 5,759</span>
            </div>
            <div class="box">
                <img src="product/Product2.png" class="product-img">
                <h2 class="product-title">LeBron Witness 8 EP</h2>
                <span class="product-price">Php 5,495</span>
            </div>
            <div class="box">
                <img src="product/Product3.png" class="product-img">
                <h2 class="product-title">Sabrina 1</h2>
                <span class="product-price">Php 6,895</span>
            </div>
            <div class="box">
                <img src="product/Product4.png" class="product-img">
                <h2 class="product-title">Freak 5 EP</h2>
                <span class="product-price">Php 7,095</span>
            </div>
            <div class="box">
                <img src="product/Product5.png" class="product-img">
                <h2 class="product-title">KD Trey 5 X EP</h2>
                <span class="product-price">Php 4,795</span>
            </div>
            <div class="box">
                <img src="product/Product6.png" class="product-img">
                <h2 class="product-title">Nike Impact 4</h2>
                <span class="product-price">Php 4,795</span>
            </div>
            <div class="box">
                <img src="product/Product7.png" class="product-img">
                <h2 class="product-title">LeBron XX Premium EP</h2>
                <span class="product-price">Php 11,295</span>
            </div>
            <div class="box">
                <img src="product/Product8.png" class="product-img">
                <h2 class="product-title">Nike Elevate 3</h2>
                <span class="product-price">Php 4,095</span>
            </div>
        </div>
    </div>
    <div class="page-three" id="contact">
        <div class="circle2"></div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6597.953626995036!2d121.02399713220684!3d14.656250639478747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b6e35b41f24b%3A0xd079bd7954467def!2sNIKE%20NORTH%20EDSA!5e0!3m2!1sen!2sph!4v1703332303423!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="container">
            <div class="row">
                <label>Full Name</label>
                <input type="text" name="fullname" id="fullname" required>
            </div>
            <div class="row">
                <label>Email</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="row">
                <label>Contact Number</label>
                <input type="text" name="contactnumber" id="contactnumber" required>
            </div>
            <div class="row">
                <label>Message</label>
                <textarea name="message" id="message" cols="20" rows="10"></textarea>
            </div>
            <button type="submit" class="send-btn">Send</button>
        </div>
    </div>


    
    <script>
        function imgSlider1(anything){
            document.querySelector('.shoes').src = anything;
        }

        function changeCircleColor1(color){
            const circle = document.querySelector('.circle');
            circle.style.background = color;
        }
        
        function home() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </scrip>
</body>
</html>