<div class="container mt-5">
    <?php if (!empty($message)): ?>
        <div class="alert alert-info" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <h1 class="text-center mb-4">Ajouter un évènement</h1>

    <form action="index.php?controller=Admin&action=add" class="myForm" method="post" enctype="multipart/form-data">
        <div class=" mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom de l'évènement">
            <span id="nomError" class="error"></span>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Décrivez l'évènement"></textarea>
            <span id="descriptionError" class="error"></span>
        </div>

        <div class="form-group">
            <label for="photo"><b>Photo :</b></label>
            <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
            <img id="previewImage" alt="Aperçu de l'image" style="display: none">
            <span id="photoError" class="error"></span>
        </div>


        <div class=" mb-3">
            <label for="date_evenement" class="form-label">Date de l'évènement :</label>
            <input type="date" class="form-control" id="date_evenement" name="date_evenement">
            <span id="date_evenementError" class="error"></span>
        </div>

        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité :</label>
            <input type="number" class="form-control" id="quantite" name="quantite" placeholder="Entrez la quantité disponible">
            <span id="quantiteError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="prix"><b>Prix :</b></label>
            <input type="number" id="prix" name="prix" class="form-control" placeholder="Choisissez un prix">
            <span id="prixError" class="error"></span>
        </div>

        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie :</label>
            <select class="form-select" id="categorie" name="categorie">
                <option value="" disabled selected>Choisissez une catégorie</option>
                <?php foreach ($categories as $categorie): ?>
                    <option value="<?php echo $categorie->id_categorie; ?>">
                        <?php echo $categorie->nom_categorie; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <span id="categorieError" class="error"></span>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-outline-light btn-lg">Envoyer</button>
        </div>
    </form>
</div>