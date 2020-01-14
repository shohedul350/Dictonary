<?php 
session_start();

// Create connection
$db = mysqli_connect('localhost','root','','dictionary');

if(isset($_POST['login'])){
  try{
        $num = 0;
        $result = mysqli_query($db,"select * from login where username = '$_POST[username]' and password = '$_POST[pasword]'");
        $num = mysqli_num_rows($result);
        if($num > 0){
            header ("location: loginpage.php");
        }
        else{
//            throw new Exception ("Invalid Username or Password!");
            $_SESSION['msg']="Invalid Username or Password!";
     header('location:pd.php');
        }
    }catch(Exception $e){
        $error_message = $e -> getMessage(); 
    }
}  

?>