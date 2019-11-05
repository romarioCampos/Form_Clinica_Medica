<html>
	<head>
		<title>Registros dos Servicos</title>
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
		$comandoSQL="SELECT codServico, servicoativo, descricao, valorservico FROM servicos";
		
		// Comando para o banco
		$registros = mysqli_query($conexao , $comandoSQL) 
			or die("Erro na seleção de registros dos 
			  Servicos: " . mysqli_error($conexao)) ;
			  
		// Numero de linhas
		$linhas = mysqli_num_rows($registros);
		
		if ($linhas ==0) 
			die ("Tabela de <b>Servicos</b> esta vazia!");
		
		echo "Foram encontrados <b>$linhas</b> registros <br>";
		
		// Exibindo os dados
		$contador = 0;		
		echo "<table border='1'>";
		echo "	<tr>";
		echo "		<th>codigo</th>";
		echo "		<th>Ativo</th>";		
		echo "		<th>Descricao</th>";
		echo "		<th>Valor do Servico</th>";
		echo "	</tr>";		
		
		while ($contador < $linhas)
		{
			$dados = mysqli_fetch_array($registros);
			$codServico           = $dados["codServico"];
			$servicoativo     = $dados["servicoativo"];
			$descricao   		= $dados["descricao"];
			$valorservico          = $dados["valorservico"];				
			echo "<tr>";
			
			echo "	<td>$codServico</td>" ;
			echo "	<td>$servicoativo</td>" ;
			echo "	<td>$descricao</td>" ;
			echo "	<td>$valorservico</td>" ;
			echo "  <td> 
						<a href='excluiServico.php?c=$codServico'>
						Excluir Dados</a> 
					</td>";
			echo "		<td> <a href='alterServico.php?c=$codServico'>Alterar</td>";
					
			echo "</tr>";
		
			++$contador;
		}
		echo "</table>";
		
		echo "Listagem Realizada!";
		
	?>
	<br>
	<a href="Cadservico.html">Voltar</a>
	
	</body>
</html>