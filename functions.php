<?php



function redirect_to($path){
    header("Location:{$path}");
    exit;
}

function set_flash_message($name , $message){
    $_SESSION[$name] = $message;
}

function add_user($username , $userpassword){
    $db = mysqli_connect("localhost" , "root" , "" , "registration");
    $sql = "INSERT INTO users (email , password) VALUES ('$username' , '$userpassword')";
    $result = mysqli_query($db , $sql);
}

function get_user_by_email($username){
    $db = mysqli_connect("localhost" , "root" , "" , "registration");
    $sql = "SELECT * FROM users WHERE email = '$username'";
    $result = mysqli_query($db,$sql);
    $username = mysqli_fetch_assoc($result);
    return($username);
}


function clear_data($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}


?>