<?php
    include_once ("head.php"); 
    session_start();
    
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
            <a class="nav-link" href="register.php">Rejestracja</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container">
        <div class="wrapper">
            <div class="jumbotron">
                <h1>Logowanie</h1>
                <form method="post" action="login.php" role="form">
                <input type="text" name="login" placeholder="Login" class="form-control"/><br>
                <input type="password" name="haslo" placeholder="Hasło" class="form-control"/><br>
                <input type="submit" class="btn btn-primary" value="Zaloguj" name="loginn" />
                </form>
                
                <?php
                    if(isset($_SESSION['blad'])){ 
                        echo $_SESSION['blad'];
                    }
                ?>
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