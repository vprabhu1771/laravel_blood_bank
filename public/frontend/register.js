window.onload = function()
{
    console.log('document loaded');
    fetch_name();
    fetch_pincode();
}

function fetch_name()
{
    $('#name').on('input', function() {
        $(this).val($(this).val().toUpperCase());
    });
}



function fetch_pincode()
{
    const pincode = document.getElementById('pincode');

    pincode.addEventListener('input',function(e){
        console.log(e.target.value);

        const pincodeValue = e.target.value;
        
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