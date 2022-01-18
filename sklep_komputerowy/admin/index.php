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
            <a class="nav-link" href="addItems.php">Dodaj przedmiot</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Wyloguj</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Kategorie</h1>
        <div class="list-group">
          <a href="procesor.php" class="list-group-item">Procesor</a>
          <a href="kartagraf.php" class="list-group-item">Karta graficzna</a>
          <a href="ram.php" class="list-group-item">Pamięć RAM</a>
          <a href="hdd.php" class="list-group-item">Dysk HDD</a>
          <a href="ssd.php" class="list-group-item">Dysk SSD</a>
          <a href="plyta.php" class="list-group-item">Płyta główna</a>
          <a href="zasilacz.php" class="list-group-item">Zasilacz</a>
          
        </div>

      </div>
      

      <div class="col-lg-9">

        <div class="row">

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="procesor.php"><img class="card-img-top" src="../images/miniaturki/procesor.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="procesor.php">Procesor</a>
                </h4>
                <p class="card-text">Tutaj znajdują się procesory firmy Intel oraz AMD</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="kartagraf"><img class="card-img-top" src="../images/miniaturki/karta.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="kartagraf.php">Karta graficzna</a>
                </h4>
                  <p class="card-text">Tutaj znajdują się karty graficzne</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="ram.php"><img class="card-img-top" src="../images/miniaturki/ram.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="ram.php">Pamięć RAM</a>
                </h4>
                <p class="card-text">Tutaj znajduje się pamięć RAM</p>
              </div>
            </div>
          </div>
          </div>
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