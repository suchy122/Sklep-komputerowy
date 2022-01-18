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
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Koszyk</a>
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
                
                <h1>Twoje zamówienia!</h1>
                
                    <?php
                        require_once "connect.php";
                        $conn = new mysqli($host,$db_user,$db_password,$db_name); 
                        $result=$conn->query("SELECT users.login,items.nazwa,items.image,items.cena,orders.idOrder from users INNER JOIN orders ON users.idUser=orders.idUser
                                            INNER JOIN items ON items.idItem=orders.idItem WHERE users.idUser='".$_SESSION['idUser']."'");
                        if($result->num_rows>0)
                        {
                            echo "<table>
                                    <tr>
                                        <td></td>
                                        <td><h4>Nazwa</h4></td>
                                        <td><h4>Cena</h4></td>
                                        <td></td>
                                    </tr>";
                            while($tab=mysqli_fetch_array($result))
                            {
                                echo "<tr>";
                                echo "<td><img style='width:150px;height: 150px;' src='../images/".$tab['image']."'></td>";
                                echo "<td>".$tab['nazwa']."</td>";
                                echo "<td>".$tab['cena']."</td>";
                                echo "<td><form method='post'><input type='hidden' name='idorder' value='".$tab['idOrder']."'> 
                                    <input type='submit' value='Usuń!' name='usun'></form></td></tr>";
                            }
                            echo "</table>";
                        }
                        else 
                        {
                            echo "<h4>Brak zamówień";
                        }
                    
                        if(isset($_POST['idorder']))
                        {
                            $result=$conn->query("DELETE FROM orders WHERE orders.idOrder=".$_POST['idorder']);
                            header('Location: orders.php');
                        }
                    
                        $conn->close();
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