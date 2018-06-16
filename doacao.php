<?php
    require 'ajax/redirLogin.php';
?>
<?php
    require 'navbar.php';
?>
        <div id="cadastrarDoaPet" class="hoverable">
            <form id="cadastro" method="post">
                <center>
                    <h4>Cadastrar Pet Para Doação</h4>
                </center>
                  <div class="input-field col s12">
                    <label for="nome">Nome do Animal (opcional) :</label>
                    <input type="text" name="nome" id="nome">
                    <br/>
                </div>
                <div class="input-field col s12">
                    <label for="cor">Cor:</label>
                    <input type="text" name="cor" id="cor">
                    <br/>
                </div>

                Porte:
                <p>
                    <input name="porte" type="radio" value="mini" id="mini" checked class="with-gap" />
                    <label for="mini">
                        <span>Mini</span>
                    </label>
                    <input name="porte" type="radio" value="pequeno" id="pequeno" class="with-gap" />
                    <label for="pequeno">
                        <span>Pequeno</span>
                    </label>
                    <input name="porte" type="radio" value="medio" id="medio" class="with-gap" />
                    <label for="medio">
                        <span>Médio</span>
                    </label>
                    <input name="porte" type="radio" value="grande" id="grande" class="with-gap" />
                    <label for="grande">
                        <span>Grande</span>
                    </label>
                    <input name="porte" type="radio" value="gigante" id="gigante" class="with-gap" />
                    <label for="gigante">
                        <span>Gigante</span>
                    </label>
                </p>
                
                Espécie:
                <p>
                    <input name="especie" type="radio" value="cachorro" id="cachorro" checked class="with-gap" />
                    <label for="cachorro">
                        <span>Cachorro</span>
                    </label>
                    <input name="especie" type="radio" value="gato" id="gato" class="with-gap" />
                    <label for="gato">
                        <span>Gato</span>
                    </label>
                    <input name="especie" type="radio" value="outros" id="outros" class="with-gap" />
                    <label for="outros">
                        <span>Outros</span>
                    </label>
                </p>

                <div class="input-field col s12">
                    <label for="raca">Raça:</label>
                    <input type="text" name="raca" id="raca">
                    <br/>
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
                    <div class="input-field col s12 ">
                        <input type="text" name="descricao" class="marerialize-textarea">
                        <label for="textarea2">Descrição</label>
                    </div>
                </div>
                <input type="hidden" name="tipo" id="tipo" value="doacao">
                <input type="hidden" name="lat" id="inputLat">
                <input type="hidden" name="lng" id="inputLng">
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                <input type="submit" class="blue-grey darken-4 btn" name="" value="Cadastrar Animal">
            </form>
        </div>
        <br/>
        <center>
            <h4 style="display:inline-block;">Informe onde o pet está disponível para adoção(opcional)</h4>
        </center>
        <div id="mapdoacao"></div>
        <script>
        var map;
        function initMap() {
        var map = new google.maps.Map(document.getElementById('mapdoacao'), {
        center: {lat: -13.700000, lng: -47.9200000},
        mapTypeControl: false,
        streetViewControl: false,
        fullscreenControl: false,
        zoom: 4
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        var marcador = new google.maps.Marker({
        position: {lat: -15.826691, lng: -47.9218204},
        draggable: true,
        map: map,
        icon: 'img/iconeAzul.png'
        });

        google.maps.event.addListener(marcador, 'dragend', function(event) {
            document.getElementById("inputLat").value = event.latLng.lat();
            document.getElementById("inputLng").value = event.latLng.lng();
        })

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
        };

        infoWindow.setPosition(pos);
        map.setCenter(pos);
        map.setZoom(14);
        marcador.setPosition(pos);
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
        if(response.deucerto == 1){
        notificar('success','Pet cadastrado com sucesso!')
        $("#cadastro").trigger("reset");
        }
        }
        });

        });
        </script>
    </body>
</html>