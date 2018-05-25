<?php
    session_start();
    require 'navbar.php';
?>

<br/>
<center><h4> Faça uma boa ação e adote um Pet. </h4></center>


<?php if(!isset($_SESSION['id'])){ ?>
    <br/>
    <div id="adotarlogin"> 
    <h6>Faça seu login para adotar.</h6>  <a class="blue-grey darken-4 btn" href="cadastro.php" ><i class="material-icons left">account_circle</i>Login</a>
    </div>
<?php } ?>

<hr/>
<br/>
    <div id="petsAdotar">
    <?php 
      require "ajax/conexao.php";
      $stmt = $conn->query("SELECT animal.idanimal, animal.idusuario, animal.cor, animal.porte, animal.especie, animal.raca, animal.descricao, animal.tipo FROM animal INNER JOIN usuario ON animal.idusuario = usuario.idusuario WHERE animal.tipo ='doacao';");
      $result = $stmt->fetchAll();
          $i = 1;
          if($result){
              foreach($result as $row){ ?>
              
                <div class=" row cardpet<?php echo $i; ?> col s12 m6 l3 "><?php $i++; ?>
                    <div class="col s12 m6 l3">
                        <div class="card sticky-action" style="overflow: visible;">
                          <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="img/doggo.jpg">
                          </div>
                            
                          <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><h10 id="pet">Nome do Pet:</h10><h5>Scooby</h5><i class="material-icons right">more_vert</i></span>
                              <br/>
                              <h10 id="pet">Descriçao:</h10>
                              <br/>
                              <p><?php echo $row['descricao']; ?></p>
                          </div>

                          <div class="card-action card-title activator ">
                            <a class="card-title activator">Mais Informações</a>
                          </div>
                            
                        
                          <div class="card-reveal" style="display: none; transform: translateY(0%);">
                            <span class="card-title grey-text text-darken-4">Informações do Pet<i class="material-icons right">close</i></span>
                              <br/>
                            <p>Cor: <?php echo $row['cor']; ?></p>
                            <p>Porte: <?php echo $row['porte']; ?></p>
                            <p>Espécie: <?php echo $row['especie']; ?></p>
                            <p>Raça: <?php echo $row['raca']; ?></p>
                            <p>Sexo: Macho</p> 
                            <a class="blue-grey darken-4 btn" id="salvar"><i class="material-icons left">chat</i>Falar com o dono</a>
                              
                        <div id="map2"></div>
                        <script>
                  var map;
                  function initMap() {
                    var map = new google.maps.Map(document.getElementById('map2'), {
                      center: {lat: -23.620972, lng: -45.6372588},
                      zoom: 13
                    });
                    var infoWindow = new google.maps.InfoWindow({map: map});

                    var marcador = new google.maps.Marker({
                      position: {lat: -23.63324584, lng: -45.4241625},
                      map: map,
                      icon: 'img/iconeMapa.png'
                    });

                    // Try HTML5 geolocation.
                    if (navigator.geolocation) {
                      navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                          lat: position.coords.latitude,
                          lng: position.coords.longitude
                        };

                        infoWindow.setPosition(pos);
                        infoWindow.setContent('Location found.');
                        map.setCenter(pos);
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
                              
                        </div>
                        </div>
                      </div>
                    </div>
            <?php
              } 
          }?>

        </div>

<?php
    require 'footer.php';
?>