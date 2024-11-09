<?php
session_start();
   include("connect.php");
   $mobile =$_POST['mobile'];
   $password=$_POST['password'];
   $role=$_POST['role'];

   $check =mysqli_query($connect, "SELECT * FROM user WHERE mobile ='$mobile' AND password='$password' AND role='$role'");
   if(mysqli_num_rows($check)>0){
    $userdata=mysqli_fetch_array($check); //user data fatch
    $groups= mysqli_query($connect,"SELECT * FROM user WHERE role=2"); //group data fatch , role =2 means voh group h or role =1 means it is user
    $groupsdata = mysqli_fetch_all($groups,MYSQLI_ASSOC); //store in one object

    $_SESSION['userdata']= $userdata; //store data in session var
    $_SESSION['groupsdata']=$groupsdata;

    echo'
    <script>
   
    window.location="../routes/dashboard.php";
    </script> 
    ';
   }
   else{
    echo'
    <script>
    alert("Invalid Credientials or User not found!");
    window.location="../";
    </script> 
    ';
   }

   ?>