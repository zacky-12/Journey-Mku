        <script>
            // Get the form element
            const form = document.querySelector("form");
            
            // Add a submit event listener to the form
            form.addEventListener("submit", function(event) {
              event.preventDefault(); // Prevent form submission
            
              // Retrieve the form field values
              const password = document.getElementById("password").value;
              const confirmPassword = document.getElementById("confirm_password").value;
              const phoneNumber = document.getElementById("phone").value;
            
              // Perform custom validation
              const countryCode = phoneNumber.substr(0, 3); // Extract the first three digits
              const phoneNumberDigits = phoneNumber.substr(3);
            
              if (password !== confirmPassword) {
                // Passwords don't match
                alert("Passwords do not match.");
            } else if (!phoneNumberDigits.match(/^\d{10}$/)) {
                alert("Invalid Phone number");
              } else if (countryCode !== "+123") { // Replace "+123" with the desired country code
                // Invalid country code
                alert("Invalid Phone number!!");
            } else {
        // Valid input, submit the form
        form.submitForm();
      }
    });
    
    // Custom method to handle form submission
    form.submitForm = function() {
      this.submit();
    };
       </script> 