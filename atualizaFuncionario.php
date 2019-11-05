<html>
	<head>
		<title>Atualização</title>
	</head>
	<body>
	<?php	
		$codigo 		    = $_POST["codigo"];	
		$nomeFuncionario	= $_POST["nomeFuncionario"];
		$dtNascimento     	= $_POST["dtNascimento"];
		$ativo	         	= $_POST["ativo"];
		$cpf      			= $_POST["cpf"];	
		$rg 				= $_POST["rg"];	
		$setor				= $_POST["setor"];	
		$dtContratacao		= $_POST["dtContratacao"];	
		$escolaridade	    = $_POST["escolaridade"];
	    $sexo	            = $_POST["sexo"];		
		$telefone	        = $_POST["telefone"];
		$celular	        = $_POST["celular"];
		$email   	        = $_POST["email"];
		$salario	        = $_POST["salario"];
		$curriculo      	= $_FILES["curriculo"]["name"];
		$curriculoSize		= $_FILES["curriculo"]["size"];
		$curriculoType		= $_FILES["curriculo"]["type"];
	
	
		// validar dados
		
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
	
	include "conexao.php";
	
		if ($curriculo !=="")
		{
			$curriculoTmp = $_FILES["curriculo"]["tmp_name"];
			$destino="C:/wamp64/www/ProjetoWeb/curriculoFuncionario/$curriculo";
			
			
			if (move_uploaded_file( $curriculoTmp,
									$destino))
				echo "Arquivo transferido com sucesso!<br>";
			else
				die("Falha em transferir o arquivo $curriculo");
		}
	
	// Criando o comando SQL p/gravação dos dados.
	$sql="UPDATE funcionarios SET 
	
		ativo='$ativo',    CPF='$cpf',     RG='$rg',   nomeFuncionario='$nomeFuncionario',  dtNascimento='$dtNascimento',  
		   setor='$setor', dtContratacao='$dtContratacao', escolaridade='$escolaridade', sexo='$sexo', salario='$salario',celular='$celular',email='$email' ";					
		
	if ($curriculo  !=="")
		$sql = $sql . ", docCurriculo='$curriculo' ";		
	
	$sql = $sql . " WHERE codFuncionario=$codigo ";
				
	//die($sql);
	mysqli_query ( $conexao , $sql) or 
	   die("Erro na atualização de dados do funcionarios - " . mysqli_error($conexao));
	  
	echo "Funcionário <b>$nomeFuncionario</b> atualizado com sucesso!";
	echo "<hr>";	
?>
Clique <a href='HOME.html'>aqui</a> para 
continuar

	</body>
</html>