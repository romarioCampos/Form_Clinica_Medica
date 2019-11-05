<html>
	<head>
		<title>Atualização</title>
	</head>
	<body>
	<?php
		$codigo 		    = $_POST["codigo"];	
		$nomeMedico			= $_POST["nomeMedico"];
		$dtNascimento     	= $_POST["dtNascimento"];
		$medicoativo	    = $_POST["medicoativo"];
		$CPF      			= $_POST["CPF"];	
		$RG 				= $_POST["RG"];	
		$CRM				= $_POST["CRM"];	
		$especialidade		= $_POST["especialidade"];	
		$dtContratacao	    = $_POST["dtContratacao"];
	    $escolaridade	    = $_POST["escolaridade"];		
		$sexo	       		= $_POST["sexo"];
		$salario	        = $_POST["salario"];
		$telefone   	    = $_POST["telefone"];
		$celular	        = $_POST["celular"];
		$email	        	= $_POST["email"];
	
		// validar dados
		
		if ( strlen($medicoativo) <1 )
		die("Medico Ativo ?");	
		
		if ( strlen($dtNascimento) <1 )
		die("Data de Nascimento precisa ser informado");
	
		if ( $especialidade == "")
		die("Especialidade do Medico precisa ser informado");
	
		if ( $nomeMedico == "")
		die("Nome do Medico precisa ser informado");
	
		if ( strlen($salario) <1 )
		die("Salário do Medico precisa ser informado");

		if ( strlen($CPF) <1 )
			die("Informe o numero de CPF");

		if ( strlen($RG) < 1 )
			die("Informe o numero de RG");
		
		if ( strlen($CRM) < 1 )
			die("Informe o numero do CRM");

		if ( strlen($dtContratacao) <1 )
		die("Data de Contratação do Medico precisa ser informado");

		if ( strlen($telefone) < 1 && strlen($celular) <1)
			die("Informe o numero de telefone ou numero de celular");

		if ( $escolaridade == "")
		die("Escolaridade do Medico precisa ser informado");
	
	include "conexao.php";
	
	// Criando o comando SQL p/gravação dos dados.
	$sql="UPDATE medicos SET 
	
			medicoativo='$medicoativo', CPF='$CPF', RG='$RG', nomeMedico='$nomeMedico', dtNascimento='$dtNascimento',  
		   CRM='$CRM', dtContratacao='$dtContratacao', escolaridade='$escolaridade', sexo='$sexo', salario='$salario',celular='$celular',email='$email' ";
	
	$sql = $sql . " WHERE codMedico=$codigo ";
				
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