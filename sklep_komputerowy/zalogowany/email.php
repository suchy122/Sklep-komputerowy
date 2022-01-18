<?php
/*use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';*/
session_start();
require_once 'head.php';
require_once '../tools/PHPMailer/PHPMailerAutoload.php';
require_once "connect.php";
$conn = new mysqli($host,$db_user,$db_password,$db_name);
$result=$conn->query("SELECT users.email From users where idUser=".$_SESSION['idUser'].";");
$result2=$conn->query("SELECT items.nazwa From items inner join cart ON items.idItem=cart.idItem");
$body="Witaj! <br><br>Dziękujemy za zakupy w naszym sklepie! Twoje zamówienie zostalo zrealizowane.<br><br>Twoje zamówione przedmioty to:<br>";
$i=1;
while($tab=mysqli_fetch_array($result2))
{
    $body .=$i.". ".$tab['nazwa']."<br>";
    $i=$i+1;
}
$body .="<br><br>Pozdrawiamy, Sklep komputerowy!";

while($tab=mysqli_fetch_array($result))
{
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '587';
$mail->isHTML(true);
$mail->Username = 'sklep.komputerowy.projekt@gmail.com';
$mail->Password = 'zaq1@WSX';
$mail->setFrom('SklepKomputerowy@sklep.pl');
$mail->Subject = 'Potwierdzenie zamówienia';
$mail->Body = $body;
$mail->AddAddress($tab['email']);
$mail->Send();
$result3=$conn->query("DELETE FROM cart");
header('Location: order.php'); 
}

?>