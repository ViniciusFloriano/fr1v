<?php
    include "connection.php";
    if($_GET["tag"] == 1) {
        $user = $_POST["user"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $datanasc = $_POST["datanasc"];
        $cpf = $_POST["cpf"];
        $verifique = mysqli_query($conn, "SELECT email_cadastro FROM tb_cadastro where email_cadastro = '$email'");
        $verifique1 = mysqli_query($conn, "SELECT cpf_cadastro FROM tb_cadastro where cpf_cadastro = '$cpf'");
        if (mysqli_num_rows($verifique) == 1) {
            echo "<script>alert('esse email ja existe'); window.location.href = 'cadastro.html';</script>";
        }
        else if (mysqli_num_rows($verifique1) == 1) {
            echo "<script>alert('esse cpf ja existe'); window.location.href = 'cadastro.html';</script>";
        }
        else {
        $database = "INSERT INTO tb_cadastro VALUES ('$cpf', '$user', '$senha', '$datanasc', '$email', '$nome');";
        $manda = mysqli_query($conn, $database);
        setcookie("cpf", $_POST['cpf'], time()+172800, "/");
        header("location:index.html");
        }
    }  
    else {
        $user = $_POST["user"];
        $senha = $_POST["senha"];
        $verifique = mysqli_query($conn, "SELECT nome_usuario_cadastro FROM tb_cadastro where nome_usuario_cadastro = '$user' and senha_cadastro = '$senha'");
        if (mysqli_num_rows($verifique) == 1) {
            $teste = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cpf_cadastro FROM tb_cadastro WHERE nome_usuario_cadastro = '$user' and senha_cadastro = '$senha'"));
            setcookie("cpf", $teste['cpf_cadastro'] , time()+172800, "/");
            header("location:principal.html");
        }
        else {
            echo "<script>alert('Senha ou Usuario invalidos'); window.location.href = 'index.html';</script>";
        }
    }
    
?>  