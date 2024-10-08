
function validateFormData(formData) {
    var isValid = false;
    var allFieldsValid = true;
  
    // Remove existing tooltips
    removeAllTooltips();
    initializeValidation();
  
    // Trim all input fields
    for (let key in formData) {
      if (typeof formData[key] === 'string') {
          formData[key] = formData[key].trim();
      }
    }
  
    // Regular expression for name validation (only alphabetic characters)
    var nameRegex = /^[A-Za-z]+$/;
  
    // Validate First Name
    if (formData.firstName.length === 0) {
        showError('#SignupFName', 'Please enter your first name');
        allFieldsValid = false;
    } else if (formData.firstName.length < 2) {
        showError('#SignupFName', 'First name should be at least 2 characters long');
        allFieldsValid = false;
    } else if (!nameRegex.test(formData.firstName)) {
        showError('#SignupFName', 'First name should contain only letters (A-Z, a-z)');
        allFieldsValid = false;
    }
  
    // Validate Last Name
    if (formData.lastName.length === 0) {
        showError('#SignupLName', 'Please enter your last name');
        allFieldsValid = false;
    } else if (formData.lastName.length < 2) {
        showError('#SignupLName', 'Last name should be at least 2 characters long');
        allFieldsValid = false;
    } else if (!nameRegex.test(formData.lastName)) {
        showError('#SignupLName', 'Last name should contain only letters (A-Z, a-z)');
        allFieldsValid = false;
    }
  
    // Validate Email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (formData.email.length === 0) {
        showError('#SignupEmail', 'Please enter your email address');
        allFieldsValid = false;
    } else if (!emailRegex.test(formData.email)) {
        showError('#SignupEmail', 'Please enter a valid email address (e.g., name@example.com)');
        allFieldsValid = false;
    }
  
    // Validate Password
    if (formData.password.length === 0) {
        showError('#SignupPassword1', 'Please enter a password');
        allFieldsValid = false;
    } else if (formData.password.length < 8) {
        showError('#SignupPassword1', 'Password must be at least 8 characters long');
        allFieldsValid = false;
    } else if (!/[A-Z]/.test(formData.password) || !/[a-z]/.test(formData.password) || !/[0-9]/.test(formData.password)) {
        showError('#SignupPassword1', 'Password must include at least one uppercase letter, one lowercase letter, and one number');
        allFieldsValid = false;
    }
  
    // Validate Confirm Password
    if (formData.confirmPassword.length === 0) {
        showError('#SignupPassword2', 'Please confirm your password');
        allFieldsValid = false;
    } else if (formData.confirmPassword !== formData.password) {
        showError('#SignupPassword2', 'Passwords do not match. Please try again');
        allFieldsValid = false;
    }
  
    // Set isValid to true only if all fields are valid
    isValid = allFieldsValid;
  
    return isValid;
}

function showError(inputId, message) {
    var $input = $(inputId);
    removeTooltip($input); // Remove existing tooltip before adding a new one
    var $tooltip = $('<div class="error-tooltip hide"><i class="fas fa-exclamation-circle"></i><span>' + message + '</span></div>');
    $input.after($tooltip);

    // Force reflow to ensure the 'hide' class is applied before removing it
    $tooltip[0].offsetHeight;

    requestAnimationFrame(function() {
        $tooltip.removeClass('hide');
    });
}

function removeTooltip($input) {
    var $tooltip = $input.next('.error-tooltip');
    if ($tooltip.length) {
        $tooltip.addClass('hide');
        setTimeout(function() {
            $tooltip.remove();
        }, 300);
    }
}

function removeAllTooltips() {
    $('.error-tooltip').addClass('hide');
    setTimeout(function() {
        $('.error-tooltip.hide').remove();
    }, 300);
}

function addValidationStyles() {
    if ($('#validation-styles').length === 0) {
        $('<style>')
            .attr('id', 'validation-styles')
            .prop('type', 'text/css')
            .html(`
                @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap');
                .error-tooltip {
                    font-family: 'Roboto', sans-serif;
                    color: #721c24;
                    background-color: #f8d7da;
                    border: 1px solid #f5c6cb;
                    border-radius: 4px;
                    padding: 8px 12px 8px 36px;
                    font-size: 0.9em;
                    font-weight: 500;
                    margin-top: 90px;
                    position: absolute;
                    z-index: 1000;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                    opacity: 1;
                    transform: translateY(0);
                    transition: opacity 0.3s ease, transform 0.3s ease;
                    box-sizing: border-box;
                    width: auto;
                    max-width: 100%;
                    left: 0;
                    white-space: nowrap;
                }
                .error-tooltip.hide {
                    opacity: 0;
                    transform: translateY(-10px);
                    pointer-events: none;
                }
                .error-tooltip i {
                    position: absolute;
                    left: 12px;
                    top: 50%;
                    transform: translateY(-50%);
                    font-size: 1.1em;
                }
                .error-tooltip span {
                    display: inline-block;
                    white-space: normal;
                    word-break: break-word;
                }
                .input-box {
                    position: relative;
                    margin-bottom: 20px;
                }
            `)
            .appendTo('head');
    }
}

function setupEventListeners() {
    // Remove tooltip when user starts typing
    $('.input-box input').on('input', function() {
        removeTooltip($(this));
    });

    // Remove tooltip when input gains focus
    $('.input-box input').on('focus', function() {
        removeTooltip($(this));
    });

    // Remove all tooltips when user clicks outside the form
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.signup-form').length) {
            removeAllTooltips();
        }
    });
}

function setupInputTrimming() {
    $('.input-box input').on('blur', function() {
        var trimmedValue = $(this).val().trim();
        $(this).val(trimmedValue);
    });
}

// Call this function to initialize the validation system
function initializeValidation() {
    addValidationStyles();
    setupEventListeners();
    setupInputTrimming();
}
