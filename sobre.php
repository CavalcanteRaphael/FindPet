<?php
    session_start();
?>
<?php
    require 'navbar.php';
?>
<!--Equipe-->
    <section class="equipe grey lighten-3">
        <div class="container">
            
            <div class="row">
                <div class="col s12">
                    <h3 class="center-align">Quem Somos</h3>
                    <p class="flow-text center-align">Nosso site foi criado em 2018, no Instituto Federal de Educação, Ciência e Tecnologia de São Paulo para o projeto de conclusão do 3°Modulo de Informática para Internet, com o intuito de ajudar a comunidade.
                    O Site é voltado para que as pessoas que perderam animais ou queiram adotar, possam encontrar um animal para adotar ou seu animal perdido.</p>
                </div>
            </div>
            <div class="row">
               <img class="sobrefoto" src="img/grupo.JPG">
            </div> 
        </div>
    </section>
<!--Equipe-->

<!--Footer-->
    <?php
        require 'footer.php';
    ?>
<!--Footer-->
<!--Script-->   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script>
        $(document).ready(function(){
        $('.slider').slider();
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
        });           
    </script>
<!--Script-->
    </body>
</html>