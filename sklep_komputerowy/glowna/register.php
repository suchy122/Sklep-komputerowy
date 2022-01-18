<?php
    include_once ("head.php"); 
    session_start();
    if(isset($_POST['login']))
    {
        
        $wszystko_ok=true;
        
        $login=$_POST['login'];
        $haslo1=$_POST['haslo1'];
        $haslo2=$_POST['haslo2'];
        $email=$_POST['email'];
          
        if(ctype_alnum($login)==false)
        {
            $wszystko_ok=false;
            $_SESSION['e_login']="Login może składać się tylko z liter i cyfr (bez polskich znaków)!";
        }
        
        if(strlen($haslo1)<4 || strlen($haslo1)>20)
        {
            $wszystko_ok=false;
            $_SESSION['e_haslo']="Hasło musi posiadać od 4 do 20 znaków!";
        }
        
        if($haslo1!=$haslo2)
        {
            $wszystko_ok=false;
            $_SESSION['e_haslo']="Podane hasła nie są identyczne!";
        }
        
        $haslo_hash = password_hash($haslo1,PASSWORD_DEFAULT);
        
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
        
        try 
        {
            $conn = new mysqli($host,$db_user,$db_password,$db_name);
            if($conn->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                $result=$conn->query("SELECT idUser from users WHERE login='$login'");
                $result2=$conn->query("SELECT idUser from users WHERE email='$email'");
                
                if(!$result) throw new Exception($conn->error);
                
                if($result->num_rows>0 )
                {
                   
                    $wszystko_ok=false;
                    $_SESSION['e_login']="Już jest taki użytkownik!";
                     
                }
                
                if($result2->num_rows>0)
                {
                   
                    $wszystko_ok=false;
                    $_SESSION['e_email']="Taki email już jest w bazie!";
                     
                }
                
                if($wszystko_ok==true)
                {
                    if($conn->query("INSERT INTO users VALUES (NULL,'$login','$haslo_hash','$email')"))
                    {
                        $_SESSION['udanarejestracja']=true;
                        header('Location: loggingreje.php');
                    }
                    else
                    {
                        throw new Exception($conn->error);
                    }
                }
                
                $conn->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera!</span>';
            //echo '<br>Informacja developerska: '.$e;
        }
    }
?>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../index.php">Sklep komputerowy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logging.php">Logowanie</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container">
        <div class="wrapper">
            <div class="jumbotron">
                <h1>Rejestracja</h1>
                <form method="post" role="form">
                    <input type="text" name="login" placeholder="Login" class="form-control"/>
                    <?php 
                        if(isset($_SESSION['e_login']))
                        {
                            echo '<div style="color:red; margin-top:10px; margin-bottom:10px;">'.$_SESSION['e_login'].'</div>';
                            unset($_SESSION['e_login']);
                        }
                    ?><br>
                    <input type="text" name="email" placeholder="Email" class="form-control"/>
                    <?php 
                        if(isset($_SESSION['e_email']))
                        {
                            echo '<div style="color:red; margin-top:10px; margin-bottom:10px;">'.$_SESSION['e_email'].'</div>';
                            unset($_SESSION['e_email']);
                        }
                    ?><br>
                    <input type="password" name="haslo1" placeholder="Hasło" class="form-control"/>
                    <?php 
                        if(isset($_SESSION['e_haslo']))
                        {
                            echo '<div style="color:red; margin-top:10px; margin-bottom:10px;">'.$_SESSION['e_haslo'].'</div>';
                            unset($_SESSION['e_haslo']);
                        }
                    ?><br>
                    <input type="password" name="haslo2" placeholder="Powtórz hasło" class="form-control"/><br>
                    <input type="submit" class="btn btn-primary" value="Zarejestruj!" name="register" />
                </form>
                
            </div>
        </div>
  </div>  
 <footer class="py-2 bg-dark bottom fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Sklep komputerowy - Karol Suchta</p>
    </div>
    
  </footer>
</body>
</html>