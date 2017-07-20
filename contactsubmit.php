<?php

  session_start();
  include 'connection.php';

  $name=$address=$email=$phoneNo="";
  $nameErr=$addressErr=$emailErr=$phoneNoErr="";

  if($_SERVER["REQUEST_METHOD"]=="POST"){
      if($_POST['submit']){
         if(!$_POST['name']){
             $nameErr="name required";
         }else{
             $name=test_input($_POST['name']);
         } 
         if(!$_POST['address']){
             $addressErr="address required";
         }else{
             $address=test_input($_POST['address']);
         }
         if(!$_POST['email']){
             $emailErr="email required";
         }else{
             $email=test_input($_POST['email']);
         }
         if(!$_POST['phoneNo']){
             $phoneNoErr="Phone No required";
         }else{
             $phoneNo=test_input($_POST['phoneNo']);
         }
        
         // $email=test_input($_POST['email']);
           
        //   $query="select * from user where email='$email'";
        //   $result=mysqli_query($link,$query);
          
        //   $row=mysqli_fetch_array($result);
          $userId=$_SESSION['userid'];
         // print_r($userId);
          $query = "INSERT INTO address ( name, address, email, phoneNo,userid) VALUES ( '$name', '$address', '$email', '$phoneNo','$userId')";
          mysqli_query($link,$query);
         
      }

  }

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

	
?>