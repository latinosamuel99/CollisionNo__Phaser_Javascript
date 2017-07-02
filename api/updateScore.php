<?php

// O Post e um método que é feito através de formulários (Tag <form>), onde passamos informações para uma 
//outra página que irá recebê-las e fazer o que o desenvolvedor quiser, como tratamento dos dados, armazenamento no banco de dados, etc.
//Neste caso quero inserir a pontuacao na base de dados, logo estou a passar o "points"
    if( isset( $_POST['points'] ) ){
        $points = $_POST['points'];
 }
 
 // Informacao sobre o acesso a base de dados
$servername = 'localhost:3308';
$username = 'root';
$password = '';
$dbname = "jogo_tm";

// Criar a conexão 
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Validar a conexão
if (mysqli_connect_errno()) {
    die("Erro ao conectar a base de dados !");
} 
// Insere na pagina php o numero de pontos a inserir na base de dados
echo "<h2>$points</h2>";

// comando sql para inserir na base de dados a pontuacao do jogo representado pela variavel "points"
$sql = "INSERT INTO game (name,points)
VALUES ('Jogo','$points')";

// Verificacao de insercao da pontuacao do jogo na base de dados
if(!mysqli_query ($conn, $sql)){
	echo 'Informacao nao Inserida';
}else{
	echo 'Informacao Inserida';
}
// Desconectar a base de dados(cancelar ligacao)
mysqli_close($conn);
exit();
?>