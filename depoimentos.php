<?php
    session_start();
?>
<?php
    require 'navbar.php';
?>
        <center>    
            <h4>Depoimentos</h4>
        </center>
        <div id="depoimentos">
            <?php 
                require "ajax/conexao.php";
                $stmt = $conn->query("SELECT depoimentos.id, depoimentos.iduser, depoimentos.texto, usuario.nome, usuario.img FROM depoimentos INNER JOIN usuario ON depoimentos.iduser = usuario.idusuario;");
                $result = $stmt->fetchAll();
                    if($result){
                        foreach($result as $row){ ?>
                            <div class="depoimento" data-id-depoimentos="<?php echo $row['id']; ?>">
                                <div class="estilodepo hoverable">
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
                    }?>
        </div>
		
        <div id="novodepoimento">
            <?php
                if(isset($_SESSION['id'])) {
            ?>
            <textarea name="depoimento" rows=5 cols=35></textarea>
            <br/>
            <a class="botaocomentario blue-grey darken-4 btn hoverable" onClick="adddepoimento()">Enviar</a>
            <?php } ?>
        </div>

        <?php
            require 'footer.php';
        ?>
        </main>
        <script>
            // usuário da sessão
            function adddepoimento(){
                var txtcomment = $('#novodepoimento textarea').val();
                txtcomment = txtcomment.replace('<', "")
                txtcomment = txtcomment.replace('?php', "")
                txtcomment = txtcomment.replace('?>', "")
                txtcomment = txtcomment.replace("<script", "")
                txtcomment = txtcomment.replace("</", "")
                txtcomment = txtcomment.replace("script>", "")
                txtcomment = txtcomment.replace(">", "")



                if (txtcomment.length > 0) {
                    $.ajax({
                        url: 'ajax/depoimento.php',
                        type: 'POST',
                        data: {'texto': txtcomment},
                        dataType: 'json',
                        success: function(response){
                            if(response.deucerto){
                                $('#novodepoimento textarea').val('');
                                $('#depoimentos').append('<div class="depoimento" data-id-depoimentos="'+response.idcriado+'"><div class="estilodepo hoverable"><div class="bordacomentario"><a class="bordacomentario" onclick="apagardepoimento('+response.idcriado+')"><i class="Small material-icons">delete</i></a><img class="avatardepoimento" src="img/<?php echo $img; ?>"><h5 class="nomedepouser"><?php echo $_SESSION['nome']; ?></h5></div><div class="textodepoimento"><br/><br/><p id="punico">'+txtcomment+'</p></div></div></div>');
                                notificar('success','Depoimento adicionado com sucesso!');	
                            } else{
                                notificar('error',response.mensagem);
                                console.log(response.error);
                            }
                        }
                    });
                } else {
                    notificar("error", "Escreva algo antes de comentar!")
                }
            }
            function apagardepoimento(id){
                $.ajax({
                    url: 'ajax/apagardepoimento.php',
                    type: 'POST',
                    data: {'id': id}, //isso que vai para o php
                    dataType: 'json',
                    success: function(response){
                        if(response.deucerto){
                            $('div[data-id-depoimentos='+id+']').fadeOut('slow');
                            notificar('success','Depoimento apagado com sucesso!');
                        } else{
                            notificar('error',response.mensagem);
                            console.log(response.erro);
                        }
                    }
                });
            }
        </script>
    </body>
</html>