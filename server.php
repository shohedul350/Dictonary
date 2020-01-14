<?php
session_start();
$bangla ="";
$english ="";
$id=0;
$edit_state=false;

// Create connection
$db = mysqli_connect('localhost','root','','dictionary');


//insert data
if(isset($_POST['save'])){
    $bangla =$_POST['bangla'];
    $english =$_POST['english'];
    
    $sql = "INSERT INTO word (Bangla,English) VALUES ('$bangla', '$english')";
    

if (mysqli_query($db, $sql)) {
     $_SESSION['msg']="data save saved";
     header('location:loginpage.php');
} else {
     $_SESSION['msg']="data not saved";
     header('location:loginpage.php');
}

}


//Display Data
$sql = "SELECT * FROM word";
$result = mysqli_query($db,$sql);


//update
if(isset($_POST['update'])){
    $bangla=mysqli_real_escape_string($db, $_POST['bangla']);
    $english=mysqli_real_escape_string($db,$_POST['english']);
    $id=mysqli_real_escape_string($db,$_POST['id']);
    
    mysqli_query($db,"UPDATE word SET Bangla='$bangla',English='$english' WHERE id=$id");
     $_SESSION['msg']="Data saved";
     header('location:loginpage.php');
}


//delete record
if(isset($_GET['del'])){
    $id=$_GET['del'];
    mysqli_query($db,"DELETE FROM `word` WHERE id=$id");
    $_SESSION['msg']="Data Delete";
    header('location:loginpage.php');  
}


//search Data English
if(isset($_POST['src'])){
$search=$_POST['search'];
$sql = "SELECT * FROM `word` WHERE `English` LIKE '$search'";
$srcresult = mysqli_query($db,$sql);
}

//search Data Bangla
if(isset($_POST['bsrc'])){
$bsearch=$_POST['bsearch'];
$sql = "SELECT * FROM `word` WHERE `Bangla` LIKE '$bsearch'";
$bsrcresult = mysqli_query($db,$sql);
}