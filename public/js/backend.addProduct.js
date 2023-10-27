// const addButton = document.querySelectorAll('#add-button');

// // 為每個按鈕設置點擊事件處理程序
// addButton.forEach(addButton => {
//     addButton.addEventListener('click', function () {
//         // 獲取按鈕的 data-id 屬性，它包含相應的ID
//         const id = this.getAttribute('data-id'); //可以抓到button裡面的data-id的值

//         console.log(id);
//         // const item = document.getElementById(id);

//         const formData = new FormData();
//         formData.append('_token', '{{ csrf_token() }}');
//         formData.append('_method', 'post');
//         formData.append('id', id);
//         fetch('{{ route("front.add_to_cart") }}',{
//             method: 'POST',
//             body: formData,
//         })
//     });
// });


