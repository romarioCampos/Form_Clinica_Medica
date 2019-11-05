<html>
	<head>
		<title>Registros Financeiros</title>
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
		$comandoSQL="SELECT codCaixa, codAgendamento, codPaciente, codMedico, codServico, dtFechamento, valorAtendimento, taxaServico, descontoCliente FROM caixa";
		
		// Comando para o banco
		$registros = mysqli_query($conexao , $comandoSQL) 
			or die("Erro na seleção de registros de 
			  Agendamentos:" . mysqli_error($conexao)) ;
			  
		// Numero de linhas
		$linhas = mysqli_num_rows($registros);
		
		if ($linhas ==0) 
			die ("Tabela de <b>Caixa</b> esta vazia!");
		
		echo "Foram encontrados <b>$linhas</b> registros <br>";
		
		// Exibindo os dados
		$contador = 0;		
		echo "<table border='1'>";
		echo "	<tr>";
		echo "		<th>Venda</th>";
		echo "		<th>Agendamento</th>";		
		echo "		<th>Paciente</th>";
		echo "		<th>Medico</th>";
		echo "		<th>Servico</th>";
		echo "		<th>Data Acordo</th>";
		echo "		<th>Total</th>";
		echo "	</tr>";		
		
		while ($contador < $linhas)
		{
			$dados = mysqli_fetch_array($registros);
			$codVenda           = $dados["codCaixa"];
			$codAgendamento     = $dados["codAgendamento"];
			$codPaciente   		= $dados["codPaciente"];
			$codMedico          = $dados["codMedico"];
			$codServico         = $dados["codServico"];
			$dtFechamento       = $dados["dtFechamento"];	
			$total              = $dados["valorAtendimento"] + $dados["taxaServico"] - $dados["descontoCliente"];				
			echo "<tr>";
			
			echo "	<td>$codVenda</td>" ;
			echo "	<td>$codAgendamento</td>" ;
			echo "	<td>$codPaciente</td>" ;
			echo "	<td>$codMedico</td>" ;
			echo "	<td>$codServico</td>" ;
			echo "	<td>$dtFechamento</td>" ;
			echo "	<td>$total</td>" ;
			echo "  <td> 
						<a href='excluiCaixa.php?c=$codVenda'>
						Excluir Dados</a> 
					</td>";
			echo "		<td> <a href='alterCaixa.php?c=$codVenda'>Alterar</td>";
			echo "</tr>";
		
			++$contador;
		}
		echo "</table>";
		
		echo "Listagem Realizada!";
		
	?>
	<br>
	<a href="CadCaixa">Voltar</a>
	
	</body>
</html>