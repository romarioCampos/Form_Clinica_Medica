<?php	

$conexao = mysqli_connect( 	"localhost", 
							"root",
							"");
								
mysqli_select_db( $conexao , "clinicamedica") or 
  die("Falha na abertura do banco 
  <b>clinicamedica</b>: " . mysqli_error($conexao));


?>