const productSorts = [
    { name: 'sort0', type_id: 'all' },
    { name: 'sort1', type_id: 'Snack' },
    { name: 'sort2', type_id: 'ice' },
    { name: 'sort3', type_id: 'drink' },
    { name: 'sort5', type_id: 'food' },
    { name: 'sort6', type_id: 'dessert' },
]
const productList = document.querySelector('#product-list');
const products = JSON.parse(productList.getAttribute('data-products'));
displayProducts('all');

categoryButtons.forEach(button, index => {
    button.addEventListener('click', function (event) {
        productList.innerHTML = '';
        const type_id = productSorts[index].type_id;
        displayProducts(type_id);
    });
});

function displayProducts(type_id) {
    const productList = document.querySelector('#product-list');
    // productList.innerHTML = '';

    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.classList.add('product-group');
        console.log(product);
        // if (type_id === 'all' || product.type_id === type_id) {
        //     // 添加其他产品信息，可以根据需要添加更多内容
        //     productDiv.innerHTML = `
        //     <div class="product-group">
        //     <div class="product-img-group">
        //         <div class="product-background">
        //             <div class="product">
        //                 <img src="${product.img}" alt="產品1" />
        //             </div>
        //             <div class="yellow-box">
        //                 <img class="ask-icon" data-product="${product.id}"
        //                     src="{{ asset('./frontend-img/index-img/distribution/add_for_ask.svg') }}"
        //                     alt="黃色加入以詢問">
        //             </div>
        //             <div class="product-background-hover open-pop-window">
        //                 <a href="{{ route('front.distribution') }}" class="yellow-box-hover"
        //                     title="更多商品"><img class="ask-icon-hover"
        //                         data-product="${product.id}"
        //                         src="{{ asset('./frontend-img/index-img/distribution/add_for_ask_hover.svg') }}"
        //                         alt="黃色加入以詢問"></a>
        //                 <input type="hidden" class="inputall" name="inputall${product.id}"
        //                     value='${JSON.stringify(product)}'>
        //                 <button class="product-background-hover-more">MORE</button>
        //             </div>
        //         </div>
        //     </div>

        //     <div class="product-info">
        //         <div class="product-title">${product.title_zh}</div>
        //         <div class="product-title-en">
        //         ${product.title_en}
        //         </div>
        //         <div class="product-id">
        //         ${product.ProductsType.tw_name}|${product.ProductsType.en_name}
        //     </div>
        // </div>
        //     `;

        //     productList.appendChild(productDiv);
        // }
    });
}

