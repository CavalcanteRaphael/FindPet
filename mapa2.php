<?php
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
                  var marcador<?php echo $row['idmapa']; ?> = new google.maps.Marker({
                    position: {lat: <?php echo $row['latitude'];?>, lng: <?php echo $row['longitude'];?>},
                    map: map,
                    icon: imgMarcador,
                    title: '<?php echo $row['idmapa'];?>'
                  });

                  var content<?php echo $row['idmapa']; ?> = '<div class="row""><div class="col s12"><img style="width: 320px; height: 320px;" src="img/<?php echo $row['img']; ?>"><?php if($row['nome'] == ''){ echo "";} else{ echo "<h5>".$row['nome']."</h5>";} ?><p><?php echo $row['descricao']; ?></p><form method="get" action="verMais.php"><input type="hidden" name="idanimal" value="<?php echo $row['idanimal'];?>"><input class="blue-grey darken-4 btn" type="submit" name="info" value="Ver Mais"></form></div></div>'

                  var infowindow<?php echo $row['idmapa']; ?> = new google.maps.InfoWindow({
                    content: content<?php echo $row['idmapa']; ?>,
                    position: {lat: <?php echo $row['latitude'];?>, lng: <?php echo $row['longitude'];?>}
                  });

                  marcador<?php echo $row['idmapa']; ?>.addListener('click', function() {
                    infowindow<?php echo $row['idmapa']; ?>.open(map, marcador<?php echo $row['idmapa']; ?>);
                  });

                  infowindow<?php echo $row['idmapa']; ?>.addListener('click', function() {
                  infowindow<?php echo $row['idmapa']; ?>.close()
                })

                  <?php }} ?>

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            map.setCenter(pos);
            map.setZoom(10);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
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