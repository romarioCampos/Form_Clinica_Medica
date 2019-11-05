<?php 		
		//Lógica de Verificaçao		
		$nomeFuncionario	= $_POST["nomeFuncionario"];
		$dtNascimento     	= $_POST["dtNascimento"];
		$ativo	         	= $_POST["ativo"];
		$cpf      			= $_POST["cpf"];	
		$rg 				= $_POST["rg"];	
		$setor				= $_POST["setor"];	
		$dtContratacao		= $_POST["dtContratacao"];	
		$escolaridade	        = $_POST["escolaridade"];
	    $sexo	                = $_POST["sexo"];		
		$telefone	        = $_POST["telefone"];
		$celular	        = $_POST["celular"];
		$email   	        = $_POST["email"];
		$salario	        = $_POST["salario"];
		$curriculo      	= $_FILES["curriculo"]["name"];
		$curriculoSize		= $_FILES["curriculo"]["size"];
		$curriculoType		= $_FILES["curriculo"]["type"];
	
	
		// validar dados
	
		if ($curriculo !== "")
		{
			$curriculoTmp = $_FILES["curriculo"]["tmp_name"];
			$destino="C:/wamp/www/AllProject/curriculoFuncionario/$curriculo";
			
			//transferir a foto/arquivo que veio
			if (move_uploaded_file( $curriculoTmp,
									$destino))
				echo "Arquivo transferido com sucesso!<br>";
			else
				die("Falha em transferir o arquivo $curriculo");
		}
	
		if ( $ativo == "")
		die("Funcionario Ativo ?");	
		
		if ( $dtNascimento == "")
		die("Data de Nascimento precisa ser informado");
	
		if ( $dtContratacao == "")
		die("Data de Contratacao precisa ser informado");
	
		if ( $nomeFuncionario == "")
		die("Nome do Funcionario precisa ser informado");
	
		if ( $salario == "")
		die("Salário do Funcionario precisa ser informado");

		if ( strlen($cpf) <1 )
			die("Informe o numero de CPF");

		if ( strlen($rg) < 1 )
			die("Informe o numero de RG");

		if ( $escolaridade == "")
		die("Escolaridade do Funcionario precisa ser informado");			
		

		if ( strlen($telefone) < 1 && strlen($celular) <1)
			die("Informe o numero de telefone ou numero de celular");


		if ( $escolaridade == "")
		die("Escolaridade do Funcionario precisa ser informado");


		if ( $curriculo == "")
		die("Anexe documento do funcionario");

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
		$comandoSQL = "INSERT INTO funcionarios 
		(ativo,    CPF,     RG,   nomeFuncionario,  dtNascimento,  
		   setor, dtContratacao, escolaridade, sexo, salario,celular,email,docCurriculo)
		   
		VALUES ('$ativo', '$cpf', '$rg','$nomeFuncionario', '$dtNascimento',
		  '$setor', '$dtContratacao','$escolaridade','$sexo', '$salario','$celular','$email','$curriculo')";	
		
		//Finalizaçao		
		mysqli_query($con , $comandoSQL) or 
			die("Erro na insercao do registro de funcionario" . mysqli_error($con));
				
		echo "Inserido com exito!";
	?>
	<br>
	<a href="listaFuncionario.php">Continuar</a>