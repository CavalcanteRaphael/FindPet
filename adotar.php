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

<hr class="hr">
<br/>
    <div id="petsAdotar" class="row">
    <?php 
      require "ajax/conexao.php";
      $stmt = $conn->query("SELECT animal.idanimal, animal.idusuario, animal.cor, animal.porte, animal.especie, animal.raca, animal.descricao, animal.tipo, animal.nome, usuario.email FROM animal INNER JOIN usuario ON animal.idusuario = usuario.idusuario WHERE animal.tipo ='doacao';");
      $result = $stmt->fetchAll();
          $i = 1;
          if($result){
              foreach($result as $row){ ?>
              
                <div class=" row cardpet<?php echo $i; ?> col s12 m6 l4 xl4 xxl2 "><?php $i++; ?>
                    <div class="col-sm-6">
                        <div class="card sticky-action" style="overflow: visible;">
                          <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="img/doggo.jpg">
                          </div>
                            
                          <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><h10 id="pet">Nome do Pet:</h10><h5><?php if($row['nome'] == ''){ echo "Sem nome";} else{ echo $row['nome'];} ?></h5><i class="material-icons right">more_vert</i></span>
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
                            <input type="hidden" name="idanimal" value="<?php echo $row['idanimal'];?>" id="idanimal<?php echo $row['idanimal'];?>">
                            <a class="blue-grey darken-4 btn" id="localizacao<?php echo $row['idanimal'];?>"><i class="material-icons left">location_on</i>Ver no Mapa</a><br/><br/>
                            <a class="blue-grey darken-4 btn modal-trigger" href="#modal<?php echo $row['idanimal']?>" id="email"><i class="material-icons left">chat</i>Falar com o dono</a>  

                            <div id="modal<?php echo $row['idanimal']?>" class="modal">
                              <div class="modal-content">
                                <h4>Enviar Email</h4>
                                <form id="enviaEmail<?php echo $row['idanimal']?>" method="post" action="#!">
                                  Mensagem:<input type="text" name="mensagem">
                                  <input type="hidden" name="emailDestino" value="<?php echo $row['email'];?>">
                                  <input id="enviaEmail<?php echo $row['idanimal']?>" type="submit" class="modal-close waves-effect waves-green btn-flat">
                                </form>
                              </div>
                            </div>

                            <script>
                              $('#enviaEmail<?php echo $row['idanimal']?>').submit(function(event) {
                                event.preventDefault();
                                $.ajax({
                                  url: 'PHPMailer/enviar_email.php',
                                  type: 'POST',
                                  data: $('#enviaEmail<?php echo $row['idanimal']?>').serialize(),
                                  dataType: 'json',
                                  success: function(response) {
                                    notificar('alert', response)
                                  }
                                })
                              })

                              $('#localizacao<?php echo $row['idanimal'];?>').click(function(event) {
                                event.preventDefault();
                                var idanimal = $('#idanimal<?php echo $row['idanimal'];?>').val();
                                    $(location).attr('href', 'http://localhost/findpet/filtroAdotar.php?idanimal=' +idanimal)
                              })
                            </script>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php
              } 
          }?>

        </div>

        <script>
          $(document).ready(function(){
            $('.modal').modal({
              preventScrolling: true
            });
          });

        </script>
<?php
    require 'footer.php';
?>