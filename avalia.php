<?php

include "connection.php";
$cpf = $_COOKIE["cpf"];
$jogo = $_GET["tag"];
$avaliacao = $_GET["avaliacao"];
$database = "INSERT INTO tb_avaliacao VALUES (DEFAULT, '$avaliacao', '$jogo', '$cpf');";
$manda = mysqli_query($conn, $database);
header("location:principal.html");

?>