<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
<header class="h-gestion-prod">
    <h1>Gestion des menus</h1>
</header>
<article class="main-container-menu">
    <section class="product-menu-container">
        <div class="navigation-menu">
            <ul>
                <li>Regulier</li>
                <li>Promotion</li>
                <li>limiter</li>
                <li>indisponible</li>
            </ul>
        </div>
        <table class="GeneratedTable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td><a href="">Modifier / supprimer</a></td>
                </tr>
                <tr>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td><a href="">Modifier / supprimer</a></td>
                </tr>
                <tr>
                    <td>cell</td>
                    <td>cell</td>
                    <td><a href="">Modifier / supprimer</a></td>
                </tr>
            </tbody>
        </table>
    </section>
    <section class="product-form-container">
        <div class="container-button-modif">
            <button class="">
                Nouvel objet
            </button>
        </div>
        <div class="form-hidden form-gestion">
            <form action="">
                <div class="nom-prix-container">
                    <div>
                        <input type="text" placeholder="Nom">
                    </div>
                    <div>
                        <input type="text" placeholder="prix">
                    </div>
                </div>
                <div class="description-container">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Description"></textarea>
                </div>
                <div class="date-in-container">
                    <div>
                        <input type="date" placeholder="Expiration">
                    </div>
                    <div>
                        <select name="ingrediant" id="ingrediant">
                            <option default value="patate"></option>
                        </select>
                    </div>
                </div>
                <div class="submit-container">

                </div>
            </form>
        </div>
    </section>
</article>
