<?php
    phpinfo();
    header("Content-Type: text/html; charset=utf-8");
// фильтруем как самую обычную строку и удаляет лишние пробелы 
    $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    echo $login; 

    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    echo $login; 

    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
    echo $login;

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` =  '$login' ");
    $user = $result->fetch_assoc();
    
    if (count($user) <> 0) { 
        echo "Такой пользователь уже существует!"; 
        $mysql->close(); 
        exit(); 
    }

    if(strlen($login) < 5 || strlen($login) > 100 ){
        echo "Не допустимая длинна логина";
        exit();
    }
    else if (strlen($name) < 3 || strlen($name) > 50 ){
        echo "Не допустимая длинна Имени";
        exit();
    }
    else if (strlen($pass) < 2 || strlen($pass) > 6 ){
        echo "Не допустимая длинна пароля (от 2 до 6 символов)";
        exit();

        $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
        $mysql->set_charset('utf8');
        $mysql ->query("INSERT INTO `users` (`Login`, `Password`, `Name`) 
        VALUES('$login', '$pass', '$name')");
        $mysqli->close();

        header('Location: /');
?>
