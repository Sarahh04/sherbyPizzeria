function eventListener()
{
    let openButton = document.querySelectorAll('#open');
    let modal = document.getElementById('modal');
    let closeButton = document.querySelectorAll('#close');
    let deleteButton = document.querySelectorAll('#delete');
    let filterButton = document.getElementById('filtrer');
    let filterBtn = document.getElementById('submit');

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

    if(filterButton != null)
    {
        filterButton.addEventListener('submit',stopForm);
    }

    if(filterBtn != null)
    {
        filterBtn.addEventListener('click',filtreur);
    }


}

eventListener();

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

async function filtreur(evt)
{
    let nom = document.getElementById('filtreNom');
    let tel = document.getElementById('filtreTel');
    let courriel = document.getElementById('filtreCourriel');
    let div = document.getElementById('divRepere');
    let response;
    let typeFiltre = evt.target.parentElement.previousElementSibling.name;

    if(typeFiltre === "filtreEmp")
    {
        response = await fetch("../filtrerEmp", {
		method  : "post",
		headers : {
					"Content-Type" : "application/x-www-form-urlencoded",
                    "X-CSRF-Token": document.querySelector('input[name=_token]').value,
				  },
		body    : "nom="+nom.value+"&tel="+tel.value+"&courriel="+courriel.value
	  });
    }

    if(response.status === 200)
    {
        div.innerHTML = "";
        let users = Array();
        users = JSON.parse(await response.text());

        for(let i =0 ; i < users.users.length; i++)
        {
            let a = document.createElement("a");
            let div1 = document.createElement("div");
            let div2 = document.createElement("div");
            let img1 = document.createElement('img');
            let div3 = document.createElement("div");
            let p1 = document.createElement("p");
            let p2 = document.createElement("p");
            let p3 = document.createElement("p");
            let a1 = document.createElement("a");
            let img2 = document.createElement("img");
            let div4 = document.createElement("div");
            let img3 = document.createElement("img");


           a.setAttribute("href","/employe/"+users.users[i].id );

            div1.setAttribute("class","flex flex-row justify-center border-2 border-solid border-gray-950 mx-36 py-10 mb-4");

            div2.setAttribute("class","flex flex-row");

            setAttributes(img1,{src:"img/image.svg",alt:"image de l'employe", class:"mr-48 img_imgPromo"});

            div3.setAttribute("class","mr-48");

            let nom = document.createTextNode("Nom : " + users.users[i].name);
            p1.appendChild(nom);

            let prenom = document.createTextNode("Courriel : " + users.users[i].email);
            p2.appendChild(prenom);

            let tel = document.createTextNode("Téléphone : " + users.users[i].telephone);
            p3.appendChild(tel);

            a1.setAttribute("href", "modificationEmploye/" +  users.users[i].id);

            setAttributes(img2,{src:"img/edit.svg",alt:"edit employe", class:"mt-8 mr-6 img_editPromo"});

            setAttributes(div4,{id:users.users[i].id ,class:"hidden"});
            div4.innerHTML = "deleteEmploye";

            setAttributes(img3,{id:"open",src:"img/desactiver.svg",alt:"desactiver employe", class:"mt-8 mr-6 img_editPromo"});

            div1.appendChild(div2);
            a.appendChild(img1);
            div2.appendChild(a);
            div2.appendChild(div3);
            div3.appendChild(p1);
            div3.appendChild(p2);
            div3.appendChild(p3);
            a1.appendChild(img2);
            div1.appendChild(a1);
            div1.appendChild(div4);
            div1.appendChild(img3);


            div.insertAdjacentElement("afterbegin", div1);

        }
    }
    else if (response.status === 400)
	{

		alert(await response.text());
	}
    eventListener();
}

function setAttributes(el, attrs) {
	for(var key in attrs) {
	  el.setAttribute(key, attrs[key]);
	}
}

function stopForm(evt)
{
	evt.preventDefault();
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


