<html>
	<head>
		<title>Atualização</title>
	</head>
	<body>
	<?php	
	    $codigo 		        			=$_POST["codigo"];	
		$$descricao   						=$_POST["descricao"];
		$valorservico      					=$_POST["valorservico"];
		$servicoativo	         			=$_POST["servicoativo"];	
	
		// validar dados
		if ( strlen($servicoativo) <1 )
			die("Servico Ativo?");
		
		if ( $descricao == "")
			die("A descrição do Servico foi informada?");
		
		if ( strlen($valorservico) <1 )
			die("Valor do Serviço foi informado?");	
	
	include "conexao.php";
	
	// Criando o comando SQL p/gravação dos dados.
	$sql="UPDATE caixa SET 
	
			servicoativo='$servicoativo', descricao='$descricao', valorservico='$valorservico'";	
	
	$sql = $sql . " WHERE codServico=$codigo ";
				
	//die($sql);
	mysqli_query ( $conexao , $sql) or 
	   die("Erro na atualização de dados da conta - " . mysqli_error($conexao));
	  
	echo "Conta <b>$codigo</b> atualizado com sucesso!";
	echo "<hr>";	
?>
Clique <a href='HOME.html'>aqui</a> para 
continuar

	</body>
</html>