<?php
    $redeSociais = listaRedesSociais("lista-redes");
?>
<!-- Footer !-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col s12" style="display : flex;justify-content : center">
                    <?php if (count($redeSociais) > 0) { ?>
                        <ul class="lista-redes">
                            <?php foreach($redeSociais as $item) : ?>
                                <li>
                                    <a href="<?= $item["link"] ?>" target="<?= $item["target"] ?>">
                                        <i class="<?= $item["icone"] ?>"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                                
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <p><span>Todos os direitos reservados</span> - 2017 - &#169; Fábio Henrique da Silva Siqueira</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Fim Footer !-->

    <!-- Botão to the top !-->
    <a href="#" class="cd-top"><i class="fa fa-chevron-up"></i></a>
    <!-- Fim Botão to the top !-->

    <!-- Loading Para Formulário !-->
        
        <div id="loading" style="background: #ddd no-repeat center;">
            <img src="<?= bloginfo("template_url") ?>/assets/images/loading.gif" />
        </div>


    <!-- FIM Loading !-->

    
    <!--- JS !-->
    <script src="<?php bloginfo("template_url") ?>/assets/js/jquery.min.js"></script>
    <script src="<?php bloginfo("template_url") ?>/assets/js/materialize.min.js"></script>
    <script src="<?php bloginfo("template_url") ?>/assets/js/scrollreveal.min.js"></script>
    <script src="<?php bloginfo("template_url") ?>/assets/js/venobox.min.js"></script>
    <script src="<?php bloginfo("template_url") ?>/assets/js/sweetalert.min.js"></script>
    <script src="<?php bloginfo("template_url") ?>/assets/js/main.js"></script>
    <!-- Fim JS !-->

    <?php wp_footer() ?>
</body>

</html>