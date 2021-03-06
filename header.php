<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title  > <?php wp_title('-', true); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?> " >
        <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_uri' ); ?>" type="text/css">

         <?php wp_head(); ?> 
         <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89431239-1', 'auto');
  ga('send', 'pageview');

</script>
    </head>
    <body class="hero" <?php body_class(); ?>>
        <header class="head">
            <div class="nav-center">
                <div class="container has-text-centered">
                   <a href="<?php echo esc_url(home_url('/')); ?>" id="profile-img"> <img src="<?php echo get_template_directory_uri()?>/img/profile.jpg" alt="" ></a>
                    <h1 class="title">Aziz Segaoui</h1>
                    <p class="subtitle" wp-site-desc>Full stack Developper , IT consultant and JS Master.</p>
                    <div class="social">
                       
                       
                        
                        <a href="http://twitter.com/stenrdj"><i id="twitter"></i></a>
                         <a href="https://github.com/stenrdj"><i id="github"></i></a>
                         <a href="https://ma.linkedin.com/in/aziz-segaoui"><i id="linkedin"></i></a>
                          <a href="http://instagram.com/azizsegaoui/"><i id="instagram"></i></a>
                    </div>
                </div>
            </div>
     
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id' => 'primary-menu','container_class' =>'tabs container menu','menu_class' =>'')); ?>

        </header>

       <content class="hero-body">


			