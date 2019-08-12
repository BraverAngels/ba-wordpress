<?php
get_header(); ?>
  <iframe id="skills-training-wrapper" src="https://www.better-angels.org/wp-content/skills-training/" width="100%" height="500"></iframe>
  <style>
    #skills-training-wrapper {
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      width: 100vw;
      z-index: 10000;
    }
    header {
      display: none !important;
    }
    footer {
      display: none !important;
    }
  </style>

<?php
get_footer();
