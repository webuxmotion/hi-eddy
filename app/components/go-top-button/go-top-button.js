const element = document.querySelector('.js-go-top-button');

if (element) {
    element.addEventListener('click', () => {
        window.scrollTo({ top: 0 });
    });
}

const button = document.querySelector('.js-send-email');

if (button) {
    button.addEventListener('click', () => {
        console.log('send email');
        fetch('/api/send-email')
            .then((response) => response.json())
            .then((data) => console.log(data));
    });
}