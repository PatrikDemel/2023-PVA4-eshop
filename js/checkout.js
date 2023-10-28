document.addEventListener('DOMContentLoaded', () => {
  // If is there any order to send
  if (localStorage.getItem('formSubmitted') == 'false') {
    // Function generating random order number
    function generateRandomString(length) {
      const characters = '0123456789';
      let randomString = '';
      for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        randomString += characters.charAt(randomIndex);
      }
      return randomString;
    }

    // Price and OrderNumber variables
    const orderPrice = localStorage.getItem('sum');
    const orderNumber = generateRandomString(10);
    const orderStatus = 'Ordered';

    // Form variable
    const submitForm = document.getElementById('checkout-form');

    // Fills form with order details
    const orderNumberField = document.getElementById(
      'checkout-order-number-input'
    );
    const orderStatusField = document.getElementById(
      'checkout-order-status-input'
    );
    const orderPriceField = document.getElementById(
      'checkout-order-price-input'
    );

    orderNumberField.value = orderNumber;
    orderStatusField.value = orderStatus;
    orderPriceField.value = orderPrice;

    // Checks if the form has already been submitted
    if (localStorage.getItem('formSubmitted') != 'true') {
      // Submits the form
      submitForm.submit();

      // Sets that form has been already submitted
      localStorage.setItem('formSubmitted', 'true');

      // Deletes shopping cart and sum variables from local localStorage
      localStorage.removeItem('shoppingCart');
      localStorage.removeItem('sum');
    }
  }
});
