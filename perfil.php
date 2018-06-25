<?php
    require 'ajax/redirLogin.php';
?>
<?php
    require 'navbar.php';
?>
<?php 
    require_once 'ajax/conexao.php';
        $sql = "SELECT * FROM usuario WHERE idusuario = '".$id."'";
        $consulta = $conn->query($sql);
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
?>
        <script type="text/javascript">
            <?php if(isset($_GET['error'])){ ?>
                var errors = [];
                    errors[0] = 'Nenhum dado atualizado!';
                    errors[1] = 'O arquivo não é uma imagem!';
                    errors[2] = 'Imagem muito grande!';
                    errors[3] = 'Apenas permitido JPG, JPEG e PNG!';
            $(function(){
                notificar('error',errors[<?php echo $_GET['error']; ?>]);
            });
            <?php } ?>
        </script>
        <div id="corperfil"> 
        <center>
            <h4>Informações Pessoais</h4>
        </center>
        <div class="imgperfil">		
            <script>
                function atualizaImg(){
                    location.reload(this);
                }
            </script>
            <div
                    class="slim imageuser"
                    data-min-size="150,150"
                    data-size="1000,1000"
                    data-ratio="1:1"
                    data-instant-edit="true"
                    data-did-upload="atualizaImg"
                    data-service="ajax/editarImagem.php"
                    data-push="true"
                    style="width: 160px;height: 160px;border-radius:90px; margin:auto;">
                <img id="imageuser" src="img/<?php echo $usuario['img']; ?>"><br/>        
                <input type="file" name="slim[]"/>
            </div>
            <form id="editForm">
                <div class="input-field col s6">
                    <i class="Small material-icons prefix">person</i>	
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>">
                    <br/>
                </div>
                <div class="input-field col s6">
                    <i class="Small material-icons prefix">mail</i>
                    <label for="icon_mail">E-mail:</label>
                    <input id="icon_mail" type="text" name="email" value="<?php echo $usuario['email']; ?>">
                </div>
                <div class="input-field col s6">
                    <i class="Small material-icons prefix">call</i>
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" value="<?php echo $usuario['telefone']; ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <a class="blue-grey darken-4 btn" id="salvar"><i class="material-icons left">done</i>Salvar</a>
            </form>
        </div>
        </div>
        <?php
            require 'footer.php';
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#telefone").mask("(99) 99999-9999")
            });
            $('#salvar').click(function(){

                //INÍCIO DA VALIDAÇÃO DO NOME
                if ($('#nome').val().length < 3){
                    notificar('error', 'Nome Inválido!')
                    var nomeValido = 0
                } else {
                    var nomeValido = 1

                    txtnome = $('#nome').val()
                    txtnome = txtnome.replace('<', "")
                    txtnome = txtnome.replace('?php', "")
                    txtnome = txtnome.replace('?>', "")
                    txtnome = txtnome.replace("<script", "")
                    txtnome = txtnome.replace("</", "")
                    txtnome = txtnome.replace("script>", "")
                    txtnome = txtnome.replace(">", "")
                    $('#nome').val(txtnome)

                }
                //FIM DA VALIDAÇÃO DO NOME

                //INÍCIO DA VALIDAÇÃO DO EMAIL
                var testeEmail = document.getElementById("icon_mail").value.split(".com");
                if (document.getElementById("icon_mail").value.indexOf("@") == -1 ||
                    document.getElementById("icon_mail").value.indexOf(".com") == -1 ||
                    document.getElementById("icon_mail").value.length < 7 || testeEmail['1'] != '') {
                    notificar('error', 'Email Inválido!')
                    var emailValido = 0
                    } else {
                        var emailValido = 1
                    }
                //FIM DA VALIDAÇÃO DO EMAIL

                if (emailValido == 1 && nomeValido == 1) {
                    $.ajax({
                        url: 'ajax/verificaEmail.php',
                        type: 'POST',
                        data: $('#icon_mail'),
                        dataType: 'json',
                        success: function(response){
                            if(response.valido) {
                                emailValido = 1
                            } else {
                                emailValido = 0
                                console.log(emailValido)
                                notificar('error', 'Email já Cadastrado!')
                            }
                            if (emailValido == 1) {
                                $.ajax({
                                url: 'ajax/editarperfil.php',
                                type: 'POST',
                                data: $('#editForm').serialize(),
                                dataType: 'json',
                                success: function(response){
                                    if(response.deucerto == 1){
                                        notificar('success','Perfil editado com sucesso!')
                                        location.reload(this);
                                    }
                                    else if(response.deucerto == 3){
                                        notificar('error','Dados permanecem iguais!')
                                    }

                                } 
                            });
                        }
                        }
                    })
                }
            });
        </script>
    </body>
</html>