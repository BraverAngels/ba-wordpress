<!DOCTYPE html>
  <?php astra_html_before(); ?>
  <html <?php language_attributes(); ?>>
  <head>
  <?php astra_head_top(); ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
  <?php astra_head_bottom(); ?>
</head>
  <body>
    <iframe id="skills-training-wrapper" src="https://www.better-angels.org/wp-content/skills-training/" width="100%" height="500"></iframe>
    <style>
      #skills-training-wrapper {
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        width: 100vw;
      }

    </style>
  </body>
</html>
