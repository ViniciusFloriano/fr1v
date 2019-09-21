<?php
include "connection.php";
if($_GET["tag"] == 1) {
    $cpf = $_COOKIE["cpf"];
    $jogo = $_GET["tag"];
    $database = "INSERT INTO tb_acesso VALUES (DEFAULT, NOW(), '$jogo', '$cpf');";
    $manda = mysqli_query($conn, $database);
    header("location:snake.html");
}
else if($_GET["tag"] == 2) {
    $cpf = $_COOKIE["cpf"];
    $jogo = $_GET["tag"];
    $database = "INSERT INTO tb_acesso VALUES (DEFAULT, NOW(), '$jogo', '$cpf');";
    $manda = mysqli_query($conn, $database);
    header("location:numeros.html");
}
else if($_GET["tag"] == 3) {
    $cpf = $_COOKIE["cpf"];
    $jogo = $_GET["tag"];
    $database = "INSERT INTO tb_acesso VALUES (DEFAULT, NOW(), '$jogo', '$cpf');";
    $manda = mysqli_query($conn, $database);
    header("location:velha.html");
}
?>