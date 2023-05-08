let openButton = document.querySelectorAll('#open');
let modal = document.getElementById('modal');
let closeButton = document.querySelectorAll('#close');
let deleteButton = document.querySelectorAll('#delete');
let filterButton = document.getElementById('filtrer');
let filterBtn = document.querySelectorAll('#submitFiltre');

function eventListener()
{


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
        for(let i = 0; i < filterBtn.length; i++)
        {
            filterBtn[i].addEventListener('click',filtreur);
        }
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

          element.parentElement.parentElement.remove()
    }
    else if(type === "deleteCommande")
    {

        response = await fetch("../supprimerCommande", {
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

    if(typeFiltre === "filtreClient")
    {
        response = await fetch("../filtrerClient", {
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

        if(users.users.length === 0)
        {
            div.innerHTML = "Aucun résultat ne correspond à votre recherche";
            div.setAttribute("class", "text-center")
        }

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

            if(typeFiltre === "filtreEmp")
            {
                a.setAttribute("href","/employe/"+users.users[i].id );
            }

            if(typeFiltre === "filtreClient")
            {
                a.setAttribute("href","/client/"+users.users[i].id );
            }

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

            if(typeFiltre === "filtreEmp")
            {
                a1.setAttribute("href", "modificationEmploye/" +  users.users[i].id);
            }

            if(typeFiltre === "filtreClient")
            {
                a1.setAttribute("href", "/modifier/client/" +  users.users[i].id);
            }

            setAttributes(img2,{src:"img/edit.svg",alt:"edit employe", class:"mt-8 mr-6 img_editPromo"});

            setAttributes(div4,{id:users.users[i].id ,class:"hidden"});

            if(typeFiltre === "filtreEmp")
            {
                div4.innerHTML = "deleteEmploye";
            }

            if(typeFiltre === "filtreClient")
            {
                div4.innerHTML = "deleteClient";
            }

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




var url = "{{ route('gestionProduits') }}";


let switchBtn = document.querySelector('.container-button-modif>button');

switchBtn.addEventListener('click', showForm)

function showForm(e){
let formMenu = document.querySelector('.form-gestion');
let buttonMenu = document.querySelector('.container-button-modif')

formMenu.classList.toggle('form-hidden');
buttonMenu.classList.toggle('form-hidden');
}



/*********************************************************/
/* Charger les listeners                                 */
/*********************************************************/

window.onload = function() {

    //listenerSelectClient();
    listenerSelectPizza();
    listenerSelectBeverage();
    listenerSelectDessert();

};

let SelectPizza = document.getElementById("elementSelectionner");
let boutonAjouter = document.querySelectorAll('#ajouterElement');
let boutonAjouterC = document.getElementById('ajouterCommande');

if(boutonAjouter != null)
{
    boutonAjouter.forEach(element => {
        element.addEventListener('click',ajouterElement);
    });
}

if (SelectPizza != null)
{
    SelectPizza.addEventListener('change',changeQuantite);
}

if(boutonAjouterC != null)
{
    boutonAjouterC.addEventListener('click',ajouterCommande);
}


function changeQuantite(evt)
{
    let option;
    let qteE;
    let qte;
    selectQt = document.getElementById('selectQt');
    qteE = JSON.parse( evt.target.value);
    longueur = selectQt.children.length;
    for(let i = 0; i < longueur; i++)
    {
        selectQt.removeChild(selectQt[i]);
    }
    if(qteE.quantite == 0)
    {
        option = document.createElement("option");
        qte = document.createTextNode(0);
        option.appendChild(qte);
        selectQt.insertAdjacentElement("afterbegin", option);
    }
    for(let i = 0; i < parseInt(qteE.quantite); i++)
    {
        option = document.createElement("option");
        qte = document.createTextNode(i);
        option.appendChild(qte);
        selectQt.insertAdjacentElement("afterbegin", option);

    }


}




let commande = Array();

function ajouterElement(evt)
{
    quantiteE = evt.target.previousElementSibling.value;
    element = JSON.parse(evt.target.previousElementSibling.parentElement.previousElementSibling.value);

    div = document.getElementById("panier");
    p1 = document.createElement("p");
    textElement = document.createTextNode("- " + element.nom + "-" + quantiteE);
    p1.appendChild(textElement);
    div.insertAdjacentElement("beforeend",p1);

    arrayProduit = Array();
    arrayProduit.push(element.id_produit,quantiteE);
    commande.push(arrayProduit);
}

async function ajouterCommande()
{
    let observation = document.getElementById('note');
    let modeP = document.getElementById('mPaiement');
    let client = document.getElementById('client');
    client = JSON.parse(client.value);
    alert(JSON.stringify(commande))
    response = await fetch("../insererCommande", {
		method  : "post",
		headers : {
					"Content-Type" : "application/x-www-form-urlencoded",
                    "X-CSRF-Token": document.querySelector('input[name=_token]').value,
				  },
		body    : "observation="+observation.value+"&idClient="+client+"&commande="+JSON.stringify(commande)+"&mPaiement="+modeP.value
	  });



}

