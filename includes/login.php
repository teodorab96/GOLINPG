<?php
ob_start();
session_start();
include "db.php";
if(isset($_POST['adminlogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query="SELECT * FROM users WHERE username = '{$username}'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('QUERY FAILED '.mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($result)){
       
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_password = $row['user_password'];
        if($username === $db_username && $password === $db_password){

            $_SESSION['username']=$db_username;
            $_SESSION['user_id'] = $db_user_id;
            header("Location:../admin/index.php");
        }
        else{
            header("Location:../index.php");
        }
    }
}

?>