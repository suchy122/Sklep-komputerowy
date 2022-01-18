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
        $result1=$conn->query("SELECT idCategory,nazwa From category");
        if(isset($_POST['nazwa']))
    {
        
        $nazwa=$_POST['nazwa'];
        $cena=$_POST['cena'];
        $image=$_FILES['plik']['name'];
        $idCategory=$_POST['category'];
        $uploaded = "../images/". $_FILES['plik']['name'];
        if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
            if ($_FILES['plik']['size'] > 1024*1024*1024) {
                    $_SESSION['info']="Plik jest za duży!";
                } 
                else {
                    move_uploaded_file($_FILES['plik']['tmp_name'],$uploaded);
                    if($conn->query("INSERT INTO items VALUES (NULL,'$nazwa','$cena',$idCategory,'$image')"))
                    {
                        $_SESSION['info']="Dodano pomyślnie plik!";
                    }
                    
                    $conn->close();
                }
            } else {
                $_SESSION['info']="Błąd przy dodaniu!";
            }
        }
        
         
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
            <a class="nav-link" href="logout.php">Wyloguj</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
        <div class="wrapper">
            <div class="jumbotron">
               <h1>Dodaj przedmiot!</h1><br>
                
                <form enctype="multipart/form-data" method="POST">
                    <input type="text" name="nazwa" placeholder="nazwa" class="form-control"/><br> 
                    
                    <select name="category">
                        <?php while($row1=mysqli_fetch_array($result1)):;  ?>
                        <option value="<?php echo $row1['idCategory']; ?>" ><?php echo $row1['nazwa']; ?></option>
                        <?php endwhile;?>
                    </select><br><br>
                    
                    <input type="text" name="cena" placeholder="cena" class="form-control"/><br>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <input name="plik" type="file" /><br><br>
                    <input type="submit"  class="btn btn-primary" value="Wyślij!" name="wyslij"/>
                </form>
                <?php 
                        if(isset($_SESSION['info']))
                        {
                            echo '<div margin-top:10px; margin-bottom:10px;">'.$_SESSION['info'].'</div>';
                            unset($_SESSION['info']);
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