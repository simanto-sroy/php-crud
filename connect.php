<?php 

    include 'config.php';

    $connect = mysqli_connect(server_name, user_name, db_password, db_name);

    if(!$connect){
        echo die("Database Not Connected").mysqli_connect_error();
    }

?>