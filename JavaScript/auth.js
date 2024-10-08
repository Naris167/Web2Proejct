function initLoginFunctionality() {
    var $loginForm = $('#login_form');
    var $signupForm = $('#signup_form');
    var $password1 = $('#SignupPassword1');
    var $confirmPasswordBox = $('#confirm-password-box');
    var $password2 = $('#SignupPassword2');



    // Existing password visibility toggle
    $('.password-toggle').click(function() {
        var passwordField = $(this).siblings('.password-field');
        var eyeIcon = $(this).find('.fa-eye');
        var eyeSlashIcon = $(this).find('.fa-eye-slash');
        if (passwordField.attr('type') === 'password') {
            passwordField.attr('type', 'text');
            eyeIcon.show();
            eyeSlashIcon.hide();
        } else {
            passwordField.attr('type', 'password');
            eyeIcon.hide();
            eyeSlashIcon.show();
        }
    });

    // New functionality for showing/hiding confirm password field
    $password1.on('input', function() {
        if ($(this).val().length > 0) {
            $confirmPasswordBox.slideDown(200);
            $password2.prop('required', true);
        } else {
            $confirmPasswordBox.slideUp(200);
            $password2.prop('required', false).val(''); // Clear the confirm password field
        }
    });
    // Ensure the confirm password box is hidden initially
    $confirmPasswordBox.hide();

    // Form submission logic with custom validation
    $signupForm.on('submit', function(e) {
        e.preventDefault();
        console.log("Register button pressed");

        const errors = [];
        
        var formData = {
            firstName: $('#SignupFName').val().trim(),
            lastName: $('#SignupLName').val().trim(),
            email: $('#SignupEmail').val().trim(),
            password: $('#SignupPassword1').val(),
            confirmPassword: $('#SignupPassword2').val()
        };

        
        if (validateFormData(formData)) {
            console.log('Form is valid');
            console.log('Form submitted successfully');
            registerUser(formData);
        } else {
            console.log('Form is invalid');
        }
        
    });

    
    $loginForm.on('submit', function(e) {
        e.preventDefault();
        console.log("Login button pressed")
        loginUser();
    });

    





    function registerUser(formData) {
    
        console.log('Attempting to register user:', formData.email);
    
        $.ajax({
            url: 'php_template/helpers/helper_register.php',
            type: 'POST',
            data: formData,
            success: function(responseText) {
                console.log('Registration response:', responseText);
                var parts = responseText.split(':');
                var status = parts[0];
                var message = parts.slice(1).join(':');
    
                if (status === 'SUCCESS') {
                    console.log('Registration successful for:', formData.email);
                    showNotification(message, "success");
                    console.log('Page will reload in 3 seconds...');
                    showNotification('Registration successful! Redirecting to the login page in 3 seconds...', "success");
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                } else if (status === 'WARNING') {
                    console.warn('Registration failed:', message);
                    showNotification(message, "warning");
                } else {
                    console.warn('Registration failed:', message);
                    showNotification(message, "error");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Registration error:', textStatus, errorThrown);
                console.error('Response Text:', jqXHR.responseText);
                showNotification("An unexpected error occurred. Please try again later.", "error");
            }
        });
    }
    
    function loginUser() {
        var formData = {
            email: $('#LoginEmail').val(),
            password: $('#LoginPassword').val()
        };
    
        console.log('Attempting to log in user:', formData.email);
    
        $.ajax({
            url: 'php_template/helpers/helper_login.php',
            type: 'POST',
            data: formData,
            success: function(responseText) {
                console.log('Login response:', responseText);
                var parts = responseText.split(':');
                var status = parts[0];
                var message = parts.slice(1).join(':');
    
                if (status === 'SUCCESS') {
                    console.log('Login successful for:', formData.email);
                    showNotification(message.split('|')[0], "success");
                    var redirectParts = message.split('|');
                    if (redirectParts.length > 1 && redirectParts[1].startsWith('REDIRECT:')) {
                        var redirectUrl = redirectParts[1].split(':')[1];
                        console.log('Redirecting to:', redirectUrl);
                        window.location.href = redirectUrl;
                    }
                } else {
                    console.warn('Login failed:', message);
                    showNotification(message, "error");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Login error:', textStatus, errorThrown);
                console.error('Response Text:', jqXHR.responseText);
                showNotification("An unexpected error occurred. Please try again later.", "error");
            }
        });
    }


    $('#LogoutButton').click(function(e) {
        e.preventDefault();
        
        console.log('Attempting to log out user');

        $.ajax({
            url: 'php_template/helpers/helper_logout.php',
            type: 'POST',
            success: function(responseText) {
                console.log('Logout response:', responseText);
                var parts = responseText.split(':');
                var status = parts[0];
                var message = parts.slice(1).join(':');

                if (status === 'SUCCESS') {
                    console.log('Logout successful');
                    showNotification(message, "success");
                    
                    // Add a 2-second delay before redirecting
                    console.log('Redirecting to index.php in 2 seconds...');
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 2000); // 2000 milliseconds = 2 seconds
                } else {
                    console.warn('Logout failed:', message);
                    showNotification(message, "error");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Logout error:', textStatus, errorThrown);
                console.error('Response Text:', jqXHR.responseText);
                showNotification("An unexpected error occurred. Please try again later.", "error");
            }
        });
    });
}