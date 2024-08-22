$(document).ready(function() {
    // Initially hide forms
    $('#register-form').hide();
    $('#login-form').hide();
    $('#forgot-password-form').hide();

    // Show/Hide forms
    $('#show-register-form').click(function() {
        $('#register-form-text').hide();
        $('#login-form').hide();
        $('#forgot-password-form').hide();
        $('#register-form').show();
    });

    $('#show-login-form').click(function() {
        $('#register-form-text').hide();
        $('#register-form').hide();
        $('#forgot-password-form').hide();
        $('#login-form').show();
    });

    $('#forgot-password-link').click(function() {
        $('#login-form').hide();
        $('#register-form').hide();
        $('#forgot-password-form').show();
    });

    $('#close-register-form').click(function() {
        $('#register-form').hide();
        $('#register-form-text').show();
    });

    $('#close-login-form').click(function() {
        $('#login-form').hide();
        $('#register-form-text').show();
    });

    $('#close-forgot-password').click(function() {
        $('#forgot-password-form').hide();
        $('#login-form').show();
    });

    // Registration Form Validation
    $('#registrationForm').on('submit', function(event) {
        let valid = true;

        $('.error-register').text('');
        $('input').removeClass('error');

        const fullName = $('#full-name').val().trim();
        if (fullName.length < 3) {
            $('#fullNameError').text('Full name must be at least 3 characters long');
            $('#full-name').addClass('error');
            valid = false;
        }

        const phone = $('#phone').val().trim();
        if (phone.length < 10) {
            $('#phoneError').text('Phone number must be at least 10 digits long');
            $('#phone').addClass('error');
            valid = false;
        }

        const email = $('#gmail').val().trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            $('#gmailError').text('Please enter a valid email address');
            $('#gmail').addClass('error');
            valid = false;
        }

        const password = $('#password').val().trim();
        if (password.length < 8) {
            $('#passwordError').text('Password must be at least 8 characters long');
            $('#password').addClass('error');
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });

    // Login Form Validation and AJAX
    $('#loginForm').on('submit', function(event) {
        event.preventDefault();

        let valid = true;
        $('.error-login').text('');
        $('input').removeClass('error');

        const email = $('#login-gmail').val().trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            $('#loginGmailError').text('Please enter a valid email address');
            $('#login-gmail').addClass('error');
            valid = false;
        }

        const password = $('#login-password').val().trim();
        if (password.length < 8) {
            $('#loginPasswordError').text('Password must be at least 8 characters long');
            $('#login-password').addClass('error');
            valid = false;
        }

        if (!valid) {
            return;
        }

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#login-form').hide();
                    $('#register-form-text').show();
                } else {
                    $('#loginPasswordError').text(response.message);
                    $('#login-password').addClass('error');
                }
            },
            error: function() {
                $('#loginPasswordError').text('There was an error processing your request. Please try again.');
            }
        });
    });

    // Forgot Password Form Validation
    $('#forgotPasswordForm').on('submit', function(event) {
        let valid = true;

        $('.error-forgot-pass').text('');
        $('input').removeClass('error');

        const email = $('#f-gmail').val().trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            $('#forgotGmailError').text('Please enter a valid email address');
            $('#f-gmail').addClass('error');
            valid = false;
        }

        const password = $('#f-password').val().trim();
        if (password.length < 8) {
            $('#forgotPasswordError').text('Password must be at least 8 characters long');
            $('#f-password').addClass('error');
            valid = false;
        }

        const confirmPassword = $('#f-conform-password').val().trim();
        if (confirmPassword !== password) {
            $('#forgotConfirmPasswordError').text('Passwords do not match');
            $('#f-conform-password').addClass('error');
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});
