// const productSorts = [
//     { name: 'sort0', type_id: 'all' },
//     { name: 'sort1', type_id: 'Snack' },
//     { name: 'sort2', type_id: 'ice' },
//     { name: 'sort3', type_id: 'drink' },
//     { name: 'sort5', type_id: 'food' },
//     { name: 'sort6', type_id: 'dessert' },
// ]
// const productList = document.querySelector('#product-list');
// const products = JSON.parse(productList.getAttribute('data-products'));
// displayProducts('all');

// categoryButtons.forEach(button, index => {
//     button.addEventListener('click', function (event) {
//         productList.innerHTML = '';
//         const type_id = productSorts[index].type_id;
//         displayProducts(type_id);
//     });
// });
// function displayProducts(type_id) {
//     const productList = document.querySelector('#product-list');
//     // productList.innerHTML = '';

//     // console.log(products.data);
//     products.forEach(product => {
//         const productDiv = document.createElement('div');
//         productDiv.classList.add('product-group');
//         if (type_id === 'all' || product.type_id === type_id) {

//         }
//         console.log(product);
//         // productList.appendChild(productDiv);
//     });
// }

