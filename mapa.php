      <?php session_start(); ?>
      <?php require 'navbar.php'; ?> 
      <center><h4>Mapa</h4></center>
	
	<ul class="collapsible">
		
  <li>
    <div class="collapsible-header">
      <i class="material-icons">loupe</i>
      Doação
      <span class="badge" id="badgeAzul">AZUL</span></div>
    <div class="collapsible-body"><p>Os pets em azul no mapa estão para disponíveis para doação.</p></div>
  </li>
		
  <li>
    <div class="as collapsible-header">
      <i class="material-icons">notifications_active</i>
      Perdidos
      <span class="badge" id="badgeVermelho">VERMELHO</span></div>
    <div class="collapsible-body"><p>Os pets em vermelho no mapa estão perdidos.</p></div>
  </li>


<li>
    <div class="as collapsible-header">
      <i class="material-icons">add_location</i>
      Encontrados
      <span class="badge" id="badgeVerde">VERDE</span></div>
    <div class="collapsible-body"><p>Os pets em verde no mapa foram encontrados.</p></div>
  </li>
</ul>
		<br/>

    <form  class="filtros" action="">
     
       <h4>Filtros:</h4>
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
            <span>Outro</span>
        </label><br />
        
        <input type="submit" class="blue-grey darken-4 btn" name="Filtrar">
    
    </form>

	<div id="map"></div>
            <script>
      var map;
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -13.700000, lng: -47.9200000},
          zoom: 4
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        <?php 
        require "ajax/conexao.php";
                $stmt = $conn->query("SELECT latitude, longitude, tipo FROM mapa INNER JOIN animal ON mapa.idanimal = animal.idanimal;");
                $result = $stmt->fetchAll();
                if($result){
                  foreach ($result as $row) { ?>
                  if ('<?php echo $row['tipo']; ?>' == 'perdido') {
                    var imgMarcador = 'img/iconeVermelho.png'
                  } else if('<?php echo $row['tipo']; ?>' == 'doacao') {
                    var imgMarcador = 'img/iconeAzul.png'
                  } else {
                    var imgMarcador = 'img/iconeVerde.png'
                  }
                  var marcador = new google.maps.Marker({
                    position: {lat: <?php echo $row['latitude'];?>, lng: <?php echo $row['longitude'];?>},
                    map: map,
                    icon: imgMarcador
                  });

                  <?php }} ?>

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            map.setCenter(pos);
            map.setZoom(12);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhEAbQFcG2bVTRxjMpKIMWBDLD7ihbYsc&callback=initMap">
    </script>
   
	
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