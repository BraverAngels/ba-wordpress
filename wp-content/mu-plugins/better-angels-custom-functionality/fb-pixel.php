<?php

function fb_pixel_inline_scripts() {

  if (is_page('thank-you') || is_page('thank-you-for-donating')) { ?>

    <!-- Facebook Pixel Code -->
    <script>

      var LTVMonthly = 10;
      var LTVYearly=1.2;

      // the function for getting url parameters
      var getParams = function (url) {
        var params = {};
        var parser = document.createElement('a');
        parser.href = url;
        var query = parser.search.substring(1);
        var vars = query.split('&');
        for (var i = 0; i < vars.length; i++) {
          var pair = vars[i].split('=');
          params[pair[0]] = decodeURIComponent(pair[1]);
        }
        return params;
      };

      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window,document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');

      fbq('init', '1593383650758809');

      var params = getParams(window.location.href);

      //The custom tracking logic
      if (params.type && params.contribution) {

        var contributionVal = params.contribution.replace(/\$/g, '');

        if( params.type == "Yearly" ) {
          var value = contributionVal * LTVYearly;
          fbq('track', 'StartTrial', {value: contributionVal, currency: 'USD', predicted_ltv: value.toString()});
        } else if ( params.type == "Monthly" ) {
          var ltvVal = contributionVal * LTVMonthly;
          fbq('track', 'Subscribe', {value: contributionVal, currency: 'USD', predicted_ltv: ltvVal.toString()});
        } else {
          fbq('track', 'Purchase', {value: contributionVal, currency: 'USD'});
        }

      }
    </script>

    <noscript>
      <img height="1" width="1"
      src="https://www.facebook.com/tr?id=1593383650758809&ev=PageView
      &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

  <?php } elseif (is_page('join')) { ?>

    <!-- Facebook Pixel Code -->
    <script>

    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');

    fbq('init', '1593383650758809');
    fbq('track', 'InitiateCheckout');
    </script>
    <noscript>
    <img height="1" width="1"
    src="https://www.facebook.com/tr?id=1593383650758809&ev=PageView
    &noscript=1"/>
    </noscript>

    <!-- End Facebook Pixel Code -->

  <?php } elseif (is_page('convention')) { ?>

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');

    fbq('init', '1593383650758809');
    fbq('track', 'PageView');
    fbq('track', 'ViewContent');
      document.addEventListener("DOMContentLoaded", function(event) {
      var applyNowButton = document.getElementById('convention-apply-now-button');

      if (applyNowButton) {
        applyNowButton.onclick = function(e) {
        e.preventDefault();
        fbq('track', 'FindLocation');
        var url = this.href;
        setTimeout(function(){
          window.location = url;
        },
        500);
        };
      }
    });
    </script>

    <noscript>
    <img height="1" width="1"
    src="https://www.facebook.com/tr?id=1593383650758809&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

  <?php } elseif (is_page()) { ?>

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1593383650758809');
    fbq('track', 'PageView');
      

    </script>
    <noscript>
     <img height="1" width="1"
    src="https://www.facebook.com/tr?id=1593383650758809&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

  <?php
  }
}

add_action( 'wp_enqueue_scripts', 'fb_pixel_inline_scripts', 1, 1 );
