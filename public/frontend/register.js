window.onload = function()
{
    console.log('document loaded');
    fetch_name();
    fetch_email();
    fetch_password();
    fetch_dob();
    fetch_phone();
    fetch_pincode();
}

function fetch_name()
{
    $('#name').on('input', function() {
        $(this).val($(this).val().toUpperCase());
    });
}

function fetch_email() {
    $('#email').on('input', function() {
        var email = $(this).val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
        if (emailRegex.test(email)) {
            // Email is valid, check its availability
            $(this).removeClass('is-invalid').addClass('is-valid');
            $('#emailError').text('');

            // AJAX request to check email availability
            $.ajax({
                url: '/check-email', // Your API endpoint
                method: 'GET',
                data: { email: email },
                success: function(response) {
                    // Email is available
                    $('#emailError').text('');
                    $('#email').removeClass('is-invalid').addClass('is-valid');
                },
                error: function(xhr) {
                    // Email is not available
                    if (xhr.status === 409) {
                        $('#emailError').text('Email is already taken');
                        $('#email').removeClass('is-valid').addClass('is-invalid');
                    } else {
                        // Handle other errors
                        $('#emailError').text('An error occurred. Please try again.');
                        $('#email').removeClass('is-valid').addClass('is-invalid');
                    }
                }
            });

        } else {
            // Email is invalid
            $(this).removeClass('is-valid').addClass('is-invalid');
            $('#emailError').text('Please enter a valid email address');
        }
    });
}


function fetch_password()
{
    $('#confirmPassword').on('input', function() {
        var password = $('#password').val();
        var confirmPassword = $(this).val();

        if (password === confirmPassword) {
            $(this).removeClass('is-invalid').addClass('is-valid');
            $('#passwordError').text('');
        } else {
            $(this).removeClass('is-valid').addClass('is-invalid');
            $('#passwordError').text('Passwords do not match');
        }
    });

    $('#password').on('input', function() {
        var password = $(this).val();
        var confirmPassword = $('#confirmPassword').val();

        if (password === confirmPassword) {
            $('#confirmPassword').removeClass('is-invalid').addClass('is-valid');
            $('#passwordError').text('');
        } else {
            $('#confirmPassword').removeClass('is-valid').addClass('is-invalid');
            $('#passwordError').text('Passwords do not match');
        }
    });
}

function fetch_dob()
{
    $('#dob').on('change', function() {
        var dob = new Date($(this).val());
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();
        var monthDifference = today.getMonth() - dob.getMonth();

        // Adjust age if the birthday has not occurred yet this year
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < dob.getDate())) {
            age--;
        }

        if (age >= 18) {
            $(this).removeClass('is-invalid').addClass('is-valid');
            $('#dobError').text('');
        } else {
            $(this).removeClass('is-valid').addClass('is-invalid');
            $('#dobError').text('You must be at least 18 years old');
        }
    });
}

function fetch_phone()
{
    $('#phone').on('input', function() {
        var phone = $(this).val();
        var phoneRegex = /^\d{10}$/;

         // Ensure input is numeric and limit length to 10 digits
         phone = phone.replace(/[^0-9]/g, '').slice(0, 10);
         $(this).val(phone);

        if (phoneRegex.test(phone)) {
            $(this).removeClass('is-invalid').addClass('is-valid');
            $('#phoneError').text('');

            // AJAX request to check phone number availability
            $.ajax({
                url: '/check-phone', // Your API endpoint
                method: 'GET',
                data: { phone: phone },
                success: function(response) {
                    // Phone number is available
                    $('#phoneError').text('');
                    $('#phone').removeClass('is-invalid').addClass('is-valid');
                },
                error: function(xhr) {
                    // Phone number is not available
                    if (xhr.status === 409) {
                        $('#phoneError').text('Phone number is already taken');
                        $('#phone').removeClass('is-valid').addClass('is-invalid');
                    } else {
                        // Handle other errors
                        $('#phoneError').text('An error occurred. Please try again.');
                        $('#phone').removeClass('is-valid').addClass('is-invalid');
                    }
                }
            });
        } else {
            // Phone number is invalid
            $(this).removeClass('is-valid').addClass('is-invalid');
            $('#phoneError').text('Please enter a 10-digit phone number');
        }
    });
}
function fetch_pincode()
{
    const pincode = document.getElementById('pincode');

    pincode.addEventListener('input',function(e){
        console.log(e.target.value);

        let pincodeValue = e.target.value;

        // Replace non-digit characters and limit to 6 digits
        pincodeValue = pincodeValue.replace(/[^0-9]/g, '').slice(0, 6);
        e.target.value = pincodeValue;
        
        // Only send the request if pincode has 6 digits
        if (pincodeValue.length === 6) {
            fetch(`/get-location?pincode=${pincodeValue}`)
                .then(response => response.json())
                .then(data => {
                    // console.log('City:', data.city);
                    // console.log('State:', data.state);
                    // console.log('Country:', data.country);

                    $('#area').val(data.area);
                    $('#district').val(data.district);
                    $('#city').val(data.city);
                    $('#state').val(data.state);
                    $('#country').val(data.country);
                    
                    
                })
                .catch(error => console.error('Error:', error));
        }

    });
}