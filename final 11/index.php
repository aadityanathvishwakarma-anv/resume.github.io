<?php
    $insert = false;
    if(isset($_POST['name'])){

        // set connection variables
        $server = "localhost";
        $username = "root";
        $password = "";

        // create a database connection
        $connection = mysqli_connect($server, $username, $password);

        // check of the connection success
        if(!$connection){
            die("Connection to this database is failed due to ".mysqli_connect_error());
            
        }

        // echo "Success connecting to this database";

        // now inserting data
        // collect post variables
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $other = $_POST['other'];

        $sql = "INSERT INTO `bank_project`.`project` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";

        // echo $sql;

        // Execute the query
        if($connection->query($sql)==true){
            // echo "Inserted sucessfully";

            // flag for successfull insertion
            $insert = true;
        }
        else{
            echo "ERROR : $sql <br> $connection->error";
        }
        // close the database
        $connection->close();

    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANK OF STUDENT 4</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

     <div class="header">
        <div class="bank-logo-small"><img src="bank3.jpg" alt=""></div>
        <div class="bank-name"><h2>BANK OF STUDENT (BOS)</h2></div>
    </div>
<?php
    if($insert==true){
        echo "<p class='submitMsg'>
        Thanks for submitting your form.
        Now, you are successfully a customer of our bank.
        Thanks!</p>";
    }

?>
    <!-- <div class="box"> -->
    <div class="container">
        <!-- <div class="create_account">
        </div> -->
        <form action="index.php" method="post">
            <h1>Create_Account</h1>
            
            <input type="text" name="name" id="name" placeholder="Enter your name : ">
            <input type="text" name="age" id="age" placeholder="Enter your age : ">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender : ">
            <input type="email" name="email" id="email" placeholder="Enter your email : ">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone : ">
            <textarea name="other" id="other" rows="5" cols="5" placeholder="Enter your bio : "></textarea>
            <button class="btn">Submit</button>
            <!-- <button><a href="welcome.php" target="_blank"class="btn">Submit</a></button> -->
        </form>
        <div class="main-content">
                    <img src="bank.jpg" alt="Bank Building" class="bank-image">
                </div>
            </div>
    </div>

    <div class="footer">
        © group 6
    </div>

</body>
</html>