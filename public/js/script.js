
let openButton = document.getElementById('open');
let modal = document.getElementById('modal');
let closeButton = document.getElementById('close');

// show the overlay and the dialog
openButton.addEventListener('click', function () {
    modal.classList.remove('hidden');
});

// hide the overlay and the dialog
closeButton.addEventListener('click', function () {
    modal.classList.add('hidden');
});
