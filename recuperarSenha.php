<?php require 'navbar.php'; ?> 
<div class="row">
	<div id="recuperaSenha" class="col s12 m6 hoverable">
		<p>Informe o seu email para que seja enviado o código de verificação</p>
		<form id="recsenha" method="POST" action="recupera.php">
			<div class="input-field col s12 ">
				<label for="email">E-mail:</label><input type="text" required name="email" id="email"><br/>
			</div>
			<input type="submit" value="Enviar" class=" blue-grey darken-4 btn">
		</form>
	</div>
</div>
<script>
	$('#recsenha').submit(function(event){
		event.preventDefault();
		$.ajax({
			url: 'recupera.php',
			type: 'POST',
			data: $('#recsenha').serialize(),
			dataType: 'json',
			success: function(response){
				if(response.existe){
					window.location = 'confereCodigo.php';
				}
			}
		});
	})
</script>
<?php require 'footer.php'; ?> 