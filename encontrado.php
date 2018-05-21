      <?php session_start(); ?>
      <?php require 'navbar.php'; ?> 
      <div id="CadastroPetEncontrado" class="hoverable">

        <form id="cadastro" method="post">
            
        <center><h4>Cadastrar Pet Encontrado</h4></center>

        <div class="input-field col s12">
          <label for="cor">Cor:</label><input type="text" name="cor" id="cor"><br/>
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

            <div class="row">
                <div class="input-field col s12">
                <input type="text" name="descricao" class="marerialize-textarea">
                <label for="textarea2">Descrição</label>
                </div>
            </div>

            <input name="castrado" type="hidden" value="null" id="sim" checked />

            <input name="vacinado" type="hidden" value="null" id="simvac" checked />

            <input type="hidden" name="nome" id="nome" value="null">

            <input type="hidden" name="tipo" id="tipo" value="encontrado">

            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            
       
        <input type="submit" class="blue-grey darken-4 btn" name="" value="Cadastrar Animal">

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