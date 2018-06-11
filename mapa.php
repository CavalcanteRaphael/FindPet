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

    <form action="#">
      Filtros:
      <label>Categoria:</label><br />
      <input type="radio" name="categoria" value="adocao">Adoção<br />
      <input type="radio" name="categoria" value="perdido">Perdido<br />
      <input type="radio" name="categoria" value="encontrado">Encontrado<br />

      <label>Categoria:</label><br />
      <input type="radio" name="especie" value="cachorro">Cachorro<br />
      <input type="radio" name="especie" value="gato">Gato<br />
      <input type="radio" name="especie" value="outro">Outro <br />

      <input type="submit" name="Filtrar">
    </form>

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
            map.setZoom(9);
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