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
