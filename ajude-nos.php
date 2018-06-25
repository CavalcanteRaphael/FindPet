<?php
    session_start();
    require 'navbar.php';
?> 	
<section>
    <center>
    
    	<div id="ajude" class="hoverable">
    	
		<h4>Faça a sua Doação</h4>
		
 		
 		<br/>
 		<h6>O que é Lorem Ipsum?
		Lorem Ipsum é simplesmente uma simulação<br/> de texto da indústria tipográfica e de impressos, e vem sendo utilizado<br/> desde o século XVI, quando um impressor desconhecido pegou uma<br/> bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem <br/>Ipsum sobreviveu não só a cinco séculos, <br/>como também ao salto para <br/> a editoração eletrônica, permanecendo essencialmente inalterado. Se <br/>popularizou na década de 60, quando a <br/>Letraset lançou decalques contendo passagens<br/> de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares<br/> de editoração <br/>eletrônica como Aldus PageMaker.</h6>
 		
 		
  		
  		<br/>
  		
   		<h6>Faça sua doação para ajudar a manter o site FindPet no ar <br/>ajudando inúmeros pets e donos a se encontrarem!</h6><h6>TODOS OS CENTAVOS FAZEM A DIFERENÇA!</h6>
   		
   		<br/>
   		
   		<div id="pagamentos">
   		<a href="http://vaka.me/mf4a1v" target="_blank" ><img src="img/vakinha.png" style= "width: 15%; margin-bottom: -2%;"></a>
   		
			<p> ou </p>
  	 
    	<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
		<form action="https://pagseguro.uol.com.br/checkout/v2/donation.html" target="_blank" method="post" style="margin:-1%;">
		<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
		<input type="hidden" name="currency" value="BRL" />
		<input type="hidden" name="receiverEmail" value="equipefindpet@gmail.com" />
		<input type="hidden" name="iot" value="button" />
		<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/209x48-doar-cinza-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
		</form>
		<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
   		</div>
 
    </center>
   </div>
	</section>

<?php
    require 'footer.php';
?>
