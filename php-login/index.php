<?php
 $insert = false;
 if (isset($_POST['name'])){

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "login_db";
    
    
    $conn = new mysqli('localhost', 'root', '', 'login_db');

    if (!$conn){
        die("connection failed..." . mysqli_connect_error());
    }


  
        $name = $_POST['name'];
        $age  = $_POST['age'];
        $gender  = $_POST['gender'];
        $email  = $_POST['email'];
        $phone  = $_POST['phone'];
        $desc  = $_POST['desc'];
    
        $sql = "INSERT INTO `login_db`. `trip`(`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name ', '$age', '$gender', '$email', '$phone', ' $desc', current_timestamp());";
        echo $sql;
        
     if($conn->query($sql) == true){
       // echo "successfylly inserted";
       $insert = true;
     }
     else{
        echo " Error: $sql <br> $conn->error";
     }
        
   
   $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome to Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3>WELCOME TO MY LOGIN FORM WITH PHP</h3>
        <P>Enter your details and submit.</P>
        <?php
            if($insert == true){
                echo "<p class='submitMsg'>Thankyou for submitting the form.</p>";
            }
    ?>

        <form action= "index.php" method="post" >
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here..."></textarea>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>