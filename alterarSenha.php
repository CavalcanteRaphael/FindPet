<?php 
	require 'navbar.php'; 
	$codigo = $_SESSION['codigo'];
	$codigoUsuario = $_POST['codigo'];
?> 
<div class="row">
	<div id="alterarSenha" class="col s12 m6 hoverable">
		<form id="novaSenha" method="POST" action="recupera.php">
			<div class="input-field col s12 ">
				<label for="senha">Insira sua nova senha:</label><input type="hidden" name="email" value="<?php echo $_POST['email']?>"><input type="password" required name="senha" id="senha"><br/>
				<label for="confirm_senha">Confirmar nova senha:</label><input type="text" required name="confirm_senha" id="confirm_senha"><br/>
			</div>
			<input type="submit" value="Enviar" class=" blue-grey darken-4 btn">
		</form>
	</div>
</div>
<script>
	var alfabeto = /[a-zA-Z\u00C0-\u00FF ]+/i
    var numeros = /[0-9]/
    var senhaValida = 0
    if ($('#senha').val().length < 6) {
        notificar('error', 'A senha deve conter no mínimo 6 caracteres!')
        senhaValida = 0
    } else {
        senhaValida = 1
    }
    if (alfabeto.test($('#senha').val()) && numeros.test($('#senha').val())) {
        senhaValida = 1
    } else {
        notificar('error', 'A senha deve conter letras e números!')
        senhaValida = 0
    }
    if ($('#senha').val() == $('#confirm_senha').val()) {
        var senhaConfere = 1
    } else {
        notificar('error', 'Senhas não conferem!')
        }

    if (senhaValida == 1 && senhaConfere == 1) {
        $.ajax({
            url: 'ajax/novaSenha.php',
            type: 'POST',
            data: $('#novaSenha').serialize(),
            dataType: 'json',
            success: function(response){
                console.log(response);
                if(response.deucerto == 1){
                    notificar('success','Senha alterada com sucesso!')
                    window.location = 'perfil.php';
                }
            }
        });
    }
</script>
<?php require 'footer.php'; ?> 