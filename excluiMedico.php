<?php
	
	$conexao=mysqli_connect("localhost","root","");
	
	mysqli_select_db($conexao,"clinicamedica") or 
		die("Erro na seleção do banco:" 
			. mysqli_error($conexao) );
	
	if ( ! isset($_GET["c"]))
	  die("Rotina chamada de forma errada!");
	  
	$codMedico = $_GET["c"];
	$comandoSQL = "DELETE FROM 
					medicos WHERE codMedico=$codMedico";
	
	mysqli_query($conexao, $comandoSQL);
	echo "Registro eliminado com sucesso!<br>";
?>
<a href="listaMedico.php">Continuar em listagem</a>
<br><br>
<a href="Cadmedico">Continuar em Cadastro</a>
