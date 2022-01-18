<?php
        session_start();
        if(!isset($_SESSION['zalogowany']))
        {
            header('Location: ../index.php');
            exit();
        }
        $user=$_SESSION['idUser'];
        @$item=$_POST['idItem'];
        if(isset($item)){
            require_once "connect.php";
            $conn = new mysqli($host,$db_user,$db_password,$db_name);
            $result=$conn->query("INSERT INTO cart VALUES($user,$item)");
        }
        header('Location: carts.php');
?>