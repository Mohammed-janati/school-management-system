document.addEventListener('DOMContentLoaded', function() {
  window.addEventListener('resize', function() {
      var windowWidth = window.innerWidth;
      var elements = document.querySelectorAll('.jsf');

      for (var i = 0; i < elements.length; i++) {
          if (windowWidth > 792) {
              elements[i].classList.add('d-flex');
          } else {
              elements[i].classList.remove('d-flex');
          }
      }
  });
});


function submitAllForms() {
    // Loop through each form
    var forms = document.getElementsByTagName("form");
    for (var i = 0; i < forms.length; i++) {
        forms[i].submit(); // Submit each form
    }
}