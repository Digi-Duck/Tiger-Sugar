let submitBtn = document.querySelector('.form-btn');
submitBtn.addEventListener ('click', function() {
    const initialText ='送出資料';
    submitBtn.innerHTML = `<button type="submit" class="form-btn">sending</button>`
});
