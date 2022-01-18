<?php
    include_once("head.php"); 
    session_start();
    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: ../index.php');
        exit();
    }
?>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Sklep komputerowy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" style="color:white;"><b><?php echo "Witaj: ".$_SESSION['login'];?></b></a> 
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php">Zamówienia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Wyloguj</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
        <div class="wrapper">
            <div class="jumbotron">
                
                <h1>Dziękuje za zamówienia, zapraszam ponownie!</h1>
                
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