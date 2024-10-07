function initLoginFunctionality() {
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
};