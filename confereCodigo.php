<?php 
require 'navbar.php';
$_SESSION['emailRecuperacao'] = $_POST['email'];
?> 
<div class="row">
	<div id="confereCodigo" class="col s12 m6 hoverable">
		<p>Insira o código enviado para seu email:</p>
		<form method="POST" action="alterarSenha.php">
			<div class="input-field col s12 ">
				<label for="codigo">Código:</label><input type="text" required name="codigo" id="codigo"><br/>
			</div>
			<input type="submit" value="Enviar" class=" blue-grey darken-4 btn">
		</form>
	</div>
</div>
<?php require 'footer.php'; ?> 