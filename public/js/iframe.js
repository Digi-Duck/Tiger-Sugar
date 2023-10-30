// function handleJSONPData(data) {
//     console.log(data);
// }
// var script = document.createElement('script');
// script.src = "http://example.com/data-endpoint?callback=handleJSONPData";
// document.head.appendChild(script);




console.log('Script started running');

window.addEventListener('load', function () {
    console.log('Window loaded');
    var iframes = document.querySelectorAll('.card-body');

    iframes.forEach(function (iframe) {
        iframe.addEventListener('load', function () {
            console.log('Iframe loaded');
            setTimeout(function () {
                var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                var contentHeight = iframeDocument.body.scrollHeight;
                iframe.style.height = contentHeight + 'px';
                console.log(iframe.style.height);
            }, 100);
        });
    });
});

