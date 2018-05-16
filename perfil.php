<?php require 'ajax/redirLogin.php' ?>
        <?php require 'navbar.php'; ?>
        <?php 
            require_once 'ajax/conexao.php';

            $sql = "SELECT * FROM usuario WHERE idusuario = '".$id."'";
            $consulta = $conn->query($sql);
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
        ?>
			<center><h4>Informações Pessoais</h4></center>
        <img id="imageuser" src="img/<?php echo $usuario['img']; ?>"><br/>

        <form id="editForm">
            
		<div class="input-field col s6">
          <i class="material-icons prefix">person</i>	
			<label for="nome">Nome:</label><input type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>"><br/></div>
		
		<div class="input-field col s6">
          <i class="material-icons prefix">mail</i>
          <input id="icon_mail" type="text" name="email" value="<?php echo $usuario['email']; ?>">
          <label for="icon_mail">E-mail:</label>
        </div>
			
		<div class="input-field col s6">
		<i class="material-icons prefix">call</i>
        <label for="telefone">Telefone:</label><input type="text" id="telefone" name="telefone" value="<?php echo $usuario['telefone']; ?>"></div>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
			
		 
        <a class="blue-grey darken-4 btn" id="salvar"><i class="material-icons left">edit</i>Salvar</a>
		
        </form>

        <?php require 'footer.php'; ?>

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
                        location.reload(this);
                    } 
                });
            });
        
        </script>
	</body>
</html>