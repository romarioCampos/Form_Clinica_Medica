<html>
	<head>
		<title>Listagem de Agendamento</title>
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
		$comandoSQL="SELECT codAgendamento, descricao, servicoAtendimento, dataAgendamento, dataEntrada, codMed FROM agenda";
		
		// Comando para o banco
		$registros = mysqli_query($conexao , $comandoSQL) 
			or die("Erro na seleção de registros de 
			  Agendamentos:" . mysqli_error($conexao)) ;
			  
		// Numero de linhas
		$linhas = mysqli_num_rows($registros);
		
		if ($linhas ==0) 
			die ("Tabela de <b>Agendas</b> está vazia!");
		
		echo "Foram encontrados <b>$linhas</b> agendamentos <br>";
		
		// Exibindo os dados
		$contador = 0;		
		echo "<table border='1'>";
		echo "	<tr>";
		echo "		<th>Codigo</th>";
		echo "		<th>Descricao</th>";
		echo "		<th>Servico</th>";
		echo "		<th>Data de Agendamento</th>";
		echo "		<th>Data Atendimento</th>";
		echo "		<th>Medico</th>";
		echo "	</tr>";		
		
		while ($contador < $linhas)
		{
			$dados = mysqli_fetch_array($registros);
			$codAgendamento     = $dados["codAgendamento"];
			$descricao   		= $dados["descricao"];
			$servicoAtendimento = $dados["servicoAtendimento"];
			$dataAgendamento    = $dados["dataAgendamento"];
			$dataEntrada        = $dados["dataEntrada"];	
			$codMed             = $dados["codMed"];				
			echo "<tr>";
			
			echo "	<td>$codAgendamento</td>" ;
			echo "	<td>$descricao</td>" ;
			echo "	<td>$servicoAtendimento</td>" ;
			echo "	<td>$dataAgendamento</td>" ;
			echo "	<td>$dataEntrada</td>" ;
			echo "	<td>$codMed</td>" ;
			echo "  <td> 
						<a href='excluiAgenda.php?c=$codAgendamento'>
						Excluir Dados</a> 
					</td>";
			echo "		<td> <a href='alterAgenda.php?c=$codAgendamento'>Alterar</td>";
					
			echo "</tr>";
		
			++$contador;
		}
		echo "</table>";
		
		echo "Listagem Finalizada!";
		
	?>
	<br>
	<a href="Cadagenda.html">Voltar</a>
	
	</body>
</html>