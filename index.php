<?php
$insert = false;
if(isset($_POST['name'])){ 
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server , $username , $password);


    if(!$con){
         die("connection to this database failed due to " .  mysqli_connect_error());

    }
    // echo "Success connecting to the DB";
$name = $_POST['name']; 
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql = " INSERT INTO `trip`. `trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";
//    echo $sql;

   if($con->query($sql) == true){
    // echo "Successfully  inserted";
    $insert = true; 
   }
   else{
    echo "ERROR:  $sql <br> con->error";
   }
   $con->close();
   
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <img src="bg.jpg" class="bg" alt="harshu" />
    <div class="container">
      <h1>Welcome to Harshu Uk trip From</h1>
      
      <p>
        Enter your Details and submit this form to confirm your parcticipation
        in the trip
      </p>
      <?php
      if($insert == true){
      echo "<p class='submitmsg'>
        Thanks fo submitting your from We are happy to see you us for the UK
        trip
      </p>";
    }
      ?>

      <form action="index.php" method="POST">
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter Your Name"
        />
        <input type="text" name="age" id="age" placeholder="Enter Your Age" />
        <input
          type="text"
          name="gender"
          id="gender"
          placeholder="Enter Your Gender"
        />
        <input type="email" name="email" id="email" placeholder="Enter your Email ">
        <input
          type="text"
          name="phone"
          id="phone"
          placeholder="Enter Your phone "
        />
        <textarea
          name="desc"
          id="desc"
          cols="30"
          rows="10"
          placeholder="Enter any other information "
        ></textarea>
        <button class="btn">Submit</button>
      </form>
    </div>
    <link rel="stylesheet" href="index.js" />
    <!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'harshit sevak', '20', 'male', 'har@gmail.com', '7339992807', 'i am happy person ', current_timestamp()); -->
  </body>
</html>

