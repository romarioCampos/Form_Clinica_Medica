<?php
	
	$conexao=mysqli_connect("localhost","root","");
	
	mysqli_select_db($conexao,"clinicamedica") or 
		die("Erro na seleção do banco:" 
			. mysqli_error($conexao) );
	
	if ( ! isset($_GET["c"]))
	  die("Rotina chamada de forma errada!");
	  
	$codPaciente = $_GET["c"];
	$comandoSQL = "DELETE FROM 
					pacientes WHERE codPaciente=$codPaciente";
	
	mysqli_query($conexao, $comandoSQL);
	echo "Registro eliminado com sucesso!<br>";
?>
<a href="listaPaciente.php">Continuar em listagem</a>
<br><br>
<a href="Cadpaciente">Continuar em Cadastro</a>
