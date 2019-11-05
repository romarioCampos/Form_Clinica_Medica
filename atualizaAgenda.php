<html>
	<head>
		<title>Atualização</title>
	</head>
	<body>
	<?php	// salvar como gravarDadosPet.php
		$codigo 		    	= $_POST["codigo"];	
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
			die("Descriçao do agendamento deve ser informado");
			
		if ( $DataEntrada == "")
			die("Data para agendamento deve ser informada");			
		
		if ( $servicoAtendimento == "")
		die("Tipo do Serviço deve ser informado");	
	
	include "conexao.php";
	
	
	// Criando o comando SQL p/gravação dos dados.
	$sql="UPDATE agenda SET 
	
		descricao='$descricao',    codMed='$CodMed',     servicoAtendimento='$servicoAtendimento',   dataEntrada='$DataEntrada',  codPaciente='$CodPaciente',  
		   convenio='$Convenio', ativo='$ativo'";	
			
				
	
	$sql = $sql . " WHERE codAgendamento=$codigo ";
				
	//die($sql);
	mysqli_query ( $conexao , $sql) or 
	   die("Erro na atualização de dados do agendamento - " . mysqli_error($conexao));
	  
	echo "Código do agendamento <b>$codAgendamento</b> atualizado com sucesso!";
	echo "<hr>";	
?>
Clique <a href='HOME.html'>aqui</a> para 
continuar

	</body>
</html>