{{-- /*****************************************************************************
 Fichier : mail
 Auteur : Amélie Fréchette
 Fonctionnalité : est l'affichage que contiendra le courriel envoyer au nouveau client.
*****************************************************************************/ --}}

<h1 class="font-semibold">Merci pour votre d'avoir commander chez nous!</h1>
<p class="font-normal"><span class="font-semibold">Nom du client : </span><?php echo $nom ?></p>
<p class="font-normal"><span class="font-semibold">Courriel : </span><?php echo $courriel ?></p>

<p class = "text-red-600">*Le mot de passe du compte est abc12345, c'est celui par defaut. Vous devez donc aller le changer à la prochainne connexion</p>



{{-- c'est le message qui fait bug!!! dit quMil ne peut pas devinir string
Object of class Illuminate\Mail\Message could not be converted to string --}}
