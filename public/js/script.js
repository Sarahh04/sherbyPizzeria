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

if(window.location.href === 'http://127.0.0.1:8000/gestion/produits'){
let switchBtn = document.querySelector('.container-button-modif>button');

switchBtn.addEventListener('click', showForm)

function showForm(e){
let formMenu = document.querySelector('.form-gestion');
let buttonMenu = document.querySelector('.container-button-modif')

formMenu.classList.toggle('form-hidden');
buttonMenu.classList.toggle('form-hidden');
}

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

// function listenerSelectClient() {
//     let clientElement = document.getElementById('client');
//     let clientData = clientElement.value;
//     let options = clientData.split(',');

//     clientElement.addEventListener('change', function() {
//         console.log(options);
//         document.querySelector("#telephone").value = options[1];
//     });
// }


/*********************************************************/
/* Listener des bouton d'ajoute de produits              */
/*********************************************************/
function listenerSelectPizza(){
    let pizzaQttElement = document.getElementById('qtt_pizza');

    pizzaQttElement.addEventListener('change', function() {
        pizzaQttElement.style.border = "";
    });
}

function listenerSelectBeverage(){
    let beverageQttElement = document.getElementById('qtt_beverage');

    beverageQttElement.addEventListener('change', function() {
        beverageQttElement.style.border = "";
    });
}

function listenerSelectDessert(){
    let dessertQttElement = document.getElementById('qtt_dessert');

    dessertQttElement.addEventListener('change', function() {
        dessertQttElement.style.border = "";
    });
}

/*********************************************************/
/* Gérer la construction de la commande                  */
/*********************************************************/
function ajouterPizza() {
    let pizzaElement = document.getElementById('pizza');
    let pizzaQttElement = document.getElementById('qtt_pizza');
    let idPizza = pizzaElement.value;
    let namePizza = pizzaElement.options[pizzaElement.selectedIndex].text;
    let qttPizza = pizzaQttElement.value;

    if(qttPizza != 0) {
        let pizza = new Pizza(idPizza,namePizza,qttPizza);
        commande.pizzas.add(pizza);
        pizzaQttElement.value = 0;
        console.log(commande);
    }
    else {
        pizzaQttElement.style.border = "3px solid red";
    }
}

function ajouterBeverage() {
    let beverageElement = document.getElementById('beverage');
    let beverageQttElement = document.getElementById('qtt_beverage');
    let idBeverage = beverageElement.value;
    let nameBeverage = beverageElement.options[beverageElement.selectedIndex].text;
    let qttBeverage = beverageQttElement.value;

    if(qttBeverage != 0) {
        let beverage = new Beverage(idBeverage,nameBeverage,qttBeverage);
        commande.beverages.add(beverage);
        beverageQttElement.value = 0;
        console.log(commande);
    }
    else {
        beverageQttElement.style.border = "3px solid red";
    }
}

function ajouterDessert() {
    let dessertElement = document.getElementById('dessert');
    let dessertQttElement = document.getElementById('qtt_dessert');
    let idDessert = dessertElement.value;
    let nameDessert = dessertElement.options[dessertElement.selectedIndex].text;
    let qttDessert = dessertQttElement.value;

    if(qttDessert != 0) {
        let dessert = new Dessert(idDessert,nameDessert,qttDessert);
        commande.desserts.add(dessert);
        dessertQttElement.value = 0;
        console.log(commande);
    }
    else {
        dessertQttElement.style.border = "3px solid red";
    }

}

function ajouterCommande() {
    let clientElement = document.getElementById('client');
    let clientData = clientElement.value;
    let options = clientData.split(',');
    let idClient = options[0];
    let nomClient = clientElement.options[clientElement.selectedIndex].text;
    let phoneClient = options[1];

    let client = new Client(idClient,nomClient,phoneClient);
    commande.clients.add(client);

    let commentaireElementValue = document.getElementById('note').value;
    commande.commentaire.add(commentaireElementValue);

    console.log(commande);

    //ajaxCall();
}

function ajaxCall() {
    $.ajax({
        url: '{{ route("extraitCommande") }}',
        type: 'POST',
        data: commande,
        success: function(response) {
        console.log(response);
        }
    });
}

/*********************************************************/
/* Créer les classes Pizzas, Beverage, Dessert et Cart   */
/*********************************************************/
class Client {
    constructor(id, nom, telephone) {
        this.id = id;
        this.nom = nom;
        this.telephone = telephone;
    }
}
class Pizza {
    constructor(id, nom, quantite) {
        this.id = id;
        this.nom = nom;
        this.quantite = quantite;
    }
}

class Beverage {
    constructor(id, nom, quantite) {
        this.id = id;
        this.nom = nom;
        this.quantite = quantite;
    }
}

class Dessert {
    constructor(id, nom, quantite) {
        this.id = id;
        this.nom = nom;
        this.quantite = quantite;
    }
}

// class Commentaire {
//     constructor(commentaire) {
//         this.commentaire = this.commentaire;
//     }
// }

class Commande {
    constructor(){
        this.pizzas = new Set();
        this.beverages = new Set();
        this.desserts = new Set();
        this.clients = new Set();
        this.commentaire = new Set();
    }
}

let commande = new Commande();


// function requeteAjouterProduit(idProduitValue,quantite,taille) {
//     console.log("Ajouter");
//     requeteAjax(
//         "action=ajouterCommande&id=" + idProduitValue +
//         "&quantite=" + quantite
//     );
// }

// function requeteModifierProduit(idProduitValue,produitValue,categorieValue,descriptionValue) {
//     console.log("Editer");

//     requeteAjax(
//         "action=edition&idproduit=" + idProduitValue +
//         "&produit=" + produitValue +
//         "&categorie=" + categorieValue +
//         "&description=" + descriptionValue
//     );
// }


/*******************************************************/
/* Gérer la requete ajax                               */
/*******************************************************/

function requeteAjax(data) {
    console.log(data);
    var xhttp = new XMLHttpRequest();
    let idInsert = 'id';
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200){
                xhttp.onload = function() {
                    let data = this.responseText;
                    //console.log(data);
                    let jsonData = JSON.parse(data);
                    remplirFormulaire(jsonData);
                }
            }
            else if (this.status === 201) {
                alert("L’insertion a été fait avec succès !");
                let idInsert = this.responseText;
                console.log(idInsert);
                afficherProduitInsere(idInsert);
                masquerAfficherFormulaireDInsertion();
            }
            else if (this.status === 202) {
                alert("L'exclusion a été fait avec succès !");

            }
            else if (this.status === 204) {
                alert("La modification a été fait avec succès !");

            }
            else if (this.status === 400)
                //inserer le code de reponse da requete si elle ne marche pas
                alert("L’insertion a été échoué !");
        }
    };

    xhttp.open("POST", "./index.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
}
