document.addEventListener('DOMContentLoaded', () => {
  // Gets shoppingCart from the local storage and parses it as JSON
  let shoppingCart = JSON.parse(localStorage.getItem('shoppingCart')) || [];

  // Add to card button
  const addToCartButton = document.getElementById('add-button');

  // Function after adding product to cart
  addToCartButton.addEventListener('click', () => {
    const itemName = document.getElementById('name').textContent;
    const itemPrice = parseFloat(
      document.getElementById('price').textContent.replace('$', '')
    );

    // Searches if the product is already in cart
    let item = shoppingCart.find((cartItem) => cartItem.name === itemName);

    // Updates quantity as +1 if the product already exists
    if (item) {
      item.quantity++;
    } else {
      // If the item is not in the shopping cart, it adds it
      item = {
        name: itemName,
        price: itemPrice,
        quantity: 1,
      };
      shoppingCart.push(item);
    }

    // Update localStorage with the updated shoppingCart
    localStorage.setItem('shoppingCart', JSON.stringify(shoppingCart));
  });
});
