<?php 		
		//L�gica de Verifica�ao		
		$codAgendamento			= $_POST["codAgendamento"];
		$ativo					= "S";
		$descricao				= $_POST["descricao"];
		$CodMed					= $_POST["CodMed"];
		$servicoAtendimento		= $_POST["servicoAtendimento"];
		//$DataAgendamento		= $_POST["DataAgendamento"];		
		$DataEntrada			= $_POST["DataEntrada"];	
		//$DataAlta			    = $_POST["DataAlta"];	
		$CodPaciente			= $_POST["CodPaciente"];	
		//$DTResultado			= $_POST["DTResultado"];	
		$Convenio			    = $_POST["Convenio"];	
		//$laudo			        = $_POST["laudo"];	
		//$fotoLaudo				= $_FILES["foto"]["size"];
		//$fotoLaudo				= $_FILES["foto"]["type"];
		//$fotoLaudo				= $_FILES["foto"]["tmp_name"];
	
		// validar dados
		if ( strlen($codAgendamento) <1 )
			die("Informe um numero para seu agendamento");
			
		if ( strlen($CodPaciente) <1 )
			die("Informe o codigo do paciente");			
			
		if ( strlen($CodMed) <1 )
			die("Informe o codigo do Medico");
			
		if ( $descricao == "")
			die("Descri�ao do agendamento deve ser informado");
			
		if ( $DataEntrada == "")
			die("Data para agendamento deve ser informada");			
		
		if ( $servicoAtendimento == "")
		die("Tipo do Servi�o deve ser informado");	

		//Conectar ao Banco 
		$url = "localhost";
		$user="root";
		$password="";
		$database="clinicamedica";		
		
		$con = mysqli_connect( $url , $user , $password );		
		
		// Abrindo o banco clinicamedica
		mysqli_select_db($con , $database) or 
			die("Erro na sele��o do banco : " . mysqli_error($con));
		
		
		//Comando de inser��o
		$comandoSQL = "INSERT INTO agenda 
		(descricao,    codMed,     servicoAtendimento,   dataEntrada,  codPaciente,  
		   convenio, ativo)
		VALUES
		('$descricao', '$CodMed', '$servicoAtendimento','$DataEntrada','$CodPaciente',
		  '$Convenio', '$ativo' )";	
		
		//Finaliza�ao		
		mysqli_query($con , $comandoSQL) or 
			die("Erro na inser��o do registro de novo 
				agendamento" . mysqli_error($con));
				
		echo "Agendado com sucesso!";
	?>
	
	<a href="listaAgenda.php">Continuar</a>