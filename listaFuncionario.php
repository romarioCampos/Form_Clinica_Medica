<html>
	<head>
		<title>Registros de Funcionarios</title>
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
		$comandoSQL="SELECT codFuncionario, CPF, nomeFuncionario, dtNascimento, email, dtContratacao FROM funcionarios";
		
		// Comando para o banco
		$registros = mysqli_query($conexao , $comandoSQL) 
			or die("Erro na seleção de registros de 
			  Funcionarios: " . mysqli_error($conexao)) ;
			  
		// Numero de linhas
		$linhas = mysqli_num_rows($registros);
		
		if ($linhas ==0) 
			die ("Tabela de <b>Funcionarios</b> esta vazia!");
		
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
			$codFuncionario           = $dados["codFuncionario"];
			$CPF     = $dados["CPF"];
			$nomeFuncionario   		= $dados["nomeFuncionario"];
			$dtNascimento          = $dados["dtNascimento"];
			$email         = $dados["email"];
			$dtContratacao       = $dados["dtContratacao"];				
			echo "<tr>";
			
			echo "	<td>$codFuncionario</td>" ;
			echo "	<td>$CPF</td>" ;
			echo "	<td>$nomeFuncionario</td>" ;
			echo "	<td>$dtNascimento</td>" ;
			echo "	<td>$email</td>" ;
			echo "	<td>$dtContratacao</td>" ;
			echo "  <td> 
						<a href='excluiFuncionario.php?c=$codFuncionario'>
						Excluir Dados</a> 
					</td>";
			echo "		<td> <a href='alterFuncionario.php?c=$codFuncionario'>Alterar</td>";
					
			echo "</tr>";
		
			++$contador;
		}
		echo "</table>";
		
		echo "Listagem Realizada!";
		
	?>
	<br>
	<a href="CadFuncionario.html">Voltar</a>
	
	</body>
</html>