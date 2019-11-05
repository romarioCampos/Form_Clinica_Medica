<html>
	<head>
		<title>Servicos - Alterações</title>
	</head>
	<body>
		<h2>Alterações - Servicos</h2>
		<?php
			if ( ! isset($_GET["c"]))
				die("Rotina chamada de forma incorreta");
			
			$codigo=$_GET["c"];
			$comandoSQL="SELECT * FROM servicos WHERE codServico=$codigo";
			
			include "conexao.php";
			$registro=mysqli_query($conexao, $comandoSQL);
			
			if( mysqli_num_rows($registro) <1)
				die("Código $codigo não encontrado!");
			
			$dados = mysqli_fetch_array($registro);
			$servicoativo	    =$dados["servicoativo"];
			$codServico	     	=$dados["codServico"];
			$descricao   		=$dados["descricao"];
			$valorservico      	=$dados["valorservico"];
		?>	
		
		<form 	action="gravaServico.php" 
				method="post" 
				enctype="multipart/form-data">
				
				Descricao Servico: 
				<input 	type="text" 
						name="descricao" 
						maxlength="50" 
						size="50"
						value="<?php echo $descricao; ?>"> <br>
				
				Servico Ativo:
		    <input type="radio" name="servicoativo" value="S" <?php if($servicoativo=="S") echo 'checked'; ?>>Sim
		    <input type="radio" name="servicoativo" value="N" <?php if($servicoativo=="N") echo 'checked'; ?>>Nao			
				
				<br>
				
			<fieldset>
				<legend>Informações Contabeis</legend>
				Valor do Servico:  
				<input 	type="number" 
					name="valorservico" 
					min="0" 
					max="999.99" 
					placeholder="999,99"
					step="0.01"
					value="<?php echo $valorservico; ?>"> <br>						
				
				<br>
				
			</fieldset> 			
			<br><hr>
			
				<input type="submit" value="Gravar Servico">
				<br> <br>
				<a href="listaServico.php">Verificar Pagamentos</a>
				<br> <br>
				<a href="HOME.html">Back to Home</a>
		</form>		
	</body>
</html>