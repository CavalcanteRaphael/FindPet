      <?php require 'ajax/redirLogin.php'; ?>
      <?php require 'navbar.php'; ?> 
      <div id="cadastrarUsuario" class="container">

        <form id="cadastro" method="post">
            
        <center><h1>Cadastrar Animal Para Doação</h1></center>

        <div class="input-field col s12">
          <label for="cor">Cor:</label><input type="text" name="cor" id="cor"><br/>
        </div>
            
        <div class="input-field col s12">
            <select name="porte">
              <option value="" disabled selected>Selecione o Porte:</option>
              <option value="mini">Mini</option>
              <option value="pequeno">Pequeno</option>
              <option value="medio">Médio</option>
              <option value="grande">Grande</option>
              <option value="gigante">Gigante</option>
            </select>
            <label>Porte:</label>
        </div>

        <div class="input-field col s12">
          <select name="especie">
            <option value="" disabled selected>Selecione a espécie:</option>
            <option value="cachorro">Cachorro</option>
            <option value="gato">Gato</option>
          </select>
          <label>Espécie:</label>
        </div>

        <div class="input-field col s12">
          <label for="raca">Raça:</label><input type="text" name="raca" id="raca"><br/>
        </div>

        
            Sexo:
                <p>
                <input name="sexo" type="radio" value="macho" id="macho" checked class="with-gap" />
                  <label for="macho">
                    <span>Macho</span>
                  </label>
                <input name="sexo" type="radio" value="femea" id="femea" class="with-gap" />
                  <label for="femea">
                    <span>Fêmea</span>
                  </label>
                </p>
                Castrado:
                <p>
                <input name="castrado" type="radio" value="sim" id="sim" checked class="with-gap" />
                  <label for="sim">
                    <span>Sim</span>
                  </label>
                <input name="castrado" type="radio" value="nao" id="nao" class="with-gap" />
                  <label for="nao">
                    <span>Não</span>
                  </label>
                </p>
                Vacinado:
                <p>
                <input name="vacinado" type="radio" value="sim" id="simvac" checked class="with-gap" />
                  <label for="simvac">
                    <span>Sim</span>
                  </label>
                <input name="vacinado" type="radio" value="nao" id="naovac" class="with-gap" />
                  <label for="naovac">
                    <span>Não</span>
                  </label>
                </p>
            <div class="row">
                <div class="input-field col s12">
                <input type="text" name="descricao" class="marerialize-textarea">
                <label for="textarea2">Descrição</label>
                </div>
            </div>

            <input type="hidden" name="nome" id="nome" value="null">

            <input type="hidden" name="tipo" id="tipo" value="doacao">

            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            
        <div class="file-field input-field">
          <div class="btn">
            <span>Add imagens</span>
            <input class="waves-effect green" type="file" multiple>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Adicionar imagens">
          </div>
        </div>
            
        <input type="submit" class="waves-effect green btn" name="" value="Cadastrar Animal">

        </form>

      </div>
	
      <?php
          require 'footer.php';
        ?>

      <script type="text/javascript">
          $(document).ready(function() {
            $('select').material_select();
          });

          $('#cadastro').submit(function(event){
            event.preventDefault();
            $.ajax({
              url: 'ajax/cadastroAnimal.php',
              type: 'POST',
              data: $('#cadastro').serialize(),
              dataType: 'json',
              success: function(response){
                console.log(response);
              }
            });

          });
      </script>

    </body>
</html>