<?php
    if (isset($_GET['pedirLogin'])) {
        $pedirLogin = $_GET['pedirLogin'];
    }else{
        $pedirLogin = 0;
    }
?>

        <?php require 'navbar.php'; ?> 
        

  <div class="row">
	
	<div id="loginUsuario" class="col s5 card hoverable m6 l4 ">
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

	<div id="cadastrarUsuario" class="col s5 card hoverable m6 l4 ">
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
    require 'navbar.php';
?> 

<div class="row">
    <div id="loginUsuario" class="col s5 card hoverable m6 l4 ">
        <form id="login" method="post">
            <center>
                <h4>Login</h4>
                <div id="loginTitulo"></div>
            </center>
            <div class="input-field col s12 ">
                <label for="email">E-mail:</label><input type="text" required name="email" id="login_email"><br/>
            </div>
            <div class="input-field col s12 ">
                <label for="senha">Senha:</label><input type="password" required name="senha" id="login_senha"><br/>
            </div>
            <input type="submit" value="login" class=" blue-grey darken-4 waves-effect green btn">
        </form>
    </div>
    <br/>
    <div id="cadastrarUsuario" class="col s5 card hoverable m6 l4 ">
        <form id="cadastro" method="post">
            <center>
                <h4>Cadastrar-se</h4>
            </center>
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
            <input type="submit" class=" blue-grey darken-4 waves-effect green btn" name="" value="Cadastrar">
        </form>
    </div>

</div>        

<?php
    require 'footer.php';
?>

        <script type="text/javascript">
            if (<?php echo $pedirLogin; ?> === 1) {
                notificar('error', 'Faça login antes de continuar!')
            }
            $(document).ready(function() {
                $("#telefone").mask("(99) 99999-9999")
            });
            $('#cadastro').submit(function(event){
                event.preventDefault();
                if ($('#nome').val().lenght < 3){
                    notificar('error', 'Nome Inválido!')
                    var nomevalido = 0
                } else {
                    var nomevalido = 1
                }
                if (document.getElementById("email").value.indexOf("@") == -1 ||
                    document.getElementById("email").value.indexOf(".com") == -1 ||
                    document.getElementById("email").value.length < 7) {
                    notificar('error', 'Email Inválido!')
                    var emailvalido = 0
                    } else {
                        var emailvalido = 1
                    }
                var alfabeto = /[a-zA-Z\u00C0-\u00FF ]+/i
                var numeros = /[0-9]/
                var senhaValida = 0
                if ($('senha').lenght < 6) {
                    notificar('error', 'A senha deve conter no mínimo 6 caracteres!')
                    senhaValida = 0
                } else {
                    senhaValida = 1
                }
                if (alfabeto.test($('#senha').val())) {
                    senhaValida = 1
                } else {
                    notificar('error', 'A senha deve conter letras e números!')
                    senhaValida = 0
                }
                if (numeros.test($('#senha').val())) {
                    senhaValida = 1
                } else {
                    notificar('error', 'A senha deve conter letras e números!')
                    senhaValida = 0
                }
                if ($('#senha').val() === $('#confirm_senha').val()) {
                    var senhaConfere = 1
                    } else {
                        notificar('error', 'Senhas não conferem!')
                    }
                if (emailvalido === 1 && nomevalido === 1 && senhaValida === 1 && senhaConfere === 1) {
                    $.ajax({
                        url: 'ajax/cadastro.php',
                        type: 'POST',
                        data: $('#cadastro').serialize(),
                        dataType: 'json',
                        success: function(response){
                            console.log(response);
                            if(response.deucerto === 1){
                                notificar('success','Cadastro realizado com sucesso!')
                                $("#cadastro").trigger("reset");
                            }
                        }
                    });
                }
            });
            $('#login').submit(function(event){
                event.preventDefault();
                $.ajax({
                    url: 'ajax/verifica.php',
                    type: 'POST',
                    data: $('#login').serialize(),
                    dataType: 'json',
                    success: function(response){
                        if (response.login === 1) {
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