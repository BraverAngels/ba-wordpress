<?php
namespace BraverAngels\Login_Page;


function login_page_styles() {
?>
  <style type="text/css">
    body.login div#login h1 a {
      background-image: url(https://43n9a3188zqw4cdz825bl1q4-wpengine.netdna-ssl.com/wp-content/uploads/2020/04/Braver-Angels-Logo.png);
      padding-bottom: 0;
      width: 100%;
      background-size: 250px;
      background-position: bottom;
    }
    body.login #login_error, .login .message, .login .success {
      border-left: 4px solid #c80000 !important;
    }
    body.login input#wp-submit {
      background: #2850a0;
      border-color: #2850a0;
      box-shadow: 0 1px 0 #2850a0;
      color: #fff;
      text-decoration: none;
      text-shadow: none;
    }
    body.login input#wp-submit:focus, body.login input#wp-submit:hover {
      background: #2b4997;
      border-color: #2b4997;
    }
  </style>
<?php
}

add_action( 'login_enqueue_scripts', 'BraverAngels\Login_Page\login_page_styles' );
