// ..................page loading content..............................
function setVisible(selector, visible) {
    document.querySelector(selector).style.display = visible ? 'block' : 'none';
}

function onReady(callback) {
    var intervalId = window.setInterval(function () {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalId);
            callback.call(this);
        }
    }, 1000);
}

onReady(function () {
    setVisible('.container', true);
    setVisible('#loading', false);
});
