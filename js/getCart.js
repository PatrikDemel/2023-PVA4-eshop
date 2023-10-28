document.addEventListener('DOMContentLoaded', () => {
  // Gets shoppingCart from local storage
  const shoppingCart = JSON.parse(localStorage.getItem('shoppingCart'));
  // Gets tbody from HTML document
  const tbody = document.querySelector('#cart-table tbody');

  // If there is any item in the shopping cart
  if (shoppingCart.length > 0) {
    shoppingCart.forEach((item) => {
      // Creates table row
      const tableRow = document.createElement('tr');

      // Creates Product Name cell
      const productName = document.createElement('td');
      productName.textContent = item.name;

      // Creates Product Quantity cell
      const productQuantity = document.createElement('td');
      productQuantity.textContent = item.quantity;

      // Creates Product Price cell
      const productPrice = document.createElement('td');
      productPrice.textContent = '$' + item.price;

      // Creates Product Delete cell
      const deleteButton = document.createElement('td');

      // Inserts delete icon to Product Delete cell
      const deleteButtonIcon = document.createElement('i');
      deleteButtonIcon.classList.add('fa-solid');
      deleteButtonIcon.classList.add('fa-xmark');
      deleteButtonIcon.classList.add('cancel-cart-button');

      // Appends all elements into HTML document
      tbody.appendChild(tableRow);
      tableRow.appendChild(productName);
      tableRow.appendChild(productQuantity);
      tableRow.appendChild(productPrice);
      tableRow.appendChild(deleteButton);
      deleteButton.appendChild(deleteButtonIcon);

      // Function after deleting the item from the cart
      deleteButton.addEventListener('click', () => {
        console.log('works');
      });
    });
  }
});
