<?php
    session_start();
?>
<?php
    require 'navbar.php';
?>
        <div class="slider fullscreen">
            <ul class="slides">
                <li>
                    <img src="img/doggo.jpg">
                    <div class="caption center">
                        <h3>BEM-VINDO AO FINDPET</h3>
                        <h5 class="text-slides"></h5>
                    </div>
                </li>
                <li>
                    <img src="img/adocao.jpg"> <!-- random image -->
                    <div class="caption left-align">
                        <h3>Adote um pet hoje!</h3>
                        <h5 class="text-slides">Porque toda vida vale a pena.</h5>
                    </div>
                </li>
                <li>
                    <img src="img/procure.jpg"> <!-- random image -->
                    <div class="caption left-align">
                        <h3>Encontrou um animal perdido?</h3>
                        <h5 class="text-slides">Informe no mapa e ajude o próximo a encontra-lo.</h5>
                    </div>
                </li>
                <li>
                    <img src="img/doe.jpg"> <!-- random image -->
                    <div class="caption left-align">
                        <h3>Doe um amigo.</h3>
                        <h5 class="text-slides">Seu pet é nossa família.</h5>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Serviços -->
        <section class="espacamentoSuperior">
            <div class="container" style="margin-top:700px;">
                <div class="col s12 m6 l3 xl4 xxl2">
                    <h1 class="center-align">Nossos serviços</h1>
                    <p class="flow-text center-align">
                   Venha conhecer a maior plataforma de Pets.
                    </p>
                </div>
                <div class="row" style="margin-top:5%; margin-bottom:15%;"> 
                    <div class="col s12 m6 xl3 center-align">
                        <i class="medium material-icons">room</i>
                        <p></p>
                        <a class=" blue-grey darken-4 btn" href="mapa.php">Encontrar Pet</a>
                    </div>
                    <div class="col s12 m6 xl3 center-align">
                        <i class="medium material-icons">favorite_border</i>
                        <p></p>
                        <a class=" blue-grey darken-4 btn" href="adotar.php">Adotar Pet</a>
                    </div>
                    <div class="col s12 m6 xl3 center-align">
                        <i class="medium material-icons">pets</i>
                        <p></p>
                        <a class=" blue-grey darken-4 btn" href="doacao.php">Doar Pet</a>
                    </div>
                    <div class="col s12 m6 xl3 center-align">
                        <i class="medium material-icons">attach_money</i>
                        <p></p>
                        <a class="blue-grey darken-4 btn">Ajude-nos</a>
                    </div>
                </div>
            </div>
        </section>
        <hr id="hrindex">
        <center><h3 class="titulomap">Mapa dos Pets</h3></center>
        <ul class="collapsible" id="ajudamapa">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">loupe</i>
                    Doação
                    <span class="badge" id="badgeAzul">AZUL</span>
                </div>
                <div class="collapsible-body">
                    <p>Os pets em azul no mapa estão para disponíveis para doação.</p>
                </div>
            </li>
            <li>
                <div class="as collapsible-header">
                    <i class="material-icons">notifications_active</i>
                    Perdidos
                    <span class="badge" id="badgeVermelho">VERMELHO</span>
                </div>
                <div class="collapsible-body">
                    <p>Os pets em vermelho no mapa estão perdidos.</p>
                </div>
            </li>
            <li>
                <div class="as collapsible-header">
                    <i class="material-icons">add_location</i>
                    Encontrados
                    <span class="badge" id="badgeVerde">VERDE</span>
                </div>
                <div class="collapsible-body">
                    <p>Os pets em verde no mapa foram encontrados.</p>
                </div>
            </li>
        </ul>
        <div id="map22"></div>
                        <script>
                  var map;
                  function initMap() {
                    var map = new google.maps.Map(document.getElementById('map22'), {
                      center: {lat: -13.700000, lng: -47.9200000},
                      mapTypeControl: false,
                      streetViewControl: false,
                      fullscreenControl: false,
                      zoom: 4
                    });
                    var infoWindow = new google.maps.InfoWindow({map: map});
                    

        <?php 
        require "ajax/conexao.php";
                $stmt = $conn->query("SELECT idmapa, latitude, longitude, tipo FROM mapa INNER JOIN animal ON mapa.idanimal = animal.idanimal;");
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
                    icon: imgMarcador,
                    title: '<?php echo $row['idmapa'];?>'
                  });

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

                  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                                          'Erro, localização não encontrada.' :
                                          'Erro, o navegador não suporta geolocalização.');
                  }

                </script>
                <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhEAbQFcG2bVTRxjMpKIMWBDLD7ihbYsc&callback=initMap">
                </script>
        
        
        <hr id="hrindex">
      <section class="depoimentosFavoritos">
            <div class="container" style="margin-top:10%;margin-bottom:10%;">
                <div class="row">
                    <h1 class="center-align" style="margin-bottom:8%;">O que dizem sobre o site</h1>
                    <div id="depoimentos">
                        <?php 
                            require "ajax/conexao.php";
                                $stmt = $conn->query("SELECT depoimentos.id, depoimentos.iduser, depoimentos.texto, usuario.nome, usuario.img FROM depoimentos INNER JOIN usuario ON depoimentos.iduser = usuario.idusuario WHERE depoimentos.id IN ('1', '2', '3');");
                                $result = $stmt->fetchAll();
                                    if($result){
                                        foreach($result as $row){ ?>
                                            <div class="depoimento col s12 m6 l4 xl4 xxl2" data-id-depoimentos="<?php echo $row['id']; ?>">
                                                <div class="estilodepo2 hoverable">
                                                    <div class="bordacomentario">
                                                        <?php if(isset($_SESSION['id'])) { ?>
                                                            <?php if($row['iduser'] == $_SESSION['id']) { ?>
                                                        <a class="bordacomentario" onclick="apagardepoimento(<?php echo $row['id']; ?>)"><i class="Small material-icons">delete</i></a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <img class="avatardepoimento" src="img/<?php echo $row['img']; ?>">
                                                        <h5 class="nomedepouser"><?php echo $row['nome']; ?></h5>
                                                    </div>
                                                    <div class="textodepoimento">
                                                        <br/><br/><p id="punico"><?php echo $row['texto']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                <?php 
                                        }
                                    } ?>
                    </div>
                </div>
                <center><a class="blue-grey darken-4 btn" href="cadastro.php" style="margin-top: 5%;">Junte-se ao Findpet</a></center>
            </div>
        </section>
        
        <?php
            require 'footer.php';
        ?>
    </body>
</html>