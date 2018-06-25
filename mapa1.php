      <?php session_start(); ?>
      <?php require 'navbar.php'; ?> 
      <center><h4>Mapa</h4></center>

    <form class="filtros" action="#">     
       <center><h4 style="margin-top:3%;"></h4></center>
        <p>Categoria:</p>
        <input name="categoria" type="radio" value="adocao" id="adocao" checked class="with-gap" />
        <label for="adocao">
            <span>Adoção</span>
        </label>
        <input name="categoria" type="radio" value="perdido" id="perdido" class="with-gap" />
        <label for="perdido">
            <span>Perdido</span>
        </label>
        <input name="categoria" type="radio" value="encontrado" id="encontrado" class="with-gap" />
        <label for="encontrado">
            <span>Encontrado</span><br />
        </label><br/>
        <p style="margin-top: 10%;">Especie:</p>
        <input name="especie" type="radio" value="cachorro" id="cachorro" checked class="with-gap" />
        <label for="cachorro">
            <span>Cachorro</span>
        </label>
        <input name="especie" type="radio" value="gato" id="gato" class="with-gap" />
        <label for="gato">
            <span>Gato</span>
        </label>
        <input name="especie" type="radio" value="outro" id="outro" class="with-gap" />
        <label for="outro">
            <span>Outros</span>
        </label><br />
        
        <center><input type="submit" class="blue-grey darken-4 btn" name="Filtrar" value="filtrar" style="margin-top:5%;margin-bottom: 3%;     margin-top: 10%; " ></center>
    
    </form>
  
    <br/>
    
  <div id="explicacao">  
  
  <!-- Botão DOAÇÃO -->
  <a class="waves-effect btn btnexp modal-trigger" style="width: 120%; margin-top: 4%; height: 60px;
    line-height: 51px;" href="#modal1"><img class="material-icons left" src="img/iconeAzul.png" style="padding: 2%;">Doação</a>
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Doação</h4>
      <p>
        Os ícones em azul no mapa são os pets que estarão disponíveis para doação, seja ele gato ou cachorro, com a ajuda do mapa mostramos a localização do pet, para facilitar o seu acesso até o animal.
      </p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close btn-flat">Fechar</a>
    </div>
  </div>
  
  <br/>
  
  <!-- Botão PERDIDOS -->
  <a class="waves-effect btn btnexp modal-trigger" style="width: 120%;margin-bottom: 0%;height: 60px;
    line-height: 51px;" href="#modal2"><img class="material-icons left" src="img/iconeVermelho.png" style="padding: 2%;">Perdidos</a>
  
  <div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Perdidos</h4>
      <p>
        Os ícones em vermelho no mapa são os pets que estão perdidos, temos como objetivo mostrar aos usuários todos os animais que estão perdidos e o último local onde foi visto por seu dono. 
      </p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close btn-flat">Fechar</a>
    </div>
  </div>
  
  <br/>
  
  <!-- Botão ENCONTRADOS -->
  <a class="waves-effect btn btnexp modal-trigger" style="width: 120%;margin-bottom: 1%;height: 60px;
    line-height: 51px;"  href="#modal3"><img class="material-icons left" src="img/iconeVerde.png" style="padding: 2%;">Encontrados</a>
  
  <div id="modal3" class="modal">
    <div class="modal-content">
      <h4>Encontrados</h4>
      <p>Os ícones em verde no mapa são pets que foram encontrados e um usuário o cadastrou, para ajudar a encontrar seu dono.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close btn-flat">Fechar</a>
    </div>
  </div>
  
  <script>
  $(document).ready(function(){
    $('.modal').modal();
  });
  </script> 
        
</div>
  
  <br/>

  <div id="map"></div>
            <script>
      var map;
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -13.700000, lng: -47.9200000},
          mapTypeControl: false,
          streetViewControl: false,
          fullscreenControl: false,
          zoom: 4
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        <?php 
        require "ajax/conexao.php";
        ?>