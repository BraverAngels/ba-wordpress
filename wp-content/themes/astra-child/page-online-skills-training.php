<?php
get_header(); ?>
  <div id="skills-training-wrapper">
    <iframe src="https://www.better-angels.org/wp-content/skills-training/" width="100%" height="100%"></iframe>
  </div>
  <style>
    #skills-training-wrapper {
      background: white;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      width: 100vw;
      z-index: 10000;
    }
    #skills-training-wrapper iframe {
      height: 100%;
      width: 100%;
    }
  </style>

<?php
get_footer();
