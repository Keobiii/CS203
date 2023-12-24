<?php
    $id = $_GET['id'];
    $conn = mysqli_connect('localhost','root','','project') or die("Error in connection!");
    $sql = "DELETE FROM users WHERE id=".$id;
    $result = mysqli_query($conn, $sql);    

    if(!$result){
        echo "Error in SQL";
    }else{
        ?>
            <script>
                alert("Deleted...");
            </script>
        <?php
            header("refresh:0; url=admin.php");
    }

?>