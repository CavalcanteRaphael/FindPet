<?php
    require 'ajax/redirLogin.php';
?>
<?php
    require 'navbar.php';
?>
<br/>
<center><h4> Meus Pets </h4></center>

<div id="petsAdotar" class="row">
    <?php 
      require "ajax/conexao.php";
      $stmt = $conn->query("SELECT animal.idanimal, animal.idusuario, animal.cor, animal.img, animal.tipo, animal.porte, animal.especie, animal.raca, animal.sexo, animal.descricao, animal.tipo, animal.nome FROM animal INNER JOIN usuario ON animal.idusuario = usuario.idusuario WHERE animal.idusuario = ".$_SESSION['id'].";");
      $result = $stmt->fetchAll();
          $i = 1;
          if($result){
              foreach($result as $row){ ?>
              
                <div class=" row cardpet<?php echo $i; ?> col s12 m6 l4 xl4 xxl2 "><?php $i++; ?>
                    <div class="col-sm-6">
                        <div class="card sticky-action" style="overflow: visible;">
                          <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="img/<?php echo $row['img'];?>">
                          </div>
                            
                          <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><h10 id="pet">Nome do Pet:</h10><h5><?php if($row['nome'] == ''){ echo "Sem nome";} else if($row['nome'] == 'naoidentificado'){echo "Não identificado";} else{ echo $row['nome'];} ?></h5><i class="material-icons right">more_vert</i></span>
                              <br/>
                              <h10 id="pet">Descriçao:</h10>
                              <br/>
                              <p><?php echo $row['descricao']; ?></p>
                          </div>

                          <div class="card-action card-title activator ">
                            <a class="card-title activator">Mais Informações</a>
                          </div>
                            
                        
                          <div class="card-reveal" style="display: none; transform: translateY(0%);">
                            <span class="card-title grey-text text-darken-4"><b>Informações do Pet</b><i class="material-icons right">close</i></span>
                              <br/>
                            <p><b>Cor</b>: <?php echo $row['cor']; ?></p>
                            <p><b>Porte</b>: <?php echo $row['porte']; ?></p>
                            <p><b>Espécie</b>: <?php echo $row['especie']; ?></p>
                            <p><b>Raça</b>: <?php echo $row['raca']; ?></p>
                            <p><b>Sexo</b>: <?php if( $row['sexo'] == 1) {echo "Macho";} else{echo "Fêmea";} ?></p> 
                            <p><b>Tipo</b>: <?php if( $row['tipo'] == 'doacao'){echo "Doação";} else if ( $row['tipo'] == 'perdido'){echo "Perdido";} else{echo "Encontrado";} ?></p>
                            <a class="blue-grey darken-4 btn" href="#" id="localizacao"><i class="material-icons left">location_on</i>Ver no Mapa</a><br/><br/>
                            <a class="blue-grey darken-4 btn" id="salvar"><i class="material-icons left">chat</i>Falar com o dono</a>  
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
    </body>
</html>