<?php

function log_in($email, $password){
    $username = get_user_by_email($email);
    if (!empty($username) AND password_verify($password, $username['password'])) {
        save_user($username);
        return true;
    }else{
    return false;
    }
};


function display_flash_message($value){
    echo $_SESSION[$value];
}

function save_user($email){
    $_SESSION['saved'] = $email;
}

function redirect_to($path){
    header("Location:{$path}");
    exit;
}

function set_flash_message($name , $message){
    $_SESSION[$name] = $message;
}

function add_user($username , $userpassword){
    $db = mysqli_connect("localhost" , "root" , "" , "registration");
    $userpassword = password_hash($userpassword , PASSWORD_DEFAULT);
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