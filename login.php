<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $host = 'localhost';

    if (!$email) {
        echo 'That email is not valid!<br/>';
      }
    
      if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
        echo 'Password must contain one letter one number and be a minimum length of 8! <br/>';
      }

    $conn = new mysqli($host, "root", "", "dolphin_crm");
    if($conn->connect_error){
        die("Failed to connect:  ".$conn->connect_error);
    }else{
            
            $data = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
            $results = mysqli_fetch_assoc($data);
            if ($data->num_rows > 0) {
                $_SESSION["username"] = $email;
                $_SESSION["loggedIn"] = 1;
                $_SESSION["id"] = $results['id'];
                
                header("Location: dashboard.php");
                exit();
    
            } else {
                
                echo "<p> Invalid Email or Password. <a href=index.php>Try again!</a></p>";
            }
        }	

    
}



?>








