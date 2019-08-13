<?php

function fb_pixel_inline_scripts() {

  if( !current_user_can('editor') && !current_user_can('administrator') ) {
  ?>

    <!-- Facebook Pixel Code -->
    <script>
      //Intialize conversion values
      var LTVMonthly = 10;
      var LTVYearly = 1.2;

      // Initialize FB Pixel
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '1593383650758809');
      fbq('track', 'PageView');



      if (window.location.pathname.includes("/members-portal/welcome/")) {
        if(!sessionStorage.getItem('new_membership')) {
          trackMembershipInfo();
        }
      } else if (window.location.pathname.includes("/thank-you-for-donating/")) {
        if(!sessionStorage.getItem('new_donation')) {
          trackDonationInfo();
        }
      } else if (window.location.pathname.includes("/join/") || window.location.pathname.includes("/donate/")) {
        fbq('track', 'InitiateCheckout');
      } else if (window.location.pathname.includes("/event/")) {
        document.addEventListener('click', function (event) {

          if (!event.target.matches('#event-signup-button')) return;

          // Don't follow the link
          event.preventDefault();

          // Remember the link href
          var href = event.target.href;

          fbq('track', 'Contact');

          setTimeout(function(){
            window.location = href;
          }, 800);
        }, false);

      }

      function trackDonationInfo() {
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

          sessionStorage.setItem('new_donation', true);
        }
      }

      // Call Pixel tracking events with membership contribution value
      function trackMembershipInfo() {
        var params = getParams(window.location.href);

        if (params.membership) {
          var txt = params.membership.match(/\d+/);
          var contributionVal = txt.join('');

          if (params.membership.toLowerCase().includes("yearly")) {
            var value = contributionVal * LTVYearly;
            fbq('track', 'StartTrial', {value: contributionVal, currency: 'USD', predicted_ltv: value.toString()});
          } else if (params.membership.toLowerCase().includes("monthly")){
            var ltvVal = contributionVal * LTVMonthly;
            fbq('track', 'Subscribe', {value: contributionVal, currency: 'USD', predicted_ltv: ltvVal.toString()});
          } else {
            fbq('track', 'Purchase', {value: contributionVal, currency: 'USD'});
          }
          sessionStorage.setItem('new_membership', true);
        }
      }


      // Returns an object of url parameters
      function getParams(url) {
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
