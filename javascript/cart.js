       
       
       // Selecting the buttons and quantity value
        const decreaseBtn = document.querySelector('.decrease-btn');
        const increaseBtn = document.querySelector('.increase-btn');
        const quantityValue = document.querySelector('.quantity-value');

        // Variable to store the current quantity value
        let currentValue = parseInt(quantityValue.textContent);

        // Adding click event listeners to the buttons
        decreaseBtn.addEventListener('click', function() {
            // Decreasing the value if it's greater than 1
            if (currentValue > 1) {
                currentValue--;
            }
            // Update the quantity value displayed on the page
            quantityValue.textContent = currentValue;
        });

        increaseBtn.addEventListener('click', function() {
            // Increasing the value
            currentValue++;
            // Update the quantity value displayed on the page
            quantityValue.textContent = currentValue;
        });