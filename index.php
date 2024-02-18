<?php 
    // Flag for successful insertion
    $insert = false;
    if(isset($_POST['name'])){
        // Set connection variables
        $server = "localhost";
        $username = "root";
        $password = "";
    
        // Create a database connection
        $con = mysqli_connect($server, $username, $password);

        // Check for connection success
        if(!$con){
            die("Connection to this database failed due to ".mysqli_connect_error());
        }
        // echo "Success connecting to the db";
        
        // Collect post variables
        $name = $_POST["name"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $desc = $_POST["desc"];
        $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email',  '$phone', '$desc', current_timestamp())";
        // echo $sql;
    

        // Execute the query
        if($con->query($sql)){
            // echo "Sucessfully inserted";
            $insert = true;     // Flag for successful insertion
        }else{
            echo "ERROR: $sql <br> $con->error";
        }
    
        // Close the database connection
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <img src="bg.jpeg" alt="kashmir se kanyakumari img" class="bg">
    <div class="container">
        <h1>Welcome to Kashmeer se Kanyakumari Trip form</h1>
        <p>Enter your details and submit this form to confirm participation in the trip</p>
        <?php
            if($insert == true)
                echo "<p class='submitMsg'>Thank you for submiting the form. We are happy to see you joining for the Darjiling Trip</p>"
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="number" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>