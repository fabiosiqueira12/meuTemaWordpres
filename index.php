<?php get_header() ?>

<main>

    <?php
        $args = array('post_type' => "page", 'pagename' => "inicio");
        $myPage = get_posts($args);
    ?>
    <?php if ($myPage) : ?>
        <?php foreach ($myPage as $post) :
            setup_postdata($post); ?>
            <section id="inicio" class="sessao inicio section-margin" style="background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)), url('<?= the_post_thumbnail_url() ?>')">
                <div class="info-inicio">
                    <?= the_content(); ?>
                </div>
                <a href="#quem-sou" class="btn-descer">
                    <div class="arrow"></div>
                </a>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php
        $args = array('post_type' => "page", 'pagename' => "quem sou");
        $myPage = get_posts($args);
    ?>
    <?php if ($myPage) : ?>
        <?php foreach ($myPage as $post) :
            setup_postdata($post); ?>
            <section id="quem-sou" class="sessao quem-sou section-margin">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <div class="titulo-container">
                                <h2 class="titulo-page">
                                    <?php the_title(); ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="texto">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>

    <section id="habilidades" class="sessao habilidades section-margin">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="titulo-container">
                        <h2 class="titulo-page">
                            Habilidades
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row linha-skills">
            <?php 
                $args =  array('post_type' => "habilidades",
                "numberposts" => -1,
                "orderby" => 'menu_order',
                "order" => 'ASC');
                $myPosts = get_posts( $args); ?>
                <?php if ($myPosts != null) : ?>
                    <?php foreach($myPosts as $post) :
                        setup_postdata($post); ?>
                        <div class="col s12 m6 l4">
                            <div class="skill-box hvr-float">
                                <div class="icone">
                                    <img src="<?= the_post_thumbnail_url() ?>">
                                </div>
                                <div class="info-skill">
                                    <div class="titulo"><?= the_title() ?></div>
                                    
                                </div>
                            </div> 
                        </div>
                    <?php endforeach; ?>
                
                <?php else: ?>
                    <div class="col s12 text-center">
                        <h4 class="message">Desculpe as habilidades ainda não foram cadastradas !!</h4>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="portfolio" class="sessao portfolio section-margin">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="titulo-container">
                        <h2 class="titulo-page">
                            Portfólio
                        </h2>
                    </div>
                </div>
            </div>
            <?php
                $args =  array('post_type' => "post","numberposts" => -1);
                $myPosts = get_posts( $args);
            ?>
            <div class="row linha-portfolios">
                <?php if ($myPosts != null) : ?>
                    <?php foreach($myPosts as $post) :
                        setup_postdata( $post );
                        $url = get_post_field("url");
                        $categories = wp_get_object_terms( $post->ID , 'category' );
                        $gallery =  get_post_gallery_images($post);
                        $contentStripGallery = strip_shortcode_gallery( get_the_content()); 
                        $content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content',$contentStripGallery ) );                         
                    ?>
                        <div class="col s12 m12 l6">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="<?= the_post_thumbnail_url( ) ?>">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">
                                        <?= the_title() ?>
                                        <i class="fa fa-expand right" aria-hidden="true"></i>
                                    </span>
                                    <p>
                                        <?php foreach($categories as $key => $value) : ?>
                                            <?php if ($key == 0 or $key == count($categories)) { ?>
                                                <span><?= $value->name ?></span>
                                            <?php }else { ?>
                                                /<span><?= $value->name ?></span>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </p>
                                </div>
                                <div class="card-action">
                                    <a href="<?= $url ?>" target="_blank">Acessar <i class="fa fa-arrow-right"></i></a>
                                    <a href="javascript:void(0)" class="btn-galeria">Galeria de imagens <i class="fa fa-picture-o"></i></a>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title activator grey-text text-darken-4">
                                        <?= the_title() ?>
                                        <i class="fa fa-times right" aria-hidden="true"></i>
                                    </span>
                                    <p><?= $content ?></p>
                                </div>
                                <div class="card-gallery">
                                    <?php foreach($gallery as $image) : ?>
                                        <a href="<?= $image ?>" data-gall="galeria<?= $post->ID ?>" class="venobox">
                                            <img src="<?= $image ?>" />
                                        </a>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>

                    <div class="col s12 text-center">
                        <h4 class="message">Desculpe os posts ainda não foram cadastrados !!</h4>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <?php
        $args = array('post_type' => "page", 'pagename' => "contato");
        $myPage = get_posts($args);
    ?>
    <?php foreach ($myPage as $post) :
        setup_postdata($post);
        //Pegando campos personalizados da página
        $localizacao = get_post_field( "localizacao" );
        $telefone1 = get_post_field( "telefone1" );
        $telefone2 = get_post_field( "telefone2" );

    ?>
    <section id="contato" class="sessao contato">
        <div class="container">
            <div class="row linha-contato">
                <div class="col s12 m12 l4">
                    <div class="titulo-container">
                        <h2 class="titulo-page">
                            <?= the_title()  ?>
                        </h2>
                    </div>
                    <div class="linha-infor">

                        <div class="icone">

                            <i class="fa fa-map-marker"></i>

                        </div>

                        <div class="text">

                            <div class="titulo">Localização</div>

                            <div><?= $localizacao ?></div>

                        </div>

                    </div>
                    <div class="linha-infor">

                        <div class="icone">

                            <i class="fa fa-phone"></i>

                        </div>

                        <div class="text">

                            <div class="titulo">Ligue</div>

                            <div><?= $telefone1 ?></div>

                            <div><?= $telefone2 ?></div>

                        </div>

                    </div>

                    <div class="linha-infor">

                        <div class="icone">

                            <i class="fa fa-envelope"></i>

                        </div>

                        <div class="text">

                            <div class="titulo">Email</div>

                            <?php bloginfo( "admin_email" ) ?>

                        </div>

                    </div>
                </div>
                <div class="col s12 m12 l8">
                    <div class="background-contato" style="background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('<?= the_post_thumbnail_url()    ?>')">
                        <form id="form-contato" method="post" onsubmit="sendEmail(this, '<?= bloginfo("template_url") ?>/send-email.php');return false;">
                            <div class="row">
                                <div class="input-field col s12">
                                    
                                    <input name="nome" required id="icon_prefix" type="text" class="validate">
                                    <label for="icon_prefix">Seu Nome</label>
                                </div>
                                <div class="input-field col s12 m12 l6">
                                   
                                    <input name="email" required id="icon_telephone" type="email" class="validate">
                                    <label for="icon_telephone">Seu E-mail</label>
                                </div>
                                <div class="input-field col s12 m12 l6">
                                    
                                    <input name="assunto" required id="icon_tag" type="text" class="validate">
                                    <label for="icon_tag">Assunto</label>
                                </div>
                                <div class="input-field col s12 m12 l6">
                                   
                                    <textarea name="mensagem" required id="text_tag" rows="4" cols="50" class="validate"></textarea>
                                    <label for="text_tag">Sua Mensagem</label>
                                </div>
                                <div class="input-field col s12">
                                    <button class="btn waves-effect waves-light" type="submit">Enviar <i class="fa fa-paper-send"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endforeach; ?>

</main>

<?php get_footer() ?>
