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
        <center>
            <h4>Informações Pessoais</h4>
        </center>
        <div class="imgperfil">		
            <div 
                    class="slim imageuser"
                    data-min-size="150,150"
                    data-size="1000,1000"
                    data-ratio="1:1"
                    data-instant-edit="true"
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
        <?php
            require 'footer.php';
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#telefone").mask("(99) 99999-9999")
            });
            $('#salvar').click(function(){
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
                        if(response.deucerto == 2){
                            notificar('error','Dados precisam ser preenchidos!')
                            location.reload(this);
                        }
                        if(response.deucerto == 3){
                            notificar('error','Dados permanecem iguais!')
                        }

                        
                    } 
                });
            });
        </script>
    </body>
</html>