<?php
    require 'ajax/redirLogin.php';
?>
<?php
    require 'navbar.php';
?>  
<div id="CadastroPetEncontrado" class="hoverable">
    <form id="cadastro" method="post">
        <center>
            <h4>Cadastrar Pet Encontrado</h4>
        </center>
        <div class="input-field col s12">
            <label for="cor">Cor:</label>
            <input type="text" name="cor" id="cor">
            <br/>
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

<center>
    <h4>Informe onde o pet foi visto pela última vez</h4>
</center>
<div id="map1"></div>
<script>
var map;
function initMap() {
var map = new google.maps.Map(document.getElementById('map1'), {
center: {lat: -23.620972, lng: -45.6372588},
zoom: 14
});
var infoWindow = new google.maps.InfoWindow({map: map});

var marcador = new google.maps.Marker({
position: {lat: -23.63324584, lng: -45.4241625},
map: map,
draggable: true,
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
if(response.deucerto === 1){
notificar('success','Pet cadastrado com sucesso!')
$("#cadastro").trigger("reset");
}
}
});
});
</script>
</body>
</html>