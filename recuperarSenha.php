<?php require 'navbar.php'; ?> 
<div class="row">
	<div id="recuperaSenha" class="col s12 m6 hoverable">
		<p>Informe o seu email para que seja enviado o código de verificação</p>
		<form method="POST" action="recupera.php">
			<div class="input-field col s12 ">
				<label for="email">E-mail:</label><input type="text" required name="email" id="email"><br/>
			</div>
			<input type="submit" value="Enviar" class=" blue-grey darken-4 btn">
		</form>
	</div>
</div>
<?php require 'footer.php'; ?> 