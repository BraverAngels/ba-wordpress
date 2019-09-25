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
  <section class="header">
    <h2 style="font-family: 'Nunito Sans', 'Karla'; margin-bottom: .5rem;">Support Us<?php //the_title(); ?></h2>
    <h3 style="color: gray; font-weight: 400; font-family: 'Nunito Sans', 'Karla'; "><em>Sub-Header</em></h3>
    <?php //the_content(); ?>
    <br/>
    <p>
      Do something good for your country. It's really important for the following reasons:
    </p>
    <ul>
      <li>Something</li>
      <li>Something else</li>
      <li>Something else</li>
    </ul>
    <p style="text-align: center;">
      <a href="#donate"><strong>Make a One-time Donation</strong></a> OR <a href="#join"><strong>Become a dues-paying member</strong></a>
    </p>
  </section>
  <div class="entry-content clear" itemprop="text">

    <section class="donate" id="donate" style="overflow:auto;padding-top: 75px;">
      <div style="width: 100%; display: block;">
        <hr/>
        <div style="width: 50%; padding-right: 16px; display: inline-block;float: left;">
          <h2>Donate</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <ul>
            <li>Something</li>
            <li>Something else</li>
            <li>Something else</li>
          </ul>
        </div>
        <div style="width: 50%; display: inline-block;float: left;height: 300px;background: lightgray;">
          <p>DONATION FORM GOES HERE</p>
        </div>
      </div>
      <br/>
      <?php //echo do_shortcode('[gravityform id=16 title=false description=false ajax=true tabindex=49]'); ?>
    </section>

    <section class="donate" id="join" style="overflow:auto;padding-top: 75px;">
      <div style="width: 100%; display: block;">
        <hr/>
        <div style="width: 50%; padding-right: 16px; display: inline-block;float: left;">
          <h2>Become a Member</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <ul>
            <li>Something</li>
            <li>Something else</li>
            <li>Something else</li>
          </ul>
        </div>
        <div style="width: 50%; display: inline-block;float: left;height: 300px;background: lightgray;">
          <p>Membership option buttons go here</p>
        </div>
      </div>
      <br/>
      <?php //echo do_shortcode('[gravityform id=16 title=false description=false ajax=true tabindex=49]'); ?>
    </section>

  </div>



