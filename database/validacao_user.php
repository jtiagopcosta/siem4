<?php

include_once ("../common/database.php");

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$senha_md5 = md5($senha);

$query = "set schema 'trabalho2';"; 
pg_exec($conn, $query);


$query = "SELECT * from usuarios where nome =  '" . $nome . "' AND senha_md5 = '" . $senha_md5 . "';" ;
echo "query: " . $query . "<p>";
       


$result = pg_exec($conn, $query);
$num_registos = pg_numrows($result);



//Se o n� de registos n�o for 0 ent�o � v�lido
session_start();
		if ($num_registos > 0)
        {
			$_SESSION['autenticado'] = true;
			$_SESSION['nome'] = $_POST['nome'];
		}
header("Location: ../index.php");




pg_close($conn);
?>
