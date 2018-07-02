<?php
    session_start();
    require 'navbar.php';
?> 	
<section>
    <center>
    <div id="ajude" class="hoverable">
        <h4>Faça a sua Doação</h4>
            <br/>
        <h6>A sua ajuda é muito importante para continuarmos com o nosso serviço,</h6>  
        <h6>porque através dela nós conseguimos fazer uma família mais feliz!</h6>	
            <br/>
        <h6>Faça sua doação para ajudar a manter o FindPet no ar,</h6> 
        <h6>ajudando inúmeros pets e donos a se encontrarem!</h6>
            <br/>
        <h6>CADA CENTAVO FAZ A DIFERENÇA!</h6>
            <br/>
        <div id="pagamentos">
            <a href="http://vaka.me/mf4a1v" target="_blank"><img src="img/vakinha.png" class="vakinha"></a>
            <hr class="hrajude"/>
            <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
            <form action="https://pagseguro.uol.com.br/checkout/v2/donation.html" target="_blank" method="post">
                <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
                <input type="hidden" name="currency" value="BRL" />
                <input type="hidden" name="receiverEmail" value="equipefindpet@gmail.com" />
                <input type="hidden" name="iot" value="button" />
                <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/209x48-doar-cinza-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
            </form>
            <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
            <hr class="hrajude"/>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="QP9WBR4876NTS">
                <input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
            </form>

        </div>
    </div>
    </center>
</section>
<?php
    require 'footer.php';
?>
