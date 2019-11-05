<?php
	
	$conexao=mysqli_connect("localhost","root","");
	
	mysqli_select_db($conexao,"clinicamedica") or 
		die("Erro na seleção do banco:" 
			. mysqli_error($conexao) );
	
	if ( ! isset($_GET["c"]))
	  die("Rotina chamada de forma errada!");
	  
	$codCaixa = $_GET["c"];
	$comandoSQL = "DELETE FROM 
					caixa WHERE codCaixa=$codCaixa";
	
	mysqli_query($conexao, $comandoSQL);
	echo "Registro eliminado com sucesso!<br>";
?>
<a href="listaCaixa.php">Continuar em listagem</a>
<br><br>
<a href="CadCaixa.html">Continuar em Caixa</a>
