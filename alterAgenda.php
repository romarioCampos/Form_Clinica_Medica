<html>
	<head>
		<title>Alteracao de Agendamentos</title>
	</head>
	<body>
		<h2>Alteracao de Agendamentos</h2>
<?php
			if ( ! isset($_GET["c"]))
				die("Rotina chamada de forma incorreta");
			
			$codigo=$_GET["c"];
			$comandoSQL="SELECT * FROM agenda WHERE codAgendamento=$codigo";
			
			include "conexao.php";
			$registro=mysqli_query($conexao, $comandoSQL);
			
			if( mysqli_num_rows($registro) <1)
				die("Código $codigo não encontrado!");
			
			$dados = mysqli_fetch_array($registro);
			
			$codAgendamento  	=$dados["codAgendamento"];
			$ativo				=$dados["ativo"];
			$descricao 				=$dados["descricao"];
			$codMed 		=$dados["codMed"];
			$servicoAtendimento 				=$dados["servicoAtendimento"];
			$dataAgendamento		=$dados["dataAgendamento"];
			$dataEntrada		=$dados["dataEntrada"];			
			$dataAlta	 			=$dados["dataAlta"];
			$codPaciente			=$dados["codPaciente"];
			$dtResultado			=$dados["dtResultado"];
			$convenio			=$dados["convenio"];
			$laudo				=$dados["laudo"];
		?>	
		
		<form 	action="atualizaAgenda.php" 
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
						name="CodPaciente"
						min="1"
						max="9999999999"
						value="<?php echo $codPaciente;?>"> 
				<br>
				Convênio: 
				<select name="Convenio">
				<option value="">Escolha</option>
				<option value="S" >Sim</option>
				<option value="N" >Não</option>
				</select>
				<br>
			
			<fieldset>
				<legend>Dados Médicos</legend>
				Código do Médico: 
				<input 	type="number" 
						name="CodMed"
						min="1"
						max="9999999999"
						value="<?php echo $codMed;?>"> 						
						
				<br>
				
				Descriçao do Motivo do Agendamento:<br> 
						<textarea 	name="descricao" 
						value="<?php echo $descricao;?>"
							rows="2" 
							cols="60"	
						placeholder="Motivo"></textarea>
						
				<br>
				Descriçao do Serviço: <input type="text" name="servicoAtendimento"
						maxlength="60" size="30" 
				   placeholder="Informe o tipo de exame"
				   value="<?php echo $servicoAtendimento;?>"> 	
				<br>	
				Data de Inicio do Exame: 
				<input 	type="date" 
						name="DataEntrada"
						min="2018-12-31"
						max="2100-12-31"
				value="<?php echo $dataEntrada;?>"> 						
				<br>
			</fieldset> 			
			<br><hr>
			
				<input type="submit" value="Gravar Agendamento">
				<br><br>
				<a href="listaAgenda.php">Verificar Agendamentos</a>
				<br><br>
				<a href="HOME.html">Back to Home</a>
		</form>		
	</body>
</html>