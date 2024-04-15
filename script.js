$(document).ready(function() {
    $('#loginForm').submit(function(event) {
      event.preventDefault(); // Prevent default form submission
      
      // Get form data
      var formData = $(this).serialize();
      
      // AJAX request
      $.ajax({
        type: 'POST',
        url: 'login.php', // PHP script handling the login
        data: formData,
        success: function(response) {
          alert(response); // Display response from the server
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText); // Log any errors to the console
        }
      });
    });
  });
  