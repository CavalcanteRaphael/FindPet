<?php
    if (isset($_GET['pedirLogin'])) {
        $pedirLogin = $_GET['pedirLogin'];
    }else{
        $pedirLogin = 0;
    }
?>

        <?php require 'navbar.php'; ?> 
        

  <div class="row">
	
	<div id="loginUsuario" class="col s12 m6 hoverable">
		<form id="login" method="post">
			<center ><h4>Login</h4><div id="loginTitulo"></div></center>
			<div class="input-field col s12 ">
				<label for="email">E-mail:</label><input type="text" required name="email" id="login_email"><br/>
			</div>
			<div class="input-field col s12 ">
				<label for="senha">Senha:</label><input type="password" required name="senha" id="login_senha"><br/>
			</div>
			<input type="submit" value="login" class=" blue-grey darken-4 btn">
		</form>
	</div>
	<br/>		

			<div class="box">
			</div>
			<div class="box linha-vertical">
			</div>
	  
	  		<div id="ou">ou</div>
	  
	  		<div class="box2">
			</div>
			<div class="box linha-vertical2">
			</div>

	<div id="cadastrarUsuario" class="col s12 m6 hoverable">
		<form id="cadastro" method="post">
			<center><h4>Cadastrar-se</h4></center>
			<div class="input-field col s12">
				<label for="nome">Nome Completo:</label><input type="text" name="nome" id="nome"><br/>
			</div>
			<div class="input-field col s12">
				<label for="email">E-mail:</label><input type="text" name="email" id="email"><br/>
			</div>
			<div class="input-field col s12">
				<label for="telefone">Telefone:</label><input type="text" name="telefone" id="telefone"><br/>
			</div>
			<div class="input-field col s12">
				<label for="senha">Senha:</label><input type="password" name="senha" id="senha"><br/>
			</div>
			<div class="input-field col s12">
				<label for="confirm_senha">Confirmar Senha:</label><input type="password" name="confirm_senha" id="confirm_senha"><br/>
			</div>
			<input type="submit" class=" blue-grey darken-4 btn" name="" value="Cadastrar">
		</form>
	</div>      

<?php
    require 'footer.php';
?>

        <script type="text/javascript">
            if (<?php echo $pedirLogin; ?> == 1) {
                notificar('error', 'Faça login antes de continuar!')
            }
            $(document).ready(function() {
                $("#telefone").mask("(99) 99999-9999")
            });
            $('#cadastro').submit(function(event){
                event.preventDefault();

                //INÍCIO DA VALIDAÇÃO DO NOME
                if ($('#nome').val().length < 3){
                    notificar('error', 'Nome Inválido!')
                    var nomeValido = 0
                } else {
                    var nomeValido = 1
                }
                //FIM DA VALIDAÇÃO DO NOME

                //INÍCIO DA VALIDAÇÃO DO EMAIL
                if (document.getElementById("email").value.indexOf("@") == -1 ||
                    document.getElementById("email").value.indexOf(".com") == -1 ||
                    document.getElementById("email").value.length < 7) {
                    notificar('error', 'Email Inválido!')
                    var emailValido = 0
                    } else {
                        var emailValido = 1
                    }
                //FIM DA VALIDAÇÃO DO EMAIL

                //INÍCIO DA VALIDAÇÃO DA SENHA
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
                //FIM DA VALIDAÇÃO DA SENHA

                $.ajax({
                        url: 'ajax/verificaEmail.php',
                        type: 'POST',
                        data: $('#email'),
                        dataType: 'json',
                        success: function(response){
                            if(response.valido) {
                                emailValido = 1
                            } else {
                                emailValido = 0
                                console.log(emailValido)
                                notificar('error', 'Email já Cadastrado!')
                            }

                            if (emailValido == 1 && nomeValido == 1 && senhaValida == 1 && senhaConfere == 1) {
                            $.ajax({
                                url: 'ajax/cadastro.php',
                                type: 'POST',
                                data: $('#cadastro').serialize(),
                                dataType: 'json',
                                success: function(response){
                                    console.log(response);
                                    if(response.deucerto == 1){
                                        notificar('success','Cadastro realizado com sucesso!')
                                        $("#cadastro").trigger("reset");
                                    }
                                }
                            });
                }

                        }
                    });

            });
            $('#login').submit(function(event){
                event.preventDefault();
                $.ajax({
                    url: 'ajax/verifica.php',
                    type: 'POST',
                    data: $('#login').serialize(),
                    dataType: 'json',
                    success: function(response){
                        if (response.login == 1) {
                            window.location = 'index.php';
                        } else {
                            $('#loginTitulo').html('<p class="invalido">Email ou senha incorretos</p>')
                        }
                    }
                });
            });
        </script>
    </body>
</html>