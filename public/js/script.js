
let openButton = document.querySelectorAll('#open');
let modal = document.getElementById('modal');
let closeButton = document.querySelectorAll('#close');

openButton.forEach(element => {
    element.addEventListener('click', function () {
        modal.classList.remove('hidden');
    });
});

// hide the overlay and the dialog
closeButton.forEach(element => {
    element.addEventListener('click', function () {
        modal.classList.add('hidden');
    });
});

//////////////// Fetch inventory search bar //////////////////////


let search = document.querySelector(".search-button");


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
}

/*********************************************************/
/* Charger les listeners                                 */
/*********************************************************/
window.onload = function() {
    listenerSupprimer();
    listenerEditer();
    listenerDInsertion();
    listenerQuantiteItem();
    //afficherMasquerFormulaireDInsertion();

};

/*********************************************************/
/* Gérer la submission d'un ajoute de produit            */
/*********************************************************/
function listenerDInsertion() {
    // Variable pour referencier le bouton submit du formulaire
    let boutonSubmit = document.getElementById("ajouter_pizza");
    if(boutonSubmit != null) {
    // Ajoute un écouteur sur le bouton submit du formulaire
        boutonSubmit.addEventListener('click', function(e) {
            e.preventDefault();
            let idProduitValue = document.getElementById('pizza').value;
            let quantite = document.getElementById('quantite').value;
            let taille = document.getElementById('taille').value;

            requeteAjouterProduit(idProduitValue,quantite,taille);
        });
    }
}

function requeteAjouterProduit(idProduitValue,quantite,taille) {
    console.log("Ajouter");
    requeteAjax(
        "action=ajouterCommande&id=" + idProduitValue +
        "&quantite=" + quantite +
        "&taille=" + taille
    );
}

function requeteModifierProduit(idProduitValue,produitValue,categorieValue,descriptionValue) {
    console.log("Editer");

    requeteAjax(
        "action=edition&idproduit=" + idProduitValue +
        "&produit=" + produitValue +
        "&categorie=" + categorieValue +
        "&description=" + descriptionValue
    );
}

window.onload = () => {
    document.getElementById("bouton_fetch").addEventListener("click", callFetch);
}


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
