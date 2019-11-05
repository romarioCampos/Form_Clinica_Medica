<?php 		
		//Lógica de Verificaçao		
		
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

		//Conectar ao Banco 
		$url = "localhost";
		$user="root";
		$password="";
		$database="clinicamedica";		
		
		$con = mysqli_connect( $url , $user , $password );		
		
		// Abrindo o banco clinicamedica
		mysqli_select_db($con , $database) or 
			die("Erro na seleção do banco : " . mysqli_error($con));
		
		
		//Comando de inserção
		$comandoSQL = "INSERT INTO caixa 
		(codAgendamento,    codPaciente,     codFuncionario,   codMedico,  codServico,  
		   valorAtendimento, taxaServico, descontoCliente, tipoPagamento, dtFechamento)
		VALUES
		('$codAgendamento', '$codPaciente', '$codFuncionario','$codMedico','$codServico',
		  '$valorAtendimento', '$taxaServico',  '$descontoCliente',  '$tipoPagamento', '$dtFechamento')";	
		
		//Finalizaçao		
		mysqli_query($con , $comandoSQL) or 
			die("Erro na inserção do registro de nova 
				venda" . mysqli_error($con));
				
		echo "Inserido com exito!";
	?>
	<br>
	<a href="listaCaixa.php">Continuar</a>