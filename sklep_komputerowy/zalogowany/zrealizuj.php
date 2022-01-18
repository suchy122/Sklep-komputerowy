<?php
    include_once("head.php"); 
    session_start();
    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: ../index.php');
        exit();
    } else {
        
        require_once "connect.php";
        $conn = new mysqli($host,$db_user,$db_password,$db_name);
        $result=$conn->query("SELECT idUser,idItem From cart"); 
        if($result->num_rows>0)
                {         
                    while($tab=mysqli_fetch_array($result))
                    {
                        echo $tab['idUser'].",".$tab['idItem'];
                        $result2=$conn->query("INSERT INTO orders VALUES(null,".$tab['idUser'].",".$tab['idItem'].")");
                    }
                    
            header('Location: email.php');          
                }

        
    }



?>