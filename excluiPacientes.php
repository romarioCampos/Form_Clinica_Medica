<?php // salvar como excluirPets.php
	
	$conexao=mysqli_connect("localhost","root","");
	
	mysqli_select_db($conexao,"clinicamedica") or 
		die("Erro na seleção do banco:" 
			. mysqli_error($conexao) );
	
	if ( ! isset($_GET["c"]))
	  die("Rotina chamada de forma errada!");
	  
	$codigodopaciente = $_GET["c"];
	$comandoSQL = "DELETE FROM 
					agenda WHERE codigodopaciente=$codigodopaciente";
	
	mysqli_query($conexao, $comandoSQL);
	echo "Registro eliminado com sucesso!<br>";
?>
<a href="listaPacientes.php">Continuar em listagem</a>
<br><br>
<a href="Cadpacientes">Continuar Registro dos Pacientes</a>
