<!DOCTYPE html>

<html <?php language_attributes(); ?>>



<head>



    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <!-- Feeds, Pingbacks and Stuff -->

    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />



    <?php wp_head(); ?>



</head>

<body <?php body_class(); ?>>



    <?php

    if( _clementine_get_option_('adD_enable_topbar') == '1' ) :

        get_template_part( 'theme-partials/header/top' );

    endif;

    get_template_part( 'theme-partials/header/header-1' );

    ?>