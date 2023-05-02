
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


let switchBtn = document.querySelector('.container-button-modif>button');

switchBtn.addEventListener('click', showForm)

function showForm(e){
let formMenu = document.querySelector('.form-gestion');
let buttonMenu = document.querySelector('.container-button-modif')

formMenu.classList.toggle('form-hidden');
buttonMenu.classList.toggle('form-hidden');
}
