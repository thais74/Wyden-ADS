
<?php
// O MySQL é um sistema de gerenciamento de banco de dados criado em 1995. Inicialmente de código aberto, foi adquirido posteriormente pela Oracle, que, atualmente, mantém tanto uma versão GPL quanto uma versão comercial. Trata-se de um dos SGBDs mais utilizados na web, sendo, normalmente, associado ao PHP, dada a facilidade de conexão entre ambos.


// Em PHP, estão disponíveis vários métodos e funções, através da extensão que leva o mesmo nome do SGBD, para conexão e execução de instruções SQL no MySQL.

//Para fins de comparação, o código abaixo demonstra a conexão com o MySQL e a execução de uma instrução de consulta SQL utilizando as funções PHP específicas para o SGBD em questão.
//Constantes para armazenamento das variáveis de conexão.


define('HOST', '127.0.0.1');
define('DBNAME', 'test');
define('USER', 'user');
define('PASSWORD', 'psswd');

//Conectando com o Servidor
$conn = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die( ' Não foi possível conectar.' );

//Realizando uma consulta no BD
$instrucaoSQL = "Select nome, cpf, telefone From Cliente";
$stmt = mysqli_prepare($conn, $instrucaoSQL);
mysqli_stmt_bind_result($stmt, $nome, $cpf, $tel);
mysqli_stmt_execute($stmt);

while (mysqli_stmt_fetch($stmt)) {
	echo $nome . "\t";
	echo $cpf . "\t";
	echo $tel . "\n";
}

//Encerrando a conexão
mysqli_close($conn);

