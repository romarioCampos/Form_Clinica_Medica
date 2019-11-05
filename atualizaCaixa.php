<html>
	<head>
		<title>Atualização</title>
	</head>
	<body>
	<?php	
	    $codigo 		        = $_POST["codigo"];	
		$codAgendamento			= $_POST["codAgendamento"];
		$codPaciente     		= $_POST["codPaciente"];
		$codFuncionario			= $_POST["codFuncionario"];
		$codMedico      		= $_POST["codMedico"];	
		$codServico 			= $_POST["codServico"];	
		$valorAtendimento		= $_POST["valorAtendimento"];	
		$taxaServico		    = $_POST["taxaServico"];	
		$descontoCliente	    = $_POST["descontoCliente"];
	    $tipoPagamento	        = $_POST["tipoPagamento"];		
		$dtFechamento	        = $_POST["dtFechamento"];	
	
		// validar dados
		if ( strlen($codAgendamento) <1 )
			die("Informe o numero do agendamento");
			
		if ( strlen($codPaciente) <1 )
			die("Informe o codigo do paciente");			
			
		if ( strlen($codFuncionario) <1 )
			die("Informe o codigo do funcionario");
		
		if ( strlen($codMedico) <1 )
			die("Informe o codigo do Médico Executante");
		
		if ( strlen($codServico) <1 )
			die("Informe o codigo do Serviço realizado");			
			
		if ( $valorAtendimento == "")
			die("Valor do Atendimento precisa ser informado");
			
		if ( $dtFechamento == "")
			die("Data de fechamento nao pode ser nula");			

		if ( $tipoPagamento == "")
			die("Tipo de pagamento deve ser informado");	
	
	include "conexao.php";
	
	
	// Criando o comando SQL p/gravação dos dados.
	$sql="UPDATE caixa SET 
	
			codAgendamento='$codAgendamento',    codPaciente='$codPaciente',     codFuncionario='$codFuncionario',   codMedico='$codMedico',  codServico='$codServico',  
		   valorAtendimento='$valorAtendimento', taxaServico='$taxaServico', descontoCliente='$descontoCliente', tipoPagamento='$tipoPagamento', dtFechamento='$dtFechamento'";	
	
	$sql = $sql . " WHERE codCaixa=$codigo ";
				
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