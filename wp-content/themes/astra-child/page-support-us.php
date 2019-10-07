<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>
  <section class="header" style="overflow: auto; background-size: cover; background-image: url(https://www.better-angels.org/wp-content/uploads/2019/09/2019-BA-Convention-631.jpg);">
    <div class="header-inner">
      <h2 style="font-family: 'Nunito Sans', 'Karla'; margin-bottom: .5rem;">Support Us<?php //the_title(); ?></h2>
      <h3 style="color: dark-gray; font-weight: 400; font-family: 'Nunito Sans', 'Karla'; "><em>Join 8,000+ Americans in supporting the nation’s largest political depolarization group as a <a href="#join"><strong>dues-paying member</strong></a>, or with a <a href="#donate"><strong>one-time donation!</strong></a></em></h3>
      <br/>
      <p>
        <a href="#">Learn more about how your contribution supports our mission</a>
      </p>
    </div>
  </section>
  <div class="entry-content clear" itemprop="text">
    <section id="join">
      <div class="join-inner">
        <div class="join-content">
          <h2>Become a Member</h2>
          <p><em>Better Angels members can:</em></p>
          <ul>
            <li>Organize meaningful workshops and debates in their communities to bridge political differences at home (we’ve had over 230 in 2019 to date!)</li>
            <li>Build community alliances that bring their neighbors together</li>
            <li>Receive valuable training as a moderator and/or debate chair</li>
            <li>Take the online, interactive Skills Workshop</li>
            <li>Contribute to “The Conversation,” the Better Angels blog</li>
            <li>Get access to member-only meetings, calls, and materials with “red” and “blue” activists from across the country</li>
            <li><em>Feel great about helping remedy one of our nation’s greatest challenges: increasing partisanship and polarization!</em></li>
          </ul>
        </div>

        <div class="join-selection-column" style="background: white;">
          <h3>Choose your level of support</h3>
          <div class="join-selection-type">

            <button class="join-selection-type-item selected" data-toggle="monthly-options">Monthly</button>
            <button class="join-selection-type-item" data-toggle="yearly-options">Yearly</button>
            <button class="join-selection-type-item" data-toggle="one-time-gift-options">One Time Gift</button>
          </div>
            <div class="join-selection-options-wrap">
              <div id="one-time-gift-options" class="join-selection-options">
                <span class="join-description">Select contribution amount</span>
                <ul>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/one-time-12/">$12</a></li>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/one-time-25/">$25</a></li>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/one-time-50/">$50</a></li>
                  <li><a data-autoselect class="join-selection-amount" href="<?php echo home_url(); ?>/join/one-time-100/">$100</a></li>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/one-time-250/">$250</a></li>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/one-time-500/">$500</a></li>
                </ul>
              </div>

              <div id="yearly-options" class="join-selection-options">
                <span class="join-description">Select yearly contribution amount</span>
                <ul>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-12/">$12</a></li>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-25/">$25</a></li>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-50/">$50</a></li>
                  <li><a data-autoselect class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-100/">$100</a></li>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-250/">$250</a></li>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/yearly-500/">$500</a></li>
                </ul>
              </div>

              <div id="monthly-options" class="join-selection-options active">
                <span class="join-description">Select monthly contribution amount</span>
                <ul>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-1/">$1</a></li>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-2/">$2</a></li>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-5/">$5</a></li>
                  <li><a data-autoselect class="join-selection-amount selected" href="<?php echo home_url(); ?>/join/monthly-10/">$10</a></li>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-25/">$25</a></li>
                  <li><a class="join-selection-amount" href="<?php echo home_url(); ?>/join/monthly-50/">$50</a></li>
                </ul>
              </div>
            </div>

          <form id="join-submit-form" action="<?php echo home_url(); ?>/join/monthly-10/">
            <input id="join-submit-button" type="submit" value="Join" />
          </form>
          <span class="join-selection-subscribe-text"><a href="#donate">I just want to donate</a></span>
        </div>
      </div>

    </section>


    <section class="donate" id="donate">
      <div class="donate-inner">
        <div class="donate-content">
          <h2 style="color: white;">Donate</h2>
          <p>
            Your contribution will be used to fund programming in all fifty states, innovative online workshops, and outreach online and on social media -- where our discourse is often at its most dehumanizing and upsetting! All of this matters for our organization and for the health of our country.
            <br/>
            Better Angels is a 501(c)3 non-profit, and all donations are tax deductible. Thank you for your support!
          </p>
        </div>
        <div class="donate-selection-column">
          <?php echo do_shortcode('[gravityform id=29 title=false description=false ajax=true tabindex=49]'); ?>
        </div>
      </div>
    </section>
  </div>

  <style>
    .ba-button-list input {
      display: none !important;
    }
    .ba-button-list li {
      display: inline-block !important;
      width: auto !important;
      min-width: 150px !important;
    }
    .ba-button-list li label {
      color: white !important;
      background: #23356c !important;
      border-radius: 0 !important;
      border: none !important;
      width: 100% !important;
      padding: 10px 40px !important;
      font-weight: normal !important;
    }
    .ba-button-list input[type="radio"]:checked + label{
      color: white !important;
      background: #ab2634 !important;
    }
    .ast-container {
      margin: 0;
      padding: 0;
      width: 100%;
      max-width: 100%;
    }
    .header {
      width: 100%;
      max-width: 100%;
    }
    .header-inner {
      overflow: auto;
      padding: 2rem .5rem 0 .5rem;
      background-color: rgba(255,255,255, .7);
    }

    .header-inner h1,
    .header-inner h2,
    .header-inner h3,
    .header-inner p {
      max-width: 1100px;
      margin-left: auto;
      margin-right: auto;
    }

    /*-------- Donate section --------*/

    #donate {
      background: #bc2f2c;
      overflow: auto;
      width: 100%;
      padding: 1rem .5rem;
    }

    #donate, .donate-inner {
      overflow: auto;
      display: block;
    }

    #donate .donate-inner {
      max-width: 1100px;
      margin-left: auto;
      margin-right: auto;
    }

    #donate .donate-selection-column {
      padding: 1rem;
      border: 1px solid lightgray;
      background: white;
      display: block;
      width: 100%;
      max-width: 700px;
      margin-top: 1rem;
    }


    #donate .donate-content,
    #donate .donate-content h2 {
      overflow: auto;
      color: white;
      display: block;
    }

    @media screen and (min-width: 1000px) {
      #donate .donate-content,
      #donate .donate-selection-column {
        display: inline-block;
        width: 50%;
        float: left;
      }
      #donate .donate-content {
        padding-right: 1rem;
      }
    }

    /*-------- Join column ----------*/

    #join {
      background: #23356C;
      padding: 1rem .5rem;
    }
    #join .join-inner {
      overflow: auto;
      display: block;
      max-width: 1100px;
      margin-left: auto;
      margin-right: auto;
    }
    #join #join-submit-button {
      background-color: #27b758;
    }

    #join .join-content,
    #join .join-content h2 {
      overflow: auto;
      color: white;
      display: block;
    }

    #join .join-selection-column {
      display: block;
      width: 100%;
      max-width: 700px;
    }

    @media screen and (min-width: 1000px) {
      #join .join-content,
      #join .join-selection-column {
        display: inline-block;
        width: 50%;
        float: left;
      }
      #join .join-content {
        padding-right: 1rem;
      }
    }

    /* ------------------ */



    #donate input[type="text"], #donate select{
      padding: 5px 10px;
      width: 100%;
      outline-style: none;
      font-size: inherit;
      font-family: inherit;
      letter-spacing: normal;
      border: 1px solid rgba(0,0,0,.2);
      display: inline;
      box-sizing: border-box;
      box-shadow: none;
      border-radius: 2px;
    }


    #donate select{
        padding: 5px 4px;
        height: 41px;
    }

    @media screen and (min-width: 769px) {
        #donate select{
            height: 44px;
        }
    }

    #donate .gfield {
      padding: 0;
    }

    #donate input:focus,
    #donate input[type="text"]:focus,
    #donate input[type="email"]:focus,
    #donate textarea:focus,
    #donate select:focus {
      border-color: #0044cc;
    }

    #donate .ba-button-list li label {
        font-size: 1rem;
        margin: 0;
    }

    #donate input[type="submit"] {
        border-radius: 5px;
        background: #27b758;
        -webkit-transition: all 0.2s ease;
        -o-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    #donate #gform_submit_button_29 {
      width: 100%;
      border-radius: 2px;
    }

    #donate input[type="submit"]:hover, #donate input[type="submit"]:focus  {
        background: #23356c;
    }

    #donate .ba-button-list {
      width: 102.5%;
    }

    #donate .ba-button-list li {
        display: inline-block;
        min-width: 50% !important;
        width: auto;
        margin: 0;
        padding-right: 5px !important;
    }


    @media screen and (min-width: 500px) {
        #donate .ba-button-list {
          width: 100%;
        }
        #donate .ba-button-list li {
            min-width: 33% !important;
            width: auto;
            padding-right: 0 !important;
        }
    }



     /*Hide the checkbox */
    #donate .ba-button-list li input {
        display: none;
    }


     /*the unselected button*/
    #donate .ba-button-list li label {
        background: white;
        color: white;
        font-weight: bold;
        padding: .5rem 1.5rem;
        border: 2px solid lightgray;
        color: #23356c;
        text-align: center;
        -webkit-transition: all 0.2s ease;
        -o-transition: all 0.2s ease;
        transition: all 0.2s ease;
        border-radius: 5px;
        max-width: 100%;
        width: 100%;
        margin-left: 0;
    }

    @media screen and (min-width: 500px) {
     #donate .ba-button-list li label {
         max-width: 95%;
     }
    }

     /*the selected button*/
    #donate .ba-button-list li input:checked + label {
        background: #23356c;
        color: white;
        border: 2px solid #23356c;
        -webkit-transition: all 0.2s ease;
        -o-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }


    #donate select{
        -moz-appearance:none; /* Firefox */
        -webkit-appearance:none;  /* Safari and Chrome */
        appearance:none;
        position: relative;
         background: url(https://www.better-angels.org/wp-content/uploads/2019/06/icon-chevron-down.png) no-repeat;
         background-size: 14px;
         background-position: right 8px center;
    }

    #donate .gfield_description {
        padding: 0;
        margin-top: 0;
    }

    @media screen and (max-width: 344px) {
        #input_29_50 .clear-multi, #input_29_50 ginput_container, #input_29_50 select{
            display: block !important;
            width: 100%;
        }
    }

    @media screen and (min-width: 345px) {
        #input_29_50 select {
            min-width: 90px
        }
    }


  </style>


  <noscript>
    <style>
      .screen-reader-label {
        visibility: visible;
        height: auto;
        position: static;
      }
      .join-selection-options ul {
        display: block;
      }
    </style>
  </noscript>

<?php get_footer(); ?>
