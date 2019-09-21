<?php
include "connection.php";
include "gerar_grafico.php";

$html = '<table border = 1';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<td>ID</td>';
$html .= '<td>Nome</td>';
$html .= '<td>E-mail</td>';
$html .= '</tr>';
$html .= '</thead>';


$consulta = "SELECT * FROM tb_cadastro";
$con = $conn->query($consulta);
$consulta1 = "SELECT min(data_acesso), nome_jogo FROM tb_acesso JOIN tb_jogo;";
$consulta2 = "SELECT * FROM tb_acesso;";
$consulta3 = "SELECT * FROM tb_avaliacao;";
$consulta4 = "SELECT tb_jogo.nome_jogo FROM tb_jogo JOIN tb_acesso on tb_jogo.id_jogo = tb_acesso.id_jogo JOIN tb_cadastro on tb_cadastro.cpf_cadastro = tb_acesso.cpf_cadastro where tb_jogo.id_jogo = 1;";
$consulta5 = "SELECT tb_jogo.nome_jogo FROM tb_jogo JOIN tb_acesso on tb_jogo.id_jogo = tb_acesso.id_jogo JOIN tb_cadastro on tb_cadastro.cpf_cadastro = tb_acesso.cpf_cadastro where tb_jogo.id_jogo = 2;";
$consulta6 = "SELECT tb_jogo.nome_jogo FROM tb_jogo JOIN tb_acesso on tb_jogo.id_jogo = tb_acesso.id_jogo JOIN tb_cadastro on tb_cadastro.cpf_cadastro = tb_acesso.cpf_cadastro where tb_jogo.id_jogo = 3;";
$con1 = mysqli_fetch_assoc(mysqli_query($conn,$consulta1));
$dado3 = mysqli_num_rows(mysqli_query($conn,$consulta2));
$dado5 = mysqli_num_rows(mysqli_query($conn,$consulta3));
$dado1 = $con1['min(data_acesso)'];
$dado2 = $con1['nome_jogo'];
$dado6 = mysqli_num_rows(mysqli_query($conn,$consulta4));
$dado7 = mysqli_num_rows(mysqli_query($conn,$consulta5));
$dado8 = mysqli_num_rows(mysqli_query($conn,$consulta6));




GerarFoto($dado6, $dado7, $dado8);









while($dado = $con->fetch_array()){
	$html .= '<tbody>';
	$html .= '<tr><td>'.$dado['cpf_cadastro']."</td>";
	$html .= '<td>'.$dado['nome_cadastro']."</td>";
	$html .= '<td>'.$dado['senha_cadastro']."</td></tr>";
	$html .= '</tbody>';
}

$html .= '</table>';

require 'dompdf/vendor/autoload.php';
use Dompdf\Dompdf;
   
$dompdf = new Dompdf();

$dompdf->load_html('

    <h1 style= "text-align: center;">Relatório</h1><br>
    A primeira data de acesso foi:........................................................................................... '.$dado1.'<br>
    O primeiro jogo acessado foi:............................................................................................ '.$dado2.'<br><hr>
    Quantidade total de jogos acessados:........................................................................................... '.$dado3.'<br><hr>
    Quantidade total de avaliações........................................................................................... '.$dado5.'<br>
    <h2>Gráfico</h2><center><img src="image.png" /></center><br>
    
    '.$html.'

');

$dompdf->render();

$dompdf->stream("relatorio.pdf", array("Attachment" => false));
?>