<!DOCTYPE html>

<head>
<title>Lista das pontuacoes de todos os jogos</title>
</head>

<?php

// Informacao sobre o acesso a base de dados
$servername = 'localhost:3308';
$username = 'root';
$password = '';
$dbname = "jogo_tm";

// Criar a conexão 
$con= mysqli_connect($servername, $username, $password, $dbname);
// Validar a conexão
if (mysqli_connect_errno())
{
echo "Erro ao conectar a base de dados: " . mysqli_connect_error();
}

// comando sql para ler da base de dados toda a informacao necessaria da tabela "game"
$result = mysqli_query($con,"SELECT code,nameGame,points FROM game");

echo '<span style="color:#0000FF;text-align:center;">Lista das Pontuacoes dos Jogos:</span>';
// Codigo referente a criacao da tabela
echo "<table border='1'>
<tr>
<th>Codigo do Jogo</th>
<th>Nome do Jogo</th>
<th>Pontuacao</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
// Inserir informacao lida da base de dados na tabela
echo "<tr>";
echo "<td>" . $row['code'] . "</td>";
echo "<td>" . $row['nameGame'] . "</td>";
echo "<td>" . $row['points'] . "</td>";
echo "</tr>";
}
echo "</table>";

// Criacao de um botao que permite eliminar todas as linhas (Registos) presentes na base de dados, nao eliminando a tabela
echo "<form  name=\"Patient\" action=\"deleteScore.php\" method=\"get\">";
echo "<input type=\"submit\" value=\"Eliminar todos os registos da tabela\">";
echo "</form>";

// Criacao de um botao que permite gerar um pdf utilizando a framework fpdf
// Este framework é desenvolvido em PHP e orientado a objetos,fpdf armazenar a saída de estrutura e oferece a possibilidade de efetuar o  download do arquivo.
// Fpdf oferece a vantagem de permitir criar um pdf a partir do php com relativa facilidade fazendo intermediário entre as funções básicas 
//de saída de dados e o utilizador
echo "<form name=\"Patient\" action=\"generatedPDF.php\" method=\"get\">";
echo "<input type=\"submit\" value=\"Gerar PDF\">";
echo "</form>";

// Insercao de uma imagem por baixo da tabela de informacao 
echo "<img src='/phaser/Jogo/assets/logoESTG.png' alt='logoESTG' />";
mysqli_close($con);
?>