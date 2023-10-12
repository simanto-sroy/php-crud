<?php

    session_start();

    $errors = [];
    $data = [];

    if(isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        if(empty($name)){
            $errors['name'] = 'Name is required';
        }else {
            $data['name'] = $name;
        }

        if(empty($email)){
            $errors['email'] = 'Email is required';
        }else {
            $data['email'] = $email;
        }

        if(empty($phone)){
            $errors['phone'] = 'Phone is required';
        }else {
            $data['phone'] = $phone;
        }


        if(empty($errors['name']) && empty($errors['email']) && empty($errors['phone'])) {

            $create = "INSERT INTO users_data(name, email, phone) VALUES('$data[name]','$data[email]','$data[phone]')";

            if(mysqli_query($connect, $create)){
                $_SESSION['success'] = "User Added";
                header('location:index.php');
            }else {
                die("User Not Added").mysqli_error($connect);
            }

        }

    }

?>