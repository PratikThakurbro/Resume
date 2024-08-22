document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const navLinks = document.querySelector('.nav-links');

    menuToggle.addEventListener('click', function() {
        navLinks.classList.toggle('active');
    });
});

$(document).ready(function() {
    // Initially show the welcome page and hide other forms
    $('#register-form').hide();
    // $('#login-form').hide();
    // $('#forgot-password-form').hide();

    // Show the registration form
    $('#show-register-form').click(function() {
        $('#register-form-text').hide();
        // $('#login-form').hide();
        // $('#forgot-password-form').hide();
        $('#register-form').show();
    });

    // Show the login form
    $('#show-login-form').click(function() {
        // $('#register-form-text').hide();
        // $('#register-form').hide();
        $('#forgot-password-form').hide();
        $('#login-form').show();
    });

    
    // Show the forgot password form
    $('#forgot-password-link').click(function() {
        $('#login-form').hide();
        // $('#register-form').hide();
        $('#forgot-password-form').show();
    });

    // Close the registration form
    $('#close-register-form').click(function() {
        location.reload();
        $('#register-form').hide();
        $('#register-form-text').show();
    });

    // Close the login form
    $('#close-login-form').click(function() {
        location.reload();
        $('#login-form').hide();
        $('#register-form-text').show();
    });

    // Close the forgot password form
    $('#close-forgot-password').click(function() {
        // location.reload();
        $('#forgot-password-form').hide();
        $('#login-form').show(); 
    });

    
});

$(document).ready(function() {
    $('#registrationForm').on('submit', function(event) {
        let valid = true;

        // Clear previous errors
        $('.error-register').text('');
        $('input').removeClass('error'); // Clear previous error classes

        // Full Name Validation
        const fullName = $('#full-name').val().trim();
        if (fullName.length < 3) {
            $('#fullNameError').text('Full name must be at least 3 characters long');
            $('#full-name').addClass('error'); // Add error class
            valid = false;
        }

        // Phone Validation
        const phone = $('#phone').val().trim();
        if (phone.length < 10) {
            $('#phoneError').text('Phone number must be at least 10 digits long');
            $('#phone').addClass('error'); // Add error class
            valid = false;
        }

        // Email Validation
        const email = $('#gmail').val().trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            $('#gmailError').text('Please enter a valid email address');
            $('#gmail').addClass('error'); // Add error class
            valid = false;
        }

        // Password Validation
        const password = $('#password').val().trim();
        if (password.length < 8) {
            $('#passwordError').text('Password must be at least 8 characters long');
            $('#password').addClass('error'); // Add error class
            valid = false;
        }

        if (!valid) {
            event.preventDefault(); // Prevent form submission if validation fails
           
        }
    });
});

$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        let valid = true;

        // Clear previous errors
        $('.error-login').text('');
        $('input').removeClass('error'); // Clear previous error classes

        // Email Validation
        const email = $('#login-gmail').val().trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            $('#loginGmailError').text('Please enter a valid email address');
            $('#login-gmail').addClass('error'); // Add error class
            valid = false;
        }

        // Password Validation
        const password = $('#login-password').val().trim();
        if (password.length < 8) {
            $('#loginPasswordError').text('Password must be at least 8 characters long');
            $('#login-password').addClass('error'); // Add error class
            valid = false;
        }

        if (!valid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
    // Optional: Close form functionality
$('#close-login-form').on('click', function() {
    $('#login-form').hide();
});
});





$(document).ready(function() {
    $('#forgotPasswordForm').on('submit', function(event) {
        let valid = true;

        // Clear previous errors
        $('.error-forgot-pass').text('');
        $('input').removeClass('error'); // Clear previous error classes

        // Email Validation
        const email = $('#f-gmail').val().trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            $('#forgotGmailError').text('Please enter a valid email address');
            $('#f-gmail').addClass('error'); // Add error class
            valid = false;
        }

        // Password Validation
        const password = $('#f-password').val().trim();
        if (password.length < 8) {
            $('#forgotPasswordError').text('Password must be at least 8 characters long');
            $('#f-password').addClass('error'); // Add error class
            valid = false;
        }

        // Confirm Password Validation
        const confirmPassword = $('#f-conform-password').val().trim();
        if (confirmPassword !== password) {
            $('#forgotConfirmPasswordError').text('Passwords do not match');
            $('#f-conform-password').addClass('error'); // Add error class
            valid = false;
        }

        if (!valid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
        
    });
    // Optional: Close form functionality
    $('#close-forgot-password').on('click', function() {
        $('#forgot-password-form').hide();
    });
});



// resume 
$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting the traditional way
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                $('#formMessage').html('<p>Thank you for your message!</p>');
                $('#contactForm')[0].reset();
            },
            error: function() {
                $('#formMessage').html('<p>There was an error submitting the form. Please try again.</p>');
            }
        });
    });
});


$(document).ready(function() {
    // Toggle menu visibility on click
    $('.nave-icon').click(function() {
        $('.nav-links').toggleClass('active');
    });

    // Close the menu when a link is clicked
    $('.nav-links a').click(function() {
        $('.nav-links').removeClass('active');
    });
});

