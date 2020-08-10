<?php session_start();

include ("functions.php");


$email = $_POST['email'];
$password = $_POST['password'];

$logged_in = log_in($email, $password);

if ($logged_in == true) {
    set_flash_message('logged_in', 'Вы вошли в систему');
    save_user($email);
    redirect_to('home.php');
    
}else {
    set_flash_message('danger', 'Неверный логин или пароль');
    redirect_to('page_login.php');
}
    










?>