<?php 		
		//Lógica de Verificaçao
		$descricao   						=$_POST["descricao"];
		$valorservico      					=$_POST["valorservico"];
		$servicoativo	         			=$_POST["servicoativo"];

	
		// validar dados
		if ( $servicoativo == "")
			die("Servico Ativo?");
		
		if ( $descricao == "")
			die("A descrição do Servico foi informada?");
		
		if ( $valorservico == "")
			die("Valor do Serviço foi informado?");
		

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
		$comandoSQL = "INSERT INTO servicos 
		(servicoativo, descricao, valorservico)
		   
		VALUES ('$servicoativo', '$descricao', '$valorservico')";	
		
		//Finalizaçao		
		mysqli_query($con , $comandoSQL) or 
			die("Erro na insercao do registro do servico" . mysqli_error($con));
				
		echo "Inserido com exito!";
	?>
	<br>
	<a href="listaServico.php">Continuar</a>