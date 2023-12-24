<?php
      $conn = mysqli_connect('localhost','root','','project') or die("Error in connection!");
?>

<html>
<head>
    <title>Nike Admin</title>
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
        background-color: white;
    }
    table {
        border-collapse: collapse;
        width: 50%;
        margin-top: 20px;
        position: absolute;
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    caption {
        text-align: center;
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .btn {
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid black;
        color: white;
        border-radius: 4px;
    }

    .edit {
        background-color: #f0ad4e;
    }
    .edit-icon{
        max-width: 15px;
        object-fit: cover;
    }
    .delete{
        background-color: red;
    }
    .delete-icon{
        max-width: 15px;
        object-fit: cover;
    }
    @media only screen and (max-width: 1024px) {
        .edit-icon, .delete-icon {
                max-width: 17px;
                margin-right: 5px;
        }

        a.btn.edit, a.btn.delete {
            display: flex;
            width: 100%;
            margin-bottom: 10px;
        }


        .profile img{
            position: absolute;
            left: 150px;
            max-width: 100px;
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
            width: 150px;
        }
    }

    @media only screen and (max-width: 768px) {
            table{
                position: absolute;
                display: block;
                top: 30%;
                left: 36%;
                transform: translate(-50%, -50%);
            }
            .edit-icon, .delete-icon {
                max-width: 17px;
                margin-right: 5px;
            }

            a.btn.edit, a.btn.delete {
                display: flex;
                width: 100%;
                margin-bottom: 10px;
            }
    }

    </style>
</head>
<body>
    <table>
            <caption><h2>User List</h2></caption>
        <thead>
            <th>#
            <th>First Name
            <th>Last Name
            <th>Mobile Number
            <th>Email
            <th>Action

        <?php
            $conn = mysqli_connect('localhost','root','','project') or die("Error in connection!");
            $sql = "SELECT * FROM users ORDER BY fname ASC";
            $count = 1;
            $result = mysqli_query($conn, $sql);

            if(!$result){
                die ("Error in sql");
            }else{
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        ?>
                            <tr>
                                <td><?=$count?></td>
                                <td><?=$row['fname']; ?>
                                <td><?=$row['lname']; ?>
                                <td><?=$row['contact']; ?>
                                <td><?=$row['email']; ?>

                                <td>
                                    <a href="edit.php?id=<?=$row['id']; ?>" class="btn edit"> <img class="edit-icon" src="img/pen.png"> Edit</a>
                                    <a href="delete.php?id=<?=$row['id'];?>" class="btn delete" onClick="return confirm('Do you want to remove this record?');"> <img class="delete-icon" src="img/delete.png" > Delete</a>
                                </td>
                        <?php
                        $count++;
                    }
                }else{
                    echo "No record found";
                }
            }

        ?>
        
    </table>
</body>
</html>