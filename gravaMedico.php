<?php 		
		//Lógica de Verificaçao		
		$nomeMedico					=$_POST["nomeMedico"];
		$dtNascimento				=$_POST["dtNascimento"];
		$medicoativo 				=$_POST["medicoativo"];
		$CPF	         			=$_POST["CPF"];
		$RG 						=$_POST["RG"];
		$CRM 						=$_POST["CRM"];
		$especialidade 				=$_POST["especialidade"];
		$dtContratacao				=$_POST["dtContratacao"];
		$escolaridade				=$_POST["escolaridade"];			
		$sexo	 					=$_POST["sexo"];
		$salario					=$_POST["salario"];
		$telefone					=$_POST["telefone"];
		$celular					=$_POST["celular"];
		$email						=$_POST["email"];
	
		// validar dados
		if ( $medicoativo == "")
			die("Medico Ativo ?");	
		
		if ( $dtContratacao == "")
			die("Data de Contratacao precisa ser informado");
	
		if ( $nomeMedico == "")
			die("Nome do Medico precisa ser informado");
	
		if ( $salario == "")
			die("Salário do Medico precisa ser informado");

		if ( strlen($CPF) <1 )
			die("Informe o numero de CPF");

		if ( strlen($RG) < 1 )
			die("Informe o numero de RG");
		
		if ( strlen($CRM) < 1 )
			die("Informe o numero de CRM");

		if ( $escolaridade == "")
			die("Escolaridade do Medico precisa ser informado");

		if ( $especialidade == "")
			die("Especialidade do Medico precisa ser informada");	

		if ( strlen($telefone) < 1 && strlen($celular) <1)
			die("Informe o numero de telefone ou numero de celular");

		//Conectar ao Banco 
		$url = "localhost";
		$user="root";
		$password="";
		$database="clinicamedica";		
		
		$con = mysqli_connect( $url , $user , $password );		
		
		// Abrindo o banco clinicamedica
		mysqli_select_db($con , $database) or 
			die("Erro na selecao do banco : " . mysqli_error($con));
		
		//Comando de inserção
		$comandoSQL = "INSERT INTO medicos 
		(nomeMedico, dtNascimento, medicoativo, CPF, RG, CRM,  
		   especialidade, dtContratacao, escolaridade, sexo, salario, telefone, celular, email)
		   
		VALUES ('$nomeMedico', '$dtNascimento', '$medicoativo', '$CPF','$RG', '$CRM',
		  '$especialidade', '$dtContratacao','$escolaridade','$sexo', '$salario', '$telefone', '$celular','$email')";	
		
		//Finalizaçao		
		mysqli_query($con , $comandoSQL) or 
			die("Erro na insercao do registro de medico" . mysqli_error($con));
				
		echo "Inserido com exito!";
	?>
	<br>
	<a href="listaMedico.php">Continuar</a>