<style>
  .entry-content {
    margin: auto;
    display: block;
    max-width: 1200px;
    margin-top: 2rem;
    margin-bottom: 2rem;
    padding: 0;
  }
  .join-selection-column {
    padding: 1rem;
    border: 1px solid lightgray;
    max-width: 600px;
    margin: auto;
  }
  .join-content-column.for-small {
    display: block;
  }
  .join-content-column.for-large {
    display: none;
  }
  .join-selection-type {
    display: block;
    margin-bottom: 1rem;
  }
  .join-selection-type-item {
    padding: 10px 10px;
    display: block;
    width: 100%;
    margin: .125rem;
  }
  .join-selection-subscribe-text {
    line-height: 1.5;
    display: inline-block;
    margin-top: 1rem;
  }
  @media screen and (min-width: 900px) {
    .entry-content {
      padding: 0 1rem;
    }

    .join-selection-column {
      width: 60%;
      float: left;
      display: inline-block;
    }
    .join-content-column {
      padding-right: 1rem;
    }
    .join-selection-column {
      margin-top: 1rem;
      min-height: 300px;
      width: 40%;
      max-width: 40%;
    }
    .join-selection-type {
      display: flex;
      flex-wrap: wrap;
      flex-grow: 1;
      margin-bottom: 1rem;
    }
    .join-selection-type-item {
      padding: 10px 10px;
      display: inline-block;
      flex: 1;
    }
    .join-selection-options ul li {
      min-width: 33%;
    }
  }
  /* @media screen and (min-width: 1200px) {
    .join-selection-type-item {
      padding: 10px 10px;
      max-width: 32.5%;
      margin-bottom: 1rem;
    }
  } */

  .screen-reader-label {
    visibility: hidden;
    height: 0px;
    position: absolute;
  }
  .join-selection-options-wrap {
    min-height: 100px;
  }
  .join-selection-options {
    display: none;
  }
  .join-selection-options.active {
    display: block;
    overflow: auto;
  }
  .join-selection-options ul {
    list-style: none;
    margin-left: 0;
    display: flex;
    flex-wrap: wrap;
    flex-grow: 1;
  }
  .join-selection-options ul li {
    display: inline-block;
    min-width: auto;
    flex: 1;
    padding: .125rem;
  }
  /* .join-selection-options ul li:first-child {
    padding-left: 0;
  }
  .join-selection-options ul li:last-child {
    padding-right: 0;
  } */
  .join-selection-options ul li a{
    border-radius: 2px;
    display: block;
    text-align: center;
    width: 100%;
    padding: 10px 40px;
    color: #ffffff;
    border-color: #23356c;
    background-color: #23356c;
    display: inline-block;
  }
  .join-selection-amount {
    transition: none;
  }
  .join-selection-options ul li a:hover,
  .join-selection-options ul li a:focus,
  .join-selection-options ul li a:active,
  .join-selection-type button.selected,
  .join-selection-amount.selected {
    color: #ffffff;
    border-color: #ab2634;
    background-color: #ab2634;
  }
  .join-description {
    padding-bottom: .5rem;
    display: inline-block;
    font-size: 17px;
    /* color: #3c3c3c; */
    line-height: 1.5;
  }
  .join-selection-type {}
  #join-submit-button {
    width: 100%;
  }
  #join-submit-button:disabled {
    background: #8e8e8e;
    cursor: not-allowed;
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
<script>

  function handleSelectPaymentType() {
    document.addEventListener('click', function (event) {
      // If the clicked element doesn't have the right selector, bail
      if (!event.target.matches('.join-selection-type button')) return;
      // Don't follow the link
      event.preventDefault();

      var selectedId = event.target.getAttribute('data-toggle');
      var options = document.getElementsByClassName('join-selection-type-item');
      for (var i = 0; i < options.length; i++) {
        if (options[i].classList.contains('selected') ) {
          options[i].classList.remove('selected');
        }
      }
      event.target.classList.add('selected');

      togglePaymentAmount(false);
      togglePaymentType(selectedId);

    }, false);
  }


  function togglePaymentType(id) {
    var options = document.getElementsByClassName('join-selection-options');
    for (var i = 0; i < options.length; i++) {
      if (options[i].classList.contains('active') && options[i].id != id ) {
        options[i].classList.remove('active');
      } else if (!options[i].classList.contains('active') && options[i].id == id) {
        options[i].classList.add('active');
      }
    }
    resetSelectedAmount();
  }

  function handleSelectPaymentAmount() {
    document.addEventListener('click', function (event) {
      // If the clicked element doesn't have the right selector, bail
      if (!event.target.matches('.join-selection-amount')) return;
      // Don't follow the link
      event.preventDefault();

      var options = document.getElementsByClassName('join-selection-amount');

      for (var i = 0; i < options.length; i++) {
        if (options[i].classList.contains('selected') ) {
          options[i].classList.remove('selected');
        }
      }

      event.target.classList.add('selected');

      var selectedUrl = event.target.getAttribute('href');

      togglePaymentAmount(selectedUrl);
    }, false);
  }


  function togglePaymentAmount(url) {
    if (!url) {
      document.getElementById('join-submit-form').setAttribute('action', '');
      document.getElementById('join-submit-button').setAttribute('disabled', 'disabled');
    } else {
      document.getElementById('join-submit-form').setAttribute('action', url);
      document.getElementById('join-submit-button').removeAttribute('disabled');
    }
  }

  function resetSelectedAmount() {
    var options = document.getElementsByClassName('join-selection-amount');

    for (var i = 0; i < options.length; i++) {
      var isAutomaticallySelected = options[i].parentNode.parentNode.parentNode.classList.contains('active') && options[i].getAttribute('data-autoselect') != null;

      if(isAutomaticallySelected) {

        options[i].classList.add('selected');
        togglePaymentAmount(options[i].href);

      } else if (options[i].classList.contains('selected') ) {
        options[i].classList.remove('selected');

      }
    }
  }

  function init() {
    handleSelectPaymentType();
    handleSelectPaymentAmount();
  }

  init();

</script>
<?php get_footer(); ?>
