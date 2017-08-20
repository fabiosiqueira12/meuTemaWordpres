<?php
    $redeSociais = listaRedesSociais("lista-redes");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Meta Tags !-->
    <title><?php wp_title() ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="title" content="<?php bloginfo('title') ?>" />
    <meta name="description" content="<?php bloginfo('description') ?>" />
    <meta property="og:title" content="<?php bloginfo('title') ?>" />
    <meta property="og:description" content="<?php bloginfo('description') ?>" />
    <!-- FIM Meta Tags !-->

    <!-- Fonts !-->
    <link href="https://fonts.googleapis.com/css?family=Faustina" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate" >
    <!-- Fim Fonts !-->

    <!-- Pacote de icones !-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- FIM Pacote de icones !-->

    <!-- CSS !-->
    <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/assets/css/materialize.min.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/assets/css/hover-min.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/assets/css/venobox.min.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/assets/css/sweetalert.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <!-- Fim CSS !-->

    <?php wp_head() ?>
</head>

<body class="">
    <header>
        
        <div class="header-principal">
            <div class="container">
                <div class="row">
                    <div class="col s12 m12 l5">
                        
                        <?php wp_nav_menu(["menu" => "principal"  ,"menu_class" => "lista-principal"]) ?>
                        
                    </div>
                    <div class="col s12 m12 l3">
                        <a href="<?php bloginfo("url") ?>">
                            <h2 class="title-site">FH</h2>
                        </a>
                    </div>
                    <div class="col s12 m12 l4">
                        <?php if (count($redeSociais) > 0) { ?>
                            <ul class="lista-redes pull-right">
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
            </div>
        </div>
        <div class="header-mobile">
            <div class="left">
                <a href="<?php bloginfo("url") ?>">
                    <h2 class="title-site">FH</h2>
                </a>
            </div>
            <div class="right">
                <a href="javascript:void(0);" class="btn-menu">
                    <i class="fa fa-bars"></i>
                </a>               
            </div>
        </div>
        <div class="overlay-menu">
            <a href="javascript:void(0);" class="btn-fecha">X</a>
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <?php wp_nav_menu(["menu" => "principal"  ,"menu_class" => "lista-principal"]) ?>                    </div>
                    </div>
                    <div class="col s12 col-flex">
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
            </div>
        </div>
    </header>

