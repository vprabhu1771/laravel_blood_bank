window.onload = function()
{
    console.log('document loaded');

    const pincode = document.getElementById('pincode');

    pincode.addEventListener('input',function(e){
        console.log(e.target.value);

        const pincodeValue = e.target.value;
        
        // Only send the request if pincode has 6 digits
        if (pincodeValue.length === 6) {
            fetch(`/get-location?pincode=${pincodeValue}`)
                .then(response => response.json())
                .then(data => {
                    console.log('City:', data.city);
                    console.log('State:', data.state);
                    console.log('Country:', data.country);
                })
                .catch(error => console.error('Error:', error));
        }

    })
}