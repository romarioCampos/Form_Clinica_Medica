<?php // salvar como excluirPets.php
	
	$conexao=mysqli_connect("localhost","root","");
	
	mysqli_select_db($conexao,"clinicamedica") or 
		die("Erro na sele��o do banco:" 
			. mysqli_error($conexao) );
	
	if ( ! isset($_GET["c"]))
	  die("Rotina chamada de forma errada!");
	  
	$codAgendamento = $_GET["c"];
	$comandoSQL = "DELETE FROM 
					agenda WHERE codAgendamento=$codAgendamento";
	
	mysqli_query($conexao, $comandoSQL);
	echo "Registro eliminado com sucesso!<br>";
?>
<a href="listaAgenda.php">Continuar em listagem</a>
<br><br>
<a href="Cadagenda.html">Continuar Agendando</a>
