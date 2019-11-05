<html>
	<head>
		<title>Registros dos Pacientes</title>
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
		$comandoSQL="SELECT codPaciente, CPF, nomePaciente, dtNascimento, email, dtContratacao FROM pacientes";
		
		// Comando para o banco
		$registros = mysqli_query($conexao , $comandoSQL) 
			or die("Erro na seleção de registros dos 
			  Pacientes: " . mysqli_error($conexao)) ;
			  
		// Numero de linhas
		$linhas = mysqli_num_rows($registros);
		
		if ($linhas ==0) 
			die ("Tabela de <b>Pacientes</b> esta vazia!");
		
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
			$dados = mysqli_fetch_array($registros);
			$codPaciente           = $dados["codPaciente"];
			$CPF     = $dados["CPF"];
			$nomePaciente   		= $dados["nomePaciente"];
			$dtNascimento          = $dados["dtNascimento"];
			$email         = $dados["email"];
			$dtContratacao       = $dados["dtContratacao"];				
			echo "<tr>";
			
			echo "	<td>$codPaciente</td>" ;
			echo "	<td>$CPF</td>" ;
			echo "	<td>$nomePaciente</td>" ;
			echo "	<td>$dtNascimento</td>" ;
			echo "	<td>$email</td>" ;
			echo "	<td>$dtContratacao</td>" ;
			echo "  <td> 
						<a href='excluiPaciente.php?c=$codPaciente'>
						Excluir Dados</a> 
					</td>";
			echo "		<td> <a href='alterPaciente.php?c=$codPaciente'>Alterar</td>";
					
			echo "</tr>";
		
			++$contador;
		}
		echo "</table>";
		
		echo "Listagem Realizada!";
		
	?>
	<br>
	<a href="Cadpaciente.html">Voltar</a>
	
	</body>
</html>