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
                        <h3>Adote um filhote hoje!</h3>
                        <h5 class="text-slides">Faça uma boa ação.</h5>
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
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h1 class="center-align">Nossos serviços</h1>
                        <p class="flow-text center-align">
                        Nosso slider é um carrocel de imagem simples e elegante. Você pode ter legendas que farão a 
                        </p>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 xl3 center-align">
                            <i class="medium material-icons">room</i>
                            <p></p>
                            <a class=" blue-grey darken-4 btn" href="mapa.php">Encontrar Pet</a>
                        </div>
                        <div class="col s12 m6 xl3 center-align">
                            <i class="medium material-icons">favorite_border</i>
                            <p></p>
                            <a class=" blue-grey darken-4 btn" >Adotar Mascote</a>
                        </div>
                        <div class="col s12 m6 xl3 center-align">
                            <i class="medium material-icons">pets</i>
                            <p></p>
                            <a class=" blue-grey darken-4 btn" href="doacao.php">Doar Animal</a>
                        </div>
                        <div class="col s12 m6 xl3 center-align">
                            <i class="medium material-icons">attach_money</i>
                            <p></p>
                            <a class="blue-grey darken-4 btn">Ajude-nos</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="depoimentosFavoritos">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h1 class="center-align">O que dizem sobre o site</h1>
                        <div id="depoimentos">
                            <?php 
                                require "ajax/conexao.php";
                                    $stmt = $conn->query("SELECT depoimentos.id, depoimentos.texto, usuario.nome, usuario.img FROM depoimentos INNER JOIN usuario ON depoimentos.iduser = usuario.idusuario WHERE depoimentos.id IN ('1', '2', '3');");
                                    $result = $stmt->fetchAll();
                                        if($result){
                                            foreach($result as $row){ ?>
                                                <div class="depoimento" data-id-comentario="<?php echo $row['id']; ?>">
                                                    <i class="icon-trash" onclick="apagarDepoimento(<?php echo $row['id']; ?>)"></i>
                                                    <img class="avatar" src="img/<?php echo $row['img']; ?>">
                                                    <div class="textodepoiemnto">
                                                        <h5><?php echo $row['nome']; ?></h5>
                                                        <p><?php echo $row['texto']; ?></p>
                                                    </div>
                                                </div>
                                    <?php 
                                            }
                                        } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
            require 'footer.php';
        ?>
    </body>
</html>