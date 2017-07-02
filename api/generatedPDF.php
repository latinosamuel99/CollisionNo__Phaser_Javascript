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
// Selecionar as linhas que contem os registos dos jogos
$result = mysqli_query($con,"SELECT * FROM game");
// Selecionar as colunas referente a tabela do jogo ("game")
$header = mysqli_query($con,"SELECT `COLUMN_NAME` 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='jogo_tm' 
AND `TABLE_NAME`='game'");

//importart fpdf para permitir criar um pdf
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Ln();
$pdf->Write(20, "Lista das pontuacoes de todos os jogos:"); 
$pdf->Ln();
		
foreach($header as $heading) {
	foreach($heading as $column_heading)
		// Inserir as colunas no pdf existentes na base de dados
		$pdf->Cell(30,12,$column_heading,1);
}
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		// Inserir todos os registos presentes na base de dados no pdf
		$pdf->Cell(30,12,$column,1);
}
// Concluir insercoes no pdf (Fechar)
$pdf->Output();
?>