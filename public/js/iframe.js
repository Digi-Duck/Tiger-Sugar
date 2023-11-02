window.addEventListener('load', function () {
    var iframes = document.querySelectorAll('.card-body');
    iframes.forEach(function (iframe) {
        iframe.addEventListener('load', function () {
            setTimeout(function () {
                var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                var contentHeight = iframeDocument.body.scrollHeight;
                iframe.style.height = contentHeight + 'px';
            },0);
        });
    });
});


