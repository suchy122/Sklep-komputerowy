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
  
  <br>
      <div class="container">
        <div class="wrapper">
        
           <h1>Procesory!</h1>
            <table>
                <tr>
                    <td></td>
                    <td><h4>Nazwa</h4></td>
                    <td><h4>Cena</h4></td>
                    <td></td>
                </tr>
            
          
              <?php
                        require_once "connect.php";
                        $conn = new mysqli($host,$db_user,$db_password,$db_name); 
                        $result=$conn->query("SELECT items.idItem, items.nazwa, cena,image from items inner join category on items.idCategory=category.idCategory where category.nazwa='procesor'");
                        if($result->num_rows>0)
                        {
                            
                            while($tab=mysqli_fetch_array($result))
                            {
                                echo "<tr>";
                                echo "<td><img style='width:150px;height: 150px;' src='../images/".$tab['image']."'></td>";
                                echo "<td>".$tab['nazwa']."</td>";
                                echo "<td>".$tab['cena']."</td>";
                                echo "<td><form method='post' action='cart.php'>
                                        <input type='hidden' name='idItem' value='".$tab['idItem']."'>
                                        <input type='submit' value='Dodaj do koszyka' name='cart' class='btn btn-primary'>
                                          </form></td></tr>";
                            }
                            
                        } else {
                            echo "<h1>Brak artykułów</h1>";
                        }
                    
                    
                        $conn->close();
                    ?>
              
          </table>
          <script type="text/javascript">
                    function error()
                    {
                      alert('Musisz się zalogować, żeby móc zamawiać!');
                    }
                </script>
      
        </div>
    </div>
  
 <footer class="py-2 bg-dark bottom fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Sklep komputerowy - Karol Suchta</p>
    </div>
    
  </footer>
</body>
</html>