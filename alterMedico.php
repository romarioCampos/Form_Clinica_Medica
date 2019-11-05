<html>
	<head>
		<title>Alteracao de Medicos</title>
	</head>
	<body>
		<h2>Ateracao de Medicos</h2>
		<?php
			if ( ! isset($_GET["c"]))
				die("Rotina chamada de forma incorreta");
			
			$codigo=$_GET["c"];
			$comandoSQL="SELECT * FROM medicos WHERE codMedico=$codigo";
			
			include "conexao.php";
			$registro=mysqli_query($conexao, $comandoSQL);
			
			if( mysqli_num_rows($registro) <1)
				die("Código $codigo não encontrado!");
			
			$dados = mysqli_fetch_array($registro);
			
			$nomeMedico					=$dados["nomeMedico"];
			$dtNascimento				=$dados["dtNascimento"];
			$medicoativo 				=$dados["medicoativo"];
			$CPF 						=$dados["CPF"];
			$RG 						=$dados["RG"];
			$CRM 						=$dados["CRM"];
			$especialidade				=$dados["especialidade"];
			$dtContratacao				=$dados["dtContratacao"];			
			$escolaridade	 			=$dados["escolaridade"];
			$sexo	 					=$dados["sexo"];
			$salario					=$dados["salario"];
			$telefone					=$dados["telefone"];
			$celular					=$dados["celular"];
			$email						=$dados["email"];
		?>
		<form 	action="gravaMedico.php" 
				method="post" 
				enctype="multipart/form-data">

				Nome: <input type="text" name="nomeMedico"
				maxlength="30" size="30" 
			   placeholder="Nome do medico"
			   value="<?php echo $nomeMedico;?>">
			   <br>
			   
				Data de Nascimento: 
				<input 	type="date" 
						name="dtNascimento"
						min="1900-12-31"
						max="2100-12-31"
						value="<?php echo $dtNascimento; ?>">			
				<br>		   
				
				Medico Ativo:<br>
		    <input type="radio" name="medicoativo" value="S" <?php if($medicoativo=="S") echo 'checked'; ?>>Sim
		    <input type="radio" name="medicoativo" value="N" <?php if($medicoativo=="N") echo 'checked'; ?>>Nao			
				
				<br>
				CPF :  
				<input 	type="number" 
					name="CPF" 
					min="0" 
					max="999.999.999.999" 
					placeholder="999.999.999-99"
					step="000.000.000.01"
					value="<?php echo $CPF; ?>"> <br>
				
				RG :  
				<input 	type="number" 
					name="RG" 
					min="0" 
					max="99.999.999.9" 
					placeholder="99.999.999.9"
					step="00.000.000.01"
					value="<?php echo $RG; ?>"> 				<br>
					
				CRM :  
				<input 	<input 	type="text" 
					name="CRM"
					maxlength="30" 
					size="30" 
					placeholder="999999/AZ"
					value="" required<?php echo $CRM; ?>> 	
						<br>
					
				Especialidade: <input type="text" name="especialidade"
				maxlength="50" size="30" 
			   placeholder="Especialidade"
			   value="<?php echo $especialidade;?>">
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

				Salario do Medico :  
				<input 	type="number" 
					name="salario" 
					min="0" 
					max="999999" 
					placeholder="Salario"
					step="00.000.000.01"
					value="<?php echo $salario;?>"> <br>
			
			Telefone do Medico :  
			<input 	type="number" 
					name="telefone" 
					min="0" 
					max="9999-9999" 
					placeholder="9999-9999"
					step="00000001"
					value="<?php echo $telefone;?>"> 
			<br>
			Celular do Medico :  
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
				<a href="listaMedico.php">Verificar Pagamentos</a>
				<br> <br>
		</form>		<a href="HOME.html">Back to Home</a>
	</body>
</html>