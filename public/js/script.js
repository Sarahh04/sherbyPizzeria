
let openButton = document.querySelectorAll('#open');
let modal = document.getElementById('modal');
let closeButton = document.querySelectorAll('#close');
let deleteButton = document.querySelectorAll('#delete');

openButton.forEach(element => {
    element.addEventListener('click',getElement)
});

// hide the overlay and the dialog
closeButton.forEach(element => {
    element.addEventListener('click', function () {
        modal.classList.add('hidden');
    });
});

deleteButton.forEach(element => {
    element.addEventListener('click',deleteElement);
});

let idElement;
let element;
let type;

function getElement(evt)
{
    modal.classList.remove('hidden');
    idElement = evt.target.previousElementSibling.id;
    type = evt.target.previousElementSibling.innerHTML;
    element = evt.target.parentElement;
}
async function deleteElement()
{
    let response;
    if(type === "deleteClient")
    {
        response = await fetch("../supprimerClient", {
		method  : "post",
		headers : {
					"Content-Type" : "application/x-www-form-urlencoded",
                    "X-CSRF-Token": document.querySelector('input[name=_token]').value,
				  },
		body    : "id="+idElement
	  });
    }
    else if(type === "deleteEmploye")
    {
        response = await fetch("../supprimerEmploye", {
            method  : "post",
            headers : {
                        "Content-Type" : "application/x-www-form-urlencoded",
                        "X-CSRF-Token": document.querySelector('input[name=_token]').value,
                      },
            body    : "id="+idElement
          });
    }
    else if(type === "deleteProduit")
    {
        response = await fetch("../supprimerProduit", {
            method  : "post",
            headers : {
                        "Content-Type" : "application/x-www-form-urlencoded",
                        "X-CSRF-Token": document.querySelector('input[name=_token]').value,
                      },
            body    : "id="+idElement
          });
    }

    if (response.status === 200)
	{
        modal.classList.add('hidden');
        element.remove();
    }
}
//////////////// Fetch inventory search bar //////////////////////


/*let search = document.querySelector(".search-button");


search.addEventListener("click", fetchSearch);



async function fetchSearch(e) {
e.preventDefault();
console.log(e.target.previousElementSibling);
let response = await fetch("/gestion/inventaire/"+e.target.previousElementSibling.value, {
  method: "post",
  headers: {
    "Content-Type": "application/x-www-form-urlencoded",
  },
  body:
    "name="+e.target.previousElementSibling.value+"",
});

if (response.status === 200) {
    console.log('test')
}
 else if (response.status === 400) {
  alert("failed attempt");
}
}



let switchBtn = document.querySelector('.container-button-modif>button');

switchBtn.addEventListener('click', showForm)

function showForm(e){
let formMenu = document.querySelector('.form-gestion');
let buttonMenu = document.querySelector('.container-button-modif')

formMenu.classList.toggle('form-hidden');
buttonMenu.classList.toggle('form-hidden');
}*/


