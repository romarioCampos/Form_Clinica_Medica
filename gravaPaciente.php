<?php 	
		$nomePaciente						=$_POST["nomePaciente"];
		$dtNascimento						=$_POST["dtNascimento"];
		$pacienteativo 						=$_POST["pacienteativo"];
		$cpf	         					=$_POST["cpf"];
		$rg 								=$_POST["rg"];
		$especialidademedica 				=$_POST["especialidademedica"];
		$dtContratacao						=$_POST["dtContratacao"];
		$escolaridade						=$_POST["escolaridade"];			
		$sexo	 							=$_POST["sexo"];
		$salario							=$_POST["salario"];
		$telefone							=$_POST["telefone"];
		$celular							=$_POST["celular"];
		$email								=$_POST["email"];

	
		// validar dados
		if ( $pacienteativo == "")
		die("Paciente Ativo ?");	
		
		if ( $dtContratacao == "")
		die("Data de Contratacao precisa ser informado");
	
		if ( $nomePaciente == "")
		die("Nome do Paciente precisa ser informado");
	
		if ( $salario == "")
		die("Renda do Paciente precisa ser informado");

		if ( strlen($cpf) <1 )
			die("Informe o numero de CPF");

		if ( strlen($rg) < 1 )
			die("Informe o numero de RG");

		if ( $escolaridade == "")
		die("Escolaridade do Paciente precisa ser informado");			
	
		if ( strlen($telefone) < 1 && strlen($celular) <1)
			die("Informe o numero de telefone ou numero de celular");

		if ( $escolaridade == "")
		die("Escolaridade do Paciente precisa ser informado");

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
		$comandoSQL = "INSERT INTO pacientes 
		(pacienteativo        ,    CPF,     RG,   nomePaciente ,  dtNascimento,  
		   especialidademedica, dtContratacao, escolaridade, sexo, salario,telefone,celular,email)
		   
		VALUES ('$pacienteativo', '$cpf', '$rg','$nomePaciente ', '$dtNascimento',
		  '$especialidademedica', '$dtContratacao','$escolaridade','$sexo', '$salario','$telefone','$celular','$email')";	
		
		//Finalizaçao		
		mysqli_query($con , $comandoSQL) or 
			die("Erro na insercao do registro do paciente" . mysqli_error($con));
				
		echo "Inserido com exito!";
	?>
	<br>
	<a href="listaPaciente.php">Continuar</a>