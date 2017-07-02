<?php

// Informacao sobre o acesso a base de dados
$servername = 'localhost:3308';
$username = 'root';
$password = '';
$dbname = "jogo_tm";

// Criar a conexão 
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Validar a conexão
if (mysqli_connect_errno()) {
    die("Erro ao conectar !");
} 

// comando sql para eliminar todos os registos (Remove as linhas da tabela, nao a tabela)
$sql = "TRUNCATE TABLE game"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location:readScore.php'); //lista de todos os jogos (volta atras)
    exit;
} else {
    echo "Erro ao eliminar o registo !";
}
// Desconectar a conexão
mysqli_close($conn);
exit();
?>