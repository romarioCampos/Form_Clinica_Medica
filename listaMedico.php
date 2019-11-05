<html>
	<head>
		<title>Registros dos Medicos</title>
	</head>
	<body>
	<?php
		// Conectar ao Banco 
		$endereco 	= 'localhost';
		$usuario	= 'root';
		$senha		= '';
		$banco		= "clinicamedica";
		
		$conexao = mysqli_connect (	$endereco, 
									$usuario ,
									$senha);

		// Abrir conexao
		mysqli_select_db( $conexao , $banco) or
		  die("Erro ao selecionar o banco
			   clinicamedica: " . mysqli_error($conexao));
		
		// Comando de seleção em variável
		$comandoSQL="SELECT codMedico, CPF, nomeMedico, dtNascimento, email, dtContratacao FROM medicos";
		
		// Comando para o banco
		$registros = mysqli_query($conexao , $comandoSQL) 
			or die("Erro na seleção de registros dos 
			  Medicos: " . mysqli_error($conexao)) ;
			  
		// Numero de linhas
		$linhas = mysqli_num_rows($registros);
		
		if ($linhas ==0) 
			die ("Tabela de <b>Medicos</b> esta vazia!");
		
		echo "Foram encontrados <b>$linhas</b> registros <br>";
		
		// Exibindo os dados
		$contador = 0;		
		echo "<table border='1'>";
		echo "	<tr>";
		echo "		<th>codigo</th>";
		echo "		<th>CPF</th>";		
		echo "		<th>Nome</th>";
		echo "		<th>Data de Nascimento</th>";
		echo "		<th>email</th>";
		echo "		<th>Data de Contratacao</th>";
		echo "	</tr>";		
		
		while ($contador < $linhas)
		{
			$dados			= mysqli_fetch_array($registros);
			$codMedico		= $dados["codMedico"];
			$CPF			= $dados["CPF"];
			$nomeMedico		= $dados["nomeMedico"];
			$dtNascimento	= $dados["dtNascimento"];
			$email			= $dados["email"];
			$dtContratacao	= $dados["dtContratacao"];				
			echo "<tr>";
			
			echo "	<td>$codMedico</td>" ;
			echo "	<td>$CPF</td>" ;
			echo "	<td>$nomeMedico</td>" ;
			echo "	<td>$dtNascimento</td>" ;
			echo "	<td>$email</td>" ;
			echo "	<td>$dtContratacao</td>" ;
			echo "  <td> 
						<a href='excluiMedico.php?c=$codMedico'>
						Excluir Dados</a> 
					</td>";
			echo "		<td> <a href='alterMedico.php?c=$codMedico'>Alterar</td>";
					
			echo "</tr>";
		
			++$contador;
		}
		echo "</table>";
		
		echo "Listagem Realizada!";
		
	?>
	<br>
	<a href="Cadmedico.html">Voltar</a>
	
	</body>
</html>