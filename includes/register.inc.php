
<?php 

include "db.inc.php";
session_start(); 




if(isset($_POST['save'])){
    $email = clear_data($_POST['email']);
    $password = clear_data($_POST['password']);

    if(empty($email) || empty($password)){
        header("Location:../index.php?error=emtyfields");
        exit();
    }else{
        $sql_e = "SELECT * FROM users WHERE email = '$email'";
        $res_e = mysqli_query($conn,$sql_e);
        if(mysqli_num_rows($res_e) > 0){
            $_SESSION['danger'] = "Этот эл. адрес уже занят другим пользователем.";
            header("Location:../page_register.php");
        }else{
            $sql = "INSERT INTO users (email , password) VALUES ('$email' , '$password')";
            $result = mysqli_query($conn , $sql);
            $_SESSION['success'] = "Регистрация успешна";
            header("Location:../page_login.php");
        }
      
    }

}


function clear_data($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

?>