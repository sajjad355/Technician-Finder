<?php


class db{

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "Technician";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 function CheckUser($conn,$table,$username,$password)
 {
$result = $conn->query("SELECT * FROM ". $table." WHERE username='". $username."' AND password='". $password."'");
 return $result;
 }

 function userupdate($conn,$fullname, $username, $mobile,$gender, $password, $email,$birth , $address)
 {
$result =  "INSERT INTO `user` (`id`, `name`, `username`, `mobile`, `sex`, `password`, `email`, `birth-date`, `address`) VALUES (NULL, '$fullname', '$username','$mobile','$gender','$password','$email','$birth','$address');";
if ($conn->query($result) === TRUE) {
    session_start();
    $_SESSION["sajjad"] = "sajjad";
    header('location:../HomePage.php');
   
     
} else {
   
    echo "Error: " . $result . "<br>" . $conn->error;
}
 }


 function CloseCon($conn)
 {
 $conn -> close();
 }





}
?>
