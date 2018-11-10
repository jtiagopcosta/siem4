<!DOCTYPE html>

<html>
	<head>
	    <link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/principal.css" type="text/css"/>
		<link rel="stylesheet"  href="css/login.css" type="text/css"/>
		<link rel="stylesheet"  href="css/barralateral.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

<body>
	<div >
		<?php
		session_start();
		 			if($_SESSION['autenticado'] ){ ?>
			
			<ul>	
			Olá <b> <?php echo $_SESSION['nome'];?> </b>, como estás?
               
			    <form method='post' action='acaoLogout.php'>
				<input class="submitlogin" type='submit' name='logout' value='logout'></input>
				</form>
			</ul>
			

				<?php }
				else {
					 ?>
				<ul class="barra">
				<a href="registro.php" class="registro">Registar-se</a>
				<form method="POST" action="database/validacao_user.php">
				<input class="submitlogin" type="submit" value="Sign in" />
				<li class="login"><input type="Password" name="senha" placeholder="Password" class="firstbar"></li>
				<li class="login"><input type="Login" name="nome" placeholder="Username" class="firstbar"></li>	
				</form>
				<?php } ?>

			
		</ul>
	</div>	

		<div id="div_top">
			<h1>Cin&eacutefilos.pt</h1>
			<img src="./img/title.jpg" width="100%" height="100%">
		</div>

	<!-- menu -->

	<ul>
		<li><a class="active" href="index.php">Em destaque</a></li>
		<li><a href="filmes.php">Filmes</a></li>
		<li><a href="sobre.html">Sobre</a></li>
		<li><a href="formulario.html">Inserir</a></li>
		<li  class="barrapesquisa">
			<input type="search" name="pesquisa" placeholder="pesquisa" class="input p">
		</li>
	</ul>


		<div class="main_div">

		<!-- primeira fila -->
		
		<div class="row">
		
		<?php 

		include_once("database/getfilmes.php");

		$result = get_filmes();	

		global $j;
		$j=0;
		while ($j < 5) { 

			$linha = pg_fetch_row($result,$j); ?>
			
			<div class="column">
					<a href="filmepag.php?id=<?=$linha[0]?>">
					<img  class="imagem" src="./img/<?=$linha[7]?>" width="100%">
					<a>
			</div>
			
		<?php $j++;  } ?>
		</div>
			
			<!-- segunda fila -->
			<div class="row">
				
				
				<?php 
				
				while ($j < 10) { 

					$linha = pg_fetch_row($result,$j); ?>
					
					<div class="column">
							<a href="filmepag.php?id=<?=$linha[0]?>">
							<img  class="imagem" src="./img/<?=$linha[7]?>" width="100%">
							<a>
					</div>
					
				<?php $j++;  } ?>
			</div>
		</div>
	</body>

</html>
