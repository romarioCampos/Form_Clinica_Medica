<html>
	<head>
		<title>Financeiro - Alterações</title>
	</head>
	<body>
		<h2>Alterações - Caixa</h2>
		<?php
			if ( ! isset($_GET["c"]))
				die("Rotina chamada de forma incorreta");
			
			$codigo=$_GET["c"];
			$comandoSQL="SELECT * FROM caixa WHERE codCaixa=$codigo";
			
			include "conexao.php";
			$registro=mysqli_query($conexao, $comandoSQL);
			
			if( mysqli_num_rows($registro) <1)
				die("Código $codigo não encontrado!");
			
			$dados = mysqli_fetch_array($registro);
			
			$codCaixa	     	=$dados["codCaixa"];
			$codAgendamento   	=$dados["codAgendamento"];
			$codPaciente      	=$dados["codPaciente"];
			$codFuncionario   	=$dados["codFuncionario"];
			$codMedico        	=$dados["codMedico"];
			$codServico       	=$dados["codServico"];
			$valorAtendimento 	=$dados["valorAtendimento"];			
			$taxaServico      	=$dados["taxaServico"];
			$descontoCliente  	=$dados["descontoCliente"];
			$tipoPagamento    	=$dados["tipoPagamento"];
			$dtFechamento     	=$dados["dtFechamento"];
		?>	
		
		<form 	action="atualizaCaixa.php" 
				method="post" 
				enctype="multipart/form-data">
				
				<input type="hidden" name="codigo" value="<?php echo $codigo;?>">
				
				Código da Agenda: <input 	type="number" 
						name="codAgendamento"
						min="1"
						max="9999999999"
						value="<?php echo $codAgendamento;?>">
						
			<br>			
				Código do Paciente: 
				<input 	type="number" 
						name="codPaciente"
						min="1"
						max="9999999999"
						value="<?php echo $codPaciente;?>">
				<br>
				
				Responsável pelo atendimento: 
				<input 	type="number" 
						name="codFuncionario"
						min="1"
						max="9999999999"
					value="<?php echo $codFuncionario;?>">
				<br>

				Médico Executante: 
				<input 	type="number" 
						name="codMedico"
						min="1"
						max="9999999999"
				value="<?php echo $codMedico;?>">		
				<br>				
				Serviço Realizado: 
				<input 	type="number" 
						name="codServico"
						min="1"
						max="9999999999"
					value="<?php echo $codServico;?>">
				<br>
			
			<fieldset>
				<legend>Informações Contabeis</legend>
				Valor Atendimento:  
				<input 	type="number" 
				value="<?php echo $valorAtendimento;?>"
					name="valorAtendimento" 
					min="0" 
					max="9999.99" 
					placeholder="9999,99"
					step="0.01"> <br>
					
				Taxa de Serviço:  
				<input 	type="number" 
					name="taxaServico" 
					min="0" 
					max="9999.99" 
					placeholder="999,99"
					step="0.01" value="<?php echo $taxaServico;?>" <br>	

				Desconto:  
				<input 	type="number" 
					name="descontoCliente" 
					value="<?php echo $descontoCliente;?>"
					min="0" 
					max="999.99" 
					placeholder="999,99"
					step="0.01"> <br>						
				
				<br>	
				
				Tipo de Pagamento: 
				<input 	type="text" 
						name="tipoPagamento" 
						maxlength="50" 
						value="<?php echo $tipoPagamento;?>"
						size="50"> 	<br>	
						
				Data de acordo: 
				<input 	type="date" 
						name="dtFechamento"
						min="1900-12-31"
						max="2100-12-31"
						value="<?php echo $dtFechamento;?>"
						>			
				<br>
			</fieldset> 			
			<br><hr>
			
				<input type="submit" value="Gravar Conta">
				<br> <br>
				<a href="listaCaixa.php">Verificar Pagamentos</a>
				<br> <br>
				<a href="HOME.html">Back to Home</a>
		</form>		
	</body>
</html>