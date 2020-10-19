<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Document</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon" />
    </head>
    <body>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>
        <div class="container">
            <div class="row flex align-center">
                <div class="column-large-6">
                    <div class="header-left">
                        <a href="#" class="header-brand">Logo</a>
                        <div class="burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="column-large-6">
            		<?php
				        wp_nav_menu(array(
				          	'theme_location'  => 'header',
					        'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
					        'container'       => 'div',
					        'container_class' => 'header-right',
					        'container_id'    => 'header-list-items',
					        'menu_class'      => 'list-unstyled d-flex-end',
					        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					        'walker'          => new WP_Bootstrap_Navwalker(),
				        )); 
				    ?>
                </div>
            </div>
        </div>
    </header>