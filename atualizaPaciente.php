<html>
	<head>
		<title>Atualização</title>
	</head>
	<body>
	<?php	
	    $codigo 		        	= $_POST["codigo"];	
		$nomePaciente				=$_POST["nomePaciente"];
		$dtNascimento				=$_POST["dtNascimento"];
		$pacienteativo				=$_POST["pacienteativo"];
		$CPF	         			=$_POST["CPF"];
		$RG 						=$_POST["RG"];
		$especialidademedica		=$_POST["especialidademedica"];
		$dtContratacao				=$_POST["dtContratacao"];
		$escolaridade				=$_POST["escolaridade"];			
		$sexo						=$_POST["sexo"];
		$salario					=$_POST["salario"];
		$telefone					=$_POST["telefone"];
		$celular					=$_POST["celular"];
		$email						=$_POST["email"];
	
		// validar dados
		if ( strlen($pacienteativo) <1 )
			die("Paciente Ativo ?");	
		
		if ( strlen($dtContratacao) <1 )
			die("Data de Contratacao precisa ser informado");
	
		if ( $nomePaciente == "")
			die("Nome do Paciente precisa ser informado");
	
		if ( strlen($salario) <1 )
			die("Renda do Paciente precisa ser informado");

		if ( strlen($CPF) <1 )
			die("Informe o numero de CPF");

		if ( strlen($RG) < 1 )
			die("Informe o numero de RG");

		if ( $especialidademedica == "")
			die("Especialidade medica do Paciente precisa ser informado");			
	
		if ( strlen($telefone) < 1 && strlen($celular) <1)
			die("Informe o numero de telefone ou numero de celular");

		if ( $escolaridade == "")
			die("Escolaridade do Paciente precisa ser informado");	
	
	include "conexao.php";
	
	// Criando o comando SQL p/gravação dos dados.
	$sql="UPDATE caixa SET 
	
			nomePaciente='$nomePaciente', dtNascimento='$dtNascimento', pacienteativo='$pacienteativo', CPF='$CPF ', RG='$RG',
		  especialidademedica='$especialidademedica', dtContratacao='$dtContratacao', escolaridade='$escolaridade', sexo='$sexo', salario='$salario', telefone='$telefone', celular='$celular', email='$email'";	
	
	$sql = $sql . " WHERE codPaciente=$codigo ";
				
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