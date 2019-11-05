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
				die("C�digo $codigo n�o encontrado!");
			
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
				
				C�digo da Agenda: <input 	type="number" 
						name="codAgendamento"
						min="1"
						max="9999999999"
						value="<?php echo $codAgendamento;?>"> 
						
			<br>			
				C�digo do Paciente: 
				<input 	type="number" 
						name="CodPaciente"
						min="1"
						max="9999999999"
						value="<?php echo $codPaciente;?>"> 
				<br>
				Conv�nio: 
				<select name="Convenio">
				<option value="">Escolha</option>
				<option value="S" >Sim</option>
				<option value="N" >N�o</option>
				</select>
				<br>
			
			<fieldset>
				<legend>Dados M�dicos</legend>
				C�digo do M�dico: 
				<input 	type="number" 
						name="CodMed"
						min="1"
						max="9999999999"
						value="<?php echo $codMed;?>"> 						
						
				<br>
				
				Descri�ao do Motivo do Agendamento:<br> 
						<textarea 	name="descricao" 
						value="<?php echo $descricao;?>"
							rows="2" 
							cols="60"	
						placeholder="Motivo"></textarea>
						
				<br>
				Descri�ao do Servi�o: <input type="text" name="servicoAtendimento"
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