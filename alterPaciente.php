<html>
	<head>
		<title>Alteracao dos Pacientes</title>
	</head>
	<body>
		<h2>Alteracao dos Pacientes</h2>
		<?php
			if ( ! isset($_GET["c"]))
				die("Rotina chamada de forma incorreta");
			
			$codigo=$_GET["c"];
			$comandoSQL="SELECT * FROM pacientes WHERE codPaciente=$codigo";
			
			include "conexao.php";
			$registro=mysqli_query($conexao, $comandoSQL);
			
			if( mysqli_num_rows($registro) <1)
				die("Código $codigo não encontrado!");
			
			$dados = mysqli_fetch_array($registro);
			
			$nomePaciente						=$dados["nomePaciente"];
			$CPF								=$dados["CPF"];
			$RG 								=$dados["RG"];
			$pacienteativo 						=$dados["pacienteativo"];
			$dtNascimento 						=$dados["dtNascimento"];
			$especialidademedica 				=$dados["especialidademedica"];
			$dtContratacao						=$dados["dtContratacao"];
			$escolaridade						=$dados["escolaridade"];			
			$sexo	 							=$dados["sexo"];
			$salario							=$dados["salario"];
			$telefone							=$dados["telefone"];
			$celular							=$dados["celular"];
			$email								=$dados["email"];
		?>
		<form 	action="atualizaPaciente.php" 
				method="post" 
				enctype="multipart/form-data">
				
				<input type="hidden" name="codigo" value="<?php echo $codigo;?>">

				Nome: <input type="text" name="nomePaciente"
				maxlength="30" size="30" 
			   placeholder="Nome do paciente"
			   value="<?php echo $nomePaciente;?>">
			   <br>
			   
				Data de Nascimento: 
				<input 	type="date" 
						name="dtNascimento"
						min="1900-12-31"
						max="2100-12-31"
						value="<?php echo $dtNascimento; ?>">			
				<br>		   
				
				Funcionário Ativo:<br>
		    <input type="radio" name="pacienteativo" value="S" <?php if($pacienteativo=="S") echo 'checked'; ?>>Sim
		    <input type="radio" name="pacienteativo" value="N" <?php if($pacienteativo=="N") echo 'checked'; ?>>Nao			
				
				<br>
				CPF :  
				<input 	type="number" 
					name="cpf" 
					min="0" 
					max="999.999.999.999" 
					placeholder="999.999.999-99"
					step="000.000.000.01"
					value="<?php echo $CPF; ?>"> <br>
				
				RG :  
				<input 	type="number" 
					name="rg" 
					min="0" 
					max="99.999.999.9" 
					placeholder="99.999.999.9"
					step="00.000.000.01"
					value="<?php echo $RG; ?>"> 				<br>
					
				Especialidade Medica: <input type="text" name="especialidademedica"
				maxlength="50" size="30" 
			   placeholder="Especialidade Medica"
			   value="<?php echo $especialidademedica;?>">
			   <br>					
					
				Data de Contratacao: 
				<input 	type="date" 
						name="dtContratacao"
						min="1900-12-31"
						max="2100-12-31"
						value="<?php echo $dtContratacao; ?>">				
				<br>
				
				Escolaridade: <input type="text" name="escolaridade"
				maxlength="50" size="30" 
			   placeholder="Grau de escolaridade"
			   value="<?php echo $escolaridade;?>">
			   <br>	
			   
			Sexo:<br>
		    <input type="radio" name="sexo" value="M" <?php if($sexo=="M") echo 'checked'; ?>>Masculino
		    <input type="radio" name="sexo" value="F" <?php if($sexo=="F") echo 'checked'; ?>>Feminino
			<br>

				Salario do Paciente :  
				<input 	type="number" 
					name="salario" 
					min="0" 
					max="999999" 
					placeholder="Salario"
					step="00.000.000.01"
					value="<?php echo $salario;?>"> <br>
			
			
			Telefone do Paciente :  
			<input 	type="number" 
					name="telefone" 
					min="0" 
					max="9999-9999" 
					placeholder="9999-9999"
					step="00000001"
					value="<?php echo $telefone;?>"> 
			<br>
			Telefone Celular :  
			<input 	type="number" 
					name="celular" 
					min="0" 
					max="9999-9999" 
					placeholder="9999-9999"
					step="00000001"
					value="<?php echo $celular;?>"> 
			<br>
			Email: 
				<input 	type="text" 
						name="email" 
						maxlength="50" 
						size="50"
						value="<?php echo $email;?>"> 
			<hr>
			
				<input type="submit" value="Enviar">
				<br> <br>
				<a href="listaPaciente.php">Verificar Pagamentos</a>
				<br> <br>
		</form>		<a href="HOME.html">Back to Home</a>
	</body>
</html